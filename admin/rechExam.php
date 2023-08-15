<?php
    include('../sqlConnexion.php');
    session_start();
    if(!(isset($_SESSION['login'])))
    {
        header("Location: ../conn-inscri/confconn.php");
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

  <title>Admin | Recherche</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Place your kit's code here -->
  <script src="https://kit.fontawesome.com/7c0fdfc740.js" crossorigin="anonymous"></script>

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  <script>
        	function modifier(modifier)
          {
              if(confirm("Etes vous sûr de vouloir modifier ces données?"))
              {
                  window.location.href='ExamModif.php?modifier_idexamen=' +modifier;
              }
          }
          function supprimer(supprimer)
          {
              if(confirm("Etes vous sûr de vouloir supprimer ces données?"))
              {
                  window.location.href='ExamSupp.php?supprimer_idexamen=' +supprimer;
              }
          }
          function add()
          {
              if(confirm("Etes vous sûr d'ajouter des nouvelles données?"))
              {
                  window.location.href='ExamAdd.php';
              }
          }
  </script>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-text mx-3">auto-école ALAMAL</div>
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

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="rechExam.php" method="post" accept-charset="utf-8">
            <div class="input-group">
              <input type="text" name="rech" class="form-control bg-light border-0 small" placeholder="Chercher quelque chose" aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="submit" name="recherche">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

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
              <h5 class="m-0 font-weight-bold text-primary">Liste des Examens</h5>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr align="center">
                        <th>Date d'examen</th>
                        <th>Type</th>
                        <th>Actions</th>
                        <th>Candidats</th>
                        <th>Résultat d'examen</th>
                        <th>Actions</th>
                    </tr>
      <?php
                if (isset($_POST["recherche"])) {
                    $rech=$_POST["rech"];
                    $resultat = mysqli_query($connexion, "SELECT * FROM Examen WHERE TYPEEXAMEN like '%$rech%' or DATEEXAMEN like '%$rech%' order by DATEEXAMEN");
                while($ligne = mysqli_fetch_row($resultat))
                {
                  $abc=$ligne[0];
                  $resultat1 = mysqli_fetch_row(mysqli_query($connexion, "SELECT count(*) FROM avoir where idexamen='$abc' group by idexamen"));
                  $xyz=$resultat1[0];
            ?> 
                    <tr align="center">
                        <td rowspan="<?php echo $xyz; ?>" style="vertical-align: middle;" height="45px"><?php echo $ligne[1]; ?></td>
                        <td rowspan="<?php echo $xyz; ?>" style="vertical-align: middle;" height="45px"><?php echo $ligne[2]; ?></td>
                        <td rowspan="<?php echo $xyz; ?>" style="vertical-align: middle;" height="45px">
                            <button type="submit" name="modifier" title="Modifier" onClick="modifier('<?php echo $ligne[0]; ?>')"><img src="../img/modifier.png" width="14px" height="18px"></button>
                            <button type="submit" name="supprimer" title="Supprimer l'examen" onClick="supprimer('<?php echo $ligne[0]; ?>')"><img src="../img/supp.png" width="14px" height="18px"></button>
                        </td>
            <?php
                $resultat2 = mysqli_query($connexion, "SELECT Candidat.CINCandidat, Candidat.nom, Candidat.prenom, avoir.RESULTATEXAMEN FROM Candidat, avoir where avoir.idexamen='$abc' and Candidat.CINCandidat=avoir.CINCandidat");
                while ($ligne2 = mysqli_fetch_row($resultat2)) {
            ?>
                        <td height="45px" align="center"><?php echo $ligne2[1]." ".$ligne2[2];; ?></td>
                        <td height="45px" align="center"><?php echo $ligne2[3]; ?></td>
                        <td style="vertical-align: middle;" height="45px" align="center">
                            <button type="submit" name="supprimer" title="Supprimer l'étudiant" onClick="supprimerCt('<?php echo $ligne[0]; ?>','<?php echo $ligne2[0]; ?>')"><img src="../img/supp.png" width="14px" height="18px"></button>
                        </td>
                      </tr>
                        
            <?php 
                }}}
                mysqli_close($connexion);
            ?>
                </table>
                <div style="display: flex; justify-content: center;"><span style="padding-right: 15px;">Ajouter un examen</span><button type="submit" name="ajout" title="Ajouter" onClick="add()"><img src="../img/add.png" width="20px" height="23px"></button></div>

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
            <span>Copyright &copy; auto-école ALAMAL</span>
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

</body>

</html>
