<?php



function afficheachat(){

$pdo=pdo();
$i=0;
                                $statement = $pdo->prepare("SELECT * FROM tbl_vente where id_client=?");
                                $statement->execute(array($_SESSION['client']['id_c']));
                                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                                return $result;

}





?>