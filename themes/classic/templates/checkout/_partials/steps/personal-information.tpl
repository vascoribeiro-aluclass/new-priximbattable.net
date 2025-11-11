{extends file='checkout/_partials/steps/checkout-step.tpl'}

{block name='step_content'}
  {if $customer.is_logged && !$customer.is_guest}

    <p class="identity">
      {* [1][/1] is for a HTML tag. *}
      {l s='Connected as [1]%firstname% %lastname%[/1].'
        d='Shop.Theme.Customeraccount'
        sprintf=[
          '[1]' => "<a href='{$urls.pages.identity}'>",
          '[/1]' => "</a>",
          '%firstname%' => $customer.firstname,
          '%lastname%' => $customer.lastname
        ]
      }
    </p>
    <p>
      {* [1][/1] is for a HTML tag. *}
      {l
        s='Not you? [1]Log out[/1]'
        d='Shop.Theme.Customeraccount'
        sprintf=[
        '[1]' => "<a href='{$urls.actions.logout}'>",
        '[/1]' => "</a>"
        ]
      }
    </p>
    {if !isset($empty_cart_on_logout) || $empty_cart_on_logout}
      <p><small>{l s='If you sign out now, your cart will be emptied.' d='Shop.Theme.Checkout'}</small></p>
    {/if}

  {else}

    <ul class="nav nav-inline my-2" role="tablist">
      <li class="nav-item">
        <a
          class="nav-link {if !$show_login_form}active{/if}"
          data-toggle="tab"
          href="#checkout-guest-form"
          role="tab"
          aria-controls="checkout-guest-form"
          {if !$show_login_form} aria-selected="true"{/if}
          >
          {if $guest_allowed}
            {l s='Order as a guest' d='Shop.Theme.Checkout'}
          {else}
            {l s='Create an account' d='Shop.Theme.Customeraccount'}
          {/if}
        </a>
      </li>

      <li class="nav-item">
        <span href="nav-separator"> | </span>
      </li>

      <li class="nav-item">
        <a
          class="nav-link {if $show_login_form}active{/if}"
          data-link-action="show-login-form"
          data-toggle="tab"
          href="#checkout-login-form"
          role="tab"
          aria-controls="checkout-login-form"
          {if $show_login_form} aria-selected="true"{/if}
        >
          {l s='Sign in' d='Shop.Theme.Actions'}
        </a>
      </li>
      <li class="nav-item">
      <span href="nav-separator"> | </span>
      </li>
      <li class="nav-item">
        <a
          class="nav-link "

          href="/connexion?create_account=1"
          target="_blank"

        >
          {l s='Créer un compte' d='Shop.Theme.Actions'}
        </a>
      </li>
    </ul>

    <div class="tab-content">
      <div class="tab-pane {if !$show_login_form}active{/if}" id="checkout-guest-form" role="tabpanel" {if $show_login_form}aria-hidden="true"{/if}>
        <div class="row">
          <div class="col-md-8">
            {render file='checkout/_partials/customer-form.tpl' ui=$register_form guest_allowed=$guest_allowed}
          </div>
          <div class="col-md-4 hidden-md-down">
            <picture>
              <source srcset="/img/cms/Avis/avis-confirmation-commande.webp" type="image/webp">
              <img loading="lazy" src="/img/cms/Avis/avis-confirmation-commande.jpg" class="img-fluid new-layout-commande-box1" alt="Avis" title="Avis" width="400" height="400">
            </picture>
            <div class="logos-avis-conf-order-parent">
              <div class="logos-avis-conf-order" style="bottom: 45px;height: 35px;">
                <a style="display:flex; gap:5px;">
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
              <div class="logos-avis-conf-order" style="height: 35px;">
                <a style="display:flex;gap:5px;">
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
          </div>
        </div>
      </div>
      <div class="tab-pane {if $show_login_form}active{/if}" id="checkout-login-form" role="tabpanel" {if !$show_login_form}aria-hidden="true"{/if}>
        <div class="row">
          <div class="col-md-8">
            {render file='checkout/_partials/login-form.tpl' ui=$login_form}
          </div>
          <div class="col-md-4">
            <picture>
              <source srcset="/img/cms/Avis/avis-confirmation-commande.webp" type="image/webp">
              <img loading="lazy" src="/img/cms/Avis/avis-confirmation-commande.jpg" class="img-fluid new-layout-commande-box1" alt="Avis" title="Avis" width="491" height="319">
            </picture>
            <div class="logos-avis-conf-order-parent">
                  <div class="logos-avis-conf-order avis-h-checkout avis-h-checkout-addrs" style="bottom:45px">
                    <a style="display:flex; gap:5px;">
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
                  <div class="logos-avis-conf-order avis-h-checkout avis-h-checkout-addrs">
                    <a style="display:flex;gap:5px;">
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
          </div>
        </div>
      </div>
    </div>

  {/if}
{/block}
