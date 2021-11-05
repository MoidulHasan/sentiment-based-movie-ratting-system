<?php
	include'../includes/connection.php';
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
		
		<!--[if lt IE 9]>
		<script src="js/ie-support/html5.js"></script>
		<script src="js/ie-support/respond.js"></script>
		<![endif]-->

	</head>


	<body>
		
		<div id="site-content">

			<main class="main-content">
				<div class="container">
					<div class="page">

						<div class="content">
							<div class="row">
								<div class="col-md-6">

									
									<figure class="movie-poster"><img src="<?php echo "../../".$row['movie_image'];?>" alt="#" width="100%" height="200%"></figure>

								</div>
								<div class="col-md-6">
									<h2 class="movie-title"><?php echo $row['movie_name'];?></h2>
									<div class="movie-summary">
										<pre><?php echo $row['movie_short_descriptions'];?></pre>
									</div>
									<ul class="movie-meta">
										<li><strong>Rating:</strong> 
											<?php echo $row['movie_rating'];?>/10(Reviewed  By <?php echo $number_of_review; ?> User)
										</li>
										<li><strong>Length:</strong> <?php echo $row['movie_length'];?></li>
										<li><strong>Released On:</strong> <?php echo $row['dateofrelease'];?></li>
										<li><strong>Category:</strong> <?php echo $row['Categorys'];?></li>
										<li><strong>Language:</strong> <?php echo $row['movie_language'];?></li>
									</ul>

									<ul class="starring">
										<li><strong>Directors:</strong> <?php echo $row['directors_name'];?></li>
										<li><strong>Writers:</strong> <?php echo $row['writers_name'];?></li>
										<li><strong>Stars:</strong> <?php echo $row['artist_name'];?></li>
									</ul>
								</div>
							</div> <!-- .row -->
							<div class="entry-content">
								<pre>
									<?php echo $row['movie_full_descriptions'];}?>
								</pre>
							</div>
						</div>
					</div>
				</div> <!-- .container -->
			</main>
			
		</div>
		<!-- Default snippet for navigation -->
		


		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>
		
	</body>

</html>