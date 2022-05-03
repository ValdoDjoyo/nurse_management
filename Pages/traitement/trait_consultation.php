<?php 
	include ('../pdo.php');
	$req =$pdo->prepare("INSERT INTO `consultation` (`id_demande`, `diagnostic`, `ordonnance`, `examen`, `date_cons`, `date_rendezvous`) VALUES (?,?,?,?,NOW(),?)");
	$req->execute(array(
		$_GET['id'],
		$_POST['diagnostic'],
		$_POST['ordonnance'],
		$_POST['examen'],
		$_POST['date_rend']
	));
	if ($req) {
		header('location:../liste_demande.php');
		$req1 = $pdo->prepare("UPDATE `demande_cons` SET `etat` = 'effectuer' WHERE `id_demande` = ?;");
		$req1->execute(array($_GET['id']));
	}
?>