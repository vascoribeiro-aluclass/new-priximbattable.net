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
{if $product.id_product == 13432}

  {* Inicio bloco Pack Tranquillisime *}
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700&display=swap" rel="stylesheet">

  <div class="product-line-grid-pack">
    <!--  product left content: image-->
    <div class="product-line-grid-left col-md-3 col-xs-4">
      {if {$product.id_customization|intval} == "0"}
        <span class="product-image media-middle">
          <img class="img-product-pack" src="{$product.cover.bySize.cart_default.url}"
            alt="{$product.name|escape:'quotes'}">
        </span>
      {else}
        <span class="product-image media-middle">
          <input type="hidden" id="teste"
            value="{Context::getContext()->customer->id|intval}-{$product.id_product|intval}-{$product.id_customization|intval}">
          {assign var="urlRenderLink" value="img/scenes/ndkcf/pdf/{Context::getContext()->customer->id|intval}/{$product.id_product|intval}/{$product.id_customization|intval}/render.html"}
          {if file_exists({$urlRenderLink})}
            <!--<iframe data-thumbchave="{$product.id_customization|intval}" src="" frameborder="0" width="100%" height="100%" scrolling="no" style="overflow: hidden;"></iframe>-->
            <iframe
              src="{$urls.base_url}img/scenes/ndkcf/pdf/{Context::getContext()->customer->id|intval}/{$product.id_product|intval}/{$product.id_customization|intval}/render.html"
              frameborder="0" width="100%" height="100%" scrolling="no" style="overflow: hidden;"></iframe>
            <div class="pb-2" style="margin: 0px auto; text-align: center;">
              <div style="padding: 3px; margin: 0px auto;"
                class="btn btn-primary btn-default btn-xs aluclass_linkRender hidden-md-up"
                onclick="aluclass_linkRender('{$urls.base_url}img/scenes/ndkcf/pdf/{Context::getContext()->customer->id|intval}/{$product.id_product|intval}/{$product.id_customization|intval}/render.html')"
                data-chave="{$product.id_customization|intval}" href="#"
                data-renderhtml="{$urls.base_url}img/scenes/ndkcf/pdf/{Context::getContext()->customer->id|intval}/{$product.id_product|intval}/{$product.id_customization|intval}/render.html"
                style="text-decoration:none">Aperçu</div>
            </div>
          {else}
            <img src="{$product.cover.bySize.cart_default.url}" alt="{$product.name|escape:'quotes'}"
              style="width: 138px; height: 138px; margin: 8px;">
          {/if}
          <!-- <code>
       {$product.id_customization|intval}
     </code> -->
        </span>
      {/if}
    </div>

    <!--  product left body: description -->
    <div class="product-line-grid-body col-md-6 col-xs-8">
    {*if $product.id_product == 13432}
      <!--<div class="info-pack tooltip-info-pack">
        <i class="material-icons">
          info
        </i>
        <span class="tooltiptext-info-pack">Une Tranquillité en cas de problème. En cas d'avarie, vol, perte pendant le
        transport, nous nous engageons à remplir toutes les démarches auprès du transporteur (lettre recommandée,
        relance...) afin que celui-ci apporte une réponse rapide. Nous nous engageons à vous renvoyer les produits dans
        les plus brefs délais, ou à vous rembourser sous 7 jours en cas de non disponibilité.</span>
    </div>-->
    {/if*}


    <div class="product-line-info-pack">
      <!-- <a class="label" href="{$product.url}" data-id_customization="{$product.id_customization|intval}">{$product.name}</a> -->
      {$product.name}
    </div>
    <span class="tooltiptext-info-pack">Une Tranquillité en cas de
      problème.</span>
    <div class="verified-container-pack">
      <span class="material-symbols-outlined">verified_user</span>
      <span class="verified-pack"><strong>En cas d'avarie,
          vol, perte pendant le transport, nous nous engageons à remplir toutes les démarches auprès du
          transporteur</strong> (lettre recommandée, relance...) <strong> afin que celui-ci apporte une réponse
          rapide.</strong></span>
    </div>
    <div {if $product.discount_type === 'percentage'}class="verified-container-pack" {else}
      class="verified-container-pack-discount" {/if}>
      <span class="material-symbols-outlined">handshake</span>
      <span class="verified-pack"><strong>Nous nous engageons
          à vous renvoyer les produits dans les plus brefs délais, ou à vous rembourser sous 7 jours en cas de non
          disponibilité.</strong></span>
    </div>



    {* Bloco de desconto Pack Tranquillissime (Retirado)
    <div class="product-line-info product-price h5 {if $product.has_discount}has-discount{/if}" style="display: none;">
      {if $product.has_discount}
      <div class="product-discount">
        {if $product.name|strstr:"PORTAIL DECORNOX GRIS 7016 BATTANT OU COULISSANT AVEC DÉCOR SICILE NORMAL"}
        --<span class="regular-price">{$product.regular_price}</span>
        {else}
        <span class="regular-price">{$product.regular_price}</span>
        {/if}
        --<span class="regular-price">{$product.regular_price}</span>
        {if $product.discount_type === 'percentage'}
        {if $product.name|strstr:"PORTAIL DECORNOX GRIS 7016 BATTANT OU COULISSANT AVEC DÉCOR SICILE NORMAL"}
        -- -{$product.discount_percentage_absolute}
        {else}
        <span class="discount discount-percentage">
          -{$product.discount_percentage_absolute}
        </span>
        {/if}
       --<span class="discount discount-percentage">
               -{$product.discount_percentage_absolute}
             </span>
        {else}
        <span class="discount discount-amount" style="margin-left: 0;">
          -{$product.discount_to_display}
        </span>
        {/if}
      </div>
      {/if}
      <div class="current-price">
        <span class="price">{$product.price}</span>
        {if $product.unit_price_full}
        <div class="unit-price-cart">{$product.unit_price_full}</div>
        {/if}
      </div>
    </div>
     Fim Bloco de desconto (Retirado) *}

    <br /><br />

    {foreach from=$product.attributes key="attribute" item="value"}
    <div class="product-line-info">
      <span class="label">{$attribute}:</span>
      <span class="value">{$value}</span>
    </div>
    {/foreach}

    {if is_array($product.customizations) && $product.customizations|count}
    <!-- <br> -->
    {block name='cart_detailed_product_line_customization'}
    {foreach from=$product.customizations item="customization"}
    <!-- <a href="#" data-toggle="modal" data-target="#product-customizations-modal-{$customization.id_customization}">{l s='Product customization' d='Shop.Theme.Catalog'}</a>
         <div class="modal fade customization-modal" id="product-customizations-modal-{$customization.id_customization}" tabindex="-1" role="dialog" aria-hidden="true">
           <div class="modal-dialog" role="document">
             <div class="modal-content">
               <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
                 <h4 class="modal-title">{l s='Product customization' d='Shop.Theme.Catalog'}</h4>
               </div>
               <div class="modal-body">
                 {foreach from=$customization.fields item="field"}
                   <div class="product-customization-line row">
                     <div class="col-sm-3 col-xs-4 label">
                       {$field.label}
                     </div>
                     <div class="col-sm-9 col-xs-8 value">
                       {if $field.type == 'text'}
                         {if (int)$field.id_module}
                           {$field.text nofilter}
                         {else}
                           {$field.text}
                         {/if}
                       {elseif $field.type == 'image'}
                         <img src="{$field.image.small.url}">
                       {/if}
                     </div>
                   </div>
                 {/foreach}
               </div>
             </div>
           </div>
         </div> -->
    {/foreach}
    {/block}
    {/if}




  </div>




  {* Bloco valor Total Pack Tranquillisime *}

  <!--  product left body: description -->
  <div class="product-line-grid-right-pack product-line-actions-pack col-md-3 col-xs-12">
    <!--<div class="row">-->
    <div class="col-xs-4 hidden-md-up"></div>

    <div class="">
      <div class="row">
        <div class="col-md-10 col-xs-10 total-product-pack">
          <div class="row">


            <div class="desconto">
              <div class="col-md-6 col-xs-6 qty">
                {if isset($product.is_gift) && $product.is_gift}
                <span class="gift-quantity">{$product.quantity}</span>
                {else}
                {if $product.id_product == 13432}
                {else}
                <input class="js-cart-line-product-quantity" data-down-url="{$product.down_quantity_url}"
                  data-up-url="{$product.up_quantity_url}" data-update-url="{$product.update_quantity_url}"
                  data-product-id="{$product.id_product}" type="text" value="{$product.quantity}"
                  name="product-quantity-spin" min="{$product.minimal_quantity}" />
                {/if}
                {/if}
              </div>
              <div class="col-md-6 col-xs-2 price">
                <span {if $product.discount_type === 'percentage'}class="product-price product-price-pack"
                  {else}class="product-price-discount" {/if}>
                  <strong>
                    {if $product.has_discount}
                    <div class="product-line-info product-price h5 product-line-info-desconto has-discount">
                      <div class="product-discount">
                        <span class="regular-price">{$product.regular_price}</span>
                        {if $product.discount_type === 'percentage'}
                        <div class="current-price-pack">
                          <span class="price">{$product.price}</span>
                          {if $product.unit_price_full}
                          <div class="unit-price-cart">{$product.unit_price_full}</div>
                          {/if}
                        </div>
                        {else}
                        <span class="discount discount-amount" style="margin-left: 0;">
                          -{$product.discount_to_display}
                        </span>
                        {/if}
                      </div>
                      <span class="discount-pack discount-percentage">
                        -{$product.discount_percentage_absolute}
                      </span>
                    </div>
                    {else}
                    {$product.total}
                    {/if}

                  </strong>
                </span>

              </div>
              <a {if $product.discount_type === 'percentage'}class="btn-pack" {else}class="btn-pack-discount" {/if}
                href="/content/16-pack-tranquillissime" target="_blank">Lire nos
                recommandations<img src="/themes/classic/templates/checkout/_partials/tap-click.png" alt="Clik Here"
                  style="transform: matrix(0.89, -0.45, 0.45, 0.89, 0, 0); width:36px; height:36px; position:relative; top:.7rem; left:1rem;"></a>

            </div>



            <div {if $product.discount_type === 'percentage'}class="delete" {else}class="delete-discount" {/if}>
              <div class="hidden-md-down">
                <div class="col-md-2 col-xs-2 text-right delete-pack">
                  <div class="cart-line-product-actions" {if $product.id_product == 13432} onclick="RemovePack()" {/if}>
                    <a class="remove-from-cart" rel="nofollow" href="{$product.remove_from_cart_url}"
                      data-link-action="delete-from-cart" data-id-product="{$product.id_product|escape:'javascript'}"
                      data-id-product-attribute="{$product.id_product_attribute|escape:'javascript'}"
                      data-id-customization="{$product.id_customization|escape:'javascript'}">
                      {if !isset($product.is_gift) || !$product.is_gift}
                      <div class="icons-material-pack"><i
                          class="material-icons material-icons-pack float-xs-left">delete</i></div>
                      {/if}
                    </a>

                    {block name='hook_cart_extra_product_actions'}
                    {hook h='displayCartExtraProductActions' product=$product}
                    {/block}

                  </div>
                </div>
              </div>

              <div class="hidden-md-up">
                <div class="col-md-2 col-xs-2 text-right mobile-pack">
                  <div class="cart-line-product-actions" {if $product.id_product == 13432} onclick="RemovePack()" {/if}>
                    <a class="remove-from-cart" rel="nofollow" href="{$product.remove_from_cart_url}"
                      data-link-action="delete-from-cart" data-id-product="{$product.id_product|escape:'javascript'}"
                      data-id-product-attribute="{$product.id_product_attribute|escape:'javascript'}"
                      data-id-customization="{$product.id_customization|escape:'javascript'}">
                      {if !isset($product.is_gift) || !$product.is_gift}
                      <div class="imaterial-mobile-pack"><i
                          class="material-icons material-icons-mobile-pack  float-xs-left" style="">delete</i></div>
                      {/if}
                    </a>

                    {block name='hook_cart_extra_product_actions'}
                    {hook h='displayCartExtraProductActions' product=$product}
                    {/block}

                  </div>
                </div>
              </div>
            </div>


          </div>
        </div>
      </div>
    </div>

    <!--</div>-->
  </div>

  {* Fim Bloco valor Total *}


  <div class="col-md-12 mt-0">
    <div class="col-md-3 col-xs-4" style="text-align: center;">
      {if {$product.id_customization|intval} != "0"}
      <div style="margin-right: 12px;" class="btn btn-primary btn-default aluclass_linkRender hidden-md-down"
        onclick="aluclass_linkRender('{$urls.base_url}img/scenes/ndkcf/pdf/{Context::getContext()->customer->id|intval}/{$product.id_product|intval}/{$product.id_customization|intval}/render.html')"
        data-chave="{$product.id_customization|intval}" href="#"
        data-renderhtml="{$urls.base_url}img/scenes/ndkcf/pdf/{Context::getContext()->customer->id|intval}/{$product.id_product|intval}/{$product.id_customization|intval}/render.html"
        style="text-decoration:none"><i class="icon-search"></i>&nbsp;Aperçu</div>
      {/if}
    </div>
    <div class="col-md-9 col-xs-8">
      <small>
        {if isset($customization)}
        {foreach from=$customization.fields item="field"}
        {if {$field.label} != 'Aperçu' && {$field.label} != 'Preview' && {$field.label} != 'preview' && {$field.label}
        != 'reference'}
        <strong>{$field.label}: </strong>
        {if $field.type == 'text'}
        {if (int)$field.id_module}
        {$field.text nofilter}
        {else}
        {$field.text nofilter}
        {/if}
        {/if}<br>
        {/if}
        {/foreach}
        {/if}
      </small>
    </div>
  </div>

  <div class="clearfix"></div>
