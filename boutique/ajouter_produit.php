<?php require_once('header.php'); ?>
<?php require_once('headerboutique.php'); ?>

<?php
$message = '';

include_once "../fonctions/categorie.php";
                $i=0;
                $result=affiche_categorie();


if(isset($_POST['ajouter'])) {

include_once "../fonctions/produit.php";
                $message=ajouter_produitboutique();
 
}
?>


<section class="content-header">
	<div class="content-header-left">
		<h1>ajouter produit </h1>
	</div>
	<div class="content-header-right">
		<a href="produit.php" class="btn btn-primary btn-sm" style="background-color: black; border-color: black; float: right; margin-bottom: 10px;">afficher tout</a>
	</div>
</section>


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
							<label for="" class="col-sm-3 control-label"> categorie <span>*</span></label>
							<div class="col-sm-4">
								<select name="id_cat" class="form-control select2 cat">
									<option value="">selectionnee une categorie</option>

									<?php
									foreach ($result as $row) {
										?>
										<option value="<?php echo $row['id_categorie']; ?>"><?php echo $row['cat_nom']; ?></option>
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
								</select>
							</div>
						</div>

						<div class="form-group">
							<label for="" class="col-sm-3 control-label">nom de produit <span>*</span></label>
							<div class="col-sm-4">
								<input type="text" name="nom_pro" class="form-control">
							</div>
						</div>	

						<div class="form-group">
							<label for="" class="col-sm-3 control-label">ancien prix <br><span style="font-size:10px;font-weight:normal;">(DA)</span></label>
							<div class="col-sm-4">
								<input type="text" name="anc_prix" class="form-control">
							</div>
						</div>

						<div class="form-group">
							<label for="" class="col-sm-3 control-label">prix <span>*</span><br><span style="font-size:10px;font-weight:normal;">(DA)</span></label>
							<div class="col-sm-4">
								<input type="text" name="prix" class="form-control">
							</div>
						</div>

						<div class="form-group">
							<label for="" class="col-sm-3 control-label">quantite <span>*</span></label>
							<div class="col-sm-4">
								<input type="text" name="quant" class="form-control">
							</div>
						</div>

						<div class="form-group">
							<label for="" class="col-sm-3 control-label">photo <span>*</span></label>
							<div class="col-sm-4" >
								<input type="file" name="p_photo">
							</div>
						</div>

                        <!--dans youtube -->
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">autre photos</label>
							<div class="col-sm-4" style="padding-top:4px;">
								<table id="ProductTable" style="width:100%;">
			                        <tbody>
			                            <tr>
			                                <td>
			                                    <div class="upload-btn">
			                                        <input type="file" name="photo[]" style="margin-bottom:5px;">
			                                    </div>
			                                </td>
			                                <td style="width:28px;"><a href="javascript:void()" class="Delete btn btn-danger btn-xs">X</a></td>
			                            </tr>
			                        </tbody>
			                    </table>
							</div>

							<div class="col-sm-2">
			                    <input type="button" id="btnAddNew" value="plus" style="margin-top: 5px;margin-bottom:10px;border:0;color: #fff;font-size: 14px;border-radius:3px;" class="btn btn-warning btn-xs">
			                </div>

						</div>

						<div class="form-group">
							<label for="" class="col-sm-3 control-label">information</label>
							<div class="col-sm-8">
								<textarea name="pro_info" class="form-control" cols="30" rows="10" id="editor1"></textarea>
							</div>
						</div>

						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Description</label>
							<div class="col-sm-8">
								<textarea name="pro_descr" class="form-control" cols="30" rows="10" id="editor2"></textarea>
							</div>
						</div>
				
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">actifs</label>
							<div class="col-sm-8">
								<select name="acti_pro" class="form-control" style="width:auto;">
									<option value="1">oui</option>
									<option value="0">non</option>
									
								</select> 
							</div>
						</div>

						<div class="form-group">
							<label for="" class="col-sm-3 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="ajouter">ajouter</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>

<?php require_once('footer.php'); ?>