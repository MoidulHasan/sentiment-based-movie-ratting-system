<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
  $query = 'SELECT ID, t.TYPE
            FROM users u
            JOIN type t ON t.TYPE_ID=u.TYPE_ID WHERE ID = '.$_SESSION['MEMBER_ID'].'';
  $result = mysqli_query($db, $query) or die (mysqli_error($db));
  
  while ($row = mysqli_fetch_assoc($result)) {
            $Aa = $row['TYPE'];
                   
  if ($Aa=='User'){
?>
  <script type="text/javascript">
    //then it will be redirected
    alert("Restricted Page! You will be redirected to POS");
    window.location = "pos.php";
  </script>
<?php
  }           
}
$sql = "SELECT DISTINCT CNAME, CATEGORY_ID FROM category order by CNAME asc";
$result = mysqli_query($db, $sql) or die ("Bad SQL: $sql");

$aaa = "<select class='form-control' name='category' required>
        <option disabled selected hidden>Select Category</option>";
  while ($row = mysqli_fetch_assoc($result)) {
    $aaa .= "<option value='".$row['CATEGORY_ID']."'>".$row['CNAME']."</option>";
  }

$aaa .= "</select>";

$sql2 = "SELECT DISTINCT SUPPLIER_ID, COMPANY_NAME FROM supplier order by COMPANY_NAME asc";
$result2 = mysqli_query($db, $sql2) or die ("Bad SQL: $sql2");

$sup = "<select class='form-control' name='supplier' required>
        <option disabled selected hidden>Select Supplier</option>";
  while ($row = mysqli_fetch_assoc($result2)) {
    $sup .= "<option value='".$row['SUPPLIER_ID']."'>".$row['COMPANY_NAME']."</option>";
  }

$sup .= "</select>";
?>


<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Product&nbsp;<a  href="#" data-toggle="modal" data-target="#aModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a></h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <?php
 
                  if($db === false){
                    die("ERROR: Could not connect. " . mysqli_connect_error());
                  }
                  else{
                    $sql = "SELECT * FROM product";
                  }
                ?>

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Product Code</th>
                      <th>Name</th>
                      <th>Price</th>
                      <th>Category</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $query = 'SELECT PRODUCT_ID, PRODUCT_CODE, NAME, PRICE, CNAME, DATE_STOCK_IN FROM product p join category c on p.CATEGORY_ID=c.CATEGORY_ID GROUP BY PRODUCT_CODE';
                  $result = mysqli_query($db, $query) or die (mysqli_error($db));
      

                        if (mysqli_num_rows($result) > 0) {
                        
                            while($row = mysqli_fetch_assoc($result)) {
                              ?>
                            <tr>
                                <td><?php echo $row["PRODUCT_CODE"]; ?></td>
                                <td><?php echo $row["NAME"];  ?></td>
                                <td><?php echo $row["PRICE"];  ?></td>
                                <td><?php echo $row["CNAME"];  ?></td>
                                
                                <td class="text-center">
                                    <input type="image" src="https://i.ibb.co/GTDGd2G/view.png" alt="view" border="0" width="30" height="30"   id="<?php echo $row["PRODUCT_ID"]; ?>" class="view_data" />
                                    <br> 
                                    <input type="image" src="https://i.ibb.co/4pQmLfz/edit.png" alt="edit" border="0" width="30" height="30"  id="<?php echo $row["PRODUCT_ID"]; ?>" class="edit_data" /><br>
                                    <input type="image" src="https://i.ibb.co/s5MCkyz/delete.png" alt="delete" border="0" width="30" height="30"  name="delete"  value="delete" id="<?php echo $row["PRODUCT_ID"]; ?>" class="delete" />
                                </td> 
                            </tr>
                    <?php
                          }
                        }
                        else{
                          echo "No Product";
                        }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>



 
        </div>
        <!-- /.container-fluid -->
        


 

      <?php
include'../includes/footer.php';
?>

  <!-- Product Modal-->
  <div class="modal fade" id="aModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form role="form" method="post" action="pro_transac.php?action=add">
           <div class="form-group">
             <input class="form-control" placeholder="Product Code" name="prodcode" required>
           </div>
           <div class="form-group">
             <input class="form-control" placeholder="Name" name="name" required>
           </div>
           <div class="form-group">
             <textarea rows="5" cols="50" texarea" class="form-control" placeholder="Description" name="description" required></textarea>
           </div>
           <div class="form-group">
             <input type="number"  min="1" max="999999999" class="form-control" placeholder="Quantity" name="quantity" required>
           </div>
           <div class="form-group">
             <input type="number"  min="1" max="999999999" class="form-control" placeholder="On Hand" name="onhand" required>
           </div>
           <div class="form-group">
             <input type="number"  min="1" max="9999999999" class="form-control" placeholder="Price" name="price" required>
           </div>
           <div class="form-group">
             <?php
               echo $aaa;
             ?>
           </div>
           <div class="form-group">
             <?php
               echo $sup;
             ?>
           </div>
           <div class="form-group">
             <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control" placeholder="Date Stock In" name="datestock" required>
           </div>
            <hr>
            <button type="submit" class="btn btn-success"><i class="fa fa-check fa-fw"></i>Save</button>
            <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Reset</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>      
          </form>  
        </div>
      </div>
    </div>
  </div>


  
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="../login">Logout</a>
        </div>
      </div>
    </div>
  </div>


 
