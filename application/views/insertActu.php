<div class="col-12 grid-margin">
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">Modifier Actualite</h1>
            <form class="forms-sample" action="<?php echo site_url('Welcome/insertActu');?>" method="get">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Titre</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" name="titre" placeholder="titre"> 
                    </div>
                    <div class="form-group">
                    <label class="col-sm-3 col-form-label">Continent</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="idcontinent" >
                                <?php for($i=0; $i<count($cont); $i++) { ?>
                                    <option value=<?php echo $cont[$i]['id'];?>><?php echo $cont[$i]['nom'];?></option>
                                <?php } ?>
                            </select>
                          </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Description</label>
                      <textarea type="text" class="form-control"  name="description"  style="height: 400px"> </textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Date</label>
                      <input type="date" class="form-control" id="exampleInputConfirmPassword1" name="date" >
                    </div>
                    <input type="submit" class="btn btn-primary mr-2" value="Valider"/>
                  </form>
        </div>
    </div>
    </div>
</div>
</div>