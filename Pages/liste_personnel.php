<?php session_start();
if (!isset($_SESSION['matricule']) AND !isset($_SESSION['matricule_personnel'])) {
  header('location:../index.php');
}
//include('traitement/trait_list_personnel.php');

function isAuth(){
   if (!isset($_SESSION['matricule'])){
    return true;
  }
    else{
      return false;
    }
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

  <title>Liste des membres du personnel</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
   <link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet"> 
   <script type="text/javascript">
     function imprimer(tableau){
      var printContents = document.getElemntById(tableau).innerHTML;
      var originalContents = document.body.innerHTML;
      document.body.innerHTML = printContents;
      window.print();
      document.body.innerHTML = originalContents;
     }
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
    } 
   </style>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

  <?php
  include('pdo.php');
       if (isset($_SESSION['matricule_personnel'])) {
          include('init/sidebar.php');
        } 
        else {include('init/sidebar_adm.php');} 
      ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

    <?php include('init/head.php'); //if(isset($_SESSION['matricule'])){ echo 'false';} else{ echo 'false'; } ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Liste des membres du personnel</h1>
  <a href="ajout_personnel.php" id="b2" <?php if(!isset($_SESSION['matricule'])){ echo 'hidden=';} else{ echo ''; } ?> class="btn btn-primary"> <span class="fas fa-plus"></span> Ajouter Nouveau</a>
            <button class="btn btn-default" id="b1" onclick="window.print()"><span class="fas fa-print"></span> Imprimer la liste</button>
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
                        <th>Matricule</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Sexe</th>
                        <th>Fonction</th>
                        <th>Telephone</th>
                        <th class="hide" <?php if(!isset($_SESSION['matricule'])){ echo 'hidden=';} else{ echo ''; } ?> >Action</th>       
                      </tr>
                    </thead>
                      <?php
                        $liste_membre = $pdo->query('SELECT * FROM personnel ORDER BY nom_personnel');
                        while ($row = $liste_membre->fetch())
                        {?>
                        <tbody>
                          <tr>
                            <td><?php echo $row['matricule_personnel']; ?></td>
                            <td><?php echo $row['nom_personnel']; ?></td>
                            <td><?php echo $row['prenom_personnel']; ?></td>
                            <td><?php echo $row['sexe_personnel'];  ?></td>
                            <td><?php echo $row['fonction_personnel']; ?></td>
                            <td><?php echo $row['telephone_personnel']; ?></td>
                            <td class="hide" <?php if(!isset($_SESSION['matricule'])){ echo 'hidden=';} else{ echo ''; } ?> ><a href="#" class="btn btn-warning"><span class="fas fa-edit"></span> </a>
                            <a href="traitement/trait_supp_pers.php?id=<?php echo $row['matricule_personnel'] ?>" class="btn btn-danger"><span class="fas fa-trash"></span> </a></td>

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