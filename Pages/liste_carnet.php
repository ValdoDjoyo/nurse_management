<?php session_start();
if (!isset($_SESSION['matricule']) AND !isset($_SESSION['matricule_personnel'])) {
  header('location:../index.php');
}
//include('traitement/trait_list_patient.php');
include('pdo.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Liste des Carnets numeriques enregistrés</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
   <link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet"> 






   <script type="text/javascript">
    /* function imprimer(tableau){
      var printElem = document.getElemntById(tableau).innerHTML;
      var originalElem = document.body.innerHTML;
      document.body.innerHTML = printElem;
      window.print();
      document.body.innerHTML = originalElem;
     }*/
   </script>
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

 @media print{
      #accordionSidebar,#b1,#b2,.hide{
        display: none;
      }
   </style>

</head>

<body id="page-top">

 
  <div id="wrapper">

  <?php
      
          include('init/sidebar.php');
       ?>


    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

    <?php include('init/head.php'); ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Liste des Carnets numeriques enregistrés</h1>
            <a href="add_carnet.php" class="btn btn-primary" id="b1"> <span class="fas fa-plus"></span> Ajouter Nouveau</a>
            <button class="btn btn-default" onclick="window.print()" id="b2">  <span class="fas fa-print"></span> Imprimer la liste</button>
          </div>

          <!-- Content Row -->
          <div class="contain">
            <!-- Content Column -->
              <div class="card mb-4">
                <div class="card-body">
                  <div class="table-responsive" style="height: 400px;">
                   <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>ID patient</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Sexe</th>
                        <th>Groupe sanguin</th>
                        <th>Telephone</th>
                      
                        <th>Domicile</th>
                       
                        <th class="hide">Details</th>      
                      </tr>
                    </thead>
                      <?php
                        $liste_membre = $pdo->query('SELECT * FROM patient ORDER BY nom_patient');
                        while ($row = $liste_membre->fetch())
                        {?>
                        <tbody>
                          <tr>
                            <td><?php echo $row['num_cni_patient']; ?></td>
                            <td><?php echo $row['nom_patient']; ?></td>
                            <td><?php echo $row['prenom_patient']; ?></td>
                            <td><?php echo $row['sexe_patient']; ?></td>
                            <td><?php echo $row['groupe_sanguin_patient']; ?></td>
                            <td><?php echo $row['numtel_patient']; ?></td>
                            <td><?php echo $row['domicile_patient']; ?></td>
                           
                            <td class="hide"><a href="details_patient.php?id=<?php echo $row['num_cni_patient']; ?>" class="btn btn-primary">Voire plus</a></td>
                          </tr>
                        </tbody>
                          <?php
                        } 
                        $liste_membre->closeCursor();
                      ?>
                    </table>
                  </div>
                </div>
              </div>
          </div>
      </div>
      <!-- End of Main Content -->

       <?php include('init/footer.php'); ?>