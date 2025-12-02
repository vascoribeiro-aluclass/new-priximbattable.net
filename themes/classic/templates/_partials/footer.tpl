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

<div class="container-fluid" style="background-color: #f1f1f1;">
  <div class="row">
    <div class="container pt-1">
      {block name='hook_footer_before'}
      {hook h='displayFooterBefore'}
      {/block}
    </div>
  </div>
</div>

{* {if {$page.page_name} == 'index'}
<div class="container">

  <div class="row pt-1 pb-1">

    <div class="col-xs-12 col-sm-4 col-md-4 bloco_icones">
      <div class="col-xs-2 col-sm-2 col-md-2 m-0 p-0">
        <a href="/content/15-le-paiement-en-4-fois-avec-oney" target="_blank">
          <img loading="lazy" src="/img/icons/oney.png" class="icon-responsive icon-center" alt="Paiement 4x Oney" title="Paiement 4x Oney">
        </a>
      </div>
      <div class="col-xs-10 col-sm-10 col-md-10 txt_icones">
        <a href="/content/15-le-paiement-en-4-fois-avec-oney" target="_blank" class="link_btn">Paiement 4x Oney</a>
      </div>
    </div>

    <div class="col-xs-12 col-sm-4 col-md-4 bloco_icones">
      <div class="col-xs-2 col-sm-2 col-md-2 m-0 p-0">
        <img loading="lazy" src="/img/icons/moins-chers.png" class="icon-responsive icon-center embedAluclass" data-watch="5QlufnX76rA" alt="Moins Chers!" title="Moins Chers!">
      </div>
      <div class="col-xs-10 col-sm-10 col-md-10 txt_icones">
        <a class="link_btn embedAluclass" data-watch="5QlufnX76rA">La fabrication de nos produits</a>
      </div>
    </div>

    <div class="col-xs-12 col-sm-4 col-md-4 bloco_icones">
      <div class="col-xs-2 col-sm-2 col-md-2 m-0 p-0">
        <a href="/content/12-service-client" target="_blank">
          <img loading="lazy" src="/img/icons/service.png" class="icon-responsive icon-center" alt="Service Client" title="Service Client">
        </a>
      </div>
      <div class="col-xs-10 col-sm-10 col-md-10 txt_icones">
        <a href="/content/12-service-client" target="_blank" class="link_btn">Service à votre disposition</a>
      </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pt-1 pb-1 hidden-xs-down">
    </div>

    <div class="col-xs-12 col-sm-4 col-md-4 bloco_icones">
      <div class="col-xs-2 col-sm-2 col-md-2 m-0 p-0">
        <a href="https://www.youtube.com/playlist?list=PLGUOFe326PaRwWxMRNJ-w-vZq0XqCTWN5" target="_blank">
          <img loading="lazy" src="/img/icons/videos-client.png" class="icon-responsive icon-center" alt="Les Vidéos Client" title="Les Vidéos Client">
        </a>
      </div>
      <div class="col-xs-10 col-sm-10 col-md-10 txt_icones">
        <a href="https://www.youtube.com/playlist?list=PLGUOFe326PaRwWxMRNJ-w-vZq0XqCTWN5" target="_blank" class="link_btn">Les Vidéos Client</a>
      </div>
    </div>

    <div class="col-xs-12 col-sm-4 col-md-4 bloco_icones">
      <div class="col-xs-2 col-sm-2 col-md-2 m-0 p-0">
        <a href="https://www.youtube.com/channel/UCtKdDIBdxhPLHuvSmcdW_TQ/videos" target="_blank">
          <img loading="lazy" src="/img/icons/youtube.png" class="icon-responsive icon-center" alt="Chaine Youtube" title="Chaine Youtube">
        </a>
      </div>
      <div class="col-xs-10 col-sm-10 col-md-10 txt_icones">
        <a href="https://www.youtube.com/channel/UCtKdDIBdxhPLHuvSmcdW_TQ/videos" target="_blank" class="link_btn">Voir nos vidéos</a>
      </div>
    </div>

    <div class="col-xs-12 col-sm-4 col-md-4 bloco_icones">
      <div class="col-xs-2 col-sm-2 col-md-2 m-0 p-0">
        <a href="/content/17-trouver-un-installateur-avec-needhelp" target="_blank">
          <img loading="lazy" src="/img/icons/installateur.png" class="icon-responsive icon-center" alt="Trouvez un installateur avec needhelp.com en moins de 24h" title="Trouvez un installateur avec needhelp.com en moins de 24h">
        </a>
      </div>
      <div class="col-xs-10 col-sm-10 col-md-10 txt_icones">
        <a href="/content/17-trouver-un-installateur-avec-needhelp" target="_blank" class="link_btn">Trouvez un Installateur</a>
      </div>
    </div>

  </div>

</div>
{/if} *}

<div class="footer-container">

