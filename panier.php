<?php require_once('header.php'); ?>



 <?php $message=''; ?>



<?php if (isset($_SESSION['client'])) {
    
 
$statement = $pdo->prepare("SELECT * FROM table_panier WHERE idper=?");
$statement->execute(array($_SESSION['client']['id_c']));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
foreach ($result as $row) {
    $idproduit = $row['idproduit'];
    $quant = $row['quant'];
}




if (isset($_POST['pai'])) {



$statement = $pdo->prepare("SELECT * FROM table_panier WHERE idper=?");
$statement->execute(array($_SESSION['client']['id_c']));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
foreach ($result as $row) {
    $idpanier=$row['id'];
    $cust_datetime = date('Y-m-d h:i:s');
    $idproduit = $row['idproduit'];
     $boutique=$row['idboutique'];
    $quant = $row['quant'];


    $stmt = $pdo->prepare("INSERT INTO tbl_demmande (id_client,
                                                    nom_client,
                                                    email_client,
                                                    idboutique,
                                                    date_dem,
                                                    quantite,
                                                    id_produit
                                                ) VALUES (?,?,?,?,?,?,?)");

    $stmt->execute(array(           $_SESSION['client']['id_c'],
                                    $_SESSION['client']['nom_c'],
                                    $_SESSION['client']['email_c'],
                                    $boutique,
                                     $cust_datetime,
                                     $quant,
                                     $idproduit));

    $message = 'ajouter avec succes!';

    // Delete from table_panier
    $stmt = $pdo->prepare("DELETE FROM table_panier WHERE id=?");
    $stmt->execute(array($idpanier));



}





}

?>









<div class="page-banner">
    <div class="overlay"></div>

    <div class="page-banner-inner">
        <h1>panier</h1>
    </div>
    
</div>


<?php
 $statement = $pdo->prepare("SELECT * FROM tbl_demmande WHERE id_client=?");
            $statement->execute(array($_SESSION['client']['id_c']));
            $total = $statement->rowCount();                            
            if($total == 1) {   
               $message  = 'vous avez une commande en cours de traitment ...';
            }elseif ($total > 1) {
                $message = 'vous avez des commandes en cours de traitment ...';
            }

?>



<div class="page">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

              
                <form action="" method="post">
				<div class="cart">

                <?php  echo $message; ?>

                    <table class="table table-responsive table-hover table-bordered">

                        <tr>
                            <th><?php echo '#' ?></th>
                            <th width="100">photos</th>
                            <th width="160">nom produit</th>
                            <th width="160">prix</th>
                            
                            <th width="100">votre quantite</th>
                            <th width="100">total</th>
                           
                            <th >plus</th>
                        </tr>



                            <?php
                            $i=0;
                            $statement = $pdo->prepare("SELECT * FROM table_panier WHERE idper=?");
                            $statement->execute(array($_SESSION['client']['id_c']));
                            $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            

                            foreach ($result as $row) {
                                                        $i++;
                                                        $idproduit = $row['idproduit'];

                                                    ?>
                 


                                    <?php
                                    $statement = $pdo->prepare("SELECT * FROM table_produit WHERE p_id=?");
                                    $statement->execute(array( $idproduit ));
                                    $result1 = $statement->fetchAll(PDO::FETCH_ASSOC);                            
                                    foreach ($result1 as $row1) {
                                                               
                                                            ?>



                        <tr>
                            <td><?php echo $i; ?></td>

                            <td>
                                    <img src="assets/uploads/<?php echo $row1['p_photo']; ?>" alt="<?php echo $row1['p_nom']; ?>" style="width:80px;">
                            </td>

                            <td><?php echo $row1['p_nom']; ?></td>

                            <td id="to"><?php echo $row1['p_prix'].' DA'; ?> DA</td>

                            <td>
                                  <?php echo $row['quant']; ?>
                            </td>
                            <td>
                                  <?php echo $row['quant']*$row1['p_prix'].' DA'; ?>
                            </td>

                            <?php
                                    }
                                     ?> 

                            <td >



                                <a href="supp_panier.php?idp=<?php echo $row['id']; ?>" class="btn btn-danger btn-xs" data-href="" >supprimer</a>
                                


                            </td>


                        </tr>

                        

                        
                <?php
                            }
                            ?>                     

                          

<tr>
                            <th width="100"></th>
                            <th></th>
                            <th width="100"></th>
                            <th width="160"></th>
                            <th>total</th>
                            <th width="100">
                            </th>
                            <th width="160"><input type="submit" class="btn btn-primary" value="acheter" name="pai"></th>

                        </tr>


                        





                       
                      

                    </table> 




                </div>




               
                </form>
              

                

			</div>
		</div>
	</div>
</div>











<div class="page-banner">
    <div class="overlay"></div>

    <div class="page-banner-inner">
        <h1>listes des souhaite</h1>
    </div>
    
</div>



<div class="page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

              
                <form action="" method="post">
                <div class="cart">

                    <table class="table table-responsive table-hover table-bordered">

                        <tr>
                            <th><?php echo '#' ?></th>
                            <th width="100">photos</th>
                            <th width="160">nom produit</th>
                            <th width="160">prix</th>
                            <th >plus</th>
                        </tr>



                            <?php
                            $i=0;
                            $statement = $pdo->prepare("SELECT * FROM table_souhaite WHERE idper=?");
                            $statement->execute(array($_SESSION['client']['id_c']));
                            $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            

                            foreach ($result as $row) {
                                                        $i++;
                                                        $idproduit = $row['idproduit'];
                                                    ?>
                 


                                    <?php
                                    $statement = $pdo->prepare("SELECT * FROM table_produit WHERE p_id=?");
                                    $statement->execute(array( $idproduit ));
                                    $result1 = $statement->fetchAll(PDO::FETCH_ASSOC);                            
                                    foreach ($result1 as $row1) {
                                                               
                                                            ?>



                        <tr>
                            <td><?php echo $i; ?></td>

                            <td>
                                    <img src="assets/uploads/<?php echo $row1['p_photo']; ?>" alt="<?php echo $row1['p_nom']; ?>" style="width:80px;">
                            </td>

                            <td><?php echo $row1['p_nom']; ?></td>

                            <td><?php echo $row1['p_prix'].' DA'; ?> DA</td>

                           
                            <?php
                                    }
                                     ?> 

                            <td >


                                <a href="supp_souh.php?idp=<?php echo $row['id']; ?>" class="btn btn-danger btn-xs" data-href="" >supprimer</a>
                                <a href="produit.php?id=<?php echo $row['idproduit']; ?>" class="btn btn-primary btn-xs" data-href="" >plus</a>


                            </td>


                        </tr>
                                    

                         <?php
                            }
                            ?>  







                       
                      

                    </table> 




                </div>




               
                </form>
              

                

            </div>
        </div>
    </div>
</div>







<?php }else {


    
} ?>









<?php require_once('footer.php'); ?>