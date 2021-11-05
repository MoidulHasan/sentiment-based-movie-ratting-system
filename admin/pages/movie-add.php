<?php
  include'../includes/connection.php';

  $movie_name = $_POST['movie_name'];
  $categorys = $_POST['categorys'];
  $movie_language = $_POST['movie_language'];
  $movie_trailerlink = $_POST['movie_trailerlink'];
  $movie_length = $_POST['movie_length'];
  $artist_name = $_POST['artist_name'];
  $directors_name = $_POST['directors_name'];
  $writers_name = $_POST['writers_name'];
  $dateofrelease = $_POST['dateofrelease'];
  $short_description = $_POST['short_description'];
  $full_description = $_POST['full_description'];
  $movie_image = basename($_FILES["movie_image"]["name"]);

  $targetDir = "uploads/";
  $fileName = basename($_FILES["movie_image"]["name"]);
  $targetFilePath = $targetDir . $fileName;
  $targetDirtomove = "../../uploads/". $fileName;
  //move_uploaded_file($_FILES["movie_image"]["tmp_name"], $targetFilePath);
  if(move_uploaded_file($_FILES["movie_image"]["tmp_name"], $targetDirtomove)){
    $query = "INSERT INTO movie_details( movie_name, movie_short_descriptions, movie_full_descriptions, Categorys, movie_length, artist_name, directors_name, writers_name, dateofrelease, movie_image, movie_language, trailerlink) VALUES ('$movie_name', '$short_description', '$full_description', '$categorys', '$movie_length', '$artist_name', '$directors_name', '$writers_name', '$dateofrelease', '$targetFilePath', '$movie_language', '$movie_trailerlink')";

    mysqli_query($db,$query)or die (mysqli_error($db));
    echo "Success";
    header("Location: http://localhost/software-engineering/sentiment-based-movie-rating/Movie/admin/pages/movie-list.php");
  }
  else{
    echo "Failed to move file";
  }
?>