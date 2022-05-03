<?php
	$dbname='cmibd';
	$user='root';
	$password='';
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