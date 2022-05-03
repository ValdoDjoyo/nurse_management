<?php 
session_start();
	include('../pdo.php');
	$photo='avatar.jpg';
if(isset($_SESSION['matricule_personnel'])){
	$identifiant=$_SESSION['matricule_personnel'];
}
elseif (isset($_SESSION['matricule'])) {
	$identifiant=$_SESSION['matricule'];
}

$repertoire = "../../assets/image_upload/";

	if(isset($_FILES['photo'])) {
		 $fichier_temp = $_FILES['photo']['tmp_name'];
 		 $nom_fichier = $_FILES['photo']['name'];
 		 move_uploaded_file($_FILES['photo']['tmp_name'], $repertoire . $nom_fichier);
 		 $photo = $nom_fichier;
 		
 		 echo "le fichier est oploader ";
 		 echo $photo."  ";

 		 if (empty($photo)) {
 		 	 echo"erreur";
		 	$photo=$_POST['ancien_photo'];
		 	echo $photo;
 		 }
	}
	

			//$photo = $_POST['photo'];
	
	$update=$pdo->prepare("UPDATE `personnel` SET `nom_personnel` = ?, `prenom_personnel` = ?, `telephone_personnel` = ?, `email_personnel` = ?, `photo_personnel` = ?, `login` = ?, `password` = ? WHERE `personnel`.`matricule_personnel` = ?;");
	$update->execute(array(
		$_POST['nom'],
		$_POST['prenom'],
		$_POST['telephone'],
		$_POST['email'],
				$photo,
		$_POST['login'],
		$_POST['mdp'],
		$identifiant
	));
	if ($update) {
		if (isset($_SESSION['matricule_personnel'])) {
			header('location:../dashboard_personnel.php');
		}
		elseif (isset($_SESSION['matricule'])) {
			header('location:../dashboard_admin.php');
		}
		
		}
	else{
		header('location:../404.html');
	}
	
?>