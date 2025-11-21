<?php
session_start();
include_once 'phpmailer/class.phpmailer.php';

//$bdd = new PDO('mysql:host=localhost;dbname=sav;charset=utf8', 'root', 'T9trXfww');
$bdd = new PDO('mysql:host=192.168.0.3;dbname=priximbattfr;charset=utf8;port=3306', 'priximbattfr', 'hu9wL5yB8YH4');

if($_GET['action']=="import") {
	
	
$reponse = $bdd->query('SELECT sav_utilisateur_id, sav_utilisateur_nom 
							FROM sav_utilisateur
                               WHERE sav_utilisateur_id<> 1 && sav_utilisateur_id<>17
							   ORDER BY RAND() LIMIT 1');
// On affiche le resultat
while ($donnees = $reponse->fetch())
{     
	$sav_intervenant = $donnees['sav_utilisateur_nom'];
	$sav_utilisateur_id = $donnees['sav_utilisateur_id'];
}
	
		
		$sql="INSERT INTO sav
		  SET 
		      sav_nom='".$_GET['nom_client']."',
			  sav_email='".$_GET['email_client']."',
			   sav_cde='".$_GET['num_commande']."',
			   sav_descriptif='IMPORT GESTAO',
			   sav_intervenant='".$sav_intervenant."',
			   sav_utilisateur_id='".$sav_utilisateur_id."',
			   sav_date='".date("Y-m-d")."'";
			   
	

		$bdd->exec($sql);

		$sav_id = $bdd->lastInsertId(); 

}	
?>
<!doctype html>
<html lang="fr">
<body>
</body>
</html>