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
{assign var='checaDescontosCatalogo' value=Product::checaDescontosCatalogo({$product.id_category_default},{$product.id})}
{assign var='infoProduto' value=Product::infoProduto({$product.id}, {$product.price_amount}, {$product.price_tax_exc})}

{assign var='precoAtualizadoSEO' value=Product::precoAtualizadoSEO({$infoProduto['preco_final_sem_desc_seo']},
{$checaDescontosCatalogo['reduction_value']})}

{block name='product_miniature_item'}
  <article class="product-miniature js-product-miniature" data-id-product="{$product.id_product}"
    data-id-product-attribute="{$product.id_product_attribute}">
    <div class="thumbnail-container">
      {block name='product_thumbnail'}
        {include file='themes/classic/templates/catalog/product-list-tags.tpl'}
      {/block}

      <div class="product-description">
        {block name='product_name'}
          {if $page.page_name == 'index'}
            <h3 class="limit-char-line-title h3 product-title hack-prix" itemprop="name"><a
                href="{$product.url}">{$product.name}</a></h3>
          {else}
            <h2 class="limit-char-line-title h3 product-title hack-prix" itemprop="name"><a
                href="{$product.url}">{$product.name}</a></h2>
          {/if}
        {/block}

        {block name='product_price_and_shipping'}
          {if $product.show_price}
            <div class="pb-1 pt-1 product-price-and-shipping" style="margin-top: -5px; background-color: #FFF; width: 100%;">
              {if $product.has_discount}
                {hook h='displayProductPriceBlock' product=$product type="old_price"}

                <span class="sr-only" style="display: none;">{l s='Regular price' d='Shop.Theme.Catalog'}</span>

                <span class="regular-price" style="display: none;">{$infoProduto['preco_corrigido']}</span>
              {/if}

              {hook h='displayProductPriceBlock' product=$product type="before_price"}

              <span class="sr-only">{l s='Price' d='Shop.Theme.Catalog'}</span>
              {* <span itemprop="price" class="price">{$product.price}</span> *}


              {if {$checaDescontosCatalogo['reduction']} >= 1}
                <span>
               <span class="price price_risk_aluclass">{$infoProduto['preco_final_sem_desc']}</span>
                    <span class="discount_list_products_aluclass">- {$checaDescontosCatalogo['reduction']}</span>
                  <span itemprop="price"
                    class="price_final_aluclass">{$precoAtualizadoSEO['preco_com_desconto_catalogo_view']}</span>

                </span>
              {else}
                <span itemprop="price" class="price_final_no_discount_aluclass">{$product.price}</span>
              {/if}
              <div class="pt-1 pb-1">
                {if {$product.price_amount|intval} < 6001}
                  {assign var="multony" value=4}
                {else}
                  {assign var="multony" value=48} 
                {/if} 

                {if $multony == 4} {$imgcredit = 'alma4x'}
                  {$linkcredit = '/content/67-payez-vos-achats-en-3-ou-4-fois-avec-alma'} {else} {$imgcredit = 'Oney48'}
                  {$linkcredit = '/content/61-le-paiement-en-12-24-36-48-60-ou-84-fois-avec-oney-chez-priximbattable'} {/if}
                  <a href="{$linkcredit}" target="_blank" data-toggle="tooltip"> <span style="width: 100%; padding: 0 5px;"
                    class="price productPriceUpx4  alu_oney_show_box_mini">{$multony}x
                    {($precoAtualizadoSEO['preco_com_desconto_sem_formato']/$multony)|round:2}€<img {if $countproduct > 4}
                      loading="lazy" {else} fetchpriority="high"
                    {/if} style="width: 110px;display: inline-block;"
                      src="/img/{$imgcredit}.png" width="110px" height="auto" alt=""></span></a>
              </div>

              {hook h='displayProductPriceBlock' product=$product type='unit_price'}

              {hook h='displayProductPriceBlock' product=$product type='weight'}
            </div>
          {/if}
        {/block}
        {* <div class="prazoentrega_all" style = "text-align: center;" data-dividprod = "{$product.id_product}" data-dividcat = "{$product.id_category_default}">
          {if $infoProduto.free_shipping  == 1}
            Livraison offerte <s>{$infoProduto.porteprice_text}</s> €
          {/if}
        </div> *}
        {block name='product_reviews'}
          {hook h='displayProductListReviews' product=$product}
        {/block}

        {block name='product_description_short'}

        {/block}

      </div>

      {block name='product_flags'}
        <ul class="product-flags">
          {foreach from=$product.flags item=flag}
            <li class="product-flag {$flag.type}">{$flag.label}</li>
          {/foreach}
        </ul>
      {/block}

      <div class="highlighted-informations{if !$product.main_variants} no-variants{/if} hidden-sm-down">
        {block name='quick_view'}
          <a class="quick-view" href="#" data-link-action="quickview">
            <i class="material-icons search">&#xE8B6;</i> {l s='Quick view' d='Shop.Theme.Actions'}
          </a>
        {/block}

        {block name='product_variants'}
          {if $product.main_variants}
            {include file='catalog/_partials/variant-links.tpl' variants=$product.main_variants}
          {/if}
        {/block}
      </div>

      {* <div class="enstoke">
      <!-- {if $page.body_classes|classnames|strstr:'category-id-parent-21' || $page.body_classes|classnames|strstr:'category-id-21'}
        <span>En stock</span>
      {else}
        <span>En stock ou sous 20 jours ouvrés</span>
      {/if} -->

    </div> *}

      {if !$configuration.is_catalog}
        <!--<div class="actions">
            <form action="{$urls.pages.cart}" method="post">
                <input type="hidden" name="token" value="{$static_token}" />
                <input type="hidden" value="{$product.id_product}" name="id_product" />
                {* paulo - checa se existe campos de personalizacao ndk ou prestashop, se sim nao mostra o botao adicionar ao carrinho *}
                {* {assign var='checarNumCamposNDK' value=NdkCf::isRequiredCustomization($product.id_product, $product.id_category_default)}
                {if {$checarNumCamposNDK} == ''}
                  {$checarNumCamposNDK = 0}
                {/if}
                {if {$checarNumCamposNDK} == 0 && {$product.id_product_attribute} == 0}
                <button data-button-action="add-to-cart" class="btn grid-cart-btn btn-primary" {if $product.availability == 'unavailable'}disabled{/if}>
                              Ajouter au panier
                </button>
                {/if} *}
                {* paulo - checa se existe campos de personalizacao ndk ou prestashop, se sim nao mostra o botao adicionar ao carrinho *}
                <button data-button-action="add-to-cart" class="btn grid-cart-btn btn-primary" {if $product.availability == 'unavailable'}disabled{/if}>
                              Ajouter au panier
                </button>
            </form>
        </div>-->
      {/if}

    </div>
  </article>
{/block}
