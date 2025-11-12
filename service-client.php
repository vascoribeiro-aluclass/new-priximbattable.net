<?php

header('Location: https://priximbattable.net/service-client');

session_start();
include_once "phpmailer/class.phpmailer.php";

if(date('H')==8 || date('H')==9) $minute_attente=rand(2,3);
if(date('H')==10 || date('H')==11 || date('H')==14 || date('H')==15 || date('H')==16) $minute_attente=rand(4,6);
if(date('H')==12 || date('H')==13 || date('H')==17) $minute_attente=rand(3,5);

if ($_POST['BEnvoyer']) {

	if($_POST['contact_nom'] == '') { $msg .= "Veuillez saisir votre nom.<br/>"; }
	if($_POST['contact_tel'] == '') { $msg .= "Veuillez saisir votre téléphone.<br/>"; }


}


/**
 * On insère les données du formulaire
 */
if ($msg == '' && $_POST['BEnvoyer']) {

	$sujet = "Formulaire de contact Priximbattable.net";   //A MODIFIER SELON LES CAS

	//$commentaires = $sujet."\n".ereg_replace ("\r","",$_POST['contact_commentaires']);
	/*
	$sql="INSERT INTO contact
		  SET contact_nom='".mychain($_POST['contact_nom'])."',
			  contact_prenom='".mychain($_POST['contact_prenom'])."',
		      contact_adresse='".mychain($_POST['contact_adresse'])."',
			  contact_ville='".mychain($_POST['contact_ville'])."',
			  contact_cp='".mychain($_POST['contact_cp'])."',
			  contact_pays='".mychain($_POST['contact_pays'])."',
			  contact_telephone='".$_POST['contact_telephone']."',
			  contact_fax='".$_POST['contact_fax']."',
			  contact_email='".mychain($_POST['contact_email'])."',
			  contact_commentaires='".mychain($commentaires)."',
			  contact_date='".date("Y-m-d")."'";
	$rs->exe($sql);
	if ($rs->err) die($rs->err." $sql");
*/
	/**
	 * On envoie l'email
	 */
	$exp=EMAIL_EXPEDITEUR;
	$message ="";
	$message .= "Nom : ".$_POST['contact_nom']."<br />Prénom : ".$_POST['contact_prenom']."<br />";
	$message .= "<br /> N°Commande : ".$_POST['contact_facture']."<br /><br />";
	$message .= "<br /> N°Telephone : ".$_POST['contact_tel']."<br /><br />";
	$message .= "<br /> Remarque : ".$_POST['contact_descriptif']."<br /><br />";

	if($_POST['contact_motif']==1) { $motif = "un renseignement sur un produit";
	}elseif($_POST['contact_motif']==2) { $motif = "le suivi de ma commande";
	}elseif($_POST['contact_motif']==3) { $motif = "le transporteur m'a laisser un message";
	}elseif($_POST['contact_motif']==4) { $motif = "je veux déclarer un incident concernant ma livraison";
	}elseif($_POST['contact_motif']==5) { $motif = "prendre rendez-vous pour une collecte";
	}elseif($_POST['contact_motif']==6) { $motif = "j'ai un problème technique après vente, je souhaite être recontacter par un technicien";
	}elseif($_POST['contact_motif']==7) { $motif = "j'ai un problème de paiement, confrmation de commande";
	}
	$message .= "<br /> Motif : ".$motif."<br /><br />";



	$mail = new PHPmailer();
	$mail->IsSMTP();
	$mail->Host='in-v3.mailjet.com';
	$mail->SMTPAuth=true;
	$mail->SMTPSecure = 'tls';
	$mail->Port = 587;
	$mail->Username='e72c3e8d8252d7c9ea19393648809774' ;
	$mail->Password='2d87f913b68eb79ec42b92bebdf44c4d' ;
	$mail->IsHTML(true);

	//$mail->From=EMAIL_CLIENT;
	$mail->From="toujoursun@priximbattable.net";

	$mail->FromName="Priximbattable";
	$mail->AddAddress("toujoursun@priximbattable.net");

	$mail->AddReplyTo($_POST['contact_email']);
	$mail->Subject=$sujet;
	$mail->Body=$message;


	if(!$mail->Send()){
		 echo $mail->ErrorInfo;
	}
	$mail->SmtpClose();
	unset($mail);

	//die("d");
  mail("wm.priximbattable@gmail.com", $sujet, $message,"From: $exp");
  mail("wm3.priximbattable@gmail.com", $sujet, $message,"From: $exp");
  mail("toujoursun@priximbattable.net", $sujet, $message,"From: $exp");
	$msg="Votre demande a bien été envoyée !";
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
  $bdd = new PDO('mysql:host=192.168.0.3;dbname=priximbattfr;charset=utf8;port=3306', 'priximbattfr', 'hu9wL5yB8YH4');
  $sql = "INSERT INTO `sc_rappel` (`sc_rappel_nom`,`sc_rappel_tel`,`sc_rappel_email`,`sc_rappel_type`,`sc_rappel_message`,`type_conversion`,`code_conversion`,`date_conversion`,`name_conversion`)
          VALUES ('".$_POST['contact_nom']." ".$_POST['contact_prenom']."','".$_POST['contact_tel']."','','email','Ref. Commande : ".$_POST['contact_facture']."<br><br>".$_POST['contact_descriptif']."','".$type_conversion."','".$code_conversion."','".$date_conversion."','".$name_conversion."'); ";
	$bdd->exec($sql);
	$_POST=""; //On réinitialise le formulaire
}

?>
<!doctype html>
<html lang="fr">

  <head>


  <meta charset="utf-8">


  <meta http-equiv="x-ua-compatible" content="ie=edge">



  <title>Service client</title>
