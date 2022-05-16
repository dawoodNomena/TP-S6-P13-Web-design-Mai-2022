<section id="features" class="padd-section text-center">

      <div class="container" data-aos="fade-up">
        <div class="section-title text-center">
          <h1>Solutions du rechauffement Climatique.</h1>
          <p class="separator">Les principales solutions du rechauffement climatique mondiale .</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
        <?php for($i=0; $i<count($liste); $i++) { ?>
          <div class="col-md-6 col-lg-3">
          <a href="<?php echo site_url($liste[$i]['url']);?>-Solutions-<?php echo $liste[$i]['id'];?>.php">
            <div class="feature-block">
              <img src="<?php echo image_url($liste[$i]['photo'].".jpg");?>" alt="img">
              <h2><?php echo $liste[$i]['titre'];?></h2>
            </div>
          </a>
          </div>
        <?php } ?>
        </div>
      </div>
    </section>