{**
* 2007-2017 PrestaShop
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
* @copyright 2007-2017 PrestaShop SA
* @license   https://opensource.org/licenses/AFL-3.0 Academic Free License 3.0 (AFL-3.0)
* International Registered Trademark & Property of PrestaShop SA
*}

{assign var='ipAddr' value=Product::getIpUser()}

<!-- Inicio Modal PDF - Paulo aluclass -->
<div class="modal fade" id="modalEmbedAluclassPDF" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header" style="text-align: right;">
        <button id="modalEmbedAluclassPDF_close" class="btn btn-danger">X</button>
      </div>
      <div class="modal-body">
        <div class="embed-responsive" style="padding-bottom: 56%;">
          <iframe class="embed-responsive-item" id="codPdf" src=""
            allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Fim Modal PDF - Paulo aluclass -->

<div class="modal fade in" id="modalEmbedDownloadpdf" tabindex="-1" role="dialog" style="display: none;">
  <div class="modal-dialog modal-lg pdfcatalogo-size" role="document">
    <div class="modal-content" style="border-radius: 1rem;">
      <div class="modal-header" style="display: inline;display: -webkit-box;display: -ms-flexbox;display: flex;-webkit-box-align: start;-ms-flex-align: start;align-items: flex-start;-webkit-box-pack: justify;-ms-flex-pack: justify;justify-content: space-between;padding: 1rem;border-bottom: 1px solid #e9ecef;border-top-left-radius: 1rem;
        border-top-right-radius: 1rem;
        background-color: var(--red)">
        <div class="h1" style="color :white;">Télécharger notre catalogue</div>
        <button id="modalEmbedDownloadpdf_close" type="button"
          style="cursor: pointer;float: right;font-size: 1.5rem;font-weight: 700;line-height: 1;color: #000;text-shadow: 0 1px 0 #fff;opacity: .5;padding: 1rem;margin: -1rem -1rem -1rem auto;background-color: transparent;border: 0;-webkit-appearance: none;">X</button>
      </div>
      <div class="modal-body">
        <div id="customer-information-pdf">
          <form>
            <div class="row center-row">
              <div class="popup_rapp">
                {* <picture>
                  <source srcset="/img/cms/popup-catalogue.webp" type="image/webp">
                  <img loading="lazy" src="/img/cms/popup-catalogue.png" class="img-fluid" alt="Catalogue" width="542" height="475" />
                </picture> *}
              </div>
              <div class="col-md-6">
                <section class="form-fields">
                  <div class="form-group row" style="display:none;">
                    <label class="col-md-3">Télécharger notre catalogue</label>
                    <div class="col-md-9">
                      <input name="first_name" type="text">
                    </div>
                  </div>
                  <div class="form-group row messegecatalogo">
                    <span id="warning_messagecatalogo_pdf" class="col-md-12 form-control-label pl-2"></span>
                  </div>
                  <div class="form-group row sendcatalogo">
                    <label class="col-md-3 form-control-label">Nom</label>
                    <div class="col-md-9">
                      <input class="form-control" name="name_catalogue" id="name_catalogue" type="text"
                        required="required">
                      <span class="mon_modal_warnning" id="warning_name_pdf"></span>
                    </div>
                  </div>
                  <div class="form-group row sendcatalogo">
                    <label class="col-md-3 form-control-label">Email</label>
                    <div class="col-md-9">
                      <input class="form-control" name="mail_catalogue" id="mail_catalogue" type="text"
                        required="required">
                      <span class="mon_modal_warnning" id="warning_mail_pdf"></span>
                    </div>
                  </div>
                  {if $ipAddr }
                    <div class="form-group row sendcatalogo">
                      <label class="col-md-3 form-control-label">Email Commercial</label>
                      <div class="col-md-9">
                        <input class="form-control" name="email_comercial_cata" id="email_comercial_cata" type="email"
                          required="required">
                        <span class="mon_modal_warnning" id="warning_mail_comercial_cata"></span>
                      </div>
                    </div>
                  {/if}

                  <div class="form-group row sendcatalogo">
                    <label class="col-md-3 form-control-label">Téléphone</label>
                    <div class="col-md-9">
                      <input class="form-control" name="phone_catalogue" id="phone_catalogue" type="text"
                        required="required">
                      <span class="mon_modal_warnning" id="warning_phone_pdf"></span>
                    </div>
                  </div>
                  <input name="catalogue_name" id="catalogue_name" type="hidden"
                    value="catalogue">
                </section>
                <footer class="form-footer clearfix" style="text-align: end;">
                  <button class="btn btn-primary pull-xs-right sendcatalogo" type="button" id="btn_tag_pdf_catalgo">
                    <i class="material-icons ">file_download</i> Télécharger
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

{*Model for link cart begin*}
<div class="modal fade in" id="modalEmbedlinkcart" tabindex="-1" role="dialog" style="display: none; ">
  <div class="modal-dialog modal-lg pdfcatalogo-size" role="document">
    <div class="modal-content" style="border-radius: 25px;">
      <div class="modal-header"
        style=" background: #45BEBE; display: inline;display: -webkit-box;display: -ms-flexbox;display: flex;-webkit-box-align: start;-ms-flex-align: start;align-items: flex-start;-webkit-box-pack: justify;-ms-flex-pack: justify;justify-content: space-between;padding: 1rem;border-bottom: 1px solid #e9ecef;border-top-left-radius: 1rem;border-top-right-radius: 1rem;">
        <div class="h1" style="color: white;">Partager le panier d'achat</div>
        <button id="modalEmbedlinkcart_close" type="button"
          style="cursor: pointer;float: right;font-size: 1.5rem;font-weight: 700;line-height: 1;color: #000;text-shadow: 0 1px 0 #fff;opacity: .5;padding: 1rem;margin: -1rem -1rem -1rem auto;background-color: transparent;border: 0;-webkit-appearance: none;">X</button>
      </div>
      <div class="modal-body">
        <div id="customer-information-pdf">
          <form>
            <div class="row center-row">
              <div class="popup_rapp">
                {* <picture>
                  <source srcset="/img/cms/popup-share-basket.webp" type="image/webp">
                  <img loading="lazy" src="/img/cms/popup-share-basket.jpg" class="img-fluid" alt="Partager le panier d'achat" />
                </picture> *}
              </div>
              <div class="col-md-6">
                <section class="form-fields">
                  <div class="form-group row" style="display:none;">
                    <label class="col-md-3">Partager le panier d'achat</label>
                    <div class="col-md-9">
                      <input name="first_name" type="text">
                    </div>
                  </div>
                  <div class="form-group row messegelinkcart">
                    <span id="warning_messagelinkcart" class="col-md-12 form-control-label pl-2"></span>
                  </div>
                  <div class="form-group row sendlinkcart">
                    <label class="col-md-3 form-control-label">Nom</label>
                    <div class="col-md-9">
                      <input class="form-control" name="name_linkcart" id="name_linkcart" type="text"
                        required="required">
                      <span class="mon_modal_warnning" id="warning_name_linkcart"></span>
                    </div>
                  </div>
                  <div class="form-group row sendlinkcart">
                    <label class="col-md-3 form-control-label">Email</label>
                    <div class="col-md-9">
                      <input class="form-control" name="mail_linkcart" id="mail_linkcart" type="text"
                        required="required">
                      <span class="mon_modal_warnning" id="warning_mail_linkcart"></span>
                    </div>
                  </div>
                  {if $ipAddr }
                  <div class="form-group row sendlinkcart">
                    <label class="col-md-3 form-control-label">Email Commercial</label>
                    <div class="col-md-9">
                      <input class="form-control" name="email_comercial_linkcart" id="email_comercial_linkcart"
                        type="email" required="required">
                      <span class="mon_modal_warnning" id="warning_mail_comercial_linkcart"></span>
                    </div>
                  </div>
                  {/if}
                  <div class="form-group row sendlinkcart">
                    <label class="col-md-3 form-control-label">Téléphone</label>
                    <div class="col-md-9">
                      <input class="form-control" name="phone_linkcart" id="phone_linkcart" type="text">
                      <span class="mon_modal_warnning" id="warning_phone_linkcart"></span>
                    </div>
                  </div>
                </section>
                <footer class="form-footer clearfix" style="text-align: end;">
                  <button class="btn btn-primary pull-xs-right sendlinkcart" style="background: #45BEBE;" type="button"
                    id="btn_tag_linkcart">
                    <i class="material-icons ">share</i> Partager
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

{*Model for Professionnels begin*}
<div class="modal fade in" id="modalEmbedprofessionnels" tabindex="-1" role="dialog"
  style="display: none; padding-right: 17px;">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" style="border-radius: 25px;">
      <div class="modal-header rappelheader"
        style="display: inline;display: -webkit-box;display: -ms-flexbox;display: flex;-webkit-box-align: start;-ms-flex-align: start;align-items: flex-start;-webkit-box-pack: justify;-ms-flex-pack: justify;justify-content: space-between;padding: 1rem;border-bottom: 1px solid #e9ecef;border-top-left-radius: 1rem;border-top-right-radius: 1rem;">

        <div class="h1 namerappel">DEMANDER À ÊTRE RECONTACTÉ POUR REJOINDRE NOTRE RÉSEAU D'INSTALLATEURS</div>
        <button id="modalEmbedprofessionnel_close" type="button"
          style="cursor: pointer;float: right;font-size: 1.5rem;font-weight: 700;line-height: 1;color: #000;text-shadow: 0 1px 0 #fff;opacity: .5;padding: 1rem;margin: -1rem -1rem -1rem auto;background-color: transparent;border: 0;-webkit-appearance: none;">X</button>

      </div>
      <div class="modal-body">
        <form id="tag_professionnels">
          <div class="row center-row">
            <div class="popup_rapp col-md-6">
            </div>
            <div class="col-md-6">
              <section class="form-fields">
                <div class="bodyprofessionnelsmessage">
                  <span id="warning_messageprofessionnel_pdf" class="col-md-12 form-control-label pl-2"></span>
                </div>
                <div class="bodyprofessionnels">
                  <div class="form-group row">
                    <div id="headerprofessionnelsmessage" class="col-md-12">

                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-3 form-control-label">Siret</label>
                    <div class="col-md-9">
                      <input class="form-control" name="siret_professionnels" id="siret_professionnels" type="text" inputmode="numeric" pattern="\d+" maxlength="14" oninput="this.value = this.value.replace(/\D/g, '')" required="required">
                      <span class="mon_modal_warnning" id="warning_siret_professionnels"></span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-3 form-control-label">Nom</label>
                    <div class="col-md-9">
                      <input class="form-control" name="name_professionnels" id="name_professionnels" type="text"
                        required="required">
                      <span class="mon_modal_warnning" id="warning_name_professionnels"></span>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-md-3 form-control-label">Email</label>
                    <div class="col-md-9">
                      <input class="form-control" name="mail_professionnels" id="mail_professionnels" type="email"
                        required="required">
                      <span class="mon_modal_warnning" id="warning_mail_professionnels"></span>
                    </div>
                  </div>


                  <div class="form-group row">
                    <label class="col-md-3 form-control-label">Téléphone</label>
                    <div class="col-md-9">
                      <input class="form-control" name="phone_professionnels" id="phone_professionnels" type="text">
                      <span class="mon_modal_warnning" id="warning_phone_professionnels"></span>
                    </div>
                  </div>
                </div>

              </section>

              <footer class="form-footer clearfix" style="text-align: end;">
                <button class="btn btn-primary form-control-submit pull-xs-right" type="button"
                  id="btn_tag_professionnels">
                  ENVOYEZ VOTRE DEMANDE
                </button>
              </footer>
            </div>
          </div>
          <div class="pt-1" style="text-align: center;">
              Réservé uniquement aux professionnels et aux installateurs de produits de menuiserie!
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
{*Model for Professionnels end*}

