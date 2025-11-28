{**
 * Advanced Anti Spam Google reCAPTCHA PrestaShop Module.
 *
 * @author      ReduxWeb <contact@reduxweb.net>
 * @copyright   2017-2021
 * @license     LICENSE.txt
*}

{extends file='./layouts/main.tpl'}

{block name='content'}
    {if $canConfig}
        <div class="row-main">
            <div class="col-nav">
                <div class="list-group mb-3">
                    {include file='./_partials/nav.tpl'}
                </div>
            </div>
            <div class="col-content">
                <div class="tab-content">
                    <div class="tab-pane fade show{if !$tab} active{/if}" id="list-settings">
                        {include file='./pages/settings/recaptcha.tpl'}
                        {include file='./pages/settings/email.tpl'}
                        {include file='./pages/settings/message.tpl'}
                    </div>
                    <div class="tab-pane fade show{if $tab === 'forms'} active{/if}" id="list-forms">
                        {include file='./pages/forms/settings.tpl'}
                    </div>
                    <div class="tab-pane fade show{if $tab === 'logs'} active{/if}" id="list-logs">
                        {include file='./pages/logs/index.tpl'}
                    </div>
                </div>
            </div>
        </div>
    {/if}
{/block}