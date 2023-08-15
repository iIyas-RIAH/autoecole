<?php
    include('../sqlConnexion.php');
    $CINMoniteur = $_GET['supprimer_CINMoniteur'];
    $query_run = mysqli_query($connexion, "DELETE FROM Moniteur WHERE CINMoniteur='$CINMoniteur'");
    header('Location: listMon.php');
    mysqli_close($connexion);
?>
