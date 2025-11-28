{**
 * Advanced Anti Spam Google reCAPTCHA PrestaShop Module.
 *
 * @author      ReduxWeb <contact@reduxweb.net>
 * @copyright   2017-2021
 * @license     LICENSE.txt
*}

<div class="pt-3 border-top border-light">
    <div class="text-center">
        <button type="submit" class="btn btn-primary px-4"{if isset($disabledForDemo) && $disabledForDemo} disabled{/if}>
            <i class="material-icons mr-1">check</i>
            {$trans.save|escape:'html':'UTF-8'}
        </button>
        {if isset($disabledForDemo) && $disabledForDemo}
            {include file='./demo.badge.tpl'}
        {/if}
    </div>
</div>
