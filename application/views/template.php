<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo $titre;?>-ClimatOlogue</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo image_url("favicon.png"); ?>" rel="icon">
  <link href="<?php echo image_url("apple-touch-icon.png");?>" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Roboto:100,300,400,500,700|Philosopher:400,400i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo vendor_url("aos/aos.css");?>" rel="stylesheet">
  <link href="<?php echo vendor_url("bootstrap/css/bootstrap.min.css");?>"  rel="stylesheet">
  <link href="<?php echo vendor_url("bootstrap-icons/bootstrap-icons.css");?>"  rel="stylesheet">
  <link href="<?php echo vendor_url("glightbox/css/glightbox.min.css");?>"  rel="stylesheet">
  <link href="<?php echo vendor_url("swiper/swiper-bundle.min.css");?>"  rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?php echo css_url("style.css"); ?>" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div id="logo">
        <h1><a href="index.html"><span>Climat</span>Ologue</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" title="" /></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="<?php echo site_url('Welcome');?>">Accueil</a></li>
          <li class="dropdown"><a href="#"><span>Rechauffement climatique</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="<?php echo site_url("Causes");?>">Causes</a></li>
              <li><a href="<?php echo site_url('Consequences');?>">Consequences</a></li>
              <li><a href="<?php echo site_url('Solutions');?>">Solutions</a></li>
            </ul>
          </li>

          <li class="dropdown"><a href="#"><span>Continent</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <?php for($i=0; $i<count($cont); $i++) { ?>
                <li><a href="<?php echo site_url("Actualites-continent-".$cont[$i]['id'].".php");?>"><?php echo $cont[$i]['nom'];?></a></li>
              <?php } ?>
            </ul>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container" data-aos="fade-in">
      <h1>Bienvenue sur ClimatOlogue</h1>
      <h2>Site d'information sur le rechauffement climatique</h2>
      <img src="<?php echo image_url("bann.jpg");?>" alt="Hero Imgs" data-aos="zoom-out" data-aos-delay="100">
      <div class="btns">
        <a href="#"><i class="fa fa-apple fa-3x"></i> App Store</a>
        <a href="#"><i class="fa fa-play fa-3x"></i> Google Play</a>
        <a href="#"><i class="fa fa-windows fa-3x"></i> windows</a>
      </div>
    </div>
  </section><!-- End Hero Section -->

  <main id="main">
      <?php
          if (isset($vue)) $this->load->view($vue);
      ?>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer class="footer">
    <div class="container">
      <div class="row">

        <div class="col-md-12 col-lg-4">
          <div class="footer-logo">

            <a class="navbar-brand" href="#">ClimatOlogue</a>
            <p>Site créée pour l'information sur le rechauffement climatque dans le monde.</p>
          </div>
        </div>

        <div class="col-sm-6 col-md-3 col-lg-2">
          <div class="list-menu">

            <h4>A propos de nous</h4>

            <ul class="list-unstyled">
              <li><a href="#">créée en 2022</a></li>
              <li><a href="#">Projet de Dawood Nomena</a></li>
              <li><a href="#"></a></li>
            </ul>

          </div>
        </div>

        <div class="col-sm-6 col-md-3 col-lg-2">
          <div class="list-menu">

            <h4>Pourquoi ce site?</h4>

            <ul class="list-unstyled">
              <li><a href="#">On essaye au max d'etre au courant de toutes actualités.</a></li>
              <li><a href="#">On ne se concentre pas d'actualite d'un continent. </a></li>
              <li><a href="#">Rapide et ne publit que la verite.</a></li>
            </ul>

          </div>
        </div>
                
        
      </div>
    </div>

    <div class="copyrights">
      <div class="container">
        <p>&copy; Copyrights ClimatOlogue. All rights reserved.</p>
        <div class="credits">
        </div>
      </div>
    </div>

  </footer><!-- End  Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?php echo vendor_url("aos/aos.js"); ?>"></script>
  <script src="<?php echo vendor_url("bootstrap/js/bootstrap.bundle.min.js"); ?>"></script>
  <script src="<?php echo vendor_url("glightbox/js/glightbox.min.js"); ?>"></script>
  <script src="<?php echo vendor_url("swiper/swiper-bundle.min.js"); ?>"></script>
  <script src="<?php echo vendor_url("php-email-form/validate.js"); ?>"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo js_url("main.js"); ?>"></script>

</body>

</html>