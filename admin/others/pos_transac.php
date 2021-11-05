<?php
include'../includes/connection.php';
session_start();

              $date = $_POST['date'];
              $customer = $_POST['customer'];
              $subtotal = $_POST['subtotal'];
              $lessvat = $_POST['lessvat'];
              $netvat = $_POST['netvat'];
              $addvat = $_POST['addvat'];
              $total = $_POST['total'];
              $cash = $_POST['cash'];
              $emp = $_POST['employee'];
              $rol = $_POST['role'];
              //imma make it trans uniq id
              $today = date("mdGis"); 
              
              $countID = count($_POST['name']);

              // echo "<table>";
              switch($_GET['action']){
                case 'add':  
                for($i=1; $i<=$countID; $i++)
                  {
                    // echo "'{$today}', '".$_POST['name'][$i-1]."', '".$_POST['quantity'][$i-1]."', '".$_POST['price'][$i-1]."', '{$emp}', '{$rol}' <br>";

                    $query = "INSERT INTO `transaction_details`
                               (`ID`, `TRANS_D_ID`, `PRODUCTS`, `QTY`, `PRICE`, `EMPLOYEE`, `ROLE`)
                               VALUES (Null, '{$today}', '".$_POST['name'][$i-1]."', '".$_POST['quantity'][$i-1]."', '".$_POST['price'][$i-1]."', '{$emp}', '{$rol}')";

                    mysqli_query($db,$query)or die (mysqli_error($db));

                    }
                    $query111 = "INSERT INTO `transaction`
                               (`TRANS_ID`, `CUST_ID`, `NUMOFITEMS`, `SUBTOTAL`, `LESSVAT`, `NETVAT`, `ADDVAT`, `GRANDTOTAL`, `CASH`, `DATE`, `TRANS_D_ID`)
                               VALUES (Null,'{$customer}','{$countID}','{$subtotal}','{$lessvat}','{$netvat}','{$addvat}','{$total}','{$cash}','{$date}','{$today}')";
                    mysqli_query($db,$query111)or die (mysqli_error($db));
                    $qryforid = "SELECT TRANS_ID FROM transaction ORDER BY TRANS_ID DESC LIMIT 1";
                    $tid=mysqli_query($db,$qryforid)or die (mysqli_error($db));
                    $trid=0;
                    while ($row = $tid->fetch_assoc()) {
                      $trid=$row['TRANS_ID'];
                    }
                break;
              }
                    unset($_SESSION['pointofsale']);
                    

              $query = 'SELECT ID, t.TYPE FROM users u JOIN type t ON t.TYPE_ID=u.TYPE_ID WHERE ID = '.$_SESSION['MEMBER_ID'].'';
              $result = mysqli_query($db, $query) or die (mysqli_error($db));
          while ($row = mysqli_fetch_assoc($result)) {
            $Aa = $row['TYPE'];
                   
          if ($Aa=='User'){
                    header("Location: trans_view1.php?action=edit & id=$trid");
                  }
                  else{
                    header("Location: trans_view.php?action=edit & id=$trid");
                  }
                }
               ?>
              
          </div>
          