<?php 
  session_start();
  if (!isset($_SESSION['matricule_personnel'])) {
    header('location:../index.php');
  }
    require_once "pdo.php";
    $id_demande = $_GET['id'];

    $liste_demande = $pdo->query('SELECT `id_carnet`,nom_patient,prenom_patient,demande_cons.motif_demande,contenu,debut_symp,sexe_patient,(YEAR(CURRENT_DATE) - YEAR(date_naissance_patient)) as age FROM `demande_cons`,patient WHERE patient.num_cni_patient = demande_cons.id_carnet AND  id_demande = "'.$id_demande.'"');
      
          while ($row = $liste_demande->fetch())
          {
            $id_carnet = $row[0];
            $nom = $row[1];
            $prenom = $row[2];
            $motif = $row[3];
            $contenu = $row[4];
            $debut = $row[5];
            $sexe = $row[6];
            $age = $row[7];
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

  <title>Traitement de la consultation</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
   <link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet"> 
   <style type="text/css">
     td
     {
        padding: 10px;
        border-bottom: 1px solid gray;
     }
     label{
      margin-right: 10px;
     }
     strong{
      color: black;
     }
   </style>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

   <?php include ('init/sidebar.php');?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

    <?php include('init/head.php'); ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Details du patient</h1>
          </div>


          <div class="contain">
            <div class="row">
              <div class="col-lg-5 mb-4">
                <div class="card mb-4">
                 <div class="card-header py-3">
                   <h6 class="m-0 font-weight-bold text-info">Details du patient</h6>
                  </div>
                  <div class="card-body">
                   <label>ID du patient: </label><strong><?php echo $id_carnet; ?></strong><hr>
                    <label>Noms:</label> <strong><?php echo $nom; ?></strong><hr>
                    <label>Prenoms:</label> <strong><?php echo $prenom; ?></strong><hr>
                    <label>Sexe:</label> <strong><?php echo $sexe; ?></strong><hr>
                    <label>Age:</label> <strong><?php echo $age; ?>ans</strong><hr>
                    <label>Motif de la consultation:</label> <strong><?php echo $motif; ?></strong><hr>
                    <label>Description des symptomes</label> <strong><?php echo $contenu; ?></strong><hr>
                    <label style="margin-top: 20px;">Debut des symptomes:</label> <strong><?php echo $debut; ?></strong><hr>
                  </div>
                </div>
              </div>

              <div class="col-lg-7 mb-4">
              <div class="card  mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-info">Fiche de consultation</h6>
                </div>
                <div class="card-body">
                  <form method="post" action="Traitement/trait_consultation.php?id=<?php echo $id_demande;?>">
                    <div class="form-group">
                      <label for="dia">Diagnostic:</label>
                      <textarea name="diagnostic" id="dia" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                      <label for="ord">Ordonnance:</label>
                      <textarea name="ordonnance" id="ord" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                      <label for="exa">Examens à faire:</label>
                      <textarea name="examen" id="exa" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="rend">Rendez-vous?</label>
                      <input type="date" name="date_rend" class="form-control" required>
                    </div>
                    <input type="submit" name="submit" class="btn btn-success" value="Envoyer la fiche de consultaion">
                  </form>
                </div>
              </div>
            </div> 
          </div>
        </div>


      <!-- End of Main Content -->

     <?php include('init/footer.php'); ?>