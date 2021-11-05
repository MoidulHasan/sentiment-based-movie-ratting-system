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
              <li class="menu-item"><a href="index.php">Home</a></li>
              <li class="menu-item"><a href="review.php">Movie reviews</a></li>
              <?php
                session_start();
                if(isset($_SESSION['user_name']))
                {
                  echo"<li class='menu-item'><a href='logout.php'>Logout</a></li>";
                }
                else{
                  echo"<li class='menu-item current-menu-item'><a href='login.php'>Login</a></li>";
                  echo "<li class='menu-item'><a href='register.php'>Register</a></li>";
                }
              ?>
            </ul> <!-- .menu -->

            <form action="#" class="search-form">
              <input type="text" placeholder="Search...">
              <button><i class="fa fa-search"></i></button>
            </form>
          </div> <!-- .main-navigation -->

          <div class="mobile-navigation"></div>
        </div>
      </header>
      <main class="main-content">
        <div class="container">
          <div class="page">
            <div class="row">
              <div class="col-md-12">
                <center>
                  <br><br><br>
                  <h2 class="h4 text-gray-900 mb-4">Welcome to Movie Review Site!</h2>
                  <form class="user" role="form" action="processlogin.php" method="post">
                    <div class="form-group">
                        <input class="form-control form-control-user" placeholder="Username" name="user" type="text" autofocus>
                    </div>
                    <br>
                    <div class="form-group">
                        <input class="form-control form-control-user" placeholder="Password" name="password" type="password" value="">
                    </div>
                    <br>
                    <button class="btn btn-primary btn-user btn-block" type="submit" name="btnlogin">Login</button>
                  <!-- <div class="text-center">
                    <a class="small" href="register.php">Create an Account!</a>
                  </div> -->
                  </form>
                  <br><br>
                </center>
                

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