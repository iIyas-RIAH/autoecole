<?php
    include('../sqlConnexion.php');
    $CINCandidat = $_GET['supprimer_CINCandidat'];
    $query_run = mysqli_query($connexion, "DELETE FROM Candidat WHERE CINCandidat='$CINCandidat'");
    header('Location: listCand.php');
    mysqli_close($connexion);
?>
