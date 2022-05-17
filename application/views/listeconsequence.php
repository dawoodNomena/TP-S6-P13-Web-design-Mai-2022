<div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h1>Liste des Consequences du rechauffement climatique</h1>
                  <h2><a href="<?php echo site_url('Welcome/pageInsertConsequence');?>">Ajouter Consequence</a></h2>
                  <div class="table-responsive">
                    <table class="table table-striped table-borderless">
                      <thead>
                        <tr>
                            <th>Photo</th>
                            <th>Titre</th>
                        </tr>  
                      </thead>
                      <tbody>
                        <?php $this->load->model('Fonction');
                        for($i=0; $i<count($liste); $i++) { ?>
                            <tr>
                                <td><img src="<?php echo image_url($liste[$i]['photo'].".jpg");?>"/></td>
                                <td class="font-weight-bold"><?php echo $liste[$i]['titre'];?></td>
                                <form action="<?php echo site_url('Welcome/supprConsequence')?>" method="get">
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