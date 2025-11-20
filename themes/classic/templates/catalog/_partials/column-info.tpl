{assign var='checkDescriptionFile' value=Product::checkDescriptionFile($product.id)}

<!-- barra central para desktop -->
<div class="hidden-sm-down" style="padding: 0rem;">
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

        <input type="hidden" class="check3D" value="{$check3D['has3D']}">
        <input type="hidden" class="dataId" value="{$product.id}">
        <input type="hidden" class="dataTitleProduct" value="{$product.name}">
        <button class="next button_carrosel btn-style-next" onclick="moveSlides(1)">&#10095;</button>
    </div>
  </div>
  {assign var=count value=0}
  {foreach from=$product.images item=image}
    {if $image.id_image !== $product.cover.id_image }
   
  {/foreach}
  <div class="row">
    {if {$numImgs} > 1}
      <div class="{if {$check3D['has3D']} == "yes"} col-md-6 {else} col-md-12 {/if}">
        <div id="menuitem" class="menuitems">

        </div>
      </div>
    {/if}
  </div>
</div>
