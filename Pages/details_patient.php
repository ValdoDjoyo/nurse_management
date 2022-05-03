<?php 
session_start();
    include('pdo.php');
    $repertoire="../assets/image_upload_patient//";
    $req = $pdo->query("SELECT * FROM patient WHERE num_cni_patient = '".$_GET['id']."'");
    while ($row = $req->fetch()) {
       $nom = $row[0];
      $prenom = $row[1];
      $sexe = $row[2];
      $date_naiss = $row[3];
      $nation = $row[4];
      $gpe_sang = $row[5];
      $photo = $repertoire.$row[6];
      $tel_pat = $row[7];
      $email = $row[8];
      $domicile = $row[9];
      $profession = $row[10];
      $nom_t = $row[11];
      $tel_t = $row[12];
    
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

  <title>details du patient</title>

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

   <?php include ('init/sidebar.php');?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

    <?php include('init/head.php'); ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Fiche signaletique du patient <span style="font-weight: bold;"><?php echo $nom." ".$prenom; ?></span></h1>
            <a href="liste_carnet.php">Retour à la liste des patients</a>
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
                   <a href="<?php if(isset($photo)){echo $photo;} ?>"> <img class="rounded-circle shadow" style="width: 12rem; height: 12rem;border:1px solid lightblue" src="<?php if(isset($photo)){echo $photo;} ?>" alt=""></a>
                  </div>
                  <p>
                    <table style="width: 100%;">
                      <tr>
                        <td>Nom</td>
                        <td>:</td>
                        <td style="font-weight: bold;"><?php echo $nom;?></td>
                      </tr>
                      <tr>
                        <td>Prénom</td>
                        <td>:</td>
                        <td style="font-weight: bold;" ><?php echo $prenom;?></td>
                      </tr>
                      <tr>
                        <td>Sexe</td>
                        <td>:</td>
                        <td style="font-weight: bold;" ><?php echo $sexe;?></td>
                      </tr>
                      <tr>
                        <td>Date de Naissance</td>
                        <td>:</td>
                        <td style="font-weight: bold;" ><?php echo $date_naiss;?></td>
                      </tr>
                      <tr>
                        <td>Nationalité</td>
                        <td>:</td>
                        <td style="font-weight: bold;" >C<?php echo $nation;?></td>
                      </tr>
                      <tr>
                        <td>Groupe Sanguin/ Rhésus</td>
                        <td>:</td>
                        <td style="font-weight: bold;" ><?php echo $gpe_sang;?></td>
                      </tr>
                    </table>
                  </p>
                </div>
              </div>
            
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
                        <td style="font-weight: bold;" ><?php echo $domicile;?></td>
                      </tr>
                      <tr>
                        <td>Profession</td>
                        <td>:</td>
                        <td style="font-weight: bold;" ><?php echo $profession;?></td>
                      </tr>
                      <tr>
                        <td>Téléphone</td>
                        <td>:</td>
                        <td style="font-weight: bold;" ><?php echo $tel_pat;?></td>
                      </tr>
                      <tr>
                        <td>Adresse email</td>
                        <td>:</td>
                        <td style="font-weight: bold;" ><?php echo $email;?></td>
                      </tr>
                      <tr>
                        <td>Nom du tuteur</td>
                        <td>:</td>
                        <td style="font-weight: bold;" ><?php echo $nom_t;?></td>
                      </tr>
                      <tr>
                        <td>Téléphone du tuteur</td>
                        <td>:</td>
                        <td style="font-weight: bold;" ><?php echo $tel_t;?></td>
                      </tr>
                    </table>
                  </p>
                </div>
              </div>
              <a class="btn btn-primary" href="liste_carnet.php">Commencer la consultation</a>
        
            </div>
          </div>
      </div>
      <!-- End of Main Content -->

     <?php include('init/footer.php'); ?>