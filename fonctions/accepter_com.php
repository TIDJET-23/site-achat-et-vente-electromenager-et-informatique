<?php require_once('../admin/header.php'); ?>

<?php

$message = '';
if(!isset($_REQUEST['idc'])) {
	header('location: deconnecteradmin.php');
	exit;
} else {
	// id
	$stmt = $pdo->prepare("SELECT * FROM tbl_demmande WHERE id=?");
	$stmt->execute(array($_REQUEST['idc']));
	$total = $stmt->rowCount();
	if( $total == 0 ) {
		header('location: deconnecteradmin.php');
		exit;
	}
}
?>

<?php
	
	$cust_datetime = date('Y-m-d h:i:s');

   $stmt = $pdo->prepare("SELECT * FROM tbl_demmande WHERE id=?");
	$stmt->execute(array($_REQUEST['idc']));
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row1) {

    $idclient=$row1['id_client'];
    $idboutique=$row1['idboutique'];
    $idproduit=$row1['id_produit'];
    $qua=$row1['quantite'];
    }


    
    $stmt = $pdo->prepare("SELECT * FROM table_produit WHERE p_id=?");
    $stmt->execute(array($row1['id_produit']));
    $rs2 = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rs2 as $row2) {

    $qexiste=$row2['p_quantite'];
    }




    if ($qua <= $qexiste) {


         $stmt = $pdo->prepare("INSERT INTO tbl_vente (id_client,
                                                        idboutique,
                                                    date_vente,
                                                    quantite,
                                                    id_produit
                                                     ) VALUES (?,?,?,?,?)");
        $stmt->execute(array(           
                                    $idclient,
                                    $idboutique,
                                     $cust_datetime,
                                     $qua,
                                     $idproduit

                                 ));

         
        $nev_quan = $qexiste - $qua;

        $statement = $pdo->prepare("UPDATE table_produit SET p_quantite=? WHERE p_id=? ");
        $statement->execute(array( $nev_quan,$row1['id_produit']));



        $stmt = $pdo->prepare("DELETE FROM tbl_demmande WHERE id=?");
        $stmt->execute(array($_REQUEST['idc']));

        $message = '<div class="callout callout-success"><p>la commande est accepter</p></div>';
        header('location: ../admin/commande.php');


    } else {
         $message = '<div class="callout callout-danger"><p>la quantite est superieur</p></div>';
         header('location: ../admin/commande.php');
        
    }
    
   







	
	
	
?>