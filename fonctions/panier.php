<?php







function notificationpanier(){
        $pdo=pdo();
        //recuppere tout les champs pour verfie si vide
        $stmt = $pdo->prepare("SELECT * 
            FROM table_panier
            WHERE idper=?
            ");
        $stmt->execute(array($_SESSION['client']['id_c']));
        $comp = $stmt->rowCount();
        
        if ($comp != 0) {
           $comp = '<sup><i class="fa fa-circle" style="font-size: 6px; color: green; "></i>
                                        </sup>';
            return $comp; 
        }


}






?>