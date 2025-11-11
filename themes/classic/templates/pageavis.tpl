{extends file='page.tpl'}
{block name='page_content_container'}
<div class="productCommentsBlock" style="margin-top: -4rem;">
   {block name='page_title'}
   {*<h1 class="h1 products-section-title text-uppercase sitemap-title ">Avis clients</h1>*}
   {/block}
   <div class="tabs" style="padding: unset;">
      <div id="product_comments_block_tab" >
         {PageavisControllerCore::Getparts()}
      </div>
   </div>

</div>


{/block}

{block name='head_seo' prepend}
  <link rel="canonical" href="https://priximbattable.net/avis-client">
{/block}
