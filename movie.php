<?php
	include'admin/includes/connection.php';
	$movie_id = $_GET['movie_id'];

	$sql1 = "SELECT * FROM review WHERE movie_id=".$movie_id;
	$mysqliStatus = $db->query($sql1);
	$number_of_review = mysqli_num_rows($mysqliStatus);
	 

	$sql = "SELECT  * FROM movie_details WHERE movie_id=".$movie_id;
	$result = mysqli_query($db, $sql) or die ("Bad SQL: $sql");
	while ($row = mysqli_fetch_assoc($result)) {
?>
<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		
		<title>Movie Review | Single</title>

		<!-- Loading third party fonts -->
		<link href="http://fonts.googleapis.com/css?family=Roboto:300,400,700|" rel="stylesheet" type="text/css">
		<link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">

		<!-- Loading main css file -->
		<link rel="stylesheet" href="style.css">
		


	</head>

	<body>
		<div id="site-content">
			<header class="site-header">
				<div class="container">
					<a href="index.php" id="branding">
						<img src="images/logo.png" alt="" class="logo">
						<div class="logo-copy">
							<h1 class="site-title">Company Name</h1>
							<small class="site-description">Tagline goes here</small>
						</div>
					</a> <!-- #branding -->

					<div class="main-navigation">
						<button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
						<ul class="menu">
			              <li class="menu-item current-menu-item"><a href="index.php">Home</a></li>
			              <li class="menu-item"><a href="review.php">Movie reviews</a></li>
			              <?php
			                session_start();
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
					<div class="page">
						<div class="breadcrumbs">
							<a href="index.php">Home</a>
							<a href="review.php">Movie Review</a>
							<span><?php echo $row['movie_name'];?></span>
						</div>

						<div class="content">
							<div class="row">
								<div class="col-md-6">
									<figure class="movie-poster"><img src="<?php echo $row['movie_image'];?>" alt="#"></figure>
								</div>
								<div class="col-md-6">
									<h2 class="movie-title"><?php echo $row['movie_name'];?></h2>
									<div class="movie-summary">
										<pre><?php echo $row['movie_short_descriptions'];?></pre>
									</div>
									<ul class="movie-meta">
										<li><strong>Rating:</strong> 
											<?php echo $row['movie_rating'];?>/5(Reviewed By <?php echo $number_of_review; ?> User)
										</li>
										<li><strong>Language:</strong> <?php echo $row['movie_language'];?></li>
										<li><strong>Length:</strong> <?php echo $row['movie_length'];?></li>
										<li><strong>Released On:</strong> <?php echo $row['dateofrelease'];?></li>
										<li><strong>Category:</strong> <?php echo $row['Categorys'];?></li>
									</ul>

									<ul class="starring">
										<li><strong>Directors:</strong> <?php echo $row['directors_name'];?></li>
										<li><strong>Writers:</strong> <?php echo $row['writers_name'];?></li>
										<li><strong>Stars:</strong> <?php echo $row['artist_name'];?></li>
									</ul>
								</div>
							</div> <!-- .row -->

							<!-- Full Descriptions -->
							<div class="entry-content">
								<pre>
									<?php echo $row['movie_full_descriptions'];}?>
								</pre>
							</div>

							

							<!-- Comments -->
							<div class="row" style="margin-top:40px; margin-bottom:40px;">
								<hr >
									<h1><small class="pull-right"> <?php echo $number_of_review; ?> review</small> Reviews </h1>
									<!-- Comments Box -->
									<div class="col-md-12">
				                    <form  action="review-submit.php" method="post">
				                    	<input type="hidden" name="movie_id" value=" <?php echo $movie_id; ?>">
				                    	<input type="submit"value="Save" style="float: right" />
										<div style="overflow: hidden; padding-right: .5em;">
										   <input type="text" style="width: 100%;" name="comment"  placeholder="Enter your review here..." />
										</div>
				                    </form>
								</div>
							</div>
							
						<?php 
							$result2 = mysqli_query($db, $sql1) or die ("Bad SQL: $sql");
							while ($row1 = mysqli_fetch_assoc($result2)) {
                        
								echo "<div class='row' >
										<h6 class='pull-right'>".$row1['review_date']."</h6>
										<h4 style='margin-bottom:0px;'>".$row1['username']."</h3>
										<p>
											".$row1['review_text']."
										</p>
								</div>";
							}
						?>

						</div>

					
						


					</div>
				</div> <!-- .container -->
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
