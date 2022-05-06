<?php require_once('header.php'); ?>

<?php
include_once "../fonctions/utilisateur.php";
                
                // faire appele a la fenction qui affiche les client
                $rslt=affiche_clients();
                $i=0;
?>


<section class="content-header">
	<div class="content-header-left">
		<h1>liste des clients</h1>
	</div>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-info">
				<div class="box-body table-responsive">
					<table id="example1" class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
								<th width="10">#</th>
								<th width="180">Nom</th>
								<th width="180">prenom</th>
								<th width="150">Email</th>
								<th width="150">telphone</th>
								<th width="180">adresse</th>
								<th width="180">date inscription</th>
							</tr>
						</thead>
						<tbody>

							<?php 					
							foreach ($rslt as $affiche) {
								$i++;
							?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $affiche['nom_c'];  ?></td> 
									<td><?php echo $affiche['prenom_c']; ?></td>
									<td><?php echo $affiche['email_c']; ?></td>
									<td><?php echo $affiche['tel_c']; ?></td>
									<td>
										<?php echo $affiche['add_c']; ?>
										<?php echo $affiche['code_postal_c'];  ?><br>
										<?php echo $affiche['willaya_c'];  ?>
										<?php echo $affiche['ville_c']; ?>
										<?php echo $affiche['country_name']; ?>		
									</td>
									<td><?php echo $affiche['dateins_c']; ?></td>
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







<?php require_once('footer.php'); ?>