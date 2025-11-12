{*
 *  Tous droits réservés NDKDESIGN
 *
 *  @author Hendrik Masson <postmaster@ndk-design.fr>
 *  @copyright Copyright 2013 - 2014 Hendrik Masson
 *  @license   Tous droits réservés
*}


<div class="form-group ndkackFieldItem recipient-group aluclass-disable-div {$influences[$field.id_ndk_customization_field]}" data-rposition = "{$field.ref_position|escape:'intval'}" data-typefield = "{$field.type|escape:'intval'}" data-position = "{$field.position|escape:'intval'}" data-iteration="{$field_iteration}"  data-id="{$field.target|escape:'htmlall':'UTF-8'}" data-view="{$field.target_child|escape:'htmlall':'UTF-8'}" data-field="{$field.id_ndk_customization_field|escape:'htmlall':'UTF-8'}">

	<label class="toggler"
		{if $field.is_picto} style="background-image: url('{if isset($is_https) && $is_https}{$base_dir_ssl}{else}{$base_dir}{/if}img/scenes/ndkcf/pictos/{$field.id_ndk_customization_field|escape:'intval'}.jpg');"{/if}
	>{$field.name|escape:'htmlall':'UTF-8'}
	{if $fieldPricePerCaracter > 0}{l s='cost : ' mod='ndk_advanced_custom_fields'}{convertPrice price=$fieldPricePerCaracter} {l s='per caracter' mod='ndk_advanced_custom_fields'}
	{elseif $fieldPrice > 0}{l s='cost : ' mod='ndk_advanced_custom_fields'}{convertPrice price=$fieldPrice}{/if}
	{if $field.is_visual == 1}
		<span class="layer_view visible_layer" data-group="{$field.id_ndk_customization_field|escape:'intval'}" data-zindex="{$field.zindex|escape:'htmlall':'UTF-8'}" data-id="{$field.target|escape:'htmlall':'UTF-8'}" data-view="{$field.target_child|escape:'htmlall':'UTF-8'}"/>&nbsp;</span>
	{/if}
	{if $field.tooltip !=''}
    <span class="tooltipDescMark">
    <div class="tooltip-ndk">
      <div class="tooltipDescription"> {$field.tooltip nofilter}</div>
    </div>
  </span>
	{/if}
	</label>
	<div class="fieldPane clearfix" style="display: none;">
		{if $field.notice !=''}
			<div class="field_notice clearfix clear">{$field.notice nofilter}</div>
		{/if}
			<div class="form_element">
				<label class="clearfix">{l s='Firstname'  mod='ndk_advanced_custom_fields'}</label>
				<input type="text" class="form-control recipient-field recipient-text" name="ndkcsfield[{$field.id_ndk_customization_field|escape:'intval'}][recipient][firstname]"/>
			</div>
			<div class="form_element">
				<label class="clearfix">{l s='Lastname'  mod='ndk_advanced_custom_fields'}</label>
				<input type="text" class="form-control recipient-field recipient-text" name="ndkcsfield[{$field.id_ndk_customization_field|escape:'intval'}][recipient][lastname]"/>
			</div>
			<div class="form_element">
				<label class="clearfix">{l s='Email'  mod='ndk_advanced_custom_fields'}</label>
				<input type="text" class="form-control recipient-field recipient-text" name="ndkcsfield[{$field.id_ndk_customization_field|escape:'intval'}][recipient][email]"/>
			</div>
			<div class="form_element">
				<label class="clearfix">{l s='Your message'  mod='ndk_advanced_custom_fields'}</label>
				<textarea class="form-control recipient-field recipient-text" name="ndkcsfield[{$field.id_ndk_customization_field|escape:'intval'}][recipient][message]"></textarea>
			</div>
			<div class="form_element">
				<label class="clearfix">{l s='Send to recipient '  mod='ndk_advanced_custom_fields'}</label>
				<p>
				<span>{l s='No' mod='ndk_advanced_custom_fields'}</span>
				<input type="radio" class="recipient-field" name="ndkcsfield[{$field.id_ndk_customization_field|escape:'intval'}][recipient][send_mail]" value="0" checked="checked"/><br>
				<i>{l s='Only you receive the gift voucher ' mod='ndk_advanced_custom_fields'}</i>
				</p>
				<p>
				<span>{l s='Yes ' mod='ndk_advanced_custom_fields' mod='ndk_advanced_custom_fields'}  </span>
				<input type="radio" class="recipient-field" name="ndkcsfield[{$field.id_ndk_customization_field|escape:'intval'}][recipient][send_mail]" value="1"/><br>
				<i>{l s='Both you and the recipient receive the gift voucher ' mod='ndk_advanced_custom_fields'}</i>
				</p>
			</div>

	</div>
</div>
