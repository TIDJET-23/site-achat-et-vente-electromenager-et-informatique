<?php require_once('header.php'); ?>
<?php require_once('headerboutique.php'); ?>

<?php
$message = '';

include_once "../fonctions/categorie.php";
                $i=0;
                $result1=affiche_categorie();

if(isset($_POST['modifie'])) {
include_once "../fonctions/produit.php";
                $message=modifie_produitboutique();
}
?>



<?php
if(!isset($_REQUEST['idp'])) {
	header('location: deconnecter.php');
	exit;
} else {
	// Check the id is valid or not
	$statement = $pdo->prepare("SELECT * FROM table_produit WHERE p_id=?");
	$statement->execute(array($_REQUEST['idp']));
	$total = $statement->rowCount();
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);
	if( $total == 0 ) {
		header('location: deconnecter.php');
		exit;
	}
}
?>



<section class="content-header">
	<div class="content-header-left">
		<h1>modifie produit</h1>
	</div>
	<div class="content-header-right">
		<a href="produit.php" class="btn btn-primary btn-sm" style="background-color: black; border-color: black; float: right; margin-bottom: 10px;">afficher tout</a>
	</div>
</section>



<?php
$statement = $pdo->prepare("SELECT * FROM table_produit WHERE p_id=?");
$statement->execute(array($_REQUEST['idp']));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {

	$nom_pro = $row['p_nom'];
	$anc_prix = $row['p_prixanc'];
	$prix = $row['p_prix'];
	$quant = $row['p_quantite'];

	$photo_e = $row['p_photo'];

	$p_info = $row['p_info'];
	$p_discr = $row['p_desc'];

	$acti_pro = $row['p_active'];

	$souscat = $row['id_souscat'];
	$cat=$row['cat_id'];

}


?>


