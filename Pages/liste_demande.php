<?php 
  session_start();
  if (!isset($_SESSION['matricule_personnel'])) {
    header('location:../index.php');
  }
    require_once "pdo.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Nouvelles demandes de consultation</title>

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
            <h1 class="h3 mb-0 text-gray-800">Demandes de consultations</h1>
          </div>


          <div class="contain">
            <div class="row">
              <div class="col-lg-10 mb-4">
                <div class="card mb-4">
                  <div class="card-body">
                    <div class="table-responsive" style="height: 400px;">
                       <?php 
                            include('pdo.php');
                        $liste_demande = $pdo->query('SELECT `id_demande`,nom_patient,demande_cons.motif_demande,date_demande,sexe_patient,(YEAR(CURRENT_DATE) - YEAR(date_naissance_patient)) as age FROM `demande_cons`,patient WHERE patient.num_cni_patient = demande_cons.id_carnet AND id_medecin = "'.$_SESSION['matricule_personnel'].'" AND etat = "En cours"');
                        $nbr = $liste_demande->rowCount();?>
                      <span>Il y'a <?php echo $nbr?> nouvelles demandes</span>
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                            <tr>
                              <th>Nom du patient</th>
                              <th>Age</th>
                              <th>Motif de la demande</th>
                              <th>Date de demande</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                         <?php
                              while ($row = $liste_demande->fetch())
                              {?>
                            <tbody>
                            <tr>
                              <td> <?php echo $row[1] ?></td>
                              <td> <?php echo $row[5] ?></td>
                              <td> <?php echo $row[2] ?></td>
                              <td> <?php echo $row[3] ?></td>
                              <td><a href="details_cons.php?id=<?php echo $row[0] ?>" class="btn btn-primary">Visualiser</a></td>
                            </tr>
                          </tbody>
                          <?php
                              } 
                              $liste_demande->closeCursor();
                            ?>
                        
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div> 
          </div>
        </div>


      <!-- End of Main Content -->

     <?php include('init/footer.php'); ?>