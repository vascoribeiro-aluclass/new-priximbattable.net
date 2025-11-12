{*
 *  Tous droits réservés NDKDESIGN
 *
 *  @author Hendrik Masson <postmaster@ndk-design.fr>
 *  @copyright Copyright 2013 - 2014 Hendrik Masson
 *  @license   Tous droits réservés
*}

{capture name='dataPattern'}
	data-pattern="{foreach from=$field.values  item=value}{$value.textmask nofilter}&&{$value.value nofilter}|{/foreach}"
{/capture}
<div class="form-group ndkackFieldItem aluclass-disable-div {$influences[$field.id_ndk_customization_field]}" data-rposition = "{$field.ref_position|escape:'intval'}" data-typefield = "{$field.type|escape:'intval'}" data-position = "{$field.position|escape:'intval'}" data-iteration="{$field_iteration}"  data-id="{$field.target|escape:'htmlall':'UTF-8'}" data-view="{$field.target_child|escape:'htmlall':'UTF-8'}" data-field="{$field.id_ndk_customization_field|escape:'htmlall':'UTF-8'}">

	<label class="toggler"
		{if $field.is_picto} style="background-image: url('{if isset($is_https) && $is_https}{$base_dir_ssl}{else}{$base_dir}{/if}img/scenes/ndkcf/pictos/{$field.id_ndk_customization_field|escape:'intval'}.jpg');"{/if}
	>{$field.name|escape:'htmlall':'UTF-8'}
	{if $field.price_per_caracter > 0}{l s='cost : ' mod='ndk_advanced_custom_fields'}{convertPrice price=$field.price_per_caracter} {l s='per caracter' mod='ndk_advanced_custom_fields'}
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
			<div class="field_notice clearfix clear pt-1">{$field.notice nofilter}</div>
		{/if}

		{if $field.configurator == 1}
			<textarea id="ndkcsfield_{$field.id_ndk_customization_field|escape:'intval'}" {$smarty.capture.dataPattern nofilter} data-lines="{$field.nb_lines|escape:'htmlall':'UTF-8'}" data-max="{$field.maxlength}"  data-message="{l s='Informe' mod='ndk_advanced_custom_fields'} {$field.name|escape:'htmlall':'UTF-8'}"  name="ndkcsfield[{$field.id_ndk_customization_field|escape:'intval'}]" class="{if $field.is_visual == 1}visual-effect {/if} form-control {if $field.configurator == 1} textzone{/if} ndktextarea {if $field.required == 1} required_field{/if}"  data-group="{$field.id_ndk_customization_field|escape:'intval'}" data-zindex="{$field.zindex|escape:'htmlall':'UTF-8'}" data-price="{$fieldPrice|escape:'htmlall':'UTF-8'}" data-ppcprice="{$field.price_per_caracter|escape:'htmlall':'UTF-8'}"  data-id="{$field.target|escape:'htmlall':'UTF-8'}" data-view="{$field.target_child|escape:'htmlall':'UTF-8'}" data-dragdrop="{$field.draggable|escape:'intval'}"
			data-resizeable="{$field.resizeable|escape:'intval'}"
			data-rotateable="{$field.rotateable|escape:'intval'}" data-path="{$field.svg_path|escape:'UTF-8'}"  data-blend="{$field.color_effect}" {if $field.is_mask_image}data-mask-image="{if isset($is_https) && $is_https}{$base_dir_ssl}{else}{$base_dir}{/if}img/scenes/ndkcf/mask/{$field.id_ndk_customization_field|escape:'intval'}.jpg"{/if}></textarea>
		{else}
		<div class="clearfix clear bordered">
			<textarea  style="display: none;" id="ndkcsfield_{$field.id_ndk_customization_field|escape:'intval'}" data-max="{$field.maxlength}" {$smarty.capture.dataPattern nofilter} {if $field.maxlength > 0}maxlength="{$field.maxlength}" {/if} data-message="{l s='Informe' mod='ndk_advanced_custom_fields'} {$field.name|escape:'htmlall':'UTF-8'}"  name="ndkcsfield[{$field.id_ndk_customization_field|escape:'intval'}]" class="{if $field.required == 1} required_field{/if} form-control simpleText {if $field.is_visual == 1}visual-text{/if}"  data-group="{$field.id_ndk_customization_field|escape:'intval'}" data-zindex="{$field.zindex|escape:'htmlall':'UTF-8'}" data-price="{$fieldPrice|escape:'htmlall':'UTF-8'}" data-ppcprice="{$field.price_per_caracter|escape:'htmlall':'UTF-8'}" placeholder="{$field.name|escape:'htmlall':'UTF-8'} {if $fieldPrice > 0}{l s='cost : ' mod='ndk_advanced_custom_fields'}{convertPrice price=$fieldPrice}{/if}"  data-id="{$field.target|escape:'htmlall':'UTF-8'}" data-view="{$field.target_child|escape:'htmlall':'UTF-8'}" data-dragdrop="{$field.draggable|escape:'intval'}"
			data-resizeable="{$field.resizeable|escape:'intval'}"
			data-rotateable="{$field.rotateable|escape:'intval'}"
			data-path="{$field.svg_path|escape:'UTF-8'}"
			data-lines="{$field.nb_lines|escape:'htmlall':'UTF-8'}"
			 data-blend="{$field.color_effect}" {if $field.is_mask_image}data-mask-image="{if isset($is_https) && $is_https}{$base_dir_ssl}{else}{$base_dir}{/if}img/scenes/ndkcf/mask/{$field.id_ndk_customization_field|escape:'intval'}.jpg"{/if}></textarea>
       <div class="zone_text_inputs pt-1"><input id="text_{$field.id_ndk_customization_field|escape:'intval'}" data-pattern="{$field.name|escape:'htmlall':'UTF-8'} {if $fieldPrice > 0}{l s='cost : ' mod='ndk_advanced_custom_fields'}{convertPrice price=$fieldPrice}{/if}" type="text" size="15" value="" class="required_field_test noborderSimple" placeholder="{$field.name|escape:'htmlall':'UTF-8'} {if $fieldPrice > 0}{l s='cost : ' mod='ndk_advanced_custom_fields'}{convertPrice price=$fieldPrice}{/if}" data-message="{l s='Informe' mod='ndk_advanced_custom_fields'} {$field.name|escape:'htmlall':'UTF-8'}"></div>
      {if $field.is_visual == 1}<span class="button button-small submitSimpleText">{l s='Apply' mod='ndk_advanced_custom_fields'}</span>{/if}
		</div>
		{/if}
		{if $field.orienteable == 1}
			{include file='./orienteable.tpl'}
		{/if}

	</div>

