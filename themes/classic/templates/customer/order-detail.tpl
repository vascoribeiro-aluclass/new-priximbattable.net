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
 {extends file='customer/page.tpl'}

 {block name='page_title'}
   {l s='Order details' d='Shop.Theme.Customeraccount'}
 {/block}

 {block name='page_content'}
   {block name='order_infos'}
     <div class="row card hs-layout-commande-title" style="  display: flex; align-items: center; justify-content: center;">
       <div class="col-md-12" style="  display: flex; align-items: center; justify-content: center;">
         <div class = "hs-layout-commande-box1" >
           <div class = "hs-layout-commande-box2" >
             <span class = "new-layout-commande-box-img">
               <img src="/img/booking.png">
             </span>
           </div>
         </div>
       </div>
     </div>
     <div id="order-infos" >
       <div class="box new-layout-order-detail-box">
           <div class="row">
             <div class="col-xs-{if $order.details.reorder_url}9{else}12{/if}">
               <strong>
                 {l
                   s='Order Reference %reference% - placed on %date%'
                   d='Shop.Theme.Customeraccount'
                   sprintf=['%reference%' => $order.details.reference, '%date%' => $order.details.order_date]
                 }
               </strong>
             </div>
             {if $order.details.reorder_url}
               <div class="col-xs-3 text-xs-right">
                 <a href="{$order.details.reorder_url}" class="button-primary">{l s='Reorder' d='Shop.Theme.Actions'}</a>
               </div>
             {/if}
             <div class="clearfix"></div>
           </div>
            <hr>
           <ul>
             <li><strong>{l s='Carrier' d='Shop.Theme.Checkout'}</strong> {$order.carrier.name}</li>
             <li><strong>{l s='Payment method' d='Shop.Theme.Checkout'}</strong> {$order.details.payment}</li>

             {if $order.details.invoice_url}
               <li>
                 <a href="{$order.details.invoice_url}">
                   {l s='Download your invoice as a PDF file.' d='Shop.Theme.Customeraccount'}
                 </a>
               </li>
             {/if}

             {if $order.details.recyclable}
               <li>
                 {l s='You have given permission to receive your order in recycled packaging.' d='Shop.Theme.Customeraccount'}
               </li>
             {/if}

             {if $order.details.gift_message}
               <li>{l s='You have requested gift wrapping for this order.' d='Shop.Theme.Customeraccount'}</li>
               <li>{l s='Message' d='Shop.Theme.Customeraccount'} {$order.details.gift_message nofilter}</li>
             {/if}
           </ul>
       </div>
     </div>
   {/block}

   {block name='order_history'}
     <section id="order-history" class="box new-layout-order-detail-box hs-box-center" >
       <h3>{l s='Follow your order\'s status step-by-step' d='Shop.Theme.Customeraccount'}</h3>

       {assign var='hashtracking' value=Customer::trackingOrderGoldylocks({$order.details.reference})}

         <a href="https://commandes.priximbattable.net/?order={$hashtracking}" target="_blank" class="hs-btn btn btn-primary btn-sm" style= "border-radius: 25px;">Suivi de commande</a>

       <div class="hidden-sm-up history-lines">
         {foreach from=$order.history item=state}
           <div class="history-line">
             <div class="date pt-1">{$state.history_date}</div>
             <div class="state">
               <span class="label label-pill {$state.contrast}" style="background-color:{$state.color}">
                 {$state.ostate_name}
               </span>
             </div>
           </div>
         {/foreach}
       </div>
     </section>
   {/block}

   {assign var="iItemOne" value=$smarty.now}
   {assign var="iItemTwo" value=7776000}
   {assign var="iSum" value=$iItemOne-$iItemTwo}

   {assign var="data" value="/"|explode:$order.details.order_date}
   {assign var="data_formatada" value="`$data[2]``$data[1]``$data[0]`"}
   {if  {$data_formatada} > {$iSum|date_format:"%Y%m%d"} }
      <section id="order-history" class="box new-layout-order-detail-box hs-box-center" >
          <h3>{l s='Ajouter cette commande au panier' d='Shop.Theme.Customeraccount'}</h3>
          <a href="/ajax/index.php?setaction=getorderhistoric&id_order={$order.details.reference}" target="_blank" class="hs-btn btn btn-primary btn-sm" style= "border-radius: 25px;">Obtenir le panier</a>
      </section>
    {/if}

   {if $order.follow_up}
     <div class="box new-layout-order-detail-box">
       <p>{l s='Click the following link to track the delivery of your order' d='Shop.Theme.Customeraccount'}</p>
       <a href="{$order.follow_up}">{$order.follow_up}</a>
     </div>
   {/if}

   {block name='addresses'}
     <div class="addresses row">
       {if $order.addresses.delivery}
         <div class="col-lg-6 col-md-6 col-sm-6" >
           <article id="delivery-address" class="box new-layout-order-detail-box">
             <h4><span><img style="width: 30px;" loading="lazy" alt="devis print" src="/img/adress.svg"></span> {l s='Delivery address %alias%' d='Shop.Theme.Checkout' sprintf=['%alias%' => $order.addresses.delivery.alias]}</h4>
             <hr>
             <address class="ml-1">{$order.addresses.delivery.formatted nofilter}</address>
           </article>
         </div>
       {/if}

       <div class="col-lg-6 col-md-6 col-sm-6" >
         <article id="invoice-address" class="box new-layout-order-detail-box">
         <h4><span><img style="width: 30px;" loading="lazy" alt="devis print" src="/img/bill.svg"></span> {l s='Invoice address %alias%' d='Shop.Theme.Checkout' sprintf=['%alias%' => $order.addresses.invoice.alias]}</h4>
           <hr>
           <address class="ml-1">{$order.addresses.invoice.formatted nofilter}</address>
         </article>
       </div>
       <div class="clearfix"></div>
     </div>
   {/block}

   {$HOOK_DISPLAYORDERDETAIL nofilter}

   {block name='order_detail'}
     {if $order.details.is_returnable}
       {include file='customer/_partials/order-detail-return.tpl'}
     {else}
       {include file='customer/_partials/order-detail-no-return.tpl'}
     {/if}
   {/block}

   {block name='order_carriers'}
     {if $order.shipping}
       <div class="box new-layout-order-detail-box">
         <table class="table table-striped table-bordered hidden-sm-down" style="  border: 0px solid #f6f6f6">
           <thead class="thead-default">
             <tr>
               <th class="hs-border-table-header-left hs-table-header-middle">{l s='Date' d='Shop.Theme.Global'}</th>
               <th class="hs-table-header-middle">{l s='Carrier' d='Shop.Theme.Checkout'}</th>
               <th class="hs-table-header-middle">{l s='Weight' d='Shop.Theme.Checkout'}</th>
               <th class="hs-table-header-middle">{l s='Shipping cost' d='Shop.Theme.Checkout'}</th>
               <th class="hs-border-table-header-right hs-table-header-middle">{l s='Tracking number' d='Shop.Theme.Checkout'}</th>
             </tr>
           </thead>
           <tbody>
             {foreach from=$order.shipping item=line}
               <tr style="background-color: rgba(255, 255, 255, 0.05);">
                 <td class="hs-remover_bordes-table">{$line.shipping_date}</td>
                 <td class="hs-remover_bordes-table">{$line.carrier_name}</td>
                 <td class="hs-remover_bordes-table">{$line.shipping_weight}</td>
                 <td class="hs-remover_bordes-table">{$line.shipping_cost}</td>
                 <td class="hs-remover_bordes-table"> {$line.tracking nofilter}</td>
               </tr>
             {/foreach}
           </tbody>
         </table>
         <div class="hidden-md-up shipping-lines">
           {foreach from=$order.shipping item=line}
             <div class="shipping-line">
               <ul>
                 <li>
                   <strong>{l s='Date' d='Shop.Theme.Global'}</strong> {$line.shipping_date}
                 </li>
                 <li>
                   <strong>{l s='Carrier' d='Shop.Theme.Checkout'}</strong> {$line.carrier_name}
                 </li>
                 <li>
                   <strong>{l s='Weight' d='Shop.Theme.Checkout'}</strong> {$line.shipping_weight}
                 </li>
                 <li>
                   <strong>{l s='Shipping cost' d='Shop.Theme.Checkout'}</strong> {$line.shipping_cost}
                 </li>
                 <li>
                   <strong>{l s='Tracking number' d='Shop.Theme.Checkout'}</strong> {$line.tracking nofilter}
                 </li>
               </ul>
             </div>
           {/foreach}
         </div>
       </div>
     {/if}
   {/block}

   {block name='order_messages'}
     {include file='customer/_partials/order-messages.tpl'}
   {/block}
 {/block}
