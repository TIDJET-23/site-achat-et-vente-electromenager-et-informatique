<?php 
session_start();
include 'BDD.php'; 
//fermer la session user et afficher interface connexion
unset($_SESSION['user']);
header("location: ../admin/connexion.php"); 
?>