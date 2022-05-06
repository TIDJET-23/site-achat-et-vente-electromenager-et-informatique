<?php require_once('../admin/header.php'); ?>

<?php
$error_message = "";
$success_message = '';
if(!isset($_REQUEST['idc'])) {
	header('location: deconnecteradmin.php');
	exit;
} else {
	// id
	$statement = $pdo->prepare("SELECT * FROM tbl_vente WHERE id=?");
	$statement->execute(array($_REQUEST['idc']));
	$total = $statement->rowCount();
	if( $total == 0 ) {
		header('location: deconnecteradmin.php');
		exit;
	}
}
?>

<?php
	
	
	$stmt = $pdo->prepare("DELETE FROM tbl_vente WHERE id=?");
	$stmt->execute(array($_REQUEST['idc']));
	header('location: ../admin/vente.php');
	
?>