<?php session_start();
if (!isset($_SESSION['matricule']) AND !isset($_SESSION['matricule_personnel'])) {
  header('location:../index.php');
}
include('pdo.php');
$id_service=$_GET['id'];
$nom_service = $_GET['nom_service'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Details du service</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
   <link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet"> 
   <style type="text/css">
    
    tbody>tr:hover{
      transition: background-color 0.5s , color 0.5s;
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
             <h1 class="h3 mb-0 text-gray-800">Liste des medecins affectés au service <span style="font-weight: bold;"><?php echo $_GET['nom_service']; ?></span></h1>

             <a href="list_service.php">Retourner à la liste des services</a>

              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary" <?php if(!isset($_SESSION['matricule'])){ echo 'hidden=';} else{ echo ''; } ?> data-toggle="modal" data-target="#exampleModal">
                Ajouter nouveau
              </button>

              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Affectation d'un nouveau médécin</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <?php if (isset($_POST['submit'])) {
                      include('traitement/trait_add_member.php');
                    } ?>
                     <form action="" method="POST">
                        <div class="modal-body">
                                   
                                    <div class="form-group">
                                      <label for="message-text" class="col-form-label">choisir un personnel dans la liste ci-dessous</label>
                                      <select class="form-control" id="message-text" name="matricule_personnel">
                                        <?php 
                                           $req = $pdo->query("SELECT personnel.matricule_personnel, personnel.nom_personnel, personnel.prenom_personnel,personnel.specialite FROM personnel WHERE matricule_personnel NOT IN (SELECT matricule_personnel FROM appartenir WHERE id_service='".$id_service."')");
                                          while ($row = $req->fetch())
                                          {?>
                                          <option value="<?php echo $row[0] ?>"><?php echo $row[1]." ".$row[2]; ?></option>
                                          <?php
                                          } 
                                          $req->closeCursor();
                                        ?>
                                      </select>
                                      <input type="hidden" name="id_service" value="<?php echo $id_service; ?>">
                                    </div>
                      </div>
                       <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                          <input type="submit" name="submit"  class="btn btn-primary" value="valider">
                       </div>
                     </form> 
                  </div>
                </div>
              </div>

           </div>
          <div class="contain">
            <div class="card mb-4" >
              <div class="card-body">
                 <div class="table-responsive" style="height: 400px;">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Nom du medecin</th>
                        <th>Matricule</th>
                        <th>Spécialité</th>
                        <th  <?php if(!isset($_SESSION['matricule'])){ echo 'hidden=';} else{ echo ''; } ?> >Action</th>
                      </tr>
                    </thead>
                    <?php 
                      
                    $liste_service = $pdo->query("SELECT appartenir.matricule_personnel,nom_personnel,specialite from appartenir,personnel WHERE appartenir.matricule_personnel=personnel.matricule_personnel and id_service='".$_GET['id']."' ");
                        while ($row = $liste_service->fetch())
                        {?>
                            <tbody>
                      <tr>
                        <td> <?php echo $row[0] ?></td>
                        <td> <?php echo $row[1] ?></td>
                        <td><?php echo $row[2] ?></td>
                        <td  <?php if(!isset($_SESSION['matricule'])){ echo 'hidden=';} else{ echo ''; } ?> ><a href="traitement/trait_del_member.php?id=<?php echo $row[0]; ?>&id_service=<?php echo $id_service;?>&nom_service=<?php echo $nom_service;?>" class="btn btn-danger">Retirer</a></td>
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