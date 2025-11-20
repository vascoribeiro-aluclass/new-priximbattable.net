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
                  {if {$product.id} == '1021073'}
                    <span class="price price_risk_aluclass">969,00</span>
                    <span class="discount_list_products_aluclass">- 54%</span>
                  {elseif {$product.id} == '1021070'}
                    <span class="price price_risk_aluclass">966,00</span>
                    <span class="discount_list_products_aluclass">- 56%</span>
                  {elseif {$product.id} == '813396'}
                    <span class="price price_risk_aluclass">2.004,00</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '613980'}
                    <span class="price price_risk_aluclass">2.685,00</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '757422'}
                    <span class="price price_risk_aluclass">3.006,00</span>
                    <span class="discount_list_products_aluclass">- 69%</span>
                  {elseif {$product.id} == '757409'}
                    <span class="price price_risk_aluclass">2.614,00</span>
                    <span class="discount_list_products_aluclass">- 64%</span>
                  {elseif {$product.id} == '757419'}
                    <span class="price price_risk_aluclass">2.756,00</span>
                    <span class="discount_list_products_aluclass">- 66%</span>
                  {elseif {$product.id} == '758914'}
                    <span class="price price_risk_aluclass">3.568,00</span>
                    <span class="discount_list_products_aluclass">- 66%</span>
                  {elseif {$product.id} == '758930'}
                    <span class="price price_risk_aluclass">5.958,00</span>
                    <span class="discount_list_products_aluclass">- 69%</span>
                  {elseif {$product.id} == '1133644'}
                    <span class="price price_risk_aluclass">1.156,00</span>
                    <span class="discount_list_products_aluclass">- 63%</span>
                  {elseif {$product.id} == '758917'}
                    <span class="price price_risk_aluclass">3.568,00</span>
                    <span class="discount_list_products_aluclass">- 66%</span>
                  {elseif {$product.id} == '1133655'}
                    <span class="price price_risk_aluclass">1.134,00</span>
                    <span class="discount_list_products_aluclass">- 58%</span>
                  {elseif {$product.id} == '850337'}
                    <span class="price price_risk_aluclass">1.698,00</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '1021069'}
                    <span class="price price_risk_aluclass">1.009,00</span>
                    <span class="discount_list_products_aluclass">- 53%</span>
                  {elseif {$product.id} == '1020935'}
                    <span class="price price_risk_aluclass">1.404,00</span>
                    <span class="discount_list_products_aluclass">- 59%</span>
                  {elseif {$product.id} == '1021071'}
                    <span class="price price_risk_aluclass">914,00</span>
                    <span class="discount_list_products_aluclass">- 55%</span>
                  {elseif {$product.id} == '1036501'}
                    <span class="price price_risk_aluclass">4.271,00</span>
                    <span class="discount_list_products_aluclass">- 67%</span>
                  {elseif {$product.id} == '1036502'}
                    <span class="price price_risk_aluclass">5.958,00</span>
                    <span class="discount_list_products_aluclass">- 69%</span>
                  {elseif {$product.id} == '1036508'}
                    <span class="price price_risk_aluclass">3.768,00</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '1036506'}
                    <span class="price price_risk_aluclass">4.488,00</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '595438'}
                    <span class="price price_risk_aluclass">2.709,00</span>
                    <span class="discount_list_products_aluclass">- 68%</span>
                  {elseif {$product.id} == '595523'}
                    <span class="price price_risk_aluclass">3.109,00</span>
                    <span class="discount_list_products_aluclass">- 67%</span>
                  {elseif {$product.id} == '1330923'}
                    <span class="price price_risk_aluclass">3.530,00</span>
                    <span class="discount_list_products_aluclass">- 69%</span>
                  {elseif {$product.id} == '1133624'}
                    <span class="price price_risk_aluclass">1.253,00 </span>
                    <span class="discount_list_products_aluclass">- 63%</span>
                  {elseif {$product.id} == '757177'}
                    <span class="price price_risk_aluclass">3.174,00 </span>
                    <span class="discount_list_products_aluclass">- 71%</span>
                  {elseif {$product.id} == '757865'}
                    <span class="price price_risk_aluclass">3.123,00 </span>
                    <span class="discount_list_products_aluclass">- 67%</span>
                  {elseif {$product.id} == '595552'}
                    <span class="price price_risk_aluclass">3.298,00 </span>
                    <span class="discount_list_products_aluclass">- 68%</span>
                  {elseif {$product.id} == '1329210'}
                    <span class="price price_risk_aluclass">6.846,00 </span>
                    <span class="discount_list_products_aluclass">- 50%</span>
                  {elseif {$product.id} == '1329446'}
                    <span class="price price_risk_aluclass">8.881,00 </span>
                    <span class="discount_list_products_aluclass">- 50%</span>
                  {elseif {$product.id} == '1329454'}
                    <span class="price price_risk_aluclass">5.323,00 </span>
                    <span class="discount_list_products_aluclass">- 50%</span>
                  {elseif {$product.id} == '1329442'}
                    <span class="price price_risk_aluclass">2.419,00 </span>
                    <span class="discount_list_products_aluclass">- 50%</span>
                  {elseif {$product.id} == '330690'}
                    <span class="price price_risk_aluclass">2.882,00 </span>
                    <span class="discount_list_products_aluclass">- 66%</span>
                  {elseif {$product.id} == '1133412'}
                    <span class="price price_risk_aluclass">3.554,00 </span>
                    <span class="discount_list_products_aluclass">- 72%</span>
                  {elseif {$product.id} == '1133416'}
                    <span class="price price_risk_aluclass">4.086,00 </span>
                    <span class="discount_list_products_aluclass">- 68%</span>
                  {elseif {$product.id} == '1133415'}
                    <span class="price price_risk_aluclass">4.086,00 </span>
                    <span class="discount_list_products_aluclass">- 68%</span>
                  {elseif {$product.id} == '1329614'}
                    <span class="price price_risk_aluclass">17.100,00 </span>
                    <span class="discount_list_products_aluclass">- 52%</span>
                  {elseif {$product.id} == '13410'}
                    <span class="price price_risk_aluclass">1.929,00 </span>
                    <span class="discount_list_products_aluclass">- 58%</span>
                  {elseif {$product.id} == '13411'}
                    <span class="price price_risk_aluclass">1.200,00 </span>
                    <span class="discount_list_products_aluclass">- 63%</span>
                  {elseif {$product.id} == '1230164'}
                    <span class="price price_risk_aluclass">1.015,00 </span>
                    <span class="discount_list_products_aluclass">- 56%</span>
                  {elseif {$product.id} == '1133610'}
                    <span class="price price_risk_aluclass">983,00 </span>
                    <span class="discount_list_products_aluclass">- 56%</span>
                  {elseif {$product.id} == '1336952'}
                    <span class="price price_risk_aluclass">257,00 </span>
                    <span class="discount_list_products_aluclass">- 50%</span>
                  {elseif {$product.id} == '1337250'}
                    <span class="price price_risk_aluclass">307,00 </span>
                    <span class="discount_list_products_aluclass">- 50%</span>
                  {elseif {$product.id} == '1337251'}
                    <span class="price price_risk_aluclass">396,00 </span>
                    <span class="discount_list_products_aluclass">- 50%</span>
                  {elseif {$product.id} == '1337252'}
                    <span class="price price_risk_aluclass">178,00 </span>
                    <span class="discount_list_products_aluclass">- 50%</span>
                  {elseif {$product.id} == '1337253'}
                    <span class="price price_risk_aluclass">200,00 </span>
                    <span class="discount_list_products_aluclass">- 50%</span>
                  {elseif {$product.id} == '1337254'}
                    <span class="price price_risk_aluclass">268,00 </span>
                    <span class="discount_list_products_aluclass">- 50%</span>
                  {elseif {$product.id} == '1337255'}
                    <span class="price price_risk_aluclass">293,00 </span>
                    <span class="discount_list_products_aluclass">- 50%</span>
                  {elseif {$product.id} == '1337258'}
                    <span class="price price_risk_aluclass">177,00 </span>
                    <span class="discount_list_products_aluclass">- 50%</span>
                  {else}
                    <span class="price price_risk_aluclass">{$infoProduto['preco_final_sem_desc']}</span>
                    <span class="discount_list_products_aluclass">- {$checaDescontosCatalogo['reduction']}</span>
                  {/if}
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
