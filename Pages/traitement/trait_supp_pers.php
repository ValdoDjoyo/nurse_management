<?php 
	include('../pdo.php');
	$id = $_GET['id'];

	$req=$pdo->prepare("DELETE FROM appartenir WHERE matricule_personnel = ? ");
	$req->execute(array($id));

	$req=$pdo->prepare("DELETE FROM personnel WHERE matricule_personnel = ? ");
	$req->execute(array($id));
	if ($req) {
		header('location:../liste_personnel.php');
		echo $id;
	}
	else{
		header('location:../404.html');
	}
?>