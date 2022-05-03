<?php 
  session_start();
  if (!isset($_SESSION['id_patient'])) {
    header('location:../index.php');
  }

    require_once "pdo.php";
     $repertoire="../assets/image_upload_patient//";
  $infos_connecte = $pdo->query('SELECT * FROM patient WHERE num_cni_patient="'.$_SESSION['id_patient'].'"');
  while ($row = $infos_connecte->fetch())
  {
      $_SESSION['nom'] = $row[0];
      $_SESSION['prenom'] = $row[1];
      $_SESSION['sexe'] = $row[2];
      $_SESSION['date_naiss'] = $row[3];
      $_SESSION['nation'] = $row[4];
      $_SESSION['gpe_sang'] = $row[5];
      $_SESSION['photo'] = $repertoire.$row[6];
      $_SESSION['tel_pat'] = $row[7];
      $_SESSION['email'] = $row[8];
      $_SESSION['domicile'] = $row[9];
      $_SESSION['profession'] = $row[10];
      $_SESSION['nom_t'] = $row[11];
      $_SESSION['tel_t'] = $row[12];
      $_SESSION['login'] = $row[14];
      $_SESSION['password'] = $row[15];
     // $_SESSION['nom'] = $row[0];
}
$infos_connecte->closeCursor();

    /*$matricule=$row['matricule_personnel'];
    $nom=$row['nom_personnel'];
    $prenom=$row['prenom_personnel'];
    $sexe=$row['sexe_personnel'];
    $fonction=$row['fonction_personnel'];
    $telephone=$row['telephone_personnel'];
    $email=$row['email_personnel'];
    $photo=$row['photo_personnel'];
  } 
  $infos_connecte->closeCursor();
  $_SESSION['nom']=$nom;
  $_SESSION['prenom']=$prenom;
  $_SESSION['sexe']=$sexe;
  $_SESSION['fonction']=$fonction;
  $_SESSION['telephone']=$telephone;
  $_SESSION['email']=$email;
  if (!empty($photo)) {
     $_SESSION['photo']=$photo;
  }
  else{
     $_SESSION['photo']="../assets/image/avatar.jpg";
  }
*/
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
                  <h6 class="m-0 font-weight-bold text-info">Indentité</h6>
                </div>
                <div class="card-body">
                  <div class="text-center">
                   <a href="<?php if(isset($_SESSION['photo'])){echo $_SESSION['photo'];} ?>"> <img class="rounded-circle shadow" style="width: 12rem; height: 12rem;border:1px solid lightblue" src="<?php if(isset($_SESSION['photo'])){echo $_SESSION['photo'];} ?>" alt=""></a>
                  </div>
                  <p>
                    <table style="width: 100%;">
                      <tr>
                        <td>Nom</td>
                        <td>:</td>
                        <td><?php echo $_SESSION['nom'];?></td>
                      </tr>
                      <tr>
                        <td>Prénom</td>
                        <td>:</td>
                        <td><?php echo $_SESSION['prenom'];?></td>
                      </tr>
                      <tr>
                        <td>Sexe</td>
                        <td>:</td>
                        <td><?php echo $_SESSION['sexe'];?></td>
                      </tr>
                      <tr>
                        <td>Date de Naissance</td>
                        <td>:</td>
                        <td><?php echo $_SESSION['date_naiss'];?></td>
                      </tr>
                      <tr>
                        <td>Nationalité</td>
                        <td>:</td>
                        <td>C<?php echo $_SESSION['nation'];?></td>
                      </tr>
                      <tr>
                        <td>Groupe Sanguin/ Rhésus</td>
                        <td>:</td>
                        <td><?php echo $_SESSION['gpe_sang'];?></td>
                      </tr>
                    </table>
                  </p>
                </div>
              </div>
              <a class="btn btn-info" style="text-align: center;color: white;">Modifier mes informations</a>
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
                        <td>Domicile</td>
                        <td>:</td>
                        <td><?php echo $_SESSION['domicile'];?></td>
                      </tr>
                      <tr>
                        <td>Profession</td>
                        <td>:</td>
                        <td><?php echo $_SESSION['profession'];?></td>
                      </tr>
                      <tr>
                        <td>Téléphone</td>
                        <td>:</td>
                        <td><?php echo $_SESSION['tel_pat'];?></td>
                      </tr>
                      <tr>
                        <td>Adresse email</td>
                        <td>:</td>
                        <td><?php echo $_SESSION['email'];?></td>
                      </tr>
                      <tr>
                        <td>Nom du tuteur</td>
                        <td>:</td>
                        <td><?php echo $_SESSION['nom_t'];?></td>
                      </tr>
                      <tr>
                        <td>Téléphone du tuteur</td>
                        <td>:</td>
                        <td><?php echo $_SESSION['tel_t'];?></td>
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
                        <td><?php echo $_SESSION['login'];?></td>
                      </tr>
                      <tr>
                        <td>Mot de Passe</td>
                        <td>:</td>
                        <td>********</td>
                      </tr>
                      <tr>
                        <td>Numéro CNI</td>
                        <td>:</td>
                        <td><?php echo $_SESSION['id_patient'];?></td>
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