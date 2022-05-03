<?php 
include("../pdo.php");
session_start();
	    if(isset($_POST['password']))
	    {
	        $mdp = $_POST['password'];
	        $categorie = 0;
	   			$req = $pdo->query("SELECT * FROM compte WHERE password='".$mdp."' AND type_compte='".$categorie."' ");
	          	$nb = $req->rowCount();
	          	if ($req) {
		            $_SESSION['categorie'] = $categorie;
		            $_SESSION['login'] = "NULL";
		            $_SESSION['mdp'] = $mdp;
		            $id = $pdo->query('SELECT matricule_personnel FROM compte WHERE password="'.$mdp.'" AND type_compte="'.$categorie.'"');
					while ($row = $id->fetch())
					{
						$matricule=$row['matricule_personnel'];
					} 
					$id->closeCursor();
					$_SESSION['matricule'] = $matricule;
						header("location:../dashboard_admin.php");
					}
				else
				{
					$msg = "Une de vos coordonnées est incorrecte ! Vérifiez et réessayer";
					echo $mdp;
					echo $nb;
					//header("location:../../index.php?msg='".$msg."'");
				}
		}
	  else
        {
            header("location:../../index.php");
        }
?>