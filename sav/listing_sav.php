<?php
include_once 'include/main.inc.php';
include_once 'phpmailer/class.phpmailer.php';
//$bdd = new PDO('mysql:host=localhost;dbname=sav;charset=utf8', 'root', 'T9trXfww');
$bdd = new PDO('mysql:host=192.168.0.3;dbname=priximbattfr;charset=utf8;port=3306', 'priximbattfr', 'hu9wL5yB8YH4');

if($_POST['filtre_sav_utilisateur_id']<>''){
	$_SESSION['filtre_sav_utilisateur_id'] = $_POST['filtre_sav_utilisateur_id'];
}else{
	  $_SESSION['filtre_sav_utilisateur_id'] = $_SESSION['user']['sav_utilisateur_id'];
}


$nbrep = 1; //Nombre de repertoire photos
$nbimg = 5; //Nombre de repertoire photos
$extensions_ok = array("jpg","gif","png","jpeg");
$target1     = "./doc/";  // Repertoire cible
$aspect1=1;

$targetoriginal     = "./doc/";  // Repertoire cible



if($_POST['sav_prise_en_charge']<>'') {
	$sql="UPDATE sav
		  SET 
		      sav_prise_en_charge='".$_POST['sav_prise_en_charge']."'
			  WHERE sav_id='".$_POST['sav_id']."'";
	$bdd->exec($sql);	

}

if($_POST['sav_numero']<>'') {
	$sql="UPDATE sav
		  SET 
		      sav_numero='".$_POST['sav_numero']."'
			  WHERE sav_id='".$_POST['sav_id']."'";
	$bdd->exec($sql);	

}


if($_GET['action']=='debuter') {
	$sql="UPDATE sav
		  SET 
		      sav_date_etat='".date('Y-m-d')."',
			  sav_etat='Lancé'
			  WHERE sav_id='".$_GET['sav_id']."'";
	$bdd->exec($sql);	

}

if($_GET['action']=='cloturer') {
	$sql="UPDATE sav
		  SET 
		      sav_date_cloture='".date('Y-m-d')."',
			  sav_etat='Clôturé'
			  WHERE sav_id='".$_GET['sav_id']."'";
	$bdd->exec($sql);	

}
if ($_POST['BENVOYERHISTO']) {
	
	
		$sql='UPDATE sav
		  SET 
		      sav_historique="'.$_POST['sav_historique'].'"
			   WHERE sav_id="'.$_POST['sav_id'].'"';
		$bdd->exec($sql);

		//$sav_id = $bdd->lastInsertId(); 
}


