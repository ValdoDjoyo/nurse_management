<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Mot de passe oublier</title>

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


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

   
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <br>
           <?php  
      include('pdo.php');
      if (isset($_POST['submit'])) {
        if ($_GET['type']=0) {
        $req = $pdo->query("SELECT * FROM personnel WHERE login='".$_POST['id']."'");
        $nb=$req->rowCount();
        if ($nb<1) {
          echo "Cet identifiant n'existe pas!";
        }
        else{
          $req1 = $pdo->query("SELECT * FROM personnel WHERE login='".$_POST['id']."' AND telephone_personnel='".$_POST['tel']."'");
          $nb1=$req1->rowCount();
          if ($nb1=0) {
            echo "le numero de telephone ne correspond pas!";
          }
          else{
            if ($_POST['mdp'] != $_POST['mdp_conf']) {
              echo "les mot de passes ne correspondent pas";
            }
            else{
              $req3=$pdo->query("UPDATE personnel set personnel.password='".$_POST['mdp']."' WHERE login='".$_POST['id']."' AND telephone_personnel='".$_POST['tel']."' ");
              if (!$req3) {
                echo "une erreur est survenu veuillez reessayer";
              }
              else{
                echo" <script> alert('Mot de passe renitialiser avec succes!'); </script>";
               header('location:../index.php');
              }
            }
          }
        }
      }
      else{
        $req = $pdo->query("SELECT * FROM compte WHERE login='".$_POST['id']."'");
        $nb=$req->rowCount();
        if ($nb<1) {
          echo "Cet identifiant n'existe pas!";
        }
        else{
          $req1 = $pdo->query("SELECT * FROM compte WHERE login='".$_POST['id']."' AND matricule_personnel='".$_POST['tel']."'");
          $nb1=$req1->rowCount();
          if ($nb1=0) {
            echo "le matricule ne correspond pas!";
          }
          else{
            if ($_POST['mdp'] != $_POST['mdp_conf']) {
              echo "les mot de passes ne correspondent pas";
            }
            else{
              $req3=$pdo->query("UPDATE compte set compte.password='".$_POST['mdp']."' WHERE login='".$_POST['id']."' AND matricule_personnel='".$_POST['tel']."' ");
              if (!$req3) {
                echo "une erreur est survenu veuillez reessayer";
              }
              else{
                echo" <script> alert('Mot de passe renitialiser avec succes!'); </script>";
               header('location:../index.php');
              }
            }
          }
        }
      }
    }
    ?>

           <div class="card shadow mb-4" style="margin-top: 5%;width: 400px;margin:auto;">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-info">Remplir les champs çi-dessous pour recuperer le mot de passe</h6>
              </div>
              <div class="card-body">
              <form method="post">
               
                 <div class="form-group">
                    <label for="id">Entrer votre identifiant</label>
                    <input type="text" class="form-control" name="id" required="">
                  </div>
                   <div class="form-group">
                    <label for="tel"><?php if ($GET['type']=2) { echo "Entrer votre matricule";} else{echo "Entrer votre numero de telephone";} ?></label>
                    <input type="text" class="form-control" name="tel" required="">
                  </div>
                   <div class="form-group">
                    <label for="tel">Entrer Entrer le nouveau mot de passe</label>
                    <input type="password" class="form-control" name="mdp" required="">
                  </div>
                   <div class="form-group">
                    <label for="tel">Confirmer votre mot de passe</label>
                    <input type="password" class="form-control" name="mdp_conf" required="">
                  </div>
                  <input type="submit" class="btn btn-primary" name="submit">
                  <a href="../index.php" class="btn btn-danger">Annuler</a>
              </form>
              </div>
            </div>  
        </div>

        </div>
      </div>
    </div>
  </body>
</html>
      <!-- End of Main Content -->

