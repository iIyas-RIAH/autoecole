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
    $Matricule = $_POST['matricule'];
    $CINMoniteur = $_POST['CIN'];
    $typeF = $_POST['typeF'];
    $jour = $_POST['jour'];
    $class = $_POST['class'];
    $horaire = $_POST['horaire'];
    $query_run = mysqli_query($connexion, "INSERT INTO seance (matricule, CINMoniteur, class, dateseance, horaire, typeformation) VALUES ('$Matricule', '$CINMoniteur', '$class', '$jour', '$horaire', '$typeF')");
    $resultat = implode('', mysqli_fetch_row(mysqli_query($connexion, "SELECT * FROM seance where matricule='$Matricule' and CINMoniteur='$CINMoniteur' and class='$class' and dateseance='$jour' and horaire='$horaire' and typeformation='$typeF'")));
    $query_run1 = mysqli_query($connexion, "INSERT INTO etudier (CINMoniteur, idseance) VALUES ('$CINMoniteur', '$resultat')");
    header('Location: listSean.php');
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

  <title>Admin | Ajouter une séance</title>

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
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
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
              <h5 class="m-0 font-weight-bold text-primary">Ajouter une Séance</h5>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <div class="container" id="inscr">
      <div class="form">
        <form class="form__inner" method="post" accept-charset="utf-8">
          <div class="form__line" style="margin-top: 15px;">
            <div class="form__block">
              <h4 class="form__label">Matricule</h4>
              <select class="form__input" name="matricule" required>
            <?php 
                $resultat = mysqli_query($connexion, "SELECT matricule, marque, type FROM vehicule");                 
                while ($ligne1 = mysqli_fetch_row($resultat)) {
            ?>
                <option value="<?php echo $ligne1[0]; ?>"><?php echo $ligne1[1]." ".$ligne1[2]; ?></option>
            <?php 
                }
            ?>
                <option value="NULL">NULL</option>
              </select>
            </div>
            <div class="form__block">
              <h4 class="form__label">Moniteur</h4>
              <select class="form__input" name="CIN" required>
            <?php 
                $resultat = mysqli_query($connexion, "SELECT CINMoniteur, nom, prenom FROM Moniteur");                 
                while ($ligne2 = mysqli_fetch_row($resultat)) {
            ?>
                <option value="<?php echo $ligne2[0]; ?>"><?php echo $ligne2[1]." ".$ligne2[2]; ?></option>
            <?php 
                }
            ?>    
              </select>
            </div>
          </div>
          <div class="form__line"  style="margin-top: 15px;">
            <div class="form__block">
              <h4 class="form__label">Classe</h4>
              <select class="form__input" name="class" required>
            <?php 
                $resultat = mysqli_query($connexion, "SELECT distinct class FROM Candidat");                 
                while ($ligne3 = mysqli_fetch_row($resultat)) {
            ?>
                <option value="<?php echo $ligne3[0]; ?>"><?php echo $ligne3[0]; ?></option>
            <?php 
                }
            ?>
              </select>
            </div>
            <div class="form__block">
              <h4 class="form__label">Type de formation</h4>
              <select class="form__input" name="typeF" required>
                <option value="Pratique">Pratique</option>
                <option value="Théorique">Théorique</option>
              </select>
            </div>
          </div>
          <div class="form__line" style="margin-top: 15px;">
            <div class="form__block">
              <h4 class="form__label">Jour de séance</h4>
              <select class="form__input" name="jour" required>
                <option value="Lundi">Lundi</option>
                <option value="Mardi">Mardi</option>
                <option value="Mercredi">Mercredi</option>
                <option value="Jeudi">Jeudi</option>
                <option value="Vendredi">Vendredi</option>
              </select>
            </div>
            <div class="form__block">
              <h4 class="form__label">Horaire</h4>
              <select class="form__input" name="horaire" required>
            <?php 
                $resultat = mysqli_query($connexion, "SELECT distinct horaire FROM Seance order by horaire");                 
                while ($ligne5 = mysqli_fetch_row($resultat)) {
            ?>
                <option value="<?php echo $ligne5[0]; ?>"><?php echo $ligne5[0]; ?></option>
            <?php 
                }
            ?>
              </select>            
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