<script data-keepinline="true">
/* datalayer */
dataLayer = [];
dataLayer.push({"pageCategory":"cms","ecommerce":{"currencyCode":"EUR"},"google_tag_params":{"ecomm_pagetype":"other"}});
/* call to GTM Tag */
(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-NNVWQF');

/* async call to avoid cache system for dynamic data */
var cdcgtmreq = new XMLHttpRequest();
cdcgtmreq.onreadystatechange = function() {
    if (cdcgtmreq.readyState == XMLHttpRequest.DONE ) {
        if (cdcgtmreq.status == 200) {
          	var datalayerJs = cdcgtmreq.responseText;
            try {
                var datalayerObj = JSON.parse(datalayerJs);
                dataLayer = dataLayer || [];
                dataLayer.push(datalayerObj);
            } catch(e) {
               console.log("[CDCGTM] error while parsing json");
            }

                    }
        dataLayer.push({
          'event': 'datalayer_ready'
        });
    }
};
cdcgtmreq.open("GET", "//priximbattable.net/module/cdc_googletagmanager/async" /*+ "?" + new Date().getTime()*/, true);
cdcgtmreq.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
cdcgtmreq.send();
</script>
  <meta name="description" content="Nos conditions de livraison">
  <meta name="keywords" content="conditions, livraison, délais, expédition, colis">
      <meta name="robots" content="noindex">

                  <link rel="alternate" href="https://priximbattable.net/content/1-livraison" hreflang="fr">




  <meta name="viewport" content="width=device-width, initial-scale=1">



  <link rel="icon" type="image/vnd.microsoft.icon" href="/img/favicon.ico?1547030832">
  <link rel="shortcut icon" type="image/x-icon" href="/img/favicon.ico?1547030832">



    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat" type="text/css" media="all">
    <link rel="stylesheet" href="https://priximbattable.net/themes/classic/assets/cache/theme-19e4103673.css" type="text/css" media="all">






  <script type="text/javascript">
        var WK_PWA_APP_PUBLIC_SERVER_KEY = "BLrOTk_XXpPetaYZSAgdKT3Eo3jA5h5-o2UT05vVJicxYIQdp9tNMa_oNK8pkSY1acyVacm6cg6ByseExvG1bqA";
        var WK_PWA_PUSH_NOTIFICATION_ENABLE = 1;
        var appOffline = "Pas de connection";
        var appOnline = "Connect\u00e9";
        var clientTokenUrl = "https:\/\/priximbattable.net\/module\/wkpwa\/clientnotificationtoken";
        var customizeText = "Personnaliser";
        var jolisearch = {"amb_joli_search_action":"https:\/\/priximbattable.net\/jolisearch","amb_joli_search_link":"https:\/\/priximbattable.net\/jolisearch","amb_joli_search_controller":"jolisearch","blocksearch_type":"top","show_cat_desc":0,"ga_acc":0,"id_lang":1,"url_rewriting":1,"use_autocomplete":1,"minwordlen":3,"l_products":"Nos produits","l_manufacturers":"Nos marques","l_categories":"Nos cat\u00e9gories","l_no_results_found":"Aucun produit ne correspond \u00e0 cette recherche","l_more_results":"Montrer tous les r\u00e9sultats \u00bb","ENT_QUOTES":3,"search_ssl":true,"self":"\/core\/data\/priximbattable.net\/modules\/ambjolisearch"};
        var prestashop = {"cart":{"products":[],"totals":{"total":{"type":"total","label":"Total","amount":0,"value":"0,00\u00a0\u20ac"},"total_including_tax":{"type":"total","label":"Total TTC","amount":0,"value":"0,00\u00a0\u20ac"},"total_excluding_tax":{"type":"total","label":"Total HT :","amount":0,"value":"0,00\u00a0\u20ac"}},"subtotals":{"products":{"type":"products","label":"Sous-total","amount":0,"value":"0,00\u00a0\u20ac"},"discounts":null,"shipping":{"type":"shipping","label":"Livraison","amount":0,"value":"gratuit"},"tax":null},"products_count":0,"summary_string":"0 articles","vouchers":{"allowed":1,"added":[]},"discounts":[],"minimalPurchase":0,"minimalPurchaseRequired":""},"currency":{"name":"euro","iso_code":"EUR","iso_code_num":"978","sign":"\u20ac"},"customer":{"lastname":null,"firstname":null,"email":null,"birthday":null,"newsletter":null,"newsletter_date_add":null,"optin":null,"website":null,"company":null,"siret":null,"ape":null,"is_logged":false,"gender":{"type":null,"name":null},"addresses":[]},"language":{"name":"Fran\u00e7ais (French)","iso_code":"fr","locale":"fr-FR","language_code":"fr","is_rtl":"0","date_format_lite":"d\/m\/Y","date_format_full":"d\/m\/Y H:i:s","id":1},"page":{"title":"","canonical":null,"meta":{"title":"Livraison","description":"Nos conditions de livraison","keywords":"conditions, livraison, d\u00e9lais, exp\u00e9dition, colis","robots":"noindex"},"page_name":"cms","body_classes":{"lang-fr":true,"lang-rtl":false,"country-FR":true,"currency-EUR":true,"layout-full-width":true,"page-cms":true,"tax-display-enabled":true,"cms-id-1":true},"admin_notifications":[]},"shop":{"name":"priximbattable","logo":"\/img\/priximbattable-logo-1547030832.jpg","stores_icon":"\/img\/logo_stores.png","favicon":"\/img\/favicon.ico"},"urls":{"base_url":"https:\/\/priximbattable.net\/","current_url":"https:\/\/priximbattable.net\/content\/1-livraison","shop_domain_url":"https:\/\/priximbattable.net","img_ps_url":"https:\/\/priximbattable.net\/img\/","img_cat_url":"https:\/\/priximbattable.net\/img\/c\/","img_lang_url":"https:\/\/priximbattable.net\/img\/l\/","img_prod_url":"https:\/\/priximbattable.net\/img\/p\/","img_manu_url":"https:\/\/priximbattable.net\/img\/m\/","img_sup_url":"https:\/\/priximbattable.net\/img\/su\/","img_ship_url":"https:\/\/priximbattable.net\/img\/s\/","img_store_url":"https:\/\/priximbattable.net\/img\/st\/","img_col_url":"https:\/\/priximbattable.net\/img\/co\/","img_url":"https:\/\/priximbattable.net\/themes\/classic\/assets\/img\/","css_url":"https:\/\/priximbattable.net\/themes\/classic\/assets\/css\/","js_url":"https:\/\/priximbattable.net\/themes\/classic\/assets\/js\/","pic_url":"https:\/\/priximbattable.net\/upload\/","pages":{"address":"https:\/\/priximbattable.net\/adresse","addresses":"https:\/\/priximbattable.net\/adresses","authentication":"https:\/\/priximbattable.net\/connexion","cart":"https:\/\/priximbattable.net\/panier","category":"https:\/\/priximbattable.net\/index.php?controller=category","cms":"https:\/\/priximbattable.net\/index.php?controller=cms","contact":"https:\/\/priximbattable.net\/nous-contacter","discount":"https:\/\/priximbattable.net\/reduction","guest_tracking":"https:\/\/priximbattable.net\/suivi-commande-invite","history":"https:\/\/priximbattable.net\/historique-commandes","identity":"https:\/\/priximbattable.net\/identite","index":"https:\/\/priximbattable.net\/","my_account":"https:\/\/priximbattable.net\/mon-compte","order_confirmation":"https:\/\/priximbattable.net\/confirmation-commande","order_detail":"https:\/\/priximbattable.net\/index.php?controller=order-detail","order_follow":"https:\/\/priximbattable.net\/suivi-commande","order":"https:\/\/priximbattable.net\/commande","order_return":"https:\/\/priximbattable.net\/index.php?controller=order-return","order_slip":"https:\/\/priximbattable.net\/avoirs","pagenotfound":"https:\/\/priximbattable.net\/page-introuvable","password":"https:\/\/priximbattable.net\/recuperation-mot-de-passe","pdf_invoice":"https:\/\/priximbattable.net\/index.php?controller=pdf-invoice","pdf_order_return":"https:\/\/priximbattable.net\/index.php?controller=pdf-order-return","pdf_order_slip":"https:\/\/priximbattable.net\/index.php?controller=pdf-order-slip","prices_drop":"https:\/\/priximbattable.net\/promotions","product":"https:\/\/priximbattable.net\/index.php?controller=product","search":"https:\/\/priximbattable.net\/recherche","sitemap":"https:\/\/priximbattable.net\/Sitemap","stores":"https:\/\/priximbattable.net\/magasins","supplier":"https:\/\/priximbattable.net\/fournisseur","register":"https:\/\/priximbattable.net\/connexion?create_account=1","order_login":"https:\/\/priximbattable.net\/commande?login=1"},"alternative_langs":{"fr":"https:\/\/priximbattable.net\/content\/1-livraison"},"theme_assets":"\/themes\/classic\/assets\/","actions":{"logout":"https:\/\/priximbattable.net\/?mylogout="},"no_picture_image":{"bySize":{"small_default":{"url":"https:\/\/priximbattable.net\/img\/p\/fr-default-small_default.jpg","width":98,"height":98},"cart_default":{"url":"https:\/\/priximbattable.net\/img\/p\/fr-default-cart_default.jpg","width":125,"height":125},"home_default":{"url":"https:\/\/priximbattable.net\/img\/p\/fr-default-home_default.jpg","width":366,"height":366},"medium_default":{"url":"https:\/\/priximbattable.net\/img\/p\/fr-default-medium_default.jpg","width":452,"height":452},"large_default":{"url":"https:\/\/priximbattable.net\/img\/p\/fr-default-large_default.jpg","width":800,"height":800}},"small":{"url":"https:\/\/priximbattable.net\/img\/p\/fr-default-small_default.jpg","width":98,"height":98},"medium":{"url":"https:\/\/priximbattable.net\/img\/p\/fr-default-home_default.jpg","width":366,"height":366},"large":{"url":"https:\/\/priximbattable.net\/img\/p\/fr-default-large_default.jpg","width":800,"height":800},"legend":""}},"configuration":{"display_taxes_label":true,"is_catalog":false,"show_prices":true,"opt_in":{"partner":false},"quantity_discount":{"type":"discount","label":"Remise"},"voucher_enabled":1,"return_enabled":0},"field_required":[],"breadcrumb":{"links":[{"title":"Accueil","url":"https:\/\/priximbattable.net\/"},{"title":"Livraison","url":"https:\/\/priximbattable.net\/content\/1-livraison"}],"count":2},"link":{"protocol_link":"https:\/\/","protocol_content":"https:\/\/"},"time":1613121625,"static_token":"3f6bbd4a0307a721e2d981e28cea3b94","token":"c007e1d7fe78011cfb06b98b7b04ce58"};
        var serviceWorkerPath = "https:\/\/priximbattable.net\/wk-service-worker.js";
      </script>



  <style>.ets_mm_megamenu .mm_menus_li h4,
.ets_mm_megamenu .mm_menus_li h5,
.ets_mm_megamenu .mm_menus_li h6,
.ets_mm_megamenu .mm_menus_li h1,
.ets_mm_megamenu .mm_menus_li h2,
.ets_mm_megamenu .mm_menus_li h3,
.ets_mm_megamenu .mm_menus_li h4 *:not(i),
.ets_mm_megamenu .mm_menus_li h5 *:not(i),
.ets_mm_megamenu .mm_menus_li h6 *:not(i),
.ets_mm_megamenu .mm_menus_li h1 *:not(i),
.ets_mm_megamenu .mm_menus_li h2 *:not(i),
.ets_mm_megamenu .mm_menus_li h3 *:not(i),
.ets_mm_megamenu .mm_menus_li > a{
    font-family: inherit;
}
.ets_mm_megamenu *:not(.fa):not(i){
    font-family: 'Montserrat';
    font-weight: 600;
    letter-spacing: -0.05rem;

    padding-left: 0.15rem;
    padding-right: 0.15rem;
}

.ets_mm_block *{
    font-size: 14px;
}

@media (min-width: 768px){
/*layout 1*/
    .ets_mm_megamenu.layout_layout1{
        background: ;
    }
    .layout_layout1 .ets_mm_megamenu_content{
      background: linear-gradient(#FFFFFF, #F2F2F2) repeat scroll 0 0 rgba(0, 0, 0, 0);
      background: -webkit-linear-gradient(#FFFFFF, #F2F2F2) repeat scroll 0 0 rgba(0, 0, 0, 0);
      background: -o-linear-gradient(#FFFFFF, #F2F2F2) repeat scroll 0 0 rgba(0, 0, 0, 0);
    }
    .ets_mm_megamenu.layout_layout1:not(.ybc_vertical_menu) .mm_menus_ul{
         background: ;
    }

    #header .layout_layout1:not(.ybc_vertical_menu) .mm_menus_li > a,
    .layout_layout1 .ybc-menu-vertical-button,
    .layout_layout1 .mm_extra_item *{
        color: #484848
    }
    .layout_layout1 .ybc-menu-vertical-button .ybc-menu-button-toggle_icon_default .icon-bar{
        background-color: #484848
    }
    .layout_layout1 .mm_menus_li:hover > a,
    .layout_layout1 .mm_menus_li.active > a,
    #header .layout_layout1 .mm_menus_li:hover > a,
    .layout_layout1:hover .ybc-menu-vertical-button,
    .layout_layout1 .mm_extra_item button[type="submit"]:hover i,
    #header .layout_layout1 .mm_menus_li.active > a{
        color: #ec4249;
    }

    .layout_layout1:not(.ybc_vertical_menu) .mm_menus_li > a:before,
    .layout_layout1.ybc_vertical_menu:hover .ybc-menu-vertical-button:before,
    .layout_layout1:hover .ybc-menu-vertical-button .ybc-menu-button-toggle_icon_default .icon-bar,
    .ybc-menu-vertical-button.layout_layout1:hover{background-color: #ec4249;}

    .layout_layout1:not(.ybc_vertical_menu) .mm_menus_li:hover > a,
    .ets_mm_megamenu.layout_layout1.ybc_vertical_menu:hover,
    #header .layout_layout1:not(.ybc_vertical_menu) .mm_menus_li:hover > a,
    .ets_mm_megamenu.layout_layout1.ybc_vertical_menu:hover{
        background: #ffffff;
    }

    .layout_layout1.ets_mm_megamenu .mm_columns_ul,
    .layout_layout1.ybc_vertical_menu .mm_menus_ul{
        background-color: #ffffff;
    }
    #header .layout_layout1 .ets_mm_block_content a,
    #header .layout_layout1 .ets_mm_block_content p,
    .layout_layout1.ybc_vertical_menu .mm_menus_li > a,
    #header .layout_layout1.ybc_vertical_menu .mm_menus_li > a{
        color: #414141;
    }

    .layout_layout1 .mm_columns_ul h1,
    .layout_layout1 .mm_columns_ul h2,
    .layout_layout1 .mm_columns_ul h3,
    .layout_layout1 .mm_columns_ul h4,
    .layout_layout1 .mm_columns_ul h5,
    .layout_layout1 .mm_columns_ul h6,
    .layout_layout1 .mm_columns_ul .ets_mm_block > h1 a,
    .layout_layout1 .mm_columns_ul .ets_mm_block > h2 a,
    .layout_layout1 .mm_columns_ul .ets_mm_block > h3 a,
    .layout_layout1 .mm_columns_ul .ets_mm_block > h4 a,
    .layout_layout1 .mm_columns_ul .ets_mm_block > h5 a,
    .layout_layout1 .mm_columns_ul .ets_mm_block > h6 a,
    #header .layout_layout1 .mm_columns_ul .ets_mm_block > h1 a,
    #header .layout_layout1 .mm_columns_ul .ets_mm_block > h2 a,
    #header .layout_layout1 .mm_columns_ul .ets_mm_block > h3 a,
    #header .layout_layout1 .mm_columns_ul .ets_mm_block > h4 a,
    #header .layout_layout1 .mm_columns_ul .ets_mm_block > h5 a,
    #header .layout_layout1 .mm_columns_ul .ets_mm_block > h6 a,
    .layout_layout1 .mm_columns_ul .h1,
    .layout_layout1 .mm_columns_ul .h2,
    .layout_layout1 .mm_columns_ul .h3,
    .layout_layout1 .mm_columns_ul .h4,
    .layout_layout1 .mm_columns_ul .h5,
    .layout_layout1 .mm_columns_ul .h6{
        color: #414141;
    }


    .layout_layout1 li:hover > a,
    .layout_layout1 li > a:hover,
    .layout_layout1 .mm_tabs_li.open .mm_tab_toggle_title,
    .layout_layout1 .mm_tabs_li.open .mm_tab_toggle_title a,
    .layout_layout1 .mm_tabs_li:hover .mm_tab_toggle_title,
    .layout_layout1 .mm_tabs_li:hover .mm_tab_toggle_title a,
    #header .layout_layout1 .mm_tabs_li.open .mm_tab_toggle_title,
    #header .layout_layout1 .mm_tabs_li.open .mm_tab_toggle_title a,
    #header .layout_layout1 .mm_tabs_li:hover .mm_tab_toggle_title,
    #header .layout_layout1 .mm_tabs_li:hover .mm_tab_toggle_title a,
    .layout_layout1.ybc_vertical_menu .mm_menus_li > a,
    #header .layout_layout1 li:hover > a,
    .layout_layout1.ybc_vertical_menu .mm_menus_li:hover > a,
    #header .layout_layout1.ybc_vertical_menu .mm_menus_li:hover > a,
    #header .layout_layout1 .mm_columns_ul .mm_block_type_product .product-title > a:hover,
    #header .layout_layout1 li > a:hover{color: #ec4249;}


/*end layout 1*/


    /*layout 2*/
    .ets_mm_megamenu.layout_layout2{
        background-color: #3cabdb;
    }

    #header .layout_layout2:not(.ybc_vertical_menu) .mm_menus_li > a,
    .layout_layout2 .ybc-menu-vertical-button,
    .layout_layout2 .mm_extra_item *{
        color: #ffffff
    }
    .layout_layout2 .ybc-menu-vertical-button .ybc-menu-button-toggle_icon_default .icon-bar{
        background-color: #ffffff
    }
    .layout_layout2:not(.ybc_vertical_menu) .mm_menus_li:hover > a,
    .layout_layout2:not(.ybc_vertical_menu) .mm_menus_li.active > a,
    #header .layout_layout2:not(.ybc_vertical_menu) .mm_menus_li:hover > a,
    .layout_layout2:hover .ybc-menu-vertical-button,
    .layout_layout2 .mm_extra_item button[type="submit"]:hover i,
    #header .layout_layout2:not(.ybc_vertical_menu) .mm_menus_li.active > a{color: #ffffff;}

    .layout_layout2:hover .ybc-menu-vertical-button .ybc-menu-button-toggle_icon_default .icon-bar{
        background-color: #ffffff;
    }
    .layout_layout2:not(.ybc_vertical_menu) .mm_menus_li:hover > a,
    #header .layout_layout2:not(.ybc_vertical_menu) .mm_menus_li:hover > a,
    .ets_mm_megamenu.layout_layout2.ybc_vertical_menu:hover{
        background-color: #50b4df;
    }

    .layout_layout2.ets_mm_megamenu .mm_columns_ul,
    .layout_layout2.ybc_vertical_menu .mm_menus_ul{
        background-color: #ffffff;
    }
    #header .layout_layout2 .ets_mm_block_content a,
    .layout_layout2.ybc_vertical_menu .mm_menus_li > a,
    #header .layout_layout2.ybc_vertical_menu .mm_menus_li > a,
    #header .layout_layout2 .ets_mm_block_content p{
        color: #666666;
    }

    .layout_layout2 .mm_columns_ul h1,
    .layout_layout2 .mm_columns_ul h2,
    .layout_layout2 .mm_columns_ul h3,
    .layout_layout2 .mm_columns_ul h4,
    .layout_layout2 .mm_columns_ul h5,
    .layout_layout2 .mm_columns_ul h6,
    .layout_layout2 .mm_columns_ul .ets_mm_block > h1 a,
    .layout_layout2 .mm_columns_ul .ets_mm_block > h2 a,
    .layout_layout2 .mm_columns_ul .ets_mm_block > h3 a,
    .layout_layout2 .mm_columns_ul .ets_mm_block > h4 a,
    .layout_layout2 .mm_columns_ul .ets_mm_block > h5 a,
    .layout_layout2 .mm_columns_ul .ets_mm_block > h6 a,
    #header .layout_layout2 .mm_columns_ul .ets_mm_block > h1 a,
    #header .layout_layout2 .mm_columns_ul .ets_mm_block > h2 a,
    #header .layout_layout2 .mm_columns_ul .ets_mm_block > h3 a,
    #header .layout_layout2 .mm_columns_ul .ets_mm_block > h4 a,
    #header .layout_layout2 .mm_columns_ul .ets_mm_block > h5 a,
    #header .layout_layout2 .mm_columns_ul .ets_mm_block > h6 a,
    .layout_layout2 .mm_columns_ul .h1,
    .layout_layout2 .mm_columns_ul .h2,
    .layout_layout2 .mm_columns_ul .h3,
    .layout_layout2 .mm_columns_ul .h4,
    .layout_layout2 .mm_columns_ul .h5,
    .layout_layout2 .mm_columns_ul .h6{
        color: #414141;
    }


    .layout_layout2 li:hover > a,
    .layout_layout2 li > a:hover,
    .layout_layout2 .mm_tabs_li.open .mm_tab_toggle_title,
    .layout_layout2 .mm_tabs_li.open .mm_tab_toggle_title a,
    .layout_layout2 .mm_tabs_li:hover .mm_tab_toggle_title,
    .layout_layout2 .mm_tabs_li:hover .mm_tab_toggle_title a,
    #header .layout_layout2 .mm_tabs_li.open .mm_tab_toggle_title,
    #header .layout_layout2 .mm_tabs_li.open .mm_tab_toggle_title a,
    #header .layout_layout2 .mm_tabs_li:hover .mm_tab_toggle_title,
    #header .layout_layout2 .mm_tabs_li:hover .mm_tab_toggle_title a,
    #header .layout_layout2 li:hover > a,
    .layout_layout2.ybc_vertical_menu .mm_menus_li > a,
    .layout_layout2.ybc_vertical_menu .mm_menus_li:hover > a,
    #header .layout_layout2.ybc_vertical_menu .mm_menus_li:hover > a,
    #header .layout_layout2 .mm_columns_ul .mm_block_type_product .product-title > a:hover,
    #header .layout_layout2 li > a:hover{color: #fc4444;}



    /*layout 3*/
    .ets_mm_megamenu.layout_layout3,
    .layout_layout3 .mm_tab_li_content{
        background-color: #f1f1f1;
        /* background-color: #000; black friday */
    }
    #header .layout_layout3:not(.ybc_vertical_menu) .mm_menus_li > a,
    .layout_layout3 .ybc-menu-vertical-button,
    .layout_layout3 .mm_extra_item *{
        color: #222222
    }
    .layout_layout3 .ybc-menu-vertical-button .ybc-menu-button-toggle_icon_default .icon-bar{
        background-color: #222222
    }
    .layout_layout3 .mm_menus_li:hover > a,
    .layout_layout3 .mm_menus_li.active > a,
    .layout_layout3 .mm_extra_item button[type="submit"]:hover i,
    #header .layout_layout3 .mm_menus_li:hover > a,
    #header .layout_layout3 .mm_menus_li.active > a,
    .layout_layout3:hover .ybc-menu-vertical-button,
    .layout_layout3:hover .ybc-menu-vertical-button .ybc-menu-button-toggle_icon_default .icon-bar{
        color: #ffffff;
    }

    .layout_layout3:not(.ybc_vertical_menu) .mm_menus_li:hover > a,
    #header .layout_layout3:not(.ybc_vertical_menu) .mm_menus_li:hover > a,
    .ets_mm_megamenu.layout_layout3.ybc_vertical_menu:hover,
    .layout_layout3 .mm_tabs_li.open .mm_columns_contents_ul,
    .layout_layout3 .mm_tabs_li.open .mm_tab_li_content {
        background-color: #ff0000;
    }
    .layout_layout3 .mm_tabs_li.open.mm_tabs_has_content .mm_tab_li_content .mm_tab_name::before{
        border-right-color: #ff0000;
    }
    .layout_layout3.ets_mm_megamenu .mm_columns_ul,
    .ybc_vertical_menu.layout_layout3 .mm_menus_ul.ets_mn_submenu_full_height .mm_menus_li:hover a::before,
    .layout_layout3.ybc_vertical_menu .mm_menus_ul{
        background-color: #ffffff;
        border-color: #ffffff;
    }
    #header .layout_layout3 .ets_mm_block_content a,
    #header .layout_layout3 .ets_mm_block_content p,
    .layout_layout3.ybc_vertical_menu .mm_menus_li > a,
    #header .layout_layout3.ybc_vertical_menu .mm_menus_li > a{
        color: #000000;
    }

    .layout_layout3 .mm_columns_ul h1,
    .layout_layout3 .mm_columns_ul h2,
    .layout_layout3 .mm_columns_ul h3,
    .layout_layout3 .mm_columns_ul h4,
    .layout_layout3 .mm_columns_ul h5,
    .layout_layout3 .mm_columns_ul h6,
    .layout_layout3 .mm_columns_ul .ets_mm_block > h1 a,
    .layout_layout3 .mm_columns_ul .ets_mm_block > h2 a,
    .layout_layout3 .mm_columns_ul .ets_mm_block > h3 a,
    .layout_layout3 .mm_columns_ul .ets_mm_block > h4 a,
    .layout_layout3 .mm_columns_ul .ets_mm_block > h5 a,
    .layout_layout3 .mm_columns_ul .ets_mm_block > h6 a,
    #header .layout_layout3 .mm_columns_ul .ets_mm_block > h1 a,
    #header .layout_layout3 .mm_columns_ul .ets_mm_block > h2 a,
    #header .layout_layout3 .mm_columns_ul .ets_mm_block > h3 a,
    #header .layout_layout3 .mm_columns_ul .ets_mm_block > h4 a,
    #header .layout_layout3 .mm_columns_ul .ets_mm_block > h5 a,
    #header .layout_layout3 .mm_columns_ul .ets_mm_block > h6 a,
    .layout_layout3 .mm_columns_ul .h1,
    .layout_layout3 .mm_columns_ul .h2,
    .layout_layout3 .mm_columns_ul .h3,
    .layout_layout3.ybc_vertical_menu .mm_menus_li:hover > a,
    #header .layout_layout3.ybc_vertical_menu .mm_menus_li:hover > a,
    .layout_layout3 .mm_columns_ul .h4,
    .layout_layout3 .mm_columns_ul .h5,
    .layout_layout3 .mm_columns_ul .h6{
        color: #000000;
    }


    .layout_layout3 li:hover > a,
    .layout_layout3 li > a:hover,
    .layout_layout3 .mm_tabs_li.open .mm_tab_toggle_title,
    .layout_layout3 .mm_tabs_li.open .mm_tab_toggle_title a,
    .layout_layout3 .mm_tabs_li:hover .mm_tab_toggle_title,
    .layout_layout3 .mm_tabs_li:hover .mm_tab_toggle_title a,
    #header .layout_layout3 .mm_tabs_li.open .mm_tab_toggle_title,
    #header .layout_layout3 .mm_tabs_li.open .mm_tab_toggle_title a,
    #header .layout_layout3 .mm_tabs_li:hover .mm_tab_toggle_title,
    #header .layout_layout3 .mm_tabs_li:hover .mm_tab_toggle_title a,
    #header .layout_layout3 li:hover > a,
    #header .layout_layout3 .mm_columns_ul .mm_block_type_product .product-title > a:hover,
    #header .layout_layout3 li > a:hover,
    .layout_layout3.ybc_vertical_menu .mm_menus_li > a,
    .layout_layout3 .has-sub .ets_mm_categories li > a:hover,
    #header .layout_layout3 .has-sub .ets_mm_categories li > a:hover{color: #fc4444;}


    /*layout 4*/

    .ets_mm_megamenu.layout_layout4{
        background-color: #ffffff;
    }
    .ets_mm_megamenu.layout_layout4:not(.ybc_vertical_menu) .mm_menus_ul{
         background: #ffffff;
    }

    #header .layout_layout4:not(.ybc_vertical_menu) .mm_menus_li > a,
    .layout_layout4 .ybc-menu-vertical-button,
    .layout_layout4 .mm_extra_item *{
        color: #333333
    }
    .layout_layout4 .ybc-menu-vertical-button .ybc-menu-button-toggle_icon_default .icon-bar{
        background-color: #333333
    }

    .layout_layout4 .mm_menus_li:hover > a,
    .layout_layout4 .mm_menus_li.active > a,
    #header .layout_layout4 .mm_menus_li:hover > a,
    .layout_layout4:hover .ybc-menu-vertical-button,
    #header .layout_layout4 .mm_menus_li.active > a{color: #ffffff;}

    .layout_layout4:hover .ybc-menu-vertical-button .ybc-menu-button-toggle_icon_default .icon-bar{
        background-color: #ffffff;
    }

    .layout_layout4:not(.ybc_vertical_menu) .mm_menus_li:hover > a,
    .layout_layout4:not(.ybc_vertical_menu) .mm_menus_li.active > a,
    .layout_layout4:not(.ybc_vertical_menu) .mm_menus_li:hover > span,
    .layout_layout4:not(.ybc_vertical_menu) .mm_menus_li.active > span,
    #header .layout_layout4:not(.ybc_vertical_menu) .mm_menus_li:hover > a,
    #header .layout_layout4:not(.ybc_vertical_menu) .mm_menus_li.active > a,
    .layout_layout4:not(.ybc_vertical_menu) .mm_menus_li:hover > a,
    #header .layout_layout4:not(.ybc_vertical_menu) .mm_menus_li:hover > a,
    .ets_mm_megamenu.layout_layout4.ybc_vertical_menu:hover,
    #header .layout_layout4 .mm_menus_li:hover > span,
    #header .layout_layout4 .mm_menus_li.active > span{
        background-color: #ec4249;
    }
    .layout_layout4 .ets_mm_megamenu_content {
      border-bottom-color: #ec4249;
    }

    .layout_layout4.ets_mm_megamenu .mm_columns_ul,
    .ybc_vertical_menu.layout_layout4 .mm_menus_ul .mm_menus_li:hover a::before,
    .layout_layout4.ybc_vertical_menu .mm_menus_ul{
        background-color: #ffffff;
    }
    #header .layout_layout4 .ets_mm_block_content a,
    .layout_layout4.ybc_vertical_menu .mm_menus_li > a,
    #header .layout_layout4.ybc_vertical_menu .mm_menus_li > a,
    #header .layout_layout4 .ets_mm_block_content p{
        color: #666666;
    }

    .layout_layout4 .mm_columns_ul h1,
    .layout_layout4 .mm_columns_ul h2,
    .layout_layout4 .mm_columns_ul h3,
    .layout_layout4 .mm_columns_ul h4,
    .layout_layout4 .mm_columns_ul h5,
    .layout_layout4 .mm_columns_ul h6,
    .layout_layout4 .mm_columns_ul .ets_mm_block > h1 a,
    .layout_layout4 .mm_columns_ul .ets_mm_block > h2 a,
    .layout_layout4 .mm_columns_ul .ets_mm_block > h3 a,
    .layout_layout4 .mm_columns_ul .ets_mm_block > h4 a,
    .layout_layout4 .mm_columns_ul .ets_mm_block > h5 a,
    .layout_layout4 .mm_columns_ul .ets_mm_block > h6 a,
    #header .layout_layout4 .mm_columns_ul .ets_mm_block > h1 a,
    #header .layout_layout4 .mm_columns_ul .ets_mm_block > h2 a,
    #header .layout_layout4 .mm_columns_ul .ets_mm_block > h3 a,
    #header .layout_layout4 .mm_columns_ul .ets_mm_block > h4 a,
    #header .layout_layout4 .mm_columns_ul .ets_mm_block > h5 a,
    #header .layout_layout4 .mm_columns_ul .ets_mm_block > h6 a,
    .layout_layout4 .mm_columns_ul .h1,
    .layout_layout4 .mm_columns_ul .h2,
    .layout_layout4 .mm_columns_ul .h3,
    .layout_layout4 .mm_columns_ul .h4,
    .layout_layout4 .mm_columns_ul .h5,
    .layout_layout4 .mm_columns_ul .h6{
        color: #414141;
    }

    .layout_layout4 li:hover > a,
    .layout_layout4 li > a:hover,
    .layout_layout4 .mm_tabs_li.open .mm_tab_toggle_title,
    .layout_layout4 .mm_tabs_li.open .mm_tab_toggle_title a,
    .layout_layout4 .mm_tabs_li:hover .mm_tab_toggle_title,
    .layout_layout4 .mm_tabs_li:hover .mm_tab_toggle_title a,
    #header .layout_layout4 .mm_tabs_li.open .mm_tab_toggle_title,
    #header .layout_layout4 .mm_tabs_li.open .mm_tab_toggle_title a,
    #header .layout_layout4 .mm_tabs_li:hover .mm_tab_toggle_title,
    #header .layout_layout4 .mm_tabs_li:hover .mm_tab_toggle_title a,
    #header .layout_layout4 li:hover > a,
    .layout_layout4.ybc_vertical_menu .mm_menus_li > a,
    .layout_layout4.ybc_vertical_menu .mm_menus_li:hover > a,
    #header .layout_layout4.ybc_vertical_menu .mm_menus_li:hover > a,
    #header .layout_layout4 .mm_columns_ul .mm_block_type_product .product-title > a:hover,
    #header .layout_layout4 li > a:hover{color: #ec4249;}

    /* end layout 4*/




    /* Layout 5*/
    .ets_mm_megamenu.layout_layout5{
        background-color: #f6f6f6;
    }
    .ets_mm_megamenu.layout_layout5:not(.ybc_vertical_menu) .mm_menus_ul{
         background: #f6f6f6;
    }

    #header .layout_layout5:not(.ybc_vertical_menu) .mm_menus_li > a,
    .layout_layout5 .ybc-menu-vertical-button,
    .layout_layout5 .mm_extra_item *{
        color: #333333
    }
    .layout_layout5 .ybc-menu-vertical-button .ybc-menu-button-toggle_icon_default .icon-bar{
        background-color: #333333
    }
    .layout_layout5 .mm_menus_li:hover > a,
    .layout_layout5 .mm_menus_li.active > a,
    .layout_layout5 .mm_extra_item button[type="submit"]:hover i,
    #header .layout_layout5 .mm_menus_li:hover > a,
    #header .layout_layout5 .mm_menus_li.active > a,
    .layout_layout5:hover .ybc-menu-vertical-button{
        color: #ec4249;
    }
    .layout_layout5:hover .ybc-menu-vertical-button .ybc-menu-button-toggle_icon_default .icon-bar{
        background-color: #ec4249;
    }

    .layout_layout5 .mm_menus_li > a:before{background-color: #ec4249;}


    .layout_layout5:not(.ybc_vertical_menu) .mm_menus_li:hover > a,
    #header .layout_layout5:not(.ybc_vertical_menu) .mm_menus_li:hover > a,
    .ets_mm_megamenu.layout_layout5.ybc_vertical_menu:hover,
    #header .layout_layout5 .mm_menus_li:hover > a{
        background-color: ;
    }

    .layout_layout5.ets_mm_megamenu .mm_columns_ul,
    .ybc_vertical_menu.layout_layout5 .mm_menus_ul .mm_menus_li:hover a::before,
    .layout_layout5.ybc_vertical_menu .mm_menus_ul{
        background-color: #ffffff;
    }
    #header .layout_layout5 .ets_mm_block_content a,
    .layout_layout5.ybc_vertical_menu .mm_menus_li > a,
    #header .layout_layout5.ybc_vertical_menu .mm_menus_li > a,
    #header .layout_layout5 .ets_mm_block_content p{
        color: #333333;
    }

    .layout_layout5 .mm_columns_ul h1,
    .layout_layout5 .mm_columns_ul h2,
    .layout_layout5 .mm_columns_ul h3,
    .layout_layout5 .mm_columns_ul h4,
    .layout_layout5 .mm_columns_ul h5,
    .layout_layout5 .mm_columns_ul h6,
    .layout_layout5 .mm_columns_ul .ets_mm_block > h1 a,
    .layout_layout5 .mm_columns_ul .ets_mm_block > h2 a,
    .layout_layout5 .mm_columns_ul .ets_mm_block > h3 a,
    .layout_layout5 .mm_columns_ul .ets_mm_block > h4 a,
    .layout_layout5 .mm_columns_ul .ets_mm_block > h5 a,
    .layout_layout5 .mm_columns_ul .ets_mm_block > h6 a,
    #header .layout_layout5 .mm_columns_ul .ets_mm_block > h1 a,
    #header .layout_layout5 .mm_columns_ul .ets_mm_block > h2 a,
    #header .layout_layout5 .mm_columns_ul .ets_mm_block > h3 a,
    #header .layout_layout5 .mm_columns_ul .ets_mm_block > h4 a,
    #header .layout_layout5 .mm_columns_ul .ets_mm_block > h5 a,
    #header .layout_layout5 .mm_columns_ul .ets_mm_block > h6 a,
    .layout_layout5 .mm_columns_ul .h1,
    .layout_layout5 .mm_columns_ul .h2,
    .layout_layout5 .mm_columns_ul .h3,
    .layout_layout5 .mm_columns_ul .h4,
    .layout_layout5 .mm_columns_ul .h5,
    .layout_layout5 .mm_columns_ul .h6{
        color: #414141;
    }

    .layout_layout5 li:hover > a,
    .layout_layout5 li > a:hover,
    .layout_layout5 .mm_tabs_li.open .mm_tab_toggle_title,
    .layout_layout5 .mm_tabs_li.open .mm_tab_toggle_title a,
    .layout_layout5 .mm_tabs_li:hover .mm_tab_toggle_title,
    .layout_layout5 .mm_tabs_li:hover .mm_tab_toggle_title a,
    #header .layout_layout5 .mm_tabs_li.open .mm_tab_toggle_title,
    #header .layout_layout5 .mm_tabs_li.open .mm_tab_toggle_title a,
    #header .layout_layout5 .mm_tabs_li:hover .mm_tab_toggle_title,
    #header .layout_layout5 .mm_tabs_li:hover .mm_tab_toggle_title a,
    .layout_layout5.ybc_vertical_menu .mm_menus_li > a,
    #header .layout_layout5 li:hover > a,
    .layout_layout5.ybc_vertical_menu .mm_menus_li:hover > a,
    #header .layout_layout5.ybc_vertical_menu .mm_menus_li:hover > a,
    #header .layout_layout5 .mm_columns_ul .mm_block_type_product .product-title > a:hover,
    #header .layout_layout5 li > a:hover{color: #ec4249;}

    /*end layout 5*/
}


