<?php 

function affiche_commande(){

	$pdo=pdo();
	$i=0;
            	$statement = $pdo->prepare("SELECT * FROM tbl_demmande where idboutique=0 ORDER by id DESC");
            	$statement->execute();
            	$result = $statement->fetchAll(PDO::FETCH_ASSOC);
            	return $result;


}

 ?>