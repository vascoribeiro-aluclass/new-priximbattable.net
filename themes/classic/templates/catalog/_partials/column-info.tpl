{assign var='checkDescriptionFile' value=Product::checkDescriptionFile($product.id)}

<!-- barra central para desktop -->
<div class="hidden-sm-down" style="padding: 0rem;">
  {* <div class="row pb-1 text-center">
    <div class="col-md-12">
      <a href="/content/45-centre-logistique" target="_blank">
        <picture>
          <source srcset="/img/cms/page-product-sites.webp" type="image/webp">
          <img src="/img/cms/page-product-sites.png" alt="Nous sommes fabricantes" title="Nous sommes fabricantes">
        </picture>
      </a>
    </div>


  </div> *}

  {* <div class="row pb-1 text-center">
    <div class="col-md-12">
      <a class="embedAluclass" data-watch="7e6dZcSoBKg">
        <picture>
          <source srcset="/img/cms/page-product-gif-usine.webp" type="image/webp">
          <img src="/img/cms/page-product-gif-usine.gif" alt="Direct de l'usine" title="Direct de l'usine">
        </picture>
      </a>
    </div>
  </div> *}
  {assign var='check3D' value=Product::checkExists3D({$product.id})}
  {$numImgs = 0}
  {foreach from=$product.images item=image}
    {$numImgs = $numImgs + 1}
  {/foreach}
  {* carrosel de miniaturas*}
  <div id="div_vertical" class="row image-margin-left hidden-sm-down" style="text-align:center;">
    <div class="carrossel col-sm-12 align-vertical-slide">
        <button class="prev button_carrosel btn-style-prev" onclick="moveSlides(-1)">&#10094;</button>
        <div class="slides2">
          {* imagens montadas por for no js *}
        </div>
        {* <a class="embed3DAluclass" data-id="{$product.id}" data-title-product="{$product.name}">
              <img src="/img/cms/3d.png" alt="">
            </a> *}
        <input type="hidden" class="check3D" value="{$check3D['has3D']}">
        <input type="hidden" class="dataId" value="{$product.id}">
        <input type="hidden" class="dataTitleProduct" value="{$product.name}">
        <button class="next button_carrosel btn-style-next" onclick="moveSlides(1)">&#10095;</button>
    </div>
  </div>
  {assign var=count value=0}
  {foreach from=$product.images item=image}
    {if $image.id_image !== $product.cover.id_image }
      {* <img style="display:none;" class="alugalleryThumbs id_thumbs_{$count++}" data-click="{$image.bySize.large_default.url}" src="{$image.bySize.small_default.url}"> *}
    {/if}
  {/foreach}
  <div class="row">
    {if {$numImgs} > 1}
      <div class="{if {$check3D['has3D']} == "yes"} col-md-6 {else} col-md-12 {/if}">
        <div id="menuitem" class="menuitems">
          {* {foreach from=$product.images item=image} *}
            {* {if $image.id_image !== $product.cover.id_image } *}
              {* <span class="alugallery" data-image-alu="{$image.bySize.large_default.url}" style="display: none;"></span> *}
            {* {/if} *}
          {* {/foreach} *}
          {* {foreach from=$videos item=item} *}
            {* <span class="alugallery" data-video-alu="https://www.youtube.com/embed/{$item.video}" style="display: none;"></span> *}
          {* {/foreach} *}
          {* <div class="btn btn-galeria " onclick="showAluGallery('','false')">
            <i class="fa fa-camera"></i> Galerie Photo
          </div> *}
        </div>
      </div>
    {/if}
  </div>
</div>
{* {if {$checkDescriptionFile}}
  <div class="row pb-1 text-center">
    <div class="col-md-12">
      <button class="btn_open_description">
        <div class="box-inside">
          <span>cliquez ici</span>
          <span>pour visualiser</span>
          <span>la fiche technique</span>
        </div>
      </button>
    </div>
  </div>
{/if} *}

<!-- barra central para mobile -->
{* <div class="container-fluid pb-2 hidden-md-up">
  <div class="row">
    <div class="col-sm-7 col-xs-7 col-md-7 pl-0 pr-0">

      <div class="col-md-12">
        <a href="/content/45-centre-logistique" target="_blank">
          <picture>
            <source srcset="/img/cms/page-product-sites.webp" type="image/webp">
            <img src="/img/cms/page-product-sites.png" alt="Nous sommes fabricantes" title="Nous sommes fabricantes"
              class="img-fluid">
          </picture>
        </a>
      </div>

    </div>

    <div class="col-sm-5 col-xs-5 col-md-5 pl-0">
      <div class="row">
        <div class="col-sm-12 col-xs-12 col-md-12" style="margin-bottom: 30px;">
          <a class="embedAluclass" data-watch="7e6dZcSoBKg">
            <picture>
              <source srcset="/img/cms/page-product-gif-usine.webp" type="image/webp">
              <img src="/img/cms/page-product-gif-usine.gif" alt="Direct de l'usine" title="Direct de l'usine"
                class="img-fluid">
            </picture>
          </a>
        </div>
        {if {$checkDescriptionFile}}
          <div class="col-sm-12 col-xs-12 col-md-12">
            <button class="btn_open_description">
              <div class="box-inside">
                <span>cliquez ici</span>
                <span>pour visualiser</span>
                <span>la fiche technique</span>
              </div>
            </button>
          </div>
        {/if}
      </div>
    </div>
  </div>
</div> *}
