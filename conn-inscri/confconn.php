<?php
    include("../sqlConnexion.php");
    if(isset($_POST['submit']))
    {
        $email = $_POST['email'];
        $passwd = $_POST['passwd'];
        $resultat_Cand = mysqli_fetch_row(mysqli_query($connexion, "SELECT CINCandidat FROM candidat WHERE email='$email' AND motdepasse='$passwd'"));
        if(!$resultat_Cand)
        {
            $resultat_Mon = mysqli_fetch_row(mysqli_query($connexion, "SELECT CINMoniteur FROM moniteur WHERE email='$email' AND motdepasse='$passwd'"));
            if(!$resultat_Mon)
            {
                $resultat_admin = mysqli_fetch_row(mysqli_query($connexion, "SELECT login FROM admin WHERE login='$email' AND motdepasse='$passwd'"));
                if(!$resultat_admin)
                {
                    echo "<h2> l'email ou le mot de passe est incorrecte !</h2>";
                    header("Refresh: 4; URL= connexion.html#conn");
                }
                else
                {
                    session_start();
                    $_SESSION['login'] = $resultat_admin[0];
                    header("Location: ../admin/Profil.php");
                }
  
            }
            else
            {
                session_start();
                $_SESSION['CINMoniteur'] = $resultat_Mon[0];
                header("Location: ../moniteur/Profil.php");
            }
        }
        else
        {
            session_start();
            $_SESSION['CINCandidat'] = $resultat_Cand[0];
            header("Location: ../candidat/Profil.php");
        }
    }
?>