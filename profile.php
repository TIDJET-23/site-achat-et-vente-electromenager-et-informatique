<?php require_once('header.php'); ?>

<?php
// Check if the customer is logged in or not
if(!isset($_SESSION['client'])) {
     header("location: deconnecter.php");
    exit;
}
    
    
    include_once "fonctions/vente.php";
    $result=afficheachat();

    include_once "fonctions/rec_pays.php";
    $resultpays=affiche_pays();
    $message='';




 /*modifie profile*/
if (isset($_POST['modifie'])) {
include_once "fonctions/utilisateur.php";
$message=modifieprofil();
}



$complete='';
$complete=verifievidechamp();
echo $complete;

?>





<div style="margin-left: 50px; margin-right: 50px;">
                <!--mes achates -->
                


                <section class="content" >

                  <div class="row">

                    <div class="col-md-4">
                                <div class="user-content">




                                    <h3>
                                       modfie profile <a href="modifie_mp.php"><button class="btn ">modifie mot de passe</button></a>
                                    </h3>


                                     <?php  echo $message; ?>


                                    <form action="" method="post">
                                        
                                        
                                            <div class=" form-group">
                                                <label for="">nom *</label>
                                                <input type="text" class="form-control" name="nom_c" value="<?php echo $_SESSION['client']['nom_c']; ?>">
                                            </div>

                                            <div class=" form-group">
                                                <label for="">prenom *</label>
                                                <input type="text" class="form-control" name="prenom_c" value="<?php echo $_SESSION['client']['prenom_c']; ?>">
                                            </div>

                                            <div class=" form-group">
                                                <label for="">email *</label>
                                                <input type="text" class="form-control" name="" value="<?php echo $_SESSION['client']['email_c']; ?>" disabled>
                                            </div>
                                            <div class=" form-group">
                                                <label for="">telephone *</label>
                                                <input type="text" class="form-control" name="tel_c" value="<?php echo $_SESSION['client']['tel_c']; ?>">
                                            </div>

                                            <div class=" form-group">
                                                <label for="">village / rue,Numero rue *</label>
                                                <textarea name="add_c" class="form-control" cols="30" rows="10" style="height:70px;"><?php echo $_SESSION['client']['add_c']; ?></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="">pays *</label>
                                                <select name="id_pays" class="form-control " disabled>
                                                <?php
                                                foreach ($resultpays as $row) {
                                                    ?>

                                                    <option value="<?php echo $row['country_id']; ?>" <?php if($row['country_id'] == $_SESSION['client']['id_pays']) {echo 'selected';} ?>><?php echo $row['country_name']; ?></option>

                                                    <?php
                                                }
                                                ?>
                                                </select>                                    
                                            </div>
                                            
                                            <div class=" form-group">
                                                <label for="">willaya *</label>
                                                <input type="text" class="form-control" name="willaya_c" value="<?php echo $_SESSION['client']['willaya_c']; ?>">
                                            </div>


                                            <div class=" form-group">
                                                <label for="">ville *</label>
                                                <input type="text" class="form-control" name="ville_c" value="<?php echo $_SESSION['client']['ville_c']; ?>">
                                            </div>


                                            <div class=" form-group">
                                                <label for="">code postal *</label>
                                                <input type="text" class="form-control" name="code_postal_c" value="<?php echo $_SESSION['client']['code_postal_c']; ?>">
                                            </div>
                                        
                                        <input type="submit" class="btn btn-primary" value="modifie" name="modifie">
                                    </form>
                                </div>                
                            </div>







<!-- ////////////////////////// -->
                    <div class="col-md-7">

                        <section class="content-header">
                    <div class="content-header-left">
                        <h1>mes achats</h1>
                    </div>
                </section>


                      <div class="box box-info">
                        
                        <div class="box-body table-responsive">
                          <table id="example1" class="table table-bordered table-hover table-striped">
                            <thead>

                                <tr>
                                    <th>#</th>
                                    <th>produit</th>
                                    <th>quantite</th>
                                    <th>total</th>
                                    <th>date</th> 
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                        
                                $i=0;
                                foreach ($result as $row) {
                                    $i++;
                                    ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td>
                                           <?php
                                           $statement1 = $pdo->prepare("SELECT * FROM table_produit WHERE p_id=?");
                                           $statement1->execute(array($row['id_produit']));
                                           $result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
                                           foreach ($result1 as $row1) {
                                                echo '<b>produit:</b> '.$row1['p_nom'].' <br>';                    
                                                echo '<b>prix:</b> '.$row1['p_prix'].' DA <br>';
                                                echo '<br><br>';
                                           }
                                           ?>

                                        </td>


                                        <td><?php echo $row['quantite']; ?></td>

                                        <td><?php echo $row1['p_prix']*$row['quantite'].' DA'; ?></td>

                                        <td><?php echo $row['date_vente']; ?></td>


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

                
                <!--modifie profile -->
                <div class="page">
                    <div class="container">
                        <div class="row">            
                              
                        </div>
                    </div>
                </div>







</div>





