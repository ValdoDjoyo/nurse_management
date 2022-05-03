<?php 
       	session_start();
		$msg = "";
        require_once "Pages/pdo.php";
	    if(isset($_POST['submit']))
	    {
	        $login = $_POST['login'];
	        $mdp = $_POST['password'];
	        $categorie = $_POST['categorie'];
	   		if($categorie!=1)
	   		{
	   			$req = $pdo->prepare("SELECT * FROM Personnel WHERE login=? AND password=?");
	          	$req->execute(array($login,$mdp));
	          	$nb = $req->rowCount();
	          	if ($nb == 1) {
		            $_SESSION['categorie'] = $categorie;
		            $_SESSION['login'] = $login;
		            $_SESSION['mdp'] = $mdp;
		            $id = $pdo->query('SELECT matricule_personnel FROM Personnel WHERE login="'.$login.'" AND password="'.$mdp.'"');
					while ($row = $id->fetch())
					{
						$matricule=$row['matricule_personnel'];
					} 
					$id->closeCursor();
					$_SESSION['matricule_personnel'] = $matricule;
					
						header("location:Pages/dashboard_personnel.php");
	            }else
	            {
	                $msg = "Une de vos coordonnées est incorrecte ! Vérifiez et réessayer";
	            }
	   		}
          	else
	   		{
	   			$req = $pdo->prepare("SELECT * FROM patient WHERE login=? AND password=? ");
	          	$req->execute(array($login,$mdp));
	          	$nb = $req->rowCount();
	          	if ($nb >= 1) {
		            $_SESSION['categorie'] = $categorie;
		            $_SESSION['login'] = $login;
		            $_SESSION['mdp'] = $mdp;
		            $id = $pdo->query('SELECT num_cni_patient FROM patient WHERE login="'.$login.'" AND password="'.$mdp.'"');
					while ($row = $id->fetch())
					{
						$matricule=$row['num_cni_patient'];
					} 
					$id->closeCursor();
					$_SESSION['id_patient'] = $matricule;
					header("location:Pages/dashboard_patient.php");
	            }else
	            {
	                $msg = "Login ou mot de passe incorrect ! Vérifiez et réessayer";
	            }
	   		}
      }
      else{
      		if (isset($_SESSION['matricule']) || isset($_SESSION['matricule_personnel']) || isset($_SESSION['id_patient'])) {
      			session_destroy();
      		}
      }
?>
<!DOCTYPE html>
<html>
<head>
	<title>CMI</title>
	 <meta charset="utf-8">
	 <meta name="viewport" content="width=device-width, initialscale=1.0"><!--Cette ligne concerne uniquement les mobiles. On demande que l'affichage occupe tout l'espace disponible avec une taille de 1-->

	 <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"> <!--declaration du fichier boostrap-->
	 <link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet"> 
	  <script type="text/javascript" src="bootstrap/js/jquery-1.10.2.min.js"></script>
	   <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	   <link href="css/sb-admin-2.min.css" rel="stylesheet">
	  <link href="f1.css" rel="stylesheet">
<script type="text/javascript">
	ok=function(){
		nbr=document.getElementByName('categorie').value;
		return nbr;
	}
</script>
	  <style type="text/css">
	  	body
	  	{
	  		/*background-image: url("assets/image/fond2.jpg");
	  		background-position: 150px 50px;
	  		background-repeat: no-repeat;*/
	  	}
	  </style>

