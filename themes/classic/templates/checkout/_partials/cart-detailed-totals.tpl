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
{block name='cart_detailed_totals'}

  <div class="cart-detailed-totals">
    <div class="card-block">
      <h2>Récapitulatif de votre commande:</h2>
    </div>
    <hr class="separator">
    <div class="card-block">
      {foreach from=$cart.subtotals item="subtotal"}
        {if $subtotal.value && $subtotal.type !== 'tax'}
          <div class="cart-summary-line" id="cart-subtotal-{$subtotal.type}">
            <span class="label{if 'products' === $subtotal.type} js-subtotal{/if}" {if 'shipping' === $subtotal.type}
            style="margin-top: 5px; display: inline-block;" {/if}>
            {if 'products' == $subtotal.type}
              {$cart.summary_string}
            {else}
              {$subtotal.label}
            {/if}
          </span>
          {if 'shipping' === $subtotal.type}
            <div class="info-oney-cart tooltip-info-oney hidden-md-down">
              <i class="material-icons">
                info
              </i>
              <span class="tooltiptext-info-oney">Si vous choisissez l'option de collecte dans notre entrepôt Pont-de-Cheruy,
          le frais de livraison est gratuit.</span>
      </div>
      {/if}
      <span class="value" {if 'shipping' === $subtotal.type} style="margin-top: 5px;" {/if}>{$subtotal.value}</span>
      {if $subtotal.type === 'shipping'}
      <div><small class="value">{hook h='displayCheckoutSubtotalDetails' subtotal=$subtotal}</small></div>
      {/if}
    </div>
    {/if}
    {/foreach}
    <div class="cart-summary-line pt-2">
      <span class="label">Collect dans notre entrepôt Pont-de-Cheruy :
      <input style="width: 17px; height: 17px;" type="checkbox" onchange="cartSubtotalShippingchange()">
      </span>
    </div>
    <input type="hidden" id="cart-subtotal-shipping-temp" value="collect">
    <input type="hidden" id="cart-subtotal-products-temp" value="non">
  </div>

  {block name='cart_voucher'}
  {include file='checkout/_partials/cart-voucher.tpl'}
  {/block}
  <div class="card-block">
    <div class="mon_flex_main">
      <div class="mon_flex_box pt-2">
        <div class=" mon_btncart  exclusive  " onclick="ShowModalLinkCart()">
          <div class="mon_circle mon_rappel_circle_com" style="background:#45BEBE;">
            <i class="material-icons " style="color:white">share</i>
          </div>
          <div class="mon_text" style="font-size: 12px;">Partager Le Panier</div>
        </div>
      </div>
      <div class=" mon_flex_box pt-2">
        {* <div class="mon_btncart  exclusive" onclick="ShowModalCoupon10()">
          <div class="mon_circle mon_coupon_circle">
            <picture>
              <source srcset="/img/iconscart/getpromo.webp" type="image/webp">
              <img loading="lazy" alt="Promo" class="mon_icon" src="/img/iconscart/getpromo.svg">
            </picture>
          </div>
          <div class="mon_text " style="font-size: 10px;">Demander un code promo</div>
        </div> *}
      </div>
    </div>
    <input name="sharecart" id="sharecart" type="hidden" value="{$idcart}">
  </div>
  <div class="card-block">
    <div class="cart-summary-line cart-total">
      <span class="label">{$cart.totals.total.label} {$cart.labels.tax_short}</span>
      <span class="value">{$cart.totals.total.value}</span>
    </div>
    <div class="cart-summary-line">
      <small class="label">{$cart.subtotals.tax.label}</small>
      <small class="value">{$cart.subtotals.tax.value} </small>
    </div>
  </div>
  {assign var="priceoney" value=$cart.totals.total.amount}

      {if $priceoney < 6001}
        {assign var="multony" value=4}
      {else}
        {assign var="multony" value=48}
      {/if}
      {if $multony == 4}
        {$imgcredit = 'alma4x'}
        {$linkcredit = '/content/32-payez-vos-achats-en-3-ou-4-fois-avec-alma'}
      {else}
        {$imgcredit = 'Oney48'}
        {$linkcredit = '/content/33-le-paiement-en-12-24-36-48-60-ou-84-fois-avec-oney-chez-priximbattable'}
      {/if}
      <div class="oney_alu_main">
        <div class="oney_alu_left">
          <img src="/img/{$imgcredit}.png" width="110px" height="auto">
        </div>
        <div class="oney_alu_centre">
          <span style="font-size: 14px;"> Environ en {$multony}x <span
              style="font-weight: bold;">{($priceoney/$multony)|round:2} € </span></span>
          <div class="info-oney-cart tooltip-info-oney hidden-md-down">
            <i class="material-icons">
              info
            </i>
            {if $multony == 4}
              <span class="tooltiptext-info-oney">La solution de paiement Alma vous permet de payer en 3 ou 4 fois, les
                frais sont de 1,6% du montant total de la commande pour les paiements en 3 fois et 2,4% du montant total de la
                commande pour les paiements en 4 fois.</span>
            {else}
              <span class="tooltiptext-info-oney">La solution de paiement 12x à 84x Oney vous permet de payer en 12 à 84
                fois, les
                frais sont de 4,3% du montant total de la commande dans la limite de 21500 € maximum. Consultez
                le détail de l’offre sur le site du partenaire.</span>
            {/if}
          </div>
        </div>
        <div class="oney_alu_right">
          {if $multony == 4}
            <button class="btn btn-primary aluPromoCode oney_alu_btn alma_alu_btn"  onclick="almaAluBtn()">
              <span style=" color: #000 !important;"> Simuler</span>
            </button>
          {else}
            <button class="btn btn-primary aluPromoCode oney_alu_btn">
              <div class="credit_simulation_oney-process">
                <input type="hidden" id="input-credit_amount-cart" value="{$priceoney}">
                <input type="hidden" id="simulation-url"
                  value="/modules/mh_oney/ajax/simulation.php?token=9c7df55e7831c94d9751299143e92a8a">
                <a href="#" id="btn-oney_credit_simulateur">
                  <span style=" color: #000 !important;"> Simuler</span>
                </a>
              </div>
            </button>
          {/if}
        </div>
      </div>

    </div>

  {/block}
