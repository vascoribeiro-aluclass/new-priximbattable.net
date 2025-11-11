{extends file='page.tpl'}

{block name='page_content_container' prepend}
  <section id="content-hook_order_confirmation" class="card new-layout-commande-title" >
    <div class="card-block">
      <div class="row">
        <div class="col-md-4 hidden-md-down" style="  display: flex; align-items: center; justify-content: center;">
          <div class = "new-layout-commande-box1" >
            <div class = "new-layout-commande-box2" >
              <span class = "new-layout-commande-box-img">
                <picture>
                  <source srcset="/img/cms/Avis/avis-confirmation-commande.webp" type="image/webp">
                  <img loading="lazy" src="/img/cms/Avis/avis-confirmation-commande.jpg" class="new-layout-commande-box1" alt="Avis" title="Avis" width="491" height="319">
                </picture>
                <div style="width: 319px;height: 120px;border-radius: 25px;display: flex;justify-content: center;position: absolute;bottom: 0;z-index: 1;background-image: linear-gradient(#b9b0b040,#3c3a3aa6);align-items: center;">
                  <div class="logos-avis-conf-order-review avis-h-checkout avis-h-checkout-addrs" style="bottom:45px">
                    <a href="https://priximbattable.net/avis-client" target="_blank" style="display:flex; gap:5px;">
                      <div class="border-avis">
                        <picture>
                          <source srcset="/img/cms/Avis/logo-google.webp" type="image/webp">
                          <img class=" img-fluid avis-img-w avis-addrs-img-w" loading="lazy" src="/img/cms/Avis/logo-google.png" alt="Google"
                            title="Google" width="386" height="129">
                        </picture>
                        <span><b>{$notaGoogle}</b></span>
                      </div>
                      <div class="border-avis">
                        <picture>
                          <source srcset="/img/cms/Avis/logo-pages-jaunes.webp" type="image/webp">
                          <img class=" img-fluid avis-img-w avis-addrs-img-w" loading="lazy" src="/img/cms/Avis/logo-pages-jaunes.png"
                            alt="Pages Jaunes" title="Pages Jaunes" width="386" height="129">
                        </picture>
                        <span><b>{$notaPagesJaunes}</b></span>
                      </div>
                    </a>
                  </div>
                  <div class="logos-avis-conf-order-review avis-h-checkout avis-h-checkout-addrs">
                    <a href="https://priximbattable.net/avis-client" target="_blank" style="display:flex;gap:5px;">
                      <div class="border-avis">
                        <picture>
                          <source srcset="/img/cms/Avis/logo-priximbattable.webp" type="image/webp">
                          <img class=" img-fluid avis-img-w avis-addrs-img-w" loading="lazy" src="/img/cms/Avis/logo-priximbattable.png"
                            alt="Prix Imbattable" title="Prix Imbattable" width="386" height="129">
                        </picture>
                        <span><b>{$notaPriximbattable}</b></span>
                      </div>
                      <div class="border-avis">
                        <picture>
                          <source srcset="/img/cms/Avis/logo-trustpilot.webp" type="image/webp">
                          <img class=" img-fluid avis-img-w avis-addrs-img-w" loading="lazy" src="/img/cms/Avis/logo-trustpilot.png" alt="Trustpilot"
                            title="Trustpilot" width="386" height="129">
                        </picture>
                        <span><b>{$notaTrustpilot}</b></span>
                      </div>
                    </a>
                  </div>
                </div>
              </span>
            </div>
          </div>
        </div>
        <div class="col-md-12 col-lg-4" style="  display: flex; align-items: center; justify-content: center;">
          <div class = "new-layout-commande-box1" >
            <div class = "new-layout-commande-box2" >
              <span class = "new-layout-commande-box-img">
                <img src="/img/booking.png">
              </span>
            </div>
          </div>
        </div>
        <div class="col-md-4 hidden-md-down" style="  display: flex; align-items: center; justify-content: center;">
          <div class = "new-layout-commande-box1" >
            <div class = "new-layout-commande-box2 " >
              <span class = "new-layout-commande-box-img">

                  <iframe class="embed-responsive-item new-layout-commande-box1" id="codPdf" src="https://www.youtube.com/embed/XeaufyZmtMg" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </span>
            </div>
          </div>
        </div>
        <div class="col-md-12">

          {block name='order_confirmation_header'}
            <h3 class="h1 card-title pt-1 new-layout-commande-box-title">
              {l s='Your order is confirmed' d='Shop.Theme.Checkout'}
            </h3>
          {/block}

          <p  class = " new-layout-commande-box-mail">
            {l s='An email has been sent to your mail address %email%.' d='Shop.Theme.Checkout' sprintf=['%email%' => $customer.email]}
            {if $order.details.invoice_url}
              {* [1][/1] is for a HTML tag. *}
              {l
                      s='You can also [1]download your invoice[/1]'
                      d='Shop.Theme.Checkout'
                      sprintf=[
                        '[1]' => "<a href='{$order.details.invoice_url}'>",
              '[/1]' => "</a>"
              ]
              }
            {/if}
          </p>

          {block name='hook_order_confirmation'}
            {$HOOK_ORDER_CONFIRMATION nofilter}
          {/block}

        </div>
      </div>
    </div>
  </section>
{/block}

