<?php 
  session_start();
  if (!isset($_SESSION['id_patient'])) {
    header('location:../index.php');
  }
    require_once "pdo.php";
    $id_demande = $_GET['id'];

    $liste_demande = $pdo->query('SELECT `id_cons`,diagnostic,examen,ordonnance,`date_cons`,`date_rendezvous`,demande_cons.motif_demande,consultation.id_demande,nom_personnel FROM `consultation`,demande_cons,personnel WHERE consultation.id_demande=demande_cons.id_demande AND demande_cons.id_medecin=personnel.matricule_personnel AND demande_cons.id_carnet="'.$_SESSION['id_patient'].'" ');
      
          while ($row = $liste_demande->fetch())
          {
            $id_cons = $row[0];
            $diagnostic = $row[1];
            $examen = $row[2];
            $ordonnance = $row[3];
            $date_cons = $row[4];
            $date_rendezvous = $row[5];
            $motif_demande = $row[6];
            $nom_personnel = $row[8];
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
     @media print{
      #accordionSidebar,#imp{
        display: none;
      }
      label,strong{
         font-size: 25px;
      }
     }
   </style>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

   <?php include ('init/sidebar_pat.php');?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

    <?php include('init/head.php'); ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Rapport détaillé</h1>
          </div>


          <div class="contain">
            <div class="row">
              <div class="col-lg-7 mb-4">
                <div class="card mb-4">
                 <div class="card-header py-3">
                   <h6 class="m-0 font-weight-bold text-info">Fiche de consultation</h6>
                  </div>
                  <div class="card-body">
                   <label>ID de consultation: </label><strong><?php echo $id_cons; ?></strong><hr>
                    <label>Motif:</label> <strong><?php echo $motif_demande; ?></strong><hr>
                    <label>Diagnostic</label> <strong><?php echo $diagnostic; ?></strong><hr>
                    <label>Ordonnance:</label> <strong><?php echo $ordonnance; ?></strong><hr>
                    <label>Examens à faire:</label> <strong><?php echo $examen; ?></strong><hr>
                    <label>Medecin en charge:</label> <strong>Dr <?php echo $nom_personnel; ?></strong><hr>
                    <label>Date de consultation</label> <strong><?php echo $date_cons; ?></strong><hr>
                    <label>Date du prochain rendez-vous:</label> <strong><?php echo $date_rendezvous; ?></strong><hr>
                    <button class="btn btn-primary" id="imp" onclick="window.print();">Imprimer la fiche</button>
                  </div>
                </div>
              </div>
          </div>
        </div>


      <!-- End of Main Content -->

     <?php include('init/footer.php'); ?>