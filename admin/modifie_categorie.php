<?php require_once('header.php'); ?>

<?php
$message = "";
include_once "../fonctions/categorie.php";
//verfie id envoyer par la page categorie par la fenction
verifieid_categorie();

/*afficher les info de la categorie*/
$result=affiche_lacategorie();
foreach ($result as $row) {
    $nom_cat = $row['cat_nom'];
    $cacher = $row['aff_ach'];
}

//si il clic sur modifie on fait appele a la fenction
if(isset($_POST['modifie'])) {
    $message= modifier_categorie();
}
?>


<section class="content-header">
	<div class="content-header-left">
		<h1>modifie categorie</h1>
	</div>
	<div class="content-header-right">
		<a href="categorie.php" class="btn btn-primary btn-sm">afficher tout les categorie</a>	</div>
</section>

<section class="content">
  <div class="row">
    <div class="col-md-12">

		<?php 
            echo $message;
        ?>

        <form class="form-horizontal" action="" method="post">
        <div class="box box-info">
            <div class="box-body">
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">nom categorie <span>*</span></label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="nom_cat" value="<?php echo $nom_cat; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">cacher? <span>*</span></label>
                    <div class="col-sm-4">
                        <select name="cacher" class="form-control" style="width:auto;">
                            <option value="0" <?php if($cacher == 0) {echo 'selected';} ?>>cacher</option>
                            <option value="1" <?php if($cacher == 1) {echo 'selected';} ?>>afficher</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                	<label for="" class="col-sm-2 control-label"></label>
                    <div class="col-sm-6">
                      <button type="submit" class="btn btn-success pull-left" name="modifie">modifie</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
  </div>
</section>


<?php require_once('footer.php'); ?>