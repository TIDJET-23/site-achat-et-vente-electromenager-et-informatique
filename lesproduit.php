<?php require_once('header.php'); ?>

<?php 
include_once "fonctions/categorie.php";
                $i=0;
                $result=affiche_categorie();
 ?>


<div class="page-banner" >
    <div class="inner">
        <h1>produit</h1>
    </div>
</div>





<div class="page">
    <div class="container">
        <div class="row">

            <div class="col-md-3">
                



                    <h3>categorie</h3>
    <div id="left" class="span3">

        <ul id="menu-group-1" class="nav menu">

            <?php
                

                foreach ($result as $row) {
                    $i++;
                    ?>


                    <li class="cat-level-1 deeper parent">


                        <a class="" href="lesproduit.php?id=<?php echo $row['id_categorie']; ?> ">
                            <span data-toggle="collapse" data-parent="#menu-group-1" href="#cat-lvl1-id-<?php echo $i; ?>" class="sign"><i class="fa fa-plus"></i></span>
                            <span class="lbl"><?php echo $row['cat_nom']; ?></span>                      
                        </a>


                        <ul class="children nav-child unstyled small collapse" id="cat-lvl1-id-<?php echo $i; ?>">
                            <?php
                            $j=0;
                            $statement1 = $pdo->prepare("SELECT * FROM table_souscat WHERE id_cat=?");
                            $statement1->execute(array($row['id_categorie']));
                            $result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($result1 as $row1) {
                                $j++;
                                ?>
                                <li class="deeper parent">
                                    <a class="" href="lesproduit.php?idsous=<?php echo $row1['id_souscat']; ?>&id=<?php echo $row['id_categorie']; ?>">
                                        <span data-toggle="collapse" data-parent="#menu-group-1" href="#cat-lvl2-id-<?php echo $i.$j; ?>" class="sign"><i class="fa "></i></span>
                                        <span class="lbl lbl1"><?php echo $row1['nom_souscat']; ?></span> 
                                    </a>
                                </li>
                                <?php
                            }
                            ?>

                        </ul>
                    </li>

                    <?php
                }
            ?>


        </ul>

    </div>









            </div>


            <div class="col-md-9">
                
                <h3></h3>
                <div class="product product-cat">

                    <div class="row">


                        <?php




                        if (isset($_REQUEST['id']) and isset($_REQUEST['idsous'])) {
                            $statement = $pdo->prepare("SELECT * FROM table_produit WHERE cat_id=? and id_souscat=? AND p_active=?");
                            $statement->execute(array($_REQUEST['id'],$_REQUEST['idsous'],1));
                            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

                        }else{


                             if(isset($_REQUEST['id'])) {
                     
                            $statement = $pdo->prepare("SELECT * FROM table_produit WHERE cat_id=? AND p_active=?");
                            $statement->execute(array($_REQUEST['id'],1));
                            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                            }else{

                        
                            $statement = $pdo->prepare("SELECT * FROM table_produit WHERE p_active=? ");
                            $statement->execute(array(1));
                            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                            }



                        }
                       





                        foreach ($result as $row) {
                            $i++;
                        ?>


        <div class="col-md-3">
          <div class="card shadow-sm" style="padding:5px; border-radius: 5px;" >
            <img src="assets/uploads/<?php echo $row['p_photo']; ?>" class="bd-placeholder-img card-img-top" width="100%" height="150" style="border-radius: 5px;">

            <div class="card-body">

              <p class="card-text" style=" margin-left: 5px;"><b><?php echo $row['p_nom']; ?></b></p>

              <div class="d-flex justify-content-between align-items-center" style="margin-bottom: 20px">
                <h5 class="text-muted" style="color: red;"><del><?php echo $row['p_prixanc']; ?> DA</del></h5>
                <h5 class="text-muted">prix : <?php echo $row['p_prix']; ?> DA</h5><br>
                <a  style="float: right; padding-bottom: 10px;color: orange;" href="produit.php?id=<?php echo $row['p_id']; ?>"><i class="fa fa-plus"></i> plus</a>
              </div>
            </div>
          </div>
        </div>





                       


                        <?php
                            }
                            ?>  



                            

                </div>

            </div>
        </div>
    </div>
</div>

<?php require_once('footer.php'); ?>