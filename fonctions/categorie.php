<?php

/*categorie*/
/*afficher les categorie admin*/
function affiche_categorie(){
				$pdo=pdo();
            	$stmt = $pdo->prepare("SELECT * FROM table_cat ORDER BY id_categorie DESC");
            	$stmt->execute();
            	$rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
            	return $rs;
}

//affiche une categorie avec id donner
function affiche_lacategorie(){
                $pdo=pdo();
                $stmt = $pdo->prepare("SELECT * FROM table_cat WHERE id_categorie=?");
                $stmt->execute(array($_REQUEST['id']));
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $result;
}


//la fenction pour verfie si id existe dans la base de donnes
function verifieid_categorie(){
    $pdo=pdo();
    // si il na pas envoyer un id
    if(!isset($_REQUEST['id'])) {
                    header('location: ../fonctions/deconnecteradmin.php');
                    exit;
    } else {
        // si ila envoyer mais il n existe pas dans la base de donnees
        $stmt = $pdo->prepare("SELECT * FROM table_cat WHERE id_categorie=?");
        $stmt->execute(array($_REQUEST['id']));
        $total = $stmt->rowCount();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if( $total == 0 ) {
            header('location: ../fonctions/deconnecteradmin.php');
            exit;
        }
    }               
}


//ajouter la categorie
function ajouter_categorie(){
    $pdo=pdo();
    $valid = 1;
        //si le nom est vide
        if(empty($_POST['nom_cat'])) {
            $valid = 0;
            $message = '<div class="callout callout-danger"><p>ajouter une categorie</p></div>';
            return $message;
        } else {
        	// si la categorie existe deja
        	$stmt = $pdo->prepare("SELECT * FROM table_cat WHERE cat_nom=?");
        	$stmt->execute(array($_POST['nom_cat']));
        	$total = $stmt->rowCount();
        	if($total)
        	{
        		$valid = 0;
            	$message = '<div class="callout callout-danger"><p>la categorie existe deja</p></div>';
                return $message;
        	}
        }
        //sinon inserie la categorie dans la base de donnes
        if($valid == 1) {
    		$stmt = $pdo->prepare("INSERT INTO table_cat (cat_nom,aff_ach) VALUES (?,?)");
    		$stmt->execute(array($_POST['nom_cat'],$_POST['cacher']));
        	$message = '<div class="callout callout-success"><p>categorie ajouter avec succes</p></div>';
            return $message;
        }
}

//fenction pour modifie une categorie
function modifier_categorie(){
	$pdo=pdo();
	$valid = 1;

    if(empty($_POST['nom_cat'])) {
        $valid = 0;
        $message = '<div class="callout callout-danger"><p>ajouter une categorie</p></div>';
        return $message;
    } else {
		// si existee deja
        $stmt = $pdo->prepare("SELECT * FROM table_cat WHERE id_categorie=?");
        $stmt->execute(array($_REQUEST['id']));
               $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach($result as $row) {
                    $nom_catdansBDD = $row['cat_nom'];
                }
                $stmt = $pdo->prepare("SELECT * FROM table_cat WHERE cat_nom=? and cat_nom!=?");
                $stmt->execute(array($_POST['nom_cat'],$nom_catdansBDD));
                $total = $stmt->rowCount();                            
                if($total) {
                    $valid = 0;
                    $message = '<div class="callout callout-danger"><p>cette categorie existe deja</p></div>';
                    return $message;
                }
    }

    if($valid == 1) {    	
		// modifie
		$stmt = $pdo->prepare("UPDATE table_cat SET cat_nom=?,aff_ach=? WHERE id_categorie=?");
		$stmt->execute(array($_POST['nom_cat'],$_POST['cacher'],$_REQUEST['id']));
    	$message = '<div class="callout callout-success"><p>categorie modifie avec succes</p></div>';
        return $message;
    }
}

/*======================sous categorie===============================*/

//permet d afficher tout les sous categorie
function affiche_souscat(){
    $pdo=pdo();
    $i=0;
    $stmt = $pdo->prepare("SELECT * 
        FROM table_souscat t1
        JOIN table_cat t2
        ON t1.id_cat = t2.id_categorie
        ORDER BY t1.id_souscat DESC");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);    
    return $result;
}



//affiche une sous categorie avec id donne
function affiche_lasouscategorie(){
    $pdo=pdo();
    $statement = $pdo->prepare("SELECT * FROM table_souscat WHERE id_souscat=?");
    $statement->execute(array($_REQUEST['id']));
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}


//affiche une sous categorie avec id donne
function affiche_lassouscategoriede_lacat($cat){
    $pdo=pdo();
    $statement = $pdo->prepare("SELECT * FROM table_souscat WHERE id_cat = ? ORDER BY nom_souscat ASC");
    $statement->execute(array($cat));
    $resultsc = $statement->fetchAll(PDO::FETCH_ASSOC);  
    return $resultsc;

}





//la fenction pour verfie si id existe dans la base de donnes
function verifieid_souscategorie(){
    $pdo=pdo();
    // si il na pas envoyer un id
    if(!isset($_REQUEST['id'])) {
        header('location: ../fonctions/deconnecteradmin.php');
        exit;
    } else {
    // id existe ajouter a la base de donnees
        $statement = $pdo->prepare("SELECT * FROM table_souscat WHERE id_souscat=?");
        $statement->execute(array($_REQUEST['id']));
        $total = $statement->rowCount();
        if( $total == 0 ) {
            header('location: ../fonctions/deconnecteradmin.php');
            exit;
        }
    }               
}

//ajouter une sous categorie
function ajouter_souscat(){
    $pdo=pdo();
    $valid = 1;
    //si il na pas selectionnee une categorie
    if(empty($_POST['id_categ'])) {
        $valid = 0;
        $message = '<div class="callout callout-danger"><p>selectionnee une categorie</p></div>';
        return $message;
    }
    //si le champ de la sous categorie est vide
    if(empty($_POST['sous_cat'])) {
        $valid = 0;
        $message = '<div class="callout callout-danger"><p>ajouter une sous categorie</p></div>';
        return $message;
    }
    //sinon il ajoute a la base de donnees
    if($valid == 1) {
        $stmt = $pdo->prepare("INSERT INTO table_souscat (nom_souscat,id_cat) VALUES (?,?)");
        $stmt->execute(array($_POST['sous_cat'],$_POST['id_categ']));
        $message = '<div class="callout callout-success"><p>sous categorie ajouter avec succes</p></div>';
        return $message;
    }
}

//modifie sous categorie
function modifie_souscat(){
    $pdo=pdo();
    $valid = 1;
    // si il n a pas selectionnee la categorie
    if(empty($_POST['id_categ'])) {
        $valid = 0;
        $message = '<div class="callout callout-danger"><p>selectionnee une categorie</p></div>';
        return $message;
    }
    //si le champe de sous categorie est vide 
    if(empty($_POST['sous_cat'])) {
        $valid = 0;
        $message = '<div class="callout callout-danger"><p>ajouter une sous categorie</p></div>';
        return $message;
    }
    //sinon update la base de donnees
    if($valid == 1) {       
        $stmt = $pdo->prepare("UPDATE table_souscat SET nom_souscat=?,id_cat=? WHERE id_souscat=?");
        $stmt->execute(array($_POST['sous_cat'],$_POST['id_categ'],$_REQUEST['id']));
        $message = '<div class="callout callout-success"><p>sous categorie modifie avec succes</p></div>';
        return $message;
    }
}


?>