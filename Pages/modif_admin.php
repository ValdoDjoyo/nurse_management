<?php session_start();
if (!isset($_SESSION['matricule_personnel']) AND !isset($_SESSION['matricule'])) {
  header('location:../index.php');
}
?>
     <?php include('init/init.php');?>


     <?php
     if (isset($_SESSION['matricule_personnel'])) {
        include('init/sidebar.php');
      }
      elseif (isset($_SESSION['matricule'])) {
        include('init/sidebar_adm.php'); 
       } ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

     <?php include('init/head.php');?>
        

        <!-- Begin Page Content -->
        <div class="container-fluid">
           <div class="d-sm-flex align-items-center justify-content-between mb-4">
             <h1 class="h3 mb-0 text-gray-800">Modifier vos informations</h1>
           </div>
          <div class="contain">
           
            <form action="traitement/trait_modif_Admin.php" method="post" enctype="multipart/form-data">
              <div class="row">
              <div class="col-lg-6 mb-4">
                <div class="card mb-4">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="Matricule">Matricule:</label>
                      <input type="text" class="form-control" id="Matricule" value="<?php if(isset($_SESSION['matricule_personnel'])){echo $_SESSION['matricule_personnel'];} elseif(isset($_SESSION['matricule'])){echo $_SESSION['matricule'];} ?>" disabled="">
                    </div>
                    <div class="form-group">
                      <label for="Nom">Nom:</label>
                      <input type="text" class="form-control" id="Nom" required value="<?php echo $_SESSION['nom']; ?>" name="nom" >
                     </div>
                     <div class="form-group">
                        <label for="Prenom">Prenom:</label>
                        <input type="text" class="form-control" id="Prenom" required value="<?php echo $_SESSION['prenom']; ?>" name="prenom">
                     </div>
                     <div class="form-group">
                        <label for="sexe">Sexe:</label>
                        <select class="form-control" id="sexe" value="<?php echo $_SESSION['sexe']; ?>">
                          <option>Masculin</option>
                          <option>Feminin</option>
                        </select>
                     </div>
                     <div class="form-group">
                        <label for="photo">Photo:</label>
                        <input type="hidden" value="<?php echo $_SESSION['photos']; ?>" name="ancien_photo">
                        <input type="file" class="form-control" name="photo"  id="photo">
                     </div>
                   </div>
                </div>
              </div>

               <div class="col-lg-6 mb-4">
                <div class="card mb-4">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="Nom">Fonction:</label>
                      <input type="text" class="form-control" id="fonction" required  value="<?php echo $_SESSION['fonction']; ?>">
                     </div>
                     <div class="form-group">
                        <label for="Telephone">Telephone:</label>
                        <input type="text" class="form-control" id="Telephone" required name="telephone" value="<?php echo $_SESSION['telephone']; ?>">
                     </div>
                     <div class="form-group">
                        <label for="email">Adresse email:</label>
                        <input type="email" class="form-control" id="email"  name="email" value="<?php echo $_SESSION['email']; ?>">
                     </div>
                     <div class="form-group">
                        <label for="identifiant">Identifiant:</label>
                        <input type="text" class="form-control" id="identifiant" name="login"  value="<?php echo $_SESSION['login']; ?>">
                     </div>
                      <div class="form-group">
                        <label for="identifiant">Mot de passe:</label>
                        <input type="password" class="form-control" id="mdp"  name="mdp" value="<?php echo $_SESSION['mdp']; ?>">
                     </div>
                   </div>
                </div>
              </div>
            </div>

            <div class="form-group">
                <input type="submit" class="form-control btn btn-info" name="update" value="Appliquer les modifications">
                 <a class="form-control btn btn-danger" href="dashboard_admin.php" style="text-align: center;color: white;">Revenir en arriere</a>
            </div>
            </form>
          </div>
        </div>

     <?php include('init/footer.php');?>
     