<?php require_once('header.php'); ?>
<?php require_once('headerboutique.php'); ?>

<?php 
include_once "../fonctions/produit.php";
                $i=0;
                $result=affiche_produitboutique();
 ?>

<section class="content-header">
	<div class="content-header-left">
		<h1>les produits</h1>
	</div>
	<div class="content-header-right">
		<a href="ajouter_produit.php" class="btn btn-primary btn-sm" style="background-color: black; border-color: black; float: right; margin-bottom: 10px;">ajouter</a>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-info">
				<div class="box-body table-responsive">
					<table id="example1" class="table table-bordered table-hover table-striped">
					<thead class="thead-dark">
							<tr>
								<th width="10">#</th>
								<th>Photo</th>
								<th width="100">nom produit</th>
								<th width="60">ancien prix</th>
								<th width="60">prix</th>
								<th width="60">quantite</th>
								<th>nombre vue</th>
								<th>Active?</th>
								<th width="120">plus</th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach ($result as $row) {
								$i++;
								?>
								<tr>
									<td><?php echo $i; ?></td>
									<td style="width:82px;"><img src="../assets/uploads/<?php echo $row['p_photo']; ?>" alt="<?php echo $row['p_nom']; ?>" style="width:80px;"></td>
									<td><?php echo $row['p_nom']; ?></td>
									<td><?php echo $row['p_prixanc']; ?> DA</td>
									<td><?php echo $row['p_prix']; ?> DA</td>
									<td><?php echo $row['p_quantite']; ?></td>
								    <td><?php echo $row['p_vue']; ?></td>
									<td>
										<?php if($row['p_active'] == 1) {echo '<span class="badge badge-success" style="background-color:green;">oui</span>';} else {echo '<span class="badge badge-danger" style="background-color:red;">non</span>';} ?>
									</td>
									<td>										
										<a href="modifie_produit.php?idp=<?php echo $row['p_id']; ?>" class="btn btn-primary btn-xs">modifie</a>

										<a href="#" class="btn btn-danger btn-xs" data-href="../fonctions/supp_produitboutique.php?id=<?php echo $row['p_id']; ?>" data-toggle="modal" data-target="#confirm-delete">supprimer</a>  
									</td>
								</tr>
								<?php
							}
							?>	
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>


<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
            </div>
            <div class="modal-body">
                <p>vous etes sur de supprimer?</p>
                <p style="color:red;">attention, tout les demmand seront supprimer</p>
            </div>

            <div class="modal-footer">
                <a class="btn btn-danger btn-ok">oui</a>
            </div>

        </div>
    </div>
</div>

<?php require_once('footer.php'); ?>