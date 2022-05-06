<?php require_once('../boutique/header.php'); ?>

<?php
//si il na pas envoyer un id
$pdo=pdo();
if(!isset($_REQUEST['id'])) {
	header('location: deconnecter.php');
	exit;
} else {
	// si il envoyer mais nexiste pas
	$stmt = $pdo->prepare("SELECT * FROM table_produit WHERE p_id=?");
	$stmt->execute(array($_REQUEST['id']));
	$total = $stmt->rowCount();
	if( $total == 0 ) {
		header('location: deconnecter.php');
		exit;
	}
}
?>


<?php
	$pdo=pdo();
	// supprimer la photo dans le dossier opload
	$stmt = $pdo->prepare("SELECT * FROM table_produit WHERE p_id=?");
	$stmt->execute(array($_REQUEST['id']));
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);							
	foreach ($result as $row) {
		$photoproduit = $row['p_photo'];
		unlink('../assets/uploads/'.$photoproduit);
	}

	// supp les autre photos dans le dossier
	$stmt = $pdo->prepare("SELECT * FROM tbl_p_photo WHERE p_id=?");
	$stmt->execute(array($_REQUEST['id']));
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);							
	foreach ($result as $row) {
		$photo = $row['photo'];
		unlink('../assets/uploads/autre_photosd/'.$photo);
	}

	// supp le produit dans bdd produit
	$stmt = $pdo->prepare("DELETE FROM table_produit WHERE p_id=?");
	$stmt->execute(array($_REQUEST['id']));


	// supp les autre photos dans la bdd
	$stmt = $pdo->prepare("DELETE FROM tbl_p_photo WHERE p_id=?");
	$stmt->execute(array($_REQUEST['id']));

	// supp les commande dans la bdd 
	$stmt = $pdo->prepare("DELETE FROM tbl_demmande WHERE id_produit=?");
	$stmt->execute(array($_REQUEST['id']));

	header('location: ../boutique/produit.php');
?>