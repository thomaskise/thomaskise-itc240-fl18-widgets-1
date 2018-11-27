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

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="<?=$config->theme_virtual?>css/business-casual.css" rel="stylesheet">
    <?=$config->loadhead?>
  </head>

  <body>

    <div class="tagline-upper text-center text-heading text-shadow text-white mt-5 d-none d-lg-block"><?=$config->siteName?></div>
    <div class="tagline-lower text-center text-expanded text-shadow text-uppercase text-white mb-5 d-none d-lg-block">2802 E Olive St | Seattle, WA 98122 | 206.325.3626</div>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-faded py-lg-4">
      <div class="container">
        <a class="navbar-brand text-uppercase text-expanded font-weight-bold d-lg-none" href="#">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav mx-auto">
                <?=bc_links($config->nav1);?>
            </ul>
        </div>
      </div>
    </nav>
    <header class="masthead" style="background-image: url(<?=$config->pageImage?>)">
      <div class="overlay">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class=<?=$config->className?>>
                <br />
                <h1><?=$config->pageHeader?></h1>
              <span class="subheading"><?=$config->subHeader?></span>
              <span class="meta"><?=$config->slogan?></span>  
                <?php /*
                    if ($config->randomSH=="y") {
                        echo randomize($config->heros);
                    }else if ($config->rotatePlanets=="y") {
                        echo rotate($config->planets);
                    } */
                ?>
                <br />
                <br />
            </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <div class="container">
        <div class="bg-faded p-4 my-4">
            <?=showFeedback();?>
      <!-- header ends here -->       