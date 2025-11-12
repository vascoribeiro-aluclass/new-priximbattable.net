{*
 *  Tous droits réservés NDKDESIGN
 *
 *  @author Hendrik Masson <postmaster@ndk-design.fr>
 *  @copyright Copyright 2013 - 2014 Hendrik Masson
 *  @license   Tous droits réservés
*}


<div class="form-group ndkackFieldItem aluclass-disable-div" data-rposition = "{$field.ref_position|escape:'intval'}" data-typefield = "{$field.type|escape:'intval'}" data-position = "{$field.position|escape:'intval'}" data-iteration="{$field_iteration}" data-id="{$field.target|escape:'htmlall':'UTF-8'}" data-view="{$field.target_child|escape:'htmlall':'UTF-8'}" data-field="{$field.id_ndk_customization_field|escape:'htmlall':'UTF-8'}"  data-qtty-min="{$field.quantity_min}"  data-qtty-max="{$field.quantity_max}">
		<label class="toggler"
		{if $field.is_picto} style="background-image: url('{if isset($is_https) && $is_https}{$base_dir_ssl}{else}{$base_dir}{/if}img/scenes/ndkcf/pictos/{$field.id_ndk_customization_field|escape:'intval'}.jpg');"{/if}
	>{$field.name|escape:'htmlall':'UTF-8'}
		{if $field.is_visual == 1}
			<span class="layer_view visible_layer" data-group="{$field.id_ndk_customization_field|escape:'intval'}" data-zindex="{$field.zindex|escape:'htmlall':'UTF-8'}" data-id="{$field.target|escape:'htmlall':'UTF-8'}" data-view="{$field.target_child|escape:'htmlall':'UTF-8'}"/>&nbsp;</span>
		{/if}
		{if $field.tooltip !=''}
			<div class="tooltipDescription">{$field.tooltip nofilter}</div>
				<span class="tooltipDescMark"></span>
		{/if}
		</label>
		<div class="fieldPane clearfix">
			{if $field.notice !=''}
				<div class="field_notice clearfix clear">{$field.notice nofilter}</div>
			{/if}
			<!--<input data-message="{l s='Informe' mod='ndk_advanced_custom_fields'} {$field.name|escape:'htmlall':'UTF-8'}" id="ndkcsfield_{$field.id_ndk_customization_field|escape:'intval'}" type="text" name="ndkcsfield[{$field.id_ndk_customization_field|escape:'intval'}]" value="" class="{if $field.required == 1} required_field{/if}"/>-->
			<div class="minmaxBlock">
				<p class="quantity_error_up alert-danger clear clearfix">{l s="You can't add more than " mod='ndk_advanced_custom_fields'}{$field.quantity_max} {l s='quantities' mod='ndk_advanced_custom_fields'}</p>
				<p data-name="ndkcsfield[{$field.id_ndk_customization_field|escape:'intval'}]" class=" alert-danger clear clearfix quantity_error_down  {if $field.quantity_min > 0}required_field{/if}" val="">{l s="You must add a minimum of " mod='ndk_advanced_custom_fields'}{$field.quantity_min} {l s='quantities' mod='ndk_advanced_custom_fields'}</p>
			</div>
			<!-- bloc tags -->
			<div class="clearfix clear row" id="main-{$field.id_ndk_customization_field|escape:'intval'}">
				<div class="clear col-xs-12 clearfix visu-tools"></div>
			</div>
			<!-- bloc tags -->
			<ul class="ndk_accessory_list accessory_no_quantity">
			{foreach from=$field.values item=value}
				{assign var=tags value=','|explode:$value.tags}
				{if $field.price_type == 'percent'}
					{assign var='valuePrice' value=$value.price}
				{else}
					{assign var='valuePrice' value=Tools::convertPrice($value.price, Context::getContext()->currency->id)|round:2}
				{/if}
				{if $value.set_quantity == 0 || $value.quantity > 0}
				<li class="col-xs-6 clearfix accessory-ndk accessory-ndk-no-quantity {if $field.is_visual == 1}visual-effect {/if} filterTag {if $value.tags && $value.tags !=''} tagged {foreach from=$tags item=tag}{$tag|replace:' ':'-'} {/foreach}{/if}" data-tags="{foreach from=$tags item=tag}{$tag}|{/foreach}"  data-value="{$value.value|escape:'htmlall':'UTF-8'}" title="{$value.value|escape:'htmlall':'UTF-8'}"  data-src="{if $value.is_image}{if isset($is_https) && $is_https}{$base_dir_ssl}{else}{$base_dir}{/if}img/scenes/ndkcf/thumbs/{$value.id|escape:'intval'}-{Configuration::get('NDK_IMAGE_LARGE_SIZE')}.jpg{else}0{/if}" data-group="{$field.id_ndk_customization_field|escape:'intval'}"  data-zindex="{$field.zindex|escape:'htmlall':'UTF-8'}" 
				  data-dragdrop="{$field.draggable|escape:'intval'}" 
				  data-resizeable="{$field.resizeable|escape:'intval'}" 
				  data-rotateable="{$field.rotateable|escape:'intval'}" 
				  data-price="{if $valuePrice > 0}{$valuePrice|escape:'htmlall':'UTF-8'}{else}{$fieldPrice|escape:'htmlall':'UTF-8'}{/if}"
				  data-id="{$field.target|escape:'htmlall':'UTF-8'}" 
				  data-id-value="{$value.id|escape:'htmlall':'UTF-8'}" 
				  data-view="{$field.target_child|escape:'htmlall':'UTF-8'}">
				  <div class="accessory_img_block clear clearfix">
				  	<img class="img-responsive" src="{if isset($is_https) && $is_https}{$base_dir_ssl}{else}{$base_dir}{/if}img/scenes/ndkcf/thumbs/{$value.id|escape:'intval'}-small_default.jpg"/>
				  	{if $value.description!= ''}
				  	<a class="fancybox accessory-more" href="#accessory-popup-{$value.id|escape:'intval'}"></a>
				  	{/if}
				  </div>
				 <div style="display:none">
					 <div id="accessory-popup-{$value.id|escape:'intval'}" class="accessory-popup-ndk">
					 	{if $value.is_image}
						 	<div class="col-md-6 ndk-img-block">
						 		<!--<img data-target-value="{$value.id|escape:'intval'}" class="img-responsive set_one_quantity_img" src="{if isset($is_https) && $is_https}{$base_dir_ssl}{else}{$base_dir}{/if}img/scenes/ndkcf/thumbs/{$value.id|escape:'intval'}-{Configuration::get('NDK_IMAGE_LARGE_SIZE')}.jpg"/>-->
						 	</div>
					 	{/if}
					 	<div class="col-sm-10 ndk-infos-block">
					 		<p class="title_block">{$value.value|escape:'htmlall':'UTF-8'}</p>
					 		<div class="ndk-accessory-desc">{$value.description nofilter}</div>
					 		<div class="price">
					 			{if $valuePrice > 0}  
					 					{if $field.price_type == 'percent'}
					 						+{$valuePrice}%
					 					{else}
					 						{convertPrice price=$valuePrice}
					 					{/if}
					 				{else}
					 					{if $fieldPrice > 0} : 
					 						{if $field.price_type == 'percent'}
					 							+{$fieldPrice}%
					 						{else}
					 							{convertPrice price=$fieldPrice}
					 						{/if}
					 					{/if}
					 				{/if}
					 		</div>
					 	</div>
					 </div>
				</div>
				 <div class="clear clearfix accessory-infos">
				 	<b>{$value.value|escape:'htmlall':'UTF-8'}</b>
				 	
				 	<p class="ndk-accessory-quantity-block">
				 	{assign var='defaultValue' value=0}
				 		{if $value.step_quantity !=''}
				 			{assign var="steps" value=";"|explode:$value.step_quantity}
				 		{foreach from=$steps item=step}
				 			{if $step|strstr:"*"}
				 					{assign var="defaultValue" value=$step|replace:"*":""}
				 			{/if}
				 		{/foreach}
				 		{/if}
				 		
				 		<input type="text" name="ndkcsfield[{$field.id_ndk_customization_field|escape:'intval'}][quantity][{$value.value|escape:'intval'}]" {if $value.set_quantity == 1}data-qtty-available="{$value.quantity|escape:'intval'}" {/if}  data-qtty-max="{$value.quantity_max|escape:'intval'}"  data-qtty-min="{$value.quantity_min|escape:'intval'}" {if $value.quantity_max > 0}max="{$value.quantity_max|escape:'intval'}"{/if}  min="{$value.quantity_min|escape:'intval'}"  type="text" class="ndk-accessory-quantity price_overrided" id="ndk-accessory-quantity-{$value.id|escape:'intval'}" 
				 		
				 		value="{if $defaultValue > 0 && $defaultValue > $value.quantity_min}{$defaultValue}{else}{$value.quantity_min|escape:'intval'}{/if}"
				 		data-default-value="{if $defaultValue > 0 && $defaultValue > $value.quantity_min}{$defaultValue}{else}{$value.quantity_min|escape:'intval'}{/if}"  
				 		data-step_quantity="{$value.step_quantity|escape:'htmlall'|replace:'*':''}" 
				 		data-price="{if $valuePrice > 0}{$valuePrice|escape:'htmlall':'UTF-8'}{else}{$fieldPrice|escape:'htmlall':'UTF-8'}{/if}" data-group="{$field.id_ndk_customization_field|escape:'intval'}" data-hide-field="{if $value.influences_restrictions|strpos:"all" !== false}1{else}0{/if}" data-id-value="{$value.id|escape:'intval'}"  data-value="{$value.value|escape:'htmlall':'UTF-8'}" 
				 		data-value-id="{$field.id_ndk_customization_field|escape:'intval'}-{$value.id|escape:'intval'}" data-step_quantity="{$value.step_quantity|escape:'intval'}"/>
				 		
				 	</p>
				 	<div class="price">
				 		{if $valuePrice > 0}  
				 			{if $field.price_type == 'percent'}
				 				+{$valuePrice}%
				 			{else}
				 				{convertPrice price=$valuePrice}
				 			{/if}
				 		{else}
				 			{if $fieldPrice > 0} : 
				 				{if $field.price_type == 'percent'}
				 					+{$fieldPrice}%
				 				{else}
				 					{convertPrice price=$fieldPrice}
				 				{/if}
				 			{/if}
				 		{/if}
				 	</div>
				 </div>
				 
				</li>
				{/if}
			{/foreach}
			</ul>
			{include file='./specific_prices.tpl'}
		</div>
	</div>