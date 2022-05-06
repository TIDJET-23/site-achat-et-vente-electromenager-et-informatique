<?php

function pdo(){
// host
$dbhost = 'localhost';

// nom de la base de donnees
$dbname = 'electshop_bdd';

// nom utilisateur
$dbuser = 'root';

// mot de passe 
$dbpass = '';

try {
	$pdo = new PDO("mysql:host={$dbhost};dbname={$dbname}", $dbuser, $dbpass);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch( PDOException $exception ) {
	echo "Connection error :" . $exception->getMessage();
}

return $pdo;

}