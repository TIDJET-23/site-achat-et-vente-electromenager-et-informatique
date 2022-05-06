<?php
session_start();

//faire appelle pour la fenction pdo qui se trouve dans le fichier DBB.php
//cette fenction permet la laison entre le projet et la base de donnees
require_once "../fonctions/BDD.php";
$pdo=pdo();

// si il nest pas connecter il doit afficher l interface connexion
if(!isset($_SESSION['user'])) {
	header('location: connexion.php');
	exit;
}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title>Admin</title>

	<!-- iconfav -->
	<link rel="icon" type="image/png" href="../assets/uploads/favicon.jpg">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

	<!-- //////////////css//////////////// -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- lien vers le fichie fontawesom et ioneicon pour recupere les icon -->
	<link rel="stylesheet" href="css/font-awesome.css">
	<link rel="stylesheet" href="css/ionicons.min.css">
	<!-- cest text area mais personalise comme word -->
	<link rel="stylesheet" href="css/datepicker3.css">
	<link rel="stylesheet" href="css/summernote.css">

	<!-- selcteur -->
	<link rel="stylesheet" href="css/select2.min.css">
	<!-- tableaux utiliser dans notre projet -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.css">
	
	<!-- tomplate utiliser pour cote admin -->
	<link rel="stylesheet" href="css/AdminLTE.min.css">
	<!-- notre feuille de syle css -->
	<link rel="stylesheet" href="css/style.css">

</head>

<body class="hold-transition fixed sidebar-mini">
	<div class="wrapper">
		<header class="main-header" style="background-color: black;">
			<a href="index.php" class="logo">
				<span class="logo-lg"><b>ELECT<b style="color: orange;"> SHOP</b></b></span>
			</a>
			<nav class="navbar navbar-static-top">
				<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
					<span class="sr-only">nav</span>
				</a>
				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav" style="margin-right: 10px;">
						<a href="profile.php" class="btn " style="margin-top: 7px;  color: white;">
							<i class="fa fa-user"></i> profile
						</a>

						<a href="../fonctions/deconnecteradmin.php" class="btn " style="margin-top: 7px;  color: white;">
							<i class="fa fa-sign-in"></i> deconnecter
						</a>

					</ul>
				</div>
			</nav>
		</header>
		<aside class="main-sidebar" style="background-color: black;">
			<section class="sidebar">
				<ul class="sidebar-menu">
					<li class="treeview">
						<a href="index.php">
							<i class="fa fa-dashboard"></i> <span>accueil</span>
						</a>
					</li>

					<li class="treeview">
						<a href="categorie.php">
							<i class="fa fa-circle"></i> <span>categorie</span> </a>
						</a>
					</li>

					<li class="treeview">
						<a href="sous-categorie.php">
							<i class="fa fa-circle"></i> <span>sous-categorie</span> </a>
					</li>

					<li class="treeview">
						<a href="produit.php">
							<i class="fa fa-shopping-bag"></i> <span>produit</span>
						</a>
					</li>

					<li class="treeview">
						<a href="client.php">
							<i class="fa fa-user-plus"></i> <span>lists des clients</span>
						</a>
					</li>
					<li class="treeview">
						<a href="boutique.php">
							<i class="fa fa-user-plus"></i> <span>listes des boutiques </span>
						</a>
					</li>
					<li class="treeview">
						<a href="commande.php">
							<i class="fa fa-sticky-note"></i> <span>commande</span>
						</a>
					</li>
					<li class="treeview ">
						<a href="vente.php">
							<i class="fa fa-sticky-note"></i> <span>les vente</span>
						</a>
					</ul>
				</section>
			</aside>
			<div class="content-wrapper">