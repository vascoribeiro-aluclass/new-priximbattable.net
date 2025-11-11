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
 {block name='order_products_table'}
  <div class="box hidden-sm-down new-layout-order-detail-box">
    <table id="order-products" class="table table-bordered hs-no-line-table">
      <thead class="thead-default">
        <tr>
          <th class="hs-border-table-header-left hs-table-header-middle" style="text-align: center;">{l s='Image' d='Shop.Theme.Catalog'}</th>
          <th class="hs-table-header-middle">{l s='Product' d='Shop.Theme.Catalog'}</th>
          <th class="hs-table-header-middle">{l s='Quantity' d='Shop.Theme.Catalog'}</th>
          <th class="hs-table-header-middle">{l s='Unit price' d='Shop.Theme.Catalog'}</th>
          <th class="hs-border-table-header-right  hs-table-header-middle">{l s='Total price' d='Shop.Theme.Catalog'}</th>
        </tr>
      </thead>
      {foreach from=$order.products item=product}
        <tr>
          <td  class="hs-line-table"  style="text-align: center;">
          {if $imgcustimizado == ''}
              <span class="image">
              <img class = "new-layout-commande-img "  style="max-width: 250px;" src="{$product.cover.medium.url}" />
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
          </td>
          <td class="hs-line-table">
            {* <p><strong>
            {$product.name}
            </strong></p><br/> *}

          <span class="hs-header-text-table">{$product.name}  {if $product.title_customization} - {$product.title_customization} {/if}</span>
            {if $product.reference}
              {l s='Reference' d='Shop.Theme.Catalog'}: {$product.reference}<br/>
            {/if}
            {if $product.customizations}
              {foreach from=$product.customizations item="customization"}
                <div class="customization hidden-md-down">
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
                          {else}
                            {if $field.label == 'Aperçu'}

                            {else}
                              {$field.text}
                            {/if}
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
                <div class="customization hidden-md-up">
                  <a   href="#" data-toggle="modal" data-target="#product-customizations-modal-{$customization.id_customization}">{l s='Product customization' d='Shop.Theme.Catalog'}</a>
                </div>
                <div id="_desktop_product_customization_modal_wrapper_{$customization.id_customization}">
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
                              {if $field.label != 'Aperçu'}
                                <strong>{$field.label} :</strong>
                              {/if}
                              </div>
                              <div class="col-sm-9 col-xs-8 value">
                                {if $field.type == 'text'}
                                  {if (int)$field.id_module}
                                    {$field.text nofilter}
                                  {else}
                                    {if $field.label == 'Aperçu'}

                                    {else}
                                      {$field.text}
                                    {/if}
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
                </div>
              {/foreach}
            {/if}
          </td>
          <td class="hs-line-table">
          <span class="hs-header-text-table">
            {if $product.customizations}
              {foreach $product.customizations as $customization}
                {$customization.quantity}
              {/foreach}
            {else}
              {$product.quantity}
            {/if}
            </span>
          </td>
          <td class="hs-line-table text-xs-right"> <span class="hs-header-text-table">{$product.price}</span></td>
          <td class="hs-line-table text-xs-right"> <span class="hs-header-text-table">{number_format($product.quantity*$product.unit_price_tax_incl, 2, ',', ' ')} €</span></td>
        </tr>
      {/foreach}
      <tfoot class = "hs-total-order">
        {foreach $order.subtotals as $line}
          {if $line.value}
            <tr class="text-xs-right line-{$line.type}">
              <td class="hs-no-line-table" colspan="3"><strong>{$line.label}</strong></td>
              <td class="hs-no-line-table" >{$line.value}</td>
            </tr>
          {/if}
        {/foreach}
        <tr class="text-xs-right line-{$order.totals.total.type}">
          <td class="hs-no-line-table" colspan="3"><strong>{$order.totals.total.label}</strong></td>
          <td class="hs-no-line-table">{$order.totals.total.value}</td>
        </tr>
      </tfoot>
    </table>
  </div>

  <div class="order-items hidden-md-up box new-layout-order-detail-box">
    {foreach from=$order.products item=product}
      <div class="order-item">
        <div class="row">
          <div class="col-sm-12 pb-2">
            {if $imgcustimizado == ''}
              <span class="image">
                <img class = "new-layout-commande-img img-fluid" src="{$product.cover.medium.url}" />
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
          <div class="col-sm-12 desc  ">
            <div class="name new-layout-commande-table-heade-main-text   pb-1">{$product.name} {if $product.title_customization} - {$product.title_customization} {/if}</div>
            {if $product.reference}
              <div class="ref   pb-1">{l s='Reference' d='Shop.Theme.Catalog'}: {$product.reference}</div>
            {/if}
            {if $product.customizations}
              {foreach $product.customizations as $customization}
                <div class="customization pb-1">
                  <a style = "background-color: var(--red);
                  padding: 10px;
                  color: white;
                  border-radius: 25px;" href="#" data-toggle="modal" data-target="#product-customizations-modal-{$customization.id_customization}">{l s='Product customization' d='Shop.Theme.Catalog'}</a>
                </div>
                <div id="_mobile_product_customization_modal_wrapper_{$customization.id_customization}">
                </div>
              {/foreach}
            {/if}
          </div>
          <div class="col-sm-12 qty pb-2">
            <div class="row">
              <div class="col-xs-4 text-sm-left text-xs-left">
                {$product.price}
              </div>
              <div class="col-xs-2">
                {if $product.customizations}
                  {foreach $product.customizations as $customization}
                    {$customization.quantity}
                  {/foreach}
                {else}
                  {$product.quantity}
                {/if}
              </div>
              <div class="col-xs-4 text-xs-right">
                {* {$product.total} *}
                {number_format($product.quantity*$product.unit_price_tax_incl, 2, ',', ' ')} €
              </div>
            </div>
          </div>
        </div>
      </div>
    {/foreach}
  </div>
  <div class="order-totals hidden-md-up box new-layout-order-detail-box">
    {foreach $order.subtotals as $line}
      {if $line.value}
        <div class="order-total row">
          <div class="col-xs-8"><strong>{$line.label}</strong></div>
          <div class="col-xs-4 text-xs-right">{$line.value}</div>
        </div>
      {/if}
    {/foreach}
    <div class="order-total row">
      <div class="col-xs-8"><strong>{$order.totals.total.label}</strong></div>
      <div class="col-xs-4 text-xs-right">{$order.totals.total.value}</div>
    </div>
  </div>
{/block}
