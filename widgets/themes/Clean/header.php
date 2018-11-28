<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?=$config->title?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?=$config->theme_virtual?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" >

    <!-- Custom fonts for this template -->
    <link href="<?=$config->theme_virtual?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="<?=$config->theme_virtual?>css/clean-blog.min.css" rel="stylesheet">
    <link href="<?=$config->theme_virtual?>css/clean-blog.css" rel="stylesheet">
    <style>  
        #mainNav .navbar-nav>li.nav-item>a.active 
        {
            color: #ef8c49;
        }
        .panel-body {
            background:#ef8c49;
        }
    </style>

    <?=$config->loadhead?>
  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <?=makeLinks($config->nav1)?>
            </ul>
        </div>
      </div>
    </nav>

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('<?=$config->theme_virtual?>img/<?=$config->pageImage?>')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class=page-heading>
              <h1><?=$config->pageHeader?></h1>
              <span class="subheading"><?=$config->subHeader?></span>
              <span class="meta"><?=$config->slogan?></span> 
              <?php
                if ($config->randomSH=="y") {
                    echo randomize($config->heros);
                }else if ($config->rotatePlanets=="y") {
                    echo rotate($config->planets);
                }
              ?>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <?=showFeedback();?>
          <!-- header ends here -->