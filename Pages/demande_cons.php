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

  <title>Tableau de Bord patient</title>

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
        <div class="container-fluid ">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Remplir les champs suivants pour soumettre votre demande</h1>
          </div>


             <div class="contain">
          
            <form action="traitement/trait_demande_cons.php" method="post">
              <div class="row">
               <div class="col-lg-8 mb-4">
                <div class="card mb-4">
                  <div class="card-body">
                     <div class="form-group">
                        <label for="motif">Quel est le motif de votre demande ?</label>
                        <input type="text" class="form-control" id="motif"  name="motif" required="">
                     </div>
                    <div class="form-group">
                      <label for="cont">Quels sont les symptomes que vous ressentez ?</label>
                      <textarea name="contenu" class="form-control" id="cont" required></textarea>
                     </div>
                     <div class="form-group">
                        <label for="deb">Depuis combien de temps ressentez-vous ses symptomes ?</label>
                        <input type="text" class="form-control" id="deb"  name="debut_symp" required="">
                     </div>
                     <div class="form-group">              
                        <label for="med">Selectionner dans cette liste un medecin qui vous consultera</label>
                        <select style="font-weight: bold;"  name="id_med" class="form-control" id="med">
                          <?php include('pdo.php');
                            $list = $pdo->prepare("SELECT * FROM personnel ORDER BY nom_personnel");
                            $list->execute(array());
                            while ($rs=$list->fetch()) 
                              {?>
                              <option value="<?php echo $rs[0]; ?>">Dr <?php echo $rs[1]." : ".$rs[5]; ?></option>
                               <?php
                              }
                              $list->closeCursor();
                         ?>
                        </select> 
                     </div>
                     
                      <div class="form-group">
                        <button type="button" class="form-control btn btn-success" data-toggle="modal" data-target="#exampleModal">Soumettre la demande</button>
                      </div>
                        <a class="form-control btn btn-danger" href="dashboard_patient.php" style="text-align: center;color: white;">Annuler</a>
      
                   </div>
                </div>
              </div>
            </div>
            
                        <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Effectuer le payement pour la consultation</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                     <form action="Pages/traitement/trait_auth_admin.php" method="POST">
                        <div class="modal-body">
                                    
                          <span>Votre compte sera debité d'une somme de 2000 XAF pour les frais de consltation</span>  
                      </div>
                       <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                          <button type="submit" class="btn btn-primary">Payer</button>
                       </div>
                     </form> 
                  </div>
                </div>
              </div>
           </form>
           
          </div>
        </div>


      <!-- End of Main Content -->

     <?php include('init/footer.php'); ?>