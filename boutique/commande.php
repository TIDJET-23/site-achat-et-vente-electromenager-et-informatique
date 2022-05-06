<?php require_once('header.php'); ?>
<?php require_once('headerboutique.php'); ?>



<?php

$error_message = "";
$success_message = '';

if($error_message != '') {
    echo "<script>alert('".$error_message."')</script>";
}
if($success_message != '') {
    echo "<script>alert('".$success_message."')</script>";
}
?>



<section class="content-header">
	<div class="content-header-left">
		<h1>les commande</h1>
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
			        <th>#</th>
                    <th>client</th>
			              <th>produit</th>
                    <th>quantite</th>
                    <th>total</th>
                    <th>date</th>
                    <th>Action</th>
			    </tr>

			</thead>
            <tbody>

            	<?php
            	$i=0;
            	$statement = $pdo->prepare("SELECT * FROM tbl_demmande where idboutique=? ORDER by id DESC");
            	$statement->execute(array($_SESSION['botique']['id_c']));
            	$result = $statement->fetchAll(PDO::FETCH_ASSOC);

            	foreach ($result as $row) {
            		$i++;
            		?>

					<tr>
	                    <td><?php echo $i; ?></td>
	                    <td>

                            <b>Id:</b> <?php echo $row['id_client']; ?><br>
                            <b>Name:</b><br> <?php echo $row['nom_client']; ?><br>
                            <b>Email:</b><br> <?php echo $row['email_client']; ?><br><br>

                        </td>

                        <td>

                           <?php
                           $statement1 = $pdo->prepare("SELECT * FROM table_produit WHERE p_id=?");
                           $statement1->execute(array($row['id_produit']));
                           $result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
                           foreach ($result1 as $row1) {
                                echo '<b>produit:</b> '.$row1['p_nom'];                                
                               echo ', <b>prix:</b> '.$row1['p_prix'].' DA';
                                echo '<br><br>';
                           }
                           ?>

                        </td>

                        <td><?php echo $row['quantite']; ?></td>
                        <td><?php echo $row1['p_prix']*$row['quantite'].' DA'; ?></td>

                        <td><?php echo $row['date_dem']; ?></td>


	                    <td>
                            <a href="accepter_com.php?idc=<?php echo $row['id']; ?>" class="btn btn-primary btn-xs"  style="width:100%;">accepter</a> <br><br>

                            <a href="#" class="btn btn-danger btn-xs" data-href="supp_com.php?idc=<?php echo $row['id']; ?>" data-toggle="modal" data-target="#confirm-delete" style="width:100%;">supprimer</a>

	                    </td>

	                </tr>
            		<?php
            	}
            	?>
            </tbody>
          </table>
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
               vous etes sur de supprimer la commande ?
            </div>
            <div class="modal-footer">
                
                <a class="btn btn-danger btn-ok">oui</a>
            </div>
        </div>
    </div>
</div>




<?php require_once('footer.php'); ?>