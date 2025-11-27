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
<!-- HTML code for the chatbox -->
<div id="chatbox" class="chatbox-closed {$gptchatposition|escape:'htmlall':'UTF-8'}">
  <div id="chatbox-header">
    <button id="chatbox-toggle" class="chatbox-toggle-button">
      <svg id="chatbox-minimize-icon" width="18" height="18" viewBox="0 0 24 24" fill="#5d5d5d"
        xmlns="http://www.w3.org/2000/svg">
        <path d="M5 9l7 7 7-7"></path>
      </svg>
      <img src="/modules/gptchatbox/views/img/{$gptchaticon|escape:'htmlall':'UTF-8'}.svg" alt="Chatbox Icon">
      {if $gptchattext}
        <span id="chatbox-title">{$gptchattext|escape:'htmlall':'UTF-8'}</span>
      {/if}
    </button>
  </div>
  <div id="chatbox-content" class="chatbox-content">
    <div id="chatbox-form" {if $FORMCHATGPT} style="display: none;" {/if} class="chatbox-form"
      style="z-index: 999;width: 99%;height: 99%;position: absolute;background-color: #D3D3D3BA;">
      <section class="form-fields" style="padding-bottom: 50px; padding-top: 10px;margin-left: 5px;margin-right: 5px;">
        <div class="bodychatbox"
          style=" border-radius: 25px; padding-bottom: 20px; padding-top: 30px; padding-left: 10px; padding-right: 10px; background-color: white;">
          <div class="form-group row">
            <label class="col-md-3 form-control-label">Nom</label>
            <div class="col-md-9">
              <input class="form-control" name="last_name" id="last_name_chatbox" type="text" required="required">
              <span class="mon_modal_warnning" id="warning_name_chatbox"></span>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 form-control-label">Email</label>
            <div class="col-md-9">
              <input class="form-control" name="email" id="email_chatbox" type="email" required="required">
              <span class="mon_modal_warnning" id="warning_mail_chatbox"></span>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-3 form-control-label">Téléphone</label>
            <div class="col-md-9">
              <input class="form-control" name="phone" id="phone_chatbox" type="text">
              <span class="mon_modal_warnning" id="warning_phone_chatbox"></span>
            </div>
          </div>
          <div class="form-group row" style="display: flex; align-items: center;">
          <label class="col-md-10 form-control-label" style="display: flex; align-items: center; justify-content: flex-end; margin-right: 10px;">
            Voulez-vous être contacté?
          </label>
          <div class="col-md-2" style="display: flex; align-items: center;">
            <input type="checkbox" name="chatbox_contacted" id="chatbox_contacted" value="" style="margin-right: 6px;">
            <span></span>
          </div>
        </div>
          <footer class="form-footer clearfix" style="text-align: end;">
            <button onclick="sendInfoClientChatbox()" class="btn btn-primary form-control-submit pull-xs-right"
              type="button" id="btn_tag_chatbox"
              style="background-color: rgb(182, 202, 229); color: rgb(255, 255, 255);">
              Démarrer la Conversation
            </button>
          </footer>
        </div>
      </section>
    </div>
    <div id="chatbox-messages" class="chatbox-messages">
      <div class="message chatbot response"><span class="customername">{$gptchatname|escape:'htmlall':'UTF-8'}</span>:
        {l s='Welcome to the chatbot!' mod='gptchatbox'}</div>
      <div class="message consent">{$gptconsentmessage|escape:'htmlall':'UTF-8'}</div>

      {if $gptconsentrequired}
        <!-- Consent buttons -->
        <div id="consent-buttons">
          <button id="accept-button" class="btn btn-sm btn-primary">{$gptacceptmessage|escape:'htmlall':'UTF-8'}</button>
        </div>
      {/if}

    </div>
    <div id="waiting-dots" style="display: none;">
      <span class="dot"></span>
      <span class="dot"></span>
      <span class="dot"></span>
    </div>
    <div id="chatbox-input" class="chatbox-input">
      <textarea id="chatbox-input-text" name="chatbox_message"
        placeholder="{l s='Type your message...' mod='gptchatbox'}"
        maxlength="{$gptchatinputmaxlength|escape:'htmlall':'UTF-8'}" rows="1"></textarea>
      <input type="hidden" id="conversationHistory" value="">
      <input type="hidden" id="customerName" value="{$customername|escape:'htmlall':'UTF-8'}">
      <input type="hidden" id="chatbotName" value="{$gptchatname|escape:'htmlall':'UTF-8'}">
      <button id="chatbox-send-button" class="btn btn-primary" {if $gptconsentrequired}disabled{/if}
        {if $gptconsentrequired}disabled{/if}>
        <svg
          style="fill:{$gptchatsendcolor|escape:'htmlall':'UTF-8'};stroke:{$gptchatsendcolor|escape:'htmlall':'UTF-8'};">
          <path d="M2 21L23 12L2 3V10L17 12L2 14V21Z" stroke-width="1.5" stroke-linejoin="round"></path>
        </svg>
      </button>
    </div>
  </div>
</div>
