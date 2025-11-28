{**
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 * We offer the best and most useful modules PrestaShop and modifications for your online store.
 * 
 * @author    Carlos Ucha
 * @copyright 2010-2100 Carlos Ucha
 * @license   see file: LICENSE.txt
 * This program is not free software and you can't resell and redistribute it
 *
 * CONTACT WITH DEVELOPER
 * carlosucha92@gmail.com
 *}

{if isset($chatSession) && $chatSession}
    <div class="panel">
        <div class="panel-heading">
            Chat Session Details
        </div>
        <div class="panel-body">
            <div class="container-fluid">
                <div class="form-horizontal">
                    <div class="row form-group">
                        <label class="control-label col-lg-3">
                            Session ID:
                        </label>
                        <div class="col-lg-9">
                            <p class="form-control-static">{$chatSession->id|escape:'html':'UTF-8'}</p>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="control-label col-lg-3">
                            Customer ID:
                        </label>
                        <div class="col-lg-9">
                            <p class="form-control-static">{if $chatSession->customer_id|escape:'html':'UTF-8'}{$chatSession->customer_id|escape:'html':'UTF-8'}{else}guest{/if}</p>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="control-label col-lg-3">
                            Date Added:
                        </label>
                        <div class="col-lg-9">
                            <p class="form-control-static">{$chatSession->date_add|date_format:"%Y-%m-%d %H:%M:%S"}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-heading">
            Messages
        </div>
        <div class="panel-body">
            <div class="container-fluid">
                {if isset($messages) && $messages}
                    {foreach from=$messages item=message}
                        <div class="row form-group {if $message.is_ai}bg-info{else}bg-warning{/if}">
                            <div class="col-sm-10">
                                {if $message.is_ai}AI: {/if}{$message.message|escape:'html':'UTF-8'|replace:'\n':'<br>'}
                            </div>
                            <div class="col-sm-2">
                                {$message.date_add|escape:'html':'UTF-8'}
                            </div>
                        </div>
                    {/foreach}
                {else}
                    <p>No messages found for this session.</p>
                {/if}
            </div>
        </div>
    </div>
{else}
    <p>Chat session not found.</p>
{/if}
