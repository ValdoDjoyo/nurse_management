<?php session_start();
if (!isset($_SESSION['matricule']) AND !isset($_SESSION['matricule_personnel'])) {
  header('location:../index.php');
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

  <title>Liste des services de l'hopital</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
   <link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet"> 
   <style type="text/css">
    
    tbody>tr:hover{
      transition: background-color 1s , color 0.5s;
        background-color:gray;
        color: white;
    }
    thead{
      background-color: lightblue; 
      color: black;

    } 
   </style>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

  <?php
       if (isset($_SESSION['matricule_personnel'])) {
          include('init/sidebar.php');
        } 
        else {include('init/sidebar_adm.php');} 
      ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

       <?php include('init/head.php'); ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
           <div class="d-sm-flex align-items-center justify-content-between mb-4">
             <h1 class="h3 mb-0 text-gray-800">Liste des services de l'hopital</h1>
           </div>
          <div class="contain">
            <div class="card mb-4" >
              <div class="card-body">
                 <div class="table-responsive" style="height: 400px;">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Nom du service</th>
                        <th>Nombre de personnel</th>
                        <th <?php if(!isset($_SESSION['matricule'])){ echo 'hidden=';} else{ echo ''; } ?>>Action</th>
                        <th>Details</th>
                      </tr>
                    </thead>
                    <?php 
                      include('pdo.php');
                    $liste_service = $pdo->query("SELECT service.id_service, `designation_service` , COUNT(matricule_personnel) FROM `service` LEFT JOIN appartenir on service.id_service = appartenir.id_service GROUP BY service.id_service ");
                        while ($row = $liste_service->fetch())
                        {?>
                    <tbody>
                      <tr>
                        <td> <?php echo $row['designation_service'] ?></td>
                        <td> <?php echo $row[2] ?></td>
                        <td <?php if(!isset($_SESSION['matricule'])){ echo 'hidden=';} else{ echo ''; } ?>><a class="btn btn-primary"><i class="fas fa-edit fa-sm fa-fw mr-2 text-white-400"></i></a> <a href="traitement/supp_service.php?id=<?php echo $row[0] ?>" class="btn btn-danger"><i class="fas fa-trash fa-sm fa-fw mr-2 text-white-400"></i></a></td>
                        <td><a href="Details_service.php?id=<?php echo $row[0]; ?>&nom_service=<?php echo $row[1]; ?>" class="btn btn-primary">Voire plus</a></td>
                      </tr>
                    </tbody>
                    <?php
                        } 
                        $liste_service->closeCursor();
                      ?>
                  
                </table>
              </div>
            </div>
          </div>
        </div>

   <?php include('init/footer.php'); ?>