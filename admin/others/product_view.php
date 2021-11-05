<?php
if (isset($_POST["id"])) {
    $output = '';
    include'../includes/connection.php'; // MySQL Connection
    //"SELECT * FROM product WHERE PRODUCT_ID = '" . $_POST["id"] . "'";
    //$query  = "SELECT * FROM product WHERE PRODUCT_ID ='" .$_POST["id"]. "'";
    $query  = "SELECT product.PRODUCT_CODE, product.NAME, product.PRICE, category.CNAME FROM product INNER JOIN category ON product.CATEGORY_ID=category.CATEGORY_ID WHERE PRODUCT_ID ='" .$_POST["id"]. "'";
    $result = mysqli_query($db, $query);
    $output .= '  
      <div class="table-responsive">  
           <table class="table table-striped">';
    while ($row = mysqli_fetch_array($result)) {

        $output .= '  
                <tr>  
                     <td width="30%"><label>Product Code</label></td>  
                     <td width="70%">' . $row["PRODUCT_CODE"] . '</td>  
                </tr>   
                <tr>  
                     <td width="30%"><label>Name</label></td>  
                     <td width="70%">' . $row["NAME"] . '</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Price</label></td>  
                     <td width="70%">' . $row["PRICE"] . '</td>  
                </tr>  

                <tr>  
                     <td width="30%"><label>Company Name</label></td>  
                     <td width="70%">' . $row["CNAME"] . '</td>  
                </tr>  
                
                
                
                
           ';
    }
    $output .= '  
           </table>  
      </div>  
      ';
    echo $output;
}
?>