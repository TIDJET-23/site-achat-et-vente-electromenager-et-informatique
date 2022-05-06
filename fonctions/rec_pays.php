<?php

function affiche_pays(){
	
   $pdo=pdo();
   $stmt = $pdo->prepare("SELECT * FROM table_pays ORDER BY country_name ASC");
                                    $stmt->execute();
                                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

?>