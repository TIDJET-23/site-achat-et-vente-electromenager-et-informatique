<?php require_once('header.php'); ?>


<?php 
/*faire appele pour la fenction qui affiche tout les sous categorie*/
include_once "../fonctions/categorie.php";
$i=0;
$result=affiche_souscat();
?>

<section class="content-header">
	<div class="content-header-left">
		<h1>sous categorie</h1>
	</div>
	<div class="content-header-right">
		<a href="ajouter_sous-categorie.php" class="btn btn-primary btn-sm">ajouter</a>
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
                     <th>nom</th>
                     <th>categorie</th>
                     <th>plus</th>
                 </tr>
             </thead>
             <tbody>
               <?php		
               foreach ($result as $row) {
                  $i++;
                  ?>
                  <tr>
                   <td><?php echo $i; ?></td>
                   <td><?php echo $row['nom_souscat']; ?></td>
                   <td><?php echo $row['cat_nom']; ?></td>
                   <td>
                       <a href="modifie_sous-categorie.php?id=<?php echo $row['id_souscat']; ?>" class="btn btn-primary btn-xs">modifie</a>
                       <a href="#" class="btn btn-danger btn-xs" data-href="../fonctions/supp_sous-categorie.php?id=<?php echo $row['id_souscat']; ?>" data-toggle="modal" data-target="#confirm-delete">supprimer</a>
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
                <p>vous etes sur de supprimer cette sous categorie??</p>
                <p style="color:red;">attention, tout les produit de cette sous categorie va etre supprimer</p>
            </div>
            <div class="modal-footer">
             
                <a class="btn btn-danger btn-ok">oui</a>
            </div>
        </div>
    </div>
</div>


<?php require_once('footer.php'); ?>