{*Model for Rappel begin*}
<div class="modal fade in" id="modalEmbedRappel" tabindex="-1" role="dialog"
  style="display: none; padding-right: 17px;">
  <div class="modal-dialog modal-lg pdfcatalogo-size" role="document">
    <div class="modal-content" style="border-radius: 25px;">
      <div class="modal-header rappelheader"
        style="display: inline;display: -webkit-box;display: -ms-flexbox;display: flex;-webkit-box-align: start;-ms-flex-align: start;align-items: flex-start;-webkit-box-pack: justify;-ms-flex-pack: justify;justify-content: space-between;padding: 1rem;border-bottom: 1px solid #e9ecef;border-top-left-radius: 1rem;border-top-right-radius: 1rem;">

        <div class="h1 namerappel">Imprimer un devis</div>
        <button id="modalEmbedRappel_close" type="button"
          style="cursor: pointer;float: right;font-size: 1.5rem;font-weight: 700;line-height: 1;color: #000;text-shadow: 0 1px 0 #fff;opacity: .5;padding: 1rem;margin: -1rem -1rem -1rem auto;background-color: transparent;border: 0;-webkit-appearance: none;">X</button>

      </div>
      <div class="modal-body">

        <form id="tag_rappel">

          <div class="row center-row">
            <div class="popup_rapp">
              {* <picture>
                <source id="popup_image_webp" srcset="" type="image/webp">
                <img loading="lazy" id="popup_image" src="" class="img-fluid" alt="" />
              </picture> *}
            </div>
            <div class="col-md-6">
              <section class="form-fields">

                <div class="bodyrappelmessage">

                </div>
                <div class="bodyrappel">
                  <div class="form-group row">
                    <div id="headerrappelmessage" class="col-md-12">

                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-3 form-control-label">Nom</label>
                    <div class="col-md-9">
                      <input class="form-control" name="last_name" id="last_name_rappel" type="text"
                        required="required">
                      <span class="mon_modal_warnning" id="warning_name_rappel"></span>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-md-3 form-control-label">Email</label>
                    <div class="col-md-9">
                      <input class="form-control" name="email" id="email_rappel" type="email" required="required">
                      <span class="mon_modal_warnning" id="warning_mail_rappel"></span>
                    </div>
                  </div>

                  {if $ipAddr }
                  <div class="form-group row" id="email_comercial_visual">
                    <label class="col-md-3 form-control-label">Email Commercial</label>
                    <div class="col-md-9">
                      <input class="form-control" name="email_comercial" id="email_comercial" type="email"
                        required="required">
                      <span class="mon_modal_warnning" id="warning_mail_comercial"></span>
                    </div>
                  </div>
                  {/if}

                  <div class="form-group row">
                    <label class="col-md-3 form-control-label">Téléphone</label>
                    <div class="col-md-9">
                      <input class="form-control" name="phone" id="phone_rappel" type="text">
                      <span class="mon_modal_warnning" id="warning_phone_rappel"></span>
                    </div>
                  </div>
                </div>

                <input name="coderappel" id="coderappel" type="hidden" value="rappel" />
              </section>

              <footer class="form-footer clearfix" style="text-align: end;">
                <button class="btn btn-primary form-control-submit pull-xs-right" type="button" id="btn_tag_rappel">
                  ENVOYEZ VOTRE DEMANDE
                </button>
              </footer>
            </div>
          </div>

        </form>


      </div>
    </div>
  </div>
</div>
{*Model for Rappel end*}

{*Model for info begin*}

{*modal-lg pdfcatalogo-size*}
<div class="modal fade in" id="modalinfo" tabindex="-1" role="dialog" style="display: none; padding-right: 17px;">
  <div class="modal-dialog " role="document">
    <div class="modal-content" style="border-radius: 25px;">
      <div class="modal-header"
        style="/*! text-align: right; */display: inline;display: -webkit-box;display: -ms-flexbox;display: flex;-webkit-box-align: start;-ms-flex-align: start;align-items: flex-start;-webkit-box-pack: justify;-ms-flex-pack: justify;justify-content: space-between;padding: 1rem;border-bottom: 1px solid #e9ecef;border-top-left-radius: .3rem;border-top-right-radius: .3rem;">

        <div class="h1">Information</div>
        {* <button id="modalinfo_close" type="button"
          style="cursor: pointer;float: right;font-size: 1.5rem;font-weight: 700;line-height: 1;color: #000;text-shadow: 0 1px 0 #fff;opacity: .5;padding: 1rem;margin: -1rem -1rem -1rem auto;background-color: transparent;border: 0;-webkit-appearance: none;">X</button> *}

      </div>
      <div class="modal-body">
        <div>

          <div id="modalinfo-information">
            <form id="tag_modalinfo">
              <section class="form-fields">
                <div class="form-group row" style="display:none;">
                  <label class="col-md-3">Informations</label>
                  <div class="col-md-9">
                    <input name="first_name" type="text">
                  </div>
                </div>
                <div class="bodyinfo">
                  <h2 id="modalinfomessage"></h2>
                </div>
              </section>
              <footer class="form-footer clearfix" style="text-align: end;">
                <button class="btn btn-primary form-control-submit pull-xs-right" type="button"
                  onclick="CloseInfoModal()">
                  OK
                </button>
              </footer>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
{*Model for info end*}

<!--<div id="containerConsentLGPD">
  {* {assign var=varPositionTop value=['-50vh'=>'-50vh','-25vh'=>'-25vh','-10vh'=>'-10vh','0vh'=>'0vh','-10vh'=>'25vh','50vh'=>'50vh']} *}
  {* {assign var=varPositionLeft value=['-50vw'=>'-50vw','-25vw'=>'-25vw','-10vw'=>'-10vw','0vw'=>'0vw','-10vw'=>'25vw','50vw'=>'50vw']} *}
  {* {assign var=randomPositionTop value=$varPositionTop|@array_rand} *}
  {* {assign var=randomPositionLeft value=$varPositionLeft|@array_rand} *}
  {* <div class="popupConsentLGPD" style="margin-top: {$randomPositionTop}; margin-left: {$randomPositionLeft}"> *}
  <div class="popupConsentLGPD">
    <div class="row">
      <div class="col-md-12">
        <p class="ConsentLGPDno">Continuer sans accepter</p>
      </div>
      <div class="col-md-12 image">
        <p>
          <picture>
            <source type="image/webp" srcset="/img/priximbattable-cookies.webp">
            <img loading="lazy" src="/img/priximbattable-cookies.png" class="img-fluid img-centre" alt="Logo Cookies"
              style="width: 72%; height: 95%;" />
          </picture>
        </p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 text">
        <p>Nos partenaires et nous déposons des cookies et utilisons des informations non sensibles de votre appareil
          pour améliorer notre site et afficher des contenus personnalisés. Vous pouvez accepter ou refuser ces
          différentes opérations. Cliquez sur "en savoir plus" pour avoir de plus amples informations.</p>
        <p>Les données que vous nous confiez sont traitées par Priximbattable, 5 rue du Travail, 38230 Pont-De-Cheruy.
        </p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <a href="/content/6-politique-de-confidentialite" target="_blank">
          <p class="ConsentLGPDpolicy">En savoir plus</p>
        </a>
      </div>
      <div class="col-md-6">
        <p class="ConsentLGPDyes">Accepter & Fermer</p>
        {* {assign var=varClass value='/,\s*/'|preg_split:'8af551a0a27e3c3cc2e62bed3a3cf78a78634557488d10afd6a1651c, 15a7ca27892d88fd55c9c0b4ccc2b4285328f5f33d1e6f78faa1df41, a07f82080d4f3850f3f89ba5a80147fb9d1f2e46086d4a62a5308f3d, 92b7a8737cdaeea2222c7eddba57ddc52dba40951896460a866de29e, 8aa0a9528a628fdaa76756b4e0f492c0bb2de3c7baae699efc79326d, 88387a7fb373058fe5436cccda68b81558b4213f8e6c68fc3f7541ff, 6b804f506d6624013e5263f84e25574a1d9f4a63f926f92a5eea8ad1, d93568f25b72920ebdc2ef493c5669c2ceca74b2cda16ed5111c1a00, 928262e8bcc00a3a595fcd38f12495a6a089fae88a791ee753f8b5d8, 81e7f792bfc1cac2233d3de669528f5eba014fc5250073a29bb63139'} *}
        {* {assign var=randomClass value=$varClass|@array_rand} *}
        {* <p class="ConsentLGPDyes {$varClass.$randomClass}">Accepter & Fermer</p> *}
      </div>
    </div>
  </div>
</div>-->

{block name='header_banner'}
<div class="header-banner">
  {hook h='displayBanner'}
</div>
{/block}

{block name='header_nav'}


