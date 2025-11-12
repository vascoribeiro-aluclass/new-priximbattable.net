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
	>{$field.name|escape:'htmlall':'UTF-8'} {if $fieldPrice > 0}{l s='cost : ' mod='ndk_advanced_custom_fields'}{convertPrice price=$fieldPrice}{/if}
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
		<input data-message="{l s='Informe' mod='ndk_advanced_custom_fields'} {$field.name|escape:'htmlall':'UTF-8'}" name="ndkcsfield[{$field.id_ndk_customization_field|escape:'intval'}]" data-group="{$field.id_ndk_customization_field|escape:'intval'}" data-zindex="{$field.zindex|escape:'htmlall':'UTF-8'}" data-price="{$fieldPrice|escape:'htmlall':'UTF-8'}" type="text" class="form-control datepicker {if $field.required == 1} required_field{/if}" data-id="{$field.target|escape:'htmlall':'UTF-8'}" data-view="{$field.target_child|escape:'htmlall':'UTF-8'}"/>

	</div>
</div>
