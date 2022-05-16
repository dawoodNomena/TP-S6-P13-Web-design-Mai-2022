<div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h1>Liste des Actualites</h1>
                  <h2><a href="<?php echo site_url('Welcome/pageInsertActu');?>">Ajouter actualité</a></h2>
                  <div class="table-responsive">
                    <table class="table table-striped table-borderless">
                      <thead>
                        <tr>
                          <th>Titre</th>
                          <th>Continent</th> 
                          <th>Date</th>
                        </tr>  
                      </thead>
                      <tbody>
                        <?php $this->load->model('Fonction');
                        for($i=0; $i<count($liste); $i++) { ?>
                            <tr>
                                <td><?php echo $liste[$i]['titre'];?></td>
                                <td class="font-weight-bold"><?php echo $this->Fonction->getContinentById($liste[$i]['idcontinent']);?></td>
                                <td class="font-weight-medium"><div class="badge badge-success"><?php echo $liste[$i]['date'];?></div></td>
                                <form action="<?php echo site_url('Welcome/supprActu')?>" method="get">
                                    <input type="hidden" name="id" value="<?php echo $liste[$i]['id'];?>">
                                    <td><input type="submit" value="supprimer" class="btn btn-primary"></td>
                                </form>
                                <form action="<?php echo site_url('Welcome/pageModif');?>" method="get">
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