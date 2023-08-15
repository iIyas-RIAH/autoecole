<?php
include("../sqlConnexion.php");

if (isset($_POST['submit'])) {

  $nom = strtoupper($_POST['nom']);
  $prenom = $_POST['prenom'];
  $cin = $_POST['cin'];
  $dateN = $_POST['dateNaissance'];
  $email = $_POST["email"];
  $mobile = $_POST['mobile'];
  $password_1 = $_POST['passwd'];
  $password_2 = $_POST['passwd2'];

  if ($password_1 == $password_2) {
    $rows1 = mysqli_num_rows(mysqli_query($connexion, "SELECT * From codeAE WHERE CIN_AE='$cin'"));
    $rows2 = mysqli_num_rows(mysqli_query($connexion, "SELECT * From candidat WHERE EMAIL='$email'"));
      if ($rows1 == 1 && $rows2 == 0) {
              $query = "INSERT INTO CANDIDAT (CINCandidat,NOM,PRENOM,DateNaissance,EMAIL,TELEPHONE,CLASS,MOTDEPASSE) VALUES ('$cin', '$nom', '$prenom', '$dateN', '$email', '$mobile', 'En attente', '$password_1')";
              $result = mysqli_query($connexion, $query);
              session_start();
              $_SESSION['CINCandidat'] = $cin;
              header("Location: ../candidat/Profil.php");
      } else {
          echo "<br><span style=\"font-size:25px; font-weight:bold; color:red;\">Cet email est déjà utulisé | Ce CIN n'existe pas dans la base de données !</span>";
		  header("Refresh: 4; URL= inscription.html#inscr");
      }
  } else {
      echo "<br><span style=\"font-size:25px; font-weight:bold; color:red;\">les mots de passe ne sont pas identique</span>";
      header("refrech: inscription.html");
  }   
}
?>