{extends file='checkout/_partials/steps/checkout-step.tpl'}

{block name='step_content'}

  {hook h='displayPaymentTop'}

  {if $is_free}
    <p>{l s='No payment needed for this order' d='Shop.Theme.Checkout'}</p>
  {/if}
  <div class="row">
    <div class=" col-md-8 payment-options {if $is_free}hidden-xs-up{/if}">
      {foreach from=$payment_options item="module_options"}
        {foreach from=$module_options item="option"}
          <div>
            <div id="{$option.id}-container" class="payment-option clearfix">
              {* This is the way an option should be selected when Javascript is enabled *}
              <span class="custom-radio float-xs-left">
                <input
                  class="ps-shown-by-js {if $option.binary} binary {/if}"
                  id="{$option.id}"
                  data-module-name="{$option.module_name}"
                  name="payment-option"
                  type="radio"
                  required

                  {if $selected_payment_option == $option.id || $is_free} checked {/if}
                >
                <span></span>
              </span>
              {* This is the way an option should be selected when Javascript is disabled *}
              <form method="GET" class="ps-hidden-by-js">
                {if $option.id === $selected_payment_option}
                  {l s='Selected' d='Shop.Theme.Checkout'}
                {else}
                  <button class="ps-hidden-by-js" type="submit" name="select_payment_option" value="{$option.id}">
                    {l s='Choose' d='Shop.Theme.Actions'}
                  </button>
                {/if}
              </form>

              <label for="{$option.id}">
                <span>{$option.call_to_action_text}</span>
                {if $option.logo}
                  <img src="{$option.logo}">
                {/if}
              </label>

            </div>
          </div>

          {if $option.additionalInformation}
            <div
              id="{$option.id}-additional-information"
              class="js-additional-information definition-list additional-information{if $option.id != $selected_payment_option} ps-hidden {/if}"
            >
              {$option.additionalInformation nofilter}




              {if ($option.module_name == "atos")}

              <div class="atos-paiement">
                <div class="overlay"></div>
                {hook h='displayPaymentByBinaries'}

              </div>

              <div class="condition-label custom-1">
              <input type="checkbox" class="checkbox_check" name="cgv-terms">
              <label class="custom-terms">

              J'ai lu et j'accepte les <a href="/content/3-conditions-utilisation" id="cta-terms-and-conditions-0">conditions générales de vente</a> et j'y adhère sans réserve.

              </label>


              </div>
              {/if}

              <div class="row">
                <div class="col-md-12">
                  <p style="text-align:center;">Merci de votre confiance</p>
                </div>
                <div class="col-md-12" style="display:flex; justify-content:center;">
                  <picture>
                    <source srcset="/img/cms/merci_votre_confiance.webp" type="image/webp">
                    <img loading="lazy" src="/img/cms/merci_votre_confiance.jpg" class="img-fluid" alt="Merci de Votre Confiance" title="Merci de Votre Confiance" width="380" height="230">
                  </picture>
                </div>
              </div>

            </div>
          {/if}

          <div
            id="pay-with-{$option.id}-form"
            class="js-payment-option-form {if $option.id != $selected_payment_option} ps-hidden {/if}"
          >
            {if $option.form}
              {$option.form nofilter}
            {else}
              <form id="payment-form{$option.module_name}" method="POST" action="{$option.action nofilter}">
                {foreach from=$option.inputs item=input}
                  <input type="{$input.type}" name="{$input.name}" value="{$input.value}">
                {/foreach}
                <button style="display:none" id="pay-with-{$option.id}" type="submit"></button>
              </form>
            {/if}
          </div>
        {/foreach}
      {foreachelse}
        <p class="alert alert-danger">{l s='Unfortunately, there are no payment method available.' d='Shop.Theme.Checkout'}</p>
      {/foreach}
    </div>
    <div class="col-md-4">
      <picture class="hidden-md-down">
        <source srcset="/img/cms/Avis/banque.webp" type="image/webp">
        <img loading="lazy" src="/img/cms/Avis/banque.jpg" class="img-fluid" alt="Avis" title="Avis" width="615" height="1127">
      </picture>
    </div>
  </div>





  {if $show_final_summary}
    {include file='checkout/_partials/order-final-summary.tpl'}
  {/if}


  <div id="payment-confirmation">
    <div class="ps-shown-by-js">
      {if $conditions_to_approve|count}
    <p class="ps-hidden-by-js">
      {* At the moment, we're not showing the checkboxes when JS is disabled
         because it makes ensuring they were checked very tricky and overcomplicates
         the template. Might change later.
      *}
      {l s='By confirming the order, you certify that you have read and agree with all of the conditions below:' d='Shop.Theme.Checkout'}
    </p>

    <form id="conditions-to-approve" method="GET">
      <ul>
        {foreach from=$conditions_to_approve item="condition" key="condition_name"}
          <li>
            <div class="float-xs-left">
              <span class="custom-checkbox handleClickToPrintCGV">
                <input  id    = "conditions_to_approve[{$condition_name}]"
                        name  = "conditions_to_approve[{$condition_name}]"
                        required
                        type  = "checkbox"
                        value = "1"
                        class = "ps-shown-by-js"
                >
                <span><i class="material-icons rtl-no-flip checkbox-checked">&#xE5CA;</i></span>
              </span>
            </div>
            <div class="condition-label">
              <label class="js-terms" for="conditions_to_approve[{$condition_name}]">
                {$condition nofilter}
              </label>
            </div>
          </li>
        {/foreach}
      </ul>
    </form>
  {/if}

      <a href="/printCGV/printCGV.php" target="_blank" id="buttonPrintCGV" class="btn btn-primary text-white elementHidden">Cliquez ici pour télécharger les CGV</a>

      <button id="alu-btn-pay" type="submit" {if !$selected_payment_option} disabled {/if} class="btn btn-primary center-block">
        {l s='Order with an obligation to pay' d='Shop.Theme.Checkout'}
      </button>
      {if $show_final_summary}
        <article class="alert alert-danger mt-2 js-alert-payment-conditions" role="alert" data-alert="danger">
          {l
            s='Please make sure you\'ve chosen a [1]payment method[/1] and accepted the [2]terms and conditions[/2].'
            sprintf=[
              '[1]' => '<a href="#checkout-payment-step">',
              '[/1]' => '</a>',
              '[2]' => '<a href="#conditions-to-approve">',
              '[/2]' => '</a>'
            ]
            d='Shop.Theme.Checkout'
          }
        </article>
      {/if}
    </div>
    <div class="ps-hidden-by-js">
      {if $selected_payment_option and $all_conditions_approved}

        <label for="pay-with-{$selected_payment_option}">Payer maintenant</label>

      {/if}
    </div>
  </div>

  <div class="modal fade" id="modal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="{l s='Close' d='Shop.Theme.Global'}">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="js-modal-content"></div>
      </div>
    </div>
  </div>
{/block}
