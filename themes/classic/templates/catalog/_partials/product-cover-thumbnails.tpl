{**
 * 2007-2018 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License 3.0 (AFL-3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2018 PrestaShop SA
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License 3.0 (AFL-3.0)
 * International Registered Trademark & Property of PrestaShop SA
 *}
<div class="images-container">
  {block name='product_cover'}
    <div class="product-cover">
      {if $product.cover}
        <img fetchpriority="high"  class="js-qv-product-cover" src="{$product.cover.bySize.large_default.url}" alt="{$product.cover.legend}" title="{$product.cover.legend}" style="width:100%;" itemprop="image">

        {* <div class="motor-promo-tucan tag-inside-product img-a-medida-hide" data-dividprod="{$product.id_product}">
          <img loading="lazy" src="/img/cms/tag-promo-tucan-fr.png" alt="">
        </div>
        <div class="motor-promo-centaurus tag-inside-product img-a-medida-hide" data-dividprod="{$product.id_product}">
          <img loading="lazy" src="/img/cms/tag-promo-motor-centaurus-fr.png" alt="">
        </div>
        <div class="motor-promo-athena tag-inside-product img-a-medida-hide" data-dividprod="{$product.id_product}">
          <img loading="lazy" src="/img/cms/tag-promo-athena-fr.png" alt="">
        </div>
        <div class="tag-promo-50-store tag-inside-product img-a-medida-hide" data-dividprod="{$product.id_product}">
          <img loading="lazy" src="/img/cms/tag-promo-50-store-fr.png" alt="">
        </div> *}

        <div class="layer hidden-sm-down" data-toggle="modal" data-target="#product-modal">
          <i class="material-icons zoom-in">&#xE8FF;</i>
        </div>
      {else}
        <img src="{$urls.no_picture_image.bySize.large_default.url}" style="width:100%;">
      {/if}
    </div>
  {/block}

  {* {block name='product_images'}
    <div class="js-qv-mask mask">
      <ul class="product-images js-qv-product-images">
        {foreach from=$product.images item=image}
          <li class="thumb-container">
            <img
              class="thumb js-thumb {if $image.id_image == $product.cover.id_image} selected {/if}"
              data-image-medium-src="{$image.bySize.medium_default.url}"
              data-image-large-src="{$image.bySize.large_default.url}"
              src="{$image.bySize.home_default.url}"
              alt="{$image.legend}"
              title="{$image.legend}"
              width="100"
              itemprop="image"
            >
          </li>
        {/foreach}
      </ul>
    </div>
  {/block} *}

  {assign var='check3D' value=Product::checkExists3D({$product.id})}

  {$numImgs = 0}
  {foreach from=$product.images item=image}
    {$numImgs = $numImgs + 1}
  {/foreach}
  <div id="div_horizontal" class="row image-margin-left hidden-md-up">
    <div class="carrossel col-md-12" style="display:flex; align-items:center; justify-content:center;">
        <button class="prev button_carrosel" onclick="moveSlides(-1)">&#10094;</button>
        <div class="slides">
        {* imagens montadas por for no js *}
        </div>
        {* <button class="prev button_carrosel" onclick="moveSlides(-1)">&#10094;</button> *}
        {* <button class="next button_carrosel" onclick="moveSlides(1)">&#10095;</button> *}
        <input type="hidden" class="check3D" value="{$check3D['has3D']}">
        <input type="hidden" class="dataId" value="{$product.id}">
        <input type="hidden" class="dataTitleProduct" value="{$product.name}">
        <button class="next button_carrosel" onclick="moveSlides(1)" style=" right: 10px;">&#10095;</button>
    </div>
  </div>
  {assign var=count value=0}
  {foreach from=$product.images item=image}
    {if $image.id_image !== $product.cover.id_image }
      <span style="display:none;" class="alugalleryThumbs id_thumbs_{$count++}" data-click="{$image.bySize.large_default.url}" src="{$image.bySize.small_default.url}"></span>
    {/if}
  {/foreach}
  <div class="row">
  {$firstImgId = ''}
  {if {$numImgs} > 1}
  <div class="{if {$check3D['has3D']} == "yes"} col-md-6 {else} col-md-12 {/if}">
    <div id="menuitem" class="menuitems">
      {foreach from=$product.images item=image}
        {if $image.id_image !== $product.cover.id_image }
          <span class="alugallery" data-image-alu="{$image.bySize.large_default.url}" style="display: none;"></span>
        {/if}
      {/foreach}
      {foreach from=$videos item=item}
        <span id="video" class="alugallery alugallerry-video id_thumbs_video_{$count++}" data-video-alu="https://www.youtube.com/embed/{$item.video}" style="display: none;"></span>
      {/foreach}
      {* <div class="btn btn-galeria " onclick="showAluGallery('','false')">
        <i class="fa fa-camera"></i> Galerie Photo
      </div> *}
    </div>
  </div>

   {*  antigo galeria
   <div class="{if {$check3D['has3D']} == "yes"} col-md-6 {else} col-md-12 {/if}">
    {foreach from=$product.images item=image}
      {if $image.id_image !== $product.cover.id_image }
        {if {$firstImgId} == ''}
          {$firstImgId = $image.id_image}
          <a class="btn btn-galeria fancyboxGallery" rel="productGallery" href="{$image.bySize.large_default.url}">
            <i class="fa fa-camera"></i> Galerie Photo
          </a>
        {else}
          {if $image.id_image !== $firstImgId}
            <a class="fancyboxGallery" rel="productGallery" href="{$image.bySize.large_default.url}" style="display: none;"></a>
          {/if}
        {/if}
      {/if}
    {/foreach}
    </div> *}
      {*
    <div class="col-md-12">
      <a class="btn btn-app" href="/content/26-application-ar-viewer-prix-imbattable-visualiser-nos-produits-chez-vous" target="_blank"><i class="fa fa-magic"></i> Visualisez ce produit chez vous en 3D</a>
    </div>
         *}
  {else}
      {*
    <div class="col-md-12">
      <a class="btn btn-app" href="/content/26-application-ar-viewer-prix-imbattable-visualiser-nos-produits-chez-vous" target="_blank"><i class="fa fa-magic"></i> Visualisez ce produit chez vous en 3D</a>
    </div>
         *}
  {/if}

  {* {if {$check3D['has3D']} == "yes"}
  <div class="{if {$numImgs} > 1} col-md-6 {else} col-md-12 {/if}">
    <button class="btn btn-galeria embed3DAluclass" data-id="{$product.id}" data-title-product="{$product.name}"><i class="fa fa-camera"></i> 3D</button>
  </div>
  {/if} *}

    {* <div class="col-md-12  hidden-md-down">
      {if 51 == $product.id_category_default or 52 == $product.id_category_default or 55 == $product.id_category_default or 56 == $product.id_category_default}
          <a class="btn btn-app" href="/comparatif?ctg=45" target="_blank"><i class="fa fa-th-list"></i>Comparatif</a>
      {elseif  48485 == $product.id_product or 640023 == $product.id_product or 68667 == $product.id_product or 640024 == $product.id_product or 68627 == $product.id_product or 640025 == $product.id_product}
          <a class="btn btn-app" href="/comparatif?ctg=21" target="_blank"><i class="fa fa-th-list"></i>Comparatif</a>
      {elseif  17441 == $product.id_product or 1127 == $product.id_product or 1264 == $product.id_product or 1150 == $product.id_product }
          <a class="btn btn-app" href="/comparatif?ctg=34" target="_blank"><i class="fa fa-th-list"></i>Comparatif</a>
      {elseif  35 == $product.id_category_default }
          <a class="btn btn-app" href="/comparatif?ctg=35" target="_blank"><i class="fa fa-th-list"></i>Comparatif</a>
      {elseif  23 == $product.id_category_default }
        <a class="btn btn-app" href="/comparatif?ctg=23" target="_blank"><i class="fa fa-th-list"></i>Comparatif</a>
      {elseif  24 == $product.id_category_default }
        <a class="btn btn-app" href="/comparatif?ctg=24" target="_blank"><i class="fa fa-th-list"></i>Comparatif</a>
      {elseif  26 == $product.id_category_default }
        <a class="btn btn-app" href="/comparatif?ctg=26" target="_blank"><i class="fa fa-th-list"></i>Comparatif</a>
      {elseif  25 == $product.id_category_default and 3430 != $product.id_product }
        <a class="btn btn-app" href="/comparatif?ctg=25" target="_blank"><i class="fa fa-th-list"></i>Comparatif</a>
      {elseif   3427 == $product.id_product or 3430 == $product.id_product }
        <a class="btn btn-app" href="/comparatif?ctg=33" target="_blank"><i class="fa fa-th-list"></i>Comparatif</a>
      {/if}
    </div> *}
  </div>

</div>
{hook h='displayAfterProductThumbs'}