@media (max-width: 767px){
    .ybc-menu-vertical-button,
    .transition_floating .close_menu,
    .transition_full .close_menu{
        background-color: #000000;
        color: #ffffff;
    }
    .transition_floating .close_menu *,
    .transition_full .close_menu *,
    .ybc-menu-vertical-button .icon-bar{
        color: #ffffff;
    }

    .close_menu .icon-bar,
    .ybc-menu-vertical-button .icon-bar {
      background-color: #ffffff;
    }
    .mm_menus_back_icon{
        border-color: #ffffff;
    }

    .layout_layout1 .mm_menus_li:hover > a,
    #header .layout_layout1 .mm_menus_li:hover > a{color: #ec4249;}
    .layout_layout1 .mm_has_sub.mm_menus_li:hover .arrow::before{
        /*border-color: #ec4249;*/
    }


    .layout_layout1 .mm_menus_li:hover > a,
    #header .layout_layout1 .mm_menus_li:hover > a{
        background-color: #ffffff;
    }
    .layout_layout1 li:hover > a,
    .layout_layout1 li > a:hover,
    #header .layout_layout1 li:hover > a,
    #header .layout_layout1 .mm_columns_ul .mm_block_type_product .product-title > a:hover,
    #header .layout_layout1 li > a:hover{
        color: #ec4249;
    }

    /*------------------------------------------------------*/


    .layout_layout2 .mm_menus_li:hover > a,
    #header .layout_layout2 .mm_menus_li:hover > a{color: #ffffff;}
    .layout_layout2 .mm_has_sub.mm_menus_li:hover .arrow::before{
        border-color: #ffffff;
    }

    .layout_layout2 .mm_menus_li:hover > a,
    #header .layout_layout2 .mm_menus_li:hover > a{
        background-color: #50b4df;
    }
    .layout_layout2 li:hover > a,
    .layout_layout2 li > a:hover,
    #header .layout_layout2 li:hover > a,
    #header .layout_layout2 .mm_columns_ul .mm_block_type_product .product-title > a:hover,
    #header .layout_layout2 li > a:hover{color: #fc4444;}

    /*------------------------------------------------------*/



    .layout_layout3 .mm_menus_li:hover > a,
    #header .layout_layout3 .mm_menus_li:hover > a{
        color: #ffffff;
    }
    .layout_layout3 .mm_has_sub.mm_menus_li:hover .arrow::before{
        border-color: #ffffff;
    }

    .layout_layout3 .mm_menus_li:hover > a,
    #header .layout_layout3 .mm_menus_li:hover > a{
        background-color: #ff0000;
    }
    .layout_layout3 li:hover > a,
    .layout_layout3 li > a:hover,
    #header .layout_layout3 li:hover > a,
    #header .layout_layout3 .mm_columns_ul .mm_block_type_product .product-title > a:hover,
    #header .layout_layout3 li > a:hover,
    .layout_layout3 .has-sub .ets_mm_categories li > a:hover,
    #header .layout_layout3 .has-sub .ets_mm_categories li > a:hover{color: #fc4444;}



    /*------------------------------------------------------*/


    .layout_layout4 .mm_menus_li:hover > a,
    #header .layout_layout4 .mm_menus_li:hover > a{
        color: #ffffff;
    }

    .layout_layout4 .mm_has_sub.mm_menus_li:hover .arrow::before{
        border-color: #ffffff;
    }

    .layout_layout4 .mm_menus_li:hover > a,
    #header .layout_layout4 .mm_menus_li:hover > a{
        background-color: #ec4249;
    }
    .layout_layout4 li:hover > a,
    .layout_layout4 li > a:hover,
    #header .layout_layout4 li:hover > a,
    #header .layout_layout4 .mm_columns_ul .mm_block_type_product .product-title > a:hover,
    #header .layout_layout4 li > a:hover{color: #ec4249;}


    /*------------------------------------------------------*/


    .layout_layout5 .mm_menus_li:hover > a,
    #header .layout_layout5 .mm_menus_li:hover > a{color: #ec4249;}
    .layout_layout5 .mm_has_sub.mm_menus_li:hover .arrow::before{
        border-color: #ec4249;
    }

    .layout_layout5 .mm_menus_li:hover > a,
    #header .layout_layout5 .mm_menus_li:hover > a{
        background-color: ;
    }
    .layout_layout5 li:hover > a,
    .layout_layout5 li > a:hover,
    #header .layout_layout5 li:hover > a,
    #header .layout_layout5 .mm_columns_ul .mm_block_type_product .product-title > a:hover,
    #header .layout_layout5 li > a:hover{color: #ec4249;}

    /*------------------------------------------------------*/




}

















</style>
<style>
	.lgcookieslaw_banner {
		display:table;
		width:100%;
		position:fixed;
		left:0;
		repeat-x scroll left top;
		background: #000000;
		border-color: #000000;
		border-left: 1px solid #000000;
		border-radius: 3px 3px 3px 3px;
		border-right: 1px solid #000000;
		color: #FFFFFF !important;
		z-index: 99999;
		border-style: solid;
		border-width: 1px;
		margin: 0;
		outline: medium none;
		text-align: center;
		vertical-align: middle;
		text-shadow: 0 0 0 0;
		-webkit-box-shadow: 0px 1px 5px 0px #000000;
		-moz-box-shadow:    0px 1px 5px 0px #000000;
		box-shadow:         0px 1px 5px 0px #000000;
		font-size: 12px;

		bottom:0;;
		opacity:0.9;

	}

	.lgcookieslaw_banner > form
	{
		position:relative;
	}

	.lgcookieslaw_banner span.lgcookieslaw_btn
	{
		border-color: #8BC954 !important;
		background: #8BC954 !important;
		color: #FFFFFF !important;
		text-align: center;
		margin: 5px 0px 5px 0px;
		padding: 5px 5px;
		display: inline-block;
		border: 0;
		font-weight: bold;
		height: 26px;
		line-height: 16px;
		width: auto;
		font-size: 12px;
		cursor: pointer;
	}

	.lgcookieslaw_banner span:hover.lgcookieslaw_btn
	{
		moz-opacity:0.85;
		opacity: 0.85;
		filter: alpha(opacity=85);
	}

	.lgcookieslaw_banner a.lgcookieslaw_btn
	{
		border-color: #5BC0DE;
		background: #5BC0DE;
		color: #FFFFFF !important;
		margin: 5px 0px 5px 0px;
		text-align: center;
		padding: 5px 5px;
		display: inline-block;
		border: 0;
		font-weight: bold;
		height: 26px;
		line-height: 16px;
		width: auto;
		font-size: 12px;
	}

	@media (max-width: 768px) {
		.lgcookieslaw_banner span.lgcookieslaw_btn,
		.lgcookieslaw_banner a.lgcookieslaw_btn {
			height: auto;
		}
	}

	.lgcookieslaw_banner a:hover.lgcookieslaw_btn
	{
		border-color: #5BC0DE;
		background: #5BC0DE;
		color: #FFFFFF !important;
		moz-opacity:0.85;
		opacity: 0.85;
		filter: alpha(opacity=85);
	}

	.lgcookieslaw_close_banner_btn
	{
		cursor:pointer;
		height:21px;
		max-width:21px;
		width:21px;
	}

	.lgcookieslaw_container {
		display:table;
		margin: 0 auto;
	}

	.lgcookieslaw_button_container {
		display:table-cell;
		padding:0px;
		vertical-align: middle;
	}

	.lgcookieslaw_button_container div{
		display:table-cell;
		padding: 0px 4px 0px 0px;
		vertical-align: middle;
	}

	.lgcookieslaw_message {
		display:table-cell;
		font-size: 12px;
		padding:2px 5px 5px 5px;
		vertical-align: middle;
	}

	.lgcookieslaw_message p {
		margin: 0;
		color: #FFFFFF !important;
	}

	.lgcookieslaw_btn-close {
		position:absolute;
		right:5px;
		top:5px;
	}
</style>

<script type="text/javascript">
    function closeinfo(accept)
    {
        var banners = document.getElementsByClassName("lgcookieslaw_banner");
        if( banners ) {
            for (var i = 0; i < banners.length; i++) {
                banners[i].style.display = 'none';
            }
        }

        if (typeof accept != 'undefined' && accept == true) {
            setCookie("__lglaw", 1, 31536000);
        }
    }

    function checkLgCookie()
    {
        return document.cookie.match(/^(.*;)?\s*__lglaw\s*=\s*[^;]+(.*)?$/);
    }

    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 1000));
        var expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    var lgbtnclick = function(){
        var buttons = document.getElementsByClassName("lgcookieslaw_btn_accept");
        if( buttons != null ) {
            for (var i = 0; i < buttons.length; i++) {
                buttons[i].addEventListener("click", function () {
                    closeinfo(true);

                });
            }
        }
    };

    window.addEventListener('load',function(){
        if( checkLgCookie() ) {
            closeinfo();
        } else {


            lgbtnclick();
        }
    });

</script>
    <link rel="manifest" href="/modules/wkpwa/manifest.json">

<meta name="mobile-web-app-capable" content="yes">
<meta name="application-name" content="priximbattable">
<meta name="theme-color" content="#e1e1e1">

<!-- Add to home screen for Safari on iOS -->
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="#e1e1e1">
<meta name="apple-mobile-web-app-title" content="priximbattable">
<link rel="apple-touch-icon" href="/modules/wkpwa/views/img/appIcon/wk-pwa-logo-152x152.png">

<!-- Tile Icon for Windows -->
<meta name="msapplication-TileImage" content="/modules/wkpwa/views/img/appIcon/wk-pwa-favicon-72x72.png">
<meta name="msapplication-TileColor" content="#e1e1e1">
<meta name="msapplication-starturl" content="https://priximbattable.net/">





      <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/themes/classic/assets/css/newAlu.css" />

    <link rel="stylesheet" href="/themes/classic/assets/css/styles.css">
<script>

 function checkSelection(val){

	var selectElmt = document.getElementById("contact_motif");
var valeurselectionnee = selectElmt.options[selectElmt.selectedIndex].value;

    var x = document.getElementById("contact_facture");
	var y = document.getElementById("form");
	var z = document.getElementById("num_transporteur");
    if(val=='2' || val=='4' || val=='5' || val=='6'){
    x.style.display = "block";
    } else {
    x.style.display = "none";
    }

	 if(val=='3'){
    y.style.display = "none";
	z.style.display = "block";
    } else {
    y.style.display = "block";
	z.style.display = "none";
    }

}

</script>

  </head>

  <body id="cms" class="lang-fr country-fr currency-eur layout-full-width page-cms tax-display-enabled cms-id-1">


      <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NNVWQF&nojscript=true"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->


    <main>



      <header id="header">


<!-- Miguel removido <div class="divLoading">
  <div class="divLoadingImg"></div>
</div>-->


<div class="header-banner">

</div>



