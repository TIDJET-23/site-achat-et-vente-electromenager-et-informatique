<?php require_once('header.php'); ?>

<?php
$message="";

//faire apperle au fichier utilisateur pour utiliser ces fenction
include_once "../fonctions/utilisateur.php";

//appele pour fenction pour afficher les information de admin
$result= infoadmin();
foreach ($result as $row) {
	$nom = $row['nom_u'];
	$email     = $row['email'];
	$tel     = $row['tel_u'];
}

//si onclick sur le botton modifie 
if(isset($_POST['modifie'])) {
	$modifie= modifieprofadmin();
	$message=$modifie;	
}

//si on click sur le btn modifie mot de passe
if(isset($_POST['motpasse'] )) {
	$modifie= modifiepasseadmin();
	$message=$modifie;
}
?>




<section class="content-header">
	<div class="content-header-left">
		<h1>Profile</h1>
	</div>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">

			<?php 
			echo $message;
			?>

			<div class="nav-tabs-custom">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#tab_1" data-toggle="tab">modifie les information</a></li>
					<li><a href="#tab_3" data-toggle="tab">modifie mot de passe</a></li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="tab_1">						
						<form class="form-horizontal" action="" method="post">
							<div class="box box-info">
								<div class="box-body">
									<div class="form-group">
										<label for="" class="col-sm-2 control-label">nom <span>*</span></label>
										<div class="col-sm-4">
											<input type="text" class="form-control" name="nom" value="<?php echo $nom; ?>">
										</div>
									</div>
									<div class="form-group">
										<label for="" class="col-sm-2 control-label">Email<span>*</span></label>						
										<div class="col-sm-4">
											<input type="email" class="form-control" name="email" value="<?php echo $email; ?>">
										</div>
									</div>
									<div class="form-group">
										<label for="" class="col-sm-2 control-label">tel  </label>
										<div class="col-sm-4">
											<input type="text" class="form-control" name="tel" value="<?php echo $tel; ?>">
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
					<div class="tab-pane" id="tab_3">
						<form class="form-horizontal" action="" method="post">
							<div class="box box-info">
								<div class="box-body">
									<div class="form-group">
										<label for="" class="col-sm-2 control-label">mot de passe </label>
										<div class="col-sm-4">
											<input type="password" class="form-control" name="motpasse">
										</div>
									</div>
									<div class="form-group">
										<label for="" class="col-sm-2 control-label">confirme</label>
										<div class="col-sm-4">
											<input type="password" class="form-control" name="conmopass">
										</div>
									</div>
									<div class="form-group">
										<label for="" class="col-sm-2 control-label"></label>
										<div class="col-sm-6">
											<button type="submit" class="btn btn-success pull-left" name="modifie"> modifie </button>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>			

		</div>
	</div>
</section>

<?php require_once('footer.php'); ?>