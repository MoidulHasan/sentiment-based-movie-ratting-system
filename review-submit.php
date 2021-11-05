<?php
session_start();
include'admin/includes/connection.php';
$comment = $_POST['comment'];
$movie_id = $_POST['movie_id'];
$userid = $_SESSION['user_id'];
$username = $_SESSION['user_name'];
//echo $_POST['comment'];
//echo $_POST['movie_id'];
$query = "INSERT INTO review(review_id, user_id, movie_id, review_text, username)  
           VALUES(NULL, '$userid', '$movie_id', '$comment', '$username');";  
if ($db->query($query) === TRUE) {
        //echo "inserted";
		include ('sentiment-analysis/lib/sentiment_analyser.class.php');
		$sa = new SentimentAnalysis();
		$sa->initialize();
		$check = $sa->analyse($comment);
		$rating = $sa->return_sentiment_rating();
		$sql1 = "SELECT * FROM review WHERE movie_id=".$movie_id;
		$mysqliStatus = $db->query($sql1);
		$number_of_review = mysqli_num_rows($mysqliStatus);
		$newrating = $rating/$number_of_review;
		$sql = "SELECT  movie_rating FROM movie_details WHERE movie_id=".$movie_id;
		$result = mysqli_query($db, $sql) or die ("Bad SQL: $sql");
		$row = mysqli_fetch_assoc($result);
		$newrating+= $row['movie_rating'];
		//echo $newrating;
		$newrating = number_format((float) $newrating, 1, '.', ''); 
		//echo $newrating;
		$query1 = "UPDATE movie_details SET 
           movie_rating='$newrating'
           WHERE movie_id=".$_POST["movie_id"];
		if ($db->query($query1) === TRUE) {
		        header('Location: ' . $_SERVER['HTTP_REFERER']);
		      } else {
		        echo "Error updating record: " . $db->error;
		      }
      } else {
        echo "Error updating record: " . $db->error;
      }

//echo $rating;
//echo $userid;
//echo $username;


?>