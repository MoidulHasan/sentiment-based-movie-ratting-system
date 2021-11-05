<?php
	session_start();
	include 'admin/includes/connection.php';
	$sql = "SELECT  * FROM movie_details";
	$result = mysqli_query($db, $sql) or die ("Bad SQL: $sql");
?>
<!DOCTYPE html>
<html lang="en">

<style type="text/css">
	
	@charset "UTF-8";
@import url(https://fonts.googleapis.com/css?family=Montserrat:400,700);
@import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

body .card {
  width: 800px;
  height: 400px;
  background: transparent;
  
  left: 0;
  right: 0;
  margin: auto;
  top: 0;
  bottom: 0;
  border-radius: 10px;
  -webkit-border-radius: 10px;
  -moz-border-radius: 10px;
  box-shadow: 0px 20px 30px 3px rgba(0, 0, 0, 0.55);
}
body .card_left {
  width: 40%;
  height: 400px;
  float: left;
  overflow: hidden;
  background: transparent;
}
body .card_left img {
  width: 100%;
  height: auto;
  border-radius: 10px 0 0 10px;
  -webkit-border-radius: 10px 0 0 10px;
  -moz-border-radius: 10px 0 0 10px;
  position: relative;
}
body .card_right {
  width: 60%;
  float: left;
  background: #000000;
  height: 400px;
  border-radius: 0 10px 10px 0;
  -webkit-border-radius: 0 10px 10px 0;
  -moz-border-radius: 0 10px 10px 0;
}
body .card_right h1 {
  color: white;
  font-family: "Montserrat", sans-serif;
  font-weight: 400;
  text-align: left;
  font-size: 40px;
  margin: 30px 0 0 0;
  padding: 0 0 0 40px;
  letter-spacing: 1px;
}
body .card_right__details ul {
  list-style-type: none;
  padding: 0 0 0 40px;
  margin: 10px 0 0 0;
}
body .card_right__details ul li {
  display: inline;
  color: #e3e3e3;
  font-family: "Montserrat", sans-serif;
  font-weight: 400;
  font-size: 14px;
  padding: 0 40px 0 0;
}
body .card_right__rating__stars {
  position: relative;
  right: 160px;
  margin: 10px 0 10px 0;
  /***** CSS Magic to Highlight Stars on Hover *****/
  /* hover previous stars in list */
}
body .card_right__rating__stars fieldset, body .card_right__rating__stars label {
  margin: 0;
  padding: 0;
}
body .card_right__rating__stars .rating {
  border: none;
}
body .card_right__rating__stars .rating > input {
  display: none;
}
body .card_right__rating__stars .rating > label:before {
  margin: 5px;
  font-size: 1.25em;
  display: inline-block;
  content: "";
  font-family: FontAwesome;
}
body .card_right__rating__stars .rating > .half:before {
  content: "";
  position: absolute;
}
body .card_right__rating__stars .rating > label {
  color: #ddd;
  float: right;
}
body .card_right__rating__stars .rating > input:checked ~ label,
body .card_right__rating__stars .rating:not(:checked) > label:hover,
body .card_right__rating__stars .rating:not(:checked) > label:hover ~ label {
  color: #FFD700;
}
body .card_right__rating__stars .rating > input:checked + label:hover,
body .card_right__rating__stars .rating > input:checked ~ label:hover,
body .card_right__rating__stars .rating > label:hover ~ input:checked ~ label,
body .card_right__rating__stars .rating > input:checked ~ label:hover ~ label {
  color: #FFED85;
}
body .card_right__review p {
  color: white;
  font-family: "Montserrat", sans-serif;
  font-size: 12px;
  padding: 0 40px 0 40px;
  letter-spacing: 1px;
  margin: 10px 0 10px 0;
  line-height: 20px;
}
body .card_right__review a {
  text-decoration: none;
  font-family: "Montserrat", sans-serif;
  font-size: 14px;
  padding: 0 0 0 40px;
  color: #ffda00;
  margin: 0;
}
body .card_right__button {
  padding: 0 0 0 40px;
  margin: 30px 0 0 0;
}
body .card_right__button a {
  color: #ffda00;
  text-decoration: none;
  font-family: "Montserrat", sans-serif;
  border: 2px solid #ffda00;
  padding: 10px 10px 10px 40px;
  font-size: 12px;
  background: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/343086/COMdoWZ.png);
  background-size: 12px 12px;
  background-repeat: no-repeat;
  background-position: 7% 50%;
  border-radius: 5px;
  transition-property: all;
  transition-duration: 0.5s;
}
body .card_right__button a:hover {
  color: #000000;
  background-color: #ffda00;
  background-image: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/343086/rFQ5dHA.png);
  background-size: 12px 12px;
  background-repeat: no-repeat;
  background-position: 10% 50%;
  cursor: pointer;
  transition-property: all;
  transition-duration: 0.5s;
}

