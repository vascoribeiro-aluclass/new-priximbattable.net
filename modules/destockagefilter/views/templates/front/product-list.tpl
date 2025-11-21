{assign var='checaDescontosCatalogo' value=Product::checaDescontosCatalogo({$categoryId})}
<div class="products row">
{* <pre>
{$products|print_r}
</pre> *}
  {foreach from=$products item=product}
     {assign var="price_tax_exc" value=$product.regular_price_amount/1.20}
    {assign var='infoProduto' value=Product::infoProdutoCatalogo({$product.id_product}, {$product.regular_price_amount},{$price_tax_exc},{$price_tax_exc},false)}
    {assign var='precoAtualizadoSEO' value=Product::precoAtualizadoSEO({$infoProduto['preco_final_sem_desc_seo']}, {$checaDescontosCatalogo['reduction_value']})}

    <article id="productwishlist{$product.id_product}" class="product-miniature js-product-miniature"
      data-id-product="{$product.id_product}">


      <div class="thumbnail-container ">
        {* <a href="{$product.url}" class="thumbnail product-thumbnail">
          <img loading="lazy" src="{$product.cover.bySize.home_default.url}" alt="{$product.name}">
        </a> *}
        {include file='../../../../../themes/classic/templates/catalog/product-list-tags.tpl'}
        <div class="product-description pt-2">
          <h3 class="limit-char-line-title h3 product-title hp-product-title" itemprop="name"><a
              href="{$product.url}">{$product.name}</a>
          </h3>

          <div class="pb-1 pt-1 product-price-and-shipping hp-product-price-and-shipping">
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
              {if {$product.price|intval} < 6001}
                {assign var="multony" value=4}
              {else}
                {assign var="multony" value=48}
                  {/if} {if $multony == 4} {$imgcredit = 'alma4x'}
                {$linkcredit = '/content/32-payez-vos-achats-en-3-ou-4-fois-avec-alma'} {else} {$imgcredit = 'Oney48'}
                {$linkcredit = '/content/33-le-paiement-en-12-24-36-48-60-ou-84-fois-avec-oney-chez-priximbattable'} {/if}
                <a href="{$linkcredit}" target="_blank" data-toggle="tooltip"> <span style="width: 100%; padding: 0 5px;"
                  class="price productPriceUpx4  alu_oney_show_box_mini">{$multony}x
                  {($precoAtualizadoSEO['preco_com_desconto_sem_formato']/$multony)|round:2}€<img
                    style="width: 110px;display: inline-block;" src="/img/{$imgcredit}.png" width="110px"
                    height="auto"></span></a>
            </div>
          </div>
        </div>
      </div>
    </article>
  {/foreach}
</div>
