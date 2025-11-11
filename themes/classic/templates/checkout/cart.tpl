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

{block name='content'}
  <link rel="stylesheet" href="/themes/classic/assets/css/shoppingcart.css" />
  <section id="main">
    <div id="messagemwait"
      class="message-wait-pack">
      <div class="message-wait-box-pack" style="height: 100%;"><span
      class="message-wait-text-pack">Attendez, s'il vous plaît.</span></div>
    </div>
    <div class="cart-grid row" >

      <!-- Left Block: cart product informations & shpping -->
      <div class="cart-grid-body col-xs-12 col-lg-8">

        <!-- cart products detailed -->
        <div class="card cart-container">
          <div class="card-block">
            <h1 class="h1">{l s='Shopping Cart' d='Shop.Theme.Checkout'}</h1>
          </div>
          <hr class="separator">
          {block name='cart_overview'}
            {include file='checkout/_partials/cart-detailed.tpl' cart=$cart}
          {/block}
        </div>
      </div>

      <!-- Right Block: cart subtotal & cart total -->
      <div class="cart-grid-right col-xs-12 col-lg-4 cart-flutua-scroll">

        {block name='cart_summary'}
          <div class="card cart-summary">

            {block name='hook_shopping_cart'}
              {hook h='displayShoppingCart'}
            {/block}

            {block name='cart_totals'}
              {include file='checkout/_partials/cart-detailed-totals.tpl' cart=$cart}
            {/block}

            {block name='cart_actions'}
              {include file='checkout/_partials/cart-detailed-actions.tpl' cart=$cart}
            {/block}

          </div>
        {/block}

      </div>

    </div>

    <div class="cart-grid row " style="height: 400px;">
      <div class="cart-grid-body col-xs-12 col-lg-8">
        {block name='continue_shopping'}
          <a class="label" href="{$urls.pages.index}">
            <i class="material-icons">chevron_left</i>{l s='Continue shopping' d='Shop.Theme.Actions'}
          </a>
          {$ispack = '0'}
          {foreach $cart.products as $values}
          {if $values['id_product'] == 13432}
          {$ispack = '1'}
          {/if}
          {/foreach}

          <section id="lineven_servicespacksorder" class="card"
              style="z-index: 50;{if $ispack  == '0'} display: block; {else}  display: none;{/if}">
              <div class="card-block">
                  <div class="h1 header-title">La garantie de transport tranquillissime</div>
              </div>
              <hr class="header-hr">
              <div class="spo_servicespacks ">
                  <div class="row spo_row_header">
                      <div class="col-lg-3 spo_col_services spo_row_line_bottom">
                          <div class="spo_text"></div>
                      </div>
                      <div class="col-lg-9 row spo_row_header_pack pl-3" style="padding:0;">
                          <div id="header_servicepack_1" class="col-lg-12 spo_col_pack spo_row_line_bottom "
                              style="background-image:linear-gradient(transparent, );">
                              <div class="spo_pack_title">Pack Tranquillissime</div>
                              <div class="spo_pack_text">
                                  Une Tranquillité en cas de problème.
                                  En cas d'avarie, vol, perte pendant le transport, nous nous engageons à remplir
                                      toutes les démarches auprès du transporteur (lettre recommandée, relance...) afin
                                      que celui-ci apporte une réponse rapide.
                                      Nous nous engageons à vous renvoyer les produits dans les plus brefs délais, ou à
                                      vous rembourser sous 7 jours en cas de non disponibilité.
                                  </div>
                                  <div class="spo_pack_button pt-3">
                                      <button id="addpacktranquillissime" class="btn btn-primary"
                                          title="Ajouter"><span>Ajouter</span></button>
                                  </div>
                              </div>

                          </div>
                      </div>
              </section>

        {/block}

        <!-- shipping informations -->
        {block name='hook_shopping_cart_footer'}
          {hook h='displayShoppingCartFooter'}
        {/block}
      </div>
    </div>
    <div class="cart-grid-right col-xs-12 col-lg-4 cart-flutua-scroll">
        {block name='hook_reassurance'}
          {hook h='displayReassurance'}
        {/block}
    </div>


  </section>

{/block}
