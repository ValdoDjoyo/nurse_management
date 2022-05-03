<?php
	include('../pdo.php');
	$req=$pdo->prepare('DELETE FROM appartenir WHERE matricule_personnel =? AND id_service=?');
	$req->execute(array(
		$_GET['id'],
		$_GET['id_service'],
	)); 
	if ($req) {
		header('location:../details_service.php?id="'.$_GET['id_service'].'"&nom_service="'.$_GET['nom_service'].'"');
	}
	else
	{
		echo "Un probleme est survenue";
	}
?>