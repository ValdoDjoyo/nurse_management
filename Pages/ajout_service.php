<?php session_start();
if (!isset($_SESSION['matricule']) AND !isset($_SESSION['matricule_personnel'])) {
  header('location:../index.php');
}
?>

     <?php include('init/init.php');?>

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

       <?php include('init/head.php');?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
           <div class="d-sm-flex align-items-center justify-content-between mb-4">
             <h1 class="h3 mb-0 text-gray-800">Ajouter un service de l'hopital</h1>
           </div>
          <div class="contain">


            <?php 
            if (isset($_POST['service'])) {
               include('pdo.php');
              $add_serv=$pdo->prepare("INSERT INTO `service` (`designation_service`) VALUES (?)");
              $add_serv->execute(array($_POST['service']));
            } 
            ?>

            <form action="" method="post">
              <div class="row">
              <div class="col-lg-6 mb-4">
                <div class="card mb-4">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="service">Nom du service:</label>
                      <input type="text" onkeyup ="this.value=this.value.toUpperCase()" class="form-control" id="service" name="service">
                    </div>
                   
                   </div>
                </div>
              </div>
            <div class="form-group col-lg-6 mb-4">
                <input type="submit" class="form-control btn btn-info" value="Ajouter">
                <hr>
                 <a class="form-control btn btn-primary" href="list_service.php" style="text-align: center;color: white;">Consulter la liste des services</a>
            </div>
          </div>
            </form>
          </div>
        </div>

     <?php include('init/footer.php');?>