<nav class="header-nav">
  <div class="container">
    <div class="row">
      <div class="hidden-md-down">

        <div class="col-md-1" style="text-align: center; padding-top: 5px; padding-bottom: 5px;">
          <img loading="lazy" src="https://priximbattable.net/img/fr.png" style="height: 30px;" alt="France" title="France">
        </div>

        <div class="col-md-10" style="text-align: center; padding-top: 5px; padding-bottom: 5px;">
                    <p class="alu_p_fabricante1">
            Visualiser nos produits chez vous avec l’application de réalité augmentée <strong>AR Viewer PrixImbattable</strong>
                          <a href="https://priximbattable.net/content/26-application-ar-viewer-prix-imbattable-visualiser-nos-produits-chez-vous" class="botaoApp3D">Cliquez ici</a>
                      </p>
        </div>
        <div class="col-md-1" style="text-align: center; padding-top: 5px; padding-bottom: 5px;">
          <img loading="lazy" src="https://priximbattable.net/img/ue.png" style="height: 30px;" alt="Union Européenne" title="Union Européenne">
        </div>

        <!--<div class="col-md-8 col-xs-12">

                        <div class="sp_customhtml_2_16151864781211515144
		support-info spcustom_html">
                                        <ul>
<li class="phone-support">Service client : <strong>TÉL : 04 72 80 93 54  -  Lundi au Vendredi : 8h30/12h30 - 13h/18h</strong><strong> </strong></li>
</ul>
                    </div>


        </div>
        <div class="col-md-4 right-nav">
          <div class="tablet-view-phone">
            <ul>
              <li class="phone-support"><strong><a href="tel:04 72 80 93 54"><i class="material-icons">phone</i> 04 72 80 93 54</a> </strong></li>
            </ul>
          </div>
          <div id="_desktop_contact_link" class="hidden-md-down">
  <div id="contact-link">
          <div style="text-align: center; margin-top: 7px; margin-left: 60px;">
        <div class="row">
          <div class="col-md-12">
            <i class="material-icons" style="color: red;">phone</i>
          </div>
        </div>
        <div class="row" style="width: 144px;">
          <div class="col-md-12">
            <span style="font-size: 1rem;">04 72 80 93 54</span>
          </div>
        </div>
      </div>
      </div>
</div>


         <div class="currencies">
              <a rel="nofollow" href="https://priximbattable.net/content/27-concours-anniversaire?SubmitCurrency=1&id_currency=1" title="Euro"><img loading="lazy" src="https://priximbattable.nethttps://priximbattable.net/img/flag_fr.png" alt="" /> €</a> | <a rel="nofollow" href="https://priximbattable.net/content/27-concours-anniversaire?SubmitCurrency=1&id_currency=2" title="Franc suisse"><img loading="lazy" src="https://priximbattable.nethttps://priximbattable.net/img/flag_chf.png" alt="" /> CHF</a>
          </div>-->
        </div>

      </div>
      <div class="hidden-md-up text-sm-center mobile">

        <div class="clearfix"></div>
        <div class="top-logo" id="_mobile_logo"></div>

        <div class="header-mobile" style="margin-left: 0px;">
          <!-- <div class="float-xs-left" id="menu-icon">
            <i class="material-icons d-inline">&#xE5D2;</i>
          </div> -->

          <div class="float-xs-right" id="_mobile_cart"></div>
          <div class="float-xs-right" id="_mobile_user_info"></div>
          <div class="float-xs-right" id="_mobile_contact">
            <div class="user-info">
              <a href="https://priximbattable.net/nous-contacter">
                <i class="material-icons">mail_outline&nbsp;</i>
              </a>
            </div>
          </div>
          <div class="float-xs-right" id="_mobile_number">
            <div class="user-info">
            <a href="tel:04 72 80 93 54"><i class="material-icons">phone</i></a>
            </div>
          </div>

  		    <!--<div class="float-xs-right" id="_mobile_flag">
    			  <div class="currencies">
    				  <a rel="nofollow" href="https://priximbattable.net/content/27-concours-anniversaire?SubmitCurrency=1&id_currency=1" title="Euro"><img loading="lazy" src="https://priximbattable.nethttps://priximbattable.net/img/flag_fr.png" alt="" /> €</a> | <a rel="nofollow" href="https://priximbattable.net/content/27-concours-anniversaire?SubmitCurrency=1&id_currency=2" title="Franc suisse"><img loading="lazy" src="https://priximbattable.nethttps://priximbattable.net/img/flag_chf.png" alt="" /> CHF</a>
    			  </div>
    		  </div>-->
          <!--<div class="float-xs-right" id="_mobile_chat">
            <div class="user-info">
              <a href="#" data-toggle="modal" data-target="#exampleModal"><i class="material-icons">headset_mic</i></a>
            </div>
          </div>-->
          <div class="clearfix"></div>

        </div>
      </div>
    </div>
  </div>
</nav>



<div class="header-top">
  <div class="container">
    <div class="row">

      <div class="col-md-4 hidden-sm-down" id="_desktop_logo">
        <a href="https://priximbattable.net/">
          <img loading="lazy" class="logo img-responsive" src="https://priximbattable.net/img/priximbattable-logo-1547030832.jpg" alt="priximbattable">
        </a>
      </div>

      <div class="col-md-3 col-sm-12 position-static">
        <div class="row">
          <!-- Block search module TOP -->
<div id="search_widget" class="col-sm-12 search-widget" data-search-controller-url="//priximbattable.net/recherche">
	<form method="get" action="//priximbattable.net/recherche">
		<input type="hidden" name="controller" value="search">
		<input type="text" name="s" value="" placeholder="Rechercher" aria-label="Rechercher" class="newAlu_inputSearch">
		<button type="submit">
			<i class="material-icons search">&#xE8B6;</i>
      <span class="hidden-xl-down">Rechercher</span>
		</button>
	</form>
</div>
<!-- /Block search module TOP -->
<div class="pedagogique-3_4_fois_oney">
  <div class="overlay-oney">
    <div class="header-pedagogique">
      <img loading="lazy" src="https://priximbattable.net/modules/oney/viewshttps://priximbattable.net/img/logo_oney.png" alt="Oney">
      <div class="title_block" >
                  <span>Paiement <span>par carte bancaire</span></span>
              </div>
              <div class="close-pedagogique oney_icons">
          <i class="material-icons">&#xe5cd;</i>
        </div>
          </div>
    <div class="content-pedagogique">
      <div class="step_nbr-pedagogique">
        <span class="nbr-pedagogique">1</span>
        <span class="nbr-pedagogique">2</span>
        <span class="nbr-pedagogique">3</span>
      </div>
      <div class="step-pedagogique">
        <div class="bloc-pedagogique">
          <div class="content-align">
            <p class="title-pedagogique">Choisissez</p>
            <div class="choix-pedagogique">
              <img loading="lazy" src="https://priximbattable.net/modules/oney/viewshttps://priximbattable.net/img/oney-financement_small_3.png" alt="">
              <span>ou</span>
              <img loading="lazy" src="https://priximbattable.net/modules/oney/viewshttps://priximbattable.net/img/oney-financement_small_4.png" alt="">
            </div>
            <p>Lorsque vous sélectionnez votre mode de paiement</p>
            <img loading="lazy" src="https://priximbattable.net/modules/oney/viewshttps://priximbattable.net/img/logo_cart_oney.png" class="logos_cart_oney" alt="">
          </div><span class="align-oney"></span>
        </div>
        <div class="bloc-pedagogique">
          <div class="content-align">
            <p class="title-pedagogique">Dites nous <span>tout</span></p>
            <p>Facile et rapide, complétez le formulaire, sans fournir aucun document.</p>
          </div><span class="align-oney"></span>
        </div>
        <div class="bloc-pedagogique">
          <div class="content-align">
            <p class="title-pedagogique">Et voilà !</p>
            <p>Vous avez une réponse immédiate.</p>
          </div><span class="align-oney"></span>
        </div>
      </div>
      <div class="footer-pedagogique">
                              <p>Valable pour tout achat de 150€ à 6000€. Offre de financement sans assurance avec apport obligatoire, réservée aux particuliers. Sous réserve d&#039;acceptation par Oney Bank. Vous disposez d&#039;un délai de 14 jours pour renoncer à votre crédit. Oney Bank - SA au capital de 51 286 585 euros - 34 Avenue de Flandre 59170 Croix - 546 380 197 RCS Lille Métropole - n°Orias 07 023 261 www.orias.fr</p>
                        </div>
    </div>
  </div><span class="align-oney"></span>
</div>
<div class="oney_credit_simulateur">
  <div class="popin financement-long">
    <div class="popin-body">
      <div id="close-oney_credit_simulateur" class="close">
        <i class="material"></i>
      </div>
      <div class="popin-body-left">
        <h1>Simulez <strong>votre financement</strong></h1>
        <div class="somme-line">
            <div class="somme">
              <span id="amount">
                <input type="text" class="amount-input" id="input-credit_amount" value="1200" />
              </span> &euro;
            </div>
            <input type="button" class="btn-green" value="Simuler" id="btn-simuler_credit" />
        </div>
        <div class="details">
          <div class="spinner-container">
              <svg width="71px" height="71px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"
                    preserveAspectRatio="xMidYMid" class="lds-ellipsis" style="background: none;">
                  <!--circle(cx="16",cy="50",r="10")-->
                  <circle cx="84" cy="50" r="0" fill="#81bc00">
                      <animate attributeName="r" values="6;0;0;0;0" keyTimes="0;0.25;0.5;0.75;1"
                                keySplines="0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1" calcMode="spline"
                                dur="2.6s" repeatCount="indefinite" begin="0s"></animate>
                      <animate attributeName="cx" values="84;84;84;84;84" keyTimes="0;0.25;0.5;0.75;1"
                                keySplines="0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1" calcMode="spline"
                                dur="2.6s" repeatCount="indefinite" begin="0s"></animate>
                  </circle>
                  <circle cx="16" cy="50" r="2.40735" fill="#81bc00">
                      <animate attributeName="r" values="0;6;6;6;0" keyTimes="0;0.25;0.5;0.75;1"
                                keySplines="0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1" calcMode="spline"
                                dur="2.6s" repeatCount="indefinite" begin="-1.3s"></animate>
                      <animate attributeName="cx" values="16;16;50;84;84" keyTimes="0;0.25;0.5;0.75;1"
                                keySplines="0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1" calcMode="spline"
                                dur="2.6s" repeatCount="indefinite" begin="-1.3s"></animate>
                  </circle>
                  <circle cx="84" cy="50" r="3.59265" fill="#81bc00">
                      <animate attributeName="r" values="0;6;6;6;0" keyTimes="0;0.25;0.5;0.75;1"
                                keySplines="0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1" calcMode="spline"
                                dur="2.6s" repeatCount="indefinite" begin="-0.65s"></animate>
                      <animate attributeName="cx" values="16;16;50;84;84" keyTimes="0;0.25;0.5;0.75;1"
                                keySplines="0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1" calcMode="spline"
                                dur="2.6s" repeatCount="indefinite" begin="-0.65s"></animate>
                  </circle>
                  <circle cx="63.6417" cy="50" r="6" fill="#81bc00">
                      <animate attributeName="r" values="0;6;6;6;0" keyTimes="0;0.25;0.5;0.75;1"
                                keySplines="0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1" calcMode="spline"
                                dur="2.6s" repeatCount="indefinite" begin="0s"></animate>
                      <animate attributeName="cx" values="16;16;50;84;84" keyTimes="0;0.25;0.5;0.75;1"
                                keySplines="0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1" calcMode="spline"
                                dur="2.6s" repeatCount="indefinite" begin="0s"></animate>
                  </circle>
                  <circle cx="29.6417" cy="50" r="6" fill="#81bc00">
                      <animate attributeName="r" values="0;0;6;6;6" keyTimes="0;0.25;0.5;0.75;1"
                                keySplines="0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1" calcMode="spline"
                                dur="2.6s" repeatCount="indefinite" begin="0s"></animate>
                      <animate attributeName="cx" values="16;16;16;50;84" keyTimes="0;0.25;0.5;0.75;1"
                                keySplines="0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1" calcMode="spline"
                                dur="2.6s" repeatCount="indefinite" begin="0s"></animate>
                  </circle>
              </svg>
          </div>
          <div class="block-opc" data-position="2">
            <div class="nav-prev"><</div>
            <div class="opc-container" data-active="active-1">
                <div class="simulation-fail">
                </div>
                <div class="opc-liste" id="transactions-list">
                </div>
            </div>
            <div class="nav-next">></div>
            <div class="dots-container">
              <ul class="dots-list">
              </ul>
            </div>
          </div>
        </div>
        <div class="recaps-container">
        </div>
      </div>
      <div class="popin-body-right">
        <div class="popin-body-right-header">
          Comment en <strong>profiter ?</strong>
          <div class="btn-open">&gt;</div>
        </div>
        <ul class="liste-points">
          <li class="liste-points-elt">
            <strong>Choisissez</strong>
            <p class="freq big-text"><span class="value">12</span><span class="unit">x</span></p>
            <img loading="lazy" class="freq-logo-oney" src="https://priximbattable.net/modules/mh_oney/viewshttps://priximbattable.net/img/logo_oney.svg" alt="" >
            <div class="ajuster">lorsque vous sélectionnez votre moyen de paiement</div>
          </li>
          <li class="liste-points-elt">
            <strong>Complétez le formulaire</strong>
            <br/>
            <div class="ajuster">et obtenez une réponse de principe</div>
          </li>
          <li class="liste-points-elt">
            <strong>Téléchargez vos pièces justificatives dans un délai de 72h</strong>
            <br/>
            <div class="ajuster">et signez ensuite électroniquement votre contrat.</div>
          </li>
          <li class="liste-points-elt">
            <strong>Commencez à rembourser</strong>
            <br/>
            <div class="ajuster">dès la validation définitive de votre dossier.</div>
          </li>
        </ul>
      </div>
    </div>
    <div class="popin-footer">
      <p class="legals">
      </p>
    </div>
  </div>
</div>
<!-- Module Presta Blog -->

<div id="prestablog_displayslider">


</div>

<!-- Module Presta Blog -->
<div id="wk-loader"></div>
<div id="wk-site-connection">
    <p id="wk-connection-msg"></p>
</div>
          <div class="clearfix"></div>
        </div>
      </div>

              <!-- <div class="user-info">
      <a class="login" href="" rel="nofollow" title="Identifiez-vous">Connexion</a>
  </div>
 -->
        <!--  -->

             <!-- <div id="_desktop_contact_link" class="hidden-md-down">
  <div id="contact-link">
          <div style="text-align: center; margin-top: 7px; margin-left: 60px;">
        <div class="row">
          <div class="col-md-12">
            <i class="material-icons" style="color: red;">phone</i>
          </div>
        </div>
        <div class="row" style="width: 144px;">
          <div class="col-md-12">
            <span style="font-size: 1rem;">04 72 80 93 54</span>
          </div>
        </div>
      </div>
      </div>
</div>
-->

              <!--<div class="currencies2 hidden-md-down">
          <a rel="nofollow" href="https://priximbattable.net/content/27-concours-anniversaire?SubmitCurrency=1&id_currency=1" title="Euro"><img loading="lazy" src="https://priximbattable.nethttps://priximbattable.net/img/flag_fr.png" alt="" /> €</a> | <a rel="nofollow" href="https://priximbattable.net/content/27-concours-anniversaire?SubmitCurrency=1&id_currency=2" title="Franc suisse"><img loading="lazy" src="https://priximbattable.nethttps://priximbattable.net/img/flag_chf.png" alt="" /> CHF</a>
        </div>-->

      <div class="col-md-5 hidden-sm-down right-nav">
        <div style="width: 127px; margin-top: 6px; position: absolute;">
          <div class="row">
            <div class="col-md-12" style="text-align: center; margin-bottom: 4px;">
              <img loading="lazy" src="https://priximbattable.net/img/icon_contact.png" alt="Contactez nous" style="margin: 0px auto;" width="20px">
            </div>
          </div>
          <div class="row">
            <div class="col-md-12" style="text-align: center;">
              <a title="Contactez nous" href="https://priximbattable.net/service-client.php">
                Contactez nous
              </a>
            </div>
          </div>
        </div>
        <!-- <div id="_desktop_user_info" style="margin-top: 50px; margin-left: -90px; width: 150px;"> -->
<div id="_desktop_user_info" style="margin-top: 50px; width: 150px; margin-left: 598px !important;">
  <div class="user-info" style="">

      <!-- desktop -->
      <div class="hidden-md-down" style="text-align: center; margin-top: 26px; margin-left: -20px !important;">
        <div class="row">
          <div class="col-md-12">
            <i class="material-icons text-danger">&#xE7FF;</i>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <a href="https://priximbattable.net/mon-compte" title="Identifiez-vous" rel="nofollow">
              <span class="hidden-sm-down" style="color: #7a7a7a; text-transform: capitalize; font-weight: normal; font-size: 16px;">Connexion</span>
            </a>
          </div>
        </div>
      </div>

      <!-- mobile -->
      <div class="hidden-md-up">
        <a href="https://priximbattable.net/mon-compte" title="Identifiez-vous" rel="nofollow">
          <i class="material-icons text-danger">&#xE7FF;</i>
          <span class="hidden-sm-down" style="color: #7a7a7a; text-transform: capitalize; font-weight: normal; font-size: 16px;">Connexion</span>
        </a>
      </div>

      </div>
</div>
<div id="_desktop_cart">
  <div class="blockcart cart-preview inactive" data-refresh-url="//priximbattable.net/module/ps_shoppingcart/ajax">
    <div class="header">

      <div style="text-align: center; margin-top: -12px; position: absolute;" class="custom-align-shopping">
        <div class="row">
          <div class="col-md-12">
                        <img loading="lazy" src="https://priximbattable.net/img/icon_cart.png" class="hidden-md-down" alt="" >
            <img loading="lazy" src="https://priximbattable.net/img/icon_cart_gray.png" class="hidden-md-up" style="margin-top: 8px;" alt="" >
                        <span class="cart-products-count">0</span>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
                          <!-- <i class="material-icons shopping-cart">shopping_cart</i> -->
              <span class="hidden-sm-down">Panier</span>
                      </div>
        </div>
      </div>

    </div>
  </div>
</div>
<!-- Module Presta Blog -->

<div id="_prestablog_index" style="margin-left: 143px; margin-top: -32px; width: 100px;">
	<div class="row">
		<div class="col-md-12" style="text-align: center; margin-bottom: 4px;">
			<img loading="lazy" src="https://priximbattable.net/img/blog.png" alt="Blog" width="20px" style="margin: 0px auto;">
		</div>
	</div>
	<div class="row">
		<div class="col-md-12" style="text-align: center;">
			<a title="Blog" href="https://priximbattable.net/blog">
				Blog
			</a>
		</div>
	</div>
