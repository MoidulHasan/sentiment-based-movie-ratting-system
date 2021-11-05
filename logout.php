<?php

session_start();

// 2. Unset all the session variables
unset($_SESSION['login']);
unset($_SESSION['user_name']);
unset($_SESSION['user_type']);
unset($_SESSION['gender']);
unset($_SESSION['user_id']);
?>
<script type="text/javascript">
    window.location = "login.php";
</script>