{block name='cart_list'}

  <div>
    <h6 class="pb-1">Liste des produits</h6>
    {foreach from=$produts item="produtcart"}
      <div class="row ">
        <div class="col-sm-4">
          <img src="{$produtcart['image']}" alt="{$produtcart['name']}" style="height: 98px;">
        </div>
        <div class="col-sm-1">
              {$produtcart['qty']}x
            </div>
        <div class="col-sm-6" style="text-align: left; font-family: Montserrat,sans-serif; ">
          <div class="row ">
            <div class="col-sm-12">
              <strong> {$produtcart['name']}</strong>
            </div>
          </div>
          <div class="row pt-1">
            <div class="col-sm-12">
              <span style="float: left;font-family: Montserrat,sans-serif; ">{number_format($produtcart['price'], 2, ',', ' ')} €</span>
            </div>
          </div>
        </div>
      </div>
      <hr />
    {/foreach}
    <div class="row pb-2">
      <div class="col-sm-4">
      <span style=" Montserrat,sans-serif; font-size: 14px;"><strong>Total : </strong></span>
      </div>
      <div class="col-sm-8">
        <span style="float: right;font-family: Montserrat,sans-serif; font-size: 14px;"> <strong>{number_format($price_total, 2, ',', ' ')} € </strong></span>
      </div>
    </div>
  </div>
  <div class="text-sm-center">
    <a href="https://priximbattable.net/commande?shipfree=0" class="btn btn-primary btn-block btn_commander"
      style="border-radius: 50px; color: #fff;">Commander</a>
  </div>
  </div>

{/block}
