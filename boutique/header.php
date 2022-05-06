
<?php
session_start();
require_once "../fonctions/BDD.php";
$pdo=pdo();



?>



<!DOCTYPE html>
<html lang="en">
<head>


	<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>


	<!-- iconfav -->
	<link rel="icon" type="image/png" href="assets/uploads/favicon.jpg">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
	<link rel="stylesheet" href="../assets/css/owl.theme.default.min.css">

	<link rel="stylesheet" href="../assets/css/jquery.bxslider.min.css">
    <link rel="stylesheet" href="../assets/css/magnific-popup.css">

    <link rel="stylesheet" href="../assets/css/rating.css">
	<link rel="stylesheet" href="../assets/css/spacing.css">
	<link rel="stylesheet" href="../assets/css/bootstrap-touch-slider.css">
	<link rel="stylesheet" href="../assets/css/animate.min.css">
	<link rel="stylesheet" href="../assets/css/tree-menu.css">
	<link rel="stylesheet" href="../assets/css/select2.min.css">
	

	

	<link rel="stylesheet" href="../assets/css/main.css">
	<link rel="stylesheet" href="../assets/css/responsive.css">








		<title>ELECTSHOP</title>
		

	
	


</head>



<body>



<!-- top bar -->
<div class="top">
	<div class="container">
		<div class="row">

			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="right">
							<ul>

							<?php
							if(isset($_SESSION['client'])) {
								$notif='';
								require_once "../fonctions/utilisateur.php";
								$notif=notification();
							?>

								<li>
									<a href="profile.php"> 
										<i class="fa fa-home"><?php echo $notif; ?></i> 
										<?php echo $_SESSION['client']['nom_c']; ?>
									</a>
								</li>

								<li><a href="../panier.php"><i class="fa fa-shopping-cart"> <?php

								$notifp='';
								require_once "../fonctions/panier.php";
								$notifp=notificationpanier();
								 echo $notifp; ?></i> panier</a></li>
								<li><a  href="../fonctions/deconnecter.php"><i class="fa fa-sign-in"></i> deconnection</a></li>

							<?php
							
							}elseif (isset($_SESSION['botique'])) {

								$notif='';
								require_once "../fonctions/utilisateur.php";
								$notif=notificationboutique();

							?>

								<li><a href="../profileboutique.php"> <i class="fa fa-home"></i> gerer la boutique <?php echo $notif; ?> </a></li>
								<li><a  href="../fonctions/deconnecter.php"><i class="fa fa-sign-in"></i> deconnection</a></li>

							<?php
							}
							else{
								?>

								<li><a href="../connexion.php"><i class="fa fa-sign-in"></i> connexion</a></li>
								<li><a href="../inscription.php"><i class="fa fa-user-plus"></i> inscription </a></li>
								<li><a href="../pageboutique.php"><i class="fa fa-plus"></i> votre boutique </a></li>

								<?php	
							}
							?>

							

							
					</ul>
				</div>
			</div>




		</div>
	</div>
</div>









<div class="header">
	<div class="container">
		<div class="row inner">

			<div class="col-md-4 logo">
				<a href="index.php"><img src="../assets/uploads/logo.jpg" alt="logo" style="height: 65px; width: 200px;"></a>
			</div>
			

			<div class="col-md-5 right">
						<ul>
							<li><a href="../index.php">accueil</a></li>
							<li><a href="../lesproduit.php">nos produit</a></li>
							<li><a href="../apropos.php">a propos</a></li>
							<li><a href="../contact.php">contact </a></li>
						</ul>


			</div>



			<div class="col-md-3 search-area">
				<form class="navbar-form navbar-left" role="search" action="" method="get">
					
					<div class="form-group">
						<input type="text" class="form-control search-top" placeholder="recherche " name="">
					</div>
					<button type="submit" class="btn btn-danger">chercher</button>
				</form>
			</div>




		</div>
	</div>
</div>









