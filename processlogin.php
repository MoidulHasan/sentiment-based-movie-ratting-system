<?php
require('admin/includes/connection.php');
require('admin/pages/session.php');
if (isset($_POST['btnlogin'])) {
  $users = trim($_POST['user']);
  $upass = trim($_POST['password']);
  $h_upass = sha1($upass);
if ($upass == ''){
     ?>    <script type="text/javascript">
                alert("Password is missing!");
                window.location = "login.php";
                </script>
        <?php
}else{
//create some sql statement             
        $sql = "SELECT * FROM  `user`
        WHERE  `user_name` ='" . $users . "' AND  `user_password` =  '" . $h_upass . "'";
        $result = $db->query($sql);

        if ($result){
        //get the number of results based n the sql statement
        //check the number of result, if equal to one   
        //IF theres a result
            if ( $result->num_rows > 0) {
                //store the result to a array and passed to variable found_user
                $found_user  = mysqli_fetch_array($result);
                //fill the result to session variable
                $_SESSION['login']  = 1; 
                $_SESSION['user_name'] = $found_user['user_name']; 
                $_SESSION['user_type']  =  $found_user['user_type'];
                $_SESSION['gender']  =  $found_user['gender'];
                $_SESSION['user_id']  =  $found_user['user_id'];


        //this part is the verification if admin or user
        if ($_SESSION['user_type']==1){
           
             ?>    <script type="text/javascript">
                      //then it will be redirected to index.php
                      alert("<?php echo  $_SESSION['user_name']; ?> Welcome!");
                      window.location = "admin/";
                  </script>
             <?php        
           
        }elseif ($_SESSION['user_type']==2){
           
             ?>    <script type="text/javascript">
                      //then it will be redirected to index.php
                      alert("<?php echo  $_SESSION['user_name']; ?> Welcome!");
                      window.location = "index.php";
                  </script>
             <?php        
           
        }
            } else {
            //IF theres no result
              ?>
                <script type="text/javascript">
                alert("Username or Password Not Registered! Contact Your administrator.");
                window.location = "index.php";
                </script>
              <?php

            }

         } else {
                 # code...
        echo "Error: " . $sql . "<br>" . $db->error;
        }
        
    }       
} 
 $db->close();
?>