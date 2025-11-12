{*
 *  Tous droits réservés NDKDESIGN
 *
 *  @author Hendrik Masson <postmaster@ndk-design.fr>
 *  @copyright Copyright 2013 - 2014 Hendrik Masson
 *  @license   Tous droits réservés
*}

<div class="form-group ndkackFieldItem aluclass-disable-div {$influences[$field.id_ndk_customization_field]}" data-rposition = "{$field.ref_position|escape:'intval'}"  data-typefield = "{$field.type|escape:'intval'}"   data-position = "{$field.position|escape:'intval'}" data-iteration="{$field_iteration}" data-id="{$field.target|escape:'htmlall':'UTF-8'}" data-view="{$field.target_child|escape:'htmlall':'UTF-8'}" data-field="{$field.id_ndk_customization_field|escape:'htmlall':'UTF-8'}">
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
	<div class="fieldPane clearfix" style="display: none;">

		{if $field.notice !=''}
			<div class="field_notice clearfix clear">{$field.notice nofilter}</div>
		{/if}
		{if $field.required == 0}
		<a href="#" style="display: none;" class="remove-img-item button btn pull-right btn-default button-small removePrice" data-group-target="{$field.id_ndk_customization_field|escape:'intval'}"><span>{l s='remove '  mod='ndk_advanced_custom_fields'}</span></a>
		{/if}

		<div class="clearfix clear row" id="main-{$field.id_ndk_customization_field|escape:'intval'}">
			<div class="clear col-xs-12 clearfix visu-tools">
				{if $field.colorizesvg}
				<div class="pull-right">
					<p class="clear clearfix"><label>{l s='Images colors '  mod='ndk_advanced_custom_fields'}</label></p>
					<div class="ndk_selector">
						<ul class="colorize_svg" data-group="{$field.id_ndk_customization_field|escape:'intval'}"></ul>
					</div>
				</div>

				{/if}
			</div>
			<input data-message="{l s='Informe' mod='ndk_advanced_custom_fields'} {$field.name|escape:'htmlall':'UTF-8'}" id="ndkcsfield_{$field.id_ndk_customization_field|escape:'intval'}" type="hidden" name="ndkcsfield[{$field.id_ndk_customization_field|escape:'intval'}]" value="" class="{if $field.required == 1} required_field{/if}"/>

			<input type="hidden" id="ndkcsfieldPdf_{$field.id_ndk_customization_field|escape:'intval'}" name="ndkcsfieldPdf[{$field.id_ndk_customization_field|escape:'intval'}]"/>

			{if $field.values|@count > 4}
				{assign var="colxsx" value="col-md-3 col-xs-4"}
			{else}
				{assign var="colxsx" value="col-md-3 col-xs-4"}
			{/if}
			{foreach from=$field.values item=value}
				<span id="value-json-details-{$value.id|escape:'intval'}" ></span>
				{if $field.price_type == 'percent'}
					{assign var='valuePrice' value=$value.price}
				{else}
					{assign var='valuePrice' value=Tools::convertPrice($value.price, Context::getContext()->currency->id)|round:2}
				{/if}

				{if $value.set_quantity == 0 || $value.quantity > 0}
				{assign var=tags value=','|explode:$value.tags}
				<div data-hide-field="{if $value.influences_restrictions|strpos:"all" !== false}1{else}0{/if}" data-id-value="{$value.id|escape:'intval'}" class="{$colxsx} filterTag {if $value.tags && $value.tags !=''} tagged {foreach from=$tags item=tag}{$tag|replace:' ':'-'} {/foreach}{/if} img-item-row" data-tags="{foreach from=$tags item=tag}{$tag}|{/foreach}" data-root="{$field.id_ndk_customization_field|escape:'intval'}" data-group="{$field.id_ndk_customization_field|escape:'intval'}">
					<img loading="lazy" class="centalizar-image-ndk-field-value  {if $field.is_visual == 1}visual-effect {/if}{if $value.issvg}svg {else} jpg{/if} img-value-{$field.id_ndk_customization_field|escape:'intval'} img-responsive img-value" data-value="{$value.id|escape:'intval'}" title="{$value.value|escape:'htmlall':'UTF-8'}"   data-group="{$field.id_ndk_customization_field|escape:'intval'}" data-src="{if isset($is_https) && $is_https}{$base_dir_ssl}{else}{$base_dir}{/if}img/scenes/ndkcf/{$value.id|escape:'intval'}{if $value.issvg}.svg{else}.jpg{/if}" data-zindex="{$field.zindex|escape:'htmlall':'UTF-8'}" data-dragdrop="{$field.draggable|escape:'intval'}" data-id-value="{$value.id|escape:'intval'}"
					data-resizeable="{$field.resizeable|escape:'intval'}"
					data-rotateable="{$field.rotateable|escape:'intval'}"
					data-quantity-available="{if $value.set_quantity >0}{$value.quantity}{else}null{/if}" data-default-value="{$value.default_value|escape:'intval'}"
					 data-price="{if $valuePrice > 0}{$valuePrice|escape:'htmlall':'UTF-8'}{else}{$fieldPrice|escape:'htmlall':'UTF-8'}{/if}" data-id="{$field.target|escape:'htmlall':'UTF-8'}" data-view="{$field.target_child|escape:'htmlall':'UTF-8'}" data-blend="{$field.color_effect}"
					 data-thumb="{if isset($is_https) && $is_https}{$base_dir_ssl}{else}{$base_dir}{/if}img/scenes/ndkcf/{if !$value.issvg}thumbs/{/if}{$value.id|escape:'intval'}{if !$value.issvg}{if $value.is_texture}-texture{else}-small_default{/if}{/if}{if $value.issvg}.svg{else}.jpg{/if}"
            src="{if isset($is_https) && $is_https}{$base_dir_ssl}{else}{$base_dir}{/if}img/scenes/ndkcf/{if !$value.issvg}thumbs/{/if}{$value.id|escape:'intval'}{if !$value.issvg}{if $value.is_texture}-texture{else}-small_default{/if}{/if}{if $value.issvg}.svg{else}.jpg{/if}"
					 {if $field.is_mask_image}data-mask-image="{if isset($is_https) && $is_https}{$base_dir_ssl}{else}{$base_dir}{/if}img/scenes/ndkcf/mask/{$field.id_ndk_customization_field|escape:'intval'}.jpg"{/if}
					 />
					{if $value.issvg}
					<div class="svg-container">{$value.svgcode nofilter}</div>
					{/if}

				<center><i id = "descriptionimg_{$value.id|escape:'intval'}">{$value.value|escape:'htmlall':'UTF-8'}
				</i>
				<i id = "descriptionPrice_{$value.id|escape:'intval'}">
				{if $valuePrice > 0}  {l s="+" mod='ndk_advanced_custom_fields'}
					{if $field.price_type == 'percent'}
						{$valuePrice}%
					{else}
            {if $reduction_value < 100}
              <s>{convertPrice price=$valuePrice}</s>
              <span style="color: var(--primary);"> {convertPrice price=$valuePrice-($valuePrice*($reduction_value/100))}</span>
            {else}
              {convertPrice price=$valuePrice}
            {/if}
					{/if}
				{else}
					{if $fieldPrice > 0} {l s="+" mod='ndk_advanced_custom_fields'}
						{if $field.price_type == 'percent'}
							{$fieldPrice}%
						{else}
							{convertPrice price=$fieldPrice}
						{/if}
					{/if}
				{/if}
				</i>
				{if $value.description !=''}
          <span class="tooltipDescMark">
          <div class="tooltip-ndk">
            <div class="tooltipDescription"> {$value.description nofilter}</div>
          </div>
        </span>
					{/if}
				</center>
				</div>
				{/if}
			{/foreach}
			{if $field.orienteable == 1}
				{include file='./orienteable.tpl'}
			{/if}
		</div>

		{include file='./specific_prices.tpl'}
	</div>
</div>
<script type="text/javascript">
	fieldColors_{$field.id_ndk_customization_field}= [];
	{if $field.colors !=''}
		{foreach from=$field.colors  item=color}
			window['fieldColors_{$field.id_ndk_customization_field}'].push('{$color}');
		{/foreach}
	{/if}
</script>


