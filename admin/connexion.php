<?php
session_start();
require_once "../fonctions/BDD.php";
$pdo=pdo();
$error_message='';
//si il click sur connexion on fait appel a la fnct connexuin admin
if(isset($_POST['connexion'])) {
	include_once "../fonctions/utilisateur.php";
	$utilisateur=connexionadmin();
	$error_message=$utilisateur;
}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>connexion admin</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/AdminLTE.min.css">
</head>

<body style="background-color: black;">
	<div class="login-box" >
		<div class="login-logo">
			<b style="color: white;">Admin</b>
		</div>
		<div class="login-box-body" style=" box-shadow: 4px 4px 10px rgba(255,255,255,.2); border-radius: 8px;">
			<p class="login-box-msg" >connexion</p>
			<form action="" method="post">
				<div class="form-group has-feedback">
					<input class="form-control" placeholder="Email address" name="email" type="email" autocomplete="off" autofocus>
				</div>
				<div class="form-group has-feedback">
					<input class="form-control" placeholder="Password" name="motpasse" type="password" autocomplete="off" value="">
				</div>
				<div class="row">
					<!-- afficher le message d erreur -->
					<div class="col-xs-8">
						<?php 
						echo '<div style="color: red;">'.$error_message.'</div>';
						?>
					</div>
					<div class="col-xs-4">
						<input type="submit" class="btn btn-success btn-block btn-flat login-button" name="connexion" value="connexion">
					</div>
				</div>
			</form>
		</div>
	</div>
</body>
</html>