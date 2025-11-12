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
		{if $fieldPrice >0}
			 : {$fieldPrice} {l s='per' mod='ndk_advanced_custom_fields'} {$field.unit}
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
		<p class="boldLine"><span class="surfaceResult resultValue_{$field.id_ndk_customization_field|escape:'intval'}">{l s='total' mod='ndk_advanced_custom_fields'} </span><span id="resultValue_{$field.id_ndk_customization_field|escape:'intval'}"> </span> <span class="surfaceResult resultValue_{$field.id_ndk_customization_field|escape:'intval'}">{$field.unit}</span>
		</p>
	{foreach from=$field.values item=value name='mesures'}
		{if $smarty.foreach.mesures.index < 2}
		<p>
			<input id="ndkcsfield_{$field.id_ndk_customization_field|escape:'intval'}_{$value.id|escape:'intval'}" data-message="{l s='Informe' mod='ndk_advanced_custom_fields'} {$value.value|escape:'htmlall':'UTF-8'}"  placeholder="{$value.value|escape:'htmlall':'UTF-8'}" name="ndkcsfield[{$field.id_ndk_customization_field|escape:'intval'}][surface][{$value.id|escape:'htmlall':'UTF-8'}]" data-val="{$smarty.foreach.mesures.index}" data-group="{$field.id_ndk_customization_field|escape:'intval'}" data-price="{$fieldPrice|escape:'htmlall':'UTF-8'}" type="text" class="form-control surface surface_{$field.id_ndk_customization_field|escape:'intval'} {if $field.required == 1} required_field{/if}" data-id="{$field.target|escape:'htmlall':'UTF-8'}" data-view="{$field.target_child|escape:'htmlall':'UTF-8'}"
			 data-preserve-ratio="{$field.preserve_ratio}" step="{$value.step_quantity}"
			{if $value.quantity_max > 0}
			data-qtty-max="{$value.quantity_max}" max="{$value.quantity_max}"
			{/if}
			{if $value.quantity_min > 0}
			data-qtty-min="{$value.quantity_min}"  min="{$value.quantity_min}"
			{/if}
			data-step_quantity="" size="8"
			/>
			<span class="quantity-ndk-minus btn-default btn"  data-target-class="surface"><i class="icon-minus"></i></span>
			<span class="quantity-ndk-plus btn-default btn" data-target-class="surface"><i class="icon-plus"></i></span>
		</p>
		{/if}
	{/foreach}
	</div>
</div>
