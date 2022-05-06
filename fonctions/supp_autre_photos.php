<?php require_once('../admin/header.php'); ?>

<?php
$pdo=pdo();
if( !isset($_REQUEST['id']) || !isset($_REQUEST['id1']) ) {
	header('location: deconnecteradmin.php');
	exit;
} else {

	// id existe
	$stmt = $pdo->prepare("SELECT * FROM tbl_p_photo WHERE pp_id=?");
	$stmt->execute(array($_REQUEST['id']));
	$total = $stmt->rowCount();
	if( $total == 0 ) {
		header('location: deconnecteradmin.php');
		exit;
	}
}
?>
<?php
$pdo=pdo();
	// recup la photos
	$stmt = $pdo->prepare("SELECT * FROM tbl_p_photo WHERE pp_id=?");
	$stmt->execute(array($_REQUEST['id']));
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);							
	foreach ($result as $row) {
		$photo = $row['photo'];
	}
	// supp dans le dossier
	if($photo!='') {
		unlink('../assets/uploads/autre_photosd/'.$photo);	
	}
	// supp dans la table
	$stmt = $pdo->prepare("DELETE FROM tbl_p_photo WHERE pp_id=?");
	$stmt->execute(array($_REQUEST['id']));
	header('location: ../admin/modifie_produit.php?idp='.$_REQUEST['id1']);
?>