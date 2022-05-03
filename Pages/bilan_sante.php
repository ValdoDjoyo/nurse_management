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

  <title>Bilan de sante</title>

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
            <h1 class="h3 mb-0 text-gray-800">BILAN DE SANTE</h1>
          </div>


          <div class="contain">
            <div class="row">
              <div class="col-lg-8 mb-4">
                <div class="card mb-4">
                  <div class="card-body">
                    <div class="table-responsive" style="height: 500px;">
                    
                        
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                            <tr>
                              <th>Examen</th>
                              <th>Date de prise</th>
                              <th>Resultats</th>
                            
                            </tr>
                          </thead>
                          
                        
                          <tbody>
                            <tr>
                             <td>HEPATITE A</td>
                             <td>NULL</td>
                             <td>NULL</td>
                            </tr>
                            <tr>
                             <td>HEPATITE B</td>
                             <td>NULL</td>
                             <td>NULL</td>
                            </tr>
                            <tr>
                             <td>HEPATITE C</td>
                             <td>NULL</td>
                             <td>NULL</td>
                            </tr>
                            <tr>
                             <td>VIH-SIDA</td>
                             <td>NULL</td>
                             <td>NULL</td>
                            </tr>
                            <tr>
                             <td>CORONA</td>
                             <td>NULL</td>
                             <td>NULL</td>
                            </tr>
                            <tr>
                             <td>TYPHOÏDE</td>
                             <td>NULL</td>
                             <td>NULL</td>
                            </tr>
                          </tbody>
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