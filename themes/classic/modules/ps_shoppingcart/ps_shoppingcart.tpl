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
<div id="_desktop_cart">
  <div class="blockcart cart-preview {if $cart.products_count > 0}active{else}inactive{/if}"
    data-refresh-url="{$refresh_url}">
    <div class="header">

      <div style="text-align: center;  position: absolute;" class="custom-align-shopping">
        <div class="row">
          <div class="col-md-12">
            {if $cart.products_count > 0}
              <a rel="nofollow" href="{$cart_url}">
              {/if}
              {* <img loading="lazy" src="/img/icon_cart.png" class="hidden-md-down" alt="" >
          <img loading="lazy" src="/img/icon_cart_gray.png" class="hidden-md-up" style="margin-top: 8px;" alt="" > *}
              <div class="hidden-md-down">
              {if $cart.products_count > 0}
                <div class=" tooltip-list-cart">
                  <picture >
                    <source srcset="/img/shopping-cart.webp" type="image/webp">
                    <img loading="lazy" src="/img/shopping-cart.png" alt="" class="logo img-responsive phoneIcon " style="height: 32px;" onmouseover="ListProductShow()">
                  </picture>
                  <span class="tooltiptext-list-cart">
                    <img loading="lazy" src="/img/loadlistproduct.gif" alt="" class="load" style="height: 100px;">
                  </span>
                </div>
              {else}
                <picture class=" tooltip-list-cart">
                  <source srcset="/img/shopping-cart.webp" type="image/webp">
                  <img loading="lazy" src="/img/shopping-cart.png" alt="" class="logo img-responsive phoneIcon" style="height: 32px;">
                </picture>
              {/if}
              </div>
              <div class="hidden-md-up">
                <span class="material-icons "   {if $cart.products_count < 1} style="margin-left: 25px;"  {/if}>
                  shopping_cart
                </span>

              </div>
              {if $cart.products_count > 0}
              </a>
            {/if}
            <span class="cart-products-count hidden-md-down" style="margin-left: -17px; ">{$cart.products_count}</span>
            <span class="cart-products-count hidden-md-up"
              style="margin-left: 40px; bottom: 20px;">{$cart.products_count}</span>
          </div>
        </div>

        {* <div class="row">
        <div class="col-md-12">
          {if $cart.products_count > 0}
            <a rel="nofollow" href="{$cart_url}">
          {/if}
            <!-- <i class="material-icons shopping-cart">shopping_cart</i> -->
            <span class="hidden-sm-down">{l s='Cart' d='Shop.Theme.Checkout'}</span>
          {if $cart.products_count > 0}
            </a>
          {/if}
        </div>
      </div> *}
      </div>

    </div>
  </div>
</div>
