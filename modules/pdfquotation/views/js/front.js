/**
* Front.js
*
* @author    Empty
* @copyright 2007-2016 PrestaShop SA
* @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*/

$(document).ready(function() {


  //open modal Devis - Vasco aluclass
  $('.embedAluDevis').click(function () {
    $('#modalEmbedDevis').modal('show');
    return false;
  });
  $('#modalEmbedDevis_close').click(function () {
      $('#modalEmbedDevis').modal('hide');
      return false;
  });

  $("#customer-information-prod form").submit(function() {

      $first_name = $("#customer-information-prod  #first_name").val();
      $last_name = $("#customer-information-prod  #last_name").val();
      $email = $("#customer-information-prod  #email").val();
      $email_comercial = $("#customer-information-prod  #email_comercial").val();
      $phone = $("#customer-information-prod  #phone").val();
      $contacted = $('#customer-information-prod  input[name=contacted]:checked').val();
      $spam = $('#customer-information-prod  #spam').val();
      if($('#catalogue_portail_checked_product').is(":checked")){
          $catalogue_portail_checked_product = "catalogue_portail_product";
      }else{
        $catalogue_portail_checked_product = "empty";
      }

      if($('#catalogue_cloture_grillage_rigide_checked_product').is(":checked")){
        $catalogue_cloture_grillage_rigide_checked_product = "catalogue_cloture_grillage_rigide_product";
      }else{
        $catalogue_cloture_grillage_rigide_checked_product = "empty";
      }

      if($('#catalogue_cloture_aluminium_checked_product').is(":checked")){
        $catalogue_cloture_aluminium_checked_product = "catalogue_cloture_aluminium_product";
      }else{
        $catalogue_cloture_aluminium_checked_product = "empty";
      }

      if($('#catalogue_porte_garage_battant_checked_product').is(":checked")){
        $catalogue_porte_garage_battant_checked_product = "catalogue_porte_garage_battant_product";
      }else{
        $catalogue_porte_garage_battant_checked_product = "empty";
      }

      if($('#catalogue_porte_garage_enroulable_checked_product').is(":checked")){
        $catalogue_porte_garage_enroulable_checked_product = "catalogue_porte_garage_enroulable_product";
      }else{
        $catalogue_porte_garage_enroulable_checked_product = "empty";
      }

      if($('#catalogue_porte_garage_sectionnelle_checked_product').is(":checked")){
        $catalogue_porte_garage_sectionnelle_checked_product = "catalogue_porte_garage_sectionnelle_product";
      }else{
        $catalogue_porte_garage_sectionnelle_checked_product = "empty";
      }

      if($('#catalogue_volet_battant_isole_penture_checked_product').is(":checked")){
        $catalogue_volet_battant_isole_penture_checked_product = "catalogue_volet_battant_isole_penture_product";
      }else{
        $catalogue_volet_battant_isole_penture_checked_product = "empty";
      }

      if($('#catalogue_volet_battant_isole_pre_cadre_checked_product').is(":checked")){
        $catalogue_volet_battant_isole_pre_cadre_checked_product = "catalogue_volet_battant_isole_pre_cadre_product";
      }else{
        $catalogue_volet_battant_isole_pre_cadre_checked_product = "empty";
      }

      if($('#catalogue_volet_roulant_checked_product').is(":checked")){
        $catalogue_volet_roulant_checked_product = "catalogue_volet_roulant_product";
      }else{
        $catalogue_volet_roulant_checked_product = "empty";
      }

      if($('#catalogue_bso_checked_product').is(":checked")){
        $catalogue_bso_checked_product = "catalogue_bso_product";
      }else{
        $catalogue_bso_checked_product = "empty";
      }

      if($('#catalogue_baie_coulissante_checked_product').is(":checked")){
        $catalogue_baie_coulissante_checked_product = "catalogue_baie_coulissante_product";
      }else{
        $catalogue_baie_coulissante_checked_product = "empty";
      }

      if($('#catalogue_fenetre_aluminium_frappe_checked_product').is(":checked")){
        $catalogue_fenetre_aluminium_frappe_checked_product = "catalogue_fenetre_aluminium_frappe_product";
      }else{
        $catalogue_fenetre_aluminium_frappe_checked_product = "empty";
      }

      if($('#catalogue_fenetre_cintree_frappe_checked_product').is(":checked")){
        $catalogue_fenetre_cintree_frappe_checked_product = "catalogue_fenetre_cintree_frappe_product";
      }else{
        $catalogue_fenetre_cintree_frappe_checked_product = "empty";
      }

      if($('#catalogue_chassis_fixe_checked_product').is(":checked")){
        $catalogue_chassis_fixe_checked_product = "catalogue_chassis_fixe_product";
      }else{
        $catalogue_chassis_fixe_checked_product = "empty";
      }

      if($('#catalogue_fenetre_pvc_checked_product').is(":checked")){
        $catalogue_fenetre_pvc_checked_product = "catalogue_fenetre_pvc_product";
      }else{
        $catalogue_fenetre_pvc_checked_product = "empty";
      }

      if($('#catalogue_porte_entree_checked_product').is(":checked")){
        $catalogue_porte_entree_checked_product = "catalogue_porte_entree_product";
      }else{
        $catalogue_porte_entree_checked_product = "empty";
      }

      if($('#catalogue_verriere_acier_sectionnelle_checked_product').is(":checked")){
        $catalogue_verriere_acier_sectionnelle_checked_product = "catalogue_verriere_acier_sectionnelle_product";
      }else{
        $catalogue_verriere_acier_sectionnelle_checked_product = "empty";
      }

      if($('#catalogue_verriere_miroir_checked_product').is(":checked")){
        $catalogue_verriere_miroir_checked_product = "catalogue_verriere_miroir_product";
      }else{
        $catalogue_verriere_miroir_checked_product = "empty";
      }

      if($('#catalogue_porte_verriere_type_atelier_checked_product').is(":checked")){
        $catalogue_porte_verriere_type_atelier_checked_product = "catalogue_porte_verriere_type_atelier_product";
      }else{
        $catalogue_porte_verriere_type_atelier_checked_product = "empty";
      }

      if($('#catalogue_paroi_douche_checked_product').is(":checked")){
        $catalogue_paroi_douche_checked_product = "catalogue_paroi_douche_product";
      }else{
        $catalogue_paroi_douche_checked_product = "empty";
      }

      if($('#catalogue_verriere_orangerie_checked_product').is(":checked")){
        $catalogue_verriere_orangerie_checked_product = "catalogue_verriere_orangerie_product";
      }else{
        $catalogue_verriere_orangerie_checked_product = "empty";
      }

      if($('#catalogue_verriere_district_checked_product').is(":checked")){
        $catalogue_verriere_district_checked_product = "catalogue_verriere_district_product";
      }else{
        $catalogue_verriere_district_checked_product = "empty";
      }

      if($('#catalogue_verriere_bistrot_checked_product').is(":checked")){
        $catalogue_verriere_bistrot_checked_product = "catalogue_verriere_bistrot_product";
      }else{
        $catalogue_verriere_bistrot_checked_product = "empty";
      }

      if($('#catalogue_verriere_destructure_checked_product').is(":checked")){
        $catalogue_verriere_destructure_checked_product = "catalogue_verriere_destructure_product";
      }else{
        $catalogue_verriere_destructure_checked_product = "empty";
      }

      if($('#catalogue_verriere_acier_sur_mesure_checked_product').is(":checked")){
        $catalogue_verriere_acier_sur_mesure_checked_product = "catalogue_verriere_acier_sur_mesure_product";
      }else{
        $catalogue_verriere_acier_sur_mesure_checked_product = "empty";
      }

      if($('#catalogue_pergola_aluminium_checked_product').is(":checked")){
        $catalogue_pergola_aluminium_checked_product = "catalogue_pergola_aluminium_product";
      }else{
        $catalogue_pergola_aluminium_checked_product = "empty";
      }

      if($('#catalogue_pergola_bioclimatique_checked_product').is(":checked")){
        $catalogue_pergola_bioclimatique_checked_product = "catalogue_pergola_bioclimatique_product";
      }else{
        $catalogue_pergola_bioclimatique_checked_product = "empty";
      }

      if($('#catalogue_pergolanda_checked_product').is(":checked")){
        $catalogue_pergolanda_checked_product = "catalogue_pergolanda_product";
      }else{
        $catalogue_pergolanda_checked_product = "empty";
      }

      if($('#catalogue_carport_2_poteaux_checked_product').is(":checked")){
        $catalogue_carport_2_poteaux_checked_product = "catalogue_carport_2_poteaux_product";
      }else{
        $catalogue_carport_2_poteaux_checked_product = "empty";
      }

      if($('#catalogue_carport_aluminium_cintre_checked_product').is(":checked")){
        $catalogue_carport_aluminium_cintre_checked_product = "catalogue_carport_aluminium_cintre_product";
      }else{
        $catalogue_carport_aluminium_cintre_checked_product = "empty";
      }

      if($('#catalogue_carport_avec_debord_checked_product').is(":checked")){
        $catalogue_carport_avec_debord_checked_product = "catalogue_carport_avec_debord_product";
      }else{
        $catalogue_carport_avec_debord_checked_product = "empty";
      }

      if($('#catalogue_carport_double_checked_product').is(":checked")){
        $catalogue_carport_double_checked_product = "catalogue_carport_double_product";
      }else{
        $catalogue_carport_double_checked_product = "empty";
      }

      if($('#catalogue_carport_garage_checked_product').is(":checked")){
        $catalogue_carport_garage_checked_product = "catalogue_carport_garage_product";
      }else{
        $catalogue_carport_garage_checked_product = "empty";
      }

      if($('#catalogue_carport_toit_plat_checked_product').is(":checked")){
        $catalogue_carport_toit_plat_checked_product = "catalogue_carport_toit_plat_product";
      }else{
        $catalogue_carport_toit_plat_checked_product = "empty";
      }


      if ($first_name == "" || $last_name == "" || $email == "" || $phone == "") {
          alert("Il manque une information obligatoire à votre devis!");
          return false;
      }

      $('#modalEmbedDevisProd').modal('hide');


      var html = $("#image-block").html();
      html = "<div style = 'width: 250px; height: 250px; position: relative;'>" + html + "</div>";

      var preco_devis = 0;

      if(preco_devis > 0)
          $("#option_ndk_devis").text("Options: +"+preco_devis.toFixed(2) + " €");

      var bigpic = document.getElementById("bigpic");
      var arrayImg  = [];
      var countimg = 0;

      if(bigpic) {
        var imgProd = $("#bigpic").attr('src');
        arrayImg[countimg] = imgProd;

        $(".composition_element").each(function( index ) {
            countimg++;
            arrayImg[countimg] = $(this).attr('src');
        });
      }else{
        arrayImg[countimg] = $(".js-qv-product-cover").attr('src');
      }

      var idprod = $("#cat_id_prod").val();
      sendprod = {imgProd:arrayImg, productname:$("#name_title_product").text(),idprod:idprod };
      var htmlstring = JSON.stringify(sendprod);
      var idprod = $("#generateproductid").val();
      if(idprod > 0) {
        var productinfo = JSON.stringify(data);
        var urlCar = prestashop.urls.base_url + "modules/pdfquotation/pdfquotation-ajax.php?action=addProduct&first_name=" + $first_name + "&last_name=" + $last_name + "&email=" + $email+ "&emailcomercial=" + $email_comercial;
        urlCar += "&phone=" + $phone + "&contacted=" + $contacted  + "&spam=" + $spam +"&htmlstring="+htmlstring+"&productinfo="+productinfo+"&generateproductid="+idprod;
        urlCar += "&catalogue_portail_checked_product=" + $catalogue_portail_checked_product;
        urlCar += "&catalogue_cloture_grillage_rigide_checked_product=" + $catalogue_cloture_grillage_rigide_checked_product;
        urlCar += "&catalogue_cloture_aluminium_checked_product=" + $catalogue_cloture_aluminium_checked_product;
        urlCar += "&catalogue_porte_garage_battant_checked_product=" + $catalogue_porte_garage_battant_checked_product;
        urlCar += "&catalogue_porte_garage_enroulable_checked_product=" + $catalogue_porte_garage_enroulable_checked_product;
        urlCar += "&catalogue_porte_garage_sectionnelle_checked_product=" + $catalogue_porte_garage_sectionnelle_checked_product;
        urlCar += "&catalogue_volet_battant_isole_penture_checked_product=" + $catalogue_volet_battant_isole_penture_checked_product;
        urlCar += "&catalogue_volet_battant_isole_pre_cadre_checked_product=" + $catalogue_volet_battant_isole_pre_cadre_checked_product;
        urlCar += "&catalogue_volet_roulant_checked_product=" + $catalogue_volet_roulant_checked_product;
        urlCar += "&catalogue_bso_checked_product=" + $catalogue_bso_checked_product;
        urlCar += "&catalogue_baie_coulissante_checked_product=" + $catalogue_baie_coulissante_checked_product;
        urlCar += "&catalogue_fenetre_aluminium_frappe_checked_product=" + $catalogue_fenetre_aluminium_frappe_checked_product;
        urlCar += "&catalogue_fenetre_cintree_frappe_checked_product=" + $catalogue_fenetre_cintree_frappe_checked_product;
        urlCar += "&catalogue_chassis_fixe_checked_product=" + $catalogue_chassis_fixe_checked_product;
        urlCar += "&catalogue_fenetre_pvc_checked_product=" + $catalogue_fenetre_pvc_checked_product;
        urlCar += "&catalogue_porte_entree_checked_product=" + $catalogue_porte_entree_checked_product;
        urlCar += "&catalogue_verriere_acier_sectionnelle_checked_product=" + $catalogue_verriere_acier_sectionnelle_checked_product;
        urlCar += "&catalogue_verriere_miroir_checked_product=" + $catalogue_verriere_miroir_checked_product;
        urlCar += "&catalogue_porte_verriere_type_atelier_checked_product=" + $catalogue_porte_verriere_type_atelier_checked_product;
        urlCar += "&catalogue_paroi_douche_checked_product=" + $catalogue_paroi_douche_checked_product;
        urlCar += "&catalogue_verriere_orangerie_checked_product=" + $catalogue_verriere_orangerie_checked_product;
        urlCar += "&catalogue_verriere_district_checked_product=" + $catalogue_verriere_district_checked_product;
        urlCar += "&catalogue_verriere_bistrot_checked_product=" + $catalogue_verriere_bistrot_checked_product;
        urlCar += "&catalogue_verriere_destructure_checked_product=" + $catalogue_verriere_destructure_checked_product;
        urlCar += "&catalogue_verriere_acier_sur_mesure_checked_product=" + $catalogue_verriere_acier_sur_mesure_checked_product;
        urlCar += "&catalogue_pergola_aluminium_checked_product=" + $catalogue_pergola_aluminium_checked_product;
        urlCar += "&catalogue_pergola_bioclimatique_checked_product=" + $catalogue_pergola_bioclimatique_checked_product;
        urlCar += "&catalogue_pergolanda_checked_product=" + $catalogue_pergolanda_checked_product;
        urlCar += "&catalogue_carport_2_poteaux_checked_product=" + $catalogue_carport_2_poteaux_checked_product;
        urlCar += "&catalogue_carport_aluminium_cintre_checked_product=" + $catalogue_carport_aluminium_cintre_checked_product;
        urlCar += "&catalogue_carport_avec_debord_checked_product=" + $catalogue_carport_avec_debord_checked_product;
        urlCar += "&catalogue_carport_double_checked_product=" + $catalogue_carport_double_checked_product;
        urlCar += "&catalogue_carport_garage_checked_product=" + $catalogue_carport_garage_checked_product;
        urlCar += "&catalogue_carport_toit_plat_checked_product=" + $catalogue_carport_toit_plat_checked_product;
        window.open(urlCar,'_blank');
      }else{
        var urlCar = prestashop.urls.base_url + "modules/pdfquotation/pdfquotation-ajax.php?action=addProduct&first_name=" + $first_name + "&last_name=" + $last_name + "&email=" + $email+ "&emailcomercial=" + $email_comercial;
        urlCar += "&phone=" + $phone + "&contacted=" + $contacted  + "&spam=" + $spam +"&htmlstring="+htmlstring;
        urlCar += "&catalogue_portail_checked_product=" + $catalogue_portail_checked_product;
        urlCar += "&catalogue_cloture_grillage_rigide_checked_product=" + $catalogue_cloture_grillage_rigide_checked_product;
        urlCar += "&catalogue_cloture_aluminium_checked_product=" + $catalogue_cloture_aluminium_checked_product;
        urlCar += "&catalogue_porte_garage_battant_checked_product=" + $catalogue_porte_garage_battant_checked_product;
        urlCar += "&catalogue_porte_garage_enroulable_checked_product=" + $catalogue_porte_garage_enroulable_checked_product;
        urlCar += "&catalogue_porte_garage_sectionnelle_checked_product=" + $catalogue_porte_garage_sectionnelle_checked_product;
        urlCar += "&catalogue_volet_battant_isole_penture_checked_product=" + $catalogue_volet_battant_isole_penture_checked_product;
        urlCar += "&catalogue_volet_battant_isole_pre_cadre_checked_product=" + $catalogue_volet_battant_isole_pre_cadre_checked_product;
        urlCar += "&catalogue_volet_roulant_checked_product=" + $catalogue_volet_roulant_checked_product;
        urlCar += "&catalogue_bso_checked_product=" + $catalogue_bso_checked_product;
        urlCar += "&catalogue_baie_coulissante_checked_product=" + $catalogue_baie_coulissante_checked_product;
        urlCar += "&catalogue_fenetre_aluminium_frappe_checked_product=" + $catalogue_fenetre_aluminium_frappe_checked_product;
        urlCar += "&catalogue_fenetre_cintree_frappe_checked_product=" + $catalogue_fenetre_cintree_frappe_checked_product;
        urlCar += "&catalogue_chassis_fixe_checked_product=" + $catalogue_chassis_fixe_checked_product;
        urlCar += "&catalogue_fenetre_pvc_checked_product=" + $catalogue_fenetre_pvc_checked_product;
        urlCar += "&catalogue_porte_entree_checked_product=" + $catalogue_porte_entree_checked_product;
        urlCar += "&catalogue_verriere_acier_sectionnelle_checked_product=" + $catalogue_verriere_acier_sectionnelle_checked_product;
        urlCar += "&catalogue_verriere_miroir_checked_product=" + $catalogue_verriere_miroir_checked_product;
        urlCar += "&catalogue_porte_verriere_type_atelier_checked_product=" + $catalogue_porte_verriere_type_atelier_checked_product;
        urlCar += "&catalogue_paroi_douche_checked_product=" + $catalogue_paroi_douche_checked_product;
        urlCar += "&catalogue_verriere_orangerie_checked_product=" + $catalogue_verriere_orangerie_checked_product;
        urlCar += "&catalogue_verriere_district_checked_product=" + $catalogue_verriere_district_checked_product;
        urlCar += "&catalogue_verriere_bistrot_checked_product=" + $catalogue_verriere_bistrot_checked_product;
        urlCar += "&catalogue_verriere_destructure_checked_product=" + $catalogue_verriere_destructure_checked_product;
        urlCar += "&catalogue_verriere_acier_sur_mesure_checked_product=" + $catalogue_verriere_acier_sur_mesure_checked_product;
        urlCar += "&catalogue_pergola_aluminium_checked_product=" + $catalogue_pergola_aluminium_checked_product;
        urlCar += "&catalogue_pergola_bioclimatique_checked_product=" + $catalogue_pergola_bioclimatique_checked_product;
        urlCar += "&catalogue_pergolanda_checked_product=" + $catalogue_pergolanda_checked_product;
        urlCar += "&catalogue_carport_2_poteaux_checked_product=" + $catalogue_carport_2_poteaux_checked_product;
        urlCar += "&catalogue_carport_aluminium_cintre_checked_product=" + $catalogue_carport_aluminium_cintre_checked_product;
        urlCar += "&catalogue_carport_avec_debord_checked_product=" + $catalogue_carport_avec_debord_checked_product;
        urlCar += "&catalogue_carport_double_checked_product=" + $catalogue_carport_double_checked_product;
        urlCar += "&catalogue_carport_garage_checked_product=" + $catalogue_carport_garage_checked_product;
        urlCar += "&catalogue_carport_toit_plat_checked_product=" + $catalogue_carport_toit_plat_checked_product;
        window.open(urlCar,'_blank');
      }
      window.location.reload(true);
      // var idprod = $("#cat_id_prod").val();

      // sendprod = {imgProd:arrayImg, productname:$("#name_title_product").text(),idprod:idprod };
      // var htmlstring = JSON.stringify(sendprod);
      // var form = $('#ndkcsfields :not(.ndk-accessory-quantity[value="0"])');
      // var formExit = document.getElementById("ndkcsfields");
      // if(formExit) {
      //   $.ajax({
      //       type: "POST",
      //       url: prestashop.urls.base_url + "modules/pdfquotation/pdfquotation-ajax.php",
      //       data: form.serialize(),
      //       dataType: "json",
      //       success:function(data){
      //         var productinfo = JSON.stringify(data);
      //         var urlCar = prestashop.urls.base_url + "modules/pdfquotation/pdfquotation-ajax.php?action=addProduct&first_name=" + $first_name + "&last_name=" + $last_name + "&email=" + $email+ "&emailcomercial=" + $email_comercial;
      //             urlCar += "&phone=" + $phone + "&contacted=" + $contacted  + "&spam=" + $spam +"&htmlstring="+htmlstring+"&productinfo="+productinfo;
      //             window.open(urlCar,'_blank');
      //       }
      //   });
      // }else{
      //   var urlCar = prestashop.urls.base_url + "modules/pdfquotation/pdfquotation-ajax.php?action=addProduct&first_name=" + $first_name + "&last_name=" + $last_name + "&email=" + $email+ "&emailcomercial=" + $email_comercial;
      //   urlCar += "&phone=" + $phone + "&contacted=" + $contacted  + "&spam=" + $spam +"&htmlstring="+htmlstring;
      //   window.open(urlCar,'_blank');
      // }
      $("#modalEmbedDevisProd").hide();
      return false;

  });

  //open modal Devis - Vasco aluclass

  //Send information**************************************************************************************************
  $("#customer-information form").submit(function() {
      $first_name = $("#customer-information #first_name").val();
      $last_name = $("#customer-information #last_name").val();
      $email = $("#customer-information #email").val();
      $email_comercial = $("#customer-information  #email_comercial").val();
      $phone = $("#customer-information #phone").val();
      $contacted = $('#customer-information input[name=contacted]:checked').val();
      $spam = $('#customer-information #spam').val();
      if($('#catalogue_portail_checked').is(":checked")){
        $catalogue_portail_checked = "catalogue_portail";
      }else{
        $catalogue_portail_checked = "empty";
      }

      if($('#catalogue_cloture_grillage_rigide_checked').is(":checked")){
        $catalogue_cloture_grillage_rigide_checked = "catalogue_cloture_grillage_rigide";
      }else{
        $catalogue_cloture_grillage_rigide_checked = "empty";
      }

      if($('#catalogue_cloture_aluminium_checked').is(":checked")){
        $catalogue_cloture_aluminium_checked = "catalogue_cloture_aluminium";
      }else{
        $catalogue_cloture_aluminium_checked = "empty";
      }

      if($('#catalogue_porte_garage_battant_checked').is(":checked")){
        $catalogue_porte_garage_battant_checked = "catalogue_porte_garage_battant";
      }else{
        $catalogue_porte_garage_battant_checked = "empty";
      }

      if($('#catalogue_porte_garage_enroulable_checked').is(":checked")){
        $catalogue_porte_garage_enroulable_checked = "catalogue_porte_garage_enroulable";
      }else{
        $catalogue_porte_garage_enroulable_checked = "empty";
      }

      if($('#catalogue_porte_garage_sectionnelle_checked').is(":checked")){
        $catalogue_porte_garage_sectionnelle_checked = "catalogue_porte_garage_sectionnelle";
      }else{
        $catalogue_porte_garage_sectionnelle_checked = "empty";
      }

      if($('#catalogue_volet_battant_isole_penture_checked').is(":checked")){
        $catalogue_volet_battant_isole_penture_checked = "catalogue_volet_battant_isole_penture";
      }else{
        $catalogue_volet_battant_isole_penture_checked = "empty";
      }

      if($('#catalogue_volet_battant_isole_pre_cadre_checked').is(":checked")){
        $catalogue_volet_battant_isole_pre_cadre_checked = "catalogue_volet_battant_isole_pre_cadre";
      }else{
        $catalogue_volet_battant_isole_pre_cadre_checked = "empty";
      }

      if($('#catalogue_volet_roulant_checked').is(":checked")){
        $catalogue_volet_roulant_checked = "catalogue_volet_roulant";
      }else{
        $catalogue_volet_roulant_checked = "empty";
      }

      if($('#catalogue_bso_checked').is(":checked")){
        $catalogue_bso_checked = "catalogue_bso";
      }else{
        $catalogue_bso_checked = "empty";
      }

      if($('#catalogue_baie_coulissante_checked').is(":checked")){
        $catalogue_baie_coulissante_checked = "catalogue_baie_coulissante";
      }else{
        $catalogue_baie_coulissante_checked = "empty";
      }

      if($('#catalogue_fenetre_aluminium_frappe_checked').is(":checked")){
        $catalogue_fenetre_aluminium_frappe_checked = "catalogue_fenetre_aluminium_frappe";
      }else{
        $catalogue_fenetre_aluminium_frappe_checked = "empty";
      }

      if($('#catalogue_fenetre_cintree_frappe_checked').is(":checked")){
        $catalogue_fenetre_cintree_frappe_checked = "catalogue_fenetre_cintree_frappe";
      }else{
        $catalogue_fenetre_cintree_frappe_checked = "empty";
      }

      if($('#catalogue_chassis_fixe_checked').is(":checked")){
        $catalogue_chassis_fixe_checked = "catalogue_chassis_fixe";
      }else{
        $catalogue_chassis_fixe_checked = "empty";
      }

      if($('#catalogue_fenetre_pvc_checked').is(":checked")){
        $catalogue_fenetre_pvc_checked = "catalogue_fenetre_pvc";
      }else{
        $catalogue_fenetre_pvc_checked = "empty";
      }

      if($('#catalogue_porte_entree_checked').is(":checked")){
        $catalogue_porte_entree_checked = "catalogue_porte_entree";
      }else{
        $catalogue_porte_entree_checked = "empty";
      }

      if($('#catalogue_verriere_acier_sectionnelle_checked').is(":checked")){
        $catalogue_verriere_acier_sectionnelle_checked = "catalogue_verriere_acier_sectionnelle";
      }else{
        $catalogue_verriere_acier_sectionnelle_checked = "empty";
      }

      if($('#catalogue_verriere_miroir_checked').is(":checked")){
        $catalogue_verriere_miroir_checked = "catalogue_verriere_miroir";
      }else{
        $catalogue_verriere_miroir_checked = "empty";
      }

      if($('#catalogue_porte_verriere_type_atelier_checked').is(":checked")){
        $catalogue_porte_verriere_type_atelier_checked = "catalogue_porte_verriere_type_atelier";
      }else{
        $catalogue_porte_verriere_type_atelier_checked = "empty";
      }

      if($('#catalogue_paroi_douche_checked').is(":checked")){
        $catalogue_paroi_douche_checked = "catalogue_paroi_douche";
      }else{
        $catalogue_paroi_douche_checked = "empty";
      }

      if($('#catalogue_verriere_orangerie_checked').is(":checked")){
        $catalogue_verriere_orangerie_checked = "catalogue_verriere_orangerie";
      }else{
        $catalogue_verriere_orangerie_checked = "empty";
      }

      if($('#catalogue_verriere_district_checked').is(":checked")){
        $catalogue_verriere_district_checked = "catalogue_verriere_district";
      }else{
        $catalogue_verriere_district_checked = "empty";
      }

      if($('#catalogue_verriere_bistrot_checked').is(":checked")){
        $catalogue_verriere_bistrot_checked = "catalogue_verriere_bistrot";
      }else{
        $catalogue_verriere_bistrot_checked = "empty";
      }

      if($('#catalogue_verriere_destructure_checked').is(":checked")){
        $catalogue_verriere_destructure_checked = "catalogue_verriere_destructure";
      }else{
        $catalogue_verriere_destructure_checked = "empty";
      }

      if($('#catalogue_verriere_acier_sur_mesure_checked').is(":checked")){
        $catalogue_verriere_acier_sur_mesure_checked = "catalogue_verriere_acier_sur_mesure";
      }else{
        $catalogue_verriere_acier_sur_mesure_checked = "empty";
      }

      if($('#catalogue_pergola_aluminium_checked').is(":checked")){
        $catalogue_pergola_aluminium_checked = "catalogue_pergola_aluminium";
      }else{
        $catalogue_pergola_aluminium_checked = "empty";
      }

      if($('#catalogue_pergola_bioclimatique_checked').is(":checked")){
        $catalogue_pergola_bioclimatique_checked = "catalogue_pergola_bioclimatique";
      }else{
        $catalogue_pergola_bioclimatique_checked = "empty";
      }

      if($('#catalogue_pergolanda_checked').is(":checked")){
        $catalogue_pergolanda_checked = "catalogue_pergolanda";
      }else{
        $catalogue_pergolanda_checked = "empty";
      }

      if($('#catalogue_carport_2_poteaux_checked').is(":checked")){
        $catalogue_carport_2_poteaux_checked = "catalogue_carport_2_poteaux";
      }else{
        $catalogue_carport_2_poteaux_checked = "empty";
      }

      if($('#catalogue_carport_aluminium_cintre_checked').is(":checked")){
        $catalogue_carport_aluminium_cintre_checked = "catalogue_carport_aluminium_cintre";
      }else{
        $catalogue_carport_aluminium_cintre_checked = "empty";
      }

      if($('#catalogue_carport_avec_debord_checked').is(":checked")){
        $catalogue_carport_avec_debord_checked = "catalogue_carport_avec_debord";
      }else{
        $catalogue_carport_avec_debord_checked = "empty";
      }

      if($('#catalogue_carport_double_checked').is(":checked")){
        $catalogue_carport_double_checked = "catalogue_carport_double";
      }else{
        $catalogue_carport_double_checked = "empty";
      }

      if($('#catalogue_carport_garage_checked').is(":checked")){
        $catalogue_carport_garage_checked = "catalogue_carport_garage";
      }else{
        $catalogue_carport_garage_checked = "empty";
      }

      if($('#catalogue_carport_toit_plat_checked').is(":checked")){
        $catalogue_carport_toit_plat_checked = "catalogue_carport_toit_plat";
      }else{
        $catalogue_carport_toit_plat_checked = "empty";
      }
      sharecart = $("#sharecart").val();

      if ($first_name == "" || $last_name == "" || $email == "" || $phone == "") {
          alert("Il manque une information obligatoire à votre devis!");
          return false;
      }

      var url = prestashop.urls.base_url + "modules/pdfquotation/pdfquotation-ajax.php?action=addCar&first_name=" + $first_name + "&last_name=" + $last_name + "&email=" + $email+"&emailcomercial=" + $email_comercial;
      url += "&phone=" + $phone + "&contacted=" + $contacted + "&sharecart=" + sharecart + "&spam=" + $spam;
      url += "&catalogue_portail_checked=" + $catalogue_portail_checked;
      url += "&catalogue_cloture_grillage_rigide_checked=" + $catalogue_cloture_grillage_rigide_checked;
      url += "&catalogue_cloture_aluminium_checked=" + $catalogue_cloture_aluminium_checked;
      url += "&catalogue_porte_garage_battant_checked=" + $catalogue_porte_garage_battant_checked;
      url += "&catalogue_porte_garage_enroulable_checked=" + $catalogue_porte_garage_enroulable_checked;
      url += "&catalogue_porte_garage_sectionnelle_checked=" + $catalogue_porte_garage_sectionnelle_checked;
      url += "&catalogue_volet_battant_isole_penture_checked=" + $catalogue_volet_battant_isole_penture_checked;
      url += "&catalogue_volet_battant_isole_pre_cadre_checked=" + $catalogue_volet_battant_isole_pre_cadre_checked;
      url += "&catalogue_volet_roulant_checked=" + $catalogue_volet_roulant_checked;
      url += "&catalogue_bso_checked=" + $catalogue_bso_checked;
      url += "&catalogue_baie_coulissante_checked=" + $catalogue_baie_coulissante_checked;
      url += "&catalogue_fenetre_aluminium_frappe_checked=" + $catalogue_fenetre_aluminium_frappe_checked;
      url += "&catalogue_fenetre_cintree_frappe_checked=" + $catalogue_fenetre_cintree_frappe_checked;
      url += "&catalogue_chassis_fixe_checked=" + $catalogue_chassis_fixe_checked;
      url += "&catalogue_fenetre_pvc_checked=" + $catalogue_fenetre_pvc_checked;
      url += "&catalogue_porte_entree_checked=" + $catalogue_porte_entree_checked;
      url += "&catalogue_verriere_acier_sectionnelle_checked=" + $catalogue_verriere_acier_sectionnelle_checked;
      url += "&catalogue_verriere_miroir_checked=" + $catalogue_verriere_miroir_checked;
      url += "&catalogue_porte_verriere_type_atelier_checked=" + $catalogue_porte_verriere_type_atelier_checked;
      url += "&catalogue_paroi_douche_checked=" + $catalogue_paroi_douche_checked;
      url += "&catalogue_verriere_orangerie_checked=" + $catalogue_verriere_orangerie_checked;
      url += "&catalogue_verriere_district_checked=" + $catalogue_verriere_district_checked;
      url += "&catalogue_verriere_bistrot_checked=" + $catalogue_verriere_bistrot_checked;
      url += "&catalogue_verriere_destructure_checked=" + $catalogue_verriere_destructure_checked;
      url += "&catalogue_verriere_acier_sur_mesure_checked=" + $catalogue_verriere_acier_sur_mesure_checked;
      url += "&catalogue_pergola_aluminium_checked=" + $catalogue_pergola_aluminium_checked;
      url += "&catalogue_pergola_bioclimatique_checked=" + $catalogue_pergola_bioclimatique_checked;
      url += "&catalogue_pergolanda_checked=" + $catalogue_pergolanda_checked;
      url += "&catalogue_carport_2_poteaux_checked=" + $catalogue_carport_2_poteaux_checked;
      url += "&catalogue_carport_aluminium_cintre_checked=" + $catalogue_carport_aluminium_cintre_checked;
      url += "&catalogue_carport_avec_debord_checked=" + $catalogue_carport_avec_debord_checked;
      url += "&catalogue_carport_double_checked=" + $catalogue_carport_double_checked;
      url += "&catalogue_carport_garage_checked=" + $catalogue_carport_garage_checked;
      url += "&catalogue_carport_toit_plat_checked=" + $catalogue_carport_toit_plat_checked;
      document.location.href = url;


      $('#modalEmbedDevis').modal('hide');



      return false;
  });


  //Display Error*****************************************************************************************************
  function getQueryVar(variable) {
      var query = window.location.search.substring(1);
      var vars = query.split("&");
      for (var i=0;i<vars.length;i++) {
          var pair = vars[i].split("=");
          if(pair[0] == variable){return pair[1];}
      }
      return(false);
  }
  if (getQueryVar("error-pdf") == 1) {
      alert("Il manque une information obligatoire à votre devis!");
  }
});
