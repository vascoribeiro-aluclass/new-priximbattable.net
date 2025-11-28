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

<div class="panel">
  <h3><i class="icon-cloud-upload"></i> {l s='Train your AI with the shop\'s product information' mod='gptchatbox'}</h3>

  {if $upload_result}
    <div class="alert alert-info">
      {$upload_result}
    </div>
  {/if}

  <div class="panel">
    <h3><i class="icon-cloud-upload"></i> {l s='File status on OpenAI' mod='gptchatbox'}</h3>

    {if $remote_file_info.exists}
      <p>{$remote_file_info.message|escape:'html':'UTF-8'}</p>
      <ul>
        <li><strong>{l s='Filename:' mod='gptchatbox'}</strong> {$remote_file_info.filename|escape:'html':'UTF-8'}</li>
        <li><strong>{l s='ID:' mod='gptchatbox'}</strong> {$remote_file_info.id|escape:'html':'UTF-8'}</li>
        <li><strong>{l s='Size:' mod='gptchatbox'}</strong> {$remote_file_info.size_formatted|escape:'html':'UTF-8'}</li>
        <li><strong>{l s='Uploaded at:' mod='gptchatbox'}</strong> {$remote_file_info.created_at|escape:'html':'UTF-8'}</li>
      </ul>
    {else}
      <p>{$remote_file_info.message|escape:'html':'UTF-8'}</p>
    {/if}
  </div>

  <form method="post">
    <div class="form-group">
      <label><strong>{l s='Select information to include:' mod='gptchatbox'}</strong></label><br>

      {assign var=fields value=[
        'name' => 'Product Name',
        'short_description' => 'Short Description',
        'description' => 'Full Description',
        'reference' => 'Reference',
        'price' => 'Price',
        'discount_price' => 'Discount Price',
        'category' => 'Category',
        'stock' => 'Stock',
        'url' => 'Product URL'
      ]}

      {foreach from=$fields item=label key=field}
        <div class="checkbox">
          <label>
            <input type="checkbox" name="feed_fields[]" value="{$field|escape:'html':'UTF-8'}"
              {if in_array($field, $selected_fields)}checked{/if} />
            {l s=$label mod='gptchatbox'}
          </label>
        </div>
      {/foreach}
    </div>

    <div class="form-group">
      <label><strong>{l s='Select categories to include:' mod='gptchatbox'}</strong></label><br>

      {foreach from=$available_categories item=category}
        <div class="checkbox">
          <label>
            <input type="checkbox" name="selected_categories[]" value="{$category.id_category|escape:'html':'UTF-8'}"
              {if in_array($category.id_category, $selected_categories)}checked{/if} />
            {$category.name|escape:'htmlall':'UTF-8'}
          </label>
        </div>
      {/foreach}
    </div>

    <button type="submit" name="submitUploadToOpenAI" class="btn btn-primary">
      <i class="icon-upload"></i> {l s='Upload products file to OpenAI' mod='gptchatbox'}
    </button>
    <button type="submit" name="submitDeleteFromOpenAI" class="btn btn-danger" onclick="return confirm('{l s='Are you sure you want to delete the file from OpenAI?' mod='gptchatbox'}');">
      <i class="icon-trash"></i> {l s='DELETE PRODUCTS FILE FROM OPENAI' mod='gptchatbox'}
    </button>
  </form>
</div>
