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
{extends file=$layout}

{block name='content'}
  <section id="main">


    {* <div class="imageCate">
      <div class="container">

        <div class="col-md-3 col-sm-6 col-xs-12">
          <img itemprop="image" src="/img/logo-qualite-prix.png" alt="Qualité prix" title="Qualité prix">
        </div>


        <div class="video-responsive col-md-9 col-sm-6 col-xs-12">


          {if $page.body_classes|classnames|strstr:'category-id-parent-50' || $page.body_classes|classnames|strstr:'category-id-50' || $page.body_classes|classnames|strstr:'category-id-parent-54'}
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" height="200" src="https://www.youtube.com/embed/E5a-WW8C5l4"
                allowfullscreen></iframe>
            </div>
          {elseif $page.body_classes|classnames|strstr:'category-id-parent-105' || $page.body_classes|classnames|strstr:'category-id-105'}
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" height="300" src="https://www.youtube.com/embed/5QlufnX76rA"
                allowfullscreen></iframe>
            </div>
          {elseif $page.body_classes|classnames|strstr:'category-id-parent-6' || $page.body_classes|classnames|strstr:'category-id-6'}
            <div class="embed-responsive embed-responsive-16by9">

            </div>
          {elseif $page.body_classes|classnames|strstr:'category-id-parent-101' || $page.body_classes|classnames|strstr:'category-id-101'}
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" height="300" src="https://www.youtube.com/embed/5QlufnX76rA"
                allowfullscreen></iframe>
            </div>
          {elseif $page.body_classes|classnames|strstr:'category-id-parent-8' || $page.body_classes|classnames|strstr:'category-id-8'}
            <div class="embed-responsive embed-responsive-16by9">
              <!-- <iframe class="embed-responsive-item"  height="200" src="https://www.youtube-nocookie.com/embed/Bq6cONNwBeE" allowfullscreen></iframe> -->
            </div>
          {elseif $page.body_classes|classnames|strstr:'category-id-parent-13' || $page.body_classes|classnames|strstr:'category-id-13' }
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" height="200" src="https://www.youtube-nocookie.com/embed/CS0SAKka_NM"
                allowfullscreen></iframe>
            </div>
          {elseif $page.body_classes|classnames|strstr:'category-id-parent-126' || $page.body_classes|classnames|strstr:'category-id-126'}
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" height="200" src="https://www.youtube-nocookie.com/embed/Jm6cYLvxH9k"
                allowfullscreen></iframe>
            </div>
          {elseif $page.body_classes|classnames|strstr:'category-id-parent-127' || $page.body_classes|classnames|strstr:'category-id-127'}
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" height="200" src="https://www.youtube-nocookie.com/embed/Jm6cYLvxH9k"
                allowfullscreen></iframe>
            </div>
          {elseif $page.body_classes|classnames|strstr:'category-id-parent-12' || $page.body_classes|classnames|strstr:'category-id-12'}
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" height="200" src="https://www.youtube-nocookie.com/embed/H3HeVw3tvXQ"
                allowfullscreen></iframe>
            </div>
          {elseif $page.body_classes|classnames|strstr:'category-id-parent-10' || $page.body_classes|classnames|strstr:'category-id-10'}
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" height="200" src="https://www.youtube-nocookie.com/embed/tLQupk-Q6rw"
                allowfullscreen></iframe>
            </div>
          {elseif $page.body_classes|classnames|strstr:'category-id-parent-10' || $page.body_classes|classnames|strstr:'category-id-10'}
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" height="200" src="https://www.youtube-nocookie.com/embed/tLQupk-Q6rw"
                allowfullscreen></iframe>
            </div>
          {elseif $page.body_classes|classnames|strstr:'category-id-parent-11' || $page.body_classes|classnames|strstr:'category-id-11'}
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" height="200" src="https://www.youtube-nocookie.com/embed/BxUoMtvd-CQ"
                allowfullscreen></iframe>
            </div>
          {elseif $page.body_classes|classnames|strstr:'category-id-parent-9' || $page.body_classes|classnames|strstr:'category-id-9'}
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" height="200" src="https://www.youtube-nocookie.com/embed/uxR-YOyAjC0"
                allowfullscreen></iframe>
            </div>
          {elseif $page.body_classes|classnames|strstr:'category-id-parent-7' || $page.body_classes|classnames|strstr:'category-id-7'}
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" height="200" src="https://www.youtube-nocookie.com/embed/Jm6cYLvxH9k"
                allowfullscreen></iframe>
            </div>

          {elseif $page.body_classes|classnames|strstr:'category-id-parent-48' || $page.body_classes|classnames|strstr:'category-id-48'}
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" height="200" src="https://www.youtube-nocookie.com/embed/5QlufnX76rA"
                allowfullscreen></iframe>
            </div>

          {elseif $page.body_classes|classnames|strstr:'category-id-parent-21' || $page.body_classes|classnames|strstr:'category-id-21' || $page.body_classes|classnames|strstr:'category-id-parent-108' || $page.body_classes|classnames|strstr:'category-id-108'}
            <div class="embed-responsive embed-responsive-16by9">

            </div>

          {elseif $page.body_classes|classnames|strstr:'page-module-ambjolisearch-jolisearch'}

            <a href="https://www.youtube.com/watch?v=5QlufnX76rA">
              <article>
                <video width="100%" height="300" loop="loop" autoplay="autoplay" id="video-2">
                  <source type="video/mp4" src="/img/cms/slide6.mp4">
                </video>
              </article>
            </a>

          {else}
            <a href="https://www.youtube.com/watch?v=5QlufnX76rA">
              <article>
                <video width="100%" height="300" loop="loop" autoplay="autoplay" id="video-2">
                  <source type="video/mp4" src="/img/cms/slide2.mp4">
                </video>
              </article>
            </a>
          {/if}


        </div>




        <!--<div class="col-md-3 col-sm-6 col-xs-12">
      <a data-link-type="tree" data-type="linkpicker" href="https://www.youtube.com/watch?v=dKHMvhmitxs" target="_blank">
      <img alt="avis_priximbattable" src="/img/banners/avis_gif_priximbattable.gif" title="avis_priximbattable"> </a></div>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <a data-link-type="external" data-type="linkpicker" href="https://www.youtube.com/watch?v=kP7HjjViyHI"  target="_blank">
        <img alt="COUT_DES_LIVRAISONS" src="/img/banners/COUT_DES_LIVRAISONS.png" title="COUT_DES_LIVRAISONS"> </a></div>-->
        <!--<div class="col-md-3 col-sm-6 col-xs-12">
          <a data-link-type="external" data-type="linkpicker" href="https://www.youtube.com/watch?v=5QlufnX76rA" target="_blank">
            <img alt="processus_de_fab" src="/img/banners/processus_de_fab.png" title="processus_de_fab">
          </a>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <a data-link-type="tree" data-type="linkpicker" href="https://priximbattable.net/content/11-livraison-gratuite" Helvetica;" target="_blank">
          <img alt="vive_la_france" src="/img/banners/vive_la_france.png" title="vive_la_france"> </a>
        </div>-->
      </div>
    </div> *}


    {* {block name='product_list_header'} *}
      {* <h2 id="js-product-list-header" class="h2">{$listing.label}</h2> *}
      <h2 id="" class="h2" style="margin-bottom: 20px;">{$listing.label}</h2>
    {* {/block} *}

    <section id="products">

      {if {$category.id} == "123"}
        <div class="row" style="margin-top: 50px; margin-bottom: 50px;">
          <div class="col-md-4">
            <div class="card">
              <a href="#" class="embedAluclass" data-watch="YVnrRMRg6Fs">
                <div class="row">
                  <div class="col-md-12">
                    <img src="/img/cms/AfinacaoJanelas_FR.jpg" class="img-fluid">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <h2 style="text-align: center; margin-top: 10px;">Réglage des Fenêtres</h2>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
      {/if}

      {if $listing.products|count}

        <div id="">
          {block name='product_list_top'}
            {include file='catalog/_partials/products-top.tpl' listing=$listing}
          {/block}
        </div>

        {block name='product_list_active_filters'}
          <div id="" class="hidden-sm-down">
            {$listing.rendered_active_filters nofilter}
          </div>
        {/block}

        <div id="">
          {block name='product_list'}
            {include file='catalog/_partials/products.tpl' listing=$listing}
          {/block}
        </div>

        <div id="js-product-list-bottom">
          {block name='product_list_bottom'}
            {include file='catalog/_partials/products-bottom.tpl' listing=$listing}
          {/block}
        </div>

      {else}



      {/if}


      <div class="row">
        {if isset($subcategories)}
          {foreach from=$subcategories item=subcategory}
            <div class="col-md-4 ">
              <div class="subcategories-box">


                <h4 class="subcategory-name" style="height: 60px;">
                  <a
                    href="{$link->getCategoryLink($subcategory.id_category, $subcategory.link_rewrite)|escape:'html':'UTF-8'}">
                    {$subcategory.name}
                  </a>
                </h4>


                <div class="subcategory-image">
                  <a href="{$link->getCategoryLink($subcategory.id_category, $subcategory.link_rewrite)|escape:'html':'UTF-8'}"
                    title="{$subcategory.name|escape:'html':'UTF-8'}" class="img">

                    {if {$subcategory.id_category} == "67"}
                      {if $subcategory.id_image}
                        <img class="replace-2x" style="height: 132px !important;"
                          src="{$link->getCatImageLink($subcategory.link_rewrite, $subcategory.id_image)}" alt="" />
                      {else}
                        <img class="replace-2x" style="height: 132px !important;"
                          src="{$img_cat_dir}en-default-category_default.jpg" alt="" />
                      {/if}
                    {else}
                      {if $subcategory.id_image}
                        <img class="replace-2x" src="{$link->getCatImageLink($subcategory.link_rewrite, $subcategory.id_image)}"
                          alt="" />
                      {else}
                        <img class="replace-2x" src="{$img_cat_dir}en-default-category_default.jpg" alt="" />
                      {/if}
                    {/if}
                  </a>
                </div>





              </div>
            </div>
          {/foreach}
        {/if}




      </div>

      {* {block name='product_list_header'}
        {include file='catalog/_partials/category-header.tpl' listing=$listing category=$category}
      {/block} *}

      <div id="">
        {if $listing.pagination.items_shown_from == 1}
          <div class="block-category card card-block">
            {* <h1 class="h1">{$category.name}</h1> *}

            {assign var='botaoCatBlog' value=Category::botaoCategoriaParaBlog({$category.id})}
            {if {$botaoCatBlog['total']} == 0}
              <h1 class="h1">{$category.name}</h1>
            {else}
              <h1 class="h1">{$category.name}</h1><br />
              <a href="{$botaoCatBlog['link']}" class="btn btn-primary"
                style="position: absolute; top: 20px; right: 20px;">Guide d'achat</a>
            {/if}

            {if $category.description}
              <div id="category-description" class="text-muted">{$category.description nofilter}</div>
            {/if}
            {if $category.image.large.url}
              <!--<div class="category-cover">
                          <img src="{$category.image.large.url}" alt="{if !empty($category.image.legend)}{$category.image.legend}{else}{$category.name}{/if}">
                      </div>-->
            {/if}
          </div>
        {/if}
      </div>


    </section>

  </section>
{/block}
