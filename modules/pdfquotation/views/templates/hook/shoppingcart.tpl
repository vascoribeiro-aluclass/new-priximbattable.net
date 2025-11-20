{**
* ShoppingCart Template
*
* @author Empty
* @copyright  Empty
* @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*}

{assign var='ipAddr' value=Product::getIpUser()}

<div class="modal fade in" id="modalEmbedDevis" tabindex="-1" role="dialog" style="display: none; padding-right: 17px;">
  <div class="modal-dialog modal-lg pdfcatalogo-size" role="document">
    <div class="modal-content" style="border-radius: 25px;">
      <div class="modal-header"
        style="display: inline;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: start;
        -ms-flex-align: start;
        align-items: flex-start;
        -webkit-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;
        padding: 1rem;
        border-bottom: 1px solid #e9ecef;
        border-top-left-radius: 25px;
        border-top-right-radius: 25px;
        background-color: #abc4c7;">
        <h1  style="color: white;" class="h1">{l s='Print a quote' mod='pdfquotation'}</h1>
        <button id="modalEmbedDevis_close" type="button"
          style="cursor: pointer;
          float: right;
          font-size: 1.5rem;
          font-weight: 700;
          line-height: 1;
          color: #000;
          text-shadow: 0 1px 0 #fff;
          opacity: .5;
          padding: 1rem;
          margin: -1rem -1rem -1rem auto;
          background-color: transparent;
          border: 0;
          -webkit-appearance: none;">X</button>
      </div>
      <div class="modal-body">
        <div>
          <div id="print-quotation">
            <div id="customer-information">
              <form id="tag_devis">
              <div class="row">
              <div class="col-md-5">
                <picture>
                  <source srcset="/img/cms/popup-budget.webp" type="image/webp">
                  <img loading="lazy" src="/img/cms/popup-budget.jpg" class="img-fluid" alt="Devis" />
                </picture>
              </div>
              <div class="col-md-6">
                <section class="form-fields">
                  <div class="form-group row" style="display:none;">
                    <label class="col-md-3">{l s='First Name' mod='pdfquotation'}</label>
                    <div class="col-md-9">
                      <input name="first_name" type="text">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-md-3 form-control-label">{l s='Last Name' mod='pdfquotation'}</label>
                    <div class="col-md-9">
                      <input class="form-control" name="last_name" id="last_name" type="text" required="required">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-md-3 form-control-label">{l s='E mail' mod='pdfquotation'}</label>
                    <div class="col-md-9">
                      <input class="form-control" name="email" id="email" type="email" required="required">
                    </div>
                  </div>

                  {if $ipAddr }
                    <div class="form-group row">
                      <label class="col-md-3 form-control-label">Email Commercial</label>
                      <div class="col-md-9">
                        <input class="form-control" name="email_comercial" id="email_comercial" type="email" >
                        <span class="mon_modal_warnning" id="warning_mail_comercial"></span>
                      </div>
                    </div>
                  {/if}

                  <div class="form-group row">
                    <label class="col-md-3 form-control-label">{l s='Phone' mod='pdfquotation'}</label>
                    <div class="col-md-9">
                      <input class="form-control" name="phone" id="phone" type="text">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-md-6 form-control-label">{l s='To be contacted again' mod='pdfquotation'}</label>
                    <div class="col-md-6 form-control-valign">
                      <label class="radio-inline">
                        <span class="custom-radio">
                          <input type="radio" name="contacted" id="yes" value="1">
                          <span></span>
                        </span>
                        {l s='Yes' mod='pdfquotation'}
                      </label>

                      <label class="radio-inline">
                        <span class="custom-radio">
                          <input type="radio" name="contacted" id="no" value="0" checked="checked">
                          <span></span>
                        </span>
                        {l s='No' mod='pdfquotation'}
                      </label>
                    </div>
                  </div>
                  <div class="form-group row">
                    {if $ipAddr }
                      <div class="col-xs-2 col-sm-7 col-md-2 col-lg-5"></div>
                      <div class="col-xs-10 col-sm-5 col-md-10 col-lg-7">
                        <div class="dropdown">
                          <button class="btn btn-secondary dropdown-toggle w-100" type="button"
                            id="dropdownCatalogueCheckList" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            Fiche Produit
                          </button>
                          <div class="dropdown_menu_catalog dropdown-menu w-100" style="max-height: 130px; overflow-y: scroll;"
                            aria-labelledby="dropdownCatalogueCheckList">
                            <div class="d-flex justify-content-center" onclick="event.stopPropagation()">
                              <input style="margin-left:6px; margin-right:6px;" type="checkbox"
                                name="catalogue_portail_checked" id="catalogue_portail_checked" value="">
                              <label for="catalogue_portail_checked">Portail</label>
                            </div>
                            <div class="d-flex justify-content-center" onclick="event.stopPropagation()">
                              <input style="margin-left:6px; margin-right:6px;" type="checkbox"
                                name="catalogue_cloture_grillage_rigide_checked" id="catalogue_cloture_grillage_rigide_checked" value="">
                              <label for="catalogue_cloture_grillage_rigide_checked">Cloture Grillage Rigide</label>
                            </div>
                            <div class="d-flex justify-content-center" onclick="event.stopPropagation()">
                              <input style="margin-left:6px; margin-right:6px;" type="checkbox"
                                name="catalogue_cloture_aluminium_checked" id="catalogue_cloture_aluminium_checked" value="">
                              <label for="catalogue_cloture_aluminium_checked">Cloture Aluminium</label>
                            </div>
                            <div class="d-flex justify-content-center" onclick="event.stopPropagation()">
                              <input style="margin-left:6px; margin-right:6px;" type="checkbox"
                                name="catalogue_porte_garage_battant_checked" id="catalogue_porte_garage_battant_checked" value="">
                              <label for="catalogue_porte_garage_battant_checked">Porte Garage a Battant</label>
                            </div>
                            <div class="d-flex justify-content-center" onclick="event.stopPropagation()">
                              <input style="margin-left:6px; margin-right:6px;" type="checkbox"
                                name="catalogue_porte_garage_enroulable_checked" id="catalogue_porte_garage_enroulable_checked" value="">
                              <label for="catalogue_porte_garage_enroulable_checked">Porte Garage Enroulable</label>
                            </div>
                            <div class="d-flex justify-content-center" onclick="event.stopPropagation()">
                              <input style="margin-left:6px; margin-right:6px;" type="checkbox"
                                name="catalogue_porte_garage_sectionnelle_checked" id="catalogue_porte_garage_sectionnelle_checked" value="">
                              <label for="catalogue_porte_garage_sectionnelle_checked">Porte de Garage Sectionnelle</label>
                            </div>
                            <div class="d-flex justify-content-center" onclick="event.stopPropagation()">
                              <input style="margin-left:6px; margin-right:6px;" type="checkbox"
                                name="catalogue_volet_battant_isole_penture_checked" id="catalogue_volet_battant_isole_penture_checked" value="">
                              <label for="catalogue_volet_battant_isole_penture_checked">Volet Battant Isolé Penture</label>
                            </div>
                            <div class="d-flex justify-content-center" onclick="event.stopPropagation()">
                              <input style="margin-left:6px; margin-right:6px;" type="checkbox"
                                name="catalogue_volet_battant_isole_pre_cadre_checked" id="catalogue_volet_battant_isole_pre_cadre_checked" value="">
                              <label for="catalogue_volet_battant_isole_pre_cadre_checked">Volet Battant Isolé Pre Cadre</label>
                            </div>
                            <div class="d-flex justify-content-center" onclick="event.stopPropagation()">
                              <input style="margin-left:6px; margin-right:6px;" type="checkbox"
                                name="catalogue_volet_roulant_checked" id="catalogue_volet_roulant_checked" value="">
                              <label for="catalogue_volet_roulant_checked">Volet Roulant</label>
                            </div>
                            <div class="d-flex justify-content-center" onclick="event.stopPropagation()">
                              <input style="margin-left:6px; margin-right:6px;" type="checkbox"
                                name="catalogue_bso_checked" id="catalogue_bso_checked" value="">
                              <label for="catalogue_bso_checked">BSO</label>
                            </div>
                            <div class="d-flex justify-content-center" onclick="event.stopPropagation()">
                              <input style="margin-left:6px; margin-right:6px;" type="checkbox"
                                name="catalogue_baie_coulissante_checked" id="catalogue_baie_coulissante_checked" value="">
                              <label for="catalogue_baie_coulissante_checked">Baie Coulissante</label>
                            </div>
                            <div class="d-flex justify-content-center" onclick="event.stopPropagation()">
                              <input style="margin-left:6px; margin-right:6px;" type="checkbox"
                                name="catalogue_fenetre_aluminium_frappe_checked" id="catalogue_fenetre_aluminium_frappe_checked" value="">
                              <label for="catalogue_fenetre_aluminium_frappe_checked">Fenêtre Aluminium à Frappe</label>
                            </div>
                            <div class="d-flex justify-content-center" onclick="event.stopPropagation()">
                              <input style="margin-left:6px; margin-right:6px;" type="checkbox"
                                name="catalogue_fenetre_cintree_frappe_checked" id="catalogue_fenetre_cintree_frappe_checked" value="">
                              <label for="catalogue_fenetre_cintree_frappe_checked">Fenêtre Cintrée à Frappe</label>
                            </div>
                            <div class="d-flex justify-content-center" onclick="event.stopPropagation()">
                              <input style="margin-left:6px; margin-right:6px;" type="checkbox"
                                name="catalogue_chassis_fixe_checked" id="catalogue_chassis_fixe_checked" value="">
                              <label for="catalogue_chassis_fixe_checked">Chassis Fixe</label>
                            </div>
                            <div class="d-flex justify-content-center" onclick="event.stopPropagation()">
                              <input style="margin-left:6px; margin-right:6px;" type="checkbox"
                                name="catalogue_fenetre_pvc_checked" id="catalogue_fenetre_pvc_checked" value="">
                              <label for="catalogue_fenetre_pvc_checked">Fenêtre PVC</label>
                            </div>
                            <div class="d-flex justify-content-center" onclick="event.stopPropagation()">
                              <input style="margin-left:6px; margin-right:6px;" type="checkbox"
                                name="catalogue_porte_entree_checked" id="catalogue_porte_entree_checked" value="">
                              <label for="catalogue_porte_entree_checked">Porte d'Entrée</label>
                            </div>
                            <div class="d-flex justify-content-center" onclick="event.stopPropagation()">
                              <input style="margin-left:6px; margin-right:6px;" type="checkbox"
                                name="catalogue_verriere_acier_sectionnelle_checked" id="catalogue_verriere_acier_sectionnelle_checked" value="">
                              <label for="catalogue_verriere_acier_sectionnelle_checked">Verrière Acier</label>
                            </div>
                            <div class="d-flex justify-content-center" onclick="event.stopPropagation()">
                              <input style="margin-left:6px; margin-right:6px;" type="checkbox"
                                name="catalogue_verriere_miroir_checked" id="catalogue_verriere_miroir_checked" value="">
                              <label for="catalogue_verriere_miroir_checked">Verrière Miroir</label>
                            </div>
                            <div class="d-flex justify-content-center" onclick="event.stopPropagation()">
                              <input style="margin-left:6px; margin-right:6px;" type="checkbox"
                                name="catalogue_porte_verriere_type_atelier_checked" id="catalogue_porte_verriere_type_atelier_checked" value="">
                              <label for="catalogue_porte_verriere_type_atelier_checked">Porte Verrière Type Atelier</label>
                            </div>
                            <div class="d-flex justify-content-center" onclick="event.stopPropagation()">
                              <input style="margin-left:6px; margin-right:6px;" type="checkbox"
                                name="catalogue_paroi_douche_checked" id="catalogue_paroi_douche_checked" value="">
                              <label for="catalogue_paroi_douche_checked">Paroi de Douche</label>
                            </div>
                            <div class="d-flex justify-content-center" onclick="event.stopPropagation()">
                              <input style="margin-left:6px; margin-right:6px;" type="checkbox"
                                name="catalogue_verriere_orangerie_checked" id="catalogue_verriere_orangerie_checked" value="">
                              <label for="catalogue_verriere_orangerie_checked">Verrière Orangerie</label>
                            </div>
                            <div class="d-flex justify-content-center" onclick="event.stopPropagation()">
                              <input style="margin-left:6px; margin-right:6px;" type="checkbox"
                                name="catalogue_verriere_district_checked" id="catalogue_verriere_district_checked" value="">
                              <label for="catalogue_verriere_district_checked">Verrière District</label>
                            </div>
                            <div class="d-flex justify-content-center" onclick="event.stopPropagation()">
                              <input style="margin-left:6px; margin-right:6px;" type="checkbox"
                                name="catalogue_verriere_bistrot_checked" id="catalogue_verriere_bistrot_checked" value="">
                              <label for="catalogue_verriere_bistrot_checked">Verrière Bistrot</label>
                            </div>
                            <div class="d-flex justify-content-center" onclick="event.stopPropagation()">
                              <input style="margin-left:6px; margin-right:6px;" type="checkbox"
                                name="catalogue_verriere_destructure_checked" id="catalogue_verriere_destructure_checked" value="">
                              <label for="catalogue_verriere_destructure_checked">Verrière Destructuré</label>
                            </div>
                            <div class="d-flex justify-content-center" onclick="event.stopPropagation()">
                              <input style="margin-left:6px; margin-right:6px;" type="checkbox"
                                name="catalogue_verriere_acier_sur_mesure_checked" id="catalogue_verriere_acier_sur_mesure_checked" value="">
                              <label for="catalogue_verriere_acier_sur_mesure_checked">Verrière Acier Sur Mesure</label>
                            </div>
                            <div class="d-flex justify-content-center" onclick="event.stopPropagation()">
                              <input style="margin-left:6px; margin-right:6px;" type="checkbox"
                                name="catalogue_pergola_aluminium_checked" id="catalogue_pergola_aluminium_checked" value="">
                              <label for="catalogue_pergola_aluminium_checked">Pergola Aluminium</label>
                            </div>
                            <div class="d-flex justify-content-center" onclick="event.stopPropagation()">
                              <input style="margin-left:6px; margin-right:6px;" type="checkbox"
                                name="catalogue_pergola_bioclimatique_checked" id="catalogue_pergola_bioclimatique_checked" value="">
                              <label for="catalogue_pergola_bioclimatique_checked">Pergola Bioclimatique</label>
                            </div>
                            <div class="d-flex justify-content-center" onclick="event.stopPropagation()">
                              <input style="margin-left:6px; margin-right:6px;" type="checkbox"
                                name="catalogue_pergolanda_checked" id="catalogue_pergolanda_checked" value="">
                              <label for="catalogue_pergolanda_checked">Pergolanda</label>
                            </div>
                            <div class="d-flex justify-content-center" onclick="event.stopPropagation()">
                              <input style="margin-left:6px; margin-right:6px;" type="checkbox"
                                name="catalogue_carport_2_poteaux_checked" id="catalogue_carport_2_poteaux_checked" value="">
                              <label for="catalogue_carport_2_poteaux_checked">Carport 2 Poteaux</label>
                            </div>
                            <div class="d-flex justify-content-center" onclick="event.stopPropagation()">
                              <input style="margin-left:6px; margin-right:6px;" type="checkbox"
                                name="catalogue_carport_aluminium_cintre_checked" id="catalogue_carport_aluminium_cintre_checked" value="">
                              <label for="catalogue_carport_aluminium_cintre_checked">Carport Aluminium Cintré</label>
                            </div>
                            <div class="d-flex justify-content-center" onclick="event.stopPropagation()">
                              <input style="margin-left:6px; margin-right:6px;" type="checkbox"
                                name="catalogue_carport_avec_debord_checked" id="catalogue_carport_avec_debord_checked" value="">
                              <label for="catalogue_carport_avec_debord_checked">Carport Avec Débord</label>
                            </div>
                            <div class="d-flex justify-content-center" onclick="event.stopPropagation()">
                              <input style="margin-left:6px; margin-right:6px;" type="checkbox"
                                name="catalogue_carport_double_checked" id="catalogue_carport_double_checked" value="">
                              <label for="catalogue_carport_double_checked">Carport Double</label>
                            </div>
                            <div class="d-flex justify-content-center" onclick="event.stopPropagation()">
                              <input style="margin-left:6px; margin-right:6px;" type="checkbox"
                                name="catalogue_carport_garage_checked" id="catalogue_carport_garage_checked" value="">
                              <label for="catalogue_carport_garage_checked">Carport Garage</label>
                            </div>
                            <div class="d-flex justify-content-center" onclick="event.stopPropagation()">
                              <input style="margin-left:6px; margin-right:6px;" type="checkbox"
                                name="catalogue_carport_toit_plat_checked" id="catalogue_carport_toit_plat_checked" value="">
                              <label for="catalogue_carport_toit_plat_checked">Carport Toit Plat</label>
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
                  <button  style="background-color: #abc4c7 !important;" class="btn btn-primary form-control-submit pull-xs-right" type="submit" id="btn_tag_devis">
                    <i class="material-icons ">print</i> {l s='Print' mod='pdfquotation'}
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
<div class="card" style="float: left !important; z-index: 50; display:none;">
  <div class="card-block">
    <h1 class="h1">{l s='Print a quote' mod='pdfquotation'}</h1>
  </div>

  <hr>

  <div>
    <section class="form-fields">
      <div class="form-group row" style="display:none;">
        <label class="col-md-3">{l s='First Name' mod='pdfquotation'}</label>
      </div>
    </section>

    <footer class="form-footer clearfix"
      style="/*! padding: 5px; *//*! vertical-align: middle; */display: flex;flex-direction: row;justify-content: center;align-items: center;padding-bottom: 12px;">
      <button class="btn btn-primary embedAluDevis">
        <i class="material-icons ">print</i> Mon devis
      </button>
    </footer>
  </div>
</div>
