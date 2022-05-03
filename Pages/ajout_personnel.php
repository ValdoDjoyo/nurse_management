<?php session_start();
if (!isset($_SESSION['matricule']) AND !isset($_SESSION['matricule_personnel'])) {
  header('location:../index.php');
}

/*if (isset($_POST['nom'])) {
  include('traitement/trait_ajout_pers.php');
}*/
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Tableau de Bord Administrateur</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
   <link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet"> 
   
   <style type="text/css">
    
     
   </style>

</head>

<body id="page-top" onload="rand(1000, 9000)">

  <!-- Page Wrapper -->
  <div id="wrapper">

         <?php include('init/sidebar_adm.php'); ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <?php include('init/head.php'); ?>

        <script type="text/javascript">
          rand = function(min, max)
           {
            var a;
            a = Math.floor(Math.random() * (max - min)) + min;
            document.getElementById('Matricule').value = 'MEDHR'+a;
            document.getElementById('Matricule1').value = 'MEDHR'+a;
          //  alert(a);
           }
       </script>

        <!-- Begin Page Content -->
        <div class="container-fluid">
           <div class="d-sm-flex align-items-center justify-content-between mb-4">
             <h1 class="h3 mb-0 text-gray-800">Ajouter un nouveau membre du personnel</h1>
             <a href="liste_personnel.php" class="btn btn-primary">Consulter la liste du personnel</a>
           </div>
          <div class="contain" >
            <form action="traitement/trait_ajout_pers.php" method="post" enctype="multipart/form-data">
              <div class="row">
              <div class="col-lg-6 mb-4">
                <div class="card mb-4">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="Matricule">Matricule:</label>
                      <input type="text" class="form-control" id="Matricule"  disabled>
                       <input type="hidden" name="matricule" class="form-control" id="Matricule1">
                    </div>
                    <div class="form-group">
                      <label for="Nom">Nom:</label>
                      <input type="text" name="nom" onkeyup ="this.value=this.value.toUpperCase()" class="form-control" id="Nom" required >
                     </div>
                     <div class="form-group">
                        <label for="Prenom">Prenom:</label>
                        <input type="text" onkeyup ="this.value=this.value.toUpperCase()" name="prenom" class="form-control" id="Prenom" >
                     </div>
                     <div class="form-group">
                        <label for="sexe">Sexe:</label>
                        <select class="form-control" name="sexe" id="sexe" >
                          <option value="Masculin">Masculin</option>
                          <option value="Feminin">Feminin</option>
                        </select>
                     </div>
                     <div class="form-group">
                        <label for="photo">Photo:</label>
                        <input type="file" class="form-control" name="photo" id="photo">
                     </div>
                   </div>
                </div>
              </div>

               <div class="col-lg-6 mb-4">
                <div class="card mb-4">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="fonction">Fonction:</label>
                      <input type="text" onkeyup ="this.value=this.value.toUpperCase()" class="form-control" name="fonction" id="fonction" required >

                     </div>
                     <div class="form-group">
                        <label for="Telephone">Telephone:</label>
                        <input type="text" class="form-control" name="telephone" id="Telephone" required >
                     </div>
                     <div class="form-group">
                        <label for="email">Adresse email:</label>
                        <input type="email" class="form-control" name="email" id="email">
                     </div>
                     <div class="form-group">
                        <label for="identifiant">Identifiant:</label>
                        <input type="text" class="form-control" name="login" id="identifiant" required>
                     </div>
                      <div class="form-group">
                        <label for="identifiant">Mot de passe:</label>
                        <input type="password" required class="form-control" name="password" id="mdp" >
                     </div>
                   </div>
                </div>
              </div>
            </div>

            <div class="form-group">
                <input type="submit" name="submit" class="form-control btn btn-info" value="Enregistrer">
                 <a class="form-control btn btn-danger" href="dashboard_admin.php" style="text-align: center;color: white;">Annuler</a>
            </div>
            </form>
          </div>
        </div>

     <?php include('init/footer.php'); ?>