<?php
    include('../sqlConnexion.php');
    session_start();
    if(!(isset($_SESSION['login'])))
    {
        header("Location: ../conn-inscri/confconn.php");
    }
    if(isset($_POST['submitMessage']))
    {
      $exp = $_SESSION['login'];
      $des = $_POST['Destinataire'];
      $date = date('Y-m-d H:i:s');
      $objet = $_POST['objet'];
      $message = $_POST['message'];
      $resultat=mysqli_query($connexion, "INSERT INTO message(EXPEDITEUR, Destinataire, DATE, objet, message) VALUES('$exp', '$des', '$date', '$objet', '$message')");
    if(!$resultat){
       echo "Error!!";
     } 
    else
       {
    echo "Votre message est envoyé";
    header("Refresh: 3; URL= Message.php");
       }
    }
?>