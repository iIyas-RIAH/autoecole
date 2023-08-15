<?php
    include('../sqlConnexion.php');
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

  <title>Moniteur | Messagerie</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Place your kit's code here -->
  <script src="https://kit.fontawesome.com/7c0fdfc740.js" crossorigin="anonymous"></script>

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  <style>
  .collapsible {
    background-color: #4e73df;
    color: white;
    cursor: pointer;
    padding: 18px;
    width: 100%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 19px;
  }

  .active, .collapsible:hover {
    background-color: #224abe;
  }

  .content {
    padding: 0 18px;
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.2s ease-out;
    background-color: #f1f1f1;
    color: black;
    font-size: 17px;
  }
  .btn1{
  margin-top: 30px;
  cursor: pointer;
  color: white;
  font-size: 18px;
  text-decoration: none;
  padding: 13px 18px;
  background: #5b5867;
  border-radius: 3px;
  border: 2px solid #5b5867;
  transition: all 0.3s ease-in-out;
  width: 15%;
  margin-right: 42.5%;
  margin-left: 42.5%;
  margin-top: 12px;
  }
  .btn1:hover{
  color: #f1f1f1;
  background: transparent;
  }
  select:focus{
  border-color: #f39c12 !important;
  }
  input:focus{
  border-color: #f39c12 !important;
  }
  textarea:focus{
  border-color: #f39c12 !important;
  }
  </style>
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
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
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
        <div class="container-fluid" style="padding-top: 45px; width: 75%;">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h5 class="m-0 font-weight-bold text-primary">Messagerie</h5>
            </div>
            <div class="card-body">
              <div class="table-responsive" style="padding-bottom: 20px;">
            <?php
                $CINMoniteur = $_SESSION['CINMoniteur']; 
                $resultat = mysqli_query($connexion, "SELECT * FROM message where Destinataire='$CINMoniteur' order by DATE");
                while($ligne = mysqli_fetch_row($resultat))
                {
            ?> 
                <button class="collapsible"><?php echo $ligne[1].", ".$ligne[4]; ?><span style="position: absolute; right: 0; width: 225px;"><?php echo $ligne[3]; ?></span></button>
                <div class="content">
                  <p style="padding-top: 10px;"><?php echo $ligne[5]; ?></p>
                </div>
            <?php 
                }
            ?>
              </div>
              <div class="table-responsive" style="padding-bottom: 20px;">
                <h6 style="font-weight: 500; font-size: 20px; padding-bottom: 10px;">Ecrire un message</h6>
                <form action="MessageConf.php" method="post" accept-charset="utf-8">
                  <div class="form-group" style="background: #4e73df; padding-top: 30px; padding-left: 40px; padding-right: 40px; padding-bottom: 12px;">
                    <label for="Destinataire" style="padding-top: 10px; color: white;">Destinataire :</label>
                    <select name="Destinataire" required style="width: 660px; height: 38px; margin-right: 60px; border: 2px solid #736e83; border-radius: 5px; position: absolute; right: 0;">
            <?php
                $resultat1 = mysqli_query($connexion, "SELECT DISTINCT class FROM Moniteur, Seance where Moniteur.CINMoniteur=Seance.CINMoniteur");
                while ($ligne1 = mysqli_fetch_row($resultat1)) {
            ?>
                      <option value="<?php echo $ligne1[0]; ?>"><?php echo $ligne1[0]; ?></option>
            <?php 
                }
            ?>
                    </select><br>
                    <label for="Objet" style="padding-top: 10px; color: white;">Objet :</label>
                    <input type="text" name="objet" id="objet_post" class="form-control" style="border: 2px solid #736e83; border-radius: 5px;" required>
                    <label for="message" style="padding-top: 10px; color: white;">Message :</label>
                    <textarea name="message" id="message_post" class="form-control" style="border: 2px solid #736e83; border-radius: 5px; height: 75px;"required></textarea>
                    <input type="submit" class="btn1" name='submitMessage' value="Envoyer">
                  </div> 
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      <script>
        var coll = document.getElementsByClassName("collapsible");
        var i;

        for (i = 0; i < coll.length; i++) {
          coll[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (content.style.maxHeight){
              content.style.maxHeight = null;
            } else {
              content.style.maxHeight = content.scrollHeight + "px";
            }
          });
        }
</script>
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
