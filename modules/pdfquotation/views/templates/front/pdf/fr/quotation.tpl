{**
* Quotation Template
*
* @author Empty
* @copyright  Empty
* @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*}
{assign var='checaDescontosCatalogo' value=Product::checaDescontosCatalogo()}
<style>
  table.bottomBorder {
    border-collapse: collapse;
  }

  table.bottomBorder td,
  table.bottomBorder th {
    border-bottom: .625rem solid gray;
  }
</style>

<table style="width: 100%;">
  <tr>
    <td style="width: 100%; font-size: 9pt; font-color: #404040;">{$before|unescape:'htmlall'}<br /><br />

      <table style="width: 100%" class="bottomBorder" cellpadding="5">
        <thead>
          <tr>
            <td width="13%" valign="middle"
              style="font-weight: bold; color: #fff; background-color: #595959; text-align: center;">
              Réf
            </td>
            <td width="45%" valign="middle"
              style="font-weight: bold; color: #fff; background-color: #595959; text-align: center;">
              Désignation
            </td>
            <td width="6%" valign="middle"
              style="font-weight: bold; color: #fff; background-color: #595959; text-align: center;">
              Qté
            </td>
            <td width="15%" valign="middle"
              style="font-weight: bold; color: #fff; background-color: #595959; text-align: center;">
              P.U H.T
            </td>
            <td width="15%" valign="middle"
              style="font-weight: bold; color: #fff; background-color: #595959; text-align: center;">
              Total H.T
            </td>
            <td width="6%" valign="middle"
              style="font-weight: bold; color: #fff; background-color: #595959; text-align: center;">
              TVA
            </td>
          </tr>
        </thead>
        <tbody height="1000">
          {foreach $products as $product}
            <tr>
              <td>{$product['reference']|escape:'htmlall':'UTF-8'}</td>
              <td>{$product['name']|escape:'htmlall':'UTF-8'}{if !empty($product['features_name'])}
                ({$product['features_name']|escape:'htmlall':'UTF-8'}) {/if}
                {if !empty($product['combination'])} ({$product['combination']|escape:'htmlall':'UTF-8'}) {/if}
                {if !empty($product['title'])} - {$product['title']} {/if}
                {if !empty($product['description'])} {$product['description']} {/if}
              </td>
              <td>{$product['quantity']|escape:'htmlall':'UTF-8'}</td>
              <td>{displayPrice price=$product['price']}</td>
              <td>{displayPrice price=$product['total']}</td>
              <td >{number_format($product['rate'],0)}%</td>
            </tr>
          {/foreach}
        </tbody>
        <tfoot>
          <tr>
            <td colspan="2" rowspan="{if {$is_discount}}7{else}6{/if}">&nbsp;</td>
            {* <td colspan="2">SOUS-TOTAL H.T</td>
                        <td>{displayPrice price=$cart_info['total_products'] -$cart_info['total_discounts_tax_exc'] }</td> *}
          </tr>
          <tr>
            <td colspan="2">FRAIS DE PORT H.T</td>
            <td>{displayPrice price=$cart_info['total_shipping_tax_exc']}</td>
          </tr>
          <tr>
            <td colspan="2">TVA %</td>
            <td>{displayPrice price=$cart_info['total_tax']}</td>
          </tr>
          <tr>
            <td colspan="2">FRAIS DE PORT T.T.C</td>
            <td>{displayPrice price=$cart_info['total_shipping']}</td>
          </tr>
          <tr>
            <td colspan="2">TOTAL PRODUIT T.T.C</td>
            <td>{displayPrice price=$cart_info['total_products_wt']}</td>
          </tr>
          <tr>
            <td colspan="2" style="font-weight: bold; color: #fff; background-color: #595959;">TOTAL T.T.C AVEC REMISE valable jusqu'au {$checaDescontosCatalogo['to']|date_format:"%e %B"}</td>
            <td>{displayPrice price=$cart_info['total_products_wt']+$cart_info['total_shipping']}</td>
          </tr>
          {if {$is_discount}}
          <tr>
            <td colspan="2" style="font-weight: bold; color: #fff; background-color: #595959;">TOTAL T.T.C AVEC code
              réduction : {number_format($cart_info['discounts'][0]['reduction_percent'],0)}%
              valable jusqu'au {$cart_info['discounts'][0]['date_to']|date_format:"%e %B"}</td>
              <td>{displayPrice price=$cart_info['total_price']}</td>
            </tr>
          {/if}
        </tfoot>
      </table>
      {$after|unescape:'htmlall'}{* HTML CONTENT *}
    </td>
  </tr>
</table>
