<div class="col-12 grid-margin">
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">Ajout de  nouvelle solution</h1>
            <form class="forms-sample" action="<?php echo site_url('Welcome/insertSolution');?>" method="get">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Titre</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" name="titre" placeholder="titre"> 
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Description</label>
                      <textarea type="text" class="form-control"  name="description"  style="height: 400px"> </textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Photo</label>
                      <input type="file" class="form-control" id="exampleInputConfirmPassword1" name="date" >
                    </div>
                    <input type="submit" class="btn btn-primary mr-2" value="Valider"/>
                  </form>
        </div>
    </div>
    </div>
</div>
</div>