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
{assign var='adressshow' value=Cart::addressCart(Context::getContext()->cart->id_address_delivery,Context::getContext()->cart->id_address_invoice)}
{assign var='adressMessage' value=Cart::addressMessage(Context::getContext()->cart->id)}

<section id="js-checkout-summary" data-refresh-url="{$urls.pages.cart}?ajax=1&action=refresh">

  {if 'deliver'|array_key_exists:$adressshow  || 'invoice'|array_key_exists:$adressshow}
    <section class="card js-cart">
      <div class="card-block pb-2">
        <div class="row">
          {if 'deliver'|array_key_exists:$adressshow}
            <div class="col-sm-6 col-xs-12">
              <span class="address-alias h4">
                <p>Adresse de livraison</p>
              </span>
              <div class="address">{$adressshow['deliver']['firstname']}
                {$adressshow['deliver']['lastname']}<br>{$adressshow['deliver']['address1']}<br>{$adressshow['deliver']['postcode']}
                {$adressshow['deliver']['city']}<br>{$adressshow['deliver']['country']}<br>{$adressshow['deliver']['phone_mobile']}
              </div>
            </div>
          {/if}
          {if 'invoice'|array_key_exists:$adressshow}
            <div class="col-sm-6 col-xs-12">
              <span class="address-alias h4">
                <p>Adresse de facturation</p>
              </span>
              <div class="address">{$adressshow['invoice']['firstname']}
                {$adressshow['invoice']['lastname']}<br>{$adressshow['invoice']['address1']}<br>{$adressshow['invoice']['postcode']}
                {$adressshow['invoice']['city']}<br>{$adressshow['invoice']['country']}<br>{$adressshow['invoice']['phone_mobile']}
              </div>
            </div>
          {/if}
        </div>
      </div>
      <div class="card-block pb-2">
        <div class="row">
          <div class="col-sm-12">
            <button  class="btn btn-primary continue float-xs-right"  onclick="OpenAdressesCart()" name="modifier-addresses" >
              Modifier Adresses
            </button>
          </div>
        </div>
      </div>
    </section>
  {/if}
  <section class="card js-cart">

    <div class="card-block">
      {block name='hook_checkout_summary_top'}
        {hook h='displayCheckoutSummaryTop'}
      {/block}

      {block name='cart_summary_products'}
        <div class="cart-summary-products">


          <p>{$cart.summary_string}</p>

          {* <p>
            <a href="#" data-toggle="collapse" data-target="#cart-summary-product-list">
              {l s='show details' d='Shop.Theme.Actions'}
            </a>
          </p> *}

          {block name='cart_summary_product_list'}
            <div id="cart-summary-product-list">
              <ul class="media-list">
                {foreach from=$cart.products item=product}
                  <li class="media">{include file='checkout/_partials/cart-summary-product-line.tpl' product=$product}</li>
                {/foreach}
              </ul>
            </div>
          {/block}
        </div>
      {/block}

      {block name='cart_summary_subtotals'}
        {foreach from=$cart.subtotals item="subtotal"}
          {if $subtotal && $subtotal.type !== 'tax'}
            <div class="cart-summary-line cart-summary-subtotals" id="cart-subtotal-{$subtotal.type}">
              <span class="label">{$subtotal.label}</span>
              {if $subtotal.type == "shipping" }
                {assign var="shippay" value=$subtotal.amount}
              {/if}
              {if $subtotal.type == "shipping" && $shipfree==1}
                <span class="value"> {if $shipfree==1 }collect{else}gratuit{/if }</span>
              {else}
                <span class="value">{$subtotal.value}</span>
              {/if}
            </div>
          {/if}
        {/foreach}
      {/block}

    </div>
    {if $shipfree==3 }

      {else}
        {if $customer.is_logged && !$customer.is_guest}
        <div class="card-block pt-2">
          <span class="label">Collect dans notre entrepôt Pont-de-Cheruy :
            <input style="width: 17px; height: 17px;" type="checkbox" {if $shipfree==1 }  checked="checked" {/if } name="checkpontSum" value="pontSum" onchange="CartShippingSave()">
          </span>
        </div>
        <input type="hidden" id="cart-subtotal-shipping-temp" value="{if $shipfree==1 }gratuit{else}collect{/if }">
        <input type="hidden" id="cart-subtotal-products-temp" value="{if $shipfree==1 }{else}non{/if }">
        {/if}
      {/if}

    {block name='cart_summary_voucher'}
      <div class="block-promo">
        <div class="cart-voucher">
          {if $cart.vouchers.added}
            {block name='cart_voucher_list'}
              <ul class="promo-name card-block">
                {$contVoucher = 0}
                {foreach from=$cart.vouchers.added item=voucher}
                  <li class="cart-summary-line">
                    <span class="label">Réduction {$voucher.reduction_formatted} avec coupon {$voucher.name}</span>
                  </li>
                  {$contVoucher = $contVoucher + 1}
                {/foreach}
              </ul>
            {/block}
          {/if}
        </div>
      </div>
    {/block}
    {if $shipfree==3 }

    {else}
      {if $customer.is_logged && !$customer.is_guest}
        <div class="card-block p-1" style=>
          <div class="card-block p-1" style="border: #571305 ;
                          border-style: solid;
                          border-radius: 30px;
                          background-color: #571305 ;">
            <label style="color: white; text-align: justify;" for="delivery_message">Si vous voulez nous laisser un message à propos de votre
              commande, merci de bien vouloir le renseigner dans le champ ci-contre</label>
            <textarea rows="3" style="width: 100%;" name="delivery_message"
              onchange="MessageDeliveryChange(this)">{html_entity_decode($adressMessage)}</textarea>
            <div class=" pt-1">
              <button class=" float-xs-right btn-message-delivry btn btn-primary"
                onclick="MessageDeliverySave()"><span>Ajouter Message</span></button>
            </div>
          </div>
        </div>
      {/if}
    {/if}
    <hr class="separator">

    {block name='cart_summary_totals'}
      {include file='checkout/_partials/cart-summary-totals.tpl' cart=$cart}
    {/block}


  </section>
</section>
