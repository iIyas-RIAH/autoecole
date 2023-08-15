<?php
    include('../sqlConnexion.php');
    $id = $_GET['supprimer_idvehicule'];
    $query_run = mysqli_query($connexion, "DELETE FROM Vehicule WHERE idvehicule='$id'");
    header('Location: listVeh.php');
    mysqli_close($connexion);
?>
