<?php 
	include('../pdo.php');
	$repertoire = "../../assets/image_upload/";
			//$photo = $_POST['photo'];
	if(isset($_FILES['photo'])) {
		 $fichier_temp = $_FILES['photo']['tmp_name'];
 		 $nom_fichier = $_FILES['photo']['name'];
 		 move_uploaded_file($_FILES['photo']['tmp_name'], $repertoire . $nom_fichier);
 		 $photo = $nom_fichier;
 		
 		 echo "le fichier est oploader";
 		 echo $photos;
 		 if (empty($photo)) {
 		 	$photo='avatar.jpg';
 		 }
	}
	else
	{
		 echo"erreur";
		$photo='avatar.jpg';
	}

	$ajout=$pdo->prepare("INSERT INTO `personnel` (`matricule_personnel`, `nom_personnel`, `prenom_personnel`, `sexe_personnel`, `fonction_personnel`, `telephone_personnel`, `email_personnel`, `photo_personnel`, `login`, `password`) VALUES (?,?,?,?,?,?,?,?,?,?)");
	$ajout->execute(array(
		$_POST['matricule'],
		$_POST['nom'],
		$_POST['prenom'],
		$_POST['sexe'],
		$_POST['fonction'],
		$_POST['telephone'],
		$_POST['email'],
		$photo,
		$_POST['login'],
		$_POST['password']
	));
	if ($ajout) {

		/*echo $_POST['matricule'];
		echo $_POST['nom'];
		echo $_POST['prenom'];
		echo $_POST['sexe'];
		echo $_POST['fonction'];
		echo $_POST['telephone'];
		echo $_POST['email'];
		echo $photo;
		echo $_POST['login'];
		echo $_POST['password'];*/
		header('location:../liste_personnel.php');
	}
	else{
		header('location:404.html');
	}
?>