<?php session_start();?>
<?php
if (!isset($_SESSION['matricule_personnel'])) {
  header('location:../index.php');
}
 $repertoire="../assets/image_upload//";
  require_once "pdo.php";
  $infos_connecte = $pdo->query('SELECT * FROM personnel WHERE matricule_personnel="'.$_SESSION['matricule_personnel'].'"');
  while ($row = $infos_connecte->fetch())
  {
    $matricule=$row['matricule_personnel'];
    $nom=$row['nom_personnel'];
    $prenom=$row['prenom_personnel'];
    $sexe=$row['sexe_personnel'];
    $fonction=$row['fonction_personnel'];
    $telephone=$row['telephone_personnel'];
    $email=$row['email_personnel'];
    $photo=$repertoire.$row['photo_personnel'];
    $photos=$row['photo_personnel'];
  } 
  $infos_connecte->closeCursor();
  $_SESSION['nom']=$nom;
  $_SESSION['prenom']=$prenom;
  $_SESSION['sexe']=$sexe;
  $_SESSION['fonction']=$fonction;
  $_SESSION['telephone']=$telephone;
  $_SESSION['email']=$email;
  $_SESSION['photos']=$photos;
   if (!empty($photo)) {
     $_SESSION['photo']=$photo;
  }
  else{
     $_SESSION['photo']="../assets/image/avatar.jpg";
  }
?>
    <?php include('init/init.php'); ?>

   <?php include('init/sidebar.php'); ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

     <?php include('init/head.php'); ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Mon profil</h1>
          </div>

          <!-- Content Row -->
          <div class="row">
            <!-- Content Column -->
            <div class="col-lg-6 mb-4">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-info">Identité</h6>
                </div>
                <div class="card-body">
                  <div class="text-left" >
                   <a href="<?php if(isset($matricule)){echo $_SESSION['photo'];} ?>"> <img class="rounded-circle shadow" style="width: 12rem; height: 12rem;border:1px solid lightblue" src="<?php if(isset($matricule)){echo $_SESSION['photo'];} ?>" alt=""></a>
                  </div>
                  <p>
                    <table style="width: 100%;">
                      <tr>
                        <td>Matricule</td>
                        <td>:</td>
                        <td><?php if(isset($matricule)){echo $matricule;} ?></td>
                      </tr>
                      <tr>
                        <td>Nom</td>
                        <td>:</td>
                        <td><?php if(isset($nom)){echo $nom;} ?></td>
                      </tr>
                      <tr>
                        <td>Prénom</td>
                        <td>:</td>
                        <td><?php if(isset($prenom)){echo $prenom;} ?></td>
                      </tr>
                      <tr>
                        <td>Sexe</td>
                        <td>:</td>
                        <td>
                          <?php 
                            if(isset($sexe))
                            {
                              if($sexe=="1")
                              {
                                echo "Masculin";
                              }
                              else
                              {
                                echo "Féminin";
                              }
                            } 
                          ?>
                        </td>
                      </tr>
                    </table>
                  </p>
                </div>
              </div>
              <a class="btn btn-info" href="modif_admin.php" style="text-align: center;color: white;">Modifier mes informations</a>
            </div>

            <div class="col-lg-6 mb-4">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-info">Contacts</h6>
                </div>
                <div class="card-body">
                  <p>
                    <table style="width: 100%;">
                      <tr>
                        <td>Fonction</td>
                        <td>:</td>
                        <td><?php if(isset($fonction)){echo $fonction;} ?></td>
                      </tr>
                      <tr>
                        <td>Téléphone</td>
                        <td>:</td>
                        <td><?php if(isset($telephone)){echo $telephone;} ?></td>
                      </tr>
                      <tr>
                        <td>Adresse email</td>
                        <td>:</td>
                        <td><?php if(isset($email)){echo $email;} ?></td>
                      </tr>
                    </table>
                  </p>
                </div>
              </div>

              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-info">Compte</h6>
                </div>
                <div class="card-body">
                  <p>
                    <table style="width: 100%;">
                      <tr>
                        <td>Identifiant</td>
                        <td>:</td>
                        <td><?php if(isset($_SESSION['login'])){echo $_SESSION['login'];} ?></td>
                      </tr>
                      <tr>
                        <td>Mot de Passe</td>
                        <td>:</td>
                        <td><?php if(isset($_SESSION['mdp'])){echo $_SESSION['mdp'];} ?></td>
                      </tr>
                    </table>
                  </p>
                </div>
              </div>

            </div>
          </div>
      </div>
      <!-- End of Main Content -->

     
<?php include('init/footer.php'); ?>