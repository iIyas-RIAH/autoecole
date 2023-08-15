<?php
    include('../sqlConnexion.php');
    $idexamen = $_GET['supprimer_idexamen'];
    $query_run = mysqli_query($connexion, "DELETE FROM avoir WHERE idexamen='$idexamen'");
    $query_run1 = mysqli_query($connexion, "DELETE FROM Examen WHERE idexamen='$idexamen'");
    header('Location: listExam.php');
    mysqli_close($connexion);
?>
