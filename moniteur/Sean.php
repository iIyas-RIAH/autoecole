<?php 
    include('../sqlConnexion.php');
            ?>

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="margin-top: 10px;">
                  <tr align="center">
                        <th width="200px"></th>
                        <th width="400px">9h-12h</th>
                        <th width="120px" style="background: #6a6a6a"></th>
                        <th width="400px">14h30-17h30</th>
                    </tr>
            
            <?php 
                  $CINMoniteur = $_SESSION['CINMoniteur'];
                  $resultat11 = mysqli_query($connexion, "SELECT typeformation, horaire, count(*) FROM seance WHERE dateseance='lundi' and CINMoniteur='$CINMoniteur' order by horaire;");
                  while ($ligne11 = mysqli_fetch_row($resultat11)) {
                    if ($ligne11[2]==0) {
            ?>
                    <tr align="center">
                        <td height="45px">Lundi</td>
                        <td height="45px"></td>
                        <td style="background: #6a6a6a"></td>
                        <td height="45px"></td>
                    </tr>
            <?php
                }elseif ($ligne11[2]==2) {
                     $resultat221 = mysqli_query($connexion, "SELECT typeformation, horaire, count(*) FROM seance WHERE dateseance='lundi' and CINMoniteur='$CINMoniteur' and typeformation='Théorique';");
                     $ligne221 = mysqli_fetch_row($resultat221);
                     $resultat222 = mysqli_query($connexion, "SELECT typeformation, horaire, count(*) FROM seance WHERE dateseance='lundi' and CINMoniteur='$CINMoniteur' and typeformation='Pratique';");
                     $ligne222 = mysqli_fetch_row($resultat222);
                     $resultat100 = mysqli_query($connexion, "SELECT dateseance FROM seance WHERE dateseance='lundi';");
                     $ligne100 = mysqli_fetch_row($resultat100);
                    if ($ligne221[2]=='1' && $ligne222[2]=='1') {
                        include('PraThe.php');
                    }elseif ($ligne221[2]=='2') {
                        include ('Theorique.php');
                    }elseif ($ligne222[2]=='2') {
                        include ('Pratique.php');
                    }

                 }else{
              if ($ligne11[0]=='Pratique') {
                if ($ligne11[1]=='matin') {
                $resultat12 = mysqli_query($connexion, "SELECT typeformation, marque, type, dateseance FROM vehicule, seance WHERE seance.matricule=vehicule.matricule AND seance.CINMoniteur='$CINMoniteur' and dateseance='lundi' and horaire='matin';");
                $ligne12 = mysqli_fetch_row($resultat12);
            ?>
                    <tr align="center">
                        <td height="45px"><?php echo $ligne12[3]; ?></td>
                        <td height="45px"><?php echo $ligne12[1]." ".$ligne12[2]."<br>".$ligne12[0]; ?></td>
                        <td style="background: #6a6a6a"></td>
                        <td height="45px"></td>
                    </tr>
            <?php
                }else{
                  $resultat13 = mysqli_query($connexion, "SELECT typeformation, marque, type, dateseance FROM vehicule, seance WHERE seance.CINMoniteur='$CINMoniteur' and dateseance='lundi' and horaire='soir';");
                $ligne13 = mysqli_fetch_row($resultat13);
            ?>
                    <tr align="center">
                        <td height="45px"><?php echo $ligne13[3]; ?></td>
                        <td height="45px"></td>
                        <td style="background: #6a6a6a"></td>
                        <td height="45px"><?php echo $ligne13[1]." ".$ligne13[2]."<br>".$ligne13[0]; ?></td>
                    </tr>
            <?php
              }}else{
                if ($ligne11[1]=='matin') {
                $resultat14 = mysqli_query($connexion, "SELECT typeformation, dateseance FROM seance WHERE seance.CINMoniteur='$CINMoniteur' and dateseance='lundi' and horaire='matin';");
                $ligne14 = mysqli_fetch_row($resultat14);
            ?>
                    <tr align="center">
                        <td height="45px"><?php echo $ligne14[1]; ?></td>
                        <td height="45px"><?php echo $ligne14[0]; ?></td>
                        <td style="background: #6a6a6a"></td>
                        <td height="45px"></td>
                    </tr>
            <?php
                }else{
                  $resultat15 = mysqli_query($connexion, "SELECT typeformation, dateseance FROM seance WHERE seance.CINMoniteur='$CINMoniteur' and dateseance='lundi' and horaire='soir';");
                $ligne15 = mysqli_fetch_row($resultat15);
            ?>
                    <tr align="center">
                        <td height="45px"><?php echo $ligne15[1]; ?></td>
                        <td height="45px"></td>
                        <td style="background: #6a6a6a"></td>
                        <td height="45px"><?php echo $ligne15[0]; ?></td>
                    </tr>
            
            <?php
              }}}}
              $resultat22 = mysqli_query($connexion, "SELECT typeformation, horaire, count(*), dateseance FROM seance WHERE dateseance='mardi' and CINMoniteur='$CINMoniteur' order by horaire;");
              while ($ligne22 = mysqli_fetch_row($resultat22)) {
                if ($ligne22[2]==0) {
            ?>
                    <tr align="center">
                        <td height="45px">Mardi</td>
                        <td height="45px"></td>
                        <td style="background: #6a6a6a"></td>
                        <td height="45px"></td>
                    </tr>
            <?php
                }elseif ($ligne22[2]==2) {
                     $resultat221 = mysqli_query($connexion, "SELECT typeformation, horaire, count(*) FROM seance WHERE dateseance='mardi' and CINMoniteur='$CINMoniteur' and typeformation='Théorique';");
                     $ligne221 = mysqli_fetch_row($resultat221);
                     $resultat222 = mysqli_query($connexion, "SELECT typeformation, horaire, count(*) FROM seance WHERE dateseance='mardi' and CINMoniteur='$CINMoniteur' and typeformation='Pratique';");
                     $ligne222 = mysqli_fetch_row($resultat222);
                     $resultat100 = mysqli_query($connexion, "SELECT dateseance FROM seance WHERE dateseance='mardi';");
                     $ligne100 = mysqli_fetch_row($resultat100);
                    if ($ligne221[2]=='1' && $ligne222[2]=='1') {
                        include('PraThe.php');
                    }elseif ($ligne221[2]=='2') {
                        include ('Theorique.php');
                    }elseif ($ligne222[2]=='2') {
                        include ('Pratique.php');
                    }

                 }else{
              if ($ligne22[0]=='Pratique') {
                if ($ligne22[1]=='matin') {
                  $resultat2 = mysqli_query($connexion, "SELECT typeformation, marque, type, dateseance FROM vehicule, seance WHERE seance.matricule=vehicule.matricule AND seance.CINMoniteur='$CINMoniteur' and dateseance='mardi' and horaire='matin';");
                $ligne2 = mysqli_fetch_row($resultat2);
            ?>
                    <tr align="center">
                        <td height="45px"><?php echo $ligne2[3]; ?></td>
                        <td height="45px"><?php echo $ligne2[1]." ".$ligne2[2]."<br>".$ligne2[0]; ?></td>
                        <td style="background: #6a6a6a"></td>
                        <td height="45px"></td>
                    </tr>
            <?php
                }else{
                $resultat2 = mysqli_query($connexion, "SELECT typeformation, marque, type, dateseance FROM vehicule, seance WHERE seance.matricule=vehicule.matricule AND seance.CINMoniteur='$CINMoniteur' and dateseance='mardi' and horaire='soir';");
                $ligne2 = mysqli_fetch_row($resultat2);
            ?>
                    <tr align="center">
                        <td height="45px"><?php echo $ligne2[3]; ?></td>
                        <td height="45px"></td>
                        <td style="background: #6a6a6a"></td>
                        <td height="45px"><?php echo $ligne2[1]." ".$ligne2[2]."<br>".$ligne2[0]; ?></td>
                    </tr>
            <?php 
              }}else{
                if ($ligne22[1]=='matin') {
                $resultat2 = mysqli_query($connexion, "SELECT typeformation, dateseance FROM seance WHERE seance.CINMoniteur='$CINMoniteur' and dateseance='mardi' and horaire='matin';");
                $ligne2 = mysqli_fetch_row($resultat2);
                ?>
                    <tr align="center">
                        <td height="45px"><?php echo $ligne2[1]; ?></td>
                        <td height="45px"><?php echo $ligne2[0]; ?></td>
                        <td style="background: #6a6a6a"></td>
                        <td height="45px"></td>
                    </tr>
            <?php
                }else{
                $resultat2 = mysqli_query($connexion, "SELECT typeformation, dateseance FROM seance WHERE seance.CINMoniteur='$CINMoniteur' and dateseance='mardi' and horaire='soir';");
                $ligne2 = mysqli_fetch_row($resultat2);
            ?>
                    <tr align="center">
                        <td height="45px"><?php echo $ligne2[1]; ?></td>
                        <td height="45px"></td>
                        <td style="background: #6a6a6a"></td>
                        <td height="45px"><?php echo $ligne2[0]; ?></td>
                    </tr>
            
            <?php 
              }}}}
                $resultat33 = mysqli_query($connexion, "SELECT typeformation, horaire, count(*) FROM seance WHERE dateseance='mercredi' and CINMoniteur='$CINMoniteur' order by horaire;");
              while ($ligne33 = mysqli_fetch_row($resultat33)) {
                if ($ligne33[2]==0) {
            ?>
                    <tr align="center">
                        <td height="45px">Mercredi</td>
                        <td height="45px"></td>
                        <td style="background: #6a6a6a"></td>
                        <td height="45px"></td>
                    </tr>
            <?php
                }elseif ($ligne33[2]==2) {
                     $resultat221 = mysqli_query($connexion, "SELECT typeformation, horaire, count(*) FROM seance WHERE dateseance='mercredi' and CINMoniteur='$CINMoniteur' and typeformation='Théorique';");
                     $ligne221 = mysqli_fetch_row($resultat221);
                     $resultat222 = mysqli_query($connexion, "SELECT typeformation, horaire, count(*) FROM seance WHERE dateseance='mercredi' and CINMoniteur='$CINMoniteur' and typeformation='Pratique';");
                     $ligne222 = mysqli_fetch_row($resultat222);
                     $resultat100 = mysqli_query($connexion, "SELECT dateseance FROM seance WHERE dateseance='mercredi';");
                     $ligne100 = mysqli_fetch_row($resultat100);
                    if ($ligne221[2]=='1' && $ligne222[2]=='1') {
                        include('PraThe.php');
                    }elseif ($ligne221[2]=='2') {
                        include ('Theorique.php');
                    }elseif ($ligne222[2]=='2') {
                        include ('Pratique.php');
                    }

                 }else{
              if ($ligne33[0]=='Pratique') {
                if ($ligne33[1]=='matin') {
                $resultat3 = mysqli_query($connexion, "SELECT typeformation, marque, type, dateseance FROM vehicule, seance WHERE seance.matricule=vehicule.matricule AND seance.CINMoniteur='$CINMoniteur' and dateseance='mercredi' and horaire='matin';");
                $ligne3 = mysqli_fetch_row($resultat3);
            ?>
                    <tr align="center">
                        <td height="45px"><?php echo $ligne3[3]; ?></td>
                        <td height="45px"><?php echo $ligne3[1]." ".$ligne3[2]."<br>".$ligne3[0]; ?></td>
                        <td style="background: #6a6a6a"></td>
                        <td height="45px"></td>
                    </tr>
            <?php
                }else{
                $resultat3 = mysqli_query($connexion, "SELECT typeformation, marque, type, dateseance FROM vehicule, seance WHERE seance.matricule=vehicule.matricule AND seance.CINMoniteur='$CINMoniteur' and dateseance='mercredi' and horaire='soir';");
                $ligne3 = mysqli_fetch_row($resultat3);
            ?>
                    <tr align="center">
                        <td height="45px"><?php echo $ligne3[3]; ?></td>
                        <td height="45px"></td>
                        <td style="background: #6a6a6a"></td>
                        <td height="45px"><?php echo $ligne3[1]." ".$ligne3[2]."<br>".$ligne3[0]; ?></td>
                    </tr>
            <?php
              }}else{
                if ($ligne33[1]=='matin') {
                $resultat3 = mysqli_query($connexion, "SELECT typeformation, dateseance FROM seance WHERE seance.CINMoniteur='$CINMoniteur' and dateseance='mercredi' and horaire='matin';");
                $ligne3 = mysqli_fetch_row($resultat3);
            ?>
                    <tr align="center">
                        <td height="45px"><?php echo $ligne3[1]; ?></td>
                        <td height="45px"><?php echo $ligne3[0]; ?></td>
                        <td style="background: #6a6a6a"></td>
                        <td height="45px"></td>
                    </tr>
            <?php
              }else{
                $resultat3 = mysqli_query($connexion, "SELECT typeformation, dateseance FROM seance WHERE seance.CINMoniteur='$CINMoniteur' and dateseance='mercredi' and horaire='soir';");
                $ligne3 = mysqli_fetch_row($resultat3);
            ?>
                    <tr align="center">
                        <td height="45px"><?php echo $ligne3[1]; ?></td>
                        <td height="45px"></td>
                        <td style="background: #6a6a6a"></td>
                        <td height="45px"><?php echo $ligne3[0]; ?></td>
                    </tr>

            <?php
              }}}}
                $resultat44 = mysqli_query($connexion, "SELECT typeformation, horaire, count(*) FROM seance WHERE dateseance='jeudi' and CINMoniteur='$CINMoniteur' order by horaire;");
              while ($ligne44 = mysqli_fetch_row($resultat44)) {
                if ($ligne44[2]==0) {
            ?>
                    <tr align="center">
                        <td height="45px">Jeudi</td>
                        <td height="45px"></td>
                        <td style="background: #6a6a6a"></td>
                        <td height="45px"></td>
                    </tr>
            <?php
                }elseif ($ligne44[2]==2) {
                     $resultat221 = mysqli_query($connexion, "SELECT typeformation, horaire, count(*) FROM seance WHERE dateseance='jeudi' and CINMoniteur='$CINMoniteur' and typeformation='Théorique';");
                     $ligne221 = mysqli_fetch_row($resultat221);
                     $resultat222 = mysqli_query($connexion, "SELECT typeformation, horaire, count(*) FROM seance WHERE dateseance='jeudi' and CINMoniteur='$CINMoniteur' and typeformation='Pratique';");
                     $ligne222 = mysqli_fetch_row($resultat222);
                     $resultat100 = mysqli_query($connexion, "SELECT dateseance FROM seance WHERE dateseance='jeudi';");
                     $ligne100 = mysqli_fetch_row($resultat100);
                    if ($ligne221[2]=='1' && $ligne222[2]=='1') {
                        include('PraThe.php');
                    }elseif ($ligne221[2]=='2') {
                        include ('Theorique.php');
                    }elseif ($ligne222[2]=='2') {
                        include ('Pratique.php');
                    }

                 }else{
              if ($ligne44[0]=='Pratique') {
                if ($ligne44[1]=='matin') {
                $resultat4 = mysqli_query($connexion, "SELECT typeformation, marque, type, dateseance FROM vehicule, seance WHERE seance.matricule=vehicule.matricule AND seance.CINMoniteur='$CINMoniteur' and dateseance='jeudi' and horaire='matin';");
                $ligne4 = mysqli_fetch_row($resultat4);
            ?>
                    <tr align="center">
                        <td height="45px"><?php echo $ligne4[3]; ?></td>
                        <td height="45px"><?php echo $ligne4[1]." ".$ligne4[2]."<br>".$ligne4[0]; ?></td>
                        <td style="background: #6a6a6a"></td>
                        <td height="45px"></td>
                    </tr>
            <?php
                }else{
            $resultat4 = mysqli_query($connexion, "SELECT typeformation, marque, type, dateseance FROM vehicule, seance WHERE seance.matricule=vehicule.matricule AND seance.CINMoniteur='$CINMoniteur' and dateseance='jeudi' and horaire='soir';");
                $ligne4 = mysqli_fetch_row($resultat4);
            ?>
                    <tr align="center">
                        <td height="45px"><?php echo $ligne4[3]; ?></td>
                        <td height="45px"></td>
                        <td style="background: #6a6a6a"></td>
                        <td height="45px"><?php echo $ligne4[1]." ".$ligne4[2]."<br>".$ligne4[0]; ?></td>
                    </tr>
            <?php
              }}else{
                if ($ligne44[1]=='matin') {
                $resultat4 = mysqli_query($connexion, "SELECT typeformation, dateseance FROM seance WHERE seance.CINMoniteur='$CINMoniteur' and dateseance='jeudi' and horaire='matin';");
                $ligne4 = mysqli_fetch_row($resultat4);
            ?>
                    <tr align="center">
                        <td height="45px"><?php echo $ligne4[1]; ?></td>
                        <td height="45px"><?php echo $ligne4[0]; ?></td>
                        <td style="background: #6a6a6a"></td>
                        <td height="45px"></td>
                    </tr>
            <?php
                }else{
                $resultat4 = mysqli_query($connexion, "SELECT typeformation, dateseance FROM seance WHERE seance.CINMoniteur='$CINMoniteur' and dateseance='jeudi' and horaire='soir';");
                $ligne4 = mysqli_fetch_row($resultat4);
            ?>
                    <tr align="center">
                        <td height="45px"><?php echo $ligne4[1]; ?></td>
                        <td height="45px"></td>
                        <td style="background: #6a6a6a"></td>
                        <td height="45px"><?php echo $ligne4[0]; ?></td>
                    </tr>
            
            <?php
              }}}}
                $resultat55 = mysqli_query($connexion, "SELECT typeformation, horaire, count(*) FROM seance WHERE dateseance='vendredi' and CINMoniteur='$CINMoniteur' order by horaire;");
              while ($ligne55 = mysqli_fetch_row($resultat55)) {
                if ($ligne55[2]==0) {
            ?>
                    <tr align="center">
                        <td height="45px">Vendredi</td>
                        <td height="45px"></td>
                        <td style="background: #6a6a6a"></td>
                        <td height="45px"></td>
                    </tr>
            <?php
                }elseif ($ligne55[2]==2) {
                     $resultat221 = mysqli_query($connexion, "SELECT typeformation, horaire, count(*) FROM seance WHERE dateseance='vendredi' and CINMoniteur='$CINMoniteur' and typeformation='Théorique';");
                     $ligne221 = mysqli_fetch_row($resultat221);
                     $resultat222 = mysqli_query($connexion, "SELECT typeformation, horaire, count(*) FROM seance WHERE dateseance='vendredi' and CINMoniteur='$CINMoniteur' and typeformation='Pratique';");
                     $ligne222 = mysqli_fetch_row($resultat222);
                     $resultat100 = mysqli_query($connexion, "SELECT dateseance FROM seance WHERE dateseance='vendredi';");
                     $ligne100 = mysqli_fetch_row($resultat100);
                    if ($ligne221[2]=='1' && $ligne222[2]=='1') {
                        include('PraThe.php');
                    }elseif ($ligne221[2]=='2') {
                        include ('Theorique.php');
                    }elseif ($ligne222[2]=='2') {
                        include ('Pratique.php');
                    }

                 }else{
              if ($ligne55[0]=='Pratique') {
                if ($ligne55[1]=='matin') {
                $resultat5 = mysqli_query($connexion, "SELECT typeformation, marque, type, dateseance FROM vehicule, seance WHERE seance.matricule=vehicule.matricule AND seance.CINMoniteur='$CINMoniteur' and dateseance='vendredi' and horaire='matin';");
                $ligne5 = mysqli_fetch_row($resultat5);
            ?>
                    <tr align="center">
                        <td height="45px"><?php echo $ligne5[3]; ?></td>
                        <td height="45px"><?php echo $ligne5[1]." ".$ligne5[2]."<br>".$ligne5[0]; ?></td>
                        <td style="background: #6a6a6a"></td>
                        <td height="45px"></td>
                    </tr>
            <?php 
                }else{
                $resultat5 = mysqli_query($connexion, "SELECT typeformation, marque, type, dateseance FROM vehicule, seance WHERE seance.matricule=vehicule.matricule AND seance.CINMoniteur='$CINMoniteur' and dateseance='vendredi' and horaire='soir';");
                $ligne5 = mysqli_fetch_row($resultat5);
            ?>
                    <tr align="center">
                        <td height="45px"><?php echo $ligne5[3]; ?></td>
                        <td height="45px"></td>
                        <td style="background: #6a6a6a"></td>
                        <td height="45px"><?php echo $ligne5[1]." ".$ligne5[2]."<br>".$ligne5[0]; ?></td>
                    </tr>
            <?php 
              }}else{
                if ($ligne55[1]=='matin') {
                $resultat5 = mysqli_query($connexion, "SELECT typeformation, dateseance FROM seance WHERE seance.CINMoniteur='$CINMoniteur' and dateseance='vendredi' and horaire='matin';");
                $ligne5 = mysqli_fetch_row($resultat5);
            ?>
                    <tr align="center">
                        <td height="45px"><?php echo $ligne5[1]; ?></td>
                        <td height="45px"><?php echo $ligne5[0]; ?></td>
                        <td style="background: #6a6a6a"></td>
                        <td height="45px"></td>
                    </tr>
            <?php
              }else{
            $resultat5 = mysqli_query($connexion, "SELECT typeformation, dateseance FROM seance WHERE seance.CINMoniteur='$CINMoniteur' and dateseance='vendredi' and horaire='soir';");
                $ligne5 = mysqli_fetch_row($resultat5);
            ?>
                    <tr align="center">
                        <td height="45px"><?php echo $ligne5[1]; ?></td>
                        <td height="45px"></td>
                        <td style="background: #6a6a6a"></td>
                        <td height="45px"><?php echo $ligne5[0]; ?></td>
                    </tr>
            <?php
              }}}}
            ?>
            
                </table>
            <?php
                mysqli_close($connexion);
            ?>