<!-- Applicants Details -->
<div id="dataModal" class="modal fade" >  
      <div class="modal-dialog modal-md">  
           <div class="modal-content">  
                <div class="modal-header">  
                <h4 class="modal-title">Product Details</h4>  
              <button type="button" class="close" data-dismiss="modal">&times;</button>  
                 </div>  
                <div class="modal-body" id="employee_detail">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="product1.php">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
 <!-- /Applicants Details -->
 

 
 
 
 
 <!-- PHP Ajax Update MySQL Data Through Bootstrap Modal -->
 <div id="add_data_Modal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                       <h4 class="modal-title">Edit Applicants data</h4>  
                       <button type="button" class="close" data-dismiss="modal">&times;</button>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form">  
                          <label>First Name</label>  
                          <input type="text" name="fname" id="fname" class="form-control" />  

                          <label>Last Name</label>  
                          <input type="text" name="lname" id="lname" class="form-control" />  
                          
                          <label>Father Name</label>  
                          <input name="father_name" id="father_name" class="form-control"></textarea>  
                          
                          <label>Mother Name</label>  
                          <input name="mather_name" id="mather_name" class="form-control"></textarea>  

                          <label>Date of Birth</label>  
                          <input type="Date" name="dob" id="dob" class="form-control" />  

                          <label>Phone Number</label>  
                          <input type="text" name="phone" id="phone" class="form-control" />  
                          
                          <label>Email</label>  
                          <input type="text" name="email" id="email" class="form-control" />  

                          <input type="hidden" name="student_id" id="student_id" />  
                          <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />  
                     </form>  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div> 
  <!-- / PHP Ajax Update MySQL Data Through Bootstrap Modal -->

<script>  
 $(document).ready(function() {
    $('#add').click(function() {
        $('#insert').val("Insert");
        $('#insert_form')[0].reset();
    });
    $(document).on('click', '.edit_data', function() {
        var id = $(this).attr("id");
        $.ajax({
            url: "fetch.php",
            method: "POST",
            data: {
                id: id
            },
            dataType: "json",
            success: function(data) {
                $('#fname').val(data.fname);
                $('#lname').val(data.lname);
                $('#father_name').val(data.father_name);
                $('#mather_name').val(data.mather_name);
                $('#dob').val(data.dob);
                $('#gender').val(data.gender);
                $('#religion').val(data.religion);
                $('#blood_group').val(data.blood_group);
                $('#student_id').val(data.student_id);
                $('#phone').val(data.phone);
                $('#email').val(data.email);
                $('#insert').val("Update");
                $('#add_data_Modal').modal('show');
            }
        });
    });
    $('#insert_form').on("submit", function(event) {
        event.preventDefault();
        if ($('#fname').val() == "") {
            alert("First Name Required");
        } else if ($('#lname').val() == '') {
            alert("Last Name Required");
        }
        else if ($('#father_name').val() == '') {
            alert("Father Name Required");
        }
        else if ($('#mather_name').val() == '') {
            alert("Mather Name Required");
        }
        else if ($('#dob').val() == '') {
            alert("Date of Birth Required");
        }
        else if ($('#phone').val() == '') {
            alert("Phone Number Required");
        }
         else if ($('#email').val() == '') {
            alert("Email Required");
        }  else {
            $.ajax({
                url: "insert.php",
                method: "POST",
                data: $('#insert_form').serialize(),
                beforeSend: function() {
                    $('#insert').val("Inserting");
                },
                success: function(data) {
                    $('#insert_form')[0].reset();
                    $('#add_data_Modal').modal('hide');
                    $('#employee_table').html(data);
                }
            });
        }
    });

    $(document).on('click', '.view_data', function() {
        var id = $(this).attr("id");
        if (id != '') {
            $.ajax({
                url: "product_view.php",
                method: "POST",
                data: {
                    id: id
                },
                
                success: function(data) {
                    $('#employee_detail').html(data);
                    $('#dataModal').modal('show');
                    $(this).remove();
                }
            });
        }
    });
    
    $(document).on('click', '.approve', function() {
        var id = $(this).attr("id");
        if (id != '') {
            $(this).closest('tr').remove();
            $.ajax({
                url: "approve.php",
                method: "POST",
                data: {
                    id: id
                },
                
                success: function(data) {
                    $('#employee_detail').html(data);
                    $('#dataModal').modal('show');
                }
            });
        }
    });
    
     // Delete 
 $('.delete').click(function(){
   var el = this;
  
   // Delete id
   var deleteid = $(this).attr("id");
 
   var confirmalert = confirm("Are you sure?");
   if (confirmalert == true) {
      // AJAX Request
      $.ajax({
        url: 'delete_form_student_list.php',
        type: 'POST',
        data: { id:deleteid },
        success: function(response){

          if(response == 1){
	    // Remove row from HTML Table
	    $(el).closest('tr').css('background','tomato');
	    $(el).closest('tr').fadeOut(800,function(){
	       $(this).remove();
	    });
          }else{
	    alert('Invalid ID.');
          }

        }
      });
   }

 });
    

});
 </script> 
 
 
 
</body>

</html>
