<?php 
  session_start();
  if (!isset($_SESSION['id_patient'])) {
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

  <title>Mes consultations effectuées</title>

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
            <h1 class="h3 mb-0 text-gray-800">Vos consultations effectuées</h1>
          </div>


          <div class="contain">
            <div class="row">
              <div class="col-lg-10 mb-4">
                <div class="card mb-4">
                  <div class="card-body">
                    <div class="table-responsive" style="height: 400px;">
                       <?php 
                        include('pdo.php');
                        $liste_cons = $pdo->query('SELECT `id_cons`,`date_cons`,`date_rendezvous`,demande_cons.motif_demande,consultation.id_demande,nom_personnel FROM `consultation`,demande_cons,personnel WHERE consultation.id_demande=demande_cons.id_demande AND demande_cons.id_medecin=personnel.matricule_personnel AND demande_cons.id_carnet="'.$_SESSION['id_patient'].'" ');
                        ?>
                     
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                            <tr>
                              <th>ID</th>
                              <th>Motif demande</th>
                              <th>Date consultation</th>
                              <th>Medecin en charge</th>
                              <th>Date rendevous</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                         <?php
                              while ($row = $liste_cons->fetch())
                              {?>
                            <tbody>
                            <tr>
                              <td> <?php echo $row[0] ?></td>
                              <td> <?php echo $row[3] ?></td>
                              <td> <?php echo $row[1] ?></td>
                              <td> <?php echo $row[5] ?></td>
                              <td> <?php echo $row[2] ?></td>
                              <td><a href="affiche_cons.php?id=<?php echo $row[4] ?>" class="btn btn-primary">Visualiser</a></td>
                            </tr>
                          </tbody>
                          <?php
                              } 
                              $liste_cons->closeCursor();
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