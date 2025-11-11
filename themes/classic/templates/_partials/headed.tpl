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

<div class="divLoading">
  <div class="divLoadingImg"></div>
</div>

{block name='header_banner'}
<div class="header-banner">
  {hook h='displayBanner'}
</div>
{/block}

{block name='header_nav'}
<nav class="header-nav">
  <div class="container">
    <div class="row">
      <div class="hidden-md-down">

        <div class="col-md-1" style="text-align: center; padding-top: 5px; padding-bottom: 5px;">
          <img src="https://priximbattable.net/img/fr.png" alt="France" title="France">
        </div>

        <div class="col-md-10" style="text-align: center; padding-top: 5px; padding-bottom: 5px;">
          <p class="alu_p_fabricante1">Fabricant Nº 1 en EUROPE. Livraison en France, Espagne, Portugal, Belgique, Luxembourg, Royaume-Uni, Autriche et Allemagne.</p>
        </div>
        <div class="col-md-1" style="text-align: center; padding-top: 5px; padding-bottom: 5px;">
          <img src="https://priximbattable.net/img/ue.jpg" alt="Union Européenne" title="Union Européenne">
        </div>

        <!--<div class="col-md-8 col-xs-12">
          {hook h='displayID1CustomhtmlHeader1'}
        </div>
        <div class="col-md-4 right-nav">
          <div class="tablet-view-phone">
            <ul>
              <li class="phone-support"><strong><a href="tel:04 72 80 93 54"><i class="material-icons">phone</i> 04 72 80 93 54</a> </strong></li>
            </ul>
          </div>
          {hook h='displayNav1'}

         <div class="currencies">
              <a rel="nofollow" href="{$cur_current_url|escape:'html':'UTF-8'}?SubmitCurrency=1&id_currency=1" title="Euro"><img src="https://priximbattable.net/img/flag_fr.png" /> €</a> | <a rel="nofollow" href="{$cur_current_url|escape:'html':'UTF-8'}?SubmitCurrency=1&id_currency=2" title="Franc suisse"><img src="https://priximbattable.net/img/flag_chf.png" /> CHF</a>
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
    				  <a rel="nofollow" href="{$cur_current_url|escape:'html':'UTF-8'}?SubmitCurrency=1&id_currency=1" title="Euro"><img src="https://priximbattable.net/img/flag_fr.png" /> €</a> | <a rel="nofollow" href="{$cur_current_url|escape:'html':'UTF-8'}?SubmitCurrency=1&id_currency=2" title="Franc suisse"><img src="https://priximbattable.net/img/flag_chf.png" /> CHF</a>
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
{/block}

{block name='header_top'}
<div class="header-top" style="padding-bottom: 0.5rem;">
  <div class="container">
    <div class="row">

      <div class="col-md-4 hidden-sm-down" id="_desktop_logo">
        <a href="{$urls.base_url}">
          <img class="logo img-responsive" src="{$shop.logo}" alt="{$shop.name}">
        </a>
      </div>

      <div class="col-md-2 col-sm-12 position-static">
        <div class="row">
          {hook h='displayTop'}
          <div class="clearfix"></div>
        </div>
      </div>

      <div class="col-md-1 col-sm-12 position-static">
        <!-- {include file="modules/ps_customersignin/ps_customersignin.tpl"} -->
        <!-- {hook h='displayBanner'} -->
        <div class="hidden-md-down" style="position: absolute; font-weight: bold; text-align: center; letter-spacing: -1px; margin-top: 3px; color: #000;">
          Horaires du service client au 04 72 80 93 54
          <br />
          et par tchat: 9h-12h / 14h-18h
        </div>
      </div>

      <div class="col-md-2 col-sm-12 position-static">
       <!-- {hook h='displayNav1'}-->
      </div>

      <div class="col-md-1 col-sm-12 position-static">
        <!--<div class="currencies2 hidden-md-down">
          <a rel="nofollow" href="{$cur_current_url|escape:'html':'UTF-8'}?SubmitCurrency=1&id_currency=1" title="Euro"><img src="https://priximbattable.net/img/flag_fr.png" /> €</a> | <a rel="nofollow" href="{$cur_current_url|escape:'html':'UTF-8'}?SubmitCurrency=1&id_currency=2" title="Franc suisse"><img src="https://priximbattable.net/img/flag_chf.png" /> CHF</a>
        </div>-->
      </div>

      <div class="col-md-2 hidden-sm-down right-nav">
        {hook h='displayNav2'}
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
{hook h='displayNavFullWidth'}
{/block}