{block name='page_content_container'}
  <section id="content" class="page-content page-order-confirmation card new-layout-commande-box-confirm" >
    <div class="card-block">
      <div class="row">

        {block name='order_confirmation_table'}
          {include
                file='checkout/_partials/order-confirmation-table.tpl'
                products=$order.products
                subtotals=$order.subtotals
                totals=$order.totals
                labels=$order.labels
                add_product_link=false
              }
        {/block}


        {assign var='infoCustomerToCrawler' value=Cart::infoCustomerToCrawler($order.details.reference)}
        <input type="hidden" id="email" value="{$infoCustomerToCrawler["email"]}" />
        <input type="hidden" id="phone_number" value="{$infoCustomerToCrawler["phone_number"]}" />
        <input type="hidden" id="first_name" value="{$infoCustomerToCrawler["first_name"]}" />
        <input type="hidden" id="last_name" value="{$infoCustomerToCrawler["last_name"]}" />
        <input type="hidden" id="street" value="{$infoCustomerToCrawler["street"]}" />
        <input type="hidden" id="city" value="{$infoCustomerToCrawler["city"]}" />
        {* <input type="" id="region" value="" /> *}
        <input type="hidden" id="postal_code" value="{$infoCustomerToCrawler["postal_code"]}" />
        <input type="hidden" id="country" value="{$infoCustomerToCrawler["country"]}" />

      </div>
    </div>
  </section>

  {block name='hook_payment_return'}
    {if ! empty($HOOK_PAYMENT_RETURN)}
      <section id="content-hook_payment_return" class="card definition-list new-layout-commande-box-payment" >
        <div class="card-block">
          <div class="row">
            <div class="col-md-12">
              {assign var='DECODED_HOOK_PAYMENT_RETURN' value=$HOOK_PAYMENT_RETURN|html_entity_decode}
              {$DECODED_HOOK_PAYMENT_RETURN nofilter}
            </div>
          </div>
        </div>
      </section>
    {/if}
  {/block}

  {block name='customer_registration_form'}
    {if $customer.is_guest}
      <div id="registration-form" class="card">
        <div class="card-block">
          <h4 class="h4">{l s='Save time on your next order, sign up now' d='Shop.Theme.Checkout'}</h4>
          {render file='customer/_partials/customer-form.tpl' ui=$register_form}
        </div>
      </div>
    {/if}
  {/block}

  {block name='hook_order_confirmation_1'}
    {hook h='displayOrderConfirmation1'}
  {/block}

  {block name='hook_order_confirmation_2'}
    <!--<section id="content-hook-order-confirmation-footer">
      {hook h='displayOrderConfirmation2'}
    </section>-->
  {/block}
{/block}
