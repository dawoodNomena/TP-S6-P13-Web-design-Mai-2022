<div class="col-12 grid-margin">
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">Ajout de Continent</h1>
            <form class="forms-sample" action="<?php echo site_url('Welcome/modifContinent');?>" method="get">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Nom</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" name="nom" placeholder="Nom" value="<?php echo $continent;?>"> 
                    </div>
                    <input type="hidden" value="<?php echo $id;?>" name="id">
                    <input type="submit" class="btn btn-primary mr-2" value="Valider"/>
                  </form>
        </div>
    </div>
    </div>
</div>
</div>