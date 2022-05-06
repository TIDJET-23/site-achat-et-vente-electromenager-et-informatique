<?php

// **************************************les statistique pour admin**********************************
//fenction pour calculer le nombre de categorie
function nombrecategorie(){
	$pdo=pdo();
	$statement = $pdo->prepare("SELECT * FROM table_cat");
	$statement->execute();
	$cat = $statement->rowCount();
	return $cat;
}

//fenction pour calculer le nombre de sous categorie
function nombresouscategorie(){
	$pdo=pdo();
	$statement = $pdo->prepare("SELECT * FROM table_souscat");
	$statement->execute();
	$sous_cat = $statement->rowCount();
	return $sous_cat ;
}

// TIDJET @ KHIREDDINE 2022

//fenction pour calculer le nombre de boutique sur le site
function nombreboutique(){
	$pdo=pdo();
	$statement = $pdo->prepare("SELECT * FROM table_client where post='boutique'");
	$statement->execute();
	$boutique = $statement->rowCount();
	return $boutique ;
}

//fenction pour calculer le nombre d utilisateur
function nombreclient(){
	$pdo=pdo();
	$statement = $pdo->prepare("SELECT * FROM table_client where post='client'");
	$statement->execute();
	$client = $statement->rowCount();
	return $client ;
}

//fenction pour calculer le nombre de produit
function nombreproduit(){
	$pdo=pdo();
	$statement = $pdo->prepare("SELECT * FROM table_produit WHERE p_boutique =?");
	$statement->execute(array(0));
	$les_produit = $statement->rowCount();
	return $les_produit ;
}

//fenction pour calculer le chiffre d affire
function chiffre(){
	$pdo=pdo();
	$s=0;
	$statement = $pdo->prepare("SELECT * FROM tbl_vente where idboutique=0");
	$statement->execute();
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);

	foreach ($result as $row) {
		$statement1 = $pdo->prepare("SELECT * FROM table_produit WHERE p_id=?");
		$statement1->execute(array($row['id_produit']));
		$result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
		foreach ($result1 as $row1) {
			$s = $s + $row['quantite']*$row1['p_prix'];
		}

	}
	return $s ;
}

//fenction pour calculer le nombre de commande
function nombredemande(){
	$pdo=pdo();
	$statement = $pdo->prepare("SELECT * FROM tbl_demmande where idboutique=0");
	$statement->execute();
	$commande = $statement->rowCount();
	return $commande ;
}

//pour calcler le nombre de vente effectuer
function nombrevent(){
	$pdo=pdo();
	$statement = $pdo->prepare("SELECT * FROM tbl_vente where idboutique=0");
	$statement->execute();
	$vent = $statement->rowCount();
	return $vent ;
}



// **************************************les statistique pour la boutique**********************************
//fenction pour calculer le nombre de produit
function nombreproduitboutique(){
	$pdo=pdo();
	$statement = $pdo->prepare("SELECT * FROM table_produit WHERE p_boutique =?");
	$statement->execute(array($_SESSION['botique']['id_c']));
	$les_produit = $statement->rowCount();
	return $les_produit ;
}


//fenction pour calculer le nombre de commande
function nombredemandeboutique(){
	$pdo=pdo();
	$statement = $pdo->prepare("SELECT * FROM tbl_demmande where idboutique=?");
	$statement->execute(array($_SESSION['botique']['id_c']));
	$commande = $statement->rowCount();
	return $commande ;
}

//pour calcler le nombre de vente effectuer
function nombreventboutique(){
	$pdo=pdo();
	$statement = $pdo->prepare("SELECT * FROM tbl_vente where idboutique=?");
	$statement->execute(array($_SESSION['botique']['id_c']));
	$vent = $statement->rowCount();
	return $vent ;
}


//fenction pour calculer le chiffre d affire
function chiffreboutique(){
	$pdo=pdo();
	$s=0;
	$statement = $pdo->prepare("SELECT * FROM tbl_vente where idboutique=?");
	$statement->execute(array($_SESSION['botique']['id_c']));
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);

	foreach ($result as $row) {
		$statement1 = $pdo->prepare("SELECT * FROM table_produit WHERE p_id=?");
		$statement1->execute(array($row['id_produit']));
		$result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
		foreach ($result1 as $row1) {
			$s = $s + $row['quantite']*$row1['p_prix'];
		}

	}
	return $s ;
}



?>