if ($_POST['BENVOYERIMG']) {
	
	
	
//---------------------------
//  SCRIPT D'UPLOAD
//---------------------------

// On vérifie si le champ est rempli
for ($j=1; $j <=$nbimg;$j++)
{
	$img="sav_fichier".$j;
	//------------------------------------------------------------
	//  DEFINITION DES VARIABLES LIEES AU FICHIER
	//------------------------------------------------------------

	$nom_file   = $_FILES[$img]['name'];
	$taille     = $_FILES[$img]['size'];
	$tmp        = $_FILES[$img]['tmp_name'];
	$chemin     = $target.$_FILES[$img]['name'];
	
	$extension  = substr($nom_file,-3); // Récupération de l'extension 
	$extension2  = substr($nom_file,-4); // Récupération de l'extension 
	
	$in = array('\\',' ', 'à','á','â','ã','ä','ç','è','é','ê','ë','ì','í','î','ï','ñ','ò','ó','ô','õ','ö','ù','ú','û','ü','ý','ÿ','À','Á','Â','Ã','Ä','Ç','È','É','Ê','Ë','Ì','Í','Î','Ï','Ñ','Ò','Ó','Ô','Õ','Ö','Ù','Ú','Û','Ü','Ý', '€', '&', ';', ',', '\'');
	$out = array('','-','a','a','a','a','a','c','e','e','e','e','i','i','i','i','n','o','o','o','o','o','u','u','u','u','y','y','A','A','A','A','A','C','E','E','E','E','I','I','I','I','N','O','O','O','O','O','U','U','U','U','Y', 'euros', '','', '', '');
	if($nom_file)
    { 
		$nom_file2 = ereg_replace($extension2,'',$nom_file);
		$nom_file2 .= "-".$sav_id.$extension2;
		$nom_traite = str_replace($in, $out, basename($nom_file2));
	
		
	
	}
  if($nom_file)
  { 
     // On vérifie l'extension du fichier

    if(in_array(strtolower($extension),$extensions_ok))
    {
       // On récupère les dimensions du fichier

        $infos_img = getimagesize($_FILES[$img]['tmp_name']);
	    

		
		
	for ($i=1; $i <=$nbrep;$i++)
	{
		
		
		//on vérifies que le champ est bien rempli:
		if(!empty($_FILES[$img]['name']))
		{
			if(copy($tmp, $targetoriginal.$nom_traite)) {
						
			
			}
		}	
	}
		// On vérifie les dimensions et taille de l'image

              
			 
			  
			
			$sql="UPDATE sav
		  SET 
		      sav_fichier".$j."='".$nom_traite."'
			  WHERE sav_id='".$_POST['sav_id']."'";
		$bdd->exec($sql);
			  
			  
    }
      else
    {
      // Sinon on affiche une erreur pour l'extension
        echo '<p>Votre image ne comporte pas une extension valide !</p>';
        
    }
   }
    else
   {

    // Sinon on affiche une erreur pour le champ vide
    //echo '<p>Le champ du formulaire est vide !</p>';
   }
}
}	


