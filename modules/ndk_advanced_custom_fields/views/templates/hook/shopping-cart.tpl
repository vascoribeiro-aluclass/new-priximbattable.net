{if $ps_version > 1.6}
	{assign var="base_dir_ssl" value=$urls.base_url}
	{assign var="base_dir" value=$urls.base_url}
	<input type="hidden" id="idCombination"/>
{/if}

{foreach $result as $row}

<div class="clear clearfix rowcustomization" id="ndkacfproduct_{$row.id_product}_{$row.id_product_attribute}_{$row.customizationId}_{$row.id_address_delivery|intval}">
	{if $row.link_edit !=''}
		<p class="clear"><a class="btn btn-primary btn-default longbutton" href="{$row.link_edit}">{l s='Edit customization' mod='ndk_advanced_custom_fields'}</a></p>
	{/if}
	{capture name="htmlFileNoCustomer"}{$smarty.const._PS_IMG_DIR_}scenes/ndkcf/pdf/0/{$row.id_product|intval}/{$row.customizationId|intval}/render.html{/capture}
	
	{capture name="htmlFile"}{$smarty.const._PS_IMG_DIR_}scenes/ndkcf/pdf/{Context::getContext()->customer->id|intval}/{$row.id_product|intval}/{$row.customizationId|intval}/render.html{/capture}
	
	{if Tools::file_exists_no_cache($smarty.capture.htmlFile)}
	
		{capture name="htmlLink"}{if isset($is_https) && $is_https}{$base_dir_ssl}{else}{$base_dir}{/if}/img/scenes/ndkcf/pdf/{Context::getContext()->customer->id|intval}/{$row.id_product|intval}/{$row.customizationId|intval}/render.html{/capture}
		
	{elseif Tools::file_exists_no_cache($smarty.capture.htmlFileNoCustomer)}
		
		{capture name="htmlLink"}{if isset($is_https) && $is_https}{$base_dir_ssl}{else}{$base_dir}{/if}/img/scenes/ndkcf/pdf/0/{$row.id_product|intval}/{$row.customizationId|intval}/render.html{/capture}
	
	{else}
		{capture name="htmlLink"}{/capture}
	{/if}
	
	{if $smarty.capture.htmlLink !=''}
		<!-- <a class="btn btn-primary btn-default fancyboxButton" target="_blank" style="text-decoration:none" href="{$smarty.capture.htmlLink}"><i class="icon-search"></i>&nbsp;{l s='Preview' mod='ndk_advanced_custom_fields'}</a> -->
		<!--<a class="btn btn-primary btn-default aluclass_linkRender" data-chave="{$row.customizationId}" href="#" data-renderhtml="{$smarty.capture.htmlLink}" style="text-decoration:none"><i class="icon-search"></i>&nbsp;{l s='Preview' mod='ndk_advanced_custom_fields'}</a>-->

		<div class="modal fade" tabindex="-1" role="dialog" id="iframe-renderhtml">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">&nbsp;</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<iframe class="embed-responsive-item" width="100%" scrolling="no" style="height: 90vh; overflow-y: hidden; border: none;" id="frame-render" src="" onload="aluclass_resizeIframe(this)"></iframe>
					</div>
				</div>
			</div>
		</div>

	{/if}
</div>

{/foreach}

{if $ps_version < 1.7}
	<script type="text/javascript">
		$(document).ready(function(){
			
				$('.rowcustomization').each(function(){
					newDiv = $(this).clone();
					target = $(this).attr('id').replace('ndkacf', '');
					$('#'+target).find('td').last().append(newDiv);
					
					$(this).remove();
				});
		});
	</script>
{/if}