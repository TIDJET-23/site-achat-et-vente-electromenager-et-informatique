<?php


// la fenction qui permet d afficher les produit
//cest la jointur entre la table produit et categorie et sous categorie
function affiche_produit(){
    $pdo=pdo();
    $statement = $pdo->prepare("SELECT
      *
      FROM table_produit
      where p_boutique=?
      ORDER BY p_id DESC
      ");
    $statement->execute(array(0));
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

//fenction pour afficher un seul produit
function affiche_leproduit(){
  $pdo=pdo();
    $statement = $pdo->prepare("SELECT * FROM table_produit WHERE p_id=?");
    $statement->execute(array($_REQUEST['id']));
    $total = $statement->rowCount();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    if( $total == 0 ) {
        header('location: index.php');
        exit;
    }
    return $result;
}



//fenction pour ajouter un produit
function ajouter_produit()
      {
                $pdo=pdo();
                $valid = 1;

                if(empty($_POST['id_cat'])) {
                    $valid = 0;
                    $message = '<div class="callout callout-danger"><p>selectionee une categorie</p></div>';
                        return $message;
                }
            
                if(empty($_POST['nom_pro'])) {
                    $valid = 0;
                    $message = '<div class="callout callout-danger"><p>ajouter le nom de produit</p></div>';
                        return $message;
                }

                if(empty($_POST['prix'])) {
                    $valid = 0;
                    $message = '<div class="callout callout-danger"><p>ajouter le prix de produit</p></div>';
                        return $message;
                }

                if(empty($_POST['quant'])) {
                    $valid = 0;
                    $message = '<div class="callout callout-danger"><p>ajouter votre quantite</p></div>';
                        return $message;
                }


                //verfie la photo si vide et le format
                $lien = $_FILES['p_photo']['name'];
                $lien_t = $_FILES['p_photo']['tmp_name'];

                if($lien!='') {
                    $ext = pathinfo( $lien, PATHINFO_EXTENSION );
                    $file_name = basename( $lien, '.' . $ext );
                    if( $ext!='jpg' && $ext!='png' && $ext!='jpeg' && $ext!='gif' ) {
                        $valid = 0;
                        $message = '<div class="callout callout-danger"><p>erreur dans le type de la photo</p></div>';
                        return $message;
                    }
                } else {
                  $valid = 0;
                   $message = '<div class="callout callout-danger"><p>ajouter une photo svp</p></div>';
                        return $message;
                }



          if($valid == 1) 
          {
              
                $stmt = $pdo->prepare("SHOW TABLE STATUS LIKE 'table_produit'");
                $stmt->execute();
                $result = $stmt->fetchAll();
                foreach($result as $row) {
                   $ai_id=$row[10];
                }

               if( isset($_FILES['photo']["name"]) && isset($_FILES['photo']["tmp_name"]) )
               {
                   $photo = array();
                   $photo = $_FILES['photo']["name"];
                   $photo = array_values(array_filter($photo));

                   $photo_temp = array();
                   $photo_temp = $_FILES['photo']["tmp_name"];
                   $photo_temp = array_values(array_filter($photo_temp));

                   $stmt = $pdo->prepare("SHOW TABLE STATUS LIKE 'tbl_p_photo'");
                   $stmt->execute();
                   $result = $stmt->fetchAll();
                   foreach($result as $row) {
                    $next_id1=$row[10];
                    }
                    $z = $next_id1;

                    $m=0;

                  //inserie les photo secondaire au dossier oploade
                  for($i=0;$i<count($photo);$i++)
                  {
                      $my_ext1 = pathinfo( $photo[$i], PATHINFO_EXTENSION );
                      if( $my_ext1=='jpg' || $my_ext1=='png' || $my_ext1=='jpeg' || $my_ext1=='gif' ) {
                        $final_name1[$m] = $z.'.'.$my_ext1;
                        move_uploaded_file($photo_temp[$i],"../assets/uploads/autre_photosd/".$final_name1[$m]);
                        $m++;
                        $z++;
                    }
                  }

                  //inserie les photo secondaire a la bdd
                  if(isset($final_name1)) {
                   for($i=0;$i<count($final_name1);$i++)
                   {
                     $stmt = $pdo->prepare("INSERT INTO tbl_p_photo (photo,p_id) VALUES (?,?)");
                     $stmt->execute(array($final_name1[$i],$ai_id));
                    }
                  }            
                }


                //ajouter la photo prencipale au dossier uploads
                $nomphoto = 'produit-'.$ai_id.'.'.$ext;
                move_uploaded_file( $lien_t, '../assets/uploads/'.$nomphoto );

                //ajouter a bdd
                $stmt = $pdo->prepare("INSERT INTO table_produit(
                  p_nom,
                  p_prixanc,
                  p_prix,
                  p_quantite,
                  p_photo,
                  p_info,
                  p_desc,
                  p_vue,
                  p_boutique,
                  p_active,
                  id_souscat,
                  cat_id
                ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
                $stmt->execute(array(
                  $_POST['nom_pro'],
                  $_POST['anc_prix'],
                  $_POST['prix'],
                  $_POST['quant'],
                  $nomphoto,
                  $_POST['pro_info'],
                  $_POST['pro_descr'],
                  0,
                  0,
                  $_POST['acti_pro'],
                  $_POST['idsous_cat'],
                  $_POST['id_cat']
                ));

                $message = '<div class="callout callout-success"><p>produit ajouter avec succes</p></div>';
                return $message;    
            }
}

// verfie l id de produit envoyer par requeste
function verifieid_produit(){
    $pdo=pdo();
    // si il na pas envoyer un id
      if(!isset($_REQUEST['idp'])) {
        header('location: ../fonctions/deconnecteradmin.php');
        exit;
      } else {
        // Check the id is valid or not
        $statement = $pdo->prepare("SELECT * FROM table_produit WHERE p_id=?");
        $statement->execute(array($_REQUEST['idp']));
        $total = $statement->rowCount();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        if( $total == 0 ) {
           header('location: ../fonctions/deconnecteradmin.php');
          exit;
        }
      }
}

//fenction pour afficher un seul produit
function affiche_leproduitpourmodifie(){
  $pdo=pdo();

    $statement = $pdo->prepare("SELECT * FROM table_produit WHERE p_id=?");
    $statement->execute(array($_REQUEST['idp']));
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

function afficher_autrephotos(){
    $pdo=pdo();
    $statement = $pdo->prepare("SELECT * FROM tbl_p_photo WHERE p_id=?");
    $statement->execute(array($_REQUEST['idp']));
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $result;

}


//fenction pour modifie la base de donnees
function modifie_produit(){
                  $pdo=pdo();
                  $valid = 1;

                  if(empty($_POST['cat'])) {
                     $valid = 0;
                     $message = '<div class="callout callout-danger"><p>selectionee une categorie</p></div>';
                          return $message;
                  }

                  
                  if(empty($_POST['nom_pro'])) {
                     $valid = 0;
                     $message = '<div class="callout callout-danger"><p>ajouter le nom de produit</p></div>';
                          return $message;
                  }

                  if(empty($_POST['prix'])) {
                     $valid = 0;
                     $message = '<div class="callout callout-danger"><p>ajouter le prix de produit</p></div>';
                      return $message;
                  }

                  if(empty($_POST['quant'])) {
                     $valid = 0;
                     $message = '<div class="callout callout-danger"><p>ajouter votre quantite</p></div>';
                          return $message;
                  }

                   $lien = $_FILES['p_photo']['name'];
                   $lien_t = $_FILES['p_photo']['tmp_name'];

                   if($lien!='') {
                    $ext = pathinfo( $lien, PATHINFO_EXTENSION );
                    $file_name = basename( $lien, '.' . $ext );
                    if( $ext!='jpg' && $ext!='png' && $ext!='jpeg' && $ext!='gif' ) {
                        $valid = 0;
                        $message = '<div class="callout callout-danger"><p>erreur dans le type de la photo</p></div>';
                            return $message;
                    }
                  }


                 if($valid == 1) {


                        $pdo=pdo();
                        if( isset($_FILES['photo']["name"]) && isset($_FILES['photo']["tmp_name"]) )
                        {

                           $photo = array();
                           $photo = $_FILES['photo']["name"];
                           $photo = array_values(array_filter($photo));

                           $photo_temp = array();
                           $photo_temp = $_FILES['photo']["tmp_name"];
                           $photo_temp = array_values(array_filter($photo_temp));

                           $statement = $pdo->prepare("SHOW TABLE STATUS LIKE 'tbl_p_photo'");
                           $statement->execute();
                           $result = $statement->fetchAll();
                           foreach($result as $row) {
                            $next_id1=$row[10];
                            }
                            $z = $next_id1;

                            $m=0;
                            for($i=0;$i<count($photo);$i++)
                            {
                                $my_ext1 = pathinfo( $photo[$i], PATHINFO_EXTENSION );
                                if( $my_ext1=='jpg' || $my_ext1=='png' || $my_ext1=='jpeg' || $my_ext1=='gif' ) {
                                  $final_name1[$m] = $z.'.'.$my_ext1;
                                  move_uploaded_file($photo_temp[$i],"../assets/uploads/autre_photosd/".$final_name1[$m]);
                                  $m++;
                                  $z++;
                              }
                            }

                            if(isset($final_name1)) {
                             for($i=0;$i<count($final_name1);$i++)
                             {
                               $statement = $pdo->prepare("INSERT INTO tbl_p_photo (photo,p_id) VALUES (?,?)");
                               $statement->execute(array($final_name1[$i],$_REQUEST['idp']));
                              }
                            }            
                        }


                      if($lien == '') {
                         $pdo=pdo();
                         $statement = $pdo->prepare("UPDATE table_produit SET 
                           p_nom=?, 
                           p_prixanc=?, 
                           p_prix=?, 
                           p_quantite=?,
                           p_info=?,
                           p_desc=?,
                           p_active=?,
                           id_souscat=?,
                           cat_id=?

                           WHERE p_id=? ");

                         $statement->execute(array(
                           $_POST['nom_pro'],
                           $_POST['anc_prix'],
                           $_POST['prix'],
                           $_POST['quant'],
                           $_POST['p_info'],
                           $_POST['p_discr'],
                           $_POST['acti_pro'],
                           $_POST['idsous_cat'],
                           $_POST['cat'],
                           $_REQUEST['idp']
                       ));

                      } else {

                          $pdo=pdo();
                          unlink('../assets/uploads/'.$_POST['ancphot']);

                          $nom_photo = 'produit-'.$_REQUEST['idp'].'.'.$ext;
                          move_uploaded_file( $lien_t, '../assets/uploads/'.$nom_photo );


                          $statement = $pdo->prepare("UPDATE table_produit SET 
                           p_nom=?, 
                           p_prixanc=?, 
                           p_prix=?, 
                           p_quantite=?,

                           p_photo=?,
                           p_info=?,
                           p_desc=?,


                           p_active=?,

                           id_souscat=?,
                           cat_id=?

                           WHERE p_id=?");
                          $statement->execute(array(
                           $_POST['nom_pro'],
                           $_POST['anc_prix'],
                           $_POST['prix'],
                           $_POST['quant'],

                           $nom_photo,
                           $_POST['p_info'],
                           $_POST['p_discr'],



                           $_POST['acti_pro'],

                           $_POST['idsous_cat'],
                           $_POST['cat'],

                           $_REQUEST['idp']
                       ));
                      }

                      $message = '<div class="callout callout-success"><p>produit modifie avec succes</p></div>';
                              return $message;
                      }
}




//*******************************boutique*********************************************//
function affiche_produitboutique(){
    $pdo=pdo();
    $statement = $pdo->prepare("SELECT
      *

      FROM table_produit
      
      where p_boutique=?
      ORDER BY p_id DESC
      ");
    $statement->execute(array($_SESSION['botique']['id_c']));
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}





//fenction pour ajouter un produit
function ajouter_produitboutique(){
    $pdo=pdo();
    $valid = 1;

    if(empty($_POST['id_cat'])) {
        $valid = 0;
        $message = '<div class="callout callout-danger"><p>selectionee une categorie</p></div>';
            return $message;
    }

       
    if(empty($_POST['nom_pro'])) {
        $valid = 0;
        $message = '<div class="callout callout-danger"><p>ajouter le nom de produit</p></div>';
            return $message;
    }

    if(empty($_POST['prix'])) {
        $valid = 0;
        $message = '<div class="callout callout-danger"><p>ajouter le prix de produit</p></div>';
            return $message;
    }

    if(empty($_POST['quant'])) {
        $valid = 0;
        $message = '<div class="callout callout-danger"><p>ajouter votre quantite</p></div>';
            return $message;
    }


    //pour ajouter une photo
    $lien = $_FILES['p_photo']['name'];
    $lien_t = $_FILES['p_photo']['tmp_name'];

    if($lien!='') {
        $ext = pathinfo( $lien, PATHINFO_EXTENSION );
        $file_name = basename( $lien, '.' . $ext );
        if( $ext!='jpg' && $ext!='png' && $ext!='jpeg' && $ext!='gif' ) {
            $valid = 0;
            $message = '<div class="callout callout-danger"><p>erreur dans le type de la photo</p></div>';
            return $message;
        }
    } else {
      $valid = 0;
       $message = '<div class="callout callout-danger"><p>ajouter une photo svp</p></div>';
            return $message;
    }



    if($valid == 1) {
      
     $stmt = $pdo->prepare("SHOW TABLE STATUS LIKE 'table_produit'");
      $stmt->execute();
      $result = $stmt->fetchAll();
      foreach($result as $row) {
         $ai_id=$row[10];
     }




     if( isset($_FILES['photo']["name"]) && isset($_FILES['photo']["tmp_name"]) )
     {
       $photo = array();
       $photo = $_FILES['photo']["name"];
       $photo = array_values(array_filter($photo));

       $photo_temp = array();
       $photo_temp = $_FILES['photo']["tmp_name"];
       $photo_temp = array_values(array_filter($photo_temp));

       $stmt = $pdo->prepare("SHOW TABLE STATUS LIKE 'tbl_p_photo'");
       $stmt->execute();
       $result = $stmt->fetchAll();
       foreach($result as $row) {
        $next_id1=$row[10];
    }
    $z = $next_id1;

    $m=0;
    for($i=0;$i<count($photo);$i++)
    {
        $my_ext1 = pathinfo( $photo[$i], PATHINFO_EXTENSION );
        if( $my_ext1=='jpg' || $my_ext1=='png' || $my_ext1=='jpeg' || $my_ext1=='gif' ) {
          $final_name1[$m] = $z.'.'.$my_ext1;
          move_uploaded_file($photo_temp[$i],"../assets/uploads/autre_photosd/".$final_name1[$m]);
          $m++;
          $z++;
      }
  }

  if(isset($final_name1)) {
   for($i=0;$i<count($final_name1);$i++)
   {
     $stmt = $pdo->prepare("INSERT INTO tbl_p_photo (photo,p_id) VALUES (?,?)");
     $stmt->execute(array($final_name1[$i],$ai_id));
 }
}            
}


$nomphoto = 'produit-'.$ai_id.'.'.$ext;
move_uploaded_file( $lien_t, '../assets/uploads/'.$nomphoto );

//ajouter a bdd
$stmt = $pdo->prepare("INSERT INTO table_produit(
  p_nom,
  p_prixanc,
  p_prix,
  p_quantite,
  p_photo,
  p_info,
  p_desc,
  p_vue,
  p_boutique,
  p_active,
  id_souscat,
  cat_id
) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
$stmt->execute(array(
  $_POST['nom_pro'],
  $_POST['anc_prix'],
  $_POST['prix'],
  $_POST['quant'],
  $nomphoto,
  $_POST['pro_info'],
  $_POST['pro_descr'],
  0,
  $_SESSION['botique']['id_c'],
  $_POST['acti_pro'],
  $_POST['idsous_cat'],
  $_POST['id_cat']
));

$message = '<div class="callout callout-success"><p>produit ajouter avec succes</p></div>';
        return $message;
}
}





function modifie_produitboutique(){
    $pdo=pdo();
    $valid = 1;

    if(empty($_POST['cat'])) {
       $valid = 0;
       $message = '<div class="callout callout-danger"><p>selectionee une categorie</p></div>';
            return $message;
   }

   if(empty($_POST['nom_pro'])) {
       $valid = 0;
       $message = '<div class="callout callout-danger"><p>ajouter le nom de produit</p></div>';
            return $message;
   }


   if(empty($_POST['prix'])) {
       $valid = 0;
       $message = '<div class="callout callout-danger"><p>ajouter le prix de produit</p></div>';
        return $message;
   }

   if(empty($_POST['quant'])) {
       $valid = 0;
       $message = '<div class="callout callout-danger"><p>ajouter votre quantite</p></div>';
            return $message;
   }






   $lien = $_FILES['p_photo']['name'];
   $lien_t = $_FILES['p_photo']['tmp_name'];

   if($lien!='') {
    $ext = pathinfo( $lien, PATHINFO_EXTENSION );
    $file_name = basename( $lien, '.' . $ext );
    if( $ext!='jpg' && $ext!='png' && $ext!='jpeg' && $ext!='gif' ) {
        $valid = 0;
        $message = '<div class="callout callout-danger"><p>erreur dans le type de la photo</p></div>';
            return $message;
    }
}








if($valid == 1) {


    $pdo=pdo();
    if( isset($_FILES['photo']["name"]) && isset($_FILES['photo']["tmp_name"]) )
    {

       $photo = array();
       $photo = $_FILES['photo']["name"];
       $photo = array_values(array_filter($photo));

       $photo_temp = array();
       $photo_temp = $_FILES['photo']["tmp_name"];
       $photo_temp = array_values(array_filter($photo_temp));

       $statement = $pdo->prepare("SHOW TABLE STATUS LIKE 'tbl_p_photo'");
       $statement->execute();
       $result = $statement->fetchAll();
       foreach($result as $row) {
        $next_id1=$row[10];
    }
    $z = $next_id1;

    $m=0;
    for($i=0;$i<count($photo);$i++)
    {
        $my_ext1 = pathinfo( $photo[$i], PATHINFO_EXTENSION );
        if( $my_ext1=='jpg' || $my_ext1=='png' || $my_ext1=='jpeg' || $my_ext1=='gif' ) {
          $final_name1[$m] = $z.'.'.$my_ext1;
          move_uploaded_file($photo_temp[$i],"../assets/uploads/autre_photosd/".$final_name1[$m]);
          $m++;
          $z++;
      }
  }

  if(isset($final_name1)) {
   for($i=0;$i<count($final_name1);$i++)
   {
     $statement = $pdo->prepare("INSERT INTO tbl_p_photo (photo,p_id) VALUES (?,?)");
     $statement->execute(array($final_name1[$i],$_REQUEST['idp']));
 }
}            
}













if($lien == '') {
   $pdo=pdo();
   $statement = $pdo->prepare("UPDATE table_produit SET 
     p_nom=?, 
     p_prixanc=?, 
     p_prix=?, 
     p_quantite=?,
     p_info=?,
     p_desc=?,
     p_active=?,
     id_souscat=?,
     cat_id=?

     WHERE p_id=? ");

   $statement->execute(array(
     $_POST['nom_pro'],
     $_POST['anc_prix'],
     $_POST['prix'],
     $_POST['quant'],
     $_POST['p_info'],
     $_POST['p_discr'],
     $_POST['acti_pro'],
     $_POST['idsous_cat'],
     $_POST['cat'],
     $_REQUEST['idp']
 ));

} else {

    $pdo=pdo();
    unlink('../assets/uploads/'.$_POST['ancphot']);

    $nom_photo = 'produit-'.$_REQUEST['idp'].'.'.$ext;
    move_uploaded_file( $lien_t, '../assets/uploads/'.$nom_photo );


    $statement = $pdo->prepare("UPDATE table_produit SET 
     p_nom=?, 
     p_prixanc=?, 
     p_prix=?, 
     p_quantite=?,

     p_photo=?,
     p_info=?,
     p_desc=?,


     p_active=?,

     id_souscat=?,
     cat_id=?

     WHERE p_id=?");
    $statement->execute(array(
     $_POST['nom_pro'],
     $_POST['anc_prix'],
     $_POST['prix'],
     $_POST['quant'],

     $nom_photo,
     $_POST['p_info'],
     $_POST['p_discr'],



     $_POST['acti_pro'],

     $_POST['idsous_cat'],
     $_POST['cat'],

     $_REQUEST['idp']
 ));
}

$message = '<div class="callout callout-success"><p>produit modifie avec succes</p></div>';
        return $message;
}
}
