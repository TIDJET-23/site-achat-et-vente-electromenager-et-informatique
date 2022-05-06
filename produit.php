<?php require_once('header.php'); ?>


<?php
if(!isset($_REQUEST['id'])) {
    header('location: index.php');
    exit;
} else {
    include_once "fonctions/produit.php";
    $result= affiche_leproduit();


}

foreach($result as $row) {
    $nomp = $row['p_nom'];
    $ans_prix = $row['p_prixanc'];
    $prix = $row['p_prix'];
    $p_qty = $row['p_quantite'];
    $photos = $row['p_photo'];
    $idboutique=$row['p_boutique'];
    $pinfo = $row['p_info'];
    $disc = $row['p_desc'];
    $vue = $row['p_vue'];
}



$vue = $vue + 1;

$statement = $pdo->prepare("UPDATE table_produit SET p_vue=? WHERE p_id=?");
$statement->execute(array($vue,$_REQUEST['id']));








$message="";
if(isset($_POST['ajouterau_panier'])) {


if (isset($_SESSION['client'])) {





        if(empty($_SESSION['client'])) {

            $message ="<div class='error' style='padding: 10px;background:#f1f1f1;margin-bottom:20px; border-radius: 5px;'>connectez vous dabord svp <br></div>";

        }else{


           if ($_POST['qua'] > $p_qty) {

                $message ="<div class='error' style='padding: 10px;background:#f1f1f1;margin-bottom:20px; border-radius: 5px;'>desole nous avons pas la quantité que vous demandez <br></div>";
                
            }else{
                 $stmt = $pdo->prepare("INSERT INTO table_panier (idper,idboutique,idproduit,quant) VALUES (?,?,?,?)");
                    $stmt->execute(array($_SESSION['client']['id_c'],$idboutique ,$_REQUEST['id'],$_POST['qua']));

                      $message ="<div class='succes' style='padding: 10px;background:#f1f1f1;margin-bottom:20px; border-radius: 5px;'>ajouter au <a href'panier.php'> panier </a> avec succès <br></div>";
                

            }
           
    

           

        }





   
}else{
    $message ="<div class='error' style='padding: 10px;background:#f1f1f1;margin-bottom:20px; border-radius: 5px;'>vous devait avoir un compte client <br></div>";
}



        


    }







    if(isset($_POST['ajouterau_souh'])) {







        if(isset($_SESSION['client'])) {

             $stmt = $pdo->prepare("INSERT INTO table_souhaite (idper,idproduit) VALUES (?,?)");
                    $stmt->execute(array($_SESSION['client']['id_c'],$_REQUEST['id']));
                     $message ="<div class='succes' style='padding: 10px;background:#f1f1f1;margin-bottom:20px; border-radius: 5px;'>ajouter a la liste des souhite avec succès <br></div>";
            
        }else{


$message ="<div class='error' style='padding: 10px;background:#f1f1f1;margin-bottom:20px; border-radius: 5px;'>vous devait avoir un compte client <br></div>";
                
        }

        


    }
	

?>












<div class="page">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

                <?php  echo $message; ?>

				<div class="product">
					<div class="row">
                        <!--photos-->
						<div class="col-md-5">

							<ul class="prod-slider">
								<li style="background-image: url(assets/uploads/<?php echo $photos; ?>);">
                                    <a class="popup" href="assets/uploads/<?php echo $p_photo; ?>"></a>
								</li>
                                <?php
                                $statement = $pdo->prepare("SELECT * FROM tbl_p_photo WHERE p_id=?");
                                $statement->execute(array($_REQUEST['id']));
                                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($result as $row) {
                                    ?>
                                    <li style="background-image: url(assets/uploads/autre_photosd/<?php echo $row['photo']; ?>);">
                                        <a class="popup" href="assets/uploads/autre_photosd/<?php echo $row['photo']; ?>"></a>
                                    </li>
                                    <?php
                                }
                                ?>
							</ul>
							<div id="prod-pager">
								<a data-slide-index="0" href=""><div class="prod-pager-thumb" style="background-image: url(assets/uploads/<?php echo $photos; ?>"></div></a>
                                <?php
                                $i=1;
                                $statement = $pdo->prepare("SELECT * FROM tbl_p_photo WHERE p_id=?");
                                $statement->execute(array($_REQUEST['id']));
                                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($result as $row) {
                                    ?>
                                    <a data-slide-index="<?php echo $i; ?>" href=""><div class="prod-pager-thumb" style="background-image: url(assets/uploads/autre_photosd/<?php echo $row['photo']; ?>"></div></a>
                                    <?php
                                    $i++;
                                }
                                ?>
							</div>



						</div>
						<div class="col-md-7">
							<div class="p-title"><h2><?php echo $nomp; ?></h2></div>
                            <?php
                                
                                $statement = $pdo->prepare("SELECT * FROM table_client WHERE id_c=?");
                                $statement->execute(array($idboutique));
                                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($result as $row2) {
                                    ?>
                                    <div class="p-title"><?php echo $row2['prenom_c']; ?></h2></div>
                                    <?php
                                }
                                ?>
                            
                            <form action="" method="post">
                            
							<div class="p-price">
                                <span style="font-size:14px;">prix</span><br>
                                <span >
                                    <?php if($ans_prix!=''): ?>
                                        <del style=" color: red;"><?php echo $ans_prix; ?> DA</del> <br>
                                    <?php endif; ?> 
                                        <?php echo $prix; ?> DA
                                </span>
                            </div>


                    
							<div class="p-quantity">
                                quantite <br>
								<input type="number" class="input-text qty" step="1" min="1" max="" name="qua" value="1" title="Qty" size="4"  inputmode="numeric">
							</div>


							<div class="btn-cart btn-cart1">

                                <input type="submit" value="ajouter au panier" name="ajouterau_panier">
                                <input type="submit" value="ajouter listes souhite" name="ajouterau_souh">

							</div>


                            </form>

							
						</div>
					</div>



					<div class="row">
						<div class="col-md-12">
							
							<ul class="nav nav-tabs" role="tablist">

								<li role="presentation" class="active"><a href="#info" aria-controls="info" role="tab" data-toggle="tab">information</a></li>

								<li role="presentation"><a href="#disc" aria-controls="disc" role="tab" data-toggle="tab">description</a></li>

                                
							</ul>


							
							<div class="tab-content">

								<div role="tabpanel" class="tab-pane active" id="info" style="margin-top: -30px;">
									<p>
                                        <?php
                                        
                                            echo $pinfo;
                                        
                                        ?>
									</p>
								</div>

                                <div role="tabpanel" class="tab-pane" id="disc" style="margin-top: -30px;">
                                    <p>
                                        <?php
                                       
                                            echo $disc;
                                        
                                        ?>
                                    </p>
                                </div>


								

                                    
							</div>
						</div>
					</div>

				</div>

			</div>
		</div>
	</div>
</div>



<?php require_once('footer.php'); ?>
