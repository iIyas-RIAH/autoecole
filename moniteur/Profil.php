<?php
    session_start();
    if(!(isset($_SESSION['CINMoniteur'])))
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

  <title>Moniteur | Profil</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Place your kit's code here -->
  <script src="https://kit.fontawesome.com/7c0fdfc740.js" crossorigin="anonymous"></script>

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  <script>
        	function afficher_mdp()
        	{
        	    var x = document.getElementById("myInput");
            	if (x.type == "password")
            	{
                	x.type = "text";
            	}
            	else
            	{
            	    x.type = "password";
            	}
        	}
          function modifier(modifier)
          {
              if(confirm("Etes vous sûr de vouloir modifier ces données?"))
              {
                  window.location.href='PModif.php';
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
        <a class="nav-link" href="#">
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
        <?php
          include('../sqlConnexion.php');
          $CINMoniteur = $_SESSION['CINMoniteur'];
          $resultat = mysqli_fetch_row(mysqli_query($connexion, "SELECT * FROM Moniteur WHERE CINMoniteur='$CINMoniteur'"));
          if($resultat)
          {
        ?>
          <span style="font-size: 26px;">Bienvenue <?php echo $resultat[1]." ".$resultat[2]; }?></span>
      
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none d-sm-block"></div>

            <a href="../deconnexion.php" style="text-decoration: none; color: #4e73df; padding-top: 5px; ">Se déconnecter</a>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid" style="padding-top: 45px;">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h5 class="m-0 font-weight-bold text-primary">Profil</h5>
            </div>
            <div class="card-body">
              <div class="table-responsive" style="height: 135px;">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <tr align="center">
                        <th>CIN</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Mot de passe</th>
                        <th>Actions</th>
                    </tr>
            <?php
                $resultat = mysqli_query($connexion, "SELECT * FROM Moniteur WHERE CINMoniteur='$CINMoniteur'");
                while($ligne = mysqli_fetch_row($resultat))
                {
            ?>
                    <tr align="center">
                        <td height="45px"><?php echo $ligne[0]; ?></td>
                        <td height="45px"><?php echo $ligne[1]; ?></td>
                        <td height="45px"><?php echo $ligne[2]; ?></td>
                        <td height="45px"><?php echo $ligne[3]; ?></td>
                        <td height="45px"><?php echo $ligne[4]; ?></td>
                        <td height="45px">
                            <input type="password" name="motdepasseens" id="myInput" value="<?php echo $ligne[5]; ?>">
                            <input type="image" src="../img/voir.png" height="16px" width="16px" onclick="afficher_mdp()">
                        </td>
                        <td height="45px">
                            <button type="submit" name="modifier" title="Modifier" onClick="modifier('<?php echo $ligne[0]; ?>')"><img src="../img/modifier.png" width="14px" height="18px"></button>
                        </td>
                    </tr>
            <?php 
                }
            ?>
                </table>
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
