<?php require_once('header.php'); ?>



<?php
$message='';
if(isset($_POST['connexion'])) {


        include_once "fonctions/utilisateur.php";
        $message=connexionboutique();

        

}
?>



<div id="touchslider" class="carousel bs-slider fade control-round indicators-line" data-ride="carousel" data-pause="hover" data-interval="false" >

                <!-- slider-->
                <div class="carousel-inner" role="listbox" >
                        <div class="item active" style="background-image:url(assets/uploads/slider5.jpeg">
                            <div class="bs-slider-overlay"></div>
                            <div class="container">

                                <div class="row">

                                    <div class="slide-text slide_style_right">
                                        <h1 data-animation=""><a href="creeboutique.php"> cree votre boutique ici</a></h1>
                                        <p data-animation="animated fadeInDown">avec electshop vous pouvez créer une boutique en ligne </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                </div>
</div>

<div class="page-banner" >
    <div class="inner">
        <h1>connecter a votre boutique en ligne</h1>
    </div>
</div>

<div class="page" >
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="user-content">

                    
                    <form action="" method="post">
                                    
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">

                                <?php  echo $message; ?>

                                <div class="form-group">
                                    <label for="">email *</label>
                                    <input type="email" class="form-control" name="email">
                                </div>

                                <div class="form-group">
                                    <label for="">mot de passe *</label>
                                    <input type="password" class="form-control" name="motpass">
                                </div>
                                <div class="form-group">
                                    <p> si vous voulez ouvrire une boutique en ligne <a href="creeboutique.php"> cliqez ici </a></p>
                                </div>

                                <div class="form-group" style="float: right;">
                                    <label for=""></label>
                                    <input type="submit" class="btn btn-success" value="connexion" name="connexion">
                                </div>

                                
                            </div>
                        </div>                        
                    </form>
                </div>                
            </div>
        </div>
    </div>
</div>





























<?php require_once('footer.php'); ?>