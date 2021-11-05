<?php
  include'admin/includes/connection.php';
  $username = $_POST['username'];
  $password = $_POST['password'];
  $Gender = $_POST['Gender']; 


  $sql_u = "SELECT * FROM user WHERE user_name='$username'";
  $res_u = mysqli_query($db, $sql_u);
  if (mysqli_num_rows($res_u) > 0) {
      echo '<script type="text/javascript">alert("Sorry... username already taken");history.go(-1);</script>';
    }
    else{
          $query = "INSERT INTO user(user_name, user_id, user_password, user_type, gender) VALUES ('$username',NULL,sha1('{$password}'),'2','$Gender')";
          mysqli_query($db,$query)or die ('Error in updating users in '. $query);
          if(mysqli_query($db,$query) )
          {
              echo '<script type="text/javascript">
              alert("Registration Compleate!!");window.location.href = "login.php";
              </script>';
          }
           else{
            echo "ERROR: Could not able to execute . " . mysqli_error($db);
          }

        }

?>