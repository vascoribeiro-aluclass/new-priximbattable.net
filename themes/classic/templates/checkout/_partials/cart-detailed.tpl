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
 {*block name='cart_detailed_product'}
  <div class="cart-overview js-cart" data-refresh-url="{url entity='cart' params=['ajax' => true, 'action' => 'refresh']}">
    {if $cart.products}
    <ul class="cart-items">
      {assign var=val value=0}
      {assign var=valcount value=$cart.products|count}
      {foreach from=$cart.products item=product}
        {assign var=val value=$val+1}
        <li class="cart-item">
          {block name='cart_detailed_product_line'}
            {include file='checkout/_partials/cart-detailed-product-line.tpl' product=$product}
          {/block}
        </li>
        {if $val < $valcount}<hr class="separator">{/if}
        {if is_array($product.customizations) && $product.customizations|count >1}<hr>{/if}
      {/foreach}
    </ul>
    {else}
      <span class="no-items">{l s='There are no more items in your cart' d='Shop.Theme.Checkout'}</span>
    {/if}
  </div>

{/block*}

{block name='cart_detailed_product'}
  <div class="cart-overview js-cart" data-refresh-url="{url entity='cart' params=['ajax' => true, 'action' => 'refresh']}">
    {if $cart.products}
    <ul class="cart-items">
      {assign var=val value=0}
      {assign var=valcount value=$cart.products|count}
      {foreach from=$cart.products item=product}
        {assign var=val value=$val+1}
      <!--<li {*if $product.id_product=='13432'}{else}class="cart-item"{/if}>
        {block name='cart_detailed_product_line'}
          {include file='checkout/_partials/cart-detailed-product-line.tpl' product=$product}
        {/block*}

      </li>-->
      {if $product.id_product=='13432'}
        <li class="cart-item cart-pack">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
          {block name='cart_detailed_product_line'}
            {include file='checkout/_partials/cart-detailed-product-line.tpl' product=$product}
          {*<a {if $product.discount_type === 'percentage'}class="btn-pack"{else}class="btn-pack-discount"{/if}
            href="/content/16-pack-tranquillissime" target="_blank">Lire nos recommandations<img src="/themes/classic/templates/checkout/_partials/tap-click.png" alt="Clik Here" style="transform: matrix(0.89, -0.45, 0.45, 0.89, 0, 0); width:36px; height:36px; position:relative; top:.7rem; left:1rem;"></a>*}
          {/block}
        </li>
        {else}
          <li class="cart-item">
          {block name='cart_detailed_product_line'}
            {include file='checkout/_partials/cart-detailed-product-line.tpl' product=$product}
          {/block}
        </li>
        {/if}
      {*<li class="cart-item">
      <p>{$product.product_id} ou {$product.id_product}</p>
          {block name='cart_detailed_product_line'}
            {include file='checkout/_partials/cart-detailed-product-line.tpl' product=$product}
          {/block}
        </li>*}
        {if $val < $valcount}<hr class="separator">{/if}
        {if is_array($product.customizations) && $product.customizations|count >1}<hr>{/if}
      {/foreach}
    </ul>
    {else}
      <span class="no-items">{l s='There are no more items in your cart' d='Shop.Theme.Checkout'}</span>
    {/if}
  </div>
{/block}

