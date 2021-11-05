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

            <div class="card shadow mb-4" >
              <input type="button" class="btn btn-success" onclick="printDiv('printableArea')" value="Print Report" />
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Sales Report</h4>
            </div>
            <div class="card-body" id="printableArea">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                     <th width="19%">Transaction Number</th>
                     <th>Transaction Time</th>
                     <th>Customer</th>
                     <th width="13%">Number of Items</th>
                     <th width="13%">Total Amount</th>
                   </tr>
               </thead>
          <tbody>

<?php      

    $query = 'SELECT *, FIRST_NAME, LAST_NAME,GRANDTOTAL
              FROM transaction T
              JOIN customer C ON T.`CUST_ID`=C.`CUST_ID`
              ORDER BY TRANS_D_ID ASC';
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
            $tot = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                                 
                echo '<tr>';
                echo '<td>'. $row['TRANS_D_ID'].'</td>';
                echo '<td>'. $row['DATE'].'</td>';
                echo '<td>'. $row['FIRST_NAME'].' '. $row['LAST_NAME'].'</td>';
                echo '<td>'. $row['NUMOFITEMS'].'</td>';
                echo '<td>'. $row['GRANDTOTAL'].'</td>';
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
