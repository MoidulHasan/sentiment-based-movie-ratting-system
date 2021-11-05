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

  $query = 'DELETE FROM product WHERE PRODUCT_ID ='.$_GET['id'];
  if(mysqli_query($db, $query)){
    ?>
    <script type="text/javascript">
        alert("Product Successfully Deleted.");
        window.location = "product.php";
    </script>
    <?php
  }
  else{
    ?>
    <script type="text/javascript">
        alert("Product NOT Deleted.");
        window.location = "product.php";
    </script>
    <?php
  }

?>