#searchmovie {
  background-image: url('/css/searchicon.png'); /* Add a search icon to input */
  background-position: 10px 12px; /* Position the search icon */
  background-repeat: no-repeat; /* Do not repeat the icon image */
  width: 100%; /* Full-width */
  font-size: 16px; /* Increase font-size */
  padding: 12px 20px 12px 40px; /* Add some padding */
  border: 1px solid #ddd; /* Add a grey border */
  margin-bottom: 12px; /* Add some space below the input */
}
</style>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		
		<title>Movie Review | Review</title>

		<!-- Loading third party fonts -->
		<link href="http://fonts.googleapis.com/css?family=Roboto:300,400,700|" rel="stylesheet" type="text/css">
		<link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">

		<!-- Loading main css file -->
		<link rel="stylesheet" href="style.css">
		
		<!--[if lt IE 9]>
		<script src="js/ie-support/html5.js"></script>
		<script src="js/ie-support/respond.js"></script>
		<![endif]-->

	</head>


	<body>
		
		<div id="demo">
			
		</div>
		<div id="site-content">
			<header class="site-header">
				<div class="container">
					<a href="index.php" id="branding">
						<img src="images/logo.png" alt="" class="logo">
						<div class="logo-copy">
							<h1 class="site-title">Movie Review</h1>
							<small class="site-description">Feedback About Your Favorite Movie Here</small>
						</div>
					</a> <!-- #branding -->

					<div class="main-navigation">
						<button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
						<ul class="menu">
			              <li class="menu-item"><a href="index.php">Home</a></li>
			              <li class="menu-item current-menu-item"><a href="review.php">Movie reviews</a></li>
			              <?php
			                //session_start();
			                if(isset($_SESSION['user_name']))
			                {
			                  echo"<li class='menu-item'><a href='logout.php'>Logout</a></li>";
			                }
			                else{
			                  echo"<li class='menu-item'><a href='login.php'>Login</a></li>";
			                  echo "<li class='menu-item'><a href='register.php'>Register</a></li>";
			                }
			              ?>
			            </ul> <!-- .menu -->

					</div> <!-- .main-navigation -->

					<div class="mobile-navigation"></div>
				</div>
			</header>
			<main class="main-content">
				<div class="container">
					
					<div class="raw">
						<div class="col-md-12">
							<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			                  <tbody>
			                  	<?php
					            while ($row = mysqli_fetch_assoc($result)) {
					                echo '<tr>';
					                	echo '<td>';

					                	echo "

					                		<div class='card'>
											  <div class='card_left'>
											    <img src='".$row['movie_image']."'>
											  </div>
											  <div class='card_right'>
											  <a href='movie.php?movie_id=".$row['movie_id']."' target='_blank'><h1>".$row['movie_name']."</h1></a>
											    <div class='card_right__details'>
											      	<ul>
											        	<li>".$row['dateofrelease']."</li>
											        	<li>".$row['movie_length']." min</li>
											        	<li>".$row['Categorys']."</li>
											      	</ul>

											      	<ul>
											      		<li><strong>Rating:</strong> ".$row['movie_rating']."/5</li>
											      		<li><strong>Language:</strong> ".$row['movie_language']."</li>
													</ul>

											      <div class='card_right__review'>
											        <p>".$row['movie_short_descriptions']."</p>
											        <a href='movie.php?movie_id=".$row['movie_id']."' target='_blank'>Read more</a>
											      </div>
											      <div class='card_right__button'>
											        <a href='".$row['trailerlink']."' target='_blank'>WATCH TRAILER</a>
											      </div>
											    </div>
											  </div>
											</div>

					                	";
					                	echo "<br>";
					                	echo '</td>';
					            	echo '</tr>';
		                        }
	                            ?>
			                  </tbody>
			                </table>
						</div>
						
					</div>
				</div>

			</main>
			<footer class="site-footer">
				<div class="container">
					<div class="colophon">All rights reserved</div>
				</div> <!-- .container -->
			</footer>
		</div>
		<!-- Default snippet for navigation -->
		


		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>
		
	</body>

</html>

<script type="text/javascript">
	function MakeRequest(id)
	{
	    $.ajax({
	        url : 'movie-card.php',
	        data:{"id":id},
	        type: 'GET',

	        success: function(data){
	            $('#ResponseDiv').html(data);
	        }
	    });
	}
	$(document).ready(function() {
    var movie_id = $(this).attr("id");
    if (movie_id != '') {
        $.ajax({
            url: "movie-card.php",
            method: "GET",
            data: {
                movie_id: movie_id
            },
            success: function(data) {
                $('#movie_detail').html(data);
                $('#dataModal').modal('show');
                $(this).remove();
            }
        });
      }
    });


</script>