</div>
<!-- /Module Presta Blog -->

      </div>

    </div>
    <!-- <div id="mobile_top_menu_wrapper" class="row hidden-md-up" style="display:none;">
      <div class="js-top-menu mobile" id="_mobile_top_menu"></div>
      <div class="js-top-menu-bottom">
        <div id="_mobile_currency_selector"></div>
        <div id="_mobile_language_selector"></div>
        <div id="_mobile_contact_link"></div>
        <ul>
          <li><a href="https://priximbattable.net/50-portail">Portail</a></li>
          <li><a href="https://priximbattable.net/6-cloture">Clôture</a></li>
          <li><a href="https://priximbattable.net/7-automatisme">Automatisme</a></li>
          <li><a href="https://priximbattable.net/8-porte-de-garage">Porte de garage</a></li>
          <li><a href="https://priximbattable.net/9-volet">Volet</a></li>
          <li><a href="https://priximbattable.net/10-fenetre">Fenêtre</a></li>
          <li><a href="https://priximbattable.net/11-porte-d-entree">Porte d'entrée</a></li>
          <li><a href="https://priximbattable.net/12-verriere">Verrière</a></li>
          <li><a href="https://priximbattable.net/13-pergola">Pergola</a></li>
          <li><a href="https://priximbattable.net/48-abri-de-voiture">Abri de voiture</a></li>
          <li><a href="https://priximbattable.net/57-jardin">Jardin</a></li>
        </ul>
      </div>
    </div> -->
  </div>
