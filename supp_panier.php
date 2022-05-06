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


    // Delete from table_panier
    $stmt = $pdo->prepare("DELETE FROM table_panier WHERE id=?");
    $stmt->execute(array($_REQUEST['idp']));

    header('location: panier.php');
?>