</div>



{* Fim bloco Pack Tranquillisime *}

{else}

{* Inicio bloco Produto *}

<div class="product-line-grid">
  <!--  product left content: image-->
  <div class="product-line-grid-left col-md-3 col-xs-4">
    {if {$product.id_customization|intval} == "0"}
    <span class="product-image media-middle">
      <img src="{$product.cover.bySize.cart_default.url}" alt="{$product.name|escape:'quotes'}"
        style="width: 10rem; height: 10rem; margin: .5rem; margin-top: 1.2rem;">
    </span>
    {else}
    <span class="product-image media-middle">
      <input type="hidden" id="teste"
        value="{Context::getContext()->customer->id|intval}-{$product.id_product|intval}-{$product.id_customization|intval}">
      {assign var="urlRenderLink" value="img/scenes/ndkcf/pdf/{Context::getContext()->customer->id|intval}/{$product.id_product|intval}/{$product.id_customization|intval}/render.html"}
      {if file_exists({$urlRenderLink})}
      <!--<iframe data-thumbchave="{$product.id_customization|intval}" src="" frameborder="0" width="100%" height="100%" scrolling="no" style="overflow: hidden;"></iframe>-->
      <iframe
        src="{$urls.base_url}img/scenes/ndkcf/pdf/{Context::getContext()->customer->id|intval}/{$product.id_product|intval}/{$product.id_customization|intval}/render.html"
        frameborder="0" width="100%" height="100%" scrolling="no" style="overflow: hidden;"></iframe>
      <div class="pb-2" style="margin: 0px auto; text-align: center;">
        <div style="padding: 3px; margin: 0px auto;"
          class="btn btn-primary btn-default btn-xs aluclass_linkRender hidden-md-up"
          onclick="aluclass_linkRender('{$urls.base_url}img/scenes/ndkcf/pdf/{Context::getContext()->customer->id|intval}/{$product.id_product|intval}/{$product.id_customization|intval}/render.html')"
          data-chave="{$product.id_customization|intval}" href="#"
          data-renderhtml="{$urls.base_url}img/scenes/ndkcf/pdf/{Context::getContext()->customer->id|intval}/{$product.id_product|intval}/{$product.id_customization|intval}/render.html"
          style="text-decoration:none">Aperçu</div>
      </div>
      {else}
      <img src="{$product.cover.bySize.cart_default.url}" alt="{$product.name|escape:'quotes'}"
        style="width: 138px; height: 138px; margin: 8px;">
      {/if}
      <!-- <code>
       {$product.id_customization|intval}
     </code> -->
    </span>
    {/if}
  </div>







  <!--  product left body: description -->
  <div class="product-line-grid-body col-md-4 col-xs-8">

    <div class="product-line-info">
      <!-- <a class="label" href="{$product.url}" data-id_customization="{$product.id_customization|intval}">{$product.name}</a> -->
      {$product.name}
    </div>

    {* Bloco de desconto *}

    <div class="product-line-info product-price h5 {if $product.has_discount}has-discount{/if}">
      {if $product.has_discount}
      <div class="product-discount">
        {if $product.name|strstr:"Fenêtre PVC 1 Vantail à Rupture de Pont Thermique Sur Mesure"}
        <span class="regular-price">{number_format({$product.price|replace:',':'.'|replace:'€':''|strip:''} / 0.6, 2,
          ',', ' ')} €</span>
        {elseif $product.name|strstr:"Fenêtre PVC 2 Vantaux à Rupture de Pont Thermique Sur Mesure"}
        <span class="regular-price">{number_format({$product.price|replace:',':'.'|replace:'€':''|strip:''} / 0.6, 2,
          ',', ' ')} €</span>
        {elseif $product.name|strstr:"Fenêtre PVC 3 Vantaux à Rupture de Pont Thermique Sur Mesure"}
        <span class="regular-price">{number_format({$product.price|replace:',':'.'|replace:'€':''|strip:''} / 0.6, 2,
          ',', ' ')} €</span>
        {elseif $product.name|strstr:"Fenêtre PVC 4 Vantaux à Rupture de Pont Thermique Sur Mesure"}
        <span class="regular-price">{number_format({$product.price|replace:',':'.'|replace:'€':''|strip:''} / 0.6, 2,
          ',', ' ')} €</span>
        {elseif $product.name|strstr:"Porte-Fenêtre PVC 1 Vantail à Rupture de Pont Thermique Sur Mesure"}
        <span class="regular-price">{number_format({$product.price|replace:',':'.'|replace:'€':''|strip:''} / 0.6, 2,
          ',', ' ')} €</span>
        {elseif $product.name|strstr:"Porte-Fenêtre PVC 2 Vantaux à Rupture de Pont Thermique Sur Mesure"}
        <span class="regular-price">{number_format({$product.price|replace:',':'.'|replace:'€':''|strip:''} / 0.6, 2,
          ',', ' ')} €</span>
        {elseif $product.name|strstr:"Porte-Fenêtre PVC 3 Vantaux à Rupture de Pont Thermique Sur Mesure"}
        <span class="regular-price">{number_format({$product.price|replace:',':'.'|replace:'€':''|strip:''} / 0.6, 2,
          ',', ' ')} €</span>
        {elseif $product.name|strstr:"Porte-Fenêtre PVC 4 Vantaux à Rupture de Pont Thermique Sur Mesure"}
        <span class="regular-price">{number_format({$product.price|replace:',':'.'|replace:'€':''|strip:''} / 0.6, 2,
          ',', ' ')} €</span>
        {elseif $product.name|strstr:"Fenêtre PVC 1 Vantail à Rupture de Pont Thermique Avec Store Sur Mesure"}
        <span class="regular-price">{number_format({$product.price|replace:',':'.'|replace:'€':''|strip:''} / 0.6, 2,
          ',', ' ')} €</span>
        {elseif $product.name|strstr:"Fenêtre PVC 2 Vantaux à Rupture de Pont Thermique Avec Store Sur Mesure"}
        <span class="regular-price">{number_format({$product.price|replace:',':'.'|replace:'€':''|strip:''} / 0.6, 2,
          ',', ' ')} €</span>
        {elseif $product.name|strstr:"Fenêtre PVC 3 Vantaux à Rupture de Pont Thermique Avec Store Sur Mesure"}
        <span class="regular-price">{number_format({$product.price|replace:',':'.'|replace:'€':''|strip:''} / 0.6, 2,
          ',', ' ')} €</span>
        {elseif $product.name|strstr:"Fenêtre PVC 4 Vantaux à Rupture de Pont Thermique Avec Store Sur Mesure"}
        <span class="regular-price">{number_format({$product.price|replace:',':'.'|replace:'€':''|strip:''} / 0.6, 2,
          ',', ' ')} €</span>
        {else}
        <span class="regular-price">{$product.regular_price}</span>
        {/if}
        {* <span class="regular-price">{$product.regular_price}</span> *}
        {if $product.discount_type === 'percentage'}
        {if $product.name|strstr:"Fenêtre PVC 1 Vantail à Rupture de Pont Thermique Sur Mesure"}
        <span class="discount discount-percentage">
          -40%
        </span>
        {elseif $product.name|strstr:"Fenêtre PVC 2 Vantaux à Rupture de Pont Thermique Sur Mesure"}
        <span class="discount discount-percentage">
          -40%
        </span>
        {elseif $product.name|strstr:"Fenêtre PVC 3 Vantaux à Rupture de Pont Thermique Sur Mesure"}
        <span class="discount discount-percentage">
          -40%
        </span>
        {elseif $product.name|strstr:"Fenêtre PVC 4 Vantaux à Rupture de Pont Thermique Sur Mesure"}
        <span class="discount discount-percentage">
          -40%
        </span>
        {elseif $product.name|strstr:"Porte-Fenêtre PVC 1 Vantail à Rupture de Pont Thermique Sur Mesure"}
        <span class="discount discount-percentage">
          -40%
        </span>
        {elseif $product.name|strstr:"Porte-Fenêtre PVC 2 Vantaux à Rupture de Pont Thermique Sur Mesure"}
        <span class="discount discount-percentage">
          -40%
        </span>
        {elseif $product.name|strstr:"Porte-Fenêtre PVC 3 Vantaux à Rupture de Pont Thermique Sur Mesure"}
        <span class="discount discount-percentage">
          -40%
        </span>
        {elseif $product.name|strstr:"Porte-Fenêtre PVC 4 Vantaux à Rupture de Pont Thermique Sur Mesure"}
        <span class="discount discount-percentage">
          -40%
        </span>
        {elseif $product.name|strstr:"Fenêtre PVC 1 Vantail à Rupture de Pont Thermique Avec Store Sur Mesure"}
        <span class="discount discount-percentage">
          -40%
        </span>
        {elseif $product.name|strstr:"Fenêtre PVC 2 Vantaux à Rupture de Pont Thermique Avec Store Sur Mesure"}
        <span class="discount discount-percentage">
          -40%
        </span>
        {elseif $product.name|strstr:"Fenêtre PVC 3 Vantaux à Rupture de Pont Thermique Avec Store Sur Mesure"}
        <span class="discount discount-percentage">
          -40%
        </span>
        {elseif $product.name|strstr:"Fenêtre PVC 4 Vantaux à Rupture de Pont Thermique Avec Store Sur Mesure"}
        <span class="discount discount-percentage">
          -40%
        </span>
        {else}
        <span class="discount discount-percentage">
          -{$product.discount_percentage_absolute}
        </span>
        {/if}
        {* <span class="discount discount-percentage">
               -{$product.discount_percentage_absolute}
             </span> *}
        {else}
        <span class="discount discount-amount" style="margin-left: 0;">
          -{$product.discount_to_display}
        </span>
        {/if}
      </div>
      {/if}
      <div class="current-price">
        <span class="price">{$product.price}</span>
        {if $product.unit_price_full}
        <div class="unit-price-cart">{$product.unit_price_full}</div>
        {/if}
      </div>
    </div>

    {* Fim Bloco de desconto *}

    <br />

    {foreach from=$product.attributes key="attribute" item="value"}
    <div class="product-line-info">
      <span class="label">{$attribute}:</span>
      <span class="value">{$value}</span>
    </div>
    {/foreach}

    {if is_array($product.customizations) && $product.customizations|count}
    <!-- <br> -->
    {block name='cart_detailed_product_line_customization'}
    {foreach from=$product.customizations item="customization"}
    <!-- <a href="#" data-toggle="modal" data-target="#product-customizations-modal-{$customization.id_customization}">{l s='Product customization' d='Shop.Theme.Catalog'}</a>
         <div class="modal fade customization-modal" id="product-customizations-modal-{$customization.id_customization}" tabindex="-1" role="dialog" aria-hidden="true">
           <div class="modal-dialog" role="document">
             <div class="modal-content">
               <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
                 <h4 class="modal-title">{l s='Product customization' d='Shop.Theme.Catalog'}</h4>
               </div>
               <div class="modal-body">
                 {foreach from=$customization.fields item="field"}
                   <div class="product-customization-line row">
                     <div class="col-sm-3 col-xs-4 label">
                       {$field.label}
                     </div>
                     <div class="col-sm-9 col-xs-8 value">
                       {if $field.type == 'text'}
                         {if (int)$field.id_module}
                           {$field.text nofilter}
                         {else}
                           {$field.text}
                         {/if}
                       {elseif $field.type == 'image'}
                         <img src="{$field.image.small.url}">
                       {/if}
                     </div>
                   </div>
                 {/foreach}
               </div>
             </div>
           </div>
         </div> -->
    {/foreach}
    {/block}
    {/if}
  </div>


  {* Bloco valor Total *}

  <div class="product-line-grid-right product-line-actions col-md-5 col-xs-12">
    <div class="row">
      <div class="col-xs-4 hidden-md-up"></div>
      <div class="col-md-7 col-xs-12">
        <div class="row">
          <div class="col-md-6 col-xs-6 qty">
            {if isset($product.is_gift) && $product.is_gift}
            <span class="gift-quantity">{$product.quantity}</span>
            {else}
            {if $product.id_product == 13432}
            {else}
            <input class="js-cart-line-product-quantity" data-down-url="{$product.down_quantity_url}"
              data-up-url="{$product.up_quantity_url}" data-update-url="{$product.update_quantity_url}"
              data-product-id="{$product.id_product}" type="text" value="{$product.quantity}"
              name="product-quantity-spin" min="{$product.minimal_quantity}" />
            {/if}
            {/if}
          </div>
          <div class="col-md-6 col-xs-2 price">
            <span class="product-price">
              <strong>
                {if isset($product.is_gift) && $product.is_gift}
                <span class="gift">{l s='Gift' d='Shop.Theme.Checkout'}</span>
                {else}
                {$product.total}
                {/if}
              </strong>
            </span>
          </div>
        </div>
      </div>
     <div class="col-md-5 col-xs-12 ">   {* text-xs-right *}
        <div class="cart-line-product-actions pt-1" {if $product.id_product == 13432} onclick="RemovePack()" {/if}>
          <div class="mon_flex_product">
            {* <a title="Supprimer" class="remove-from-cart" rel="nofollow" href="{$product.remove_from_cart_url}"
              data-link-action="delete-from-cart" data-id-product="{$product.id_product|escape:'javascript'}"
              data-id-product-attribute="{$product.id_product_attribute|escape:'javascript'}"
              data-id-customization="{$product.id_customization|escape:'javascript'}">

              {if !isset($product.is_gift) || !$product.is_gift}
              <i class="material-icons float-xs-left">delete</i>
              {/if}
            </a> *}

            <div class="mon_flex_box pb-1">
              <a title="Supprimer" rel="nofollow" href="{$product.remove_from_cart_url}"
              data-link-action="delete-from-cart" data-id-product="{$product.id_product|escape:'javascript'}"
              data-id-product-attribute="{$product.id_product_attribute|escape:'javascript'}"
              data-id-customization="{$product.id_customization|escape:'javascript'}">
                <div class="mon_btncart_product exclusive">
                  <div class="mon_btncart_product_circle" >
                  <i class="material-icons " style="color:white">delete</i>
                  </div>
                  <div class="mon_btncart_product_text">Supprimer</div>
                </div>
              </a>
            </div>

            {assign var='productlinkcustomization' value=Cart::linkCustomization({$product.id_product})}
            {if isset($productlinkcustomization['Product_URL'])}
            <div class="mon_flex_box pb-1">
              <a title="Dupliquer" href="{$productlinkcustomization['Product_URL_dulplice']}">
                <div class="mon_btncart_product exclusive">
                <div class="mon_btncart_product_circle" >
                <i class="material-icons " style="color:white">content_copy</i>
                </div>
                <div class="mon_btncart_product_text">Dupliquer</div>
                </div>
              </a>
            </div>
            {* <div class="mon_flex_box  pb-1">
              <a title="Dupliquer et Modifier" href="{$productlinkcustomization['Product_URL']}">
                <div class="mon_btncart_product exclusive">
                  <div class="mon_btncart_product_circle" >
                  <i class="material-icons " style="color:white">content_copy</i>
                  </div>
                  <div class="mon_btncart_product_text">Dupliquer et Modifier</div>
                </div>
              </a>
            </div> *}
            <div class="mon_flex_box  pb-1">
              <a title="Modifier " href="{$productlinkcustomization['Product_URL_edit']}">
                <div class="mon_btncart_product exclusive">
                  <div class="mon_btncart_product_circle" >
                  <i class="material-icons " style="color:white">edit</i>
                  </div>
                  <div class="mon_btncart_product_text">Modifier</div>
                </div>
              </a>
            </div>
          {/if}

          </div>
          {block name='hook_cart_extra_product_actions'}
          {hook h='displayCartExtraProductActions' product=$product}
          {/block}

        </div>
      </div>
    </div>
  </div>
  {* Fim Bloco valor Total *}


  <div class="col-md-12 mt-2">
    <div class="col-md-3 col-xs-4" style="text-align: center;">
      {if {$product.id_customization|intval} != "0"}
      <div style="margin-right: 12px;" class="btn btn-primary btn-default aluclass_linkRender hidden-md-down"
        onclick="aluclass_linkRender('{$urls.base_url}img/scenes/ndkcf/pdf/{Context::getContext()->customer->id|intval}/{$product.id_product|intval}/{$product.id_customization|intval}/render.html')"
        data-chave="{$product.id_customization|intval}" href="#"
        data-renderhtml="{$urls.base_url}img/scenes/ndkcf/pdf/{Context::getContext()->customer->id|intval}/{$product.id_product|intval}/{$product.id_customization|intval}/render.html"
        style="text-decoration:none"><i class="icon-search"></i>&nbsp;Aperçu</div>
      {/if}
    </div>
    <div class="col-md-9 col-xs-12">
      <div class="col-md-12 col-xs-12 ">
        <div class="form-group " >
          <div class="row">
          {if {$product.id_customization|intval} != "0"}
            <div class="col-md-12 col-xs-12 ">
              <label><strong>Légende</strong></label>
            </div>
            <div class="col-md-10 col-xs-8 ">
              <input type="text" title="Légende"  id="titleproduct_{$product.id_product|intval}" class="titleproduct" date-id-titleproduct="{$product.id_product|intval}" name="titleproduct" value = " {$productlinkcustomization['title']}" style="width: 98%; border: 1px solid #ccc !important; border-radius: 5px; height: 2.5rem;">
            </div>
            <div class="col-md-2 col-xs-4 ">
              <button onclick="InsereLegendProdut({$product.id_product|intval})"  class="btn btn-primary aluPromoCode" style = "
                text-transform: capitalize;
                border-radius: 20px;
                background-color: #E8E8E8;
                color: #000;
                font-size: 12px;
                height: 40px;
                font-weight: 400;">
                <span>Ajouter</span>
              </button>
            </div>
          {/if}
          </div>
        </div>
      </div>
      <div class="col-md-12 col-xs-12">
        <small>
          {if isset($customization)}
          {foreach from=$customization.fields item="field"}
          {if {$field.label} != 'Aperçu' && {$field.label} != 'Preview' && {$field.label} != 'preview' && {$field.label}
          != 'reference'}
          <strong>{$field.label}: </strong>
          {if $field.type == 'text'}
          {if (int)$field.id_module}
            {$field.text nofilter}
          {else}
            {$field.text nofilter}
          {/if}
          {/if}<br>
          {/if}
          {/foreach}
          {/if}
        </small>
      </div>
    </div>
  </div>

  <div class="clearfix"></div>
</div>

{* Fim bloco Produto *}

{/if}
