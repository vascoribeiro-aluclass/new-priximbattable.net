{**
 * Advanced Anti Spam Google reCAPTCHA PrestaShop Module.
 *
 * @author      ReduxWeb <contact@reduxweb.net>
 * @copyright   2017-2021
 * @license     LICENSE.txt
*}

{if $alerts}
    {foreach $alerts as $type => $items}
        {if $items}
            <div class="alert alert-{if $type === 'success'}success{elseif $type === 'warning'}warning{elseif $type === 'error'}danger{else}info{/if}">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {if count($items) === 1}
                    <i class="material-icons mr-1">{if $type === 'success'}check{elseif $type === 'warning'}warning{elseif $type === 'error'}error_outline{else}info_outline{/if}</i>
                    {$items.0|escape:'html':'UTF-8'}
                {else}
                    <ul class="list-unstyled mb-0">
                        {foreach $items as $item}
                            <li>
                                <i class="material-icons mr-1">{if $type === 'success'}check{elseif $type === 'warning'}warning{elseif $type === 'error'}error_outline{else}info_outline{/if}</i>
                                {$item|escape:'html':'UTF-8'}
                            </li>
                        {/foreach}
                    </ul>
                {/if}
            </div>
        {/if}
    {/foreach}
{/if}