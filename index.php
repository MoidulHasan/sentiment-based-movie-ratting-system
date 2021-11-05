<?php
  include 'admin/includes/connection.php';
  $topbangla = "SELECT  * FROM movie_details WHERE movie_language='Bangla' ORDER BY movie_rating";
  $resulttopbangla = mysqli_query($db, $topbangla) or die ("Bad SQL: $sql");
  $topenglish = "SELECT  * FROM movie_details WHERE movie_language='English' ORDER BY movie_rating";
  $resulttopenglish = mysqli_query($db, $topenglish) or die ("Bad SQL: $sql");
  $tophindi = "SELECT  * FROM movie_details WHERE movie_language='Hindi' ORDER BY movie_rating";
  $resulttophindi = mysqli_query($db, $tophindi) or die ("Bad SQL: $sql");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
    
    <title>Movie Review</title>

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
            <div class="row">
              <div class="col-md-9">
                <div class="slider">
                  <ul class="slides">
                    <li><a href="http://localhost/software-engineering/sentiment-based-movie-rating/Movie/movie.php?movie_id=19"><img src="dummy/slide-1.jpg"  alt="Slide 1"></a></li>
                    <li><a href="http://localhost/software-engineering/sentiment-based-movie-rating/Movie/movie.php?movie_id=18"><img src="dummy/slide-2.jpg"  alt="Slide 2"></a></li>
                    <li><a href="http://localhost/software-engineering/sentiment-based-movie-rating/Movie/movie.php?movie_id=15"><img src="dummy/slide-3.jpg" alt="Slide 3"></a></li>
                    <li><a href="http://localhost/software-engineering/sentiment-based-movie-rating/Movie/movie.php?movie_id=17"><img src="dummy/slide-4.png"  alt="Slide 2"></a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-3">
                <div class="row">
                  <div class="col-sm-6 col-md-12">
                    <div class="latest-movie">
                      <a href="http://localhost/software-engineering/sentiment-based-movie-rating/Movie/movie.php?movie_id=14"><img src="dummy/thumb-1.jpg" alt="Movie 1"></a>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-12">
                    <div class="latest-movie">
                      <a href="http://localhost/software-engineering/sentiment-based-movie-rating/Movie/movie.php?movie_id=20"><img src="dummy/thumb-2.jpg" alt="Movie 2"></a>
                    </div>
                  </div>
                </div>
              </div>
            </div> <!-- .row -->

            
            <div class="row">
              <div class="col-md-4">
                <?php 
                $i = 0;
                while ($row = mysqli_fetch_assoc($resulttopbangla)) {
                    echo "<div class='latest-movie'>";
                    if($i==0)
                    {
                      echo "<a href='movie.php?movie_id=".$row['movie_id']."'><img src='".$row['movie_image']."' alt='Top Bangla Movie'></a>
                      </div>
                      <h2 class='section-title'>Top Bangla Movie</h2>
                      <ul class='movie-schedule'>";
                    }
                    echo "<li>
                    <div class='date'>".$row['movie_rating']."/5</div>
                    <h2 class='entry-title'><a href='movie.php?movie_id=".$row['movie_id']."'>".$row['movie_name']."</a></h2>
                  </li>";
                      $i++;
                      if($i==3) break;
                    }
                  
                ?>
                </ul> <!-- .movie-schedule -->
              </div>

              <div class="col-md-4">
                <?php 
                $i = 0;
                while ($row = mysqli_fetch_assoc($resulttopenglish)) {
                    echo "<div class='latest-movie'>";
                    if($i==0)
                    {
                      echo "<a href='movie.php?movie_id=".$row['movie_id']."'><img src='".$row['movie_image']."' alt='Top English Movie' ></a>
                      </div>
                      <h2 class='section-title'>Top English Movie</h2>
                      <ul class='movie-schedule'>";
                    }
                    echo "<li>
                    <div class='date'>".$row['movie_rating']."/5</div>
                    <h2 class='entry-title'><a href='movie.php?movie_id=".$row['movie_id']."'>".$row['movie_name']."</a></h2>
                  </li>";
                      $i++;
                      if($i==3) break;
                    }
                  
                ?>
                </ul> <!-- .movie-schedule -->
              </div>

              <div class="col-md-4">
                <?php 
                $i = 0;
                while ($row = mysqli_fetch_assoc($resulttophindi)) {
                    echo "<div class='latest-movie'>";
                    if($i==0)
                    {
                      echo "<a href='movie.php?movie_id=".$row['movie_id']."'><img src='".$row['movie_image']."' alt='Top Hindi Movie' ></a>
                      </div>
                      <h2 class='section-title'>Top Hindi Movie</h2>
                      <ul class='movie-schedule'>";
                    }
                    echo "<li>
                    <div class='date'>".$row['movie_rating']."/5</div>
                    <h2 class='entry-title'><a href='movie.php?movie_id=".$row['movie_id']."'>".$row['movie_name']."</a></h2>
                  </li>";
                      $i++;
                      if($i==3) break;
                    }
                  
                ?>
                </ul> <!-- .movie-schedule -->
              </div>

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