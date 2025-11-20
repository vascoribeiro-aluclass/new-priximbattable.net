{**
 * 2007-2018 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License 3.0 (AFL-3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2018 PrestaShop SA
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License 3.0 (AFL-3.0)
 * International Registered Trademark & Property of PrestaShop SA
 *}
{extends file=$layout}

{block name='head_seo' prepend}
  <link rel="canonical" href="{$product.canonical_url}">
  <link rel="stylesheet" href="/themes/classic/assets/css/product.css" />
{/block}

{block name='head' append}
  {assign var='ipAddr' value=Product::getIpUser()}
  {assign var='checaDescontosCatalogo' value=Product::checaDescontosCatalogo({$product.id_category_default},{$product.id})}
  {assign var='infoProduto' value=Product::infoProduto({$product.id}, {$product.price_amount}, {$product.price_tax_exc})}
  {assign var='precoAtualizadoSEO' value=Product::precoAtualizadoSEO({$infoProduto['preco_final_sem_desc_seo']},
  {$checaDescontosCatalogo['reduction_value']}, {$infoProduto['preco_final_sem_desc_seo_sem_portes']})}

  <meta property="og:type" content="product">
  <meta property="og:url" content="{$urls.current_url}">
  <meta property="og:title" content="{$page.meta.title}">
  <meta property="og:site_name" content="{$shop.name}">
  <meta property="og:description" content="{$page.meta.description}">
  <meta property="og:image" content="{$product.cover.large.url}">
  <meta property="product:pretax_price:amount" content="{$product.price_tax_exc}">
  <meta property="product:pretax_price:currency" content="{$currency.iso_code}">
  <meta property="product:price:amount" content="{$precoAtualizadoSEO['preco_com_desconto_catalogo']}">
  <meta property="product:price:currency" content="{$currency.iso_code}">
  {if isset($product.weight) && ($product.weight != 0)}
    <meta property="product:weight:value" content="{$product.weight}">
    <meta property="product:weight:units" content="{$product.weight_unit}">
  {/if}

  {$arrayidfield = [640129,640128,640127,640126,640125,640105,640106,640107,640108,640109]}

  {* {assign var='carrierBeginPrice' value=Product::getCarrierPrice({$product.id},{$product.tax})} *}

  {if  {$product.id_category_default} == 126 || {$product.id_category_default} == 67 || {$product.id_category_default} ==
    127 || {$product.id_category_default} == 128}
    {$anosgarantia = '5' }
    {$anosgarantiaText = 'ans' }
  {elseif $product.id_product|in_array:$arrayidfield}
    {$anosgarantia = '1' }
    {$anosgarantiaText = 'an' }
  {else}
    {$anosgarantia = '20'}
    {$anosgarantiaText = 'ans' }
  {/if}

  {if $product.id_product|in_array:$arrayidfield}
    {assign var='scoreProduct' value='5.9'}
    {$fabricadoEm = 'en R.C.P.' }
    {$fabricadoImg = '/img/NotaCentre/china' }
    {$fabricadoheight = '45' }
    {$fabricadowidth = '45' }
    {*/ News height and width /*}
    {$fabricheight = '53'}
    {$fabricwidth = '53'}
    {$fabricadoLINK = '' }
  {else}
    {assign var='scoreProduct' value=Product::getScoreRepairProduct({$product.id})}
    {$fabricadoEm = 'en Europe'}
    {$fabricadoImg = '/img/NotaCentre/site_fabrique_en_europe'}
    {$fabricadoheight = '45' }
    {$fabricadowidth = '45' }
    {*/ News height and width /*}
    {$fabricheight = '53'}
    {$fabricwidth = '53'}
    {$fabricadoLINK = '/content/32-fabricant' }
  {/if}

  {if {$product.price_amount} <= 6000} {$parcelas = '4'} {else} {$parcelas = '48'} {/if} {*Model for devis begin*}
    {if $multony == 4} {$imgcredit = 'alma4x'} {$linkcredit = '/content/61-payez-vos-achats-en-3-ou-4-fois-avec-alma'}
    {else} {$imgcredit = 'Oney48'}
    {$linkcredit = '/content/67-le-paiement-en-12-24-36-48-60-ou-84-fois-avec-oney-chez-priximbattable'} {/if} <div
    id="alugallerybox-product" onclick="oneClick(event, this);" class="alugallerybox-overlay alugallerybox-overlay-fixed"
    style="width: auto; height: auto; display: none;">
    <div class="alugallerybox-wrap alugallerybox-desktop alugallerybox-type-image alugallerybox-opened" tabindex="-1"
      style="width: 800px; height: auto; position: absolute; top: 63px; left: 551px; opacity: 1; overflow: visible;">
      <div class="alugallerybox-skin ui-draggable" style="padding: 0px; width: auto; height: auto;">
        <div class="alugallerybox-outer">
          <div id="alugallerybox-loading" class="alugallerybox-loading " style="display:none;">
          </div>
          <div id="alugallerybox-img" class="alugallerybox-inner" style="overflow: visible; width: 800px; height: 800px;">
            {* <img loading="lazy" class="alugallerybox-image" src="" alt=""> *}
          </div>
          <a title="Previous" class="alugallerybox-nav alugallerybox-prev"
            onclick="previousAluGallery()"><span></span></a>
          <a title="Next" class="alugallerybox-nav alugallerybox-next" onclick="nextAluGallery()"><span></span></a>
        </div>
        <a title="Close" class="alugallerybox-item alugallerybox-close" onclick="hideAluGallery()"></a>
      </div>
    </div>
    </div>
    <div id="popup" class="popup" onclick="closePopupThumbnails()">
      <span class="close">&times;</span>
      <img loading="lazy" alt="" class="popup-content" id="popup-img">
    </div>

    <div class="modal fade in" id="modalEmbedDevisProd" tabindex="-1" role="dialog" style="display: none; ">
      <div class="modal-dialog modal-lg pdfcatalogo-size" role="document">
        <div class="modal-content" style="border-radius: 25px;">
          <div class="modal-header" style="/*! text-align: right; */display: inline;display: -webkit-box;display: -ms-flexbox;display: flex;-webkit-box-align: start;-ms-flex-align: start;align-items: flex-start;-webkit-box-pack: justify;-ms-flex-pack: justify;justify-content: space-between;padding: 1rem;border-bottom: 1px solid #e9ecef;border-top-left-radius: 25px;
           border-top-right-radius: 25px;
           background-color: #abc4c7;">

            <div class="h1" style="color: white;">Imprimer un devis</div>
            <button id="modalEmbedDevisProd_close" type="button"
              style="cursor: pointer;float: right;font-size: 1.5rem;font-weight: 700;line-height: 1;color: #000;text-shadow: 0 1px 0 #fff;opacity: .5;padding: 1rem;margin: -1rem -1rem -1rem auto;background-color: transparent;border: 0;-webkit-appearance: none;">X</button>

          </div>
          <div class="modal-body">
            <div>
              <div id="print-quotation">
                <div id="customer-information-prod">
                  <input id="generateproductid" type="hidden" name="generateproductid" value="0">
                  <form id="tag_devis">
                    <div class="row">
                      <div class="col-md-5">
                        <picture>
                          <source srcset="/img/cms/popup-budget.webp" type="image/webp">
                          <img loading="lazy" src="/img/cms/popup-budget.jpg" class="img-fluid" alt="Imprimer un devis" />
                        </picture>
                      </div>
                      <div class="col-md-6">
                        <section class="form-fields">
                          <div class="form-group row" style="display:none;">
                            <label class="col-md-3">Imprimer un devis</label>
                            <div class="col-md-9">
                              <input name="first_name" type="text">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-md-3 form-control-label">Nom</label>
                            <div class="col-md-9">
                              <input class="form-control" name="last_name" id="last_name" type="text" required="required">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-md-3 form-control-label">Email</label>
                            <div class="col-md-9">
                              <input class="form-control" name="email" id="email" type="email" required="required">
                            </div>
                          </div>

                          {if $ipAddr }
                            <div class="form-group row">
                              <label class="col-md-3 form-control-label">Email Commercial</label>
                              <div class="col-md-9">
                                <input class="form-control" name="email_comercial" id="email_comercial" type="email">
                                <span class="mon_modal_warnning" id="warning_mail_comercial"></span>
                              </div>
                            </div>
                          {/if}


                          <div class="form-group row">
                            <label class="col-md-3 form-control-label">Téléphone</label>
                            <div class="col-md-9">
                              <input class="form-control" name="phone" id="phone" type="text">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-md-6 form-control-label">Être approché par nos
                              conseillers</label>
                            <div class="col-md-6 form-control-valign">
                              <label class="radio-inline">
                                <span class="custom-radio">
                                  <input type="radio" name="contacted" id="yes" value="1">
                                  <span></span>
                                </span>
                                Oui
                              </label>

                              <label class="radio-inline">
                                <span class="custom-radio">
                                  <input type="radio" name="contacted" id="no" value="0" checked="checked">
                                  <span></span>
                                </span>
                                Non
                              </label>
                            </div>
                          </div>
                          <div class="form-group row">
                            {if $ipAddr }
                              <div class="col-xs-2 col-sm-7 col-md-2 col-lg-5"></div>
                              <div class="col-xs-10 col-sm-5 col-md-10 col-lg-7">
                                <div class="dropdown">
                                  <button class="btn btn-secondary dropdown-toggle w-100" type="button"
                                    id="dropdownCatalogueProductCheckList" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    Fiche Produit
                                  </button>
                                  <div class="dropdown_menu_catalog dropdown-menu w-100"
                                    style="max-height: 130px; overflow-y: scroll;"
                                    aria-labelledby="dropdownCatalogueCheckList">
                                    <div class="d-flex justify-content-center" onclick="event.stopPropagation()">
                                      <input style="margin-left:6px; margin-right:6px;" type="checkbox"
                                        name="catalogue_portail_checked_product" id="catalogue_portail_checked_product"
                                        value="">
                                      <label for="catalogue_portail_checked_product">Portail</label>
                                    </div>
                                    <div class="d-flex justify-content-center" onclick="event.stopPropagation()">
                                      <input style="margin-left:6px; margin-right:6px;" type="checkbox"
                                        name="catalogue_cloture_grillage_rigide_checked_product"
                                        id="catalogue_cloture_grillage_rigide_checked_product" value="">
                                      <label for="catalogue_cloture_grillage_rigide_checked_product">Cloture Grillage
                                        Rigide</label>
                                    </div>
                                    <div class="d-flex justify-content-center" onclick="event.stopPropagation()">
                                      <input style="margin-left:6px; margin-right:6px;" type="checkbox"
                                        name="catalogue_cloture_aluminium_checked_product"
                                        id="catalogue_cloture_aluminium_checked_product" value="">
                                      <label for="catalogue_cloture_aluminium_checked_product">Cloture Aluminium</label>
                                    </div>
                                    {* resto dos catalogos *}
                                    <div class="d-flex justify-content-center" onclick="event.stopPropagation()">
                                      <input style="margin-left:6px; margin-right:6px;" type="checkbox"
                                        name="catalogue_porte_garage_battant_checked_product"
                                        id="catalogue_porte_garage_battant_checked_product" value="">
                                      <label for="catalogue_porte_garage_battant_checked_product">Porte Garage a
                                        Battant</label>
                                    </div>
                                    <div class="d-flex justify-content-center" onclick="event.stopPropagation()">
                                      <input style="margin-left:6px; margin-right:6px;" type="checkbox"
                                        name="catalogue_porte_garage_enroulable_checked_product"
                                        id="catalogue_porte_garage_enroulable_checked_product" value="">
                                      <label for="catalogue_porte_garage_enroulable_checked_product">Porte Garage
                                        Enroulable</label>
                                    </div>
                                    <div class="d-flex justify-content-center" onclick="event.stopPropagation()">
                                      <input style="margin-left:6px; margin-right:6px;" type="checkbox"
                                        name="catalogue_porte_garage_sectionnelle_checked_product"
                                        id="catalogue_porte_garage_sectionnelle_checked_product" value="">
                                      <label for="catalogue_porte_garage_sectionnelle_checked_product">Porte de Garage
                                        Sectionnelle</label>
                                    </div>
                                    <div class="d-flex justify-content-center" onclick="event.stopPropagation()">
                                      <input style="margin-left:6px; margin-right:6px;" type="checkbox"
                                        name="catalogue_volet_battant_isole_penture_checked_product"
                                        id="catalogue_volet_battant_isole_penture_checked_product" value="">
                                      <label for="catalogue_volet_battant_isole_penture_checked_product">Volet Battant Isolé
                                        Penture</label>
                                    </div>
                                    <div class="d-flex justify-content-center" onclick="event.stopPropagation()">
                                      <input style="margin-left:6px; margin-right:6px;" type="checkbox"
                                        name="catalogue_volet_battant_isole_pre_cadre_checked_product"
                                        id="catalogue_volet_battant_isole_pre_cadre_checked_product" value="">
                                      <label for="catalogue_volet_battant_isole_pre_cadre_checked_product">Volet Battant
                                        Isolé Pre Cadre</label>
                                    </div>
                                    <div class="d-flex justify-content-center" onclick="event.stopPropagation()">
                                      <input style="margin-left:6px; margin-right:6px;" type="checkbox"
                                        name="catalogue_volet_roulant_checked_product"
                                        id="catalogue_volet_roulant_checked_product" value="">
                                      <label for="catalogue_volet_roulant_checked_product">Volet Roulant</label>
                                    </div>
                                    <div class="d-flex justify-content-center" onclick="event.stopPropagation()">
                                      <input style="margin-left:6px; margin-right:6px;" type="checkbox"
                                        name="catalogue_bso_checked_product" id="catalogue_bso_checked_product" value="">
                                      <label for="catalogue_bso_checked_product">BSO</label>
                                    </div>
                                    <div class="d-flex justify-content-center" onclick="event.stopPropagation()">
                                      <input style="margin-left:6px; margin-right:6px;" type="checkbox"
                                        name="catalogue_baie_coulissante_checked_product"
                                        id="catalogue_baie_coulissante_checked_product" value="">
                                      <label for="catalogue_baie_coulissante_checked_product">Baie Coulissante</label>
                                    </div>
                                    <div class="d-flex justify-content-center" onclick="event.stopPropagation()">
                                      <input style="margin-left:6px; margin-right:6px;" type="checkbox"
                                        name="catalogue_fenetre_aluminium_frappe_checked_product"
                                        id="catalogue_fenetre_aluminium_frappe_checked_product" value="">
                                      <label for="catalogue_fenetre_aluminium_frappe_checked_product">Fenêtre Aluminium à
                                        Frappe</label>
                                    </div>
                                    <div class="d-flex justify-content-center" onclick="event.stopPropagation()">
                                      <input style="margin-left:6px; margin-right:6px;" type="checkbox"
                                        name="catalogue_fenetre_cintree_frappe_checked_product"
                                        id="catalogue_fenetre_cintree_frappe_checked_product" value="">
                                      <label for="catalogue_fenetre_cintree_frappe_checked_product">Fenêtre Cintrée à
                                        Frappe</label>
                                    </div>
                                    <div class="d-flex justify-content-center" onclick="event.stopPropagation()">
                                      <input style="margin-left:6px; margin-right:6px;" type="checkbox"
                                        name="catalogue_chassis_fixe_checked_product"
                                        id="catalogue_chassis_fixe_checked_product" value="">
                                      <label for="catalogue_chassis_fixe_checked_product">Chassis Fixe</label>
                                    </div>
                                    <div class="d-flex justify-content-center" onclick="event.stopPropagation()">
                                      <input style="margin-left:6px; margin-right:6px;" type="checkbox"
                                        name="catalogue_fenetre_pvc_checked_product"
                                        id="catalogue_fenetre_pvc_checked_product" value="">
                                      <label for="catalogue_fenetre_pvc_checked_product">Fenêtre PVC</label>
                                    </div>
                                    <div class="d-flex justify-content-center" onclick="event.stopPropagation()">
                                      <input style="margin-left:6px; margin-right:6px;" type="checkbox"
                                        name="catalogue_porte_entree_checked_product"
                                        id="catalogue_porte_entree_checked_product" value="">
                                    <label for="catalogue_porte_entree_checked_product">Porte d'Entrée</label>
                                </div>
                                <div class="d-flex justify-content-center" onclick="event.stopPropagation()">
                                  <input style="margin-left:6px; margin-right:6px;" type="checkbox"
                                    name="catalogue_verriere_acier_sectionnelle_checked_product"
                                    id="catalogue_verriere_acier_sectionnelle_checked_product" value="">
                                  <label for="catalogue_verriere_acier_sectionnelle_checked_product">Verrière
                                    Acier</label>
                                </div>
                                <div class="d-flex justify-content-center" onclick="event.stopPropagation()">
                                  <input style="margin-left:6px; margin-right:6px;" type="checkbox"
                                    name="catalogue_verriere_miroir_checked_product"
                                    id="catalogue_verriere_miroir_checked_product" value="">
                                  <label for="catalogue_verriere_miroir_checked_product">Verrière Miroir</label>
                                </div>
                                <div class="d-flex justify-content-center" onclick="event.stopPropagation()">
                                  <input style="margin-left:6px; margin-right:6px;" type="checkbox"
                                    name="catalogue_porte_verriere_type_atelier_checked_product"
                                    id="catalogue_porte_verriere_type_atelier_checked_product" value="">
                                  <label for="catalogue_porte_verriere_type_atelier_checked_product">Porte Verrière Type
                                    Atelier</label>
                                </div>
                                <div class="d-flex justify-content-center" onclick="event.stopPropagation()">
                                  <input style="margin-left:6px; margin-right:6px;" type="checkbox"
                                    name="catalogue_paroi_douche_checked_product"
                                    id="catalogue_paroi_douche_checked_product" value="">
                                  <label for="catalogue_paroi_douche_checked_product">Paroi de Douche</label>
                                </div>
                                <div class="d-flex justify-content-center" onclick="event.stopPropagation()">
                                  <input style="margin-left:6px; margin-right:6px;" type="checkbox"
                                    name="catalogue_verriere_orangerie_checked_product"
                                    id="catalogue_verriere_orangerie_checked_product" value="">
                                  <label for="catalogue_verriere_orangerie_checked_product">Verrière Orangerie</label>
                                </div>
                                <div class="d-flex justify-content-center" onclick="event.stopPropagation()">
                                  <input style="margin-left:6px; margin-right:6px;" type="checkbox"
                                    name="catalogue_verriere_district_checked_product"
                                    id="catalogue_verriere_district_checked_product" value="">
                                  <label for="catalogue_verriere_district_checked_product">Verrière District</label>
                                </div>
                                <div class="d-flex justify-content-center" onclick="event.stopPropagation()">
                                  <input style="margin-left:6px; margin-right:6px;" type="checkbox"
                                    name="catalogue_verriere_bistrot_checked_product"
                                    id="catalogue_verriere_bistrot_checked_product" value="">
                                  <label for="catalogue_verriere_bistrot_checked_product">Verrière Bistrot</label>
                                </div>
                                <div class="d-flex justify-content-center" onclick="event.stopPropagation()">
                                  <input style="margin-left:6px; margin-right:6px;" type="checkbox"
                                    name="catalogue_verriere_destructure_checked_product"
                                    id="catalogue_verriere_destructure_checked_product" value="">
                                  <label for="catalogue_verriere_destructure_checked_product">Verrière
                                    Destructuré</label>
                                </div>
                                <div class="d-flex justify-content-center" onclick="event.stopPropagation()">
                                  <input style="margin-left:6px; margin-right:6px;" type="checkbox"
                                    name="catalogue_verriere_acier_sur_mesure_checked_product"
                                    id="catalogue_verriere_acier_sur_mesure_checked_product" value="">
                                  <label for="catalogue_verriere_acier_sur_mesure_checked_product">Verrière Acier Sur
                                    Mesure</label>
                                </div>
                                <div class="d-flex justify-content-center" onclick="event.stopPropagation()">
                                  <input style="margin-left:6px; margin-right:6px;" type="checkbox"
                                    name="catalogue_pergola_aluminium_checked_product"
                                    id="catalogue_pergola_aluminium_checked_product" value="">
                                  <label for="catalogue_pergola_aluminium_checked_product">Pergola Aluminium</label>
                                </div>
                                <div class="d-flex justify-content-center" onclick="event.stopPropagation()">
                                  <input style="margin-left:6px; margin-right:6px;" type="checkbox"
                                    name="catalogue_pergola_bioclimatique_checked_product"
                                    id="catalogue_pergola_bioclimatique_checked_product" value="">
                                  <label for="catalogue_pergola_bioclimatique_checked_product">Pergola
                                    Bioclimatique</label>
                                </div>
                                <div class="d-flex justify-content-center" onclick="event.stopPropagation()">
                                  <input style="margin-left:6px; margin-right:6px;" type="checkbox"
                                    name="catalogue_pergolanda_checked_product"
                                    id="catalogue_pergolanda_checked_product" value="">
                                  <label for="catalogue_pergolanda_checked_product">Pergolanda</label>
                                </div>
                                <div class="d-flex justify-content-center" onclick="event.stopPropagation()">
                                  <input style="margin-left:6px; margin-right:6px;" type="checkbox"
                                    name="catalogue_carport_2_poteaux_checked_product"
                                    id="catalogue_carport_2_poteaux_checked_product" value="">
                                  <label for="catalogue_carport_2_poteaux_checked_product">Carport 2 Poteaux</label>
                                </div>
                                <div class="d-flex justify-content-center" onclick="event.stopPropagation()">
                                  <input style="margin-left:6px; margin-right:6px;" type="checkbox"
                                    name="catalogue_carport_aluminium_cintre_checked_product"
                                    id="catalogue_carport_aluminium_cintre_checked_product" value="">
                                  <label for="catalogue_carport_aluminium_cintre_checked_product">Carport Aluminium
                                    Cintré</label>
                                </div>
                                <div class="d-flex justify-content-center" onclick="event.stopPropagation()">
                                  <input style="margin-left:6px; margin-right:6px;" type="checkbox"
                                    name="catalogue_carport_avec_debord_checked_product"
                                    id="catalogue_carport_avec_debord_checked_product" value="">
                                  <label for="catalogue_carport_avec_debord_checked_product">Carport Avec Débord</label>
                                </div>
                                <div class="d-flex justify-content-center" onclick="event.stopPropagation()">
                                  <input style="margin-left:6px; margin-right:6px;" type="checkbox"
                                    name="catalogue_carport_double_checked_product"
                                    id="catalogue_carport_double_checked_product" value="">
                                  <label for="catalogue_carport_double_checked_product">Carport Double</label>
                                </div>
                                <div class="d-flex justify-content-center" onclick="event.stopPropagation()">
                                  <input style="margin-left:6px; margin-right:6px;" type="checkbox"
                                    name="catalogue_carport_garage_checked_product"
                                    id="catalogue_carport_garage_checked_product" value="">
                                  <label for="catalogue_carport_garage_checked_product">Carport Garage</label>
                                </div>
                                <div class="d-flex justify-content-center" onclick="event.stopPropagation()">
                                  <input style="margin-left:6px; margin-right:6px;" type="checkbox"
                                    name="catalogue_carport_toit_plat_checked_product"
                                    id="catalogue_carport_toit_plat_checked_product" value="">
                                  <label for="catalogue_carport_toit_plat_checked_product">Carport Toit Plat</label>
                                </div>
                                {* resto dos catalogos *}
                              </div>
                            </div>
                          </div>
                          {/if}
                        </div>
                        <input name="spam" id="spam" type="hidden" value="" />
                      </section>

                      <footer class="form-footer clearfix" style="text-align: end;">
                        <button class="btn btn-primary form-control-submit pull-xs-right"
                          style="background-color: #abc4c7 !important;" type="submit" id="btn_tag_devis_prod">
                          <i class="material-icons ">print</i> IMPRIMER
                        </button>
                      </footer>
                    </div>
                  </div>
                </form>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
  {*Model for devis end*}


  {*Model for indice de reparabilite begin*}


  <div class="modal fade in" id="modalEmbedReparabilite" tabindex="-1" role="dialog"
    style="display: none; padding-right: 17px;">
    <div class="modal-dialog modal-lg" role="document" style="width: 400px;">
      <div class="modal-content modal-content-Reparabilite" style="border-radius: 1rem;">
        <div class="modal-header modal-header-alu" style="background-color: #6C8EBB; ">

          <div class="h1" style="color: rgb(255, 255, 255);">L'indice de Réparabilité</div>
            <button id="modalEmbedReparabilite_close" type="button" class="modal-close-alu">X</button>

          </div>
          <div class="modal-body">
            <div>

              <div id="customer-Reparabilite">
                <form id="tag_Reparabilite">
                  <section class="form-fields">
                    <div class="form-group row" style="display:none;">
                      <label class="col-md-3">L'indice de Réparabilité</label>
                    <div class="col-md-9">
                      <input name="first_name" type="text">
                    </div>
                  </div>
                  <div class="bodyrepairmessage">
                    Merci pour votre contribution, votre avis a été reçue avec succès.
                  </div>

                  <div class="bodyrepair">
                    <div class="slidecontainer pt-2">
                      <div class="range-value" id="bubblescore"><span class="info-bubblescore">5</span></div>
                      <input type="range" min="1" max="10" value="5" class="slider " id="rangescore">

                    </div>
                    <div style="margin-top: -5px;color: gray;font-style: italic;font-size: 11px;" class="pb-3">
                      <span
                        style="left: 5%;/*! display: table-caption; */position: absolute;/*! opacity: 0.7; *//*! font-size: 11px; */">1</span>
                      <span
                        style="left: 92%;/*! display: table-caption; */position: absolute;font-size: 11px;/*! color: gray; *//*! font-style: italic; */">10</span>
                    </div>
                    <input name="id_produt_review_fix" id="id_produt_review_fix" type="hidden" value="{$product.id}" />
                  </div>
                </section>

                <footer class="form-footer clearfix" style="text-align: end;">
                  <button class="btn btn-primary form-control-submit pull-xs-right" type="button"
                    id="btn_tag_review_fix" style="background-color: #6C8EBB; color: rgb(255, 255, 255);">
                    VALIDER
                  </button>
                </footer>

              </form>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

  {*Model for indice de reparabilite end*}

  {* <div style="display :none;">
      <div id="nom_devis">
        <p style="padding-top: 50px;"><img loading="lazy" class="logo img-responsive" src="/img/priximbattable-logo-1547030832.jpg"
            alt="priximbattable" style="width: 258; height: 39;"> </p>
        <p style=' font-family: poppins,sans-serif; font-size: 25px;font-weight: bold;'> {$product.name} </p>
        <div>
          <div style=" float: left;
                      width: 40%; font-family: poppins,sans-serif;">
            <div id="nom_devis_imagem" style="width: 250px; height: 250px;">
            </div>
            <p style=" color: #686868;font-size: 12px; font-family: poppins,sans-serif;">Price: <span
                style=" color: #686868;font-size: 14px;font-weight: bold;"> {$infoProduto['preco_final_sem_desc']} </span>
              <span id="option_ndk_devis" style=" color: #686868;font-size: 14px;font-weight: bold;"> </span>
            </p>
            <p style=" font-family: poppins,sans-serif;"> Total : <span
                class="price productPriceUpbanner product-price product_nota_centre"
                style=" color: #686868;font-size: 24px;font-weight: bold;"> {$product.price}</span>
              {if {$checaDescontosCatalogo['reduction']} >= 1}
                <span style=" color: #686868;font-size: 18px;font-weight: bold;">
                  -{$checaDescontosCatalogo['reduction_value']}%</span>
              </p>
            {/if}
          </div>
          <div style=" float: left;
          width: 60%;">
            <div id="nom_devis_descricao" style='font-family: poppins,sans-serif;'>

            </div>
          </div>
        </div>
      </div>
    </div> *}

  <div class="row hidden-md-up " id="menu_float_mobile"
    style="margin: 0px;width: 100%; display: none; background-color: rgb(247, 247, 247); z-index: 50; height: 110px; position: fixed; bottom: 0px;  box-shadow: rgb(179, 179, 179) 0px 0px 20px; ">
    <div class="row" style="padding-top: 10px;">
      <div class="col-xs-9">
        <div class="col-xs-6">
          <div class="row">
            <div class="col-xs-12  div_PrecoEntregaEsq" style="text-align: center; ">
              <img loading="lazy" class="entrega" src="/img/local_shipping_black_24dp.svg" width="20" height="20"
                alt="">
              <span style="font-size: 15px;" class="prazoentregamobile">
                {if $infoProduto.free_shipping == 1}
                Offerte <s>{$infoProduto.porteprice_text}</s> €
                {elseif $infoProduto.half_free_shipping  == 1}
                Offerte <s>{$infoProduto.porteprice_text}</s> €
                {else}
                {$infoProduto.porteprice_text} €
                {/if}
              </span>
            </div>
            <div class="col-xs-12 pt-1" style="text-align: center;">
              <img loading="lazy" class="entrega" src="/img/event_available_black_24dp.svg" width="20" height="20"
                alt="">
              <span style="font-size: 15px;" class="dataentregamobile">{$infoProduto.time_shipping} jours</span>
            </div>
          </div>
        </div>
        <div class="col-xs-6">
          <div class="row">
            <div class="col-xs-12  ">
              <span style="color: #686868;
                 font-size: 12px;
                 font-weight: bold;
                 padding-bottom: 5px;
                 display: block !important;
                 line-height: 1;
                 text-align: center;"
                class="price productPriceUpbanner product-price product_nota_centre ">{$product.price}</span>
              <a class="linkcreditpage" href="{$linkcredit}" target="_blank" data-toggle="tooltip">

                <span class="price productPriceUpx4mobile alu_oney_low_show_box product_nota_centre" style="height: 57px !important;
                   display: block !important;
                   font-size: 12px;
                   font-weight: bold;
                   color: #979797;
                   line-height: 1;
                   padding-top: 5px;">
                  {$parcelas}x{($product.price_amount/$parcelas)|round:2}€
                  <img loading="lazy" src="/img/{$imgcredit}.png" width="110" height="auto" alt="">
                </span>

              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xs-2">
        <div class="row">
          <div class="col-md-12   product_nota_centre">
            <button form="ndkcsfields" name="submitNdkcsfields"
              class="submitNdkcsfields button exclusive btn btn-primary"> <i class="material-icons "
                style="margin-right: 0px;">shopping_cart</i> </button>
          </div>
          <div class="col-md-12  pt-1 product_nota_centre">



            <button class="mon_devis button exclusive btn embedAluDevisProd" style="background: #d2d2d2; "> <i
                class="material-icons ">print</i> </button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row hidden-md-down bar-down-descktop" id="menu_float">
    <div class="alu-justify-space-evenly alu-dir-row alu-align-center" style="padding-top: 10px; ">
      <div class="alu-dir-row ">
        <div class="alu-dir-row  alu-justify-space-evenly show_small_ecra">
          {* {if $product.id_product|in_array:$arrayidfield}

            {else}

              <div class="col-md-3 ">
                <a href="/content/32-fabricant" target="_blank">
                  <div class="product_nota_centre product_nota_box_generic" style="background-color: #A2B1A3;">
                    <div class="row">
                      <div class="col-md-12 product_nota_centre " style="margin-top: 1rem;">
                        <picture>
                          <source srcset="/img/NotaCentre/site_fabrication_prope.webp" type="image/webp">
                          <img loading="lazy" alt="Fabrication Prope" width="53px" height="53px"
                            src="/img/NotaCentre/site_fabrication_prope.png">
                        </picture>
                      </div>
                      <div class="col-md-12 product_nota_centre product_nota_box_text_generic">
                        <p style="color: #FFFFFF; font-size: 12px; margin-top: 0.2rem;">Fabrication</br>
                          <strong>Propre</strong>
                        </p>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
            {/if}

            <div class="col-md-3 ">

              <a href="{$fabricadoLINK}" target="_blank">
                <div class="product_nota_centre product_nota_box_generic" style="background-color: #9AD0C7;">
                  <div class="row">
                    <div class="col-md-12 product_nota_centre" style="margin-top: 1rem;">
                      <picture>
                        <source srcset="{$fabricadoImg}.webp" type="image/webp">
                        <img loading="lazy" alt="Fabriqué" width="53px" height="53px" src="{$fabricadoImg}.png">
                      </picture>
                    </div>
                    <div class="col-md-12 product_nota_centre product_nota_box_text_generic">
                      <p style="color: #FFFFFF; font-size: 12px; margin-top: 0.2rem;">Fabriqué</br>
                        <strong>{$fabricadoEm}</strong>
                      </p>
                    </div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-md-3 ">
              <a href="/content/14-condicoes-de-garantia" target="_blank">
                <div class="product_nota_centre product_nota_box_generic" style="background-color: #FAA700;">
                  <div class="row">
                    <div class="col-md-12 product_nota_centre " style="margin-top: 1rem;">
                      <picture>
                        <source srcset="/img/NotaCentre/site_garantie_20_ans.webp" type="image/webp">
                        <img loading="lazy" alt="Garantie" width="53px" height="53px"
                          src="/img/NotaCentre/site_garantie_20_ans.png">
                      </picture>
                    </div>
                    <div class="col-md-12 product_nota_centre product_nota_box_text_generic">
                      <p style="color: #FFFFFF; font-size: 12px; margin-top: 0.2rem;">Garantie</br>
                        <strong>{$anosgarantia} {$anosgarantiaText}</strong>
                      </p>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div> *}


          {*/ Inicio do Show-Big-Ecra /*}

          <div class="alu-dir-row alu-justify-space-evenly show_big_ecra" style="margin-left: 0.1rem;">
            <!--<div class="col-md-1">
              </div>-->
            {if $product.id_product|in_array:$arrayidfield}

            {else}
            <!--<div class="col-md-2 ">
                <a href="/content/32-fabricant" target="_blank">
                  <div class="product_nota_centre product_nota_box_generic" style="background-color: #9AD0C7;">
                    <div class="row">
                      <div class="col-md-12 product_nota_centre" style="margin-top: 1rem;">
                      <img loading="lazy" alt="" src="{$fabricadoImg}" width="{$fabricadowidth}px" height="{$fabricadoheight}px">
                      </div>
                      <div class="col-md-12 product_nota_centre product_nota_box_text_generic">
                        <p style="color: #FFFFFF; font-size: 12px; margin-top: 0.2rem;">Fabriqué</br>  <strong>{$fabricadoEm}</strong></p>
                      </div>
                    </div>
                  </div>
                </a>
              </div>-->


            {/if}
            {* <div class="col-md-2 ">
              <a href="/content/32-fabricant" target="_blank">
                <div class="product_nota_centre product_nota_box_generic" style="background-color: #9AD0C7;">
                  <div class="row">
                    <div class="col-md-12 product_nota_centre" style="margin-top: 1rem;">
                      <picture>
                        <source srcset="{$fabricadoImg}.webp" type="image/webp">
                        <img loading="lazy" alt="Fabriqué" width="53px" height="53px" src="{$fabricadoImg}.png">
                      </picture>
                    </div>
                    <div class="col-md-12 product_nota_centre product_nota_box_text_generic">
                      <p style="color: #FFFFFF; font-size: 12px; margin-top: 0.2rem;">Fabriqué</br>
                        <strong>{$fabricadoEm}</strong>
                      </p>
                    </div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-md-2 ">
              <a href="/content/32-fabricant" target="_blank">
                <div class="product_nota_centre product_nota_box_generic" style="background-color: #A2B1A3;">
                  <div class="row">
                    <div class="col-md-12 product_nota_centre " style="margin-top: 1rem;">
                      <picture>
                        <source srcset="/img/NotaCentre/site_fabrication_prope.webp" type="image/webp">
                        <img loading="lazy" alt="Fabriqué" width="53px" height="53px"
                          src="/img/NotaCentre/site_fabrication_prope.png">
                      </picture>
                    </div>
                    <div class="col-md-12 product_nota_centre product_nota_box_text_generic">
                      <p style="color: #FFFFFF; font-size: 12px; margin-top: 0.2rem;">Fabrication</br>
                        <strong>Propre</strong>
                      </p>
                    </div>
                  </div>
                </div>
              </a>
            </div>

            <div class="col-md-2 ">
              <a href="/avis-client" target="_blank">
                <div class="product_nota_centre product_nota_box_generic" style="background-color: #ABC4C7;">
                  <div class="row">
                    <div class="col-md-12 product_nota_centre " style="margin-top: 1rem;">
                      <picture>
                        <source srcset="/img/NotaCentre/site_avis_produit.webp" type="image/webp">
                        <img loading="lazy" alt="Avis" width="53px" height="53px"
                          src="/img/NotaCentre/site_avis_produit.png">
                      </picture>
                    </div>
                    <div class="col-md-12 product_nota_centre product_nota_box_text_generic">
                      <p style="color: #FFFFFF; font-size: 12px; margin-top: 0.2rem;">Avis</br> <strong>Produit</strong>
                      </p>
                    </div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-md-2 ">
              <a href="/content/14-condicoes-de-garantia" target="_blank">
                <div class="product_nota_centre product_nota_box_generic" style="background-color: #FAA700;">
                  <div class="row">
                    <div class="col-md-12 product_nota_centre " style="margin-top: 1rem;">
                      <picture>
                        <source srcset="/img/NotaCentre/site_garantie_20_ans.webp" type="image/webp">
                        <img loading="lazy" alt="Garantia" width="53px" height="53px"
                          src="/img/NotaCentre/site_garantie_20_ans.png">
                      </picture>
                    </div>
                    <div class="col-md-12 product_nota_centre product_nota_box_text_generic">
                      <p style="color: #FFFFFF; font-size: 12px; margin-top: 0.2rem;">Garantie</br>
                        <strong>{$anosgarantia} {$anosgarantiaText}</strong>
                      </p>
                    </div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-md-2 ">
              <a href="/content/18-produits-certifies" target="_blank">
                <div class="product_nota_centre product_nota_box_generic" style="background-color: #F4BF17;">
                  <div class="row">
                    <div class="col-md-12 product_nota_centre " style="margin-top: 1rem;">
                      <picture>
                        <source srcset="/img/NotaCentre/site_certificats_ce.webp" type="image/webp">
                        <img loading="lazy" alt="Certificats" width="53px" height="53px"
                          src="/img/NotaCentre/site_certificats_ce.png">
                      </picture>
                    </div>
                    <div class="col-md-12 product_nota_centre product_nota_box_text_generic">
                      <p style="color: #FFFFFF; font-size: 12px; margin-top: 0.2rem;">Certificats</br> <strong>CE</strong>
                      </p>
                    </div>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-md-2 ">
              <a href="/content/60-l-indice-de-reparabilite" target="_blank">
                <div class="product_nota_centre product_nota_box_generic indicereparabilite"
                  style="background-color: #6C8EBB;">
                  <div class="row">
                    <div style="width: 53px;
                                 height: 53px;
                                 border-radius: 50px;
                                 text-align: center;
                                 background: white;
                                 color: #6C8EBB;
                                 font-size: 10px;
                                 margin-left: 28px;
                                 margin-top: 15px;">
                      <div style="padding-top: 4px;">
                        <picture>
                          <source srcset="/img/NotaCentre/site_lindice_de_reparabilite_oneIcon.webp" type="image/webp">
                          <img loading="lazy" alt="Réparabillité" width="25px" height="25px"
                            src="/img/NotaCentre/site_lindice_de_reparabilite_oneIcon.png">
                        </picture>
                        <br>
                        <span style=" font-size: 13px;">{$scoreProduct}</span><strong>/10</strong>
                      </div>
                    </div>
                    <div class="col-md-12 product_nota_centre product_nota_box_text_generic">
                      <p style="color: #FFFFFF; font-size: 12px; margin-top: 0.2rem;">L'indice de</br>
                                          <strong>Réparabilité</strong>
                                        </p>
                                      </div>
                                    </div>
                                </a>
                              </div> *}
            </div>
            <!--<div class="col-md-1">
              </div>-->
          </div>
        </div>
        <div class="alu-dir-row" style="padding-top: 5px;">
          <div class="col-md-5">
            <div class="row">
              <div class="col-md-6 div_PrecoEntregaEsq pt-2">
                <img loading="lazy" class="entrega" src="/img/local_shipping_black_24dp.svg" width="25" height="25"
                  alt="">
                <span style="font-size: 14px;" class="prazoentrega">
                  {if $infoProduto.free_shipping  == 1}
                    Livraison offerte <s>{$infoProduto.porteprice_text}</s> €
                  {elseif $infoProduto.half_free_shipping  == 1}
                    Livraison offerte <s>{$infoProduto.porteprice_text}</s> €
                  {else}
                    {$infoProduto.porteprice_text} €
                  {/if}
                </span>
              </div>
              <div class="col-md-6 pt-2">
                <img loading="lazy" class="entrega" src="/img/event_available_black_24dp.svg" width="25" height="25"
                  alt="">
                <span style="font-size: 14px;" class="dataentrega">Sous {$infoProduto.time_shipping} jours ouvrés</span>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="row">
              <div class="col-md-12 ">
                {* <div class="mon_btn  exclusive  embedcoupon">
              <div class="mon_circle mon_coupon_circle">
                <picture>
                  <source srcset="/img/iconscart/getpromo.webp" type="image/webp">
                  <img loading="lazy" alt="Promo" class="mon_icon" src="/img/iconscart/getpromo.svg">
                </picture>
              </div>
              <div class="mon_text mon_text_promo">Demandé un code promo</div>
            </div> *}
              </div>
              <div class="col-md-12 pt-2">
                <div class="mon_btn  exclusive  embedRappel">
                  <div class="mon_circle mon_rappel_circle_com">
                    <picture>
                      <source srcset="/img/iconscart/quest.webp" type="image/webp">
                      <img loading="lazy" alt="quest" class="mon_icon" src="/img/iconscart/quest.svg">
                    </picture>
                  </div>
                  <div class="mon_text">Une Question? </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-5">
            <div class="alu-dir-column">
              <div class="alu-dir-column">
                <div class="price productPriceUpbanner product-price alu-align-center alu-dir-column"
                  style="color: #686868;font-size: 24px;font-weight: bold;"> {$product.price}</div>
                <div class="alu-align-center alu-dir-column" style="color: #979797;font-size: 14px;font-weight: bold;"> ou
                </div>
                <div class="alu-dir-column">
                  <div class="product_nota_centre">
                    <a class="linkcreditpage" href="{$linkcredit}" target="_blank" data-toggle="tooltip">
                      <div>
                        <div class="price productPriceUpx4 alu_oney_low_show_box product_nota_centre"
                          style="font-size: 20px;font-weight: bold;color: #979797;">
                          4x {($product.price_amount/$parcelas)|round:2}&nbsp;€
                          <img loading="lazy" src="/img/{$imgcredit}.png" width="110" height="auto" alt="">
                        </div>
                        <div class="info-oney-barra tooltip-info-oney hidden-md-down" style="right: unset;">
                          <i class="material-icons ">
                            info
                          </i>

                          {if $parcelas == 4}
                            <span class="tooltiptext-info-oney">La solution de paiement Alma vous permet de payer en 3 ou 4
                              fois, les
                              frais sont de 1,6% du montant total de la commande pour les paiements en 3 fois et 2,4% du
                              montant total de la commande pour les paiements en 4 fois.</span>
                          {else}
                            <span class="tooltiptext-info-oney">La solution de paiement 12x à 84x Oney vous permet de payer
                              en 12 à 84
                              fois, les
                              frais sont de 4,3% du montant total de la commande dans la limite de 21500 € maximum.
                              Consultez
                              le détail de l’offre sur le site du partenaire.</span>
                          {/if}


                        </div>
                      </div>

                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          {*
              <div class="col-md-2  pt-1" >
              <a href="/content/15-le-paiement-en-4-fois-avec-oney" target="_blank"><img loading="lazy" class="product_nota_centre" src="/img/banner-oney{$parcelas}x.png" alt=""></a>
              </div> *}
        </div>
        <div class="alu-dir-row">
          <div class="alu-dir-column">
            <div class="alu-dir-row">

              <div class="col-md-3 product_nota_centre">
                {if $cart.products_count > 0}
                  <a rel="nofollow" href="/panier?action=show">
                  {else}
                    <a rel="nofollow" href="">
                    {/if}
                    {if $cart.products_count > 0}
                      <div class=" tooltip-list-cart-bar">
                        <div class="mon_devis mon_btn  exclusive  carticon" style="width: 90px;">
                          <div class="panier_circle ">
                            <i class="material-icons ">shopping_cart</i>
                          </div>
                          <div class="mon_text">Panier <span class="cart-products-count hidden-md-down"
                              style="margin-top: -15px;">{$cart.products_count}</span></div>
                        </div>
                        <span class="tooltiptext-list-cart-bar">
                          <img loading="lazy" src="/img/loadlistproduct.gif" alt="" class="load" style="height: 100px;">
                        </span>
                      </div>
                    {else}
                      <div class="mon_devis mon_btn  exclusive  " style="width: 90px;">
                        <div class="panier_circle ">
                          <i class="material-icons ">shopping_cart</i>
                        </div>
                        <div class="mon_text">Panier <span class="cart-products-count hidden-md-down"
                            style="margin-top: -15px;">{$cart.products_count}</span></div>
                      </div>
                    {/if}
                  </a>
              </div>
              <div class="col-md-4 product_nota_centre">
                <div class="mon_devis mon_btn  exclusive  embedAluDevisProd">
                  <div class="mon_circle mon_devis_circle">
                    <picture>
                      <source srcset="/img/iconscart/print.webp" type="image/webp">
                      <img loading="lazy" alt="devis print" class="mon_icon" style="height: 20px; "
                        src="/img/iconscart/print.svg">
                    </picture>
                  </div>
                  <div class="mon_text">Mon Devis</div>
                </div>
              </div>
              <div class="col-md-5 product_nota_centre">
                {if !$product.add_to_cart_url}
                  <button form="ndkcsfields" name="submitNdkcsfields" class="submitNdkcsfields add_panier_btn  exclusive  ">
                    <div class="add_panier_circle ">
                      <i class="material-icons ">shopping_cart</i>
                    </div>
                    <div class="mon_text">Ajouter au panier</div>
                  </button>
                {else}
                  <form action="{$urls.pages.cart}" method="post" id="add-to-cart-or-refresh">
                    <input type="hidden" name="token" value="{$static_token}">
                    <input type="hidden" name="id_product" value="{$product.id}" id="product_page_product_id">
                    <input type="hidden" name="id_customization" value="{$product.id_customization}"
                      id="product_customization_id">
                    <div class="add">
                      <button class="add_panier_btn" data-button-action="add-to-cart" type="submit">
                        <div class="add_panier_circle ">
                          <i class="material-icons ">shopping_cart</i>
                        </div>
                        <div class="mon_text">Ajouter au panier</div>
                      </button>
                    </div>
                  </form>
                {/if}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


  {/block}


  {block name='content'}

    <section id="main" itemscope itemtype="https://schema.org/Product">
      {* <meta itemprop="sku" content="{$product.id}">
     <meta itemprop="gtin" content="{$product.id}"> *}
      <meta itemprop="url" content="{$product.url}">
      <div itemprop="brand" itemtype="https://schema.org/Brand" itemscope>
        <meta itemprop="name" content="NFI" />
      </div>
      <div itemprop="aggregateRating" itemtype="https://schema.org/AggregateRating" itemscope>
        <meta itemprop="reviewCount" content="{$infoProduto['num_nota_product']}" />
        <meta itemprop="ratingValue" content="{$infoProduto['nota_product']}" />
      </div>
      <div class="row">
        <div class="row">
          <div id="aluclass_scroll" class="col-md-4 cart-flutua-scroll">
            {block name='page_content_container'}
              <section class="page-content" style="margin:0;" id="content">
                {block name='page_content'}
                  {block name='product_flags'}
                    <ul class="product-flags">
                      {foreach from=$product.flags item=flag}
                        <li class="product-flag {$flag.type}">{$flag.label}</li>
                      {/foreach}
                    </ul>
                  {/block}
                  {block name='product_cover_thumbnails'}
                    {include file='catalog/_partials/product-cover-thumbnails.tpl'}
                  {/block}
                  <div class="scroll-box-arrows">
                    <i class="material-icons left">&#xE314;</i>
                    <i class="material-icons right">&#xE315;</i>
                  </div>
                {/block}
                <div class="row back-show content-showprice pb-2">

                  <input type="hidden" id="cat_prod" value="{$product.id_category_default}">
                  <input type="hidden" id="cat_id_prod" value="{$product.id}">
                  <input type="hidden" id="portivaaumento" value="{$infoProduto.porteprice_com_iva_com_aumento}">


                  <div class="col-md-12 col-sm-12 col-xs-12 " data-toggle="tooltip"
                    title="Prix total de votre configuration">

                  </div>

                  <div class="col-md-6 col-sm-6 col-xs-6 pr-1 div_PrecoEntregaEsq" data-toggle="tooltip"
                    title="Prix de livraison">
                    <img loading="lazy" class="entrega" src="/img/local_shipping_black_24dp.svg" width="25" height="25"
                      alt="">
                    <span class="prazoentrega">
                      {if $infoProduto.free_shipping  == 1}
                        Livraison offerte <s>{$infoProduto.porteprice_text}</s> €
                      {elseif $infoProduto.half_free_shipping  == 1}
                        Livraison offerte <s>{$infoProduto.portepriceS_text}</s> €
                      {else}
                        {if $infoProduto.porteprice_text == '0,00'}
                          Livraison offerte
                        {else}
                          {$infoProduto.porteprice_text} €
                        {/if}
                      {/if} </span>
                  </div>

                  <div class="col-md-6 col-sm-6 col-xs-6 pr-1 div_PrazoEntregaEsq" data-toggle="tooltip"
                    title="Délais disponible à notre entrepôt">

                    <img loading="lazy" class="entrega" src="/img/event_available_black_24dp.svg" width="25" height="25"
                      alt="">
                    <span class="dataentrega">Sous {$infoProduto.time_shipping} jours ouvrés</span>
                  </div>



                </div>

                <div class="row">
                  <div class="col-md-12 text-center">
                    <div class="btn btn-primary my-1" id="alu-button-after-image">Voir fiche technique</div>
                    
                  </div>
                </div>

              </section>
            {/block}

          </div>

          <div class="col-md-2 cart-flutua-scroll" style="">
            {include file='catalog/_partials/column-info.tpl'}
          </div>
 
          <div class="col-md-6" style="padding-bottom: 16px;">
            {block name='page_header_container'}
              {block name='page_header'}

                {/block}
              {/block}
              {block name='product_prices'}
                {include file='catalog/_partials/product-prices.tpl'}
              {/block}

              <div class="product-information">
                {block name='product_description_short'}

                      <span id='specificPrice'></span>
                      <span id='oldPrice' class='specificBlock'></span>
                      <span id='specificReduct' class='specificBlock'></span>
                      <div class="blockPrice clear clearfix pb-2" style="display: block;">
                        <div class="row pb-2">
                          <div class="col-sm-5  alu_total_price">
                            <span class="alu_total_price_alu">
                              <span class="labelPriceUp">Total : </span>
 
                              {if {$product.id} != '1120'}
                                {if {$infoProduto['cont_ndk']} > 0}

                                  <span class="price productPriceUp"
                                    content="{$precoAtualizadoSEO['preco_com_desconto_catalogo']}">{$precoAtualizadoSEO['preco_com_desconto_catalogo_view']}</span>
                                {else}
                                  <span class="price productPriceUp" content="{$product.price_amount}">{$product.price}</span>
                                {/if}
                              {else}
                                <span class="price productPriceUp hehe" content="{$product.price_amount}">{$product.price}</span>
                              {/if}
                              <input type="hidden" id="reductionpercentprice"
                                value="{$precoAtualizadoSEO['reduction_percent_price']}">
                              <input type="hidden" id="reductionpercent" value="{$precoAtualizadoSEO['reduction_percent']}">
                              <input type="hidden" id="reductionpercentname"
                                value="{$precoAtualizadoSEO['reduction_percent_name']}">

                              <span class="price productPriceUpHT"></span>
                            </span>
                          </div>
                          <div class="col-sm-1">
                            <span class="alu_oney_show"> ou </span>
                          </div>
                          <div class="col-sm-6">

                            <a class="linkcreditpage" href="/content/67-payez-vos-achats-en-3-ou-4-fois-avec-alma" target="_blank"
                              data-toggle="tooltip">
                              <span class="price productPriceUpx4  alu_oney_show_box">
                                4x {($product.price_amount/4)|round:2}&nbsp;€
                                <img loading="lazy" src="/img/alma4x.png" width="110" height="36" alt="Alma 4x">
                              </span>
                            </a>
                            <div class="info-oney tooltip-info-oney hidden-md-down">
                              <i class="material-icons">
                                info
                              </i>
                              {if $parcelas == 4}
                                <span class="tooltiptext-info-oney">La solution de paiement Alma vous permet de payer en 3 ou 4
                                  fois, les
                                  frais sont de 1,6% du montant total de la commande pour les paiements en 3 fois et 2,4% du montant
                                  total de la commande pour les paiements en 4 fois.</span>
                              {else}
                                <span class="tooltiptext-info-oney">La solution de paiement 12x à 84x Oney vous permet de payer en
                                  12 à 84
                                  fois, les
                                  frais sont de 4,3% du montant total de la commande dans la limite de 21500 € maximum. Consultez
                                  le détail de l’offre sur le site du partenaire.</span>
                              {/if}
                            </div>
                           
                          </div>
                        </div>
                      </div>


                  {if {$product.id} != '1120'}
                    {if {$checaDescontosCatalogo['reduction']} >= 1}

                      <p class="txt-promo-limit">Offre de {$checaDescontosCatalogo['reduction']} déjà appliquée sur ce prix, offre
                        limitée
                        jusqu'au {$checaDescontosCatalogo['to']|date_format:"%e %B"}.</p>

      
                    {/if}
                  {/if}


                  <div id="product-description-short-{$product.id}" itemprop="description" style="clear: left;">
                    {if $product.id == "3205" || $product.id == "12231" || $product.id == "12235" || $product.id == "12239"}
                      <p>Dimensions de la porte hors tout : 2460 x 2030 mm.</p>
                      <p>Pose en applique intérieure uniquement.</p>
                    {/if}
                    {if $product.id == "640033" || $product.id == "640056" || $product.id == "640034" || $product.id == "640067" || $product.id == "640035" || $product.id == "640069"}
                      <ul id="ndk_perso">
                        <li {if $product.id == "640033"}class="encours" {/if}><a
                            href="/cloture-grillage-rigide-acier-panneau-soude/640033-kit-de-5-a-30m-grillage-rigide-soude-maille-100x55-a-sceller-50-kit-d-occultation-.html">Kit
                            de 5 à 30M, 100x55, Fil 4mm</a></li>
                        <li {if $product.id == "640056"}class="encours" {/if}><a
                            href="/cloture-grillage-rigide-acier-panneau-soude/640056-kit-de-35-a-80m-grillage-rigide-soude-maille-100x55-a-sceller-50-kit-d-occultation.html">Kit
                            de 35 à 80M, 100x55, Fil 4mm</a></li>
                      </ul>
                      <ul id="ndk_perso">
                        <li {if $product.id == "640034"}class="encours" {/if}><a
                            href="/cloture-grillage-rigide-acier-panneau-soude-maille-200x55/640034-kit-de-5-a-30m-grillage-rigide-soude-maille-200x55-fil-de-4mm-a-sceller-50-kit-d-occultation.html">Kit
                            de 5 à 30M, 200x55, Fil 4mm</a></li>
                        <li {if $product.id == "640067"}class="encours" {/if}><a
                            href="/cloture-grillage-rigide-acier-panneau-soude-maille-200x55/640067-kit-de-35-a-80m-grillage-rigide-soude-maille-200x55-fil-de-4mm-a-sceller-50-kit-d-occultation.html">Kit
                            de 35 à 80M, 200x55, Fil 4mm</a></li>
                      </ul>
                      <ul id="ndk_perso">
                        <li {if $product.id == "640035"}class="encours" {/if}><a
                            href="/cloture-grillage-rigide-pro-acier-panneau-soude-maille-200x55-fil-de-5mm/640035-kit-de-5-a-30m-grillage-rigide-soude-pro-maille-200x55-fil-de-5mm-a-sceller-50-kit-d-occultation.html">Kit
                            de 5 à 30M, 200x55, Fil 5mm</a></li>
                        <li {if $product.id == "640069"}class="encours" {/if}><a
                            href="/cloture-grillage-rigide-pro-acier-panneau-soude-maille-200x55-fil-de-5mm/640069-kit-de-35-a-80m-grillage-rigide-soude-pro-maille-200x55-fil-de-5mm-a-sceller-50-kit-d-occultation.html">Kit
                            de 35 à 80M, 200x55, Fil 5mm</a></li>
                      </ul>
                    {/if}
                    {if $option_str_sur['active_product_standard'] == 1  || $option_str_sur['active_product_surmesure'] == 1}

                      <!-- PORTAS DE GARAGEM SECCIONADAS -->
                      {if $product.id == "12227" || $product.id == "640271" ||
                                                                                              $product.id == "12228" || $product.id == "640272" ||
                                                                                              $product.id == "170307" || $product.id == "640273" ||
                                                                                              $product.id == "12223" || $product.id == "640274" ||
                                                                                              $product.id == "321715" || $product.id == "640275" ||
                                                                                              $product.id == "170397" || $product.id == "640276" ||
                                                                                              $product.id == "12225" || $product.id == "640277" ||
                                                                                              $product.id == "12226" || $product.id == "640278" ||
                                                                                              $product.id == "170225" || $product.id == "640279" ||
                                                                                              $product.id == "13613" || $product.id == "640280" ||
                                                                                              $product.id == "171280" || $product.id == "640281"
                                                                                            }
                      <ul id="ndk_perso">
                        <li {if $option_str_sur['active_product_standard'] == 1} class="encours" {/if}>
                          <div class="tooltip-info-pgs">
                            <a href="{$option_str_sur['link_product_standard']}">{$option_str_sur['text_product_standard']}
                              <i class="material-icons text-white">info</i>
                            </a>
                            <span class="tooltiptext-info-pgs"><b>Système de ressort à torsion :</b><br /> Système professionnel
                              pour un usage intensif, possibilité de porte manuelle, grandes dimensions, pose moins accessible
                              pour un amateur.</span>
                          </div>
                        </li>
                        <li class="hidden-md-down central-div-version" style="width: 45px !important;">
                          <div>
                            <div class="text-central-div-version">OU</div>
                          </div>
                        </li>
                        <li {if $option_str_sur['active_product_surmesure'] == 1} class="encours" {/if}>
                          <div class="tooltip-info-pgs">
                            <a href="{$option_str_sur['link_product_surmesure']}">{$option_str_sur['text_product_surmesure']}
                              <i class="material-icons text-white">info</i>
                            </a>
                            <span class="tooltiptext-info-pgs"><b>Système de ressort à traction :</b><br /> Système moins
                              encombrant, facile à poser, usage domestique, limité en dimension, porte jamais manuelle.</span>
                          </div>
                        </li>
                        <div class="text-center">
                          <button class="btn btn-link btn-InfosPGS text-black pt-2 pl-0" type="button" data-toggle="collapse"
                            data-target="#collapseInfosPGS" aria-expanded="false" aria-controls="collapseInfosPGS">
                            <i class="material-icons">info</i> <span
                              style="vertical-align: middle; white-space: normal;">Découvrez les différences entre ressort à
                              torsion et ressort à traction</span>
                          </button>
                          <div class="collapse" id="collapseInfosPGS">
                            <div class="card card-body" style="z-index:999999;">
                              <div class="row">
                                <div class="col-xs-6 text-center py-1">
                                  <p class="pl-1"><b>Système de ressort à torsion:</b><br /> Système professionnel pour un usage
                                    intensif, possibilité de porte manuelle, grandes dimensions, pose moins accessible pour un
                                    amateur.</p>
                                </div>
                                <div class="col-xs-6 text-center py-1">
                                  <p class="pr-1"><b>Système de ressort à traction:</b><br /> Système moins encombrant, facile à
                                    poser, usage domestique, limité en dimension, porte jamais manuelle.</p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </ul>

                    {else}
                      <ul id="ndk_perso">
                        <li {if $option_str_sur['active_product_standard'] == 1} class="encours" {/if}><a
                            href="{$option_str_sur['link_product_standard']}">{$option_str_sur['text_product_standard']}</a>
                        </li>
                        <li class="hidden-md-down central-div-version" style="width: 45px !important;">
                          <div>
                            <div class="text-central-div-version">OU</div>
                          </div>
                        </li>
                        <li {if $option_str_sur['active_product_surmesure'] == 1} class="encours" {/if}><a
                            href="{$option_str_sur['link_product_surmesure']}">{$option_str_sur['text_product_surmesure']}</a>
                        </li>
                      </ul>
                    {/if}

                  {/if}

                </div>

                {* <div id="product-description-short-{$product.id}" itemprop="description">{$product.description_short nofilter}</div> *}
              {/block}

              {* {if $product.is_customizable && count($product.customizations.fields)}











                {block name='product_customization'}











                  {include file="catalog/_partials/product-customization.tpl" customizations=$product.customizations}











                {/block}











              {/if} *}

              <div class="product-actions">
                {block name='product_buy'}
                  <form action="{$urls.pages.cart}" method="post" id="add-to-cart-or-refresh">
                    <input type="hidden" name="token" value="{$static_token}">
                    <input type="hidden" name="id_product" value="{$product.id}" id="product_page_product_id">
                    <input type="hidden" name="id_customization" value="{$product.id_customization}"
                      id="product_customization_id">

                    {block name='product_variants'}
                      {include file='catalog/_partials/product-variants.tpl'}
                    {/block}

                    {block name='product_pack'}
                      {if $packItems}
                        <section class="product-pack">
                          <p class="h4">{l s='This pack contains' d='Shop.Theme.Catalog'}</p>
                          {foreach from=$packItems item="product_pack"}
                            {block name='product_miniature'}
                              {include file='catalog/_partials/miniatures/pack-product.tpl' product=$product_pack}
                            {/block}
                          {/foreach}
                        </section>
                      {/if}
                    {/block}

                    {block name='product_discounts'}
                      {include file='catalog/_partials/product-discounts.tpl'}
                    {/block}

                    {block name='product_add_to_cart'}
                      {include file='catalog/_partials/product-add-to-cart.tpl'}
                    {/block}

                    {block name='product_additional_info'}
                      {include file='catalog/_partials/product-additional-info.tpl'}
                    {/block}

                    {* Input to refresh product HTML removed, block kept for compatibility with themes *}
                    {block name='product_refresh'}{/block}
                  </form>
                {/block}

                <div id="error_ndk_nfi" class="alert alert-danger" style="font-size: 20px; display: none;"></div>

              </div>

              {block name='hook_display_reassurance'}
                {hook h='displayReassurance'}
              {/block}

            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <!-- Ajout code -->
        <div class="col-md-12 pt-1">
          <!-- Ajout code -->
          <div class="col-md-12  hidden-md-up">
            {if 51 == $product.id_category_default or 52 == $product.id_category_default or 55 == $product.id_category_default or 56 == $product.id_category_default}
              <a class="btn btn-app" href="/comparatif?ctg=45" target="_blank"><i class="fa fa-th-list"></i>Comparatif</a>
            {elseif  48485 == $product.id_product or 640023 == $product.id_product or 68667 == $product.id_product or 640024 == $product.id_product or 68627 == $product.id_product or 640025 == $product.id_product}
              <a class="btn btn-app" href="/comparatif?ctg=21" target="_blank"><i class="fa fa-th-list"></i>Comparatif</a>
            {elseif  17441 == $product.id_product or 1127 == $product.id_product or 1264 == $product.id_product or 1150 == $product.id_product }
              <a class="btn btn-app" href="/comparatif?ctg=34" target="_blank"><i class="fa fa-th-list"></i>Comparatif</a>
            {elseif  3427 == $product.id_product or 3430 == $product.id_product }
              <a class="btn btn-app" href="/comparatif?ctg=33" target="_blank"><i class="fa fa-th-list"></i>Comparatif</a>
            {elseif  35 == $product.id_category_default }
              <a class="btn btn-app" href="/comparatif?ctg=35" target="_blank"><i class="fa fa-th-list"></i>Comparatif</a>
            {elseif  23 == $product.id_category_default }
              <a class="btn btn-app" href="/comparatif?ctg=23" target="_blank"><i class="fa fa-th-list"></i>Comparatif</a>
            {elseif  24 == $product.id_category_default }
              <a class="btn btn-app" href="/comparatif?ctg=24" target="_blank"><i class="fa fa-th-list"></i>Comparatif</a>
            {elseif  26 == $product.id_category_default }
              <a class="btn btn-app" href="/comparatif?ctg=26" target="_blank"><i class="fa fa-th-list"></i>Comparatif</a>
            {elseif  25 == $product.id_category_default }
              <a class="btn btn-app" href="/comparatif?ctg=25" target="_blank"><i class="fa fa-th-list"></i>Comparatif</a>
            {/if}
          </div>
        </div>
      </div>
      <div class="row">
        <!-- Ajout code -->
        <div class="col-md-12">
          <!-- Ajout code -->
          {block name='product_tabs'}
            <div class="tabs">
              <!--<ul class="nav nav-tabs" role="tablist">
                    {if $product.description}
                     <li class="nav-item">
                         <a
                           class="nav-link{if $product.description} active{/if}"
                           data-toggle="tab"
                           href="#description"
                           role="tab"
                           aria-controls="description"
                           {if $product.description} aria-selected="true"{/if}>{l s='Description' d='Shop.Theme.Catalog'}</a>
                      </li>
                    {/if}
                   <li class="nav-item">
                      <a
                        class="nav-link{if !$product.description} active{/if}"
                        data-toggle="tab"
                        href="#product-details"
                        role="tab"
                        aria-controls="product-details"
                        {if !$product.description} aria-selected="true"{/if}>{l s='Product Details' d='Shop.Theme.Catalog'}</a>
                    </li>
                    {if $product.attachments}
                      <li class="nav-item">
                        <a
                          class="nav-link"
                          data-toggle="tab"
                          href="#attachments"
                          role="tab"
                          aria-controls="attachments">{l s='Attachments' d='Shop.Theme.Catalog'}</a>
                      </li>
                    {/if}
                    {foreach from=$product.extraContent item=extra key=extraKey}
                      <li class="nav-item">
                        <a
                          class="nav-link"
                          data-toggle="tab"
                          href="#extra-{$extraKey}"
                          role="tab"
                          aria-controls="extra-{$extraKey}">{$extra.title}</a>
                      </li>
                    {/foreach}
                  </ul>-->



              <div class="tab-content" id="tab-content">
                <div class="tab-pane fade in{if $product.description} active{/if}" id="description" role="tabpanel">
                  {block name='product_description'}
                    {*<div class="product-description">{$product.description nofilter}</div> *}

                    {assign var='checkDescriptionFile' value=Product::checkDescriptionFile($product.id)}
                    {if {$checkDescriptionFile}}
                      <div class="container custom-block-description">
                        <div class="row">
                          <div class="col-md-12 text-center">
                            <div class="btn btn-primary my-1" id="alu-button">Voir fiche technique <i
                                class="fa fa-arrow-down rotate"></i></div>
                            <div class="btn btn-primary my-1" id="comments-button" style="background-color: #F1C40F;">Voir les
                              Avis <i class="fa fa-arrow-down rotate"></i></div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12 pt-3 hide-block" id="alu-content"></div>
                          <div class="col-md-12 pt-3 hide-block" id="comments-content"></div>
                        </div>
                      </div>
                    {else}
                      <div class="product-description">{$product.description nofilter}</div>
                    {/if}

                    {* <p class="text-center">
                  <a class="btn btn-primary hidden-md-up collapsed" data-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="product_description" href="#product_description"
                    id="btnCollapseDescription">
                    <span class="mr-2" id="labelDescription">Appuyez pour voir la description</span>
                    <i id="arrowIconDescription" class="fa fa-arrow-down"></i>
                  </a>
                </p>

                <div id="product_description" class="product-description-mobile hidden-md-up collapse">
                  {$product.description nofilter}</div>

                <div class="product-description hidden-md-down">{$product.description nofilter}</div> *}

                    <!-- Modal Videos - Paulo aluclass -->
                    <div class="modal fade" id="modalEmbedAluclass" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header" style="text-align: right;">
                            <button id="modalEmbedAluclass_close" class="btn btn-danger">X</button>
                          </div>
                          <div class="modal-body">
                            <div class="embed-responsive" style="padding-bottom: 56%;">
                              <iframe class="embed-responsive-item" id="codWatch" src=""
                                allow="accelerometer; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>



                  {/block}
                </div>

                {block name='product_details'}
                  {include file='catalog/_partials/product-details.tpl'}
                {/block}

                {block name='product_attachments'}
                  {if $product.attachments}
                    <div class="tab-pane fade in" id="attachments" role="tabpanel">
                      <section class="product-attachments">
                        <p class="h5 text-uppercase">{l s='Download' d='Shop.Theme.Actions'}</p>
                        {foreach from=$product.attachments item=attachment}
                          <div class="attachment">
                            <h4><a
                                href="{url entity='attachment' params=['id_attachment' => $attachment.id_attachment]}">{$attachment.name}</a>
                            </h4>
                            <p>{$attachment.description}</p> <a
                              href="{url entity='attachment' params=['id_attachment' => $attachment.id_attachment]}">
                              {l s='Download' d='Shop.Theme.Actions'} ({$attachment.file_size_formatted})
                            </a>
                          </div>
                        {/foreach}
                      </section>
                    </div>
                  {/if}
                {/block}

                {foreach from=$product.extraContent item=extra key=extraKey}
                  <div class="tab-pane fade in {$extra.attr.class}" id="extra-{$extraKey}" role="tabpanel"
                    {foreach $extra.attr as $key => $val} {$key}="{$val}" {/foreach}>
                    {$extra.content nofilter}
                  </div>
                {/foreach}
              </div>
            </div>
          {/block}



        </div><!-- Ajout code -->
      </div><!-- Ajout code -->

      <div class="container hidden-md-down"
        style="padding-left: 1.9rem !important; padding-right: 1.9rem !important; margin-top: 63px;">
        <div class="row newAlu_blockAvisClients">
          <a href="/avis-client" target="_blank">
            <div class="col-md-12 avisClient">
              <span>Voir tous les avis clients</span>
              <picture>
                <source srcset="/img/cms/home/click-finger.webp" type="image/webp" />
                <img loading="lazy" src="/img/cms/home/click-finger.png" alt="Voir avis clients" class="img-fluid"
                  width="104" height="104" />
              </picture>
            </div>
          </a>
        </div>
      </div>

      {block name='product_accessories'}
        {if $accessories}
          <section class="product-accessories clearfix">
            <p class="h5 text-uppercase">{l s='You might also like' d='Shop.Theme.Catalog'}</p>
            <div class="products">
              {foreach from=$accessories item="product_accessory"}
                {block name='product_miniature'}
                  {include file='catalog/_partials/miniatures/product.tpl' product=$product_accessory}
                {/block}
              {/foreach}
            </div>
          </section>
        {/if}
      {/block}

      {block name='product_footer'}
        {hook h='displayFooterProduct' product=$product category=$category}

      {/block}

      {block name='product_images_modal'}
        {include file='catalog/_partials/product-images-modal.tpl'}
      {/block}

      {block name='page_footer_container'}
        <footer class="page-footer">
          {block name='page_footer'}
            <!-- Footer content -->
            <div class="backtop closebar">
              <i class="fa fa-times" style="color: white;"></i>
            </div>
          {/block}
        </footer>
      {/block}
    </section>

{/block}