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
 {block name='cart_detailed_actions'}
  <div class="checkout cart-detailed-actions card-block">
    {if $cart.minimalPurchaseRequired}
      <div class="alert alert-warning" role="alert">
        {$cart.minimalPurchaseRequired}
      </div>
      <div class="text-sm-center">
        <button type="button" class="btn btn-primary btn-block disabled"
          disabled>{l s='Proceed to checkout' d='Shop.Theme.Actions'}</button>
      </div>
    {elseif empty($cart.products) }
      <div class="text-sm-center">
        <button type="button" class="btn btn-primary btn-block disabled"
          disabled>{l s='Proceed to checkout' d='Shop.Theme.Actions'}</button>
      </div>
    {else}
      <div class="text-sm-center">
        <a href="{$urls.pages.order}"
          class="btn btn-primary btn-block btn_commander">{l s='Proceed to checkout' d='Shop.Theme.Actions'}</a>
        {hook h='displayExpressCheckout'}
      </div>
    {/if}
    <div class="mon_flex_main">
      <div class="mon_flex_box pt-2">
       <div class="mon_btncart  exclusive" onclick="ShowModalRappel()">
          <div class="mon_circle mon_rappel_circle_com">
            <picture>
              <source srcset="/img/iconscart/quest.webp" type="image/webp">
              <img loading="lazy" alt="quest" class="mon_icon"
                src="/img/iconscart/quest.svg">
            </picture>
          </div>
          <div class="mon_text" style="font-size: 12px;">Une Question? </div>
        </div>
      </div>
      <div class="mon_flex_box pt-2">
      <div class="mon_btncart  exclusive" onclick="ShowModalAluDevis()">
          <div class="mon_circle mon_devis_circle">
            <picture>
              <source srcset="/img/iconscart/print.webp" type="image/webp">
              <img loading="lazy" alt="devis print" class="mon_icon" style="height: 20px; "
                src="/img/iconscart/print.svg">
            </picture>
          </div>
          <div class="mon_text" style="font-size: 12px;">Mon Devis</div>
        </div>
      </div>
    </div>
    <div class="pt-2">
      <picture>
        <source srcset="/img/mobile-oney.webp" type="image/webp">
        <img loading="lazy" alt="Oney" style="height: auto; max-width: 100%;" src="/img/mobile-oney.jpg">
      </picture>
    </div>

  </div>


  {*   *}
{/block}
