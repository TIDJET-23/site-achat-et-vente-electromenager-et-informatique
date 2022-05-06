<?php require_once('header.php'); ?>

<?php
$message = "";
if(isset($_POST['ajouter'])) {
	include_once "../fonctions/categorie.php";
	$message=ajouter_categorie();
}
?>


<section class="content-header">
	<div class="content-header-left">
		<h1>ajouter une categorie</h1>
	</div>
	<div class="content-header-right">
		<a href="categorie.php" class="btn btn-primary btn-sm">afficher tout les categorie</a>
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
							<label for="" class="col-sm-2 control-label">nom categorie <span>*</span></label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="nom_cat">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">afficher? <span>*</span></label>
							<div class="col-sm-4">
								<select name="cacher" class="form-control" >
									<option value="0">cacher</option>
									<option value="1">afficher</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
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