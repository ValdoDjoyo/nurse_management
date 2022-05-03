<?php
	//include('pdo.php');
	$req =$pdo->prepare('INSERT INTO appartenir(`id_service`, `matricule_personnel`) VALUES(?,?)');
	$req -> execute(array($_POST['id_service'], $_POST['matricule_personnel']));
	/*if ($req) {
		header('location:details_service.php?id="'.$_POST['id_service'].'"')
	}*/
 ?>