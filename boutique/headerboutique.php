


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Admin</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="../assets/css/ionicons.min.css">
	<link rel="stylesheet" href="../assets/css/datepicker3.css">
	<link rel="stylesheet" href="../assets/css/all.css">
	<link rel="stylesheet" href="../assets/css/select2.min.css">
	<link rel="stylesheet" href="../assets/css/dataTables.bootstrap.css">
	<link rel="stylesheet" href="../assets/css/jquery.fancybox.css">
	<link rel="stylesheet" href="../assets/css/AdminLTE.min.css">
	<link rel="stylesheet" href="../assets/css/_all-skins.min.css">
	<link rel="stylesheet" href="../assets/css/on-off-switch.css"/>
	<link rel="stylesheet" href="../assets/css/summernote.css">
	<link rel="stylesheet" href="../admin/style.css">
</head>


<body class="hold-transition  sidebar-mini">
	<div class="wrapper">
		<header class="main-header" style="background-color: black;">
			<a href="#" class="logo">
				<span class="logo-lg" style="color: white;"> <?php echo  $_SESSION['botique']['prenom_c']; ?></span>
			</a>
			<nav class="navbar navbar-static-top">
				
				
					<ul class="nav navbar-nav" style="margin-left: 50px;">

						<a href="produit.php" class="btn " style="margin-top: 7px;  color: white;">produit</a>
						
						<a href="commande.php" class="btn " style="margin-top: 7px;  color: white;">commande</a>

						<a href="vente.php" class="btn " style="margin-top: 7px;  color: white;">vente</a>

						

					</ul>
				
			</nav>
		</header>

</body>