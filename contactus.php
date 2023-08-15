<?php
    include('sqlConnexion.php');

if(isset($_POST['submit']))
{
    $nom = $_POST['nom'];
    $adresse = $_POST['adresse'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $objet = $_POST['objet'];
    $message = $_POST['message'];
    $date = date('Y-m-d H:i:s');
    $query_run = mysqli_query($connexion, "INSERT INTO contactus (NOM, ADRESSE, EMAIL, MOBILE, OBJET, MESSAGE, DATE) VALUES ('$nom', '$adresse', '$email', '$mobile', '$objet', '$message', '$date')");
    header('Location: index.html');
}
?>