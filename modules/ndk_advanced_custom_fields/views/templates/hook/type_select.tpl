{*
 *  Tous droits réservés NDKDESIGN
 *
 *  @author Hendrik Masson <postmaster@ndk-design.fr>
 *  @copyright Copyright 2013 - 2014 Hendrik Masson
 *  @license   Tous droits réservés
*}

<div class="form-group ndkackFieldItem aluclass-disable-div {$influences[$field.id_ndk_customization_field]}" data-rposition = "{$field.ref_position|escape:'intval'}" data-typefield = "{$field.type|escape:'intval'}" data-position = "{$field.position|escape:'intval'}" data-iteration="{$field_iteration}"  data-id="{$field.target|escape:'htmlall':'UTF-8'}" data-view="{$field.target_child|escape:'htmlall':'UTF-8'}" data-field="{$field.id_ndk_customization_field|escape:'htmlall':'UTF-8'}">
		<label class="toggler"
		{if $field.is_picto} style="background-image: url('{if isset($is_https) && $is_https}{$base_dir_ssl}{else}{$base_dir}{/if}img/scenes/ndkcf/pictos/{$field.id_ndk_customization_field|escape:'intval'}.jpg');"{/if}
	>{$field.name|escape:'htmlall':'UTF-8'}
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
		<span class="progress-field-required">
			<span class="progress-required-text">
				{if $field.required}
					(Obligatorisch)
				{else}
					(Optional)
				{/if}
			</span>
		</span>
		<div class="pt-1 fieldPane clearfix" style="display: none;">

			<div class="clear clearfix" id="main-{$field.id_ndk_customization_field|escape:'intval'}">
				{if $field.notice !=''}
					<div class="field_notice clearfix clear">{$field.notice nofilter}</div>
				{/if}
				<select data-group="{$field.id_ndk_customization_field|escape:'intval'}" data-message="{l s='Select' mod='ndk_advanced_custom_fields'} {$field.name|escape:'htmlall':'UTF-8'}"  name="ndkcsfield[{$field.id_ndk_customization_field|escape:'htmlall':'UTF-8'}]"  id="ndkcsfield_{$field.id_ndk_customization_field|escape:'htmlall':'UTF-8'}" class="form-control-ndk {if $field.is_visual == 1}visual-effect-select {/if} ndk-select {if $field.required == 1} required_field{/if}">
					{if isset($field.feature) && $field.feature > 0}
						{if isset($features) && $features}
									{foreach from=$features item=feature}
										{if $feature.id_feature == $field.feature && isset($feature.value)}
										<option selected="selected" value="{$feature.value|escape:'htmlall':'UTF-8'}"  data-group="{$field.id_ndk_customization_field|escape:'intval'}" data-id="{$field.target|escape:'htmlall':'UTF-8'}" data-view="{$field.target_child|escape:'htmlall':'UTF-8'}" data-quantity-available="{if $value.set_quantity >0}{$value.quantity}{else}999999999{/if}"
										>{$feature.value|escape:'htmlall':'UTF-8'}</option>
										{/if}

									{/foreach}
						{/if}
					{else}
						<option value=""  data-group="{$field.id_ndk_customization_field|escape:'intval'}">-- Wählen Sie eine Option --</option>
					{/if}
					{foreach from=$field.values item=value}
					{if $field.price_type == 'percent'}
						{assign var='valuePrice' value=$value.price}
					{else}
						{assign var='valuePrice' value=Tools::convertPrice($value.price, Context::getContext()->currency->id)|round:2}
					{/if}
						{if $value.set_quantity == 0 || $value.quantity > 0}
						<option value="{$value.value|escape:'htmlall':'UTF-8'}" data-id="{$field.target|escape:'htmlall':'UTF-8'}" data-view="{$field.target_child|escape:'htmlall':'UTF-8'}" data-group="{$field.id_ndk_customization_field|escape:'intval'}" data-src="{if isset($is_https) && $is_https}{$base_dir_ssl}{else}{$base_dir}{/if}img/scenes/ndkcf/{$value.id|escape:'intval'}.jpg" data-zindex="{$field.zindex|escape:'htmlall':'UTF-8'}"
						 data-dragdrop="{$field.draggable|escape:'intval'}"
						 data-resizeable="{$field.resizeable|escape:'intval'}"
						 data-rotateable="{$field.rotateable|escape:'intval'}"
						  data-hide-field="{if $value.influences_restrictions|strpos:"all" !== false}1{else}0{/if}" data-id-value="{$value.id|escape:'intval'}" data-default-value="{$value.default_value|escape:'intval'}"
						 data-quantity-available="{if $value.set_quantity >0}{$value.quantity}{else}999999999{/if}"
						 data-price="{if $valuePrice > 0}{$valuePrice|escape:'htmlall':'UTF-8'}{else}{$fieldPrice|escape:'htmlall':'UTF-8'}{/if}">{$value.value|escape:'htmlall':'UTF-8'} {if $field.is_mask_image}data-mask-image="{if isset($is_https) && $is_https}{$base_dir_ssl}{else}{$base_dir}{/if}img/scenes/ndkcf/mask/{$field.id_ndk_customization_field|escape:'intval'}.jpg"{/if}
						 {if $valuePrice > 0} : {l s="+" mod='ndk_advanced_custom_fields'}
						 	{if $field.price_type == 'percent'}
						 		{$valuePrice}%
						 	{else}
						 		{convertPrice price=$valuePrice}
						 	{/if}
						 {else}
						 	{if $fieldPrice > 0} : {l s="+" mod='ndk_advanced_custom_fields'}
						 		{if $field.price_type == 'percent'}
						 			{$fieldPrice}%
						 		{else}
						 			{convertPrice price=$fieldPrice}
						 		{/if}
						 	{/if}
						 {/if}
						 </option>
						{/if}
					{/foreach}
				</select>

				<input type="hidden" id="ndkcsfieldPdf_{$field.id_ndk_customization_field|escape:'intval'}" name="ndkcsfieldPdf[{$field.id_ndk_customization_field|escape:'intval'}]"/>

				{include file='./specific_prices.tpl'}
			</div>
		</div>

	</div>
