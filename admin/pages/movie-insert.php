<?php  
 include'../includes/connection.php'; // MySQL Connection
 if(!empty($_POST))  
 {  
      $output             =  '';  
      $message            =  '';  
      $movie_name         =  mysqli_real_escape_string($db, $_POST["movie_name"]);  
      $categorys          =  mysqli_real_escape_string($db, $_POST["categorys"]);  
      $movie_language     =  mysqli_real_escape_string($db, $_POST["movie_language"]);  
      $movie_trailerlink  =  mysqli_real_escape_string($db, $_POST["movie_trailerlink"]); 
      $movie_length       =  mysqli_real_escape_string($db, $_POST["movie_length"]);  
      $artist_name        =  mysqli_real_escape_string($db, $_POST["artist_name"]);  
      $directors_name     =  mysqli_real_escape_string($db, $_POST["directors_name"]);  
      $writers_name       =  mysqli_real_escape_string($db, $_POST["writers_name"]);  
      $dateofrelease      =  mysqli_real_escape_string($db, $_POST["dateofrelease"]);  
      $movie_short_descriptions  =  mysqli_real_escape_string($db, $_POST["movie_short_descriptions"]);  
      $movie_full_descriptions   =  mysqli_real_escape_string($db, $_POST["movie_full_descriptions"]);  


      if($_POST["movie_id"] != '')  
      {  
           $query = "  
           UPDATE movie_details   
           SET 
           movie_name='$movie_name',   
           categorys='$categorys',   
           movie_language='$movie_language',  
           trailerlink='$movie_trailerlink',
           movie_length='$movie_length',   
           artist_name='$artist_name',   
           directors_name='$directors_name',   
           writers_name='$writers_name',   
           dateofrelease='$dateofrelease',   
           movie_short_descriptions='$movie_short_descriptions',   
           movie_full_descriptions='$movie_full_descriptions'

           WHERE movie_id=".$_POST["movie_id"];  
           $message = 'Data Updated';  
      }  
      else  
      {  
           $query = "  
           INSERT INTO movie_details(movie_name, categorys, movie_length, artist_name, directors_name, writers_name, dateofrelease, movie_short_descriptions, movie_full_descriptions)  
           VALUES('$movie_name', '$categorys', '$movie_length', '$artist_name', '$directors_name', '$writers_name', '$dateofrelease', '$movie_short_descriptions', '$movie_full_descriptions');  
           ";  
           $message = 'Data Inserted';  
      }  
      if ($db->query($query) === TRUE) {
        $output = $message; 
      } else {
        echo "Error updating record: " . $db->error;
      }


      echo $output;  
 }  
 ?>