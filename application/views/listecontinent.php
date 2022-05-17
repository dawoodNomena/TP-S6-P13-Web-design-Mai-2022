<div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h1>Liste des Continents</h1>
                  <h2><a href="<?php echo site_url('Welcome/pageInsertContinent');?>">Ajouter Continent</a></h2>
                  <div class="table-responsive">
                    <table class="table table-striped table-borderless">
                      <thead>
                        <tr>
                            <th>Nom</th>
                        </tr>  
                      </thead>
                      <tbody>
                        <?php $this->load->model('Fonction');
                        for($i=0; $i<count($liste); $i++) { ?>
                            <tr>
                                <td class="font-weight-bold"><?php echo $liste[$i]['nom'];?></td>
                                <form action="<?php echo site_url('Welcome/supprContinent')?>" method="get">
                                    <input type="hidden" name="id" value="<?php echo $liste[$i]['id'];?>">
                                    <td><input type="submit" value="supprimer" class="btn btn-primary"></td>
                                </form>
                                <form action="<?php echo site_url('Welcome/pageModifCont');?>" method="get">
                                    <input type="hidden" name="id" value="<?php echo $liste[$i]['id'];?>">
                                    <td><input type="submit" value="Modifier" class="btn btn-primary"></td> 
                                </form>
                            </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>