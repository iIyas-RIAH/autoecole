            <?php
            if ($ligne441[1]=='matin') {
                $resultat41 = mysqli_query($connexion, "SELECT typeformation, nom, prenom, dateseance, idseance FROM moniteur, seance WHERE seance.CINMoniteur=moniteur.CINMoniteur and dateseance='$ligne100[0]' and class='$abc' and horaire='matin';");
                $ligne41 = mysqli_fetch_row($resultat41);
                $resultat42 = mysqli_query($connexion, "SELECT typeformation, nom, prenom, dateseance, marque, type, idseance FROM vehicule, moniteur, seance WHERE seance.matricule=vehicule.matricule AND seance.CINMoniteur=moniteur.CINMoniteur and dateseance='$ligne100[0]' and class='$abc' and horaire='soir';");
                $ligne42 = mysqli_fetch_row($resultat42);
            ?>
                    <tr align="center">
                        <td height="45px" style="vertical-align: middle;"><?php echo $ligne41[3]; ?></td>
                        <td height="45px" style="vertical-align: middle;"><?php echo $ligne41[1]." ".$ligne41[2]."<br>".$ligne41[0]; ?></td>
                        <td style="background: #6a6a6a"></td>
                        <td height="45px"><?php echo $ligne42[1]." ".$ligne42[2]."<br>".$ligne42[0]."<br>".$ligne42[4]." ".$ligne42[5]; ?></td>
                    </tr>
            <?php
                }else{
            	$resultat41 = mysqli_query($connexion, "SELECT typeformation, nom, prenom, dateseance, idseance FROM moniteur, seance WHERE seance.CINMoniteur=moniteur.CINMoniteur and dateseance='$ligne100[0]' and class='$abc' and horaire='matin';");
                $ligne41 = mysqli_fetch_row($resultat41);
                $resultat42 = mysqli_query($connexion, "SELECT typeformation, nom, prenom, dateseance, marque, type, idseance FROM vehicule, moniteur, seance WHERE seance.matricule=vehicule.matricule AND seance.CINMoniteur=moniteur.CINMoniteur and dateseance='$ligne100[0]' and class='$abc' and horaire='soir';");
                $ligne42 = mysqli_fetch_row($resultat42);
            ?>
                    <tr align="center">
                        <td height="45px"><?php echo $ligne41[3]; ?></td>
                        <td height="45px"><?php echo $ligne42[1]." ".$ligne42[2]."<br>".$ligne42[0]."<br>".$ligne42[4]." ".$ligne42[5]; ?></td>
                        <td style="background: #6a6a6a"></td>
                        <td height="45px" style="vertical-align: middle;"><?php echo $ligne41[1]." ".$ligne41[2]."<br>".$ligne41[0]; ?></td>
                    </tr>
            <?php } ?>