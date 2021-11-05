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
            
            <div class="card shadow mb-4">
              <input type="button" class="btn btn-success" onclick="printDiv('printableArea')" value="Print Report" />
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Out of Stocked Product</h4>
            </div>
            <div class="card-body" id="printableArea">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                     <th>Product Code</th>
                     <th>Name</th>
                     <th>Price</th>
                     <th>Category</th>
                     <th>Supplier Name</th>
                     <th>Supplier Phone</th>
                   </tr>
               </thead>
          <tbody>

<?php                  
    $query = 'SELECT PRODUCT_ID, PRODUCT_CODE,SUPPLIER_ID, NAME, PRICE, CNAME, DATE_STOCK_IN FROM product p  join category c on p.CATEGORY_ID=c.CATEGORY_ID WHERE QTY_STOCK=0 GROUP BY PRODUCT_CODE ';

        $result = mysqli_query($db, $query) or die (mysqli_error($db));
            while ($row = mysqli_fetch_assoc($result)) {
                                 
                echo '<tr>';
                echo '<td>'. $row['PRODUCT_CODE'].'</td>';
                echo '<td>'. $row['NAME'].'</td>';
                echo '<td>'. $row['PRICE'].'</td>';
                echo '<td>'. $row['CNAME'].'</td>';

                $query1 = 'SELECT SUPPLIER_ID, COMPANY_NAME, PHONE_NUMBER FROM supplier WHERE SUPPLIER_ID='.$row['SUPPLIER_ID'].'';
                $result1 = mysqli_query($db, $query1) or die (mysqli_error($db));
                $row1 = mysqli_fetch_assoc($result1);

                echo '<td>'. $row1['COMPANY_NAME'].'</td>';
                echo '<td>'. $row1['PHONE_NUMBER'].'</td>';
                echo '</tr> ';
                        }
?> 
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                  </div>
<script>
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
<?php
include'../includes/footer.php';
?>

