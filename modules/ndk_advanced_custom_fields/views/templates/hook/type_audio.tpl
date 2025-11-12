{*
 *  Tous droits réservés NDKDESIGN
 *
 *  @author Hendrik Masson <postmaster@ndk-design.fr>
 *  @copyright Copyright 2013 - 2014 Hendrik Masson
 *  @license   Tous droits réservés
*}

<div class="form-group ndkackFieldItem aluclass-disable-div {$influences[$field.id_ndk_customization_field]}"  data-rposition = "{$field.ref_position|escape:'intval'}" data-typefield = "{$field.type|escape:'intval'}" data-position = "{$field.position|escape:'intval'}" data-iteration="{$field_iteration}" data-id="{$field.target|escape:'htmlall':'UTF-8'}" data-view="{$field.target_child|escape:'htmlall':'UTF-8'}" data-field="{$field.id_ndk_customization_field|escape:'htmlall':'UTF-8'}">
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
	<div class="fieldPane clearfix" style="display: none;">
		{if $field.notice !=''}
			<div class="field_notice clearfix clear">{$field.notice nofilter}</div>
		{/if}
		<div class="row" id="main-{$field.id_ndk_customization_field|escape:'intval'}">

			<input data-message="{l s='Informe' mod='ndk_advanced_custom_fields'} {$field.name|escape:'htmlall':'UTF-8'}" id="ndkcsfield_{$field.id_ndk_customization_field|escape:'intval'}" type="hidden" name="ndkcsfield[{$field.id_ndk_customization_field|escape:'intval'}]" value="" class="{if $field.required == 1} required_field{/if}"/>

			<input type="hidden" id="ndkcsfieldPdf_{$field.id_ndk_customization_field|escape:'intval'}" name="ndkcsfieldPdf[{$field.id_ndk_customization_field|escape:'intval'}]"/>

			{if $field.values|@count > 4}
				{assign var="colxsx" value="col-md-6 col-xs-12"}
			{else}
				{assign var="colxsx" value="col-md-6 col-xs-12"}
			{/if}
			{foreach from=$field.values item=value}
				{if $field.price_type == 'percent'}
					{assign var='valuePrice' value=$value.price}
				{else}
					{assign var='valuePrice' value=Tools::convertPrice($value.price, Context::getContext()->currency->id)|round:2}
				{/if}

				{if $value.set_quantity == 0 || $value.quantity > 0}
				{assign var=tags value=','|explode:$value.tags}
				<div class="{$colxsx} filterTag {if $value.tags && $value.tags !=''} tagged {foreach from=$tags item=tag}{$tag|replace:' ':'-'} {/foreach}{/if} audio-item-row" data-tags="{foreach from=$tags item=tag}{$tag}|{/foreach}" data-root="{$field.id_ndk_customization_field|escape:'intval'}">

					<span class="false_radio {if $field.is_visual == 1}visual-effect {/if} audio-value-{$field.id_ndk_customization_field|escape:'intval'} audio-responsive img-value" data-value="{$value.id|escape:'intval'}" title="{$value.value|escape:'htmlall':'UTF-8'}"   data-group="{$field.id_ndk_customization_field|escape:'intval'}" data-hide-field="{if $value.influences_restrictions|strpos:"all" !== false}1{else}0{/if}" data-id-value="{$value.id|escape:'intval'}"
					data-quantity-available="{if $value.set_quantity >0}{$value.quantity}{else}null{/if}" data-default-value="{$value.default_value|escape:'intval'}"
					 data-price="{if $valuePrice > 0}{$valuePrice|escape:'htmlall':'UTF-8'}{else}{$fieldPrice|escape:'htmlall':'UTF-8'}{/if}"
					 data-id="{$field.target|escape:'htmlall':'UTF-8'}"
					 data-view="{$field.target_child|escape:'htmlall':'UTF-8'}"></span>
					<audio controls>
					 <source src="{if isset($is_https) && $is_https}{$base_dir_ssl}{else}{$base_dir}{/if}img/scenes/ndkcf/{$value.id|escape:'intval'}.mp3" type="audio/mpeg">
					 {l s='Your browser does not support the audio element.' mod='ndk_advanced_custom_fields'}
					 </audio>


				<center><i>{$value.value|escape:'htmlall':'UTF-8'}
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
				</i></center>
				</div>
				{/if}
			{/foreach}
		</div>
	</div>
</div>
