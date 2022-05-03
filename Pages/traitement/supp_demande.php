<?php
	include ('../pdo.php');
	$id = $_GET['id'];

$del=$pdo->prepare("DELETE FROM demande_cons WHERE id_service=? ");
	$del->execute(array($id));
	if ($del) {
		header('location:../demande_en_cours.php');
	}
	else{
		header('location:../404.html');
	}

?>