</div>
    <div class="ets_mm_megamenu
        layout_layout3
         show_icon_in_mobile

        transition_fade
        transition_floating

        sticky_enabled

        ets-dir-ltr        hook-default        single_layout         disable_sticky_mobile         "
        data-bggray="bg_gray"
        style="z-index: 1001 !important;"
        >
        <div class="ets_mm_megamenu_content">
            <div class="container">
                <div class="ets_mm_megamenu_content_content">
                    <div class="ybc-menu-toggle ybc-menu-btn closed">
                        <span class="ybc-menu-button-toggle_icon">
                            <i class="icon-bar"></i>
                            <i class="icon-bar"></i>
                            <i class="icon-bar"></i>
                        </span>
                        Menu
                    </div>
                        <ul class="mm_menus_ul  clicktext_show_submenu " >
        <li class="close_menu">
            <div class="pull-left">
                <span class="mm_menus_back">
                    <i class="icon-bar"></i>
                    <i class="icon-bar"></i>
                    <i class="icon-bar"></i>
                </span>
                Menu
            </div>
            <div class="pull-right">
                <span class="mm_menus_back_icon"></span>
                Retour
            </div>
        </li>
                    <li  class="mm_menus_li mm_sub_align_full mm_has_sub" >
            <a  href="https://priximbattable.net/50-portail" style="font-size:14px;">
                    <span class="mm_menu_content_title" data-idmenu="2">
                                                Portail
                        <span class="mm_arrow"></span>                                            </span>
                </a>
                                                    <span class="arrow closed"></span>                                                <ul class="mm_columns_ul" style=" width:100%; font-size:14px;">
                                                                    <li class="mm_columns_li column_size_4  mm_has_sub">
                                                                                    <ul class="mm_blocks_ul">
                                                                                                    <li data-id-block="1" class="mm_blocks_li">

    <div class="ets_mm_block mm_block_type_image ">
        <h4  style="height: 34px; font-size:14px">Portail Aluminium Battant</h4>
        <div class="ets_mm_block_content">
                            <a href="https://priximbattable.net/51-portail-aluminium-battant">                    <span class="mm_img_content">
                        <img loading="lazy" src="https://priximbattable.net/modules/ets_megamenu/views/img/upload/capa-portao-batente.jpg" alt="Portail Aluminium Battant" />
                                            </span>
                </a>                    </div>
    </div>
    <div class="clearfix"></div>

                                                    </li>
                                                                                            </ul>
                                                                            </li>
                                                                    <li class="mm_columns_li column_size_4  mm_has_sub">
                                                                                    <ul class="mm_blocks_ul">
                                                                                                    <li data-id-block="2" class="mm_blocks_li">

    <div class="ets_mm_block mm_block_type_image ">
        <h4  style="height: 34px; font-size:14px">Portail Aluminium Coulissant</h4>
        <div class="ets_mm_block_content">
                            <a href="https://priximbattable.net/52-portail-aluminium-coulissant">                    <span class="mm_img_content">
                        <img loading="lazy" src="https://priximbattable.net/modules/ets_megamenu/views/img/upload/capa-portao-correr-am.jpg" alt="Portail Aluminium Coulissant" />
                                            </span>
                </a>                    </div>
    </div>
    <div class="clearfix"></div>

                                                    </li>
                                                                                            </ul>
                                                                            </li>
                                                                    <li class="mm_columns_li column_size_4  mm_has_sub">
                                                                                    <ul class="mm_blocks_ul">
                                                                                                    <li data-id-block="3" class="mm_blocks_li">

    <div class="ets_mm_block mm_block_type_image ">
        <h4  style="height: 34px; font-size:14px">Portillon Aluminium</h4>
        <div class="ets_mm_block_content">
                            <a href="https://priximbattable.net/53-portillon-aluminium">                    <span class="mm_img_content">
                        <img loading="lazy" src="https://priximbattable.net/modules/ets_megamenu/views/img/upload/d817b96599-portillon.jpg" alt="Portillon Aluminium" />
                                            </span>
                </a>                    </div>
    </div>
    <div class="clearfix"></div>

                                                    </li>
                                                                                            </ul>
                                                                            </li>
                                                                    <li class="mm_columns_li column_size_4  mm_has_sub">
                                                                                    <ul class="mm_blocks_ul">
                                                                                                    <li data-id-block="4" class="mm_blocks_li">

    <div class="ets_mm_block mm_block_type_image ">
        <h4  style="height: 34px; font-size:14px">Portail Aluminium Battant Sur Mesure</h4>
        <div class="ets_mm_block_content">
                            <a href="https://priximbattable.net/55-portail-aluminium-battant-sur-mesure">                    <span class="mm_img_content">
                        <img loading="lazy" src="https://priximbattable.net/modules/ets_megamenu/views/img/upload/portaobatente_surmesure.jpg" alt="Portail Aluminium Battant Sur Mesure" />
                                            </span>
                </a>                    </div>
    </div>
    <div class="clearfix"></div>

                                                    </li>
                                                                                            </ul>
                                                                            </li>
                                                                    <li class="mm_columns_li column_size_4  mm_has_sub">
                                                                                    <ul class="mm_blocks_ul">
                                                                                                    <li data-id-block="5" class="mm_blocks_li">

    <div class="ets_mm_block mm_block_type_image ">
        <h4  style="height: 34px; font-size:14px">Portail Aluminium Coulissant Sur Mesure</h4>
        <div class="ets_mm_block_content">
                            <a href="https://priximbattable.net/56-portail-aluminium-coulissant-sur-mesure">                    <span class="mm_img_content">
                        <img loading="lazy" src="https://priximbattable.net/modules/ets_megamenu/views/img/upload/portaodecorrer_surmesure.jpg" alt="Portail Aluminium Coulissant Sur Mesure" />
                                            </span>
                </a>                    </div>
    </div>
    <div class="clearfix"></div>

                                                    </li>
                                                                                            </ul>
                                                                            </li>
                                                                    <li class="mm_columns_li column_size_4  mm_has_sub">
                                                                                    <ul class="mm_blocks_ul">
                                                                                                    <li data-id-block="6" class="mm_blocks_li">

    <div class="ets_mm_block mm_block_type_image ">
        <h4  style="height: 34px; font-size:14px">Portillon Aluminium Sur Mesure</h4>
        <div class="ets_mm_block_content">
                            <a href="https://priximbattable.net/65-portillon-aluminium-sur-mesure">                    <span class="mm_img_content">
                        <img loading="lazy" src="https://priximbattable.net/modules/ets_megamenu/views/img/upload/portaopedonal_surmesure.jpg" alt="Portillon Aluminium Sur Mesure" />
                                            </span>
                </a>                    </div>
    </div>
    <div class="clearfix"></div>

                                                    </li>
                                                                                            </ul>
                                                                            </li>
                                                            </ul>

            </li>
                    <li  class="mm_menus_li mm_sub_align_full mm_has_sub" >
            <a  href="https://priximbattable.net/6-cloture" style="font-size:14px;">
                    <span class="mm_menu_content_title" data-idmenu="3">
                                                Clôture
                        <span class="mm_arrow"></span>                                            </span>
                </a>
                                                    <span class="arrow closed"></span>                                                <ul class="mm_columns_ul" style=" width:100%; font-size:14px;">
                                                                    <li class="mm_columns_li column_size_4  mm_has_sub">
                                                                                    <ul class="mm_blocks_ul">
                                                                                                    <li data-id-block="8" class="mm_blocks_li">

    <div class="ets_mm_block mm_block_type_image ">
        <h4  style="height: 34px; font-size:14px">Clôture Grillage Rigide Acier Panneau Soudé Maille 100x55</h4>
        <div class="ets_mm_block_content">
                            <a href="https://priximbattable.net/21-cloture-grillage-rigide-acier-panneau-soude">                    <span class="mm_img_content">
                        <img loading="lazy" src="https://priximbattable.net/modules/ets_megamenu/views/img/upload/rederigida_topprix100.jpg" alt="Clôture Grillage Rigide Acier Panneau Soudé Maille 100x55" />
                                            </span>
                </a>                    </div>
    </div>
    <div class="clearfix"></div>

                                                    </li>
                                                                                            </ul>
                                                                            </li>
                                                                    <li class="mm_columns_li column_size_4  mm_has_sub">
                                                                                    <ul class="mm_blocks_ul">
                                                                                                    <li data-id-block="9" class="mm_blocks_li">

    <div class="ets_mm_block mm_block_type_image ">
        <h4  style="height: 34px; font-size:14px">Clôture Grillage Rigide Acier Panneau Soudé Maille 200x55</h4>
        <div class="ets_mm_block_content">
                            <a href="https://priximbattable.net/108-cloture-grillage-rigide-acier-panneau-soude-maille-200x55">                    <span class="mm_img_content">
                        <img loading="lazy" src="https://priximbattable.net/modules/ets_megamenu/views/img/upload/rederigida_topprix200.jpg" alt="Clôture Grillage Rigide Acier Panneau Soudé Maille 200x55" />
                                            </span>
                </a>                    </div>
    </div>
    <div class="clearfix"></div>

                                                    </li>
                                                                                            </ul>
                                                                            </li>
                                                                    <li class="mm_columns_li column_size_4  mm_has_sub">
                                                                                    <ul class="mm_blocks_ul">
                                                                                                    <li data-id-block="53" class="mm_blocks_li">

    <div class="ets_mm_block mm_block_type_image ">
        <h4  style="height: 34px; font-size:14px">Clôture Grillage Rigide Acier Panneau Soudé Maille 200x55 Fil de 5 mm</h4>
        <div class="ets_mm_block_content">
                            <a href="https://priximbattable.net/117-cloture-grillage-rigide-pro-acier-panneau-soude-maille-200x55-fil-de-5mm">                    <span class="mm_img_content">
                        <img loading="lazy" src="https://priximbattable.net/modules/ets_megamenu/views/img/upload/rederigida_gammepro.png" alt="Clôture Grillage Rigide Acier Panneau Soudé Maille 200x55 Fil de 5 mm" />
                                            </span>
                </a>                    </div>
    </div>
    <div class="clearfix"></div>

                                                    </li>
                                                                                            </ul>
                                                                            </li>
                                                                    <li class="mm_columns_li column_size_4  mm_has_sub">
                                                                                    <ul class="mm_blocks_ul">
                                                                                                    <li data-id-block="10" class="mm_blocks_li">

    <div class="ets_mm_block mm_block_type_image ">
        <h4  style="height: 34px; font-size:14px">Garde Corps</h4>
        <div class="ets_mm_block_content">
                            <a href="https://priximbattable.net/23-garde-corps">                    <span class="mm_img_content">
                        <img loading="lazy" src="https://priximbattable.net/modules/ets_megamenu/views/img/upload/5d10696d3b-gard_corps.jpg" alt="Garde Corps" />
                                            </span>
                </a>                    </div>
    </div>
    <div class="clearfix"></div>

                                                    </li>
                                                                                            </ul>
                                                                            </li>
                                                                    <li class="mm_columns_li column_size_4  mm_has_sub">
                                                                                    <ul class="mm_blocks_ul">
                                                                                                    <li data-id-block="7" class="mm_blocks_li">

    <div class="ets_mm_block mm_block_type_image ">
        <h4  style="height: 34px; font-size:14px">Clôture Aluminium</h4>
        <div class="ets_mm_block_content">
                            <a href="https://priximbattable.net/20-cloture-aluminium">                    <span class="mm_img_content">
                        <img loading="lazy" src="https://priximbattable.net/modules/ets_megamenu/views/img/upload/cloture-submenu.jpg" alt="Clôture Aluminium" />
                                            </span>
                </a>                    </div>
    </div>
    <div class="clearfix"></div>

                                                    </li>
                                                                                            </ul>
                                                                            </li>
                                                                    <li class="mm_columns_li column_size_4  mm_has_sub">
                                                                                    <ul class="mm_blocks_ul">
                                                                                                    <li data-id-block="11" class="mm_blocks_li">

    <div class="ets_mm_block mm_block_type_image ">
        <h4  style="height: 34px; font-size:14px">Barrière de Piscine</h4>
        <div class="ets_mm_block_content">
                            <a href="https://priximbattable.net/106-barriere-de-piscine">                    <span class="mm_img_content">
                        <img loading="lazy" src="https://priximbattable.net/modules/ets_megamenu/views/img/upload/e2a31e3ee8-piscina.jpg" alt="Barrière de Piscine" />
                                            </span>
                </a>                    </div>
    </div>
    <div class="clearfix"></div>

                                                    </li>
                                                                                            </ul>
                                                                            </li>
                                                            </ul>

            </li>
                    <li  class="mm_menus_li mm_sub_align_full mm_has_sub" >
            <a  href="https://priximbattable.net/7-automatisme" style="font-size:14px;">
                    <span class="mm_menu_content_title" data-idmenu="4">
                                                Automatisme
                        <span class="mm_arrow"></span>                                            </span>
                </a>
                                                    <span class="arrow closed"></span>                                                <ul class="mm_columns_ul" style=" width:100%; font-size:14px;">
                                                                    <li class="mm_columns_li column_size_4  mm_has_sub">
                                                                                    <ul class="mm_blocks_ul">
                                                                                                    <li data-id-block="63" class="mm_blocks_li">

    <div class="ets_mm_block mm_block_type_image ">
        <h4  style="height: 34px; font-size:14px">Motorisation</h4>
        <div class="ets_mm_block_content">
                            <a href="https://priximbattable.net/126-motorisation">                    <span class="mm_img_content">
                        <img loading="lazy" src="https://priximbattable.net/modules/ets_megamenu/views/img/upload/capa-menu-automatisme5-.jpg" alt="Motorisation" />
                                            </span>
                </a>                    </div>
    </div>
    <div class="clearfix"></div>

                                                    </li>
                                                                                            </ul>
                                                                            </li>
                                                                    <li class="mm_columns_li column_size_4  mm_has_sub">
                                                                                    <ul class="mm_blocks_ul">
                                                                                                    <li data-id-block="64" class="mm_blocks_li">

    <div class="ets_mm_block mm_block_type_image ">
        <h4  style="height: 34px; font-size:14px">Accessoires</h4>
        <div class="ets_mm_block_content">
                            <a href="https://priximbattable.net/127-accessoires">                    <span class="mm_img_content">
                        <img loading="lazy" src="https://priximbattable.net/modules/ets_megamenu/views/img/upload/2ecd06ff87-capa-grande-menu---acessorios---automatismos.jpg" alt="Accessoires" />
                                            </span>
                </a>                    </div>
    </div>
    <div class="clearfix"></div>

                                                    </li>
                                                                                            </ul>
                                                                            </li>
                                                            </ul>

            </li>
                    <li  class="mm_menus_li mm_sub_align_full mm_has_sub" >
            <a  href="https://priximbattable.net/8-porte-de-garage" style="font-size:14px;">
                    <span class="mm_menu_content_title" data-idmenu="5">
                                                Porte de Garage
                        <span class="mm_arrow"></span>                                            </span>
                </a>
                                                    <span class="arrow closed"></span>                                                <ul class="mm_columns_ul" style=" width:100%; font-size:14px;">
                                                                    <li class="mm_columns_li column_size_4  mm_has_sub">
                                                                                    <ul class="mm_blocks_ul">
                                                                                                    <li data-id-block="12" class="mm_blocks_li">

    <div class="ets_mm_block mm_block_type_image ">
        <h4  style="height: 34px; font-size:14px">Porte de Garage Sectionnelle 40 mm</h4>
        <div class="ets_mm_block_content">
                            <a href="https://priximbattable.net/24-porte-de-garage-sectionnelle-40-mm">                    <span class="mm_img_content">
                        <img loading="lazy" src="https://priximbattable.net/modules/ets_megamenu/views/img/upload/a310cc1d7c-porta de garagem seccionada.jpg" alt="Porte de Garage Sectionnelle 40 mm" />
                                            </span>
                </a>                    </div>
    </div>
    <div class="clearfix"></div>

                                                    </li>
                                                                                            </ul>
                                                                            </li>
                                                                    <li class="mm_columns_li column_size_4  mm_has_sub">
                                                                                    <ul class="mm_blocks_ul">
                                                                                                    <li data-id-block="13" class="mm_blocks_li">

    <div class="ets_mm_block mm_block_type_image ">
        <h4  style="height: 34px; font-size:14px">Porte de Garage Enroulable Motorisée</h4>
        <div class="ets_mm_block_content">
                            <a href="https://priximbattable.net/26-porte-de-garage-enroulable-motorisee">                    <span class="mm_img_content">
                        <img loading="lazy" src="https://priximbattable.net/modules/ets_megamenu/views/img/upload/6f902f15a3-porta de garagem de enrolar.jpg" alt="Porte de Garage Enroulable Motorisée" />
                                            </span>
                </a>                    </div>
    </div>
    <div class="clearfix"></div>

                                                    </li>
                                                                                            </ul>
                                                                            </li>
                                                                    <li class="mm_columns_li column_size_4  mm_has_sub">
                                                                                    <ul class="mm_blocks_ul">
                                                                                                    <li data-id-block="14" class="mm_blocks_li">

    <div class="ets_mm_block mm_block_type_image ">
        <h4  style="height: 34px; font-size:14px">Porte de Garage Aluminium Battant</h4>
        <div class="ets_mm_block_content">
                            <a href="https://priximbattable.net/25-porte-de-garage-aluminium-battant">                    <span class="mm_img_content">
                        <img loading="lazy" src="https://priximbattable.net/modules/ets_megamenu/views/img/upload/f868d1bb3f-porta de garagem de bater.jpg" alt="Porte de Garage Aluminium Battant" />
                                            </span>
                </a>                    </div>
    </div>
    <div class="clearfix"></div>

                                                    </li>
                                                                                            </ul>
                                                                            </li>
                                                            </ul>

            </li>
                    <li  class="mm_menus_li mm_sub_align_full mm_has_sub" >
            <a  href="https://priximbattable.net/9-volet" style="font-size:14px;">
                    <span class="mm_menu_content_title" data-idmenu="6">
                                                Volet
                        <span class="mm_arrow"></span>                                            </span>
                </a>
                                                    <span class="arrow closed"></span>                                                <ul class="mm_columns_ul" style=" width:100%; font-size:14px;">
                                                                    <li class="mm_columns_li column_size_3  mm_has_sub">
                                                                                    <ul class="mm_blocks_ul">
                                                                                                    <li data-id-block="16" class="mm_blocks_li">

    <div class="ets_mm_block mm_block_type_image ">
        <h4  style="height: 34px; font-size:14px">Volet Roulant Aluminium</h4>
        <div class="ets_mm_block_content">
                            <a href="https://priximbattable.net/27-volet-roulant-aluminium">                    <span class="mm_img_content">
                        <img loading="lazy" src="https://priximbattable.net/modules/ets_megamenu/views/img/upload/382afd5c49-volet.jpg" alt="Volet Roulant Aluminium" />
                                            </span>
                </a>                    </div>
    </div>
    <div class="clearfix"></div>

                                                    </li>
                                                                                            </ul>
                                                                            </li>
                                                                    <li class="mm_columns_li column_size_3  mm_has_sub">
                                                                                    <ul class="mm_blocks_ul">
                                                                                                    <li data-id-block="15" class="mm_blocks_li">

    <div class="ets_mm_block mm_block_type_image ">
        <h4  style="height: 34px; font-size:14px">Volet Battant Aluminium Isolé Penture Contre Penture</h4>
        <div class="ets_mm_block_content">
                            <a href="https://priximbattable.net/28-volet-battant-aluminium-isole-penture-contre-penture">                    <span class="mm_img_content">
                        <img loading="lazy" src="https://priximbattable.net/modules/ets_megamenu/views/img/upload/c7b7d39557-volet battant isole.jpg" alt="Volet Battant Aluminium Isolé Penture Contre Penture" />
                                            </span>
                </a>                    </div>
    </div>
    <div class="clearfix"></div>

                                                    </li>
                                                                                            </ul>
                                                                            </li>
                                                                    <li class="mm_columns_li column_size_3  mm_has_sub">
                                                                                    <ul class="mm_blocks_ul">
                                                                                                    <li data-id-block="17" class="mm_blocks_li">

    <div class="ets_mm_block mm_block_type_image ">
        <h4  style="height: 34px; font-size:14px">Volet Battant Aluminium BSO Brise Soleil Orientable</h4>
        <div class="ets_mm_block_content">
                            <a href="https://priximbattable.net/29-volet-battant-aluminium-bso-brise-soleil-orientable">                    <span class="mm_img_content">
                        <img loading="lazy" src="https://priximbattable.net/modules/ets_megamenu/views/img/upload/18e55123c9-volet battant brise soleil.jpg" alt="Volet Battant Aluminium BSO Brise Soleil Orientable" />
                                            </span>
                </a>                    </div>
    </div>
    <div class="clearfix"></div>

                                                    </li>
                                                                                            </ul>
                                                                            </li>
                                                                    <li class="mm_columns_li column_size_3  mm_has_sub">
                                                                                    <ul class="mm_blocks_ul">
                                                                                                    <li data-id-block="18" class="mm_blocks_li">

    <div class="ets_mm_block mm_block_type_image ">
        <h4  style="height: 34px; font-size:14px">Volet Battant Aluminium Isolé Sur Pré-Cadre</h4>
        <div class="ets_mm_block_content">
                            <a href="https://priximbattable.net/30-volet-battant-aluminium-isole-sur-pre-cadre">                    <span class="mm_img_content">
                        <img loading="lazy" src="https://priximbattable.net/modules/ets_megamenu/views/img/upload/2a1348b8d9-volet battant.jpg" alt="Volet Battant Aluminium Isolé Sur Pré-Cadre" />
                                            </span>
                </a>                    </div>
    </div>
    <div class="clearfix"></div>

                                                    </li>
                                                                                            </ul>
                                                                            </li>
                                                            </ul>

            </li>
                    <li  class="mm_menus_li mm_sub_align_full mm_has_sub" >
            <a  href="https://priximbattable.net/10-fenetre" style="font-size:14px;">
                    <span class="mm_menu_content_title" data-idmenu="7">
                                                Fenêtre
                        <span class="mm_arrow"></span>                                            </span>
                </a>
                                                    <span class="arrow closed"></span>                                                <ul class="mm_columns_ul" style=" width:100%; font-size:14px;">
                                                                    <li class="mm_columns_li column_size_3  mm_has_sub">
                                                                                    <ul class="mm_blocks_ul">
                                                                                                    <li data-id-block="19" class="mm_blocks_li">

    <div class="ets_mm_block mm_block_type_image ">
        <h4  style="height: 34px; font-size:14px">Baie Coulissante Aluminium Sur Mesure</h4>
        <div class="ets_mm_block_content">
                            <a href="https://priximbattable.net/44-baie-coulissante-aluminium-sur-mesure">                    <span class="mm_img_content">
                        <img loading="lazy" src="https://priximbattable.net/modules/ets_megamenu/views/img/upload/janelacorrer_surmesure.jpg" alt="Baie Coulissante Aluminium Sur Mesure" />
                                            </span>
                </a>                    </div>
    </div>
    <div class="clearfix"></div>

                                                    </li>
                                                                                            </ul>
                                                                            </li>
                                                                    <li class="mm_columns_li column_size_3  mm_has_sub">
                                                                                    <ul class="mm_blocks_ul">
                                                                                                    <li data-id-block="20" class="mm_blocks_li">

    <div class="ets_mm_block mm_block_type_image ">
        <h4  style="height: 34px; font-size:14px">Fenêtre Aluminium à Frappe Sur Mesure</h4>
        <div class="ets_mm_block_content">
                            <a href="https://priximbattable.net/61-fenetre-aluminium-a-frappe-sur-mesure">                    <span class="mm_img_content">
                        <img loading="lazy" src="https://priximbattable.net/modules/ets_megamenu/views/img/upload/janelabater_surmesure.jpg" alt="Fenêtre Aluminium à Frappe Sur Mesure" />
                                            </span>
                </a>                    </div>
    </div>
    <div class="clearfix"></div>

                                                    </li>
                                                                                            </ul>
                                                                            </li>
                                                                    <li class="mm_columns_li column_size_3  mm_has_sub">
                                                                                    <ul class="mm_blocks_ul">
                                                                                                    <li data-id-block="21" class="mm_blocks_li">

    <div class="ets_mm_block mm_block_type_image ">
        <h4  style="height: 34px; font-size:14px">Fenêtre Cintrée Aluminium à Frappe Sur Mesure</h4>
        <div class="ets_mm_block_content">
                            <a href="https://priximbattable.net/107-fenetre-cintree-aluminium-a-frappe-sur-mesure">                    <span class="mm_img_content">
                        <img loading="lazy" src="https://priximbattable.net/modules/ets_megamenu/views/img/upload/janelaredonda_surmesure.jpg" alt="Fenêtre Cintrée Aluminium à Frappe Sur Mesure" />
                                            </span>
                </a>                    </div>
    </div>
    <div class="clearfix"></div>

                                                    </li>
                                                                                            </ul>
                                                                            </li>
                                                                    <li class="mm_columns_li column_size_3  mm_has_sub">
                                                                                    <ul class="mm_blocks_ul">
                                                                                                    <li data-id-block="22" class="mm_blocks_li">

    <div class="ets_mm_block mm_block_type_image ">
        <h4  style="height: 34px; font-size:14px">Chassis Fixe Aluminium Sur Mesure</h4>
        <div class="ets_mm_block_content">
                            <a href="https://priximbattable.net/45-chassis-fixe-aluminium-sur-mesure">                    <span class="mm_img_content">
                        <img loading="lazy" src="https://priximbattable.net/modules/ets_megamenu/views/img/upload/janelafixa_surmesure.jpg" alt="Chassis Fixe Aluminium Sur Mesure" />
                                            </span>
                </a>                    </div>
    </div>
    <div class="clearfix"></div>

                                                    </li>
                                                                                            </ul>
                                                                            </li>
                                                            </ul>

            </li>
                    <li  class="mm_menus_li mm_sub_align_full mm_has_sub" >
            <a  href="https://priximbattable.net/11-porte-d-entree" style="font-size:14px;">
                    <span class="mm_menu_content_title" data-idmenu="8">
                                                Porte d&#039;entrée
                        <span class="mm_arrow"></span>                                            </span>
                </a>
                                                    <span class="arrow closed"></span>                                                <ul class="mm_columns_ul" style=" width:100%; font-size:14px;">
                                                                    <li class="mm_columns_li column_size_4  mm_has_sub">
                                                                                    <ul class="mm_blocks_ul">
                                                                                                    <li data-id-block="23" class="mm_blocks_li">

    <div class="ets_mm_block mm_block_type_image ">
        <h4  style="height: 34px; font-size:14px">Porte d&#039;Entrée Aluminium</h4>
        <div class="ets_mm_block_content">
                            <a href="https://priximbattable.net/32-porte-d-entree-aluminium">                    <span class="mm_img_content">
                        <img loading="lazy" src="https://priximbattable.net/modules/ets_megamenu/views/img/upload/85458ea451-32.jpg" alt="Porte d'Entrée Aluminium" />
                                            </span>
                </a>                    </div>
    </div>
    <div class="clearfix"></div>

                                                    </li>
                                                                                            </ul>
                                                                            </li>
                                                                    <li class="mm_columns_li column_size_4  mm_has_sub">
                                                                                    <ul class="mm_blocks_ul">
                                                                                                    <li data-id-block="50" class="mm_blocks_li">

    <div class="ets_mm_block mm_block_type_image ">
        <h4  style="height: 34px; font-size:14px">Porte d&#039;Entrée Tierce Vitrée</h4>
        <div class="ets_mm_block_content">
                            <a href="https://priximbattable.net/111-porte-d-entree-tierce-vitree">                    <span class="mm_img_content">
                        <img loading="lazy" src="https://priximbattable.net/modules/ets_megamenu/views/img/upload/239d37b73b-111.jpg" alt="Porte d'Entrée Tierce Vitrée" />
                                            </span>
                </a>                    </div>
    </div>
    <div class="clearfix"></div>

                                                    </li>
                                                                                            </ul>
                                                                            </li>
                                                                    <li class="mm_columns_li column_size_4  mm_has_sub">
                                                                                    <ul class="mm_blocks_ul">
                                                                                                    <li data-id-block="24" class="mm_blocks_li">

    <div class="ets_mm_block mm_block_type_image ">
        <h4  style="height: 34px; font-size:14px">Porte d&#039;Entrée Vitrée</h4>
        <div class="ets_mm_block_content">
                            <a href="https://priximbattable.net/104-porte-d-entree-vitree">                    <span class="mm_img_content">
                        <img loading="lazy" src="https://priximbattable.net/modules/ets_megamenu/views/img/upload/104.jpg" alt="Porte d'Entrée Vitrée" />
                                            </span>
                </a>                    </div>
    </div>
    <div class="clearfix"></div>

                                                    </li>
                                                                                            </ul>
                                                                            </li>
                                                                    <li class="mm_columns_li column_size_4  mm_has_sub">
                                                                                    <ul class="mm_blocks_ul">
                                                                                                    <li data-id-block="52" class="mm_blocks_li">

    <div class="ets_mm_block mm_block_type_image ">
        <h4  style="height: 34px; font-size:14px">Porte d&#039;Entrée Vitrée Tierce Vitrée</h4>
        <div class="ets_mm_block_content">
                            <a href="https://priximbattable.net/112-porte-d-entree-vitree-tierce-vitree">                    <span class="mm_img_content">
                        <img loading="lazy" src="https://priximbattable.net/modules/ets_megamenu/views/img/upload/56e9e4d6af-112.jpg" alt="Porte d'Entrée Vitrée Tierce Vitrée" />
                                            </span>
                </a>                    </div>
    </div>
    <div class="clearfix"></div>

                                                    </li>
                                                                                            </ul>
                                                                            </li>
                                                                    <li class="mm_columns_li column_size_4  mm_has_sub">
                                                                                    <ul class="mm_blocks_ul">
                                                                                                    <li data-id-block="25" class="mm_blocks_li">

    <div class="ets_mm_block mm_block_type_image ">
        <h4  style="height: 34px; font-size:14px">Porte d&#039;Entrée Acier</h4>
        <div class="ets_mm_block_content">
                            <a href="https://priximbattable.net/103-porte-d-entree-acier">                    <span class="mm_img_content">
                        <img loading="lazy" src="https://priximbattable.net/modules/ets_megamenu/views/img/upload/103.jpg" alt="Porte d'Entrée Acier" />
                                            </span>
                </a>                    </div>
    </div>
    <div class="clearfix"></div>

                                                    </li>
                                                                                            </ul>
                                                                            </li>
                                                                    <li class="mm_columns_li column_size_4  mm_has_sub">
                                                                                    <ul class="mm_blocks_ul">
                                                                                                    <li data-id-block="26" class="mm_blocks_li">

    <div class="ets_mm_block mm_block_type_image ">
        <h4  style="height: 34px; font-size:14px">Porte de Service Aluminium</h4>
        <div class="ets_mm_block_content">
                            <a href="https://priximbattable.net/33-porte-de-service-aluminium">                    <span class="mm_img_content">
                        <img loading="lazy" src="https://priximbattable.net/modules/ets_megamenu/views/img/upload/porteservice-aluminium.jpg" alt="Porte de Service Aluminium" />
                                            </span>
                </a>                    </div>
    </div>
    <div class="clearfix"></div>

                                                    </li>
                                                                                            </ul>
                                                                            </li>
                                                                    <li class="mm_columns_li column_size_4  mm_has_sub">
                                                                                    <ul class="mm_blocks_ul">
                                                                                                    <li data-id-block="27" class="mm_blocks_li">

    <div class="ets_mm_block mm_block_type_image ">
        <h4  style="height: 34px; font-size:14px">Sas d&#039;Entrée</h4>
        <div class="ets_mm_block_content">
                            <a href="https://priximbattable.net/90-sas-d-entree">                    <span class="mm_img_content">
                        <img loading="lazy" src="https://priximbattable.net/modules/ets_megamenu/views/img/upload/sas.jpg" alt="Sas d'Entrée" />
                                            </span>
                </a>                    </div>
    </div>
    <div class="clearfix"></div>

                                                    </li>
                                                                                            </ul>
                                                                            </li>
                                                            </ul>

            </li>
                    <li  class="mm_menus_li mm_sub_align_full mm_has_sub" >
            <a  href="https://priximbattable.net/12-verriere" style="font-size:14px;">
                    <span class="mm_menu_content_title" data-idmenu="9">
                                                Verrière
                        <span class="mm_arrow"></span>                                            </span>
                </a>
                                                    <span class="arrow closed"></span>                                                <ul class="mm_columns_ul" style=" width:100%; font-size:14px;">
                                                                    <li class="mm_columns_li column_size_4  mm_has_sub">
                                                                                    <ul class="mm_blocks_ul">
                                                                                                    <li data-id-block="28" class="mm_blocks_li">

    <div class="ets_mm_block mm_block_type_image ">
        <h4  style="height: 34px; font-size:14px">Verrière Acier</h4>
        <div class="ets_mm_block_content">
                            <a href="https://priximbattable.net/97-verriere-acier">                    <span class="mm_img_content">
                        <img loading="lazy" src="https://priximbattable.net/modules/ets_megamenu/views/img/upload/verrieres-acier-4_grand-menu.jpg" alt="Verrière Acier" />
                                            </span>
                </a>                    </div>
    </div>
    <div class="clearfix"></div>

                                                    </li>
                                                                                            </ul>
                                                                            </li>
                                                                    <li class="mm_columns_li column_size_4  mm_has_sub">
                                                                                    <ul class="mm_blocks_ul">
                                                                                                    <li data-id-block="57" class="mm_blocks_li">

    <div class="ets_mm_block mm_block_type_image ">
        <h4  style="height: 34px; font-size:14px">Verrière Style Bistrot</h4>
        <div class="ets_mm_block_content">
                            <a href="https://priximbattable.net/verriere-bistrot/77537-ensemble-1-module-verrieres-acier-style-bistrot.html">                    <span class="mm_img_content">
                        <img loading="lazy" src="https://priximbattable.net/modules/ets_megamenu/views/img/upload/verrieres acier 1 bistro_grand menu.jpg" alt="Verrière Style Bistrot" />
                                            </span>
                </a>                    </div>
    </div>
    <div class="clearfix"></div>

                                                    </li>
                                                                                            </ul>
                                                                            </li>
                                                                    <li class="mm_columns_li column_size_4  mm_has_sub">
                                                                                    <ul class="mm_blocks_ul">
                                                                                                    <li data-id-block="59" class="mm_blocks_li">

    <div class="ets_mm_block mm_block_type_image ">
        <h4  style="height: 34px; font-size:14px">Verrière Style District</h4>
        <div class="ets_mm_block_content">
                            <a href="https://priximbattable.net/verriere-district/121341-ensemble-1-module-verrieres-acier-district.html">                    <span class="mm_img_content">
                        <img loading="lazy" src="https://priximbattable.net/modules/ets_megamenu/views/img/upload/verrieres-district-grand-menu.jpg" alt="Verrière Style District" />
                                            </span>
                </a>                    </div>
    </div>
    <div class="clearfix"></div>

                                                    </li>
                                                                                            </ul>
                                                                            </li>
                                                                    <li class="mm_columns_li column_size_4  mm_has_sub">
                                                                                    <ul class="mm_blocks_ul">
                                                                                                    <li data-id-block="60" class="mm_blocks_li">

    <div class="ets_mm_block mm_block_type_image ">
        <h4  style="height: 34px; font-size:14px">Verrière Style Orangerie</h4>
        <div class="ets_mm_block_content">
                            <a href="https://priximbattable.net/verriere-orangerie/121351-ensemble-1-module-verrieres-acier-style-orangerie.html">                    <span class="mm_img_content">
                        <img loading="lazy" src="https://priximbattable.net/modules/ets_megamenu/views/img/upload/verrieres-orangerie-grand-menu.jpg" alt="Verrière Style Orangerie" />
                                            </span>
                </a>                    </div>
    </div>
    <div class="clearfix"></div>

                                                    </li>
                                                                                            </ul>
                                                                            </li>
                                                                    <li class="mm_columns_li column_size_4  mm_has_sub">
                                                                                    <ul class="mm_blocks_ul">
                                                                                                    <li data-id-block="62" class="mm_blocks_li">

    <div class="ets_mm_block mm_block_type_image ">
        <h4  style="height: 34px; font-size:14px">Verrière Style Destructuré</h4>
        <div class="ets_mm_block_content">
                            <a href="https://priximbattable.net/verriere-destructure/121343-ensemble-1-module-verrieres-acier-destructure.html">                    <span class="mm_img_content">
                        <img loading="lazy" src="https://priximbattable.net/modules/ets_megamenu/views/img/upload/verrieres-destructure_grand-menu.jpg" alt="Verrière Style Destructuré" />
                                            </span>
                </a>                    </div>
    </div>
    <div class="clearfix"></div>

                                                    </li>
                                                                                            </ul>
                                                                            </li>
                                                                    <li class="mm_columns_li column_size_4  mm_has_sub">
                                                                                    <ul class="mm_blocks_ul">
                                                                                                    <li data-id-block="29" class="mm_blocks_li">

    <div class="ets_mm_block mm_block_type_image ">
        <h4  style="height: 34px; font-size:14px">Verrière Miroir</h4>
        <div class="ets_mm_block_content">
                            <a href="https://priximbattable.net/94-verriere-miroir">                    <span class="mm_img_content">
                        <img loading="lazy" src="https://priximbattable.net/modules/ets_megamenu/views/img/upload/verrieres-mirror-4_grand-menu.jpg" alt="Verrière Miroir" />
                                            </span>
                </a>                    </div>
    </div>
    <div class="clearfix"></div>

                                                    </li>
                                                                                            </ul>
                                                                            </li>
                                                                    <li class="mm_columns_li column_size_4  mm_has_sub">
                                                                                    <ul class="mm_blocks_ul">
                                                                                                    <li data-id-block="30" class="mm_blocks_li">

    <div class="ets_mm_block mm_block_type_image ">
        <h4  style="height: 34px; font-size:14px">Porte Verrière Type Atelier</h4>
        <div class="ets_mm_block_content">
                            <a href="https://priximbattable.net/98-porte-verriere-type-atelier">                    <span class="mm_img_content">
                        <img loading="lazy" src="https://priximbattable.net/modules/ets_megamenu/views/img/upload/verriereatelier-contemporain.jpg" alt="Porte Verrière Type Atelier" />
                                            </span>
                </a>                    </div>
    </div>
    <div class="clearfix"></div>

                                                    </li>
                                                                                            </ul>
                                                                            </li>
                                                                    <li class="mm_columns_li column_size_4  mm_has_sub">
                                                                                    <ul class="mm_blocks_ul">
                                                                                                    <li data-id-block="31" class="mm_blocks_li">

    <div class="ets_mm_block mm_block_type_image ">
        <h4  style="height: 34px; font-size:14px">Verrière Acier Sur Mesure</h4>
        <div class="ets_mm_block_content">
                            <a href="https://priximbattable.net/99-verriere-acier-sur-mesure">                    <span class="mm_img_content">
                        <img loading="lazy" src="https://priximbattable.net/modules/ets_megamenu/views/img/upload/verriere_aco_surmesure.jpg" alt="Verrière Acier Sur Mesure" />
                                            </span>
                </a>                    </div>
    </div>
    <div class="clearfix"></div>

                                                    </li>
                                                                                            </ul>
                                                                            </li>
                                                                    <li class="mm_columns_li column_size_4  mm_has_sub">
                                                                                    <ul class="mm_blocks_ul">
                                                                                                    <li data-id-block="32" class="mm_blocks_li">

    <div class="ets_mm_block mm_block_type_image ">
        <h4  style="height: 34px; font-size:14px">Paroi de Douche</h4>
        <div class="ets_mm_block_content">
                            <a href="https://priximbattable.net/100-paroi-de-douche-verriere-type-atelier-loft">                    <span class="mm_img_content">
                        <img loading="lazy" src="https://priximbattable.net/modules/ets_megamenu/views/img/upload/paroi-de-douche-grand-menu.jpg" alt="Paroi de Douche" />
                                            </span>
                </a>                    </div>
    </div>
    <div class="clearfix"></div>

                                                    </li>
                                                                                            </ul>
                                                                            </li>
                                                            </ul>

            </li>
                    <li  class="mm_menus_li mm_sub_align_full mm_has_sub" >
            <a  href="https://priximbattable.net/13-pergola" style="font-size:14px;">
                    <span class="mm_menu_content_title" data-idmenu="10">
                                                Pergola
                        <span class="mm_arrow"></span>                                            </span>
                </a>
                                                    <span class="arrow closed"></span>                                                <ul class="mm_columns_ul" style=" width:100%; font-size:14px;">
                                                                    <li class="mm_columns_li column_size_3  mm_has_sub">
                                                                                    <ul class="mm_blocks_ul">
                                                                                                    <li data-id-block="33" class="mm_blocks_li">

    <div class="ets_mm_block mm_block_type_image ">
        <h4  style="height: 34px; font-size:14px">Pergola Aluminium</h4>
        <div class="ets_mm_block_content">
                            <a href="https://priximbattable.net/34-pergola-aluminium">                    <span class="mm_img_content">
                        <img loading="lazy" src="https://priximbattable.net/modules/ets_megamenu/views/img/upload/pergola policarbonato.jpg" alt="Pergola Aluminium" />
                                            </span>
                </a>                    </div>
    </div>
    <div class="clearfix"></div>

                                                    </li>
                                                                                            </ul>
                                                                            </li>
                                                                    <li class="mm_columns_li column_size_3  mm_has_sub">
                                                                                    <ul class="mm_blocks_ul">
                                                                                                    <li data-id-block="34" class="mm_blocks_li">

    <div class="ets_mm_block mm_block_type_image ">
        <h4  style="height: 34px; font-size:14px">Pergola Toile</h4>
        <div class="ets_mm_block_content">
                            <a href="https://priximbattable.net/93-pergola-toile">                    <span class="mm_img_content">
                        <img loading="lazy" src="https://priximbattable.net/modules/ets_megamenu/views/img/upload/fbc1aab936-tecido-2.jpg" alt="Pergola Toile" />
                                            </span>
                </a>                    </div>
    </div>
    <div class="clearfix"></div>

                                                    </li>
                                                                                            </ul>
                                                                            </li>
                                                                    <li class="mm_columns_li column_size_3  mm_has_sub">
                                                                                    <ul class="mm_blocks_ul">
                                                                                                    <li data-id-block="35" class="mm_blocks_li">

    <div class="ets_mm_block mm_block_type_image ">
        <h4  style="height: 34px; font-size:14px">Pergola Bioclimatique</h4>
        <div class="ets_mm_block_content">
                            <a href="https://priximbattable.net/35-pergola-bioclimatique">                    <span class="mm_img_content">
                        <img loading="lazy" src="https://priximbattable.net/modules/ets_megamenu/views/img/upload/4a1a1528cc-pergola bioclimatica.jpg" alt="Pergola Bioclimatique" />
                                            </span>
                </a>                    </div>
    </div>
    <div class="clearfix"></div>

                                                    </li>
                                                                                            </ul>
                                                                            </li>
                                                                    <li class="mm_columns_li column_size_3  mm_has_sub">
                                                                                    <ul class="mm_blocks_ul">
                                                                                                    <li data-id-block="36" class="mm_blocks_li">

    <div class="ets_mm_block mm_block_type_image ">
        <h4  style="height: 34px; font-size:14px">Pergolanda</h4>
        <div class="ets_mm_block_content">
                            <a href="https://priximbattable.net/37-pergolanda">                    <span class="mm_img_content">
                        <img loading="lazy" src="https://priximbattable.net/modules/ets_megamenu/views/img/upload/167c466976-pergolanda.jpg" alt="Pergolanda" />
                                            </span>
                </a>                    </div>
    </div>
    <div class="clearfix"></div>

                                                    </li>
                                                                                            </ul>
                                                                            </li>
                                                                    <li class="mm_columns_li column_size_3  mm_has_sub">
                                                                                    <ul class="mm_blocks_ul">
                                                                                                    <li data-id-block="55" class="mm_blocks_li">

    <div class="ets_mm_block mm_block_type_image ">
        <h4  style="height: 34px; font-size:14px">Pergola Aluminium Solaire</h4>
        <div class="ets_mm_block_content">
                            <a href="https://priximbattable.net/124-pergola-aluminium-solaire">                    <span class="mm_img_content">
                        <img loading="lazy" src="https://priximbattable.net/modules/ets_megamenu/views/img/upload/solaire2.jpg" alt="Pergola Aluminium Solaire" />
                                            </span>
                </a>                    </div>
    </div>
    <div class="clearfix"></div>

                                                    </li>
                                                                                            </ul>
                                                                            </li>
                                                            </ul>

            </li>
                    <li  class="mm_menus_li mm_sub_align_full mm_has_sub" >
            <a  href="https://priximbattable.net/48-abri" style="font-size:14px;">
                    <span class="mm_menu_content_title" data-idmenu="11">
                                                Abri
                        <span class="mm_arrow"></span>                                            </span>
                </a>
                                                    <span class="arrow closed"></span>                                                <ul class="mm_columns_ul" style=" width:100%; font-size:14px;">
                                                                    <li class="mm_columns_li column_size_4  mm_has_sub">
                                                                                    <ul class="mm_blocks_ul">
                                                                                                    <li data-id-block="37" class="mm_blocks_li">

    <div class="ets_mm_block mm_block_type_image ">
        <h4  style="height: 34px; font-size:14px">Abri de Voiture</h4>
        <div class="ets_mm_block_content">
                            <a href="https://priximbattable.net/83-abris-de-voiture">                    <span class="mm_img_content">
                        <img loading="lazy" src="https://priximbattable.net/modules/ets_megamenu/views/img/upload/101257dd33-carport.jpg" alt="Abri de Voiture" />
                                            </span>
                </a>                    </div>
    </div>
    <div class="clearfix"></div>

                                                    </li>
                                                                                            </ul>
                                                                            </li>
                                                                    <li class="mm_columns_li column_size_4  mm_has_sub">
                                                                                    <ul class="mm_blocks_ul">
                                                                                                    <li data-id-block="38" class="mm_blocks_li">

    <div class="ets_mm_block mm_block_type_image ">
        <h4  style="height: 34px; font-size:14px">Abri de Jardin</h4>
        <div class="ets_mm_block_content">
                            <a href="https://priximbattable.net/84-abris-de-jardin">                    <span class="mm_img_content">
                        <img loading="lazy" src="https://priximbattable.net/modules/ets_megamenu/views/img/upload/6e0c164673-abrigo jardim.jpg" alt="Abri de Jardin" />
                                            </span>
                </a>                    </div>
    </div>
    <div class="clearfix"></div>

                                                    </li>
                                                                                            </ul>
                                                                            </li>
                                                                    <li class="mm_columns_li column_size_4  mm_has_sub">
                                                                                    <ul class="mm_blocks_ul">
                                                                                                    <li data-id-block="39" class="mm_blocks_li">

    <div class="ets_mm_block mm_block_type_image ">
        <h4  style="height: 34px; font-size:14px">Abri de Rangement</h4>
        <div class="ets_mm_block_content">
                            <a href="https://priximbattable.net/85-abris-de-rangement">                    <span class="mm_img_content">
                        <img loading="lazy" src="https://priximbattable.net/modules/ets_megamenu/views/img/upload/8ff623cd6e-abrigo rengement.jpg" alt="Abri de Rangement" />
                                            </span>
                </a>                    </div>
    </div>
    <div class="clearfix"></div>

                                                    </li>
                                                                                            </ul>
                                                                            </li>
                                                                    <li class="mm_columns_li column_size_4  mm_has_sub">
                                                                                    <ul class="mm_blocks_ul">
                                                                                                    <li data-id-block="40" class="mm_blocks_li">

    <div class="ets_mm_block mm_block_type_image ">
        <h4  style="height: 34px; font-size:14px">Serre</h4>
        <div class="ets_mm_block_content">
                            <a href="https://priximbattable.net/86-serre">                    <span class="mm_img_content">
                        <img loading="lazy" src="https://priximbattable.net/modules/ets_megamenu/views/img/upload/c3dc3151c5-estufa.jpg" alt="Serre" />
                                            </span>
                </a>                    </div>
    </div>
    <div class="clearfix"></div>

                                                    </li>
                                                                                            </ul>
                                                                            </li>
                                                                    <li class="mm_columns_li column_size_4  mm_has_sub">
                                                                                    <ul class="mm_blocks_ul">
                                                                                                    <li data-id-block="41" class="mm_blocks_li">

    <div class="ets_mm_block mm_block_type_image ">
        <h4  style="height: 34px; font-size:14px">Abri de Barbecue</h4>
        <div class="ets_mm_block_content">
                            <a href="https://priximbattable.net/87-abris-de-barbecue">                    <span class="mm_img_content">
                        <img loading="lazy" src="https://priximbattable.net/modules/ets_megamenu/views/img/upload/79a6552c46-barbecue.jpg" alt="Abri de Barbecue" />
                                            </span>
                </a>                    </div>
    </div>
    <div class="clearfix"></div>

                                                    </li>
                                                                                            </ul>
                                                                            </li>
                                                                    <li class="mm_columns_li column_size_4  mm_has_sub">
                                                                                    <ul class="mm_blocks_ul">
                                                                                                    <li data-id-block="42" class="mm_blocks_li">

    <div class="ets_mm_block mm_block_type_image ">
        <h4  style="height: 34px; font-size:14px">Box à Cheval</h4>
        <div class="ets_mm_block_content">
                            <a href="https://priximbattable.net/88-box-a-cheval">                    <span class="mm_img_content">
                        <img loading="lazy" src="https://priximbattable.net/modules/ets_megamenu/views/img/upload/f0290aa0c1-abri cheavaux.jpg" alt="Box à Cheval" />
                                            </span>
                </a>                    </div>
    </div>
    <div class="clearfix"></div>

                                                    </li>
                                                                                            </ul>
                                                                            </li>
                                                                    <li class="mm_columns_li column_size_4  mm_has_sub">
                                                                                    <ul class="mm_blocks_ul">
                                                                                                    <li data-id-block="43" class="mm_blocks_li">

    <div class="ets_mm_block mm_block_type_image ">
        <h4  style="height: 34px; font-size:14px">Sas d&#039;Entrée</h4>
        <div class="ets_mm_block_content">
                            <a href="https://priximbattable.net/89-sas-d-entree">                    <span class="mm_img_content">
                        <img loading="lazy" src="https://priximbattable.net/modules/ets_megamenu/views/img/upload/2be643b1db-sas.jpg" alt="Sas d'Entrée" />
                                            </span>
                </a>                    </div>
    </div>
    <div class="clearfix"></div>

                                                    </li>
                                                                                            </ul>
                                                                            </li>
                                                                    <li class="mm_columns_li column_size_4  mm_has_sub">
                                                                                    <ul class="mm_blocks_ul">
                                                                                                    <li data-id-block="56" class="mm_blocks_li">

    <div class="ets_mm_block mm_block_type_image ">
        <h4  style="height: 34px; font-size:14px">Abri de Voiture Solaire</h4>
        <div class="ets_mm_block_content">
                            <a href="https://priximbattable.net/105-store">                    <span class="mm_img_content">
                        <img loading="lazy" src="https://priximbattable.net/modules/ets_megamenu/views/img/upload/solaire.jpg" alt="Abri de Voiture Solaire" />
                                            </span>
                </a>                    </div>
    </div>
    <div class="clearfix"></div>

                                                    </li>
                                                                                            </ul>
                                                                            </li>
                                                            </ul>

            </li>
                    <li  class="mm_menus_li mm_sub_align_full mm_has_sub" >
            <a  href="https://priximbattable.net/57-jardin" style="font-size:14px;">
                    <span class="mm_menu_content_title" data-idmenu="12">
                                                Jardin
                        <span class="mm_arrow"></span>                                            </span>
                </a>
                                                    <span class="arrow closed"></span>                                                <ul class="mm_columns_ul" style=" width:100%; font-size:14px;">
                                                                    <li class="mm_columns_li column_size_4  mm_has_sub">
                                                                                    <ul class="mm_blocks_ul">
                                                                                                    <li data-id-block="44" class="mm_blocks_li">

    <div class="ets_mm_block mm_block_type_image ">
        <h4  style="height: 34px; font-size:14px">Gabion</h4>
        <div class="ets_mm_block_content">
                            <a href="https://priximbattable.net/22-gabion">                    <span class="mm_img_content">
                        <img loading="lazy" src="https://priximbattable.net/modules/ets_megamenu/views/img/upload/2b7c6cd3d1-gabions.jpg" alt="Gabion" />
                                            </span>
                </a>                    </div>
    </div>
    <div class="clearfix"></div>

                                                    </li>
                                                                                            </ul>
                                                                            </li>
                                                                    <li class="mm_columns_li column_size_4  mm_has_sub">
                                                                                    <ul class="mm_blocks_ul">
                                                                                                    <li data-id-block="45" class="mm_blocks_li">

    <div class="ets_mm_block mm_block_type_image ">
        <h4  style="height: 34px; font-size:14px">Voile d&#039;Ombrage</h4>
        <div class="ets_mm_block_content">
                            <a href="https://priximbattable.net/39-voile-d-ombrage">                    <span class="mm_img_content">
                        <img loading="lazy" src="https://priximbattable.net/modules/ets_megamenu/views/img/upload/39.jpg" alt="Voile d'Ombrage" />
                                            </span>
                </a>                    </div>
    </div>
    <div class="clearfix"></div>

                                                    </li>
                                                                                            </ul>
                                                                            </li>
                                                                    <li class="mm_columns_li column_size_4  mm_has_sub">
                                                                                    <ul class="mm_blocks_ul">
                                                                                                    <li data-id-block="46" class="mm_blocks_li">

                                                    </li>
                                                                                            </ul>
                                                                            </li>
                                                            </ul>

            </li>
                    <li  class="mm_menus_li mm_sub_align_full mm_has_sub" >
            <a  href="https://priximbattable.net/105-store" style="font-size:14px;">
                    <span class="mm_menu_content_title" data-idmenu="13">
                                                Store
                        <span class="mm_arrow"></span>                                            </span>
                </a>
                                                    <span class="arrow closed"></span>                                                <ul class="mm_columns_ul" style=" width:100%; font-size:14px;">
                                                                    <li class="mm_columns_li column_size_4  mm_has_sub">
                                                                                    <ul class="mm_blocks_ul">
                                                                                                    <li data-id-block="47" class="mm_blocks_li">

    <div class="ets_mm_block mm_block_type_image ">
        <h4  style="height: 34px; font-size:14px">Store-Banne</h4>
        <div class="ets_mm_block_content">
                            <a href="https://priximbattable.net/store/13644-store-banne-coffre-integral-solea.html">                    <span class="mm_img_content">
                        <img loading="lazy" src="https://priximbattable.net/modules/ets_megamenu/views/img/upload/dbfa23f8f3-estore banne.jpg" alt="Store-Banne" />
                                            </span>
                </a>                    </div>
    </div>
    <div class="clearfix"></div>

                                                    </li>
                                                                                            </ul>
                                                                            </li>
                                                                    <li class="mm_columns_li column_size_4  mm_has_sub">
                                                                                    <ul class="mm_blocks_ul">
                                                                                                    <li data-id-block="48" class="mm_blocks_li">

    <div class="ets_mm_block mm_block_type_image ">
        <h4  style="height: 34px; font-size:14px">Store Vertical</h4>
        <div class="ets_mm_block_content">
                            <a href="https://priximbattable.net/store/13442-store-vertical-motorise.html">                    <span class="mm_img_content">
                        <img loading="lazy" src="https://priximbattable.net/modules/ets_megamenu/views/img/upload/estores verticais.jpg" alt="Store Vertical" />
                                            </span>
                </a>                    </div>
    </div>
    <div class="clearfix"></div>

                                                    </li>
                                                                                            </ul>
                                                                            </li>
                                                                    <li class="mm_columns_li column_size_4  mm_has_sub">
                                                                                    <ul class="mm_blocks_ul">
                                                                                                    <li data-id-block="49" class="mm_blocks_li">

    <div class="ets_mm_block mm_block_type_image ">
        <h4  style="height: 34px; font-size:14px">Store Pergola</h4>
        <div class="ets_mm_block_content">
                            <a href="https://priximbattable.net/accueil/21287-pergola-toile-motorisee.html">                    <span class="mm_img_content">
                        <img loading="lazy" src="https://priximbattable.net/modules/ets_megamenu/views/img/upload/estore pergola.jpg" alt="Store Pergola" />
                                            </span>
                </a>                    </div>
    </div>
    <div class="clearfix"></div>

                                                    </li>
                                                                                            </ul>
                                                                            </li>
                                                            </ul>

            </li>
                    <li  class="mm_menus_li aluclass-bonnes-affaires mm_sub_align_full" >
            <a  href="https://priximbattable.net/101-bonnes-affaires" style="font-size:14px;">
                    <span class="mm_menu_content_title" data-idmenu="14">
                                                Bonnes Affaires
                                                                    </span>
                </a>

            </li>
            </ul>


                </div>
            </div>
        </div>
    </div>








        <!--<div class="container-fluid">
      <div class="container" style="padding:0!important;margin-top:10px;background-color:#dcdcdc;">
        <img loading="lazy" src="/img/soldes/promotion_soldes-4_01.jpg" alt="Soldes" style="float:left;padding:0; width: 400px;" class="img-fluid" />
        <img loading="lazy" src="/img/soldes/promotion_soldes-4_02.jpg" alt="Soldes" style="float:left;padding:0; width: 400px;" class="img-fluid" />
        <img loading="lazy" src="/img/soldes/promotion_soldes-4_03.jpg" alt="Soldes" style="float:left;padding:0; width: 400px;" class="img-fluid" />
      </div>
    </div>-->

                      <div class="container">
    <div class="row">
      <div class="col-md-12 newAlu_warning">
      <p class="newAlu_warningTitle">Information COVID-19 :</p>
      <p>Suite aux décisions gouvernementales les collectes se font sur rendez-vous. Une partie de l'équipe est en télétravail, privilégiez les contacts par tchat.</p>
      </div>
    </div>
  </div>


      </header>



