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
 <div id="order-items" class="col-md-12">

 {block name='order_items_table_head'}
   <h3 class="card-title h3 my-2 new-layout-commande-header">{l s='Order items' d='Shop.Theme.Checkout'}</h3>
 {/block}

 <div class="order-confirmation-table">

   {block name='order_confirmation_table'}
     {foreach from=$products item=product}
       {assign var='imgcustimizado' value=''}
       {foreach from=$product.customizations item="customization"}
         {foreach from=$customization.fields item="field"}
           {if $field.type == 'text'}
             {if $field.label == 'Aperçu'}
               {assign var='imgcustimizado' value=$field.text}
             {/if}
           {/if}
         {/foreach}
       {/foreach}

       <div class="order-line row mb-2 pt-2 new-layout-commande-body">
         <div class="col-md-3  col-xs-12">
           {if $imgcustimizado == ''}
             <span class="image">
               <img class = "new-layout-commande-img" src="{$product.cover.medium.url}" />
             </span>

           {else}
             <span class="image" style="display: flex;
             align-items: center;
             justify-content: center;"
           >
               <iframe class="embed-responsive-item new-layout-commande-frame" width="100%" scrolling="no"
             src="{$imgcustimizado}"></iframe>
             </span>
           {/if}
         </div>
         <div class="col-md-9 col-xs-12 details">
           <div class="row new-layout-commande-table-main-header" >
             <div class="col-md-6 col-xs-12 new-layout-commande-table-header new-layout-commande-table-header-border" ><span class="new-layout-commande-table-heade-main-text">{$product.name} {if $product.title_customization} - {$product.title_customization} {/if}</span></div>
             <div class="col-md-2 col-xs-4 new-layout-commande-table-header new-layout-commande-table-header-border" ><span class="new-layout-commande-table-heade-text">{$product.price}</span></div>
             <div class="col-md-1 col-xs-1 new-layout-commande-table-header new-layout-commande-table-header-border" ><span class="new-layout-commande-table-heade-text">x{$product.quantity}</span></div>
             <div class="col-md-3 col-xs-6 new-layout-commande-table-header" > <span class="new-layout-commande-table-heade-text">{number_format($product.quantity*$product.unit_price_tax_incl, 2, ',', ' ')}
                   €</span></div>
           </div>
           {if $add_product_link}<a href="{$product.url}" target="_blank">{/if}

             {if $add_product_link}</a>{/if}
           {if is_array($product.customizations) && $product.customizations|count}
             <div class="customizations hidden-md-down pt-1 new-layout-commande-table-body">
               {foreach from=$product.customizations item="customization"}
                 {foreach from=$customization.fields item="field"}
                   <div class="product-customization-line row ">
                     <div class="col-sm-6 col-xs-6 label new-layout-commande-table-body" style="text-align: left; ">
                       {if $field.label != 'Aperçu'}
                         <strong>{$field.label} :</strong>
                       {/if}
                     </div>
                     <div class="col-sm-6 col-xs-8 value new-layout-commande-table-body" style="text-align: right; ">
                       {if $field.type == 'text'}
                         {if (int)$field.id_module}
                           {$field.text nofilter}
                         {elseif $field.label == 'Aperçu'}

                         {else}
                           {$field.text}

                         {/if}
                       {elseif $field.type == 'image'}
                         <img src="{$field.image.small.url}">
                       {/if}
                     </div>
                   </div>
                   {if $field.label != 'Aperçu'}
                     <hr>
                   {/if}
                 {/foreach}
               </div>
               <div class="customizations hidden-md-up">
                 <a style = "background-color: var(--red);
 padding: 10px;
 color: white;
 border-radius: 25px;" href="#" data-toggle="modal"
                   data-target="#product-customizations-modal-{$customization.id_customization}">{l s='Product customization' d='Shop.Theme.Catalog'}</a>
               </div>
               <div class="modal fade customization-modal" id="product-customizations-modal-{$customization.id_customization}"
                 tabindex="-1" role="dialog" aria-hidden="true">
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
                           {if $field.label != 'Aperçu'}
                             <strong>{$field.label} :</strong>
                           {/if}
                           </div>
                           <div class="col-sm-9 col-xs-8 value">
                             {if $field.type == 'text'}
                               {if (int)$field.id_module}
                                 {$field.text nofilter}
                               {elseif $field.label == 'Aperçu'}

                               {else}
                                 {$field.text}

                               {/if}
                             {elseif $field.type == 'image'}
                               <img src="{$field.image.small.url}">
                             {/if}
                           </div>
                         </div>
                         {if $field.label != 'Aperçu'}
                           <hr>
                         {/if}
                       {/foreach}
                     </div>
                   </div>
                 </div>
               </div>
             {/foreach}
           {/if}
           {hook h='displayProductPriceBlock' product=$product type="unit_price"}
         </div>

       </div>
     {/foreach}



   {/block}

   {block name='order_details'}
     <div class="order-line row new-layout-detail-line">
       <div id="order-details" class="new-layout-commande-order new-layout-detail-line-commande" >
         <div class="m-2">
           <h3 class="h3 card-title" style="font-size: 24px;">{l s='Order details' d='Shop.Theme.Checkout'}:</h3>
           <hr>
           <ul>
             <li >
              {l s='Order reference: %reference%' d='Shop.Theme.Checkout' sprintf=['%reference%' => $order.details.reference]}
             </li>
             <li  class="mt-1">
             {l s='Payment method: %method%' d='Shop.Theme.Checkout' sprintf=['%method%' => $order.details.payment]}
             </li>
             {if !$order.details.is_virtual}
               <li class="mt-1">
               {l s='Shipping method: %method%' d='Shop.Theme.Checkout' sprintf=['%method%' => $order.carrier.name]}<br>
                 <em>{$order.carrier.delay}</em>
               </li>
             {/if}
           </ul>
         </div>
       </div>

       <div  class = "new-layout-detail-line-sub-total" >
         {foreach $subtotals as $subtotal}
           {if $subtotal.type !== 'tax' && $subtotal.label !== null}
             <div class="row m-1">
               <div class="col-xs-12 font-weight-bold" style="font-size: 20px;"><span
                   class="text-uppercase">{$subtotal.label}</span> </div>
               <div class="col-xs-12" style="font-size: 18px;">{$subtotal.value}</div>
             </div>
             <hr>
           {/if}

         {/foreach}

         {if $subtotals.tax.label !== null}
           <div class="row m-1">
             <div class="col-xs-12 font-weight-bold" style="font-size: 20px;"><span
                 class="text-uppercase">{$subtotals.tax.label}</span> </div>
             <div class="col-xs-12" style="font-size: 18px;">{$subtotals.tax.value}</div>
           </div>
           <hr>
         {/if}
         <div class="row m-1">
           <div class="col-xs-12 font-weight-bold" style="font-size: 22px;"><span
               class="text-uppercase">{$totals.total.label}</span> {$labels.tax_short}</div>
           <div class="col-xs-12" style="font-size: 20px;">{$totals.total.value}</div>
         </div>
       </div>


     </div>
     {/block}


 </div>
</div>
