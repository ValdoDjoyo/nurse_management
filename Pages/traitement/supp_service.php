<?php 
	include('../pdo.php');
	$id = $_GET['id'];

$del=$pdo->prepare("DELETE FROM appartenir WHERE id_service=? ");
	$del->execute(array($id));

	$del=$pdo->prepare("DELETE FROM service WHERE id_service=? ");
	$del->execute(array($id));
	if ($del) {
		header('location:../list_service.php');
	}
	else{
		header('location:../404.html');
	}

?>