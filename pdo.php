<?php $dbname='id15154957_cmibd';
	$user='id15154957_braincode';
	$password=')P]g{}Mg1]x^6pp<';
	$url='localhost';
	$port=3306;
	try
	{
		$pdo = new PDO ('mysql:host='.$url.';port='.$port.';dbname='.$dbname,$user,$password);
	}
	catch (Exception $e)
	{
		die('Erreur : ' . $e->getMessage());
	}
?>