</div>

<input type="hidden" id="ndkcsfieldPdf_{$field.id_ndk_customization_field|escape:'intval'}" name="ndkcsfieldPdf[{$field.id_ndk_customization_field|escape:'intval'}]"/>


<script type="text/javascript">
	{if $field.stroke_color == 1}
		stroke_color[{$field.id_ndk_customization_field}] = true;
	{else}
		stroke_color[{$field.id_ndk_customization_field}] = false;
	{/if}
	fieldColors_{$field.id_ndk_customization_field}= [];
	fieldSizes_{$field.id_ndk_customization_field} = [];
	fieldFonts_{$field.id_ndk_customization_field} = [];
	fieldEffects_{$field.id_ndk_customization_field} = [];
	fieldAlignments_{$field.id_ndk_customization_field} = [];

	{if $field.colors !=''}
		{foreach from=$field.colors  item=color}
			window['fieldColors_{$field.id_ndk_customization_field}'].push('{$color}');
		{/foreach}
	{/if}
	{if $field.sizes !=''}
		{foreach from=$field.sizes  item=size}
			window['fieldSizes_{$field.id_ndk_customization_field}'].push('{$size}');
		{/foreach}
	{/if}
	{if $field.fonts !=''}
		{foreach from=$field.fonts  item=font}
			window['fieldFonts_{$field.id_ndk_customization_field}'].push('{$font}');
		{/foreach}
	{/if}
	{if $field.effects !=''}
		{foreach from=$field.effects  item=effect}
			window['fieldEffects_{$field.id_ndk_customization_field}'].push('{$effect}');
		{/foreach}
	{/if}
	{if $field.alignments !=''}
		{foreach from=$field.alignments  item=alignment}
			window['fieldAlignments_{$field.id_ndk_customization_field}'].push('{$alignment}');
		{/foreach}
	{/if}
</script>
