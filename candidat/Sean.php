<?php 
    include('../sqlConnexion.php');

                  $CINCandidat = $_SESSION['CINCandidat'];
                  $resultat1 = mysqli_query($connexion, "SELECT class FROM Candidat where CINCandidat='$CINCandidat'");
                  $ligne1 = mysqli_fetch_row($resultat1);
                  $abc=implode("", $ligne1);

            ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="margin-top: 10px;">
                  <tr align="center">
                        <th width="200px"></th>
                        <th width="400px">9h-12h</th>
                        <th width="120px" style="background: #6a6a6a"></th>
                        <th width="400px">14h30-17h30</th>
                    </tr>
            
            <?php 
                $resultat11 = mysqli_query($connexion, "SELECT typeformation, horaire, count(*) FROM seance WHERE dateseance='lundi' and class='$abc' order by horaire;");
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
                     $resultat111 = mysqli_query($connexion, "SELECT typeformation, horaire, count(*) FROM seance WHERE dateseance='lundi' and class='$abc' and typeformation='Théorique';");
                     $ligne111 = mysqli_fetch_row($resultat111);
                     $resultat112 = mysqli_query($connexion, "SELECT typeformation, horaire, count(*) FROM seance WHERE dateseance='lundi' and class='$abc' and typeformation='Pratique';");
                     $ligne112 = mysqli_fetch_row($resultat112);
                     $resultat100 = mysqli_query($connexion, "SELECT dateseance FROM seance WHERE dateseance='lundi';");
                     $ligne100 = mysqli_fetch_row($resultat100);
                    if ($ligne111[2]=='1' && $ligne112[2]=='1') {
                        include('PraThe.php');
                    }elseif ($ligne111[2]=='2') {
                        include ('Theorique.php');
                    }elseif ($ligne112[2]=='2') {
                        include ('Pratique.php');
                    }

                 }else{
              if ($ligne11[0]=='Pratique') {
                if ($ligne11[1]=='matin') {
                $resultat12 = mysqli_query($connexion, "SELECT typeformation, nom, prenom, dateseance FROM moniteur, seance WHERE seance.CINMoniteur=moniteur.CINMoniteur and dateseance='lundi' and class='$abc';");
                $ligne12 = mysqli_fetch_row($resultat12);
            ?>
                    <tr align="center">
                        <td height="45px" style="vertical-align: middle;"><?php echo $ligne12[3]; ?></td>
                        <td height="45px"><?php echo $ligne12[1]." ".$ligne12[2]."<br>".$ligne12[0]; ?></td>
                        <td style="background: #6a6a6a"></td>
                        <td height="45px"></td>
                    </tr>
            <?php
                }else{
                  $resultat13 = mysqli_query($connexion, "SELECT typeformation, nom, prenom, dateseance FROM moniteur, seance WHERE seance.CINMoniteur=moniteur.CINMoniteur and dateseance='lundi' and class='$abc' and horaire='soir';");
                $ligne13 = mysqli_fetch_row($resultat13);
            ?>
                    <tr align="center">
                        <td height="45px" style="vertical-align: middle;"><?php echo $ligne13[3]; ?></td>
                        <td height="45px"></td>
                        <td style="background: #6a6a6a"></td>
                        <td height="45px"><?php echo $ligne13[1]." ".$ligne13[2]."<br>".$ligne13[0]; ?></td>
                    </tr>
            <?php
              }}else{
                if ($ligne11[1]=='matin') {
                $resultat14 = mysqli_query($connexion, "SELECT typeformation, nom, prenom, dateseance FROM moniteur, seance WHERE seance.CINMoniteur=moniteur.CINMoniteur and dateseance='lundi' and class='$abc';");
                $ligne14 = mysqli_fetch_row($resultat14);
            ?>
                    <tr align="center">
                        <td height="45px" style="vertical-align: middle;"><?php echo $ligne14[3]; ?></td>
                        <td height="45px"><?php echo $ligne14[1]." ".$ligne14[2]."<br>".$ligne14[0]; ?></td>
                        <td style="background: #6a6a6a"></td>
                        <td height="45px"></td>
                    </tr>
            <?php
                }else{
                  $resultat15 = mysqli_query($connexion, "SELECT typeformation, nom, prenom, dateseance FROM moniteur, seance WHERE seance.CINMoniteur=moniteur.CINMoniteur and dateseance='lundi' and class='$abc' and horaire='soir';");
                $ligne15 = mysqli_fetch_row($resultat15);
            ?>
                    <tr align="center">
                        <td height="45px" style="vertical-align: middle;"><?php echo $ligne15[3]; ?></td>
                        <td height="45px"></td>
                        <td style="background: #6a6a6a"></td>
                        <td height="45px"><?php echo $ligne15[1]." ".$ligne15[2]."<br>".$ligne15[0]; ?></td>
                    </tr>
            
            <?php
              }}}}
              $resultat22 = mysqli_query($connexion, "SELECT typeformation, horaire, count(*) FROM seance WHERE dateseance='mardi' and class='$abc';");
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
                     $resultat221 = mysqli_query($connexion, "SELECT typeformation, horaire, count(*) FROM seance WHERE dateseance='mardi' and class='$abc' and typeformation='Théorique';");
                     $ligne221 = mysqli_fetch_row($resultat221);
                     $resultat222 = mysqli_query($connexion, "SELECT typeformation, horaire, count(*) FROM seance WHERE dateseance='mardi' and class='$abc' and typeformation='Pratique';");
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
                  $resultat2 = mysqli_query($connexion, "SELECT typeformation, nom, prenom, dateseance FROM moniteur, seance WHERE seance.CINMoniteur=moniteur.CINMoniteur and dateseance='mardi' and class='$abc';");
                $ligne2 = mysqli_fetch_row($resultat2);
            ?>
                    <tr align="center">
                        <td height="45px" style="vertical-align: middle;"><?php echo $ligne2[3]; ?></td>
                        <td height="45px"><?php echo $ligne2[1]." ".$ligne2[2]."<br>".$ligne2[0]; ?></td>
                        <td style="background: #6a6a6a"></td>
                        <td height="45px"></td>
                    </tr>
            <?php
                }else{
                $resultat2 = mysqli_query($connexion, "SELECT typeformation, nom, prenom, dateseance FROM moniteur, seance WHERE seance.CINMoniteur=moniteur.CINMoniteur and dateseance='mardi' and class='$abc' and horaire='soir';");
                $ligne2 = mysqli_fetch_row($resultat2);
            ?>
                    <tr align="center">
                        <td height="45px" style="vertical-align: middle;"><?php echo $ligne2[3]; ?></td>
                        <td height="45px"></td>
                        <td style="background: #6a6a6a"></td>
                        <td height="45px"><?php echo $ligne2[1]." ".$ligne2[2]."<br>".$ligne2[0]; ?></td>
                    </tr>
            <?php 
              }}else{
                if ($ligne22[1]=='matin') {
                $resultat2 = mysqli_query($connexion, "SELECT typeformation, nom, prenom, dateseance FROM moniteur, seance WHERE seance.CINMoniteur=moniteur.CINMoniteur and dateseance='mardi' and class='$abc';");
                $ligne2 = mysqli_fetch_row($resultat2);
                ?>
                    <tr align="center">
                        <td height="45px" style="vertical-align: middle;"><?php echo $ligne2[3]; ?></td>
                        <td height="45px"><?php echo $ligne2[1]." ".$ligne2[2]."<br>".$ligne2[0]; ?></td>
                        <td style="background: #6a6a6a"></td>
                        <td height="45px"></td>
                    </tr>
            <?php
                }else{
                $resultat2 = mysqli_query($connexion, "SELECT typeformation, nom, prenom, dateseance FROM moniteur, seance WHERE seance.CINMoniteur=moniteur.CINMoniteur and dateseance='mardi' and class='$abc' and horaire='soir';");
                $ligne2 = mysqli_fetch_row($resultat2);
            ?>
                    <tr align="center">
                        <td height="45px" style="vertical-align: middle;"><?php echo $ligne2[3]; ?></td>
                        <td height="45px"></td>
                        <td style="background: #6a6a6a"></td>
                        <td height="45px"><?php echo $ligne2[1]." ".$ligne2[2]."<br>".$ligne2[0]; ?></td>
                    </tr>
            
            <?php 
              }}}}
                $resultat33 = mysqli_query($connexion, "SELECT typeformation, horaire, count(*) FROM seance WHERE dateseance='mercredi' and class='$abc';");
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
                     $resultat331 = mysqli_query($connexion, "SELECT typeformation, horaire, count(*) FROM seance WHERE dateseance='mercredi' and class='$abc' and typeformation='Théorique';");
                     $ligne331 = mysqli_fetch_row($resultat331);
                     $resultat332 = mysqli_query($connexion, "SELECT typeformation, horaire, count(*) FROM seance WHERE dateseance='mercredi' and class='$abc' and typeformation='Pratique';");
                     $ligne332 = mysqli_fetch_row($resultat332);
                     $resultat100 = mysqli_query($connexion, "SELECT dateseance FROM seance WHERE dateseance='mercredi';");
                     $ligne100 = mysqli_fetch_row($resultat100);
                    if ($ligne331[2]=='1' && $ligne332[2]=='1') {
                        include('PraThe.php');
                    }elseif ($ligne331[2]=='2') {
                        include ('Theorique.php');
                    }elseif ($ligne332[2]=='2') {
                        include ('Pratique.php');
                    }

                 }else{
              if ($ligne33[0]=='Pratique') {
                if ($ligne33[1]=='matin') {
                $resultat3 = mysqli_query($connexion, "SELECT typeformation, nom, prenom, dateseance FROM moniteur, seance WHERE seance.CINMoniteur=moniteur.CINMoniteur and dateseance='mercredi' and class='$abc';");
                $ligne3 = mysqli_fetch_row($resultat3);
            ?>
                    <tr align="center">
                        <td height="45px" style="vertical-align: middle;"><?php echo $ligne3[3]; ?></td>
                        <td height="45px"><?php echo $ligne3[1]." ".$ligne3[2]."<br>".$ligne3[0]; ?></td>
                        <td style="background: #6a6a6a"></td>
                        <td height="45px"></td>
                    </tr>
            <?php
                }else{
                $resultat3 = mysqli_query($connexion, "SELECT typeformation, nom, prenom, dateseance FROM moniteur, seance WHERE seance.CINMoniteur=moniteur.CINMoniteur and dateseance='mercredi' and class='$abc' and horaire='soir';");
                $ligne3 = mysqli_fetch_row($resultat3);
            ?>
                    <tr align="center">
                        <td height="45px" style="vertical-align: middle;"><?php echo $ligne3[3]; ?></td>
                        <td height="45px"></td>
                        <td style="background: #6a6a6a"></td>
                        <td height="45px"><?php echo $ligne3[1]." ".$ligne3[2]."<br>".$ligne3[0]; ?></td>
                    </tr>
            <?php
              }}else{
                if ($ligne33[1]=='matin') {
                $resultat3 = mysqli_query($connexion, "SELECT typeformation, nom, prenom, dateseance FROM moniteur, seance WHERE seance.CINMoniteur=moniteur.CINMoniteur and dateseance='mercredi' and class='$abc';");
                $ligne3 = mysqli_fetch_row($resultat3);
            ?>
                    <tr align="center">
                        <td height="45px" style="vertical-align: middle;"><?php echo $ligne3[3]; ?></td>
                        <td height="45px"><?php echo $ligne3[1]." ".$ligne3[2]."<br>".$ligne3[0]; ?></td>
                        <td style="background: #6a6a6a"></td>
                        <td height="45px"></td>
                    </tr>
            <?php
              }else{
                $resultat3 = mysqli_query($connexion, "SELECT typeformation, nom, prenom, dateseance FROM moniteur, seance WHERE seance.CINMoniteur=moniteur.CINMoniteur and dateseance='mercredi' and class='$abc' and horaire='soir';");
                $ligne3 = mysqli_fetch_row($resultat3);
            ?>
                    <tr align="center">
                        <td height="45px" style="vertical-align: middle;"><?php echo $ligne3[3]; ?></td>
                        <td height="45px"></td>
                        <td style="background: #6a6a6a"></td>
                        <td height="45px"><?php echo $ligne3[1]." ".$ligne3[2]."<br>".$ligne3[0]; ?></td>
                    </tr>

            <?php
              }}}}
                $resultat44 = mysqli_query($connexion, "SELECT typeformation, horaire, count(*) FROM seance WHERE dateseance='jeudi' and class='$abc';");
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
                     $resultat441 = mysqli_query($connexion, "SELECT typeformation, horaire, count(*) FROM seance WHERE dateseance='jeudi' and class='$abc' and typeformation='Théorique';");
                     $ligne441 = mysqli_fetch_row($resultat441);
                     $resultat442 = mysqli_query($connexion, "SELECT typeformation, horaire, count(*) FROM seance WHERE dateseance='jeudi' and class='$abc' and typeformation='Pratique';");
                     $ligne442 = mysqli_fetch_row($resultat442);
                     $resultat100 = mysqli_query($connexion, "SELECT dateseance FROM seance WHERE dateseance='jeudi';");
                     $ligne100 = mysqli_fetch_row($resultat100);
                    if ($ligne441[2]=='1' && $ligne442[2]=='1') {
                        include('PraThe.php');
                    }elseif ($ligne441[2]=='2') {
                        include ('Theorique.php');
                    }elseif ($ligne442[2]=='2') {
                        include ('Pratique.php');
                    }

                 }else{
              if ($ligne44[0]=='Pratique') {
                if ($ligne44[1]=='matin') {
                $resultat4 = mysqli_query($connexion, "SELECT typeformation, nom, prenom, dateseance FROM moniteur, seance WHERE seance.CINMoniteur=moniteur.CINMoniteur and dateseance='jeudi' and class='$abc';");
                $ligne4 = mysqli_fetch_row($resultat4);
            ?>
                    <tr align="center">
                        <td height="45px" style="vertical-align: middle;"><?php echo $ligne4[3]; ?></td>
                        <td height="45px"><?php echo $ligne4[1]." ".$ligne4[2]."<br>".$ligne4[0]; ?></td>
                        <td style="background: #6a6a6a"></td>
                        <td height="45px"></td>
                    </tr>
            <?php
                }else{
            $resultat4 = mysqli_query($connexion, "SELECT typeformation, nom, prenom, dateseance FROM moniteur, seance WHERE seance.CINMoniteur=moniteur.CINMoniteur and dateseance='jeudi' and class='$abc' and horaire='soir';");
                $ligne4 = mysqli_fetch_row($resultat4);
            ?>
                    <tr align="center">
                        <td height="45px" style="vertical-align: middle;"><?php echo $ligne4[3]; ?></td>
                        <td height="45px"></td>
                        <td style="background: #6a6a6a"></td>
                        <td height="45px"><?php echo $ligne4[1]." ".$ligne4[2]."<br>".$ligne4[0]; ?></td>
                    </tr>
            <?php
              }}else{
                if ($ligne44[1]=='matin') {
                $resultat4 = mysqli_query($connexion, "SELECT typeformation, nom, prenom, dateseance FROM moniteur, seance WHERE seance.CINMoniteur=moniteur.CINMoniteur and dateseance='jeudi' and class='$abc';");
                $ligne4 = mysqli_fetch_row($resultat4);
            ?>
                    <tr align="center">
                        <td height="45px" style="vertical-align: middle;"><?php echo $ligne4[3]; ?></td>
                        <td height="45px"><?php echo $ligne4[1]." ".$ligne4[2]."<br>".$ligne4[0]; ?></td>
                        <td style="background: #6a6a6a"></td>
                        <td height="45px"></td>
                    </tr>
            <?php
                }else{
                $resultat4 = mysqli_query($connexion, "SELECT typeformation, nom, prenom, dateseance FROM moniteur, seance WHERE seance.CINMoniteur=moniteur.CINMoniteur and dateseance='jeudi' and class='$abc' and horaire='soir';");
                $ligne4 = mysqli_fetch_row($resultat4);
            ?>
                    <tr align="center">
                        <td height="45px" style="vertical-align: middle;"><?php echo $ligne4[3]; ?></td>
                        <td height="45px"></td>
                        <td style="background: #6a6a6a"></td>
                        <td height="45px"><?php echo $ligne4[1]." ".$ligne4[2]."<br>".$ligne4[0]; ?></td>
                    </tr>
            
            <?php
              }}}}
                $resultat55 = mysqli_query($connexion, "SELECT typeformation, horaire, count(*) FROM seance WHERE dateseance='vendredi' and class='$abc';");
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
                     $resultat551 = mysqli_query($connexion, "SELECT typeformation, horaire, count(*) FROM seance WHERE dateseance='vendredi' and class='$abc' and typeformation='Théorique';");
                     $ligne551 = mysqli_fetch_row($resultat551);
                     $resultat552 = mysqli_query($connexion, "SELECT typeformation, horaire, count(*) FROM seance WHERE dateseance='vendredi' and class='$abc' and typeformation='Pratique';");
                     $ligne552 = mysqli_fetch_row($resultat552);
                     $resultat100 = mysqli_query($connexion, "SELECT dateseance FROM seance WHERE dateseance='vendredi';");
                     $ligne100 = mysqli_fetch_row($resultat100);
                    if ($ligne551[2]=='1' && $ligne552[2]=='1') {
                        include('PraThe.php');
                    }elseif ($ligne551[2]=='2') {
                        include ('Theorique.php');
                    }elseif ($ligne552[2]=='2') {
                        include ('Pratique.php');
                    }

                 }else{
              if ($ligne55[0]=='Pratique') {
                if ($ligne55[1]=='matin') {
                $resultat5 = mysqli_query($connexion, "SELECT typeformation, nom, prenom, dateseance FROM moniteur, seance WHERE seance.CINMoniteur=moniteur.CINMoniteur and dateseance='vendredi' and class='$abc';");
                $ligne5 = mysqli_fetch_row($resultat5);
            ?>
                    <tr align="center">
                        <td height="45px" style="vertical-align: middle;"><?php echo $ligne5[3]; ?></td>
                        <td height="45px"><?php echo $ligne5[1]." ".$ligne5[2]."<br>".$ligne5[0]; ?></td>
                        <td style="background: #6a6a6a"></td>
                        <td height="45px"></td>
                    </tr>
            <?php 
                }else{
                $resultat5 = mysqli_query($connexion, "SELECT typeformation, nom, prenom, dateseance FROM moniteur, seance WHERE seance.CINMoniteur=moniteur.CINMoniteur and dateseance='vendredi' and class='$abc' and horaire='soir';");
                $ligne5 = mysqli_fetch_row($resultat5);
            ?>
                    <tr align="center">
                        <td height="45px" style="vertical-align: middle;"><?php echo $ligne5[3]; ?></td>
                        <td height="45px"></td>
                        <td style="background: #6a6a6a"></td>
                        <td height="45px"><?php echo $ligne5[1]." ".$ligne5[2]."<br>".$ligne5[0]; ?></td>
                    </tr>
            <?php 
              }}else{
                if ($ligne55[1]=='matin') {
                $resultat5 = mysqli_query($connexion, "SELECT typeformation, nom, prenom, dateseance FROM moniteur, seance WHERE seance.CINMoniteur=moniteur.CINMoniteur and dateseance='vendredi' and class='$abc';");
                $ligne5 = mysqli_fetch_row($resultat5);
            ?>
                    <tr align="center">
                        <td height="45px" style="vertical-align: middle;"><?php echo $ligne5[3]; ?></td>
                        <td height="45px"><?php echo $ligne5[1]." ".$ligne5[2]."<br>".$ligne5[0]; ?></td>
                        <td style="background: #6a6a6a"></td>
                        <td height="45px"></td>
                    </tr>
            <?php
              }else{
            $resultat5 = mysqli_query($connexion, "SELECT typeformation, nom, prenom, dateseance FROM moniteur, seance WHERE seance.CINMoniteur=moniteur.CINMoniteur and dateseance='vendredi' and class='$abc' and horaire='soir';");
                $ligne5 = mysqli_fetch_row($resultat5);
            ?>
                    <tr align="center">
                        <td height="45px" style="vertical-align: middle;"><?php echo $ligne5[3]; ?></td>
                        <td height="45px"></td>
                        <td style="background: #6a6a6a"></td>
                        <td height="45px"><?php echo $ligne5[1]." ".$ligne5[2]."<br>".$ligne5[0]; ?></td>
                    </tr>
            <?php
              }}}}
            ?>
            
                </table>
            <?php
                mysqli_close($connexion);
            ?>