<?php
include'../includes/connection.php';
if (isset($_POST["movie_id"])) {
    $query  = "SELECT * FROM movie_details WHERE movie_id = '" . $_POST["movie_id"] . "'";
    $result = mysqli_query($db, $query);
    $row    = mysqli_fetch_array($result);
    echo json_encode($row);
}
else{
	echo "failed1";
}
?>