<!-- black-friday -->
<div class="container-fluid">
    <div class="container" style="padding:0!important;margin-top:10px;background-color:#dcdcdc;">
   <img src="/img/soldes/halloween1.png" alt="Offres d'halloween" style="float:left;padding:0;" class="img-fluid" />
   <img src="/img/soldes/halloween2.png" alt="Offres d'halloween" style="float:left;padding:0; width:400px; height: 80px;" class="img-fluid" />
   <img src="/img/soldes/halloween3.png" alt="Offres d'halloween" style="float:left;padding:0; width:400px; height: 80px;" class="img-fluid" />
  </div>
  </div>

<div class="container" style="padding:0!important;margin-top:10px;background-color:#f3f8fc;">
  
  </div>
<div class="container" style="margin-top:10px;background-color:#FFFFFF;color:#000!important;padding:10px;border:5px solid red;">

<p style="color:#000!important;">Chers clients, reprise de notre accueil téléphonique sur notre numéro unique au <strong>04 72 80 93 54</strong></p>
<p style="color:#000!important;">Nous avons fermé notre showroom, les collectes de marchandises se font sur RDV.</p>
</div>
{if {$page.page_name} == 'index'}
<div class="container-fluid" style="background-color: white;">
  <div class="container">

    <div class="row mt-1 pt-1 pb-1">

      <div class="col-xs-12 col-sm-4 col-md-4 bloco_icones">
        <div class="col-xs-2 col-sm-2 col-md-2 m-0 p-0">
          <a href="https://priximbattable.net/content/14-conditions-de-garantie" target="_blank">
            <img src="/img/icons/garantie.png" class="icon-responsive icon-center" alt="Garantie de 15 ans sur l'aluminium" title="Garantie de 15 ans sur l'aluminium">
          </a>
        </div>
        <div class="col-xs-10 col-sm-10 col-md-10 txt_icones">
          <a href="https://priximbattable.net/content/14-conditions-de-garantie" target="_blank">Garantie de 15 ans sur l'aluminium</a>
        </div>
      </div>

      <div class="col-xs-12 col-sm-4 col-md-4 bloco_icones">
        <div class="col-xs-2 col-sm-2 col-md-2 m-0 p-0">
          <a href="https://priximbattable.net/content/1-livraison" target="_blank">
            <img src="/img/icons/livraison.png" class="icon-responsive icon-center" alt="Livraison en France, Belgique et Suisse" title="Livraison en France, Belgique et Suisse">
          </a>
        </div>
        <div class="col-xs-10 col-sm-10 col-md-10 txt_icones">
          <a href="https://priximbattable.net/content/1-livraison" target="_blank">Livraison en Europe</a>
        </div>
      </div>

      <div class="col-xs-12 col-sm-4 col-md-4 bloco_icones">
        <div class="col-xs-2 col-sm-2 col-md-2 m-0 p-0">
          <a href="https://priximbattable.net/content/18-produits-certifies" target="_blank">
            <img src="/img/icons/produits-certifies.png" class="icon-responsive icon-center" alt="Produits certifiés" title="Produits certifiés">
          </a>
        </div>
        <div class="col-xs-10 col-sm-10 col-md-10 txt_icones">
          <a href="https://priximbattable.net/content/18-produits-certifies" target="_blank">Produits certifiés</a>
        </div>
      </div>

    </div>

  </div>
</div>
{/if}