<aside id="notifications">
  <div class="container">



      </div>
</aside>


      <section id="wrapper">

        <div class="container">

            <nav data-depth="2" class="breadcrumb hidden-sm-down">
  <ol itemscope itemtype="http://schema.org/BreadcrumbList">


          <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
            <a itemprop="item" href="https://priximbattable.net/">
              <span itemprop="name">Accueil</span>
            </a>
            <meta itemprop="position" content="1">
          </li>


          <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
            <a itemprop="item" href="https://priximbattable.net/service-client.php">
              <span itemprop="name">Service client</span>
            </a>
            <meta itemprop="position" content="2">
          </li>


  </ol>
</nav>





  <div id="content-wrapper">



  <section id="main">









	  <div class="contenainer_form">
<h1 class="titre_form">Contactez-nous<span><br />nous sommes là pour vous aider</span></h1>
<p>
&nbsp;
</p>
<?php if($msg<>'') {?><p><?php echo($msg);?></p><?php }?>
<div class="col-md-5 col-xs-12">
<form method="POST" action="<?php echo($_SERVER['PHP_SELF']);?>" enctype="multipart/form-data">
<div><select name="contact_motif" id="contact_motif" class="field" onchange="checkSelection(this.value)" placeholder="" required>
						<option value="">Je souhaite être recontacter pour...</option>
						<option value="1">un renseignement sur un produit</option>
						<option value="2">le suivi de ma commande</option>
						<option value="3">le transporteur m'a laisser un message</option>
						<option value="4">je veux déclarer un incident concernant ma livraison</option>
						<option value="5">prendre rendez-vous pour une collecte</option>
						<option value="6">j'ai un problème technique après vente, je souhaite être recontacter par un technicien</option>
						<option value="7">j'ai un problème de paiement, confrmation de commande</option>

					</select></div>
					<div id="form">

					<div><input type="text" class="field" name="contact_nom" id="contact_nom" value="<?php echo($_POST['contact_nom']);?>" placeholder="Nom *" required></div>

					<div><input type="text" class="field" name="contact_tel" id="contact_tel" value="<?php echo($_POST['contact_nom']);?>" placeholder="Telephone *" required></div>

					<div><input type="text" class="field" name="contact_facture" id="contact_facture" value="<?php echo($_POST['contact_facture']);?>" placeholder="N°Commande *" style='display:none'></div>
					<div><textarea name="contact_descriptif" class="field" rows="8">Remarque : </textarea></div>
					<input name="BEnvoyer" class="field2" type="submit" value="Envoyer" />
					</div>
					<div id="num_transporteur" style='display:none'>
					<p>Vous avez reçu un message du transporteur concernant votre future livraison, vous pouvez joindre le transporteur au numéro suivant : XX XX XX XX XX.<br />Si vous avez reçu un SMS du transporteur nous vous conseillons d'y répondre directement en confirmant ou non le RDV.</p>
					</div>
