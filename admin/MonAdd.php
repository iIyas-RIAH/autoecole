<?php
    include('../sqlConnexion.php');
    session_start();
    if(!(isset($_SESSION['login'])))
    {
        header("Location: ../conn-inscri/confconn.php");
    }
?>
<?php

if(isset($_POST['submit']))
{
    $cin = $_POST['cinmoniteur'];
    $nom = strtoupper($_POST['nom']);
    $prenom = $_POST['prenom'];
    $telephone = $_POST['mobile'];
    $email = $_POST['email'];
    $motdepasse = $_POST['passwd'];
    $motdepasse2 = $_POST['passwd2'];
    if ($motdepasse==$motdepasse2) {
      $query_run = mysqli_query($connexion, "INSERT INTO Moniteur (cinmoniteur, nom, prenom, telephone, email, motdepasse) VALUES ('$cin', '$nom', '$prenom', '$telephone', '$email', '$motdepasse')");
      header('Location: listMon.php');
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

  <title>Admin | Ajouter un moniteur</title>

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
          <span>Accueil</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading" style="font-size: 20">
        Gestion
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
        <a class="nav-link collapsed" href="listVeh.php" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-car"></i>
          <span>Véhicule</span>
        </a>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="listMon.php" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-chalkboard-teacher"></i>
          <span>Moniteur</span>
        </a>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="listCand.php" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-user-graduate"></i>
          <span>Candidat</span>
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
              <h5 class="m-0 font-weight-bold text-primary">Ajouter un Moniteur</h5>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <div class="container" id="inscr">
      <div class="form">
        <form class="form__inner" method="post" accept-charset="utf-8">
          <div class="form__line" style="margin-top: 15px;">
            <div class="form__block">
              <h4 class="form__label">CIN</h4>
              <input class="form__input" type="text" name="cinmoniteur" required>
            </div>
            <div class="form__block">
              <h4 class="form__label">Nom</h4>
              <input class="form__input" type="text" name="nom" required>
            </div> 
          </div>
          <div class="form__line"  style="margin-top: 15px;">
            <div class="form__block">
              <h4 class="form__label">Prenom</h4>
              <input class="form__input" type="text" name="prenom" required>
            </div>
            <div class="form__block">
              <h4 class="form__label">Email</h4>
              <input class="form__input" type="text" name="email" required>
            </div>
          </div>
          <div class="form__line" style="margin-top: 15px;">
            <div class="form__block">
              <h4 class="form__label">Téléphone</h4>
              <input class="form__input" type="text" name="mobile" pattern="[0-9]{10}" title="10 numéros" required>
            </div>
            <div class="form__block">
              <h4 class="form__label">Mot de passe</h4>
              <input class="form__input" type="password" name="passwd" required>
            </div>
          </div>
          <div class="form__line" style="margin-top: 15px;">
            <div class="form__block">
              <h4 class="form__label">Confirmer le mot de passe</h4>
              <input class="form__input" type="password" name="passwd2" required>
            </div>
          </div>
          <input type="submit" class="btn1" name='submit' value="Ajouter">
        </form>
       </div>
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
