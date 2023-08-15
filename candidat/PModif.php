<?php
    include('../sqlConnexion.php');
    session_start();
    if(!(isset($_SESSION['CINCandidat'])))
    {
        header("Location: ../conn-inscri/confconn.php");
    }
?>
<?php

if(isset($_POST['submit']))
{
    $CINCandidat = $_SESSION['CINCandidat'];
    $nom = strtoupper($_POST['nom']);
    $prenom = $_POST['prenom'];
    $dateN = $_POST['dateN'];
    $telephone = $_POST['mobile'];
    $email = $_POST['email'];
    $motdepasse1 = $_POST['passwd1'];
    $motdepasse2 = $_POST['passwd2'];
    $motdepasse0 = $_POST['passwd0'];
    $resultat = mysqli_fetch_row(mysqli_query($connexion, "SELECT motdepasse FROM Candidat WHERE CINCandidat='$CINCandidat'"));
    if ($motdepasse0=='' && $motdepasse1=='' && $motdepasse2=='') {
      $query_run = mysqli_query($connexion, "UPDATE Candidat SET nom='$nom', prenom='$prenom', datenaissance='$dateN', telephone='$telephone', email='$email'  WHERE CINCandidat='$CINCandidat'");
      header('Location: Profil.php');
    }else if ($resultat[0] == $motdepasse0 && $motdepasse1==$motdepasse2) {
      $query_run = mysqli_query($connexion, "UPDATE Candidat SET nom='$nom', prenom='$prenom', datenaissance='$dateN', telephone='$telephone', email='$email', motdepasse='$motdepasse1' WHERE CINCandidat='$CINCandidat'");
      header('Location: Profil.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Candidat | Modifier votre profil</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Place your kit's code here -->
  <script src="https://kit.fontawesome.com/7c0fdfc740.js" crossorigin="anonymous"></script>

  <!-- Custom styles for this template -->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../css/style.css">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-text mx-3">Auto-Ecole ALAMAL</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="Profil.php">
          <i class="fas fa-user-circle"></i>
          <span>Profil</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading" style="font-size: 20">
        Consultation
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="listSean.php" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="far fa-calendar-alt"></i>
          <span>Séance</span>
        </a>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="listExam.php" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-file-alt"></i>
          <span>Examen</span>
        </a>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="Message.php" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-envelope"></i>
          <span>Messagerie</span>
        </a>
      </li>
    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none d-sm-block"></div>

            <a href="../deconnexion.php" style="text-decoration: none; color: #4e73df; padding-top: 5px; ">Se déconnecter</a>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid" style="padding-top: 25px;">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h5 class="m-0 font-weight-bold text-primary">Modifier votre Profil</h5>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <div class="container" id="inscr">
            <?php
                $CINCandidat = $_SESSION['CINCandidat'];
                $resultat = mysqli_query($connexion, "SELECT nom, prenom, datenaissance, telephone, email FROM Candidat WHERE CINCandidat='$CINCandidat'");
                while($ligne = mysqli_fetch_row($resultat))
                {
            ?>
      <div class="form">
        <form class="form__inner" method="post" accept-charset="utf-8">
          <div class="form__line" style="margin-top: 15px;">
            <div class="form__block">
              <h4 class="form__label">Nom</h4>
              <input class="form__input" type="text" name="nom" value="<?php echo $ligne[0]; ?>" required>
            </div>
            <div class="form__block">
              <h4 class="form__label">Prenom</h4>
              <input class="form__input" type="text" name="prenom" value="<?php echo $ligne[1]; ?>" required>
            </div>
          </div>
          <div class="form__line"  style="margin-top: 15px;">
            <div class="form__block">
              <h4 class="form__label">Date de naissance</h4>
              <input class="form__input" class="date" type="date" name="dateN" value="<?php echo $ligne[2]; ?>" required>
            </div>
            <div class="form__block">
              <h4 class="form__label">Téléphone</h4>
              <input class="form__input" type="text" name="mobile" value="<?php echo $ligne[3]; ?>" pattern="0[5-7][0-9]{8}" title="0{5-6-7}{0-9}" required>
            </div>
          </div>
          <div class="form__line" style="margin-top: 15px;">
            <div class="form__block">
              <h4 class="form__label">Email</h4>
              <input class="form__input" type="text" name="email" value="<?php echo $ligne[4]; ?>" required>
            </div>
            <div class="form__block">
              <h4 class="form__label">L'ancien mot de passe</h4>
              <input class="form__input" type="password" name="passwd0">
            </div>
          </div>
          <div class="form__line" style="margin-top: 15px;">
            <div class="form__block">
              <h4 class="form__label">Mot de passe</h4>
              <input class="form__input" type="password" name="passwd1">
            </div>
            <div class="form__block">
              <h4 class="form__label">Confirmer le mot de passe</h4>
              <input class="form__input" type="password" name="passwd2">
            </div>
          </div>
          <input type="submit" class="btn1" name='submit' value="Modifier">
        </form>
       </div>
            <?php 
                }
            ?>
    </div>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Auto-Ecole ALAMAL</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