</head>
<body>
	<div class="container-fluid">
		<header>
			<div class="row" style=" margin: auto;">
				<div class="col-lg-12">
					<div class="navbar" style="background-color: rgba(149, 216, 244, 0.847656);">
						<div class= "row">
							<div class="col-lg-offset-1 col-lg-1 col-xs-2 col-sm-1">
								<div class="navbar-header">
									<img src="assets/image/logo.png" alt="logo" style="height: 90px; padding-top: 10px;" />
								</div>
							</div>
							<div class="col-lg-9 col-sm-10 col-xs-9" style="text-align: center;">
								<strong style="color:black; font-size: 2.4em; text-align: center;font-family: 'Trebuchet MS','Times New Roman',serif;">Bienvenue dans la page d'Accueil du Carnet Médical Informatisé <br/>( C.M.I )</strong>

							</div>
							
						</div>
						
					</div>
				</div>
			</div>
			
		</header><br>

							<!-- Button trigger modal -->
							<button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModal">
							  Administrateur
							</button>

							<!-- Modal -->
							<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title" id="exampleModalLabel">Authentification</h5>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							       <form action="Pages/traitement/trait_auth_admin.php" method="POST">
							      		<div class="modal-body">
				                            
				                            <div class="form-group">
				                              <label for="message-text" class="col-form-label">Mot de passe:</label>
				                              <input type="password" class="form-control" name="password">
				                              <a class="pull-left" href="Pages/reset_password.php?type=2">mot de passe oublier?</a>
				                            </div>
							     		</div>
									     <div class="modal-footer">
									        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
									        <button type="submit" class="btn btn-primary">Valider</button>
									     </div>
							       </form> 
							    </div>
							  </div>
							</div>

		<div class="row">
			<form method="POST" class="col-lg-offset-3 col-lg-6 col-lg-offset-3">
				<div class="row">
					<div class="col-xs-offset-5 col-xs-2 col-xs-offset-5">
						<img src="assets/image/connexion.png" alt="image connexion" width="100px" height="100px" style="margin-left: -10%;">
					</div>
				</div>
				<legend style="text-align: center;font-size: 2.1em;font-family: 'Times New Roman',Arial,serif; font-weight: bold;">Formulaire de Connexion</legend>
				<div class="form-group">
					<label for="categorie">Type de compte: </label>
					<select id="categorie" class="form-control" name="categorie">
						
						<option value="0">Personnel medical</option>
						<option value="1">Patient</option>
					</select>
				</div>
				<div class="form-group">
					<label for="login">Identifiant : </label>
					<input id="login" type="text" name="login" class="form-control" required/>
				</div>
				<div class="form-group">
					<label for="password">Mot de passe : </label>
					<input id="password" type="password" name="password" class="form-control" required/>
				</div>
				<div class="row">
					<div class="col-xs-8" style="color:red; font-family: 'Times New Roman',Arial,serif; font-size: 1.3em;">
						<?php if(isset($_GET['msg'])){echo $_GET['msg'];} ?>
						<?php if(isset($msg)){echo $msg;} ?>
						
						<a class="pull-left" href="Pages/reset_password.php">mot de passe oublier?</a>
					</div>

					<div class="col-xs-offset-1 col-xs-3">

						<input class="btn btn-success pull-right" type="submit" name="submit" value="Connexion" style="height: 40px;"/>

					</div>
				</div><br/>
			</form>
		</div><br>
		

	<footer style="background-color: rgba(149, 216, 244, 0.847656);padding: 25px;">
	        <div class="row">
	            <div class="col-sm-4">
	                    <h2>A propos</h2>
	                    <p><span class="glyphicon glyphicon-home"></span>&nbsp Carnet Médical Informatisé</p>
	                    <p><span class="glyphicon glyphicon-home"></span> &nbsp CMI </p> 
	                    <p><span class="glyphicon glyphicon-home"></span> &nbsp Version 1.0.1 </p> 
	                    <p><span class="glyphicon glyphicon-home"></span> &nbsp Année 2020-2021 </p>  
	            </div>
	            <div class="col-sm-4" >
	                    <h2>Site web rattachés</h2>
	                    <a href="#">Minsante</a><br/>
	                    <a href="#">Sante Pblique CMR </a><br/>
	                    <a href="#">IUT en ligne</a><br/>
	            </div>
	            <div class="col-sm-4 pull-right">
	                    <h2>Contacts</h2>
	                    <p><span class="glyphicon glyphicon-phone"></span>&nbsp Téléphone :(+237) 696 023 434/ 695 786 032  </p>
	                    <p><span class="glyphicon glyphicon-envelope"></span>&nbsp Mail: <a href="mailto: abessangel@gmail.com, onereejoel@gmail.com">Developpeurs</a></p>
	            </div>
	        </div>
	        <div class="row" style="text-align: center;">
	        	<div class="col-sm-12">
	                Copyright &copy 2021 <a href="#">CMI</a>
	            </div>
	        </div>
		</footer> 



	
  		  <!-- Bootstrap core JavaScript-->
  <script src="Pages/vendor/jquery/jquery.min.js"></script>
  <script src="Pages/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="Pages/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="Pages/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="Pages/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="Pages/js/demo/chart-area-demo.js"></script>
  <script src="Pages/js/demo/chart-pie-demo.js"></script>

</body>
</html