<?php
    include('../sqlConnexion.php');
    $CIN = $_GET['supprimer_CIN'];
    $id = $_GET['supprimer_idexamen'];
    $query_run = mysqli_query($connexion, "DELETE FROM avoir WHERE CINCandidat='$CIN' and idexamen='$id'");
    header('Location: listExam.php');
    mysqli_close($connexion);
?>
