{block name='cart_list'}

  <div class="order-items hidden-md-up box new-layout-order-detail-box">
    {foreach from=$produts item=product}
      <div class="order-item">
        <div class="row">
          <div class="col-sm-12 pb-2">
            <span class="image">
              <img class="new-layout-commande-img img-fluid" src="{$product.image}">
            </span>
          </div>
          <div class="col-sm-12 desc  ">
            <div class="name new-layout-commande-table-heade-main-text   pb-1">{$product.name}</div>
          </div>
          <div class="col-sm-12 qty pb-2">
            <div class="row">
              <div class="col-xs-4 text-sm-left text-xs-left">
              {number_format($product.price, 2, ',', ' ')} €
              </div>
              <div class="col-xs-2">
              {$product.quantity}
              </div>
              <div class="col-xs-4 text-xs-right">
              {number_format($product.quantity*$product.price, 2, ',', ' ')} €
              </div>
            </div>
          </div>
          {if $product.id_customization > 0}
            <div class="col-sm-12 qty pb-2">
              <div class="hp-customization hidden-md-up">
                <a href="#" data-toggle="modal" class ="hp-btn btn btn-primary btn-sm"
                  data-target="#product-customizations-modal-{$product.id_customization}">{l s='Personnalisation du produit' d='Shop.Theme.Wishlist'}</a>
              </div>
              <div id="_desktop_product_customization_modal_wrapper_{$product.id_customization}">
                <div class="modal fade customization-modal" id="product-customizations-modal-{$product.id_customization}"
                  tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">{l s='Personnalisation du produit' d='Shop.Theme.Wishlist'}</h4>
                      </div>
                      <div class="modal-body">
                        {$product.description}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          {/if}
        </div>
      </div>
    {/foreach}
  </div>

  <div class="box hidden-sm-down new-layout-order-detail-box">
    <table id="order-products" class="table table-bordered hp-no-line-table">
      <thead class="thead-default">
        <tr>
          <th class="hp-border-table-header-left hp-table-header-middle" style="text-align: center;">
            {l s='Image' d='Shop.Theme.Wishlist'}</th>
          <th class="hp-table-header-middle">{l s='Produit' d='Shop.Theme.Wishlist'}</th>
          <th class="hp-table-header-middle">{l s='Quantité' d='Shop.Theme.Wishlist'}</th>
          <th class="hp-table-header-middle">{l s='Prix unitaire' d='Shop.Theme.Wishlist'}</th>
          <th class="hp-border-table-header-right  hp-table-header-middle">{l s='Prix total' d='Shop.Theme.Wishlist'}</th>
        </tr>
      </thead>
      {foreach from=$produts item=product}
        <tr>
          <td class="hp-line-table" style="text-align: center;">
            <span class="image">
              <img class="new-layout-commande-img " style="max-width: 250px;" src="{$product.image}" />
            </span>
          </td>
          <td class="hp-line-table">
            <span class="hp-header-text-table">{$product.name} </span>
            {if $product.id_customization > 0}
              <div class="hp-customization hidden-md-down">
                {$product.description}
              </div>
            {/if}
          </td>
          <td class="hp-line-table">
            <span class="hp-header-text-table">
              {$product.quantity}
            </span>
          </td>
          <td class="hp-line-table text-xs-right"> <span
              class="hp-header-text-table">{number_format($product.price, 2, ',', ' ')} €</span></td>
          <td class="hp-line-table text-xs-right"> <span
              class="hp-header-text-table">{number_format($product.quantity*$product.price, 2, ',', ' ')} €</span></td>
        </tr>
      {/foreach}
    </table>
  </div>


{/block}
