<?php require_once('header.php'); ?>

<?php 
$error_message='';
$success_message='';
?>







<div class="page-banner">
    <div class="inner">
        <h1>contact</h1>
    </div>
</div>



<div class="page">
    <div class="container">
        <div class="row">      


            <div class="col-md-12">
                <div class="row cform">



                    <div class="col-md-4">


                         <h3>map</h3>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!5e0!3m2!1sen!2snp!4v1647796779407!5m2!1sen!2snp" width="400" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>


                        <legend><span class="glyphicon glyphicon-globe"></span> </legend>
                        <address>
                            BEJAIA 06000 ALGERIE
                        </address>
                        <address>
                            <strong>Telephon :</strong><br>
                            <span>078990777</span>
                        </address>
                        <address>
                            <strong>Email:</strong><br>
                            <a href="mailto:electshop@gmail.com"><span>electshop@gmail.com</span></a>
                        </address>
                    </div>





                    <div class="col-md-8">
                        <div class="well "style="box-shadow: 1px 1px 1px rgba(0,0,0,.2); background-color: white;">
                            





                                                            <?php
                                if(isset($_POST['envoyer']))
                                {


                                    $error_message = '';
                                    $success_message = '';


                                    $valid = 1;


                                    if(empty($_POST['nom']))
                                    {
                                        $valid = 0;
                                        $error_message .= 'ajouter un nom svp !\n';
                                    }


                                
                                    if(empty($_POST['email']))
                                    {
                                        $valid = 0;
                                        $error_message .= 'ajouter un adresse email svp!\n';
                                    }
                                    else
                                    {
                                        // 
                                        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
                                        {
                                            $valid = 0;
                                            $error_message .= 'erreur dans votre email\n';
                                        }
                                    }


                                    if(empty($_POST['msg']))
                                    {
                                        $valid = 0;
                                        $error_message .= 'ajouter un message svp\n';
                                    }


                                    if($valid == 1)
                                    {
                                        


                                        $nom = strip_tags($_POST['nom']);
                                        $email = strip_tags($_POST['email']);
                                        $objet = strip_tags($_POST['objet']);
                                        $msg = strip_tags($_POST['msg']);

                                        $to_admin = 'electshop@gmail.com';
                                        


                                        $message = '
                                <html><body>
                                <table>
                                <tr>
                                <td>Name</td>
                                <td>'.$nom.'</td>
                                </tr>
                                <tr>
                                <td>Email</td>
                                <td>'.$email.'</td>
                                </tr>
                                <tr>
                                <td>Phone</td>
                                <td>'.$objet.'</td>
                                </tr>
                                <tr>
                                <td>Comment</td>
                                <td>'.nl2br($msg).'</td>
                                </tr>
                                </table>
                                </body></html>
                                ';


                                        $headers = 'From: ' . $email . "\r\n" .
                                                   'Reply-To: ' . $email . "\r\n" .
                                                   'X-Mailer: PHP/' . phpversion() . "\r\n" . 
                                                   "MIME-Version: 1.0\r\n" . 
                                                   "Content-Type: text/html; charset=ISO-8859-1\r\n";


                                                         
                                        mail($to_admin, $objet, $message, $headers); 
                                        
                                        $success_message = 'votre mesage est envoyer avec succes';

                                    }
                                }
                                ?>
                
                <?php
                if($error_message != '') {
                    echo "<script>alert('".$error_message."')</script>";
                }
                if($success_message != '') {
                    echo "<script>alert('".$success_message."')</script>";
                }
                ?>


                            <form action="" method="post">
                           
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">nom</label>
                                        <input type="text" class="form-control" name="nom" placeholder="votre nom">
                                    </div>

                                    <div class="form-group">
                                        <label for="email">adresse</label>
                                        <input type="email" class="form-control" name="email" placeholder="votre email">
                                    </div>
                                    <div class="form-group">
                                        <label for="objet">objet</label>
                                        <input type="text" class="form-control" name="objet" placeholder="objet">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Message</label>
                                        <textarea name="msg" class="form-control" rows="9" cols="25" placeholder="votre message"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <input type="submit" value="envoyer" class="btn  pull-right" name="envoyer" style="background-color: green; color: white;">
                                </div>

                            </div>
                            </form>



                        </div>
                    </div>











                </div>



               
                




            </div>
        </div>
    </div>
</div>

<?php require_once('footer.php'); ?>