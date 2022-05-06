<?php require_once('header.php'); ?>


<?php
if(!isset($_REQUEST['idp'])) {
    header('location: deconnecter.php');
    exit;
} else {

    // Check the id is valid or not
    $stmt = $pdo->prepare("SELECT * FROM table_panier WHERE id=?");
    $stmt->execute(array($_REQUEST['idp']));
    $total = $stmt->rowCount();
    if( $total == 0 ) {
        header('location: deconnecter.php');
        exit;

    }
}
?>

<?php

    $cust_datetime = date('Y-m-d h:i:s');

    $stmt = $pdo->prepare("SELECT * FROM table_panier WHERE id=?");
    $stmt->execute(array($_REQUEST['idp']));
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row1) {
    $qua= $row1['quant'];
    $idpro=$row1['idproduit'];
    }




    $stmt = $pdo->prepare("INSERT INTO tbl_demmande (id_client,
                                                    nom_client,
                                                    email_client,
                                                    date_dem,
                                                    quantite,
                                                    id_produit
                                                ) VALUES (?,?,?,?,?,?)");

    $stmt->execute(array(           $_SESSION['client']['id_c'],
                                    $_SESSION['client']['nom_c'],
                                    $_SESSION['client']['email_c'],
                                     $cust_datetime,
                                     $qua,
                                     $idpro));

    $success_message = 'ajouter avec succes!';


    // Delete from table_panier
    $stmt = $pdo->prepare("DELETE FROM table_panier WHERE id=?");
    $stmt->execute(array($_REQUEST['idp']));

    header('location: panier.php');
?>
