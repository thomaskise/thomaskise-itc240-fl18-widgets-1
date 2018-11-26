<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?=$Title?></title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/clean-blog.min.css" rel="stylesheet">
    <link href="css/wildduck.css" rel="stylesheet">
    <style>  
        #mainNav .navbar-nav>li.nav-item>a.active 
        {
            color: #ef8c49;
        }
        .panel-body {
            background:#ef8c49;
        }
    </style>

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
              <?=makeLinks($nav1);?>
              <!--
            <li class="nav-item">
              <a class="nav-link active" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="engagement_list.php">Engagements</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="dailyspecials.php">Daily Specials</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="travel.php">Travel Inquiry</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php ">General Inquiry</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="db_test.php ">Database Test</a>
            </li>
            -->
          </ul>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Header -->
    <header class="masthead" style="background-image: url(<?=$pageImage?>)">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class=<?=$className?>>
              <h1><?=$pageHeader?></h1>
              <span class="subheading"><?=$subHeader?></span>
              <span class="meta"><?=$slogan?></span> 
    
                <?php
                    if ($randomSH=="y") {
                        echo randomize($heros);
                    }else if ($rotatePlanets=="y") {
                        echo rotate($planets);
                    }
                ?>
            </div>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">

          <!-- header ends here -->