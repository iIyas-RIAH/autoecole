<?php
    include('../sqlConnexion.php');
    $idseance = $_GET['supprimer_idseance'];
    $query_run1 = mysqli_query($connexion, "DELETE FROM etudier WHERE idseance='$idseance'");
    $query_run = mysqli_query($connexion, "DELETE FROM Seance WHERE idseance='$idseance'");
    header('Location: listSean.php');
    mysqli_close($connexion);
?>