<nav class="header-nav ">
  <div class="container">
    <div class="row">

      <div class="hidden-md-down">
        <div class="col-md-2"
          style="text-align: center; padding-top: 5px; padding-bottom: 5px; display: flex;align-items: center;align-content: center;flex-direction: column;">
          <picture>
            <source srcset="/img/img_union/cssSprite_headerfooter.webp" type="image/webp">
            <img fetchpriority="high" class="spriteflagfr" src="/img/img_union/cssSprite_headerfooter.png" alt="France">
          </picture>
          <label style="color: #fff;text-align: right;font-size: .675rem;">www.priximbattable.net</label>
        </div>

        <!--<div id="div-text-birthday"class="col-md-6" style="text-align: center; padding-top: 5px; padding-bottom: 5px;">
            {* <p class="alu_p_fabricante1">
              <a href="https://priximbattable.net/101-bonnes-affaires" class="botaoApp3D">Bonnes Affaires -40%</a>
            </p> *}
            {* <span class="text-birthday">On Fête 2024</span> *}
          </div>

          <div id="div-gifts" class="col-md-4" style="text-align: center; padding-top: 5px; padding-bottom: 5px;">
            <p class="alu_p_fabricante1">
              {* <span class="botaoApp3DCoupon embedcoupon10">Demandez votre coupon de réduction de 5% en cliquant
                ICI</span> *}
              <span class="text-birthday" id="seeGifts" style="cursor: pointer;">Cliquez ici pour découvrir nos cadeaux</span>
              <span class="botaoApp3D custom-birthday hide-block" id="closeGifts">X</span>
            </p>
          </div>-->

          <div class="col-md-2 text-center" style="text-align: center; ">
            <p class="alu_p_fabricante1 ">
              <!--<span class="botaoApp3DCoupon embedcoupon10">Demandez votre coupon de réduction de 5% en cliquant
                  ICI</span>-->

              <span style="text-transform: uppercase; font-size: 9px;line-height: 1.1;display: inline-block;">besoin
                d'un devis ou d'un renseignement ?
                contactez notre service
                client au </span>
              <br><span style="font-size: 18px;">04 72 80 93 54</span>
            </p>
          </div>
          <div class="col-md-2" style="text-align: center; padding-top: 5px; padding-bottom: 5px;">
            <div style="display: flex; color: #e6e6e6; font-weight: 600;">
              <div>
                <img fetchpriority="high" src="/img/technicien.svg" width="50" height="50" alt="Technicien"
                  title="Technicien">
              </div>
              <div style="flex-flow: column wrap; display: flex; line-height: 1.1;">
                <span style="text-transform: uppercase; font-size: 16px;">Professionnels</span>
                <span style="text-transform: uppercase; font-size: 10px; font-weight: 500;">Posez nos produits</span>
                <span class="professionnelsmodel" style="text-transform: uppercase; font-size: 12px;color: var(--red); font-weight: 600; cursor: pointer;">Cliquez ici</span>
              </div>
            </div>
          </div>

        <div class="col-md-2 text-center" style="text-align: center; padding-top: 5px; padding-bottom: 5px;">
          <p class="alu_p_fabricante1 pt-1">
            <span class="botaoApp3D embedAluclass" data-watch="XeaufyZmtMg">
            <!-- <i class="fa fa-youtube-play logo-yt"></i> -->
            <i class="material-icons logo-yt">play_circle_filled</i>
              Nos Équipes</span>
          </p>
        </div>


        <div class="col-md-4" style="text-align: center; padding-top: 5px; padding-bottom: 5px;">
          <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-4 footer-flags">
              <div class="footer-flags-image">
                <a href="https://www.precoimbativel.net" target="_blank"
                  style="display: flex;align-items: center;align-content: center;flex-direction: column;">
                  <picture>
                    <source srcset="/img/flags/pt.webp" type="image/webp">
                    <img fetchpriority="high" src="/img/flags/pt.png" alt="precoimbativel.net" title="precoimbativel.net">
                  </picture>
                  <label style="color: #fff;text-align: right;font-size: .675rem;">www.precoimbativel.net</label>
                </a>
              </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-4 footer-flags">
              <div class="footer-flags-image">
                <a href="https://www.precioimbatible.net" target="_blank"
                  style="display: flex;align-items: center;align-content: center;flex-direction: column;">
                  <picture>
                    <source srcset="/img/flags/es.webp" type="image/webp">
                    <img fetchpriority="high" src="/img/flags/es.png" alt="precioimbatible.net" title="precioimbatible.net">
                  </picture>
                  <label style="color: #fff;text-align: right;font-size: .675rem;">www.precioimbatible.net</label>
                </a>
              </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-4 footer-flags">
              <div class="footer-flags-image">
                <a href="https://www.preisverrueckt.de" target="_blank"
                  style="display: flex;align-items: center;align-content: center;flex-direction: column;">
                  <picture>
                    <source srcset="/img/flags/ge.webp" type="image/webp">
                    <img fetchpriority="high" src="/img/flags/ge.png" alt="preisverrueckt.de" title="preisverrueckt.de">
                  </picture>
                  <label style="color: #fff;text-align: right;font-size: .675rem;">www.preisverrueckt.de</label>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="hidden-md-up text-sm-center mobile info-mobile-position">

        {* <div class="row" style="background-color: #000; border-bottom: 3px solid var(--red);">
            <div class="col-md-12" style="text-align: center; padding-top: 5px; padding-bottom: 5px;">
              <p class="alu_p_fabricante1">
                <span class="botaoApp3DCoupon embedcoupon10">Remise de 5% en cliquant ici</span>
                <span style="text-transform: uppercase;">besoin d'un devis ou d'un renseignement ? contactez notre
                service client au 04 72 80 93 54</span>
              </p>
            </div>
          </div> *}
        <div class="clearfix"></div>

        <div class="row">
          <div class="col-12 text-center">
            <a href="{$urls.base_url}">
              {* <img loading="lazy" src="/img/logoFR_200px.png" alt="{$shop.name}" style="margin-top: 20px; margin-bottom: 3px;" /> *}
              <picture>
                <source srcset="/img/priximbattable-logo.webp" type="image/webp">
                <img fetchpriority="high" src="/img/priximbattable-logo.png" alt="{$shop.name}" class="img-fluid" style="margin-top: 4px;" width="453" height="66">
              </picture>
            </a>
            <i id="icon-info-mobile" class="material-icons">&#xE88E;</i>
          </div>
        </div>
        <div class="popup-logo-info-mobile" style="display: none;">
          <div id="div-icon-info-close-mobile">
            <i id="icon-info-mobile-close" class="material-icons">&#xE5CD;</i>
          </div>
          <div class="row">
            <div class="col-md-6 div-text-logo-info-mobile">
              <iframe class="embed-responsive-item iframe-logo-info-mobile" id="codPdf" src="https://www.youtube.com/embed/7e6dZcSoBKg" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="col-md-6 div-text-logo-info-mobile">
              <span>La qualité à un PRIX :  Notre promesse pour des prix imbattables</span>
              <ul class="ul-text-logo-info">
                <li>Produits vendus à 90 % pour les professionnels et leur cahier des charges qualité.</li>
                <li>99% conçus et fabriqués par nous.</li>
                <li>90% transportés par notre flotte de camions.</li>
                <li>Pas d’intermédiaire entre vous et nous, car nous sommes FABRICANTS.</li>
                <li>Une qualité RSE inégalée dans notre domaine.</li>
              </ul>
            </div>
          </div>
          <div class="row pb-2">
            <div class="col-md-12">
              <div>
                <div>
                  <span class="new-layout-commande-box-img">
                    <picture>
                      <source srcset="/img/cms/Avis/avis-confirmation-commande.webp" type="image/webp">
                      <img loading="lazy" src="/img/cms/Avis/avis-confirmation-commande.jpg" class="new-layout-commande-box1" alt="Avis" title="Avis" width="491" height="319">
                    </picture>
                    <div class="div-notas-logo-info-mobile">
                      <div class="logos-avis-logo-info avis-h-checkout avis-h-checkout-addrs bi-none-logo-info-mobile">
                        <a href="https://priximbattable.net/avis-client" target="_blank" class="gap-img-logo-info-mobile notas-avis-color-logo-info">
                          <div class="border-avis">
                            <picture>
                              <source srcset="/img/cms/Avis/logo-google.webp" type="image/webp">
                              <img class=" img-fluid avis-img-w avis-addrs-img-w" loading="lazy" src="/img/cms/Avis/logo-google.png" alt="Google" title="Google" width="386" height="129">
                            </picture>
                            <span><b>4.4</b></span>
                          </div>
                          <div class="border-avis">
                            <picture>
                              <source srcset="/img/cms/Avis/logo-pages-jaunes.webp" type="image/webp">
                              <img class=" img-fluid avis-img-w avis-addrs-img-w" loading="lazy" src="/img/cms/Avis/logo-pages-jaunes.png" alt="Pages Jaunes" title="Pages Jaunes" width="386" height="129">
                            </picture>
                            <span><b>4.6</b></span>
                          </div>
                        </a>
                      </div>
                      <div class="logos-avis-logo-info avis-h-checkout avis-h-checkout-addrs bi-none-logo-info-mobile2">
                        <a href="https://priximbattable.net/avis-client" target="_blank" class="gap-img-logo-info-mobile notas-avis-color-logo-info">
                          <div class="border-avis">
                            <picture>
                              <source srcset="/img/cms/Avis/logo-priximbattable.webp" type="image/webp">
                              <img class=" img-fluid avis-img-w avis-addrs-img-w" loading="lazy" src="/img/cms/Avis/logo-priximbattable.png" alt="Prix Imbattable" title="Prix Imbattable" width="386" height="129">
                            </picture>
                            <span><b>4.5</b></span>
                          </div>
                          <div class="border-avis">
                            <picture>
                              <source srcset="/img/cms/Avis/logo-trustpilot.webp" type="image/webp">
                              <img class=" img-fluid avis-img-w avis-addrs-img-w" loading="lazy" src="/img/cms/Avis/logo-trustpilot.png" alt="Trustpilot" title="Trustpilot" width="386" height="129">
                            </picture>
                            <span><b>4.4</b></span>
                          </div>
                        </a>
                      </div>
                    </div>
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="header-mobile" style="margin-left: -55px;">
          <div class="float-xs-right">
            <span class="material-icons embedRappel" style="padding-top: 13px;">
              help_outline
            </span>
          </div>
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
              <a href="tel:04 72 80 93 54"> <i class="material-icons">phone</i></a>
            </div>
          </div>
          <div class="float-xs-right" id="_mobile_wishlist">
            <div class="user-info">
              <a href="https://priximbattable.net/index.php?controller=WishList"><i class="material-icons"
                  {if $iswishlist} style="color: red;" {/if}>favorite</i></a>
            </div>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>

      <!--<div id="bar-birthday" class="hidden-md-down col-md-12 bar-hide">
          <div class="col-md-3 text-center">
            <p class="alu_p_fabricante1">
              <a href="https://priximbattable.net/101-bonnes-affaires" class="botaoApp3D">DÉSTOCKAGE</a>
            </p>
          </div>
          <div class="col-md-6 text-center">
            <p class="alu_p_fabricante1">
              <span class="botaoApp3DCoupon embedcoupon10">Demandez votre coupon de réduction de 5% en cliquant
                ICI</span>
            </p>
          </div>
          <div class="col-md-3 text-center">
            <p class="alu_p_fabricante1">
              <span class="botaoApp3D embedAluclass" data-watch="XeaufyZmtMg"><i class="fa fa-youtube-play logo-yt"></i> Nos Équipes</span>
            </p>
          </div>
          {* <div class="col-md-3 text-center">
            <p class="alu_p_fabricante1">
              <span class="botaoApp3DCoupon embedGagne">Inscrivez-vous et gagnez un cadeau</span>
            </p>
          </div> *}
        </div>-->

    </div>
  </div>
</nav>
{/block}

