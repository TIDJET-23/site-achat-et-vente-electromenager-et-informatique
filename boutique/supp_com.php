<?php require_once('header.php'); ?>


<?php
if(!isset($_REQUEST['idc'])) {
	header('location: deconnecter.php');
	exit;
} else {
	// id
	$statement = $pdo->prepare("SELECT * FROM tbl_demmande WHERE id=?");
	$statement->execute(array($_REQUEST['idc']));
	$total = $statement->rowCount();
	if( $total == 0 ) {
		header('location: deconnecter.php');
		exit;
	}
}
?>

<?php
	
	
	$stmt = $pdo->prepare("DELETE FROM tbl_demmande WHERE id=?");
	$stmt->execute(array($_REQUEST['idc']));
	header('location: commande.php');
	
?>