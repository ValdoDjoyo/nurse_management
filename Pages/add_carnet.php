<?php session_start();
if (!isset($_SESSION['matricule_personnel'])) {
  header('location:../index.php');
}
?>
     <?php include('init/init.php');?>


     <?php include('init/sidebar.php');?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

     <?php include('init/head.php');?>
        

        <!-- Begin Page Content -->
        <div class="container-fluid">
           <div class="d-sm-flex align-items-center justify-content-between mb-4">
             <h1 class="h3 mb-0 text-gray-800">Entrer les informations du patient</h1>
           </div>
          <div class="contain">
            <?php 

           include('pdo.php');
           if (isset($_POST['nom'])) {
            
             $repertoire = "../assets/image_upload_patient/";
      //$photo = $_POST['photo'];
            if(isset($_FILES['photo'])) {
               $fichier_temp = $_FILES['photo']['tmp_name'];
               $nom_fichier = $_FILES['photo']['name'];
               move_uploaded_file($_FILES['photo']['tmp_name'], $repertoire . $nom_fichier);
               $photo = $nom_fichier;
               echo "le fichier est oploader";
               echo $photo;
               if (empty($photo)) {
                 $photo="avatar.jpg";
               }
            }
               

                $insere=$pdo->prepare("INSERT INTO `patient` (`nom_patient`, `prenom_patient`, `sexe_patient`, `date_naissance_patient`, `nationalite_patient`, `groupe_sanguin_patient`, `photo_patient`, `numtel_patient`, `email_patient`, `domicile_patient`, `profession_patient`, `nom_tuteur_patient`, `num_tel_tuteur_patient`, `num_cni_patient`, `login`, `password`) VALUES (?,?,?,?,?, ?,?,?,?,?,?,?,?,?,?,?)");
                $insere->execute(array(
                    $_POST['nom'],
                    $_POST['prenom'],
                    $_POST['sexe'],
                    $_POST['date_naissance'],
                    $_POST['pays'],
                    $_POST['groupe_sanguin'],
                    $photo,
                    $_POST['tel'],
                    $_POST['email'],
                    $_POST['domicile'],
                    $_POST['profession'],
                    $_POST['nom_tuteur'],
                    $_POST['cni_tuteur'],
                    $_POST['num_cni'],
                    $_POST['login'],
                    $_POST['password'],
                ));
                if ($insere) {
                // header('location:liste_carnet.php');
                   echo "AJOUT REUSSI";
                }
                else{
                  echo "Un probleme est survenu";
                }
              }
            ?>
            <form action="" method="post" enctype="multipart/form-data">
              <div class="row">
              <div class="col-lg-6 mb-4">
                <div class="card mb-4">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="Nom">Nom:</label>
                      <input type="text" class="form-control" onkeyup ="this.value=this.value.toUpperCase()" id="Nom" name="nom" required>
                     </div>
                     <div class="form-group">
                        <label for="Prenom">Prenom:</label>
                        <input type="text" class="form-control" onkeyup ="this.value=this.value.toUpperCase()" id="Prenom" name="prenom">
                     </div>
                     <div class="form-group">
                        <label for="date">Date de naissance:</label>
                        <input type="date" class="form-control" id="date" name="date_naissance" required>
                     </div>
                     <div class="form-group">
                        <label for="sexe">Sexe:</label>
                        <select class="form-control" id="sexe" name="sexe">
                          <option value="Masculin">Masculin</option>
                          <option value="Feminin">Feminin</option>
                        </select>
                     </div>
                    <div class="form-group">
                      <?php include('api/liste_pays.php') ?>
                    </div>
                    <div class="form-group">
                        <label for="grp">Groupe sanguin / Rhesus:</label>
                        <select class="form-control" id="grp" name="groupe_sanguin">
                          <option value="A-">A-</option>
                          <option value="A+">A+</option>
                          <option value="B-">B-</option>
                          <option value="B+">B+</option>
                          <option value="AB-">AB-</option>
                          <option value="AB+">AB+</option>
                          <option value="O-">O-</option>
                          <option value="O+">O+</option>
                        </select>
                     </div>
                      <div class="form-group">
                      <label for="Matricule">Numero de CNI ou autre identifiant:</label>
                      <input type="number" class="form-control" id="num_cni" name="num_cni" required >
                    </div>
                     <div class="form-group">
                        <label for="photo">Photo:</label>
                        <input type="file" class="form-control" id="photo" name="photo">
                     </div>
                   </div>
                </div>
              </div>

               <div class="col-lg-6 mb-4">
                <div class="card mb-4">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="tel">Telephone:</label>
                      <input type="text" class="form-control" id="tel" required  name="tel">
                     </div>
                     <div class="form-group">
                        <label for="email">Adresse email:</label>
                        <input type="email" class="form-control" id="email"  name="email">
                     </div>
                     <div class="form-group">
                        <label for="Domicile">Domicile</label>
                        <input type="text" class="form-control" onkeyup ="this.value=this.value.toUpperCase()" name="domicile" id="Domicile" >
                     </div>
                     <div class="form-group">
                        <label for="Profession">Profession:</label>
                        <input type="text" class="form-control" onkeyup ="this.value=this.value.toUpperCase()" id="Profession"  name="profession">
                     </div>
                     <div class="form-group">
                      <label for="nom_tuteur">Nom tuteur:</label>
                      <input type="text" class="form-control" onkeyup ="this.value=this.value.toUpperCase()" id="nom_tuteur" name="nom_tuteur">
                    </div>
                     <div class="form-group">
                      <label for="cni_tuteur">Numero CNI ou ID du tuteur:</label>
                      <input type="text" class="form-control" id="cni_tuteur" name="cni_tuteur">
                    </div>
                     <div class="form-group">
                        <label for="identifiant">login:</label>
                        <input type="text" class="form-control" id="identifiant" name="login" required>
                     </div>
                      <div class="form-group">
                        <label for="mdp">Mot de passe:</label>
                        <input type="password" class="form-control" id="mdp"  name="password" required>
                     </div>
                   </div>
                </div>
              </div>
            </div>

            <div class="form-group">
                <input type="submit" class="form-control btn btn-success" value="Enregistrer le carnet"> 
            </div>
            <a class="form-control btn btn-danger" href="dashboard_admin.php" style="text-align: center;color: white;">Annuler</a>
            </form>
          </div>
        </div>

     <?php include('init/footer.php');?>
     