if ($_POST['BENVOYER']) {
	
	
		$sql="INSERT INTO sav
		  SET 
		      sav_nom='".$_POST['sav_nom']."',
			  sav_email='".$_POST['sav_email']."',
			   sav_cde='".$_POST['sav_cde']."',
			   sav_descriptif='".$_POST['sav_descriptif']."',
			   sav_intervenant='".$_SESSION['user']['sav_utilisateur_nom']."',
			    sav_date='".date("Y-m-d")."'";
		$bdd->exec($sql);
		
		$sav_id = $bdd->lastInsertId(); 
	
//---------------------------
//  SCRIPT D'UPLOAD
//---------------------------

// On vérifie si le champ est rempli
for ($j=1; $j <=$nbimg;$j++)
{
	$img="sav_fichier".$j;
	//------------------------------------------------------------
	//  DEFINITION DES VARIABLES LIEES AU FICHIER
	//------------------------------------------------------------

	$nom_file   = $_FILES[$img]['name'];
	$taille     = $_FILES[$img]['size'];
	$tmp        = $_FILES[$img]['tmp_name'];
	$chemin     = $target.$_FILES[$img]['name'];
	
	$extension  = substr($nom_file,-3); // Récupération de l'extension 
	$extension2  = substr($nom_file,-4); // Récupération de l'extension 
	
	$in = array('\\',' ', 'à','á','â','ã','ä','ç','è','é','ê','ë','ì','í','î','ï','ñ','ò','ó','ô','õ','ö','ù','ú','û','ü','ý','ÿ','À','Á','Â','Ã','Ä','Ç','È','É','Ê','Ë','Ì','Í','Î','Ï','Ñ','Ò','Ó','Ô','Õ','Ö','Ù','Ú','Û','Ü','Ý', '€', '&', ';', ',', '\'');
	$out = array('','-','a','a','a','a','a','c','e','e','e','e','i','i','i','i','n','o','o','o','o','o','u','u','u','u','y','y','A','A','A','A','A','C','E','E','E','E','I','I','I','I','N','O','O','O','O','O','U','U','U','U','Y', 'euros', '','', '', '');
	if($nom_file)
    { 
		$nom_file2 = ereg_replace($extension2,'',$nom_file);
		$nom_file2 .= "-".$sav_id.$extension2;
		$nom_traite = str_replace($in, $out, basename($nom_file2));
	
		
	
	}
  if($nom_file)
  { 
     // On vérifie l'extension du fichier

    if(in_array(strtolower($extension),$extensions_ok))
    {
       // On récupère les dimensions du fichier

        $infos_img = getimagesize($_FILES[$img]['tmp_name']);
	    

		
		
	for ($i=1; $i <=$nbrep;$i++)
	{
		
		
		//on vérifies que le champ est bien rempli:
		if(!empty($_FILES[$img]['name']))
		{
			if(copy($tmp, $targetoriginal.$nom_traite)) {
						
			
			}
		}	
	}
		// On vérifie les dimensions et taille de l'image

              
			 
			  
			
			$sql="UPDATE sav
		  SET 
		      sav_fichier".$j."='".$nom_traite."'
			  WHERE sav_id='".$sav_id."'";
		$bdd->exec($sql);
			  
			  
    }
      else
    {
      // Sinon on affiche une erreur pour l'extension
        echo '<p>Votre image ne comporte pas une extension valide !</p>';
        
    }
   }
    else
   {

    // Sinon on affiche une erreur pour le champ vide
    //echo '<p>Le champ du formulaire est vide !</p>';
   }
}	


/**
	 * On envoie l'email
	 */
	$sujet = 'Un nouveau SAV a été déclaré';
	$exp=$_POST['sav_email'];
	$message ="";
	$message .= "Société : ".$_POST['avis_contact_societe']."\nNom : ".$_POST['avis_contact_nom']."\nPrénom : ".$_POST['avis_contact_prenom']."\n";
	$message .= "\nAdresse : \n".$_POST['avis_contact_adresse']."\n".$_POST['avis_contact_cp']."    ".$_POST['avis_contact_ville']."      ".$_POST['avis_contact_pays']."\n\n";
	$message .= "Tel : ".$_POST['avis_contact_telephone']."\nEmail : ".$_POST['avis_contact_email']."\n";
	$message .= "\nMessage :\n ".$commentaires;
	$mail = new PHPmailer();
	//$mail->IsSMTP();
	$mail->IsMail();
	$mail->IsHTML(true);

	$mail->From=$exp;
	$mail->FromName=$_POST['sav_nom'];
	$mail->AddAddress("wm.priximbattable@gmail.com");
	$mail->AddAddress("sav@priximbattable.net");
	$mail->AddReplyTo("sav@priximbattable.net");	
	$mail->Subject=$sujet;
	$mail->Body=$message;		
			

	if(!$mail->Send()){
		 echo $mail->ErrorInfo; 
	}
	$mail->SmtpClose();
	unset($mail);
	
	//mail("2ae.infos@gmail.com", $sujet, $message,"From: $exp");
	mail("wm.priximbattable@gmail.com", $sujet, $message,"From: $exp");

}
?>
<!doctype html>
<html lang="fr">
<head>
<meta charset="utf-8">
<style>
	body{
		padding:0px;
	}
	.titre{
		padding:10px;
		background-color:red; color:#FFF; font-family:Arial;font-size:17p;text-transform:uppercase;
	}
	
	.cloture{
		background-color:#73df65; color:#000;
	}
	.demarre{
		background-color:#74d2f1; color:#000;
	}
	.retard{
		background-color:red; color:#FFF;
	}
	</style>
