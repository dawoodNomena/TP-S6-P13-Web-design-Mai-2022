<?php $this->load->model('Fonction');
for($i=0; $i<count($act); $i++) { ?>
<section id="testimonials" class="padd-section text-center">
    <div class="container" data-aos="fade-up">
        <div class="row justify-content-center">
            <a href="<?php echo $act[$i]['url'];?>-Actualites-<?php echo $act[$i]['id'];?>.php">
                <div class="col-md-12">

                    <div class="testimonials-content">
                        <div id="carousel-example-generic" class="carousel slide" data-bs-ride="carousel">

                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item  active">
                                    <div class="top-top">

                                        <h1><?php echo $act[$i]['titre'];?></h1>
                                        <p>Continent: <span><?php echo $this->Fonction->getContinentById($act[$i]['idcontinent']);?></span></p>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</section>
<?php } ?>