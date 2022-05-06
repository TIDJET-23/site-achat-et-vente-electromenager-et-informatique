<?php require_once('header.php'); ?>

<?php
$message = '';
//pour recupere les categorie
include_once "../fonctions/categorie.php";
$i=0;
$result=affiche_categorie();

if(isset($_POST['ajouter'])) {
	//si click sur ajouter on fait appele a la fenction ajouter
	$message=ajouter_souscat();
}
?>

<section class="content-header">
	<div class="content-header-left">
		<h1>ajouter une sous categorie</h1>
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
							<label for="" class="col-sm-3 control-label">categorie <span>*</span></label>
							<div class="col-sm-4">
								<select name="id_categ" class="form-control select2">
									<option value="">choisir une categorie </option>

									<?php
									foreach ($result as $row) {
										?>
										<option value="<?php echo $row['id_categorie']; ?>"><?php echo $row['cat_nom']; ?></option>
										<?php
									}
									?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label for="" class="col-sm-3 control-label">sous categorie <span>*</span></label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="sous_cat">
							</div>
						</div>
						
						<div class="form-group">
							<label for="" class="col-sm-3 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="ajouter">ajouter</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>

<?php require_once('footer.php'); ?>