<section class="content">

	<div class="row">
		<div class="col-md-12">

			<?php 
			echo $message;
			?>

			<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">

				<div class="box box-info">
					<div class="box-body">

						<div class="form-group">
							<label for="" class="col-sm-3 control-label">categorie <span>*</span></label>
							<div class="col-sm-4">
								<select name="cat" class="form-control select2 cat">
		                            <option value="">selectionnee une categorie</option>

		                            <?php   
		                            foreach ($result1 as $row) {
		                                ?>

		                                <option value="<?php echo $row['id_categorie']; ?>" <?php if($row['id_categorie'] == $cat){echo 'selected';} ?>><?php echo $row['cat_nom']; ?></option>

		                                <?php
		                            }
		                            ?>
		                        </select>
							</div>
						</div>

						<div class="form-group">
							<label for="" class="col-sm-3 control-label">sous categorie <span>*</span></label>
							<div class="col-sm-4">
								<select name="idsous_cat" class="form-control select2 sous-cat">
		                            <option value="">selectionnee une sous categorie</option>
		                            <?php
		                            $statement = $pdo->prepare("SELECT * FROM table_souscat WHERE id_cat = ? ORDER BY nom_souscat ASC");
		                            $statement->execute(array($cat));
		                            $result = $statement->fetchAll(PDO::FETCH_ASSOC);   
		                            foreach ($result as $row) {
		                                ?>
		                                <option value="<?php echo $row['id_souscat']; ?>" <?php if($row['id_souscat'] == $souscat){echo 'selected';} ?>><?php echo $row['nom_souscat']; ?></option>
		                                <?php
		                            }
		                            ?>
		                        </select>
							</div>
						</div>








						<div class="form-group">
							<label for="" class="col-sm-3 control-label">nom de produit <span>*</span></label>
							<div class="col-sm-4">
								<input type="text" name="nom_pro" class="form-control"  value="<?php echo $nom_pro; ?>">
							</div>
						</div>	


						<div class="form-group">
							<label for="" class="col-sm-3 control-label">ancien prix <br><span style="font-size:10px;font-weight:normal;">(DA)</span></label>
							<div class="col-sm-4">
								<input type="text" name="anc_prix" class="form-control"  value="<?php echo $anc_prix; ?>">
							</div>
						</div>


						<div class="form-group">
							<label for="" class="col-sm-3 control-label">prix <span>*</span><br><span style="font-size:10px;font-weight:normal;">(DA)</span></label>
							<div class="col-sm-4">
								<input type="text" name="prix" class="form-control"  value="<?php echo $prix; ?>">
							</div>
						</div>



						<div class="form-group">
							<label for="" class="col-sm-3 control-label">quantite <span>*</span></label>
							<div class="col-sm-4">
								<input type="text" name="quant" class="form-control"  value="<?php echo $quant; ?>">
							</div>
						</div>



					
						







						<div class="form-group">
							<label for="" class="col-sm-3 control-label">ancien photo</label>
							<div class="col-sm-4" style="padding-top:4px;">
								<img src="../assets/uploads/<?php echo $photo_e; ?>" alt="" style="width:150px;">
								<input type="hidden" name="ancphot" value="<?php echo $photo_e; ?>">
							</div>
						</div>


						
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">photo <span>*</span></label>
							<div class="col-sm-4" >
								<input type="file" name="p_photo">
							</div>
						</div>










						<div class="form-group">

							<label for="" class="col-sm-3 control-label">plus de photo</label>
							<div class="col-sm-4" style="padding-top:4px;">
								<table id="ProductTable" style="width:100%;">
			                        <tbody>
			                        	<?php

			                        	
			                        	$statement = $pdo->prepare("SELECT * FROM tbl_p_photo WHERE p_id=?");
			                        	$statement->execute(array($_REQUEST['idp']));
			                        	$result = $statement->fetchAll(PDO::FETCH_ASSOC);
			                        	foreach ($result as $row) {
			                        		?>
											<tr>
				                                <td>
				                                    <img src="../assets/uploads/autre_photosd/<?php echo $row['photo']; ?>" alt="" style="width:150px;margin-bottom:5px;">
				                                </td>
				                                <td style="width:28px;">
				                                	<a  href="../fonctions/supp_autre_photosboutique.php?id=<?php echo $row['pp_id']; ?>&id1=<?php echo $_REQUEST['idp']; ?>" class="btn btn-danger btn-xs">X</a>
				                                </td>
				                            </tr>
			                        		<?php  
			                        	} 
			                        	?>
			                        </tbody>
			                    </table>
							</div>

							<div class="col-sm-2">
			                    <input type="button" id="btnAddNew" value="Add Item" style="margin-top: 5px;margin-bottom:10px;border:0;color: #fff;font-size: 14px;border-radius:3px;" class="btn btn-warning btn-xs">
			                </div>

						</div>





						<div class="form-group">
							<label for="" class="col-sm-3 control-label">information</label>
							<div class="col-sm-8">
								<textarea name="p_info" class="form-control" cols="30" rows="10" id="editor1"><?php echo $p_info; ?></textarea>
							</div>
						</div>



						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Description</label>
							<div class="col-sm-8">
								<textarea name="p_discr" class="form-control" cols="30" rows="10" id="editor2"><?php echo $p_discr; ?></textarea>
							</div>
						</div>
				

						<div class="form-group">
							<label for="" class="col-sm-3 control-label">actifs</label>
							<div class="col-sm-8">
								<select name="acti_pro" class="form-control" style="width:auto;">
									<option value="1" <?php if($acti_pro == '1'){echo 'selected';} ?> >oui</option>
									<option value="0" <?php if($acti_pro == '0'){echo 'selected';} ?>>non</option>
									
								</select> 
							</div>
						</div>


						<div class="form-group">
							<label for="" class="col-sm-3 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="modifie">modifie</button>
							</div>
						</div>
					</div>
				</div>

			</form>


		</div>
	</div>

</section>

<?php require_once('footer.php'); ?>