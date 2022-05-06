<?php require_once('header.php'); ?>

<?php

$message = '';
 include_once "../fonctions/categorie.php";

// verfie id de sous categorie
verifieid_souscategorie();
//afficher les categorie
$i=0;
$results=affiche_categorie();

/*afficher les info de la sous categorie*/
$result=affiche_lasouscategorie();
foreach ($result as $row) {
    $sous_cat = $row['nom_souscat'];
    $id_categ = $row['id_cat'];
}

if(isset($_POST['modifie'])) {
    $message=modifie_souscat();
}

?>


<section class="content-header">
	<div class="content-header-left">
		<h1>modifie sous categorie</h1>
	</div>
	<div class="content-header-right">
		<a href="sous-categorie.php" class="btn btn-primary btn-sm">afficher tout</a>
	</div>
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
                    <label for="" class="col-sm-3 control-label">nom categorie <span>*</span></label>
                    <div class="col-sm-4">
                        <select name="id_categ" class="form-control select2" disabled>

                            <option value="" >choisir une categorie</option>
                            <?php
                            
                            foreach ($results as $row) {
                                ?>
                                <option value="<?php echo $row['id_categorie']; ?>" <?php if($row['id_categorie'] == $id_categ){echo 'selected';} ?>><?php echo $row['cat_nom']; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>


                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">sous categorie <span>*</span></label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="sous_cat" value="<?php echo $sous_cat; ?>">
                    </div>
                </div>


                <div class="form-group">
                	<label for="" class="col-sm-3 control-label"></label>
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