<?php 
	session_start();
	include('../pdo.php');
	$req = $pdo->prepare("INSERT INTO `demande_cons` (`id_carnet`, `id_medecin`, `date_demande`, `etat`, `contenu`, `debut_symp`, `motif_demande`) VALUES (?,?,NOW(),?,?,?,?)");
	$req->execute(array(
		$_SESSION['id_patient'],
		$_POST['id_med'],
		'en cours',
		$_POST['contenu'],
		$_POST['debut_symp'],
		$_POST['motif'],
	));
if ($req) {
	header('location:../demande_en_cours.php');
}
else{
	header('location:../404.html');
}
?>