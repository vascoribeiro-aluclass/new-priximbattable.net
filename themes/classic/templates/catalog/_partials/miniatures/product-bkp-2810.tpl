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
{block name='product_miniature_item'}
  <article class="product-miniature js-product-miniature" data-id-product="{$product.id_product}" data-id-product-attribute="{$product.id_product_attribute}">
    <div class="thumbnail-container">
      {block name='product_thumbnail'}
        {if $product.cover}
          <a href="{$product.url}" class="thumbnail product-thumbnail">
            <div class="img-a-medida img-a-medida-hide" data-divname="{$product.name}" data-dividprod="{$product.id_product}">
              <img loading="lazy" src="/img/cms/fr-regua.png" alt="">
            </div>
            <div class="img-promo img-a-medida-hide" data-divname="{$product.name}" data-dividprod="{$product.id_product}">
            <picture>
              <source srcset="img/cms/starter.webp" type="image/webp" />
              <img loading="lazy" src="img/cms/starter.png" />
            </picture>
            </div>
            <div class="img-a-top-prix img-a-medida-hide" data-divname="{$product.name}">
              <img loading="lazy" src="/img/cms/top-prix.png" alt="">
            </div>
            <div class="img-destockage img-a-medida-hide" data-divname="{$product.name}">
              <img loading="lazy" src="/img/cms/img-destockage.png" alt="">
            </div>
               <div class="img-fermeture img-a-medida-hide" data-divname="{$product.name}">
              <img loading="lazy" src="/img/cms/img-fermeture.png" alt="">
            </div>
            <div class="img-cloture-100 img-a-medida-hide" data-dividprod="{$product.id_product}">
              <img loading="lazy" src="/img/cms/top-prix.png" alt="">
            </div>
            <div class="img-cloture-200-4mm img-a-medida-hide" data-dividprod="{$product.id_product}">
              <img loading="lazy" src="/img/cms/top-prix.png" alt="">
            </div>
            <div class="img-cloture-200-5mm img-a-medida-hide" data-dividprod="{$product.id_product}">
              <img loading="lazy" src="/img/cms/gamepro.png" alt="">
            </div>
            <div class="img-black-friday img-a-medida-hide" data-dividprod="{$product.id_product}">
              <img loading="lazy" src="/img/cms/Tag_FR.png" alt="Black Friday">
            </div>
            <div class="img-40 img-a-medida-hide" data-dividprod="{$product.id_product}">
              <img loading="lazy" src="/img/cms/tag-40.png" alt="">
            </div>
            <div class="img-avatar-starter img-a-medida-hide" data-dividprod="{$product.id_product}">
              <img loading="lazy" src="/img/cms/FR_Avatar-Starter.png" alt="">
            </div>
            <div class="img-avatar-grandlux img-a-medida-hide" data-dividprod="{$product.id_product}">
              <img loading="lazy" src="/img/cms/FR_Avatar-Grandlux.png" alt="">
            </div>
            <div class="img-avatar-sur-mesure img-a-medida-hide" data-dividprod="{$product.id_product}">
              <img loading="lazy" src="/img/cms/FR_Avatar-SurMesure.png" alt="">
            </div>
            <img loading="lazy"
              src = "{$product.cover.bySize.home_default.url}"
              alt = "{if !empty($product.cover.legend)}{$product.cover.legend}{else}{$product.name|truncate:30:'...'}{/if}"
              data-full-size-image-url = "{$product.cover.large.url}"
            >
          </a>
        {else}
          <a href="{$product.url}" class="thumbnail product-thumbnail">
            <div class="img-a-medida img-a-medida-hide" data-divname="{$product.name}" data-dividprod="{$product.id_product}">
              <img loading="lazy"  src="/img/cms/fr-regua.png" alt="">
            </div>
            <div class="img-a-promo img-a-medida-hide" data-divname="{$product.name}" data-dividprod="{$product.id_product}">
              <img loading="lazy" src="/img/cms/promo.png" alt="">
            </div>
            <div class="img-a-top-prix img-a-medida-hide" data-divname="{$product.name}">
              <img loading="lazy" src="/img/cms/top-prix.png" alt="">
            </div>
            <div class="img-black-friday img-a-medida-hide" data-dividprod="{$product.id_product}">
              <img loading="lazy" src="/img/cms/Tag_FR.png" alt="Black Friday">
            </div>
            <div class="img-40 img-a-medida-hide" data-dividprod="{$product.id_product}">
              <img loading="lazy" src="/img/cms/tag-40.png" alt="">
            </div>
            <div class="img-avatar-starter img-a-medida-hide" data-dividprod="{$product.id_product}">
              <img loading="lazy" src="/img/cms/FR_Avatar-Starter.png" alt="">
            </div>
            <div class="img-avatar-grandlux img-a-medida-hide" data-dividprod="{$product.id_product}">
              <img loading="lazy" src="/img/cms/FR_Avatar-Grandlux.png" alt="">
            </div>
            <div class="img-avatar-sur-mesure img-a-medida-hide" data-dividprod="{$product.id_product}">
              <img loading="lazy" src="/img/cms/FR_Avatar-SurMesure.png" alt="">
            </div>
            <img
              src = "{$urls.no_picture_image.bySize.home_default.url}"
            >
          </a>
        {/if}
      {/block}

      <div class="product-description pt-3">
        {block name='product_name'}
          {if $page.page_name == 'index'}
            <h3 class="limit-char-line-title h3 product-title hack-prix" itemprop="name"><a href="{$product.url}">{$product.name}</a></h3>
          {else}
            <h2 class="limit-char-line-title h3 product-title hack-prix" itemprop="name"><a href="{$product.url}">{$product.name}</a></h2>
          {/if}
        {/block}

        {block name='product_price_and_shipping'}
          {if $product.show_price}
            <div class="pb-1 pt-1 product-price-and-shipping" style="margin-top: -5px; background-color: #FFF; width: 100%;">
            {if $product.has_discount}
                {hook h='displayProductPriceBlock' product=$product type="old_price"}

                <span class="sr-only" style="display: none;">{l s='Regular price' d='Shop.Theme.Catalog'}</span>
                {* <span class="regular-price">{$product.regular_price}</span> *}
                {assign var='infoProduto' value=Product::infoProduto({$product.id}, {$product.price_amount}, {$product.price_tax_exc})}
                <span class="regular-price" style="display: none;">{$infoProduto['preco_corrigido']}</span>
                {* <input type="text" value="{$infoProduto['preco_corrigido']}"> *}
                {* {if $product.discount_type === 'percentage'}
                  <span class="discount-percentage discount-product">{$product.discount_percentage}</span>
                {elseif $product.discount_type === 'amount'}
                <span class="pourcentagePr">

               -{$product.discount_to_display}

              </span>
                  <span class="discount-amount discount-product" style="display: none;">{$product.discount_amount_to_display}</span>
                {/if} *}
              {/if}

              {hook h='displayProductPriceBlock' product=$product type="before_price"}

              <span class="sr-only">{l s='Price' d='Shop.Theme.Catalog'}</span>
              {* <span itemprop="price" class="price">{$product.price}</span> *}

              {assign var='checaDescontosCatalogo' value=Product::checaDescontosCatalogo()}
              {if {$checaDescontosCatalogo['reduction']} >= 1}
                <span>
                  {* <span class="price price_risk_aluclass">{$product.price}</span> *}
                  {if {$product.id} == '640030'}
                    <span class="price price_risk_aluclass">2409,84</span>
                    <span class="discount_list_products_aluclass">- 39%</span>
                  {elseif {$product.id} == '640036'}
                    <span class="price price_risk_aluclass">1531,88</span>
                    <span class="discount_list_products_aluclass">- 49.8%</span>
                  {elseif {$product.id} == '640013'}
                    <span class="price price_risk_aluclass">17170 €</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '640032'}
                    <span class="price price_risk_aluclass">9675,82</span>
                    <span class="discount_list_products_aluclass">- 38%</span>
                  {elseif {$product.id} == '640033'}
                    <span class="price price_risk_aluclass">136,85</span>
                    <span class="discount_list_products_aluclass">- 32.5%</span>
                  {elseif {$product.id} == '640056'}
                    <span class="price price_risk_aluclass">1042,21</span>
                    <span class="discount_list_products_aluclass">- 30.7%</span>
                  {elseif {$product.id} == '640034'}
                    <span class="price price_risk_aluclass">131,60</span>
                    <span class="discount_list_products_aluclass">- 33.1%</span>
                  {elseif {$product.id} == '640067'}
                    <span class="price price_risk_aluclass">1001,81</span>
                    <span class="discount_list_products_aluclass">- 30.9%</span>
                  {elseif {$product.id} == '640035'}
                    <span class="price price_risk_aluclass">166,84</span>
                    <span class="discount_list_products_aluclass">- 31.4%</span>
                  {elseif {$product.id} == '640069'}
                    <span class="price price_risk_aluclass">1215,41</span>
                    <span class="discount_list_products_aluclass">- 29.9%</span>
                  {elseif {$product.id} == '107438'}
                    <span class="price price_risk_aluclass">2.965,00</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '13498'}
                    <span class="price price_risk_aluclass">2.071,00</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '13499'}
                    <span class="price price_risk_aluclass">1.463,00</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '107549'}
                    <span class="price price_risk_aluclass">2.316,00</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '899619'}
                    <span class="price price_risk_aluclass">3.040,54</span>
                    <span class="discount_list_products_aluclass">- 40%</span>

                  {elseif {$product.id} == '480595'}
                    <span class="price price_risk_aluclass">1.863,00</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '480610'}
                    <span class="price price_risk_aluclass">1.816,00</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '481814'}
                    <span class="price price_risk_aluclass">2.030,00</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '481988'}
                    <span class="price price_risk_aluclass">1.995,00</span>
                    <span class="discount_list_products_aluclass">- 40%</span>

                  {elseif {$product.id} == '482021'}
                    <span class="price price_risk_aluclass">1.816,00</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '482120'}
                    <span class="price price_risk_aluclass">2.208,00</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '482270'}
                    <span class="price price_risk_aluclass">1.863,00</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '507392'}
                    <span class="price price_risk_aluclass">1.952,00</span>
                    <span class="discount_list_products_aluclass">- 40%</span>

                  {elseif {$product.id} == '595347'}
                    <span class="price price_risk_aluclass">1.826,00</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '613912'}
                    <span class="price price_risk_aluclass">1.324,00</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '613919'}
                    <span class="price price_risk_aluclass">1.324,00</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '613980'}
                    <span class="price price_risk_aluclass">2.316,00</span>
                    <span class="discount_list_products_aluclass">- 40%</span>

                  {elseif {$product.id} == '739300'}
                    <span class="price price_risk_aluclass">2.125,00</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '752221'}
                    <span class="price price_risk_aluclass">1.899,48</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '752237'}
                    <span class="price price_risk_aluclass">2.130,00</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '752252'}
                    <span class="price price_risk_aluclass">2.130,00</span>
                    <span class="discount_list_products_aluclass">- 40%</span>

                  {elseif {$product.id} == '752755'}
                    <span class="price price_risk_aluclass">1.774,70</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '752771'}
                    <span class="price price_risk_aluclass">2.071,50</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '752781'}
                    <span class="price price_risk_aluclass">2.071,50</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '754587'}
                    <span class="price price_risk_aluclass">3.231,00</span>
                    <span class="discount_list_products_aluclass">- 40%</span>

                  {elseif {$product.id} == '754596'}
                    <span class="price price_risk_aluclass">2.993,00</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '755281'}
                    <span class="price price_risk_aluclass">1.758,00</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '755289'}
                    <span class="price price_risk_aluclass">1.850,90</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '755290'}
                    <span class="price price_risk_aluclass">1.945,34</span>
                    <span class="discount_list_products_aluclass">- 40%</span>

                  {elseif {$product.id} == '757129'}
                    <span class="price price_risk_aluclass">2.088,00</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '757152'}
                    <span class="price price_risk_aluclass">1.831,91</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '757173'}
                    <span class="price price_risk_aluclass">1.797,00</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '757177'}
                    <span class="price price_risk_aluclass">1.886,92</span>
                    <span class="discount_list_products_aluclass">- 40%</span>

                  {elseif {$product.id} == '757182'}
                    <span class="price price_risk_aluclass">1.981,30</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '757208'}
                    <span class="price price_risk_aluclass">2.125,00</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '757227'}
                    <span class="price price_risk_aluclass">1.785,00</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '757280'}
                    <span class="price price_risk_aluclass">1.856,94</span>
                    <span class="discount_list_products_aluclass">- 40%</span>


                  {elseif {$product.id} == '757284'}
                    <span class="price price_risk_aluclass">1.933,00</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '757289'}
                    <span class="price price_risk_aluclass">2.024,00</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '757295'}
                    <span class="price price_risk_aluclass">2.096,37</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '757409'}
                    <span class="price price_risk_aluclass">1.915,00</span>
                    <span class="discount_list_products_aluclass">- 40%</span>

                  {elseif {$product.id} == '757869'}
                    <span class="price price_risk_aluclass">1.744,00</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '757881'}
                    <span class="price price_risk_aluclass">1.936,95</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '757897'}
                    <span class="price price_risk_aluclass">2.088,00</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '757909'}
                    <span class="price price_risk_aluclass">2.224,37</span>
                    <span class="discount_list_products_aluclass">- 40%</span>

                  {elseif {$product.id} == '757982'}
                    <span class="price price_risk_aluclass">2.101,75</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '757995'}
                    <span class="price price_risk_aluclass">2.344,00</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '758030'}
                    <span class="price price_risk_aluclass">1.776,38</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '758076'}
                    <span class="price price_risk_aluclass">1.902,00</span>
                    <span class="discount_list_products_aluclass">- 40%</span>

                  {elseif {$product.id} == '757419'}
                    <span class="price price_risk_aluclass">2.007,00</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '757422'}
                    <span class="price price_risk_aluclass">2.292,60</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '757859'}
                    <span class="price price_risk_aluclass">2.119,00</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '757863'}
                    <span class="price price_risk_aluclass">2.231,40</span>
                    <span class="discount_list_products_aluclass">- 40%</span>

                  {elseif {$product.id} == '758091'}
                    <span class="price price_risk_aluclass">1.948,00</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '758093'}
                    <span class="price price_risk_aluclass">2.073,89</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '758097'}
                    <span class="price price_risk_aluclass">1.758,00</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '758103'}
                    <span class="price price_risk_aluclass">1.850,92</span>
                    <span class="discount_list_products_aluclass">- 40%</span>

                  {elseif {$product.id} == '758106'}
                    <span class="price price_risk_aluclass">1.945,34</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '758120'}
                    <span class="price price_risk_aluclass">1.995,00</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '758650'}
                    <span class="price price_risk_aluclass">1.952,00</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '758659'}
                    <span class="price price_risk_aluclass">2.073,89</span>
                    <span class="discount_list_products_aluclass">- 40%</span>

                  {elseif {$product.id} == '758689'}
                    <span class="price price_risk_aluclass">2.208,00</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '758879'}
                    <span class="price price_risk_aluclass">1.539,81</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '758905'}
                    <span class="price price_risk_aluclass">1.523,00</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '758914'}
                    <span class="price price_risk_aluclass">2.130,00</span>
                    <span class="discount_list_products_aluclass">- 40%</span>

                  {elseif {$product.id} == '758917'}
                    <span class="price price_risk_aluclass">2.130,00</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '758923'}
                    <span class="price price_risk_aluclass">2.542,00</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '758925'}
                    <span class="price price_risk_aluclass">2.542,00</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '758930'}
                    <span class="price price_risk_aluclass">3.616,67</span>
                    <span class="discount_list_products_aluclass">- 40%</span>

                  {elseif {$product.id} == '758940'}
                    <span class="price price_risk_aluclass">2.130,00</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '806568'}
                    <span class="price price_risk_aluclass">4.365,00</span>
                    <span class="discount_list_products_aluclass">- 40%</span>

                  {elseif {$product.id} == '807618'}
                    <span class="price price_risk_aluclass">2.357,86</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '807629'}
                    <span class="price price_risk_aluclass">2.318,32</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '807704'}
                    <span class="price price_risk_aluclass">1.962,37</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '893512'}
                    <span class="price price_risk_aluclass">1.840,00</span>
                    <span class="discount_list_products_aluclass">- 40%</span>

                  {elseif {$product.id} == '893515'}
                    <span class="price price_risk_aluclass">1.816,00</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '893517'}
                    <span class="price price_risk_aluclass">2.056,33</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '893523'}
                    <span class="price price_risk_aluclass">2.205,00</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '893524'}
                    <span class="price price_risk_aluclass">2.348,87</span>
                    <span class="discount_list_products_aluclass">- 40%</span>

                  {elseif {$product.id} == '893527'}
                    <span class="price price_risk_aluclass">2.498,35</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '893768'}
                    <span class="price price_risk_aluclass">2.312,70</span>
                    <span class="discount_list_products_aluclass">- 40%</span>

                  {*Verrières type atelier*}

                  {elseif {$product.id} == '13356'}
                    <span class="price price_risk_aluclass">152,17</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '13365'}
                    <span class="price price_risk_aluclass">239,13</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '13455'}
                    <span class="price price_risk_aluclass">282,61</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '13340'}
                    <span class="price price_risk_aluclass">378,26</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '13344'}
                    <span class="price price_risk_aluclass">469,57</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '13348'}
                    <span class="price price_risk_aluclass">595,65</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '13352'}
                    <span class="price price_risk_aluclass">691,30</span>
                    <span class="discount_list_products_aluclass">- 40%</span>

                  {elseif {$product.id} == '13456'}
                    <span class="price price_risk_aluclass">295,65</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '13457'}
                    <span class="price price_risk_aluclass">395,65</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '13458'}
                    <span class="price price_risk_aluclass">495,65</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '13459'}
                    <span class="price price_risk_aluclass">626,09</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '13460'}
                    <span class="price price_risk_aluclass">726,09</span>
                    <span class="discount_list_products_aluclass">- 40%</span>


                  {elseif {$product.id} == '121351'}
                    <span class="price price_risk_aluclass">286,96</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '385060'}
                    <span class="price price_risk_aluclass">395,65</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '77537'}
                    <span class="price price_risk_aluclass">330,43</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '385439'}
                    <span class="price price_risk_aluclass">447,83</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '121343'}
                    <span class="price price_risk_aluclass">739,13</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '385629'}
                    <span class="price price_risk_aluclass">860,87</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '121341'}
                    <span class="price price_risk_aluclass">317,39</span>
                    <span class="discount_list_products_aluclass">- 40%</span>
                  {elseif {$product.id} == '385724'}
                    <span class="price price_risk_aluclass">434,78</span>
                    <span class="discount_list_products_aluclass">- 40%</span>

                  {*Janelas *}
                  {elseif {$product.id} == '229'}
                    <span class="price price_risk_aluclass">1.194,00</span>
                    <span class="discount_list_products_aluclass">- 25%</span>
                  {elseif {$product.id} == '29243'}
                    <span class="price price_risk_aluclass">622,00</span>
                    <span class="discount_list_products_aluclass">- 25%</span>
                  {elseif {$product.id} == '29590'}
                    <span class="price price_risk_aluclass">1.103,00</span>
                    <span class="discount_list_products_aluclass">- 25%</span>
                  {elseif {$product.id} == '29591'}
                    <span class="price price_risk_aluclass">1.232,00</span>
                    <span class="discount_list_products_aluclass">- 25%</span>
                  {elseif {$product.id} == '29592'}
                    <span class="price price_risk_aluclass">942,00</span>
                    <span class="discount_list_products_aluclass">- 25%</span>
                  {elseif {$product.id} == '29593'}
                    <span class="price price_risk_aluclass">1.710,00</span>
                    <span class="discount_list_products_aluclass">- 25%</span>
                  {elseif {$product.id} == '29594'}
                    <span class="price price_risk_aluclass">1.908,00</span>
                    <span class="discount_list_products_aluclass">- 25%</span>
                  {elseif {$product.id} == '29035'}
                    <span class="price price_risk_aluclass">526,00</span>
                    <span class="discount_list_products_aluclass">- 25%</span>
                  {elseif {$product.id} == '19806'}
                    <span class="price price_risk_aluclass">644,00</span>
                    <span class="discount_list_products_aluclass">- 25%</span>
                  {elseif {$product.id} == '29115'}
                    <span class="price price_risk_aluclass">1.017,00</span>
                    <span class="discount_list_products_aluclass">- 25%</span>
                  {elseif {$product.id} == '29117'}
                    <span class="price price_risk_aluclass">1.317,00</span>
                    <span class="discount_list_products_aluclass">- 25%</span>
                  {elseif {$product.id} == '29133'}
                    <span class="price price_risk_aluclass">872,00</span>
                    <span class="discount_list_products_aluclass">- 25%</span>
                  {elseif {$product.id} == '29135'}
                    <span class="price price_risk_aluclass">1.106,00</span>
                    <span class="discount_list_products_aluclass">- 25%</span>
                  {elseif {$product.id} == '29136'}
                    <span class="price price_risk_aluclass">1.726,00</span>
                    <span class="discount_list_products_aluclass">- 25%</span>
                  {elseif {$product.id} == '29138'}
                    <span class="price price_risk_aluclass">2.222,00</span>
                    <span class="discount_list_products_aluclass">- 25%</span>
                  {elseif {$product.id} == '30188'}
                    <span class="price price_risk_aluclass">1.248,00</span>
                    <span class="discount_list_products_aluclass">- 25%</span>
                  {elseif {$product.id} == '30203'}
                    <span class="price price_risk_aluclass">1.767,00</span>
                    <span class="discount_list_products_aluclass">- 25%</span>
                  {elseif {$product.id} == '30176'}
                    <span class="price price_risk_aluclass">1.425,00</span>
                    <span class="discount_list_products_aluclass">- 25%</span>
                  {elseif {$product.id} == '30198'}
                    <span class="price price_risk_aluclass">2.117,00</span>
                    <span class="discount_list_products_aluclass">- 25%</span>
                  {elseif {$product.id} == '30656'}
                    <span class="price price_risk_aluclass">450,00</span>
                    <span class="discount_list_products_aluclass">- 25%</span>
                  {elseif {$product.id} == '30664'}
                    <span class="price price_risk_aluclass">411,00</span>
                    <span class="discount_list_products_aluclass">- 25%</span>
                  {elseif {$product.id} == '35522'}
                    <span class="price price_risk_aluclass">251,00</span>
                    <span class="discount_list_products_aluclass">- 25%</span>
                  {else}
                    <span class="price price_risk_aluclass">{$infoProduto['preco_final_sem_desc']}</span>
                    <span class="discount_list_products_aluclass">- {$checaDescontosCatalogo['reduction']}</span>
                  {/if}
                  {* <span class="price price_risk_aluclass">{$infoProduto['preco_final_sem_desc']}</span> *}
                  {* <span class="discount_list_products_aluclass">- {$checaDescontosCatalogo['reduction']}</span> *}
                  {assign var='precoAtualizadoSEO' value=Product::precoAtualizadoSEO({$infoProduto['preco_final_sem_desc_seo']}, {$checaDescontosCatalogo['reduction_value']})}
                  <span itemprop="price" class="price_final_aluclass">{$precoAtualizadoSEO['preco_com_desconto_catalogo_view']}</span>
                </span>
              {else}
                <span itemprop="price" class="price_final_no_discount_aluclass">{$product.price}</span>
              {/if}

              <div class ="pt-1 pb-1">
                {if {$product.price_amount} < 3001}
                  {assign var="multony" value=4}
                {else}
                  {assign var="multony" value=48}
                {/if}
                <a href="/content/15-le-paiement-en-4-fois-avec-oney" target="_blank" data-toggle="tooltip" title="Mensualités hors coût de financement voir conditions"> <span style="width: 100%; padding: 0 5px;" class="price productPriceUpx4  alu_oney_show_box" >{$multony}x{($product.price_amount/$multony)|round:2}€<img style="width: 110px; display: inline-block;" src="/img/Oney{$multony}.png"  width="110px" height="auto"></span></a>
              </div>

              {hook h='displayProductPriceBlock' product=$product type='unit_price'}

              {hook h='displayProductPriceBlock' product=$product type='weight'}
            </div>
          {/if}
        {/block}
        <div class="prazoentrega_all" data-dividprod = "{$product.id_product}" data-dividcat = "{$product.id_category_default}"> </div>
        {block name='product_reviews'}
          {hook h='displayProductListReviews' product=$product}
        {/block}

		 {block name='product_description_short'}
              <!--<div class="product-description-short" itemprop="description">{$product.description_short|truncate:800:'...' nofilter}

              </div>
              <div></div>
              <div></div>
              <div></div>
              <div></div>
              <div></div>
              <div></div> retirado a pedido do Sr Costa, 10/12/2019, Paulo -->
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
                {assign var='checarNumCamposNDK' value=NdkCf::isRequiredCustomization($product.id_product, $product.id_category_default)}
                {if {$checarNumCamposNDK} == ''}
                  {$checarNumCamposNDK = 0}
                {/if}
                {if {$checarNumCamposNDK} == 0 && {$product.id_product_attribute} == 0}
                <button data-button-action="add-to-cart" class="btn grid-cart-btn btn-primary" {if $product.availability == 'unavailable'}disabled{/if}>
                              Ajouter au panier
                </button>
                {/if}
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
