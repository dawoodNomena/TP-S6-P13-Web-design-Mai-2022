
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo vendors_url("feather/feather.css"); ?>">
  <link rel="stylesheet" href="<?php echo vendors_url("ti-icons/css/themify-icons.css"); ?>">
  <link rel="stylesheet" href="<?php echo vendors_url("css/vendor.bundle.base.css"); ?>">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo css_url("vertical-layout-light/style.css"); ?>">
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                <h1>Login</h1>
                <h4>Bienvenue sur le site de production de produit laitier</h4>
                <h6 class="font-weight-light">Pour continuer veuliiez-vous connecter</h6>
                <div class="pt-3">
                <form action="<?php echo site_url("Welcome/traitlogin");?>" method="post">
                    <div class="form-group">
                    <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="E-mail" name="mail">
                    </div>
                    <div class="form-group">
                    <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Mot de passe" name="mdp">
                    </div>
                    <div class="mt-3">
                    <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" >Se connecter</button>
                    </div>
                </form>
                <?php if( isset($message) ) {?>
                        <h6 ><?php echo $message; ?></h6>
                <?php } ?>
                
                </div>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?php echo vendors_url("js/vendor.bundle.base.js"); ?>"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="<?php echo js_url("off-canvas.js"); ?>"></script>
  <script src="<?php echo js_url("hoverable-collapse.js"); ?>"></script>
  <script src="<?php echo js_url("template.js"); ?>"></script>
  <script src="<?php echo js_url("settings.js"); ?>"></script>
  <script src="<?php echo js_url("todolist.js"); ?>"></script>
  <!-- endinject -->
</body>

</html>
