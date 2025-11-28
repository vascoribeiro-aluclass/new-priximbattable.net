{**
 * Advanced Anti Spam Google reCAPTCHA PrestaShop Module.
 *
 * @author      ReduxWeb <contact@reduxweb.net>
 * @copyright   2017-2021
 * @license     LICENSE.txt
*}

<div id="ratingMessage" class="mx-auto">
    <div class="container container-fixed">
        <div class="d-flex align-items-center justify-content-center">
            <div>{$ratingMessage}{* This is HTML content *} 😊</div>
            <div class="ml-3">
                <a href="{$psAddonsLinks.ratings|escape:'html':'UTF-8'}" target="_blank"
                    class="btn btn-primary js-rating-link">
                    {l s='Sure, take me there' mod='advancedemailguard'}
                </a>
                <a href="#" class="btn btn-outline-secondary ml-1 js-rating-dismiss">
                    {l s='No, thanks' mod='advancedemailguard'}
                </a>
            </div>
        </div>
    </div>
</div>