<body>
<a href="listing_sav.php">Gestion des SAV</a> - <a href="listing_rappels.php">Gestion des rappels</a>
<h1 class="titre">GESTION DES SAV</h1>
<form method="POST" action="<?php echo($_SERVER['PHP_SELF']);?>" enctype="multipart/form-data">
Voir les SAV de <select name="filtre_sav_utilisateur_id" onChange="submit();">
<option value="Tous" <?php if($_SESSION['filtre_sav_utilisateur_id']=="Tous") {?>selected="selected"<?php }?>>Tous</option>
<?php 
 $bdd2 = new PDO('mysql:host=192.168.0.3;dbname=priximbattfr;charset=utf8;port=3306', 'priximbattfr', 'hu9wL5yB8YH4');
 $reponse = $bdd->query('SELECT * 
							FROM sav_utilisateur
                               WHERE 1');
while ($filtre = $reponse->fetch())
{     
   ?> 
	<option value="<?php echo($filtre['sav_utilisateur_id']);?>" <?php if($_SESSION['filtre_sav_utilisateur_id']==$filtre['sav_utilisateur_id']) {?>selected="selected"<?php }?>><?php echo($filtre['sav_utilisateur_nom']);?></option>
<?php }?>
</select>
</form>
<form method="POST" action="<?php echo($_SERVER['PHP_SELF']);?>" enctype="multipart/form-data">
</form>
<?php
if($_GET['action']=='declarer_sav') {
?>
<h1>Déclarer un SAV</h1>
<p></p>
<form method="POST" action="<?php echo($_SERVER['PHP_SELF']);?>" enctype="multipart/form-data">
<div><label>Votre nom : </label><input type="text" name="sav_nom" required/></div><br />
<div><label>Votre Email : </label><input type="text" name="sav_email" required/></div><br />
<div><label>Votre numéro de commande : </label><input type="text" name="sav_cde" required/></div><br />
<div><label>Votre problème : </label><textarea name="sav_descriptif"></textarea></div><br />
<div>
<p>Photos du bon de livraison, des défauts constatés, ...<br />
<input type="hidden" name="MAX_FILE_SIZE" value="10500000"><br />
<input name="sav_fichier1" type="file"/><br />
<input name="sav_fichier2" type="file"/><br />
<input name="sav_fichier3" type="file"/><br />
<input name="sav_fichier4" type="file"/><br />
<input name="sav_fichier5" type="file"/></div><br />
<input type="submit" name="BENVOYER" value="ENVOYER"/>
</form>
<?php }?>

<a href="<?php echo($_SERVER['PHP_SELF']);?>?action=declarer_sav">Declarer un SAV</a>

<h1>Listing des SAV</h1>
<table border="1" cellpadding="5" cellspacing="0">
<tr>
	<th>Date declaration SAV</th>
	<th>N° Commande</th>
	<th>Nom client</th>
	<th>Détails</th>
	<th>Fichiers</th>
	<th>N° SAV</th>
	<th>Lancer SAV</th>
	<th>Etat SAV</th>
	<th>Prise en charge</th>
	<th>Date cloture</th>
<?php 

    //$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    //$bdd = new PDO('mysql:host=dg298513-001.privatesql;dbname=pi_finale', 'pi_user_finale', 'Mdmd2018', $pdo_options);
    // $bdd = new PDO('mysql:host=dg298513-001.privatesql;dbname=pi_finale;charset:utf-8;', 'pi_user_finale', 'Mdmd2018');
  // $bdd = new PDO('mysql:host=localhost;dbname=sav;charset=utf8', 'root', 'T9trXfww');
  // $bdd2 = new PDO('mysql:host=localhost;dbname=sav;charset=utf8', 'root', 'T9trXfww');
   $bdd = new PDO('mysql:host=192.168.0.3;dbname=priximbattfr;charset=utf8;port=3306', 'priximbattfr', 'hu9wL5yB8YH4');
   $bdd2 = new PDO('mysql:host=192.168.0.3;dbname=priximbattfr;charset=utf8;port=3306', 'priximbattfr', 'hu9wL5yB8YH4');
  // $bdd2 = new PDO('mysql:host=dg298513-001.privatesql;dbname=pi_finale;charset=utf8;port=35189', 'pi_user_finale', 'Mdmd2018');
  // On recupere tout le contenu de la table Client

if($_SESSION['filtre_sav_utilisateur_id']<>'Tous'){ 

$reponse = $bdd->query('SELECT * 
							FROM sav
                               WHERE sav_utilisateur_id = "'.$_SESSION['filtre_sav_utilisateur_id'].'"
							   
							   ORDER BY sav_date DESC');
}else{
	$reponse = $bdd->query('SELECT * 
							FROM sav
                               WHERE 1
							   
							   ORDER BY sav_date DESC');
}


$reponse = $bdd->query('SELECT * 
							FROM sav
                               WHERE sav_date > "2022-01-01"
							   
							   ORDER BY sav_date DESC');

// On affiche le resultat
while ($donnees = $reponse->fetch())
{     
   ?>           
	<tr <?php  if($donnees['sav_etat']=='Lancé') {?>class="demarre"<?php }elseif($donnees['sav_date_cloture']<>'0000-00-00') {?>class="cloture"<?php }?>>
		<td><?php echo($donnees['sav_date']);?><br />Traité par <?php echo($donnees['sav_intervenant']);?></td>
		<td><?php echo($donnees['sav_cde']);?></td>
		<td><?php echo($donnees['sav_nom']);?><br /><a href="mailto:<?php echo($donnees['sav_email']);?>">Email</a></td>
		<td><?php echo($donnees['sav_descriptif']);?>
		<p><strong>Commentaire PX :</strong><br />
		<form method="POST" action="<?php echo($_SERVER['PHP_SELF']);?>" enctype="multipart/form-data">
			<textarea name="sav_historique" rows="10" cols="33"><?php echo($donnees['sav_historique']);?></textarea>
			<input type="hidden" name="sav_id" value="<?php echo($donnees['sav_id']);?>" />
			<input type="submit" name="BENVOYERHISTO" value="Mettre à jour"/>
		</form></p></td>
		<td>
		<form method="POST" action="<?php echo($_SERVER['PHP_SELF']);?>" enctype="multipart/form-data">
		<input type="hidden" name="MAX_FILE_SIZE" value="10500000">
			Fichier 1 : <?php if($donnees['sav_fichier1']<>''){?><a href="./doc/<?php echo($donnees['sav_fichier1']);?>" target="_blank"><?php echo($donnees['sav_fichier1']);?></a><?php }else{?><input name="sav_fichier1" type="file"/><?php }?>
			<br />Fichier 2 : <?php if($donnees['sav_fichier2']<>''){?><a href="./doc/<?php echo($donnees['sav_fichier2']);?>" target="_blank"><?php echo($donnees['sav_fichier2']);?></a><?php }else{?><input name="sav_fichier2" type="file"/><?php }?>
			<br />Fichier 3 : <?php if($donnees['sav_fichier3']<>''){?><a href="./doc/<?php echo($donnees['sav_fichier3']);?>" target="_blank"><?php echo($donnees['sav_fichier3']);?></a><?php }else{?><input name="sav_fichier3" type="file"/><?php }?>
			<br />Fichier 4 : <?php if($donnees['sav_fichier4']<>''){?><a href="./doc/<?php echo($donnees['sav_fichier4']);?>" target="_blank"><?php echo($donnees['sav_fichier4']);?></a><?php }else{?><input name="sav_fichier4" type="file"/><?php }?>
			<br />Fichier 5 : <?php if($donnees['sav_fichier5']<>''){?><a href="./doc/<?php echo($donnees['sav_fichier5']);?>" target="_blank"><?php echo($donnees['sav_fichier5']);?></a><?php }else{?><input name="sav_fichier5" type="file"/><?php }?>
			<br />Fichier 6 : <?php if($donnees['sav_fichier6']<>''){?><a href="./doc/<?php echo($donnees['sav_fichier6']);?>" target="_blank"><?php echo($donnees['sav_fichier6']);?></a><?php }else{?><input name="sav_fichier6" type="file"/><?php }?>
			<br />Fichier 7 : <?php if($donnees['sav_fichier7']<>''){?><a href="./doc/<?php echo($donnees['sav_fichier7']);?>" target="_blank"><?php echo($donnees['sav_fichier7']);?></a><?php }else{?><input name="sav_fichier7" type="file"/><?php }?>
			<br />Fichier 8 : <?php if($donnees['sav_fichier8']<>''){?><a href="./doc/<?php echo($donnees['sav_fichier8']);?>" target="_blank"><?php echo($donnees['sav_fichier8']);?></a><?php }else{?><input name="sav_fichier8" type="file"/><?php }?>
			<br />Fichier 9 : <?php if($donnees['sav_fichier9']<>''){?><a href="./doc/<?php echo($donnees['sav_fichier9']);?>" target="_blank"><?php echo($donnees['sav_fichier9']);?></a><?php }else{?><input name="sav_fichier9" type="file"/><?php }?>
			<br />Fichier 10 : <?php if($donnees['sav_fichier10']<>''){?><a href="./doc/<?php echo($donnees['sav_fichier10']);?>" target="_blank"><?php echo($donnees['sav_fichier10']);?></a><?php }else{?><input name="sav_fichier10" type="file"/><?php }?>
			<input type="hidden" name="sav_id" value="<?php echo($donnees['sav_id']);?>" />
			<input type="submit" name="BENVOYERIMG" value="Envoyer fichiers"/>
			</form>
		</td>
		<td><form method="POST" action="<?php echo($_SERVER['PHP_SELF']);?>"><?php if($donnees['sav_date_cloture']=='0000-00-00') {?><input name="sav_numero" type="text" value="<?php echo($donnees['sav_numero']);?>" onChange="submit()"/><?php }else{?><?php echo($donnees['sav_numero']);?><?php }?><input name="sav_id" type="hidden" value="<?php echo($donnees['sav_id']);?>"/>
			</form></td>
		<td><?php if($donnees['sav_etat']<>'debuter') {?><a href="<?php echo($_SERVER['PHP_SELF']);?>?action=debuter&amp;sav_id=<?php echo($donnees['sav_id']);?>">Lancer SAV</a><?php }else{?>Lancé le <?php echo($donnees['sav_date_etat']);?><?php }?></td>	
		<td><?php echo($donnees['sav_etat']);?></td>
		<td><form method="POST" action="<?php echo($_SERVER['PHP_SELF']);?>">
			<?php if($donnees['sav_date_cloture']=='0000-00-00' || $donnees['sav_date_cloture']=='') {?><select name="sav_prise_en_charge" onChange="submit()">
				<option value="" <?php if($donnees['sav_prise_en_charge']==''){?>selected="selected"<?php }?>>A définir</option>
				<option value="NFI" <?php if($donnees['sav_prise_en_charge']=='NFI'){?>selected="selected"<?php }?>>NFI</option>
				<option value="Transconde" <?php if($donnees['sav_prise_en_charge']=='Transconde'){?>selected="selected"<?php }?>>Transconde</option>
				<option value="Priximbattable" <?php if($donnees['sav_prise_en_charge']=='Priximbattable'){?>selected="selected"<?php }?>>Priximbattable</option>
				<option value="Refusé" <?php if($donnees['sav_prise_en_charge']=='Refusé'){?>selected="selected"<?php }?>>Refusé</option>
			</select><?php }else{?><?php echo($donnees['sav_prise_en_charge']);?><?php }?>
			<input name="sav_id" type="hidden" value="<?php echo($donnees['sav_id']);?>"/>
			</form></td>
		<td><?php if($donnees['sav_date_cloture']=='0000-00-00') {?><a href="<?php echo($_SERVER['PHP_SELF']);?>?action=cloturer&amp;sav_id=<?php echo($donnees['sav_id']);?>">Clôturer</a><?php }else{?><?php echo($donnees['sav_date_cloture']);?><?php }?></td>
	</tr>
<?php }
$reponse->closeCursor(); // Termine le traitement de la requête	
?>

</body>
</html>