<div class="footer-content">
  <div class="container">
    <div class="footerRow">

      <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
        {hook h='displayFooterLinks'}
      </div>

      <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
        {hook h='displayFooterLinks2'}
        {if {$cms.id} != '20'}
          <div id='pacmanmenu'>
            <a href="/content/20-pacman" target="_blank"><img src="/img/cms/PACMAN/pacman_1.gif" loading="lazy" alt=""
                style="width: 68px; margin: 0; margin-top: -30px;"></a>
          </div>
        {/if}
      </div>

      <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
        <picture>
          <source srcset="/img/cms/home/map-fr.webp" type="image/webp">
          <img loading="lazy" alt="france" class="pais-rodape" src="/img/cms/home/map-fr.png" width="276" height="299">
        </picture>
      </div>

      <div class="contact-bg col-xs-12 col-sm-12 col-md-12 col-lg-3" style="padding-top: 30px;">
      {* <div class="contact-bg col-xs-12 col-sm-12 col-md-12 col-lg-3" style="padding-top: 30px; padding-bottom: 30px;"> *}
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
              <span>Du Lundi au Jeudi : 9h/12h30 - 13h/18h<br />Le Vendredi : 9h/12h30 - 13h/17h30<br /><br /></span>
            </div>

            <div style="margin-top: 10px;">
              <picture>
                <source srcset="/img/img_union/cssSprite_headerfooter.webp" type="image/webp">
                <img loading="lazy" class="spritecart img-fluid" src="/img/img_union/cssSprite_headerfooter.png" alt="Méthodes de Paiement">
              </picture>
            </div>

            {* <div class="newAlu_btnLinksFooter">
                <p><a target="_blank" href="/content/21-actualites-priximbattable">Actualité Prix Imbattable</a></p>
                <p><a target="_blank" href="/content/4-qui-sommes-nous">Qui Sommes-nous</a></p>
                <p><a target="_blank" href="/nous-contacter">Contact</a></p>
                <p><a target="_blank" href="/content/8-cgv">CGV</a></p>
                <p><a target="_blank" href="/content/6-politique-de-confidentialite">Politique de confidentialité</a></p>
                <p><a target="_blank" href="/content/2-mentions-legales">Mentions légales</a></p>
                <p><a target="_blank" href="/content/7-plan-de-situation">Plan de Situation</a></p>
            </div> *}

            {* <h4 class="title-footer">
              Nous contacter
            </h4>
            <div class="address">
              <i class="material-icons">location_on</i>
              <span>5 rue du Travail, 38230 Pont-De-Cheruy </span>
            </div> *}

            {* <div class="phone">
              <i class="material-icons">phone</i>
              <span>04 72 80 93 54 </span>
            </div> *}

            {* <div class="email">
              <i class="material-icons">email</i>
              <a href="mailto:toujoursun@priximbattable.net">toujoursun@priximbattable.net</a>
            </div> *}
            {* <div class="times">
              <i class="material-icons">access_time</i><span>Horaires d'ouverture:</span> <br />
              <span>Du Lundi au Vendredi : 8h30/12h30 - 13h/18h<br />au 0472809354 ou par Tchat</span>
            </div> *}
          </div>
        </div>
        {* <br><img loading="lazy" src="/img/payment-1.png" alt="payment"> *}
      </div>

    </div>
  </div>
</div>

<div class="footer-bottom">
  <div class="container-fluid newAlu_barFooterLinks">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
      <a target="_blank" href="/content/21-actualites-priximbattable">Actualité PrixImbattable</a>
      <a target="_blank" href="/blog">Blog</a>
      <a target="_blank" href="/content/4-qui-sommes-nous">Qui Sommes-nous</a>
      <a target="_blank" href="/nous-contacter">Contact</a>
      <a target="_blank" href="/sav/signaler_sav.php" class="highlight">Déclarer SAV</a>
      <a target="_blank" href="/content/8-cgv">CGV</a>
      <a target="_blank" href="/content/6-politique-de-confidentialite">Politique de confidentialité</a>
      <a target="_blank" href="/content/2-mentions-legales">Mentions légales</a>
      <a target="_blank" href="/content/7-plan-de-situation">Plan de Situation</a>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 newAlu_copyright">
        &copy; Priximbattable {$smarty.now|date_format:"%Y"}. Tout droits réservés.
      </div>

      {assign 'arraySites' [
        'priximbattable.net|fr',
        'precoimbativel.net|pt',
        'precioimbatible.net|es',
        'preisverrueckt.de|ge'
      ]}
      <div class="row footer-flags-line" >
      {assign var=thisCountry value="fr"}

      {foreach from=$arraySites item=foo key=key}
        {assign var=content value="|"|explode:{$arraySites[$key]}}

        <div class="col-xs-12 col-sm-12 col-md-{12 / $arraySites|@count} col-lg-{12 / $arraySites|@count} footer-flags">
          <div class="footer-flags-image">
            <picture>
              <source srcset="/img/flags/{$content[1]}.webp" type="image/webp">
              <img loading="lazy" src="/img/flags/{$content[1]}.png" {if $content[1]==$thisCountry} /*class="footer-flags-size"*/ {/if} alt="{$content[0]}" title="{$content[0]}">
            </picture>
          </div>
          <div class="footer-flags-link">
            {if $thisCountry != {$content[1]}}
              <a href="https://www.{$content[0]}" target="_blank">www.{$content[0]}</a>
            {else}
              www.{$content[0]}
            {/if}
          </div>
        </div>
      {/foreach}
      </div>
    </div>
  </div>
</div>



<div class="backtop" style="background-color: gray; margin-left: 70px;">
    <a id="sp-totop" class="backtotop" href="#" title="{l s='Back to top' d='Shop.Theme.Global'}">
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

{literal}

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
{/literal}

{if {$cms.id} == '20'}
  <link rel="stylesheet" href="../modules/pacman/pacman/assets/css/pacman.paulo.css" type="text/css" media="all" />
  <script src="../modules/pacman/pacman/assets/js/pacman.paulo.js"></script>
  <script src="../modules/pacman/pacman/assets/js/modernizr.1.5.min.js"></script>
  <script src="../modules/pacman/pacman.js"></script>
{/if}


