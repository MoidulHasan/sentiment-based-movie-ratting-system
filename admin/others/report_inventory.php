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
            ?>
            
            <div class="card shadow mb-4">
              <input type="button" class="btn btn-success" onclick="printDiv('printableArea')" value="Print Report" />
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Inventory Report</h4>
            </div>
            <div class="card-body" id="printableArea">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                     <th>Product Code</th>
                     <th>Name</th>
                     <th>Quantity</th>
                     <th>On Hand</th>
                     <th>Category</th>
                     <th>Date Stock In</th>
                   </tr>
               </thead>
          <tbody>

<?php                  
    $query = 'SELECT PRODUCT_ID, PRODUCT_CODE, NAME, COUNT(`QTY_STOCK`) AS "QTY_STOCK", COUNT(`ON_HAND`) AS "ON_HAND", CNAME, DATE_STOCK_IN FROM product p join category c on p.CATEGORY_ID=c.CATEGORY_ID GROUP BY PRODUCT_CODE';
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
            while ($row = mysqli_fetch_assoc($result)) {
                                 
                echo '<tr>';
                echo '<td>'. $row['PRODUCT_CODE'].'</td>';
                echo '<td>'. $row['NAME'].'</td>';
                echo '<td>'. $row['QTY_STOCK'].'</td>';
                echo '<td>'. $row['ON_HAND'].'</td>';
                echo '<td>'. $row['CNAME'].'</td>';
                echo '<td>'. $row['DATE_STOCK_IN'].'</td>';
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
