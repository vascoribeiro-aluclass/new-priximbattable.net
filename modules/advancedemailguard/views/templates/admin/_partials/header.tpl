{**
 * Advanced Anti Spam Google reCAPTCHA PrestaShop Module.
 *
 * @author      ReduxWeb <contact@reduxweb.net>
 * @copyright   2017-2021
 * @license     LICENSE.txt
*}

<header id="header" class="navbar navbar-expand-lg navbar-light bg-white">
    {if $ratingMessage}
        {include file='./rating.tpl'}
    {/if}
    <div id="headerCont" class="container container-fixed"{if $ratingMessage} style="display: none;"{/if}>
        <div class="navbar-brand">
            <img src="{$basePath|escape:'html':'UTF-8'}logo.png" width="32px" height="32px" alt="" class="mr-2">
            <span class="app-name">{$appName|escape:'html':'UTF-8'}</span>
            <span class="app-version badge badge-light ml-1" title="{l s='Current version' mod='advancedemailguard'}"
                data-toggle="tooltip">{$appVersion|escape:'html':'UTF-8'}</span>
            {if $isDemo}
                <span class="app-demo badge badge-primary ml-1" title="{l s='This module is a demo. Some configuration will be unavailable. After purchasing and downloading the module all settings will be available.' mod='advancedemailguard'}"
                    data-toggle="tooltip">{$trans.demo|escape:'html':'UTF-8'}</span>
            {/if}
        </div>
        <button class="navbar-toggler btn btn-light" type="button" data-toggle="collapse" data-target="#extra">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="extra">
            <ul class="navbar-nav ml-auto">
                {if !$isDemo}
                    <li class="nav-item">
                        <a class="nav-link" href="{$psAddonsLinks.ratings|escape:'html':'UTF-8'}" target="_blank">
                            <i class="material-icons text-warning">star</i>
                            {l s='Rate our module' mod='advancedemailguard'}</a>
                    </li>
                {/if}
                <li class="nav-item">
                    <a class="nav-link" href="{$psAddonsLinks.profile|escape:'html':'UTF-8'}" target="_blank">
                        <i class="material-icons text-primary">layers</i>
                        {l s='Discover more modules' mod='advancedemailguard'}</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                        <i class="material-icons text-primary">help</i>
                        {l s='Help' mod='advancedemailguard'}</a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="{$docsLink|escape:'html':'UTF-8'}" target="_blank" class="dropdown-item">
                            {l s='Documentation' mod='advancedemailguard'}</a>
                        <a href="{$psAddonsLinks.contact|escape:'html':'UTF-8'}" target="_blank" class="dropdown-item">
                            {l s='Contact us' mod='advancedemailguard'}</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</header>
