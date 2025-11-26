<?php

class ServiceclientController extends FrontController
{

    /**
     * Initialize controller
     * @see FrontController::init()
     */
    public function init()
    {
        parent::init();
    }

    /**
     * Assign template vars related to page content
     * @see FrontController::initContent()
     */
    public function initContent()
    {
        parent::initContent();

		if(date('H')==8 || date('H')==9) $minute_attente=rand(2,3);
		if(date('H')==10 || date('H')==11 || date('H')==14 || date('H')==15 || date('H')==16) $minute_attente=rand(4,6);
		if(date('H')==12 || date('H')==13 || date('H')==17) $minute_attente=rand(3,5);

		$this->context->smarty->assign(array('minute_attente' => $minute_attente));

        $this->setTemplate('service-client.tpl'); // themes/classic/templates/service-client.tpl


    }

	public function postProcess()
    {

		if (Tools::isSubmit('submit')) {

			switch($_POST['contact_motif']){
				case 1:
					$motif = "Un renseignement sur un produit";
					break;
				case 2:
					$motif = "Le suivi de ma commande";
					break;
				case 3:
					$motif = "Le transporteur m'a laisser un message";
					break;
				case 4:
					$motif = "Je veux déclarer un incident concernant ma livraison";
					break;
				case 5:
					$motif = "Prendre rendez-vous pour une collecte";
					break;
				case 6:
					$motif = "J'ai un problème technique après vente, je souhaite être recontacter par un technicien";
					break;
				case 7:
					$motif = "J'ai un problème de paiement, confrmation de commande";
					break;
			}


			$message .= "<br /> Motif : ".$motif."<br /><br />";




			if($_POST['contact_facture'] == "" || $_POST['contact_facture'] == " "){
				$_POST['contact_facture'] = "Numéro de commande non renseigné";
			}

			Mail::Send(
					(int)(Configuration::get('PS_LANG_DEFAULT')), // defaut language id
					'serviceclient', // email template file to be use
					' Formulaire de contact Priximbattable.net', // email subject
					array(
						'{motif}' => $motif,
						'{nom}' => $_POST['contact_nom'],
						'{tel}' => $_POST['contact_tel'],
						'{order_number}' => $_POST['contact_facture'],
						'{message}' => $_POST['contact_descriptif'] // email content
					),
					//'wm3.priximbattable@gmail.com',
					Configuration::get('PS_SHOP_EMAIL'), // receiver email address
					NULL, //receiver name
					NULL, //from email address
					NULL,  //from name
					NULL, //file attachment
					NULL, //mode smtp
				);


			$bdd = new PDO('mysql:host=127.0.0.1;dbname=priximbattfr;charset=utf8;port=3306', 'priximbattfr', 'hu9wL5yB8YH4');

      $type_conversion  = null;
      $code_conversion = null;
      $date_conversion = null;
      $name_conversion = null;

      if (isset($_COOKIE["PBCLID"])) {
        $type_conversion  = $_COOKIE["PBCLKID_TYPE"];
        $code_conversion = $_COOKIE["PBCLID"];
        $date_conversion = $_COOKIE["PBCLKID_DATE"];
        $name_conversion = 'Lead';
      }

      $sql = "INSERT INTO `sc_rappel` (`sc_rappel_nom`,`sc_rappel_tel`,`sc_rappel_email`,`sc_rappel_type`,`sc_rappel_message`,`type_conversion`,`code_conversion`,`date_conversion`,`name_conversion`)
      VALUES ('".$_POST['contact_nom']." ".$_POST['contact_prenom']."','".$_POST['contact_tel']."','".$_POST['contact_email']."','email','Ref. Commande : ".$_POST['contact_facture']."<br><br>".$_POST['contact_descriptif']."','".$type_conversion."','".$code_conversion."','".$date_conversion."','".$name_conversion."'); ";
      $bdd->exec($sql);

$reponse = $bdd->query('SELECT sav_utilisateur_id, sav_utilisateur_nom
							FROM sav_utilisateur
              WHERE sav_utilisateur_acces="Utilisateur"
							ORDER BY RAND() LIMIT 1');

// On affiche le resultat
while ($donnees = $reponse->fetch())
{
$sav_intervenant = $donnees['sav_utilisateur_nom'];
$sav_utilisateur_id = $donnees['sav_utilisateur_id'];
}


		$sql="INSERT INTO rappel_client
		  SET
		      rappel_client_nom='".$_POST['contact_nom']."',
			  	rappel_client_numero='".$_POST['contact_tel']."',
          rappel_client_email='".$_POST['contact_email']."'
			   rappel_client_cde='".$_POST['contact_facture']."',
			   rappel_client_intervenant='".$sav_intervenant."',
			   rappel_client_utilisateur_id='".$sav_utilisateur_id."',
			    rappel_client_date='".date("Y-m-d")."'";

		$bdd->exec($sql);

		$sav_id = $bdd->lastInsertId();

			$msg="Votre demande a bien été envoyée au service client.";
			$_POST=""; //On réinitialise le formulaire
		}
			$this->context->smarty->assign(array('msg' => $msg));
	}
}