{block name='header_top'}
<div class="header-top hidden-md-down">
  <div class="container">
    <div class="row">

      <div class="col-md-4 hidden-sm-down" id="_desktop_logo" style="margin-top: -8px; display:flex;">
        <div style="align-self: center; cursor: pointer; position: relative; left: 15px;" onclick="ShowHide(this)">
          <div class="bar1">
          </div>
          <div class="bar2">
          </div>
          <div class="bar3">
          </div>
        </div>
        <div id="Menu" style="display: none; width: 300px; position: absolute; left: 65px; z-index: 11; background-color: gray;">
          <div class="submenu">
            <a class="text-hb-color" href="https://priximbattable.net/content/70-service-de-pose" style="display: flex;gap: 20px;align-items: center;">
              <div class="icone">
                <img src="/img/service-pose.svg" alt="Service de Pose">
              </div>
              <div class="texto">
                Service d’Installation de nos produits
              </div>
            </a>
          </div>
          <div class="submenu">
            <a class="text-hb-color" href="https://priximbattable.net/avis-client" style="display: flex;gap: 20px;align-items: center;">
              <div class="icone">
                <img src="/img/avis.svg" alt="Avis">
              </div>
              <div class="texto">
                Avis
              </div>
            </a>
          </div>
          <div class="submenu">
            <span class="embedAluclass text-hb-color" data-watch="XeaufyZmtMg" style="display: flex;gap: 20px;align-items: center;">
              <div class="icone">
                <img src="/img/equipes.svg" alt="Présentation des équipes">
              </div>
              <div class="texto">
                Présentation des équipes
              </div>
            </span>
          </div>
          <div class="submenu">
            <a class="text-hb-color" href="https://priximbattable.net/content/32-fabricant" style="display: flex;gap: 20px;align-items: center;">
              <div class="icone">
                <img src="/img/fabricant.svg" alt="Fabricant notre métier">
              </div>
              <div class="texto">
                Fabricant, notre métier
              </div>
            </a>
          </div>
          <div class="submenu">
            <a class="text-hb-color" href="https://priximbattable.net/content/18-produits-certifies" style="display: flex;gap: 20px;align-items: center;">
              <div class="icone">
                <img src="/img/certifications.svg" alt="Nos certifications">
              </div>
              <div class="texto">
                Nos certifications
              </div>
            </a>
          </div>
          <div class="submenu">
            <a class="embedAluclass text-hb-color" data-watch="7e6dZcSoBKg" style="display: flex;gap: 20px;align-items: center;">
              <div class="icone">
                <img src="/img/processus-de-fabrication.svg" alt="Processus de fabrication">
              </div>
              <div class="texto">
                Notre processus de fabrication
              </div>
            </a>
          </div>
          <div class="submenu">
            <a class="text-hb-color"
              href="https://priximbattable.net/content/49-il-y-a-un-produit-prix-imbattable-pres-de-chez-vous" style="display: flex;gap: 20px;align-items: center;">
              <div class="icone">
                <img src="/img/ou-sont-nos-clients.svg" alt="Où sont nos clients">
              </div>
              <div class="texto">
                Où sont nos clients
              </div>
            </a>
          </div>
          <div class="submenu">
            <a class="text-hb-color" href="https://priximbattable.net/content/21-actualites-priximbattable" style="display: flex;gap: 20px;align-items: center;">
              <div class="icone">
                <img src="/img/actualites.svg" alt="Actualités">
              </div>
              <div class="texto">
                Actualités
              </div>
            </a>
          </div>
        </div>
        <a href="{$urls.base_url}">
          {* <img loading="lazy" class="logo img-responsive" src="{$shop.logo}" alt="{$shop.name}"> *}
          <picture>
            <source srcset="/img/priximbattable-logo.webp" type="image/webp">
            <img fetchpriority="high" src="/img/priximbattable-logo.png" alt="{$shop.name}" class="logo img-responsive" width="453"
              height="66">
          </picture>
        </a>
        <i id="icon-info" class="material-icons">&#xE88E;</i>
      </div>
      <div class="popup-logo-info" style="display: none;">
        <div class="row">
          <div class="col-md-6 div-text-logo-info">
            <iframe class="embed-responsive-item iframe-logo-info" id="codPdf" src="https://www.youtube.com/embed/7e6dZcSoBKg" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen ></iframe>
          </div>
          <div class="col-md-6 div-text-logo-info">
            <p>La qualité à un PRIX :  Notre promesse pour des prix imbattables</p>
            <ul class="ul-text-logo-info">
              <li>Produits vendus à 90 % pour les professionnels et leur cahier des charges qualité.</li>
              <li>99% conçus et fabriqués par nous.</li>
              <li>90% transportés par notre flotte de camions.</li>
              <li>Pas d’intermédiaire entre vous et nous, car nous sommes FABRICANTS.</li>
              <li>Une qualité RSE inégalée dans notre domaine.</li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <picture class="hidden-md-down">
              <source srcset="/img/cms/Avis/avis-desktop.webp" type="image/webp">
              <img loading="lazy" src="/img/cms/Avis/avis-desktop.jpg" class="img-fluid" alt="Avis" title="Avis" width="1500" height="430">
            </picture>
            <a  class=" hidden-lg-up" href="https://priximbattable.net/avis-client">
              <picture>
                <source srcset="/img/cms/Avis/avis_mobile.webp" type="image/webp">
                <img loading="lazy" class="img-fluid img-centre img-media-100" src="/img/cms/Avis/avis_mobile.jpg" alt="Avis" title="Avis" width="800" height="520">
              </picture>
            </a>
            <div class="logos-avis avis-h">
              <a href="https://priximbattable.net/avis-client" target="_blank" class="notas-avis-color-logo-info">
                <div class="border-avis">
                  <picture>
                    <source srcset="/img/cms/Avis/logo-google.webp" type="image/webp">
                    <img class="img-fluid avis-img-w" loading="lazy" src="/img/cms/Avis/logo-google.png" alt="Google"
                      title="Google" width="386" height="129">
                  </picture>
                  <span><b>{$notaGoogle}</b></span>
                </div>
                <div class="border-avis">
                  <picture>
                    <source srcset="/img/cms/Avis/logo-pages-jaunes.webp" type="image/webp">
                    <img class="img-fluid avis-img-w" loading="lazy" src="/img/cms/Avis/logo-pages-jaunes.png"
                      alt="Pages Jaunes" title="Pages Jaunes" width="386" height="129">
                  </picture>
                  <span><b>{$notaPagesJaunes}</b></span>
                </div>
                <div class="border-avis">
                  <picture>
                    <source srcset="/img/cms/Avis/logo-priximbattable.webp" type="image/webp">
                    <img class="img-fluid avis-img-w" loading="lazy" src="/img/cms/Avis/logo-priximbattable.png"
                      alt="Prix Imbattable" title="Prix Imbattable" width="386" height="129">
                  </picture>
                  <span><b>{$notaPriximbattable}</b></span>
                </div>
                <div class="border-avis">
                  <picture>
                    <source srcset="/img/cms/Avis/logo-trustpilot.webp" type="image/webp">
                    <img class="img-fluid avis-img-w" loading="lazy" src="/img/cms/Avis/logo-trustpilot.png" alt="Trustpilot"
                      title="Trustpilot" width="386" height="129">
                  </picture>
                  <span><b>{$notaTrustpilot}</b></span>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4 col-sm-12 position-static">
        <div class="row">
          {hook h='displayTop'}
          <div class="clearfix"></div>
        </div>
      </div>
      <div class="col-md-2 col-sm-12 position-static hidden-md-down" style="padding-top: 20px; padding-left: 30px;">
        <div class="mon_rappel  exclusive  embedRappel">
          <div class="mon_rappel_circle">
            <picture>
              <source srcset="/img/iconscart/quest.webp" type="image/webp">
              <img loading="lazy" alt="quest" class="mon_icon" style="height: 35px; max-width: 100%;"
                src="/img/iconscart/quest.svg">
            </picture>
          </div>
          <div style="margin-top: 9px;   margin-left: 4px;">Être rappelé</div>
        </div>

        {*   <button class="mon_embedcoupon button exclusive btn embedcoupon" style="background: #4de938; ">
              Cenas gratis</button>*}
      </div>
      <div class="col-md-2 hidden-sm-down right-nav">
        <div style="margin-top: 19px; position: absolute; z-index: 2; margin-left: -10px;">
          <div class="row">
            <div class="col-md-12" style="text-align: center;" title="Liste de Souhaits">
              <a href="https://priximbattable.net/liste-de-souhaits">
                <picture>
                  {if $iswishlist}
                  <img loading="lazy" src="/img/heart_red.svg" alt="Liste de Souhaits" class="logo img-responsive phoneIcon "
                    style="height: 32px;">
                  {else}
                  <img loading="lazy" src="/img/heart.svg" alt="Liste de Souhaits" class="logo img-responsive phoneIcon "
                    style="height: 32px;">
                  {/if}
                </picture>
              </a>
            </div>
          </div>
        </div>
        <div style="margin-top: 19px; position: absolute; z-index: 2; margin-left: 37px;">
          <div class="row">
            <div class="col-md-12" style="text-align: center;"
              title="04 72 80 93 54 ou Pour nous contacter par d'autres moyens cliquez ici">
              <a href="https://priximbattable.net/service-client.php">
                <picture>
                  <source srcset="/img/phoneCall.webp" type="image/webp">
                  <img loading="lazy" src="/img/phoneCall.png" alt="" class="logo img-responsive phoneIcon" style="height: 32px;">
                </picture>
              </a>
            </div>
          </div>
        </div>
        {hook h='displayNav2'}
      </div>

    </div>
  </div>
</div>
{hook h='displayNavFullWidth'}
{* *********************************** Menu Mobile ******************************** *}



{/block}


