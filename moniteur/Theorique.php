<?php
                $resultat41 = mysqli_query($connexion, "SELECT typeformation, dateseance, idseance FROM moniteur, seance WHERE seance.CINMoniteur='$CINMoniteur' and dateseance='$ligne100[0]' and horaire='matin';");
                $ligne41 = mysqli_fetch_row($resultat41);
                $resultat42 = mysqli_query($connexion, "SELECT typeformation, dateseance, idseance FROM moniteur, seance WHERE seance.CINMoniteur='$CINMoniteur' and dateseance='$ligne100[0]' and horaire='soir';");
                $ligne42 = mysqli_fetch_row($resultat42);
            ?>
                    <tr align="center">
                        <td height="45px" style="vertical-align: middle;"><?php echo $ligne41[1]; ?></td>
                        <td height="45px"><?php echo $ligne41[0]; ?></td>
                        <td style="background: #6a6a6a"></td>
                        <td height="45px"><?php echo $ligne42[0]; ?></td>
                    </tr>