</form>
</div>

<div class="col-md-5 col-xs-12">
	<p class="infobulle">Actuellement vous avez <strong><?php echo($minute_attente);?></strong> minute(s) d'attente</p>
	<div id="affluence">
		<div id="courbes">
			<div class="courbe <?php if(date('H')==18){?>actif<?php }?> haut3"></div>
			<div class="courbe <?php if(date('H')==17){?>actif<?php }?> haut4"></div>
			<div class="courbe <?php if(date('H')==16){?>actif<?php }?> haut5"></div>
			<div class="courbe <?php if(date('H')==15){?>actif<?php }?> haut3"></div>
			<div class="courbe <?php if(date('H')==14){?>actif<?php }?> haut2"></div>
			<div class="courbe <?php if(date('H')==13){?>actif<?php }?> haut1"></div>
			<div class="courbe <?php if(date('H')==12){?>actif<?php }?> haut3"></div>
			<div class="courbe <?php if(date('H')==11){?>actif<?php }?> haut5"></div>
			<div class="courbe <?php if(date('H')==10){?>actif<?php }?> haut4"></div>
			<div class="courbe <?php if(date('H')==9){?>actif<?php }?> haut2"></div>
			<div class="courbe <?php if(date('H')==8){?>actif<?php }?> haut1"></div>
		</div>
		<div id="horaires">
			<div class="tranche">8</div>
			<div class="tranche">9</div>
			<div class="tranche">10</div>
			<div class="tranche">11</div>
			<div class="tranche">12</div>
			<div class="tranche">13</div>
			<div class="tranche">14</div>
			<div class="tranche">15</div>
			<div class="tranche">16</div>
			<div class="tranche">17</div>
			<div class="tranche">18</div>
		</div>
	</div>
</div>
<div class="separateur"></div>
<h2 class="type_service">Vous pouvez nous trouver sur :</h2>

<div class="block_service_client"><img loading="lazy" src="img/service_client.png" alt="" /><p>Notre service client se tient à votre disposition pour répondre à vos questions ou vous fournir des informations supplémentaires concernant nos produits. Nos conseillers sont joignables au 04 72 80 93 54 du lundi au vendredi de 8h30 à 12h30 et de 13h à 18h. En raison d'un nombre important d'appel nous vous conseillons de privilégier les contacts par tchats ou d'appeler sur les périodes les moins fréquentées</p></div>
<div class="block_service_client"><img loading="lazy" src="img/tchat.png" alt="" /><p>Que vous souhaitez poser une question technique sur un produit, ou avoir des informations sur le suivi de votre commande, le service de Tchat est le meilleur moyen d'avoir une réponse rapide. Vous pouvez discuter en direct avec l'un de nos conseillers en cliquant sur l'icône en bas "Tchat en ligne" à droite de l'écran. Nos conseillers sont disponibles de 8h30 à 12h30 et de 13h à 18h</p></div>
<div class="block_service_client"><img loading="lazy" src="img/sms.png" alt="" /><p>Vous pouvez contacter notre service client de 9h à 12h et de 13h30 à 14h par SMS au 06 42 69 24 90</p></div>
<div class="block_service_client"><img loading="lazy" src="img/messenger.png" alt="" /><p>Vous pouvez nous contacter directement par le Messenger Priximbattable.net <a href="https://www.facebook.com/messages/t/priximbattable38" target="_blank">Accès au Messenger</a></p></div>
<div class="block_service_client"><img loading="lazy" src="img/whatsapp.png" alt="" /><p>Vous pouvez contacter priximbattable par WhatsApp en ajoutant le numéro 07 87 11 31 43</p></div>

</div>






      <footer class="page-footer">

          <!-- Footer content -->

      </footer>


  </section>



  </div>



        </div>

      </section>

      <footer id="footer">


<div class="container-fluid" style="background-color: #f1f1f1;">
  <div class="row">
    <div class="container pt-1">

       <div class="block_newsletter col-lg-12 col-md-12 col-sm-12">
  <div class="row">
   <div class="col-md-5 col-xs-12">
     <p id="block-newsletter-label" class="col-md-5 col-xs-12">Recevez nos offres spéciales</p>
   </div>
   <div class="col-md-7 col-xs-12">
     <form action="https://priximbattable.net/#footer" method="post">
       <div class="row">
         <div class="col-xs-12">
           <input
             class="btn btn-primary float-xs-right hidden-xs-down newAlu_buttonNewsletter"
             name="submitNewsletter"
             type="submit"
             value="S’abonner"
           >
           <input
             class="btn btn-primary float-xs-right hidden-sm-up"
             name="submitNewsletter"
             type="submit"
             value="ok"
           >
           <div class="input-wrapper">
             <input
               name="email"
               type="email"
               value=""
               placeholder="Votre adresse e-mail"
               aria-labelledby="block-newsletter-label"
               class="newAlu_input"
             >
           </div>
           <input type="hidden" name="action" value="0">
           <div class="clearfix"></div>
         </div>
       </div>
       <div class="row">
         <div class="col-xs-12 newAlu_txtNewsletter">
                            <p>Vous pouvez vous désinscrire à tout moment. Vous trouverez pour cela nos informations de contact dans les conditions d&#039;utilisation du site.</p>

                      </div>
       </div>
     </form>
   </div>
 </div>
</div>

  <div class="block-social col-lg-4 col-md-12 col-sm-12">
    <ul>
          </ul>
  </div>



    </div>
  </div>
</div>


<div class="footer-container">

<div class="footer-content">
  <div class="container">
    <div class="footerRow">

      <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">

                        <div class="sp_customhtml_1_161294429985393868
		  spfooterlinks">
            							<ul class="links">
																																													<li>
									<a href="https://priximbattable.net/6-cloture">Clôture</a>
								</li>
																																															<li>
									<a href="https://priximbattable.net/7-automatisme">Automatisme</a>
								</li>
																																															<li>
									<a href="https://priximbattable.net/8-porte-de-garage">Porte de garage</a>
								</li>
																																															<li>
									<a href="https://priximbattable.net/9-volet">Volet</a>
								</li>
																																															<li>
									<a href="https://priximbattable.net/10-fenetre">Fenêtre</a>
								</li>
																																															<li>
									<a href="https://priximbattable.net/11-porte-d-entree">Porte d&#039;entrée</a>
								</li>
																																															<li>
									<a href="https://priximbattable.net/12-verriere">Verrière</a>
								</li>
																																															<li>
									<a href="https://priximbattable.net/13-pergola">Pergola</a>
								</li>
																						</ul>

        </div>

      </div>

      <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">

                        <div class="sp_customhtml_2_1612944300274743140
		  spfooterlinks">
            							<ul class="links">
																																													<li>
									<a href="https://priximbattable.net/83-abris-de-voiture">Abri de Voiture</a>
								</li>
																																															<li>
									<a href="https://priximbattable.net/50-portail">Portail</a>
								</li>
																																															<li>
									<a href="https://priximbattable.net/57-jardin">Jardin</a>
								</li>
																																															<li>
									<a href="https://priximbattable.net/105-store">Store</a>
								</li>
																																															<li>
									<a href="https://priximbattable.net/101-bonnes-affaires">Bonnes affaires</a>
								</li>
																																															<li>
									<a href="https://priximbattable.net/Sitemap">Sitemap</a>
								</li>
																																															<li>
									<a href="https://priximbattable.net/nous-contacter">Nous contacter</a>
								</li>
																						</ul>

        </div>

                  <div id='pacmanmenu'>
            <a href="/content/20-pacman" target="_blank"><img loading="lazy" src="/img/cms/PACMAN/pacman_1.gif"
                style="width: 68px; margin: 0; margin-top: -30px;" alt="" ></a>
          </div>
              </div>

      <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
      <picture>
          <source srcset="/img/cms/home/map-fr.webp" type="image/webp">
          <img loading="lazy" alt="france" class="pais-rodape" src="/img/cms/home/map-fr.png" width="276" height="299">
        </picture>
      </div>

      <div class="contact-bg col-xs-12 col-sm-12 col-md-12 col-lg-3" style="padding-top: 30px;">
              <div class="contactinfo">
          <div class="content-footer">

            <div class="address">
              <i class="material-icons">location_on</i>
              <span>5 rue du Travail, 38230 Pont-De-Cheruy </span>
            </div>

            <div class="email">
              <i class="material-icons">email</i>
              <a href="mailto:toujoursun@priximbattable.net">toujoursun@priximbattable.net</a>
            </div>

            <div class="times">
              <i class="material-icons">access_time</i><span>Horaires d'ouverture:</span> <br />
              <span>Du Lundi au Vendredi : 8h30/12h30 - 13h/18h<br /></span>
            </div>

            <div style="margin-top: 10px;">
              <img loading="lazy" src="/img/cms/home/cart.png" alt="" class="img-fluid" />
            </div>




                                  </div>
        </div>
              </div>

    </div>
  </div>
</div>

<div class="footer-bottom">
  <div class="container-fluid newAlu_barFooterLinks">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
      <a target="_blank" href="https://priximbattable.net/content/21-actualites-priximbattable">Actualité PrixImbattable</a>
      <a target="_blank" href="https://priximbattable.net/content/4-qui-sommes-nous">Qui Sommes-nous</a>
      <a target="_blank" href="https://priximbattable.net/nous-contacter">Contact</a>
	  <a target="_blank" href="https://priximbattable.net/sav/signaler_sav.php" class="highlight">Déclarer SAV</a>
      <a target="_blank" href="https://priximbattable.net/content/8-cgv">CGV</a>
      <a target="_blank" href="https://priximbattable.net/content/6-politique-de-confidentialite">Politique de confidentialité</a>
      <a target="_blank" href="https://priximbattable.net/content/2-mentions-legales">Mentions légales</a>
      <a target="_blank" href="https://priximbattable.net/content/7-plan-de-situation">Plan de Situation</a>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 newAlu_copyright">
        &copy; Priximbattable <?php echo(date("Y"));?>. Tout droits réservés.
      </div>
      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 newAlu_otherSite">
        <img loading="lazy" src="/img/flags/es.jpg" alt="">
        <a href="https://www.precioimbatible.net" target="_blank">www.precioimbatible.net</a>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 newAlu_otherSite">
        <img loading="lazy" src="/img/flags/pt.jpg" alt="">
        <a href="https://www.precoimbativel.net" target="_blank">www.precoimbativel.net</a>
      </div>


          </div>
  </div>
</div>

  <div class="backtop">
    <a id="sp-totop" class="backtotop" href="#" title="Back to top">
      <i class="fa fa-chevron-up"></i>
    </a>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="modalEmbedAluclass" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header" style="text-align: right;">
          <button id="modalEmbedAluclass_close" class="btn btn-danger">X</button>
        </div>
        <div class="modal-body">
         <div class="embed-responsive" style="padding-bottom: 56%;">
           <iframe class="embed-responsive-item" id="codWatch" src="" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
         </div>
        </div>
      </div>
    </div>
  </div>

</div>



<script type="text/javascript" defer>

var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5b1329b610b99c7b36d4938f/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();

/* live chat*/
</script>



      </footer>

    </main>


        <script type="text/javascript" src="https://priximbattable.net/themes/classic/assets/cache/bottom-24e4bb2651.js" ></script>







  </body>

</html>
