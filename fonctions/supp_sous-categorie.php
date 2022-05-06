<?php require_once('../admin/header.php'); ?>

<?php
// 
if(!isset($_REQUEST['id'])) {
	header('location: deconnecter.php');
	exit;
} else {
	// Check the id is valid or not
	$statement = $pdo->prepare("SELECT * FROM table_souscat WHERE id_souscat=?");
	$statement->execute(array($_REQUEST['id']));
	$total = $statement->rowCount();
	if( $total == 0 ) {
		header('location: deconnecter.php');
		exit;
	}
}
?>

<?php

	$pdo=pdo();

	$statement = $pdo->prepare("SELECT * FROM table_produit WHERE id_souscat=?");
	$statement->execute(array($_REQUEST['id']));
	$rs = $statement->fetchAll(PDO::FETCH_ASSOC);
	foreach ($rs as $row) {
		$idproduit=$row['p_id'];
		$photoproduit = $row['p_photo'];
		//supp la photo prencipale de produit dans le dossier uploads
		unlink('../assets/uploads/'.$photoproduit);

		//supp dans la table des sauhite
		$statement = $pdo->prepare("DELETE FROM table_souhaite WHERE idproduit=?");
		$statement->execute(array($idproduit));

		//supp dans la table panier
		$statement = $pdo->prepare("DELETE FROM table_panier WHERE idproduit=?");
		$statement->execute(array($idproduit));

		//supp dans la table commande
		$statement = $pdo->prepare("DELETE FROM tbl_demmande WHERE id_produit=?");
		$statement->execute(array($idproduit));

		//sup dans la table vente
		$statement = $pdo->prepare("DELETE FROM tbl_vente WHERE id_produit=?");
		$statement->execute(array($idproduit));


		// supp les autre photos dans le dossier
		$stmt = $pdo->prepare("SELECT * FROM tbl_p_photo WHERE p_id=?");
		$stmt->execute(array($_REQUEST['id']));
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);							
		foreach ($result as $row) {
			$photo = $row['photo'];
			//supp les autre photo dans le dossier uploads
			unlink('../assets/uploads/autre_photosd/'.$photo);
		}

		//sup dans la table autre photos assossie a notre produit
		$statement = $pdo->prepare("DELETE FROM tbl_p_photo WHERE p_id=?");
		$statement->execute(array($idproduit));

		
	}

	//supprimer le produit
	$statement = $pdo->prepare("DELETE FROM table_produit WHERE id_souscat=?");
	$statement->execute(array($_REQUEST['id']));

	//supprimer la sous categorie
	$statement = $pdo->prepare("DELETE FROM table_souscat WHERE id_souscat=?");
	$statement->execute(array($_REQUEST['id']));

	header('location: ../admin/sous-categorie.php');
?>