{if {$page.page_name} == 'index'}
  {if {$smarty.now|date_format:'%Y-%m-%d'} <= "2024-08-28" } <div class="container-fluid pt-2">
    <div class="row">
      <div class="col-md-12" style="color: #FFF; text-align: center; font-weight: bold;">
        <picture class=" hidden-sm-down">
          <source srcset="/img/desktop-vacances.webp" type="image/webp">
          <img loading="lazy" src="/img/desktop-vacances.jpg" alt="vacances" title="vacances" width="1450" height="150">
        </picture>
        <picture class=" hidden-sm-up">
          <source srcset="/img/mobile-vacances.webp" type="image/webp">
          <img loading="lazy" class="img-fluid img-centre" src="/img/mobile-vacances.jpg" alt="vacances" title="vacances" width="750"
            height="150">
        </picture>
      </div>
    </div>
  {/if}

  {if {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} <= "2025-08-10 23:59:59" }
    <div class="container mt-1" style="background-color: #0ABABA; padding-top: 10px; padding-bottom: 10px;">
      <div class="row banner-notice-row">
        <div class="col-xs-12 col-md-1 text-center">
          <img loading="lazy" src="/img/icons/summer-holidays.png" alt="Vacances" class="img-fluid">
        </div>
        <div class="col-xs-12 col-md-10 text-center">
          L'équipe Priximbattable sera présente mais en effectif réduit du 11 au 15 août. Vos commandes et demandes seront traitées, mais nous vous invitons à privilégier les emails, auxquels nous répondrons dans les plus brefs délais. L'équipe reviendra à pleine capacité le 18 août. Merci de votre compréhension !
        </div>
        <div class="col-xs-12 col-md-1 text-center">
          <img loading="lazy" src="/img/icons/vacations.png" alt="Vacances" class="img-fluid">
        </div>
      </div>
    </div>
  {/if}

  <div class="container-fluid">
    <div class="container">
      <div class="row">
        <div class="col-12" id="imgBanner">

          <div id="carouselBanners" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              {$foo = 0}

              {if {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} >= "2025-02-19 00:00:00" && {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} <= "2025-02-25 23:59:59"}
                <div class="carousel-item active">
                  <a href="/pergola-bioclimatique/1379-pergola-bioclimatique-grandlux-adossee-sur-mesure.html">
                    <picture class="imgBannerDesktop">
                      <source srcset="/img/soldes/desktop-le-mois-anniversaire1.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/desktop-le-mois-anniversaire1.jpg" alt="Le mois anniversaire Priximbattable" title="Le mois anniversaire Priximbattable" width="1450" height="415">
                    </picture>
                    <picture class="imgBannerMobile">
                      <source srcset="/img/soldes/mobile-le-mois-anniversaire1.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/mobile-le-mois-anniversaire1.jpg" alt="Le mois anniversaire Priximbattable" title="Le mois anniversaire Priximbattable" width="800" height="520">
                    </picture>
                  </a>
                </div>
                {$foo = 1}
              {/if}

              {if {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} >= "2025-02-26 00:00:00" && {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} <= "2025-02-28 23:59:59"}
                <div class="carousel-item active">
                  <a href="/108-cloture-grillage-rigide-acier-panneau-soude-maille-200x55">
                    <picture class="imgBannerDesktop">
                      <source srcset="/img/soldes/desktop-le-mois-anniversaire3.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/desktop-le-mois-anniversaire3.jpg" alt="Le mois anniversaire Priximbattable" title="Le mois anniversaire Priximbattable" width="1450" height="415">
                    </picture>
                    <picture class="imgBannerMobile">
                      <source srcset="/img/soldes/mobile-le-mois-anniversaire3.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/mobile-le-mois-anniversaire3.jpg" alt="Le mois anniversaire Priximbattable" title="Le mois anniversaire Priximbattable" width="800" height="520">
                    </picture>
                  </a>
                </div>
                {$foo = 1}
              {/if}

              {if {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} >= "2025-03-01 00:00:00" && {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} <= "2025-03-11 23:59:59"}
                <div class="carousel-item active">
                  <a href="/84-abri-de-jardin">
                    <picture class="imgBannerDesktop">
                      <source srcset="/img/soldes/desktop-bom-tempo01-fr.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/desktop-bom-tempo01-fr.jpg" alt="L'arrivée des beaux jours" title="L'arrivée des beaux jours" width="1450" height="415">
                    </picture>
                    <picture class="imgBannerMobile">
                      <source srcset="/img/soldes/mobile-bom-tempo01-fr.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/mobile-bom-tempo01-fr.jpg" alt="L'arrivée des beaux jours" title="L'arrivée des beaux jours" width="800" height="520">
                    </picture>
                  </a>
                </div>
                {$foo = 1}
              {/if}

              {if {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} >= "2025-03-12 00:00:00" && {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} <= "2025-03-18 23:59:59"}
                <div class="carousel-item active">
                  <a href="/abri-de-voiture/640251-carport-aluminium-toit-plat-adosse-sur-mesure.html">
                    <picture class="imgBannerDesktop">
                      <source srcset="/img/soldes/bom-tempo02-desktop-fr.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/bom-tempo02-desktop-fr.jpg" alt="L'arrivée des beaux jours" title="L'arrivée des beaux jours" width="1450" height="415">
                    </picture>
                    <picture class="imgBannerMobile">
                      <source srcset="/img/soldes/bom-tempo02-mobile-fr.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/bom-tempo02-mobile-fr.jpg" alt="L'arrivée des beaux jours" title="L'arrivée des beaux jours" width="800" height="520">
                    </picture>
                  </a>
                </div>
                {$foo = 1}
              {/if}

              {if {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} >= "2025-03-19 00:00:00" && {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} <= "2025-03-25 23:59:59"}
                <div class="carousel-item active">
                  <a href="/pergola-bioclimatique/640147-pergola-bioclimatique-easy-adossee-sur-mesure.html">
                    <picture class="imgBannerDesktop">
                      <source srcset="/img/soldes/bom-tempo-3-desktop-fr.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/bom-tempo-3-desktop-fr.jpg" alt="L'arrivée des beaux jours" title="L'arrivée des beaux jours" width="1450" height="415">
                    </picture>
                    <picture class="imgBannerMobile">
                      <source srcset="/img/soldes/bom-tempo-3-mobile-fr.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/bom-tempo-3-mobile-fr.jpg" alt="L'arrivée des beaux jours" title="L'arrivée des beaux jours" width="800" height="520">
                    </picture>
                  </a>
                </div>
                {$foo = 1}
              {/if}

              {if {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} >= "2025-03-26 00:00:00" && {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} <= "2025-04-01 23:59:59"}
                <div class="carousel-item active">
                  <a href="/56-portail-aluminium-coulissant-sur-mesure">
                    <picture class="imgBannerDesktop">
                      <source srcset="/img/soldes/primavera04-desktop-fr.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/primavera04-desktop-fr.jpg" alt="L'arrivée des beaux jours" title="L'arrivée des beaux jours" width="1500" height="430">
                    </picture>
                    <picture class="imgBannerMobile">
                      <source srcset="/img/soldes/primavera04-mobile-fr.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/primavera04-mobile-fr.jpg" alt="L'arrivée des beaux jours" title="L'arrivée des beaux jours" width="800" height="520">
                    </picture>
                  </a>
                </div>
                {$foo = 1}
              {/if}

              {if {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} >= "2025-04-02 00:00:00" && {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} <= "2025-04-08 23:59:59"}
                <div class="carousel-item active">
                  <a href="/35-pergola-bioclimatique">
                    <picture class="imgBannerDesktop">
                      <source srcset="/img/soldes/primavera-abril-01-desktop-fr.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/primavera-abril-01-desktop-fr.jpg" alt="Printanières" title="Printanières" width="1450" height="415">
                    </picture>
                    <picture class="imgBannerMobile">
                      <source srcset="/img/soldes/primavera-abril-01-mobile-fr.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/primavera-abril-01-mobile-fr.jpg" alt="Printanières" title="Printanières" width="800" height="520">
                    </picture>
                  </a>
                </div>
                {$foo = 1}
              {/if}

              {if {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} >= "2025-04-09 00:00:00" && {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} <= "2025-04-15 23:59:59"}
                <div class="carousel-item active">
                  <a href="/abri-de-voiture/640251-carport-aluminium-toit-plat-adosse-sur-mesure.html">
                    <picture class="imgBannerDesktop">
                      <source srcset="/img/soldes/primavera-abril-02-desktop-fr.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/primavera-abril-02-desktop-fr.jpg" alt="Printanières" title="Printanières" width="1450" height="415">
                    </picture>
                    <picture class="imgBannerMobile">
                      <source srcset="/img/soldes/primavera-abril-02-mobile-fr.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/primavera-abril-02-mobile-fr.jpg" alt="Printanières" title="Printanières" width="800" height="520">
                    </picture>
                  </a>
                </div>
                {$foo = 1}
              {/if}

              {if {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} >= "2025-04-16 00:00:00" && {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} <= "2025-04-22 23:59:59"}
                <div class="carousel-item active">
                  <a href="/111-porte-d-entree-tierce-vitree">
                    <picture class="imgBannerDesktop">
                      <source srcset="/img/soldes/desktop-printanieres-porte.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/desktop-printanieres-porte.jpg" alt="Printanières" title="Printanières" width="1450" height="415">
                    </picture>
                    <picture class="imgBannerMobile">
                      <source srcset="/img/soldes/mobile-printanieres-porte.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/mobile-printanieres-porte.jpg" alt="Printanières" title="Printanières" width="800" height="520">
                    </picture>
                  </a>
                </div>
                {$foo = 1}
              {/if}

              {if {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} >= "2025-04-23 00:00:00" && {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} <= "2025-04-29 23:59:59"}
                <div class="carousel-item active">
                  <a href="/44-baie-coulissante-aluminium-sur-mesure">
                    <picture class="imgBannerDesktop">
                      <source srcset="/img/soldes/desktop-offres-printanieres-baie-coulissante.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/desktop-offres-printanieres-baie-coulissante.jpg" alt="Printanières" title="Printanières" width="1450" height="415">
                    </picture>
                    <picture class="imgBannerMobile">
                      <source srcset="/img/soldes/mobile-offres-printanieres-baie-coulissante.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/mobile-offres-printanieres-baie-coulissante.jpg" alt="Printanières" title="Printanières" width="800" height="520">
                    </picture>
                  </a>
                </div>
                {$foo = 1}
              {/if}

              {if {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} >= "2025-04-30 00:00:00" && {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} <= "2025-05-06 23:59:59"}
                <div class="carousel-item active">
                  <a href="/50-portail">
                    <picture class="imgBannerDesktop">
                      <source srcset="/img/soldes/desktop-french-days-priximbattable.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/desktop-french-days-priximbattable.jpg" alt="Les French Days" title="Les French Days" width="1450" height="415">
                    </picture>
                    <picture class="imgBannerMobile">
                      <source srcset="/img/soldes/mobile-french-days-priximbattable.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/mobile-french-days-priximbattable.jpg" alt="Les French Days" title="Les French Days" width="800" height="520">
                    </picture>
                  </a>
                </div>
                {$foo = 1}
              {/if}

              {if {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} >= "2025-05-07 00:00:00" && {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} <= "2025-05-13 23:59:59"}
                <div class="carousel-item active">
                  <a href="/35-pergola-bioclimatique">
                    <picture class="imgBannerDesktop">
                      <source srcset="/img/soldes/anticipez-lete01-desktop-fr.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/anticipez-lete01-desktop-fr.jpg" alt="Anticipez l'été avec style et confort !" title="Anticipez l'été avec style et confort !" width="1450" height="415">
                    </picture>
                    <picture class="imgBannerMobile">
                      <source srcset="/img/soldes/anticipez-lete01-mobile-fr.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/anticipez-lete01-mobile-fr.jpg" alt="Anticipez l'été avec style et confort !" title="Anticipez l'été avec style et confort !" width="800" height="520">
                    </picture>
                  </a>
                </div>
                {$foo = 1}
              {/if}

              {if {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} >= "2025-05-14 00:00:00" && {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} <= "2025-05-20 23:59:59"}
                <div class="carousel-item active">
                  <a href="https://priximbattable.net/abri-de-voiture/640251-carport-aluminium-toit-plat-adosse-sur-mesure.html">
                    <picture class="imgBannerDesktop">
                      <source srcset="/img/soldes/desktop-anticipez-lete-avec-style-et-confort-1.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/desktop-anticipez-lete-avec-style-et-confort-1.jpg" alt="Anticipez l'été avec style et confort !" title="Anticipez l'été avec style et confort !" width="1450" height="415">
                    </picture>
                    <picture class="imgBannerMobile">
                      <source srcset="/img/soldes/mobile-anticipez-lete-avec-style-et-confort-1.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/mobile-anticipez-lete-avec-style-et-confort-1.jpg" alt="Anticipez l'été avec style et confort !" title="Anticipez l'été avec style et confort !" width="800" height="520">
                    </picture>
                  </a>
                </div>
                {$foo = 1}
              {/if}

              {if {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} >= "2025-05-21 00:00:00" && {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} <= "2025-05-27 23:59:59"}
                <div class="carousel-item active">
                  <a href="/32-porte-d-entree-aluminium">
                    <picture class="imgBannerDesktop">
                      <source srcset="/img/soldes/desktop-essential-maio-FR.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/desktop-essential-maio-FR.jpg" alt="Nos immanquables du mois de mai" title="Nos immanquables du mois de mai" width="1450" height="415">
                    </picture>
                    <picture class="imgBannerMobile">
                      <source srcset="/img/soldes/mobile-essential-maio-FR.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/mobile-essential-maio-FR.jpg" alt="Nos immanquables du mois de mai" title="Nos immanquables du mois de mai" width="800" height="520">
                    </picture>
                  </a>
                </div>
                {$foo = 1}
              {/if}

              {if {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} >= "2025-05-28 00:00:00" && {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} <= "2025-06-03 23:59:59"}
                <div class="carousel-item active">
                  <a href="/abri-de-voiture/367-carport-aluminium-cintre-camping-car-blanc-ou-gris-3620x7600x3600-mm.html">
                    <picture class="imgBannerDesktop">
                      <source srcset="/img/soldes/maio-04-desktop-fr.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/maio-04-desktop-fr.jpg" alt="Nos immanquables du mois de mai" title="Nos immanquables du mois de mai" width="1450" height="415">
                    </picture>
                    <picture class="imgBannerMobile">
                      <source srcset="/img/soldes/maio-04-mobile-fr.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/maio-04-mobile-fr.jpg" alt="Nos immanquables du mois de mai" title="Nos immanquables du mois de mai" width="800" height="520">
                    </picture>
                  </a>
                </div>
                {$foo = 1}
              {/if}

              {if {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} >= "2025-06-04 00:00:00" && {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} <= "2025-06-10 23:59:59"}
                <div class="carousel-item active">
                  <a href="/117-cloture-grillage-rigide-pro-acier-panneau-soude-maille-200x55-fil-de-5mm">
                    <picture class="imgBannerDesktop">
                      <source srcset="/img/soldes/jun-02-desktop-fr.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/jun-02-desktop-fr.jpg" alt="Vos projets d'extérieur à prix léger" title="Vos projets d'extérieur à prix léger" width="1450" height="415">
                    </picture>
                    <picture class="imgBannerMobile">
                      <source srcset="/img/soldes/jun-02-mobile-fr.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/jun-02-mobile-fr.jpg" alt="Vos projets d'extérieur à prix léger" title="Vos projets d'extérieur à prix léger" width="800" height="520">
                    </picture>
                  </a>
                </div>
                {$foo = 1}
              {/if}

              {if {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} >= "2025-06-11 00:00:00" && {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} <= "2025-06-17 23:59:59"}
                <div class="carousel-item active">
                  <a href="/56-portail-aluminium-coulissant-sur-mesure">
                    <picture class="imgBannerDesktop">
                      <source srcset="/img/soldes/jun-03-desktop-fr.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/jun-03-desktop-fr.jpg" alt="Vos projets d'extérieur à prix léger" title="Vos projets d'extérieur à prix léger" width="1450" height="415">
                    </picture>
                    <picture class="imgBannerMobile">
                      <source srcset="/img/soldes/jun-03-mobile-fr.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/jun-03-mobile-fr.jpg" alt="Vos projets d'extérieur à prix léger" title="Vos projets d'extérieur à prix léger" width="800" height="520">
                    </picture>
                  </a>
                </div>
                {$foo = 1}
              {/if}

              {if {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} >= "2025-06-18 00:00:00" && {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} <= "2025-06-24 23:59:59"}
                <div class="carousel-item active">
                  <a href="/35-pergola-bioclimatique">
                    <picture class="imgBannerDesktop">
                      <source srcset="/img/soldes/desktop-projets-prix-leger.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/desktop-projets-prix-leger.jpg" alt="Vos projets d'extérieur à prix léger!" title="Vos projets d'extérieur à prix léger!" width="1450" height="415">
                    </picture>
                    <picture class="imgBannerMobile">
                      <source srcset="/img/soldes/mobile-projets-prix-leger.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/mobile-projets-prix-leger.jpg" alt="Vos projets d'extérieur à prix léger!" title="Vos projets d'extérieur à prix léger!" width="800" height="520">
                    </picture>
                  </a>
                </div>
                {$foo = 1}
              {/if}

              {if {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} >= "2025-06-25 00:00:00" && {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} <= "2025-07-01 23:59:59"}
                <div class="carousel-item active">
                  <a href="/51-portail-aluminium-battant">
                    <picture class="imgBannerDesktop">
                      <source srcset="/img/soldes/desktop-prix-caniculaires.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/desktop-prix-caniculaires.jpg" alt="Prix Caniculaires" title="Prix Caniculaires" width="1450" height="415">
                    </picture>
                    <picture class="imgBannerMobile">
                      <source srcset="/img/soldes/mobile-prix-caniculaires.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/mobile-prix-caniculaires.jpg" alt="Prix Caniculaires" title="Prix Caniculaires" width="800" height="520">
                    </picture>
                  </a>
                </div>
                {$foo = 1}
              {/if}

              {if {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} >= "2025-07-02 00:00:00" && {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} <= "2025-07-08 23:59:59"}
                <div class="carousel-item active">
                  <a href="/abri-de-voiture/640251-carport-aluminium-toit-plat-adosse-sur-mesure.html">
                    <picture class="imgBannerDesktop">
                      <source srcset="/img/soldes/desktop-chaleur-ecrasante-remises-renversantes.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/desktop-chaleur-ecrasante-remises-renversantes.jpg" alt="Chaleur écrasante, remises renversantes!" title="Chaleur écrasante, remises renversantes!" width="1450" height="415">
                    </picture>
                    <picture class="imgBannerMobile">
                      <source srcset="/img/soldes/mobile-chaleur-ecrasante-remises-renversantes.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/mobile-chaleur-ecrasante-remises-renversantes.jpg" alt="Chaleur écrasante, remises renversantes!" title="Chaleur écrasante, remises renversantes!" width="800" height="520">
                    </picture>
                  </a>
                </div>
                {$foo = 1}
              {/if}

              {if {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} >= "2025-07-09 00:00:00" && {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} <= "2025-07-15 23:59:59"}
                <div class="carousel-item active">
                  <a href="/11-porte-d-entree">
                    <picture class="imgBannerDesktop">
                      <source srcset="/img/soldes/desktop-chaleur-ecrasante-remises-renversantes1.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/desktop-chaleur-ecrasante-remises-renversantes1.jpg" alt="Chaleur écrasante, remises renversantes!" title="Chaleur écrasante, remises renversantes!" width="1450" height="415">
                    </picture>
                    <picture class="imgBannerMobile">
                      <source srcset="/img/soldes/mobile-chaleur-ecrasante-remises-renversantes1.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/mobile-chaleur-ecrasante-remises-renversantes1.jpg" alt="Chaleur écrasante, remises renversantes!" title="Chaleur écrasante, remises renversantes!" width="800" height="520">
                    </picture>
                  </a>
                </div>
                {$foo = 1}
              {/if}

              {if {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} >= "2025-07-16 00:00:00" && {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} <= "2025-07-22 23:59:59"}
                <div class="carousel-item active">
                  <a href="/52-portail-aluminium-coulissant">
                    <picture class="imgBannerDesktop">
                      <source srcset="/img/soldes/desktop-chaleur-ecrasante-remises-renversantes2.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/desktop-chaleur-ecrasante-remises-renversantes2.jpg" alt="Chaleur écrasante, remises renversantes!" title="Chaleur écrasante, remises renversantes!" width="1450" height="415">
                    </picture>
                    <picture class="imgBannerMobile">
                      <source srcset="/img/soldes/mobile-chaleur-ecrasante-remises-renversantes2.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/mobile-chaleur-ecrasante-remises-renversantes2.jpg" alt="Chaleur écrasante, remises renversantes!" title="Chaleur écrasante, remises renversantes!" width="800" height="520">
                    </picture>
                  </a>
                </div>
                {$foo = 1}
              {/if}

              {if {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} >= "2025-07-23 00:00:00" && {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} <= "2025-07-29 23:59:59"}
                <div class="carousel-item active">
                  <a href="/35-pergola-bioclimatique">
                    <picture class="imgBannerDesktop">
                      <source srcset="/img/soldes/desktop-chaleur-ecrasante-remises-renversantes3.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/desktop-chaleur-ecrasante-remises-renversantes3.jpg" alt="Chaleur écrasante, remises renversantes!" title="Chaleur écrasante, remises renversantes!" width="1450" height="415">
                    </picture>
                    <picture class="imgBannerMobile">
                      <source srcset="/img/soldes/mobile-chaleur-ecrasante-remises-renversantes3.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/mobile-chaleur-ecrasante-remises-renversantes3.jpg" alt="Chaleur écrasante, remises renversantes!" title="Chaleur écrasante, remises renversantes!" width="800" height="520">
                    </picture>
                  </a>
                </div>
                {$foo = 1}
              {/if}

              {if {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} >= "2025-07-30 00:00:00" && {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} <= "2025-08-05 23:59:59"}
                <div class="carousel-item active">
                  <a href="/44-baie-coulissante-aluminium-sur-mesure">
                    <picture class="imgBannerDesktop">
                      <source srcset="/img/soldes/desktop-prix-caniculaires.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/desktop-prix-caniculaires.jpg" alt="Prix caniculaires" title="Prix caniculaires" width="1450" height="415">
                    </picture>
                    <picture class="imgBannerMobile">
                      <source srcset="/img/soldes/mobile-prix-caniculaires.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/mobile-prix-caniculaires.jpg" alt="Prix caniculaires" title="Prix caniculaires" width="800" height="520">
                    </picture>
                  </a>
                </div>
                {$foo = 1}
              {/if}

              {if {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} >= "2025-08-06 00:00:00" && {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} <= "2025-08-12 23:59:59"}
                <div class="carousel-item active">
                  <a href="/55-portail-aluminium-battant-sur-mesure">
                    <picture class="imgBannerDesktop">
                      <source srcset="/img/soldes/desktop-prix-caniculaires-1.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/desktop-prix-caniculaires-1.jpg" alt="Prix caniculaires" title="Prix caniculaires" width="1450" height="415">
                    </picture>
                    <picture class="imgBannerMobile">
                      <source srcset="/img/soldes/mobile-prix-caniculaires-1.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/mobile-prix-caniculaires-1.jpg" alt="Prix caniculaires" title="Prix caniculaires" width="800" height="520">
                    </picture>
                  </a>
                </div>
                {$foo = 1}
              {/if}

              {if {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} >= "2025-08-13 00:00:00" && {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} <= "2025-08-19 23:59:59"}
                <div class="carousel-item active">
                  <a href="/24-porte-de-garage-sectionnelle-40-mme">
                    <picture class="imgBannerDesktop">
                      <source srcset="/img/soldes/desktop-prix-caniculaires-2.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/desktop-prix-caniculaires-2.jpg" alt="Prix caniculaires" title="Prix caniculaires" width="1450" height="415">
                    </picture>
                    <picture class="imgBannerMobile">
                      <source srcset="/img/soldes/mobile-prix-caniculaires-2.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/mobile-prix-caniculaires-2.jpg" alt="Prix caniculaires" title="Prix caniculaires" width="800" height="520">
                    </picture>
                  </a>
                </div>
                {$foo = 1}
              {/if}

              {if {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} >= "2025-08-20 00:00:00" && {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} <= "2025-08-21 23:59:59"}
                <div class="carousel-item active">
                  <a href="/51-portail-aluminium-battant">
                    <picture class="imgBannerDesktop">
                      <source srcset="/img/soldes/desktop-prix-caniculaires-3.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/desktop-prix-caniculaires-3.jpg" alt="Prix caniculaires" title="Prix caniculaires" width="1450" height="415">
                    </picture>
                    <picture class="imgBannerMobile">
                      <source srcset="/img/soldes/mobile-prix-caniculaires-3.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/mobile-prix-caniculaires-3.jpg" alt="Prix caniculaires" title="Prix caniculaires" width="800" height="520">
                    </picture>
                  </a>
                </div>
                {$foo = 1}
              {/if}

              {if {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} >= "2025-08-22 00:00:00" && {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} <= "2025-09-02 23:59:59"}
                <div class="carousel-item active">
                  <a href="/51-portail-aluminium-battant">
                    <picture class="imgBannerDesktop">
                      <source srcset="/img/soldes/desktop-prix-caniculaires-4.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/desktop-prix-caniculaires-4.jpg" alt="Prix caniculaires" title="Prix caniculaires" width="1450" height="415">
                    </picture>
                    <picture class="imgBannerMobile">
                      <source srcset="/img/soldes/mobile-prix-caniculaires-4.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/mobile-prix-caniculaires-4.jpg" alt="Prix caniculaires" title="Prix caniculaires" width="800" height="520">
                    </picture>
                  </a>
                </div>
                {$foo = 1}
              {/if}

              {if {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} >= "2025-09-03 00:00:00" && {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} <= "2025-09-09 23:59:59"}
                <div class="carousel-item active">
                  <a href="/24-porte-de-garage-sectionnelle-40-mm">
                    <picture class="imgBannerDesktop">
                      <source srcset="/img/soldes/desktop-offres-septembre.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/desktop-offres-septembre.jpg" alt="Offres Septembre" title="Offres Septembre" width="1450" height="415">
                    </picture>
                    <picture class="imgBannerMobile">
                      <source srcset="/img/soldes/mobile-offres-septembre.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/mobile-offres-septembre.jpg" alt="Offres Septembre" title="Offres Septembre" width="800" height="520">
                    </picture>
                  </a>
                </div>
                {$foo = 1}
              {/if}

              {if {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} >= "2025-09-10 00:00:00" && {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} <= "2025-09-16 23:59:59"}
                <div class="carousel-item active">
                  <a href="/117-cloture-grillage-rigide-pro-acier-panneau-soude-maille-200x55-fil-de-5mm">
                    <picture class="imgBannerDesktop">
                      <source srcset="/img/soldes/desktop-grade-fr.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/desktop-grade-fr.jpg" alt="Offres Septembre" title="Offres Septembre" width="1450" height="415">
                    </picture>
                    <picture class="imgBannerMobile">
                      <source srcset="/img/soldes/mobile-grade-fr.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/mobile-grade-fr.jpg" alt="Offres Septembre" title="Offres Septembre" width="800" height="520">
                    </picture>
                  </a>
                </div>
                {$foo = 1}
              {/if}

              {if {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} >= "2025-09-17 00:00:00" && {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} <= "2025-09-23 23:59:59"}
                <div class="carousel-item active">
                  <a href="/20-cloture-aluminium">
                    <picture class="imgBannerDesktop">
                      <source srcset="/img/soldes/cloture-setembro-desktop-fr.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/cloture-setembro-desktop-fr.jpg" alt="Offres Septembre" title="Offres Septembre" width="1450" height="415">
                    </picture>
                    <picture class="imgBannerMobile">
                      <source srcset="/img/soldes/cloture-setembro-mobile-fr.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/cloture-setembro-mobile-fr.jpg" alt="Offres Septembre" title="Offres Septembre" width="800" height="520">
                    </picture>
                  </a>
                </div>
                {$foo = 1}
              {/if}

              {if {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} >= "2025-09-24 00:00:00" && {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} <= "2025-09-30 23:59:59"}
                <div class="carousel-item active">
                  <a href="/56-portail-aluminium-coulissant-sur-mesure">
                    <picture class="imgBannerDesktop">
                      <source srcset="/img/soldes/portao-dortmund-desktop-fr.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/portao-dortmund-desktop-fr.jpg" alt="Sécurité et design au meilleur prix" title="Sécurité et design au meilleur prix" width="1450" height="415">
                    </picture>
                    <picture class="imgBannerMobile">
                      <source srcset="/img/soldes/portao-dortmund-mobile-fr.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/portao-dortmund-mobile-fr.jpg" alt="Sécurité et design au meilleur prix" title="Sécurité et design au meilleur prix" width="800" height="520">
                    </picture>
                  </a>
                </div>
                {$foo = 1}
              {/if}

              {if {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} >= "2025-10-01 00:00:00" && {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} <= "2025-10-07 23:59:59"}
                <div class="carousel-item active">
                  <a href="/32-porte-d-entree-aluminium">
                    <picture class="imgBannerDesktop">
                      <source srcset="/img/soldes/porta-caprera-desktop-fr.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/porta-caprera-desktop-fr.jpg" alt="Nos offres cocooning" title="Nos offres cocooning" width="1450" height="415">
                    </picture>
                    <picture class="imgBannerMobile">
                      <source srcset="/img/soldes/porta-caprera-mobile-fr.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/porta-caprera-mobile-fr.jpg" alt="Nos offres cocooning" title="Nos offres cocooning" width="800" height="520">
                    </picture>
                  </a>
                </div>
                {$foo = 1}
              {/if}

              {if {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} >= "2025-10-08 00:00:00" && {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} <= "2025-10-14 23:59:59"}
                <div class="carousel-item active">
                  <a href="/84-abri-de-jardin">
                    <picture class="imgBannerDesktop">
                      <source srcset="/img/soldes/abrigo-desktop-fr.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/abrigo-desktop-fr.jpg" alt="Nos offres cocooning" title="Nos offres cocooning" width="1450" height="415">
                    </picture>
                    <picture class="imgBannerMobile">
                      <source srcset="/img/soldes/abrigo-mobile-fr.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/abrigo-mobile-fr.jpg" alt="Nos offres cocooning" title="Nos offres cocooning" width="800" height="520">
                    </picture>
                  </a>
                </div>
                {$foo = 1}
              {/if}

              {if {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} >= "2025-10-15 00:00:00" && {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} <= "2025-10-21 23:59:59"}
                <div class="carousel-item active">
                  <a href="/83-abri-de-voiture">
                    <picture class="imgBannerDesktop">
                      <source srcset="/img/soldes/desktop-nos-offres-cocooning.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/desktop-nos-offres-cocooning.jpg" alt="Nos offres cocooning" title="Nos offres cocooning" width="1450" height="415">
                    </picture>
                    <picture class="imgBannerMobile">
                      <source srcset="/img/soldes/mobile-nos-offres-cocooning.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/mobile-nos-offres-cocooning.jpg" alt="Nos offres cocooning" title="Nos offres cocooning" width="800" height="520">
                    </picture>
                  </a>
                </div>
                {$foo = 1}
              {/if}

              {if {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} >= "2025-10-22 00:00:00" && {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} <= "2025-10-28 23:59:59"}
                <div class="carousel-item active">
                  <a href="/55-portail-aluminium-battant-sur-mesure">
                    <picture class="imgBannerDesktop">
                      <source srcset="/img/soldes/portao-dallas-desktop-fr.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/portao-dallas-desktop-fr.jpg" alt="Nos offres cocooning" title="Nos offres cocooning" width="1450" height="415">
                    </picture>
                    <picture class="imgBannerMobile">
                      <source srcset="/img/soldes/portao-dallas-mobile-fr.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/portao-dallas-mobile-fr.jpg" alt="Nos offres cocooning" title="Nos offres cocooning" width="800" height="520">
                    </picture>
                  </a>
                </div>
                {$foo = 1}
              {/if}

              {if {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} >= "2025-10-29 00:00:00" && {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} <= "2025-10-31 23:59:59"}
                <div class="carousel-item active">
                  <a href="/44-baie-coulissante-aluminium-sur-mesure">
                    <picture class="imgBannerDesktop">
                      <source srcset="/img/soldes/porta-janela-desktop-fr.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/porta-janela-desktop-fr.jpg" alt="Nos offres cocooning" title="Nos offres cocooning" width="1450" height="415">
                    </picture>
                    <picture class="imgBannerMobile">
                      <source srcset="/img/soldes/porta-janela-mobile-fr.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/porta-janela-mobile-fr.jpg" alt="Nos offres cocooning" title="Nos offres cocooning" width="800" height="520">
                    </picture>
                  </a>
                </div>
                {$foo = 1}
              {/if}

              {if {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} >= "2025-11-01 00:00:00" && {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} <= "2025-11-11 23:59:59"}
                <div class="carousel-item active">
                  <a href="/26-porte-de-garage-enroulable-motorisee">
                    <picture class="imgBannerDesktop">
                      <source srcset="/img/soldes/black-november-desktop-fr.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/black-november-desktop-fr.jpg" alt="Black Novembre" title="Black Novembre" width="1450" height="415">
                    </picture>
                    <picture class="imgBannerMobile">
                      <source srcset="/img/soldes/black-november-mobile-fr.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/black-november-mobile-fr.jpg" alt="Black Novembre" title="Black Novembre" width="800" height="520">
                    </picture>
                  </a>
                </div>
                {$foo = 1}
              {/if}

              {if {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} >= "2025-11-12 00:00:00" && {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} <= "2025-11-18 23:59:59"}
                <div class="carousel-item active">
                  <a href="/portail-aluminium-battant-sur-mesure/6253-portail-dallas-battant-sur-mesure-a-motoriser.html">
                    <picture class="imgBannerDesktop">
                      <source srcset="/img/soldes/black-november-desktop02-fr.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/black-november-desktop02-fr.jpg" alt="Black Novembre" title="Black Novembre" width="1450" height="415">
                    </picture>
                    <picture class="imgBannerMobile">
                      <source srcset="/img/soldes/black-november-mobile02-fr.webp" type="image/webp">
                      <img loading="lazy" src="/img/soldes/black-november-mobile02-fr.jpg" alt="Black Novembre" title="Black Novembre" width="800" height="520">
                    </picture>
                  </a>
                </div>
                {$foo = 1}
              {/if}

              {if {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} >= "2022-02-16 00:00:00" && {$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'} <= "2025-12-31 23:59:58" }
                <div class="carousel-item {if $foo == 0 }active{/if}">
                  <div class="banner-container-video-shorts">
                    <a href="https://www.youtube.com/shorts/dwyIuI38f9U" target="_blank">
                      <div class="hover-slice"><i class="material-icons">play_circle_filled</i></div>
                      <source srcset="/img/video-shorts/1.webp" type="image/webp">
                      <img loading="lazy" src="/img/video-shorts/1.jpg" alt="Video Shorts" title="Video Shorts" width="351" height="415">
                    </a>

                    <a href="https://www.youtube.com/shorts/3zjkKBuiMug" target="_blank">
                      <div class="hover-slice"><i class="material-icons">play_circle_filled</i></div>
                      <source srcset="/img/video-shorts/2.webp" type="image/webp">
                      <img loading="lazy" src="/img/video-shorts/2.jpg" alt="Video Shorts" title="Video Shorts" width="351" height="415">
                    </a>

                    <a href="https://www.youtube.com/shorts/K6zqo89hOCs" target="_blank">
                      <div class="hover-slice"><i class="material-icons">play_circle_filled</i></div>
                      <source srcset="/img/video-shorts/3.webp" type="image/webp">
                      <img loading="lazy" src="/img/video-shorts/3.jpg" alt="Video Shorts" title="Video Shorts" width="351" height="415">
                    </a>

                    <a href="https://www.youtube.com/shorts/SfZHluCXRCI" target="_blank">
                      <div class="hover-slice"><i class="material-icons">play_circle_filled</i></div>
                      <source srcset="/img/video-shorts/4.webp" type="image/webp">
                      <img loading="lazy" src="/img/video-shorts/4.jpg" alt="Video Shorts" title="Video Shorts" width="351" height="415">
                    </a>

                    <a href="https://www.youtube.com/shorts/oQ7mipSvNdo" target="_blank">
                      <div class="hover-slice"><i class="material-icons">play_circle_filled</i></div>
                      <source srcset="/img/video-shorts/5.webp" type="image/webp">
                      <img loading="lazy" src="/img/video-shorts/5.jpg" alt="Video Shorts" title="Video Shorts" width="351" height="415">
                    </a>

                    <a href="https://www.youtube.com/shorts/D2_g89TfSFo" target="_blank">
                      <div class="hover-slice"><i class="material-icons">play_circle_filled</i></div>
                      <source srcset="/img/video-shorts/6.webp" type="image/webp">
                      <img loading="lazy" src="/img/video-shorts/6.jpg" alt="Video Shorts" title="Video Shorts" width="351" height="415">
                    </a>

                    <a href="https://www.youtube.com/shorts/98wUyAtVLH4" target="_blank">
                      <div class="hover-slice"><i class="material-icons">play_circle_filled</i></div>
                      <source srcset="/img/video-shorts/7.webp" type="image/webp">
                      <img loading="lazy" src="/img/video-shorts/7.jpg" alt="Video Shorts" title="Video Shorts" width="351" height="415">
                    </a>

                    <a href="https://www.youtube.com/shorts/ZIw98PvQD9M" target="_blank">
                      <div class="hover-slice"><i class="material-icons">play_circle_filled</i></div>
                      <source srcset="/img/video-shorts/8.webp" type="image/webp">
                      <img loading="lazy" src="/img/video-shorts/8.jpg" alt="Video Shorts" title="Video Shorts" width="351" height="415">
                    </a>

                    <a href="https://www.youtube.com/shorts/vIFzi0bgV2M" target="_blank">
                      <div class="hover-slice"><i class="material-icons">play_circle_filled</i></div>
                      <source srcset="/img/video-shorts/9.webp" type="image/webp">
                      <img loading="lazy" src="/img/video-shorts/9.jpg" alt="Video Shorts" title="Video Shorts" width="351" height="415">
                    </a>

                    <a href="https://www.youtube.com/shorts/Gxnd_mNbum4" target="_blank">
                      <div class="hover-slice"><i class="material-icons">play_circle_filled</i></div>
                      <source srcset="/img/video-shorts/10.webp" type="image/webp">
                      <img loading="lazy" src="/img/video-shorts/10.jpg" alt="Video Shorts" title="Video Shorts" width="351" height="415">
                    </a>
                  </div>

                  <a href="https://youtube.com/@priximbattable-net/shorts" target="_blank" rel="noopener noreferrer">
                    <picture class="imgBannerMobile">
                      <source srcset="/img/video-shorts/mobile.webp" type="image/webp">
                      <img loading="lazy" src="/img/video-shorts/mobile.jpg" alt="Video Shorts" title="Video Shorts" width="331" height="215">
                    </picture>
                  </a>
                </div>

                <div class="carousel-item">
                  <a class="embedAluclass" data-watch="7e6dZcSoBKg">
                    <picture class="imgBannerDesktop">
                      <source srcset="/img/cms/home/desktopfabricant1.webp" type="image/webp">
                      <img loading="lazy" src="/img/cms/home/desktopfabricant1.jpg" alt="Notre processus de fabrication" title="Notre processus de fabrication" width="1450" height="415">
                    </picture>
                    <picture
                      class="imgBannerMobile">
                      <source srcset="/img/cms/home/mobilefabricant1.webp" type="image/webp">
                      <img loading="lazy" src="/img/cms/home/mobilefabricant1.jpg" alt="Notre processus de fabrication" title="Notre processus de fabrication" width="331" height="215">
                    </picture>
                  </a>
                </div>

                <div class="carousel-item">
                  <a href="/content/32-fabricant" target="_blank">
                    <picture class="imgBannerDesktop">
                      <source srcset="/img/cms/home/desktopfabricant2.webp" type="image/webp">
                      <img loading="lazy" src="/img/cms/home/desktopfabricant2.jpg" alt="Notre processus de fabrication" title="Notre processus de fabrication" width="1450" height="415">
                    </picture>
                    <picture class="imgBannerMobile">
                      <source srcset="/img/cms/home/mobilefabricant2.webp" type="image/webp">
                      <img loading="lazy" src="/img/cms/home/mobilefabricant2.jpg" alt="Notre processus de fabrication" title="Notre processus de fabrication" width="331" height="215">
                    </picture>
                  </a>
                </div>

                <div class="carousel-item">
                  <span class="embedAluclass" data-watch="XeaufyZmtMg">
                    <picture class="imgBannerDesktop">
                      <source srcset="/img/desktop-equipe.webp" type="image/webp">
                      <img loading="lazy" src="/img/desktop-equipe.jpg" alt="Notre Equipe" title="Notre Equipe" width="1450" height="415">
                    </picture>
                    <picture class="imgBannerMobile">
                      <source srcset="/img/mobile-equipe.webp" type="image/webp">
                      <img loading="lazy" src="/img/mobile-equipe.png" alt="Notre Equipe" title="Notre Equipe" width="331" height="215">
                    </picture>
                  </span>
                </div>

                <!--<div class="carousel-item {if $foo == 0 }active{/if}">
                  <span class="embedAluclass" data-watch="XeaufyZmtMg">
                    <picture class="imgBannerDesktop">
                      <source srcset="/img/desktop-equipe.webp" type="image/webp">
                      <img loading="lazy" src="/img/desktop-equipe.jpg" alt="Notre Equipe" title="Notre Equipe">
                    </picture>
                    <picture class="imgBannerMobile">
                      <source srcset="/img/mobile-equipe.webp" type="image/webp">
                      <img loading="lazy" src="/img/mobile-equipe.png" alt="Notre Equipe" title="Notre Equipe">
                    </picture>
                  </span>
                </div>-->

                <!--<div class="carousel-item">
                  <a href="/50-portail" target="_blank">
                    <picture class="imgBannerDesktop">
                      <source
                        srcset="/img/soldes/DesktopFR_PortaoOfertasEspeciais2.webp"
                        type="image/webp">
                      <img loading="lazy" src="/img/soldes/DesktopFR_PortaoOfertasEspeciais2.jpg"
                        alt="Les offres spéciales : -50% sur les automatismes de portail"
                        title="Les offres spéciales : -50% sur les automatismes de portail">
                    </picture>
                    <picture class="imgBannerMobile">
                      <source
                        srcset="/img/soldes/MobileFR_PortaoOfertaEspecial2.webp"
                        type="image/webp">
                      <img loading="lazy" src="/img/soldes/MobileFR_PortaoOfertaEspecial2.jpg"
                        alt="Les offres spéciales : -50% sur les automatismes de portail"
                        title="Les offres spéciales : -50% sur les automatismes de portail">
                    </picture>
                  </a>
                </div>-->

                <!--<div class="carousel-item">
                  <a href="/6-cloture" target="_blank">
                    <picture class="imgBannerDesktop">
                      <source
                        srcset="/img/soldes/DesktopFR_GradesOfertasEspeciais2.webp"
                        type="image/webp">
                      <img loading="lazy" src="/img/soldes/DesktopFR_GradesOfertasEspeciais2.jpg"
                        alt="Les offres spéciales : -50% sur le kit d'occultation"
                        title="Les offres spéciales : -50% sur le kit d'occultation">
                    </picture>
                    <picture class="imgBannerMobile">
                      <source
                        srcset="/img/soldes/MobileFR_GradesOfertaEspecial2.webp"
                        type="image/webp">
                      <img loading="lazy" src="/img/soldes/MobileFR_GradesOfertaEspecial2.jpg"
                        alt="Les offres spéciales : -50% sur le kit d'occultation"
                        title="Les offres spéciales : -50% sur le kit d'occultation">
                    </picture>
                  </a>
                </div>-->

                <!--<div class="carousel-item">
                  <a href="/24-porte-de-garage-sectionnelle-40-mm"
                    target="_blank">
                    <picture class="imgBannerDesktop">
                      <source
                        srcset="/img/soldes/DesktopFR_PortaGaragemOfertasEspeciais2.webp"
                        type="image/webp">
                      <img
                        loading="lazy"
                        src="/img/soldes/DesktopFR_PortaGaragemOfertasEspeciais2.jpg"
                        alt="Les offres spéciales : -50% sur l'automatisme Athena"
                        title="Les offres spéciales : -50% sur l'automatisme Athena">
                    </picture>
                    <picture class="imgBannerMobile">
                      <source
                        srcset="/img/soldes/MobileFR_PortaGaragemOfertaEspecial2.webp"
                        type="image/webp">
                      <img
                        loading="lazy"
                        src="/img/soldes/MobileFR_PortaGaragemOfertaEspecial2.jpg"
                        alt="Les offres spéciales : -50% sur l'automatisme Athena"
                        title="Les offres spéciales : -50% sur l'automatisme Athena">
                    </picture>
                  </a>
                </div>-->
              {/if}
            </div>

            <a class="carousel-control-prev hidden-md-down" href="#carouselBanners" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"><i class="material-icons">navigate_before</i></span>
              <span class="sr-only">Previous</span>
            </a>

            <a class="carousel-control-next hidden-md-down" href="#carouselBanners" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"><i class="material-icons">navigate_next</i></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>

        {* <div class="col-12 text-center hidden-md-up">
          <a class="carousel-control-mobile prev" href="#carouselBanners" role="button" data-slide="prev"><i class="material-icons">navigate_before</i></a>
          <a class="carousel-control-mobile next" href="#carouselBanners" role="button" data-slide="next"><i class="material-icons">navigate_next</i></a>
        </div> *}

      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-12 mt-1 newAlu_oney" id="imgBanner">
        <picture class="imgBannerDesktop">
          <source srcset="/img/banners/desktop-oney.webp" type="image/webp">
          <img loading="lazy" src="/img/banners/desktop-oney.jpg" alt="Financez vos projets maison (pergola, portail, menuiserie) avec Oney ou Alma, paiement en 4 fois, 12, 24, 36, 48, 60 ou 84 fois" class="img-fluid" usemap="#customMapOneyDesktop" />
          <map name="customMapOneyDesktop">
            <area alt="Financez vos projets maison (pergola, portail, menuiserie) avec Alma, paiement en 4 fois" title="Financez vos projets maison (pergola, portail, menuiserie) avec Alma, paiement en 4 fois" href="/content/67-payez-vos-achats-en-3-ou-4-fois-avec-alma" shape="rect" coords="0,0,701,114" />
            <area alt="Financez vos projets maison (pergola, portail, menuiserie) avec Oney, paiement en 12, 24, 36, 48, 60 ou 84 fois" title="Financez vos projets maison (pergola, portail, menuiserie) avec Oney, paiement en 12, 24, 36, 48, 60 ou 84 fois" href="/content/61-le-paiement-en-12-24-36-48-60-ou-84-fois-avec-oney-chez-priximbattable" shape="rect" coords="703,0,1452,114" />
          </map>
        </picture>

        <picture class="imgBannerMobile">
          <a href="/content/67-payez-vos-achats-en-3-ou-4-fois-avec-alma">
            <source srcset="/img/banners/mobile-alma.webp" type="image/webp">
            <img loading="lazy" src="/img/banners/mobile-alma.jpg" alt="Financez vos projets maison (pergola, portail, menuiserie) avec Alma, paiement en 4 fois" title="Financez vos projets maison (pergola, portail, menuiserie) avec Alma, paiement en 4 fois" class="img-fluid" />
          </a>
        </picture>

        <picture class="imgBannerMobile">
          <a href="/content/61-le-paiement-en-12-24-36-48-60-ou-84-fois-avec-oney-chez-priximbattable">
            <source srcset="/img/banners/mobile-oney2.webp" type="image/webp">
            <img loading="lazy" src="/img/banners/mobile-oney2.jpg" alt="Financez vos projets maison (pergola, portail, menuiserie) avec Oney, paiement en 12, 24, 36, 48, 60 ou 84 fois" title="Financez vos projets maison (pergola, portail, menuiserie) avec Oney, paiement en 12, 24, 36, 48, 60 ou 84 fois" class="img-fluid" />
          </a>
        </picture>
      </div>
    </div>
  </div>
{/if}
