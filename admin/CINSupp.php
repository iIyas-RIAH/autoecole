<?php
    include('../sqlConnexion.php');
    $id = $_GET['supprimer_codeae'];
    $query_run = mysqli_query($connexion, "DELETE FROM codeae WHERE id='$id'");
    header('Location: Profil.php');
    mysqli_close($connexion);
?>
