<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>tst</title>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"> <!--declaration du fichier boostrap-->
	<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet"> 
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
								<strong style="color:black; font-size: 2.4em; text-align: center;font-family: 'Trebuchet MS','Times New Roman',serif;">Veuillez Enregistrer les Champs Suivants pour crée votre Carnet <br/>( C.M.I )</strong>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>
  <form action="action_page.php">
 	 	<div class="form-group">
		    <label for="Nom">Nom:</label>
		    <input type="text" class="form-control" id="Nom" required="required">
  	</div>
		<div class="form-group">
		    <label for="Prenom">Prenom:</label>
		    <input type="text" class="form-control" id="Prenom" required="required">
		</div>
    <div class="form-group">
        <label for="Date">Date de naissance:</label>
        <input type="date" class="form-control" id="Date_nais">
    </div>

    <div class="form-group">
      <label for="Domicile">domicile:</label>
      <input type="text" class="form-control" id="Domicile">
    </div>
  	<div class="form-group">
      <label for="Profession">:Profession</label>
      <input type="text" class="form-control" id="Profession">
    </div>
    <div class="form-group">
      <label for="contact">Contact:</label>
      <input type="tel" class="form-control" id="Numero de telephone" required="">
    </div>
    <div class="form-group">
      <label for="cni">Numero Cni:</label>
      <input type="tel" class="form-control" id="CNI" required>
    </div>
    <div class="form-group">
      <label for="email"> Votre Email :</label>
      <input type="email" class="form-control" id="Email" >
    </div>
    <div class="form-group">
      <label for="Tuteur ">Tuteur:</label>
      <input type="text" class="form-control" id="Personne à Prevenir ou Tuteur" required=>
    </div>
    <div class="form-group">
      <label for="contact">Contact Tuteur:</label>
      <input type="number" class="form-control" id="Numero_Tuteur " required>
    </div>
    <div class="form-group">
      <label for="email">Email Tuteur:</label>
      <input type="email" class="form-control" id="Email" >
    </div>
    <select>
      <optgroup>Masculin</optgroup>
       <optgroup>feminin</optgroup>
      
    </select>
    <label>
      <type=""> Masculin</label>
    <label><input type="checkbox"> Feminin</label>
    <button type="submit" class="btn btn-info">Valider</button>
  </form>
</body>
</html>