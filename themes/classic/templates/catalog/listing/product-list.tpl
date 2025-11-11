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
  <link rel="stylesheet" href="/themes/classic/assets/css/catagory.css" />
  <section id="main">


    {* <div class="imageCate">
      <div class="container">

        <div class="col-md-3 col-sm-6 col-xs-12">
          <img loading="lazy" itemprop="image" src="/img/logo-qualite-prix.png" alt="Qualité prix" title="Qualité prix">
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
      <img loading="lazy" alt="avis_priximbattable" src="/img/banners/avis_gif_priximbattable.gif" title="avis_priximbattable"> </a></div>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <a data-link-type="external" data-type="linkpicker" href="https://www.youtube.com/watch?v=kP7HjjViyHI"  target="_blank">
        <img loading="lazy" alt="COUT_DES_LIVRAISONS" src="/img/banners/COUT_DES_LIVRAISONS.png" title="COUT_DES_LIVRAISONS"> </a></div>-->
        <!--<div class="col-md-3 col-sm-6 col-xs-12">
          <a data-link-type="external" data-type="linkpicker" href="https://www.youtube.com/watch?v=5QlufnX76rA" target="_blank">
            <img loading="lazy" alt="processus_de_fab" src="/img/banners/processus_de_fab.png" title="processus_de_fab">
          </a>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <a data-link-type="tree" data-type="linkpicker" href="https://priximbattable.net/content/11-livraison-gratuite" Helvetica;" target="_blank">
          <img loading="lazy" alt="vive_la_france" src="/img/banners/vive_la_france.png" title="vive_la_france"> </a>
        </div>-->
      </div>
    </div> *}


    {* {block name='product_list_header'} *}
      {* <h2 id="js-product-list-header" class="h2">{$listing.label}</h2> *}
      {* <h2 id="" class="h2" style="margin-bottom: 20px;">{$listing.label}</h2> *}
      {assign var='labelCategory' value=':'|explode:$listing.label}
      <h1 id="" class="h2" style="margin-bottom: 20px;">{$labelCategory[1]}</h1>
    {* {/block} *}

    <section id="products">

      {if {$category.id} == "123"}
        <div class="row" style="margin-top: 50px; margin-bottom: 50px;">
          <div class="col-md-4">
            <div class="card">
              <a href="#" class="embedAluclass" data-watch="YVnrRMRg6Fs">
                <div class="row">
                  <div class="col-md-12">
                    <picture>
                      <source srcset="/img/cms/AfinacaoJanelas_FR.webp" type="image/webp" />
                      <img loading="lazy" src="/img/cms/AfinacaoJanelas_FR.jpg"
                        alt="Réglage des Fenêtres" class="img-fluid" width="1280" height="720" />
                    </picture>
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


                <span class="h4 subcategory-name" style="height:75px; display:inline-block; align-content:center;">
                  <a class="h4"
                    href="{$link->getCategoryLink($subcategory.id_category, $subcategory.link_rewrite)|escape:'html':'UTF-8'}">
                    {$subcategory.name}
                  </a>
                </span>


                <div class="subcategory-image">
                  <a href="{$link->getCategoryLink($subcategory.id_category, $subcategory.link_rewrite)|escape:'html':'UTF-8'}"
                    title="{$subcategory.name|escape:'html':'UTF-8'}" class="img">

                    {if {$subcategory.id_category} == "67"}
                      {if $subcategory.id_image}
                        <img loading="lazy" class="replace-2x" style="height: 132px !important;"
                          src="{$link->getCatImageLink($subcategory.link_rewrite, $subcategory.id_image)}" alt="" />
                      {else}
                        <img loading="lazy" class="replace-2x" style="height: 132px !important;"
                          src="{$img_cat_dir}en-default-category_default.jpg" alt="" />
                      {/if}
                    {else}
                      {if $subcategory.id_image}
                        <img loading="lazy" class="replace-2x" src="{$link->getCatImageLink($subcategory.link_rewrite, $subcategory.id_image)}"
                          alt="" />
                      {else}
                        <img loading="lazy" class="replace-2x" src="{$img_cat_dir}en-default-category_default.jpg" alt="" />
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
              <p class="h1">{$category.name}</p>
            {else}
              <p class="h1">{$category.name}</p><br />
              <a href="{$botaoCatBlog['link']}" class="btn btn-primary"
                style="position: absolute; top: 20px; right: 20px;">Guide d'achat</a>
            {/if}

            {if $category.description}
              <div id="category-description" class="text-muted">{$category.description nofilter}</div>
            {/if}
            {if $category.image.large.url}
              <!--<div class="category-cover">
                          <img loading="lazy" src="{$category.image.large.url}" alt="{if !empty($category.image.legend)}{$category.image.legend}{else}{$category.name}{/if}">
                      </div>-->
            {/if}
          </div>
        {/if}
      </div>
    </section>

    {* Banner Comparatif *}
    <section style="margin-bottom: 2rem;">
      <div class="container">
        {if {$category.id} == "51" || {$category.id} == "52" || {$category.id} == "55" || {$category.id} ==
          "56"}

          <div class="hidden-md-down" style="flex-direction: row;display: inline-flex;">
            <div style="width: 35.2%; margin-right: 0.4rem;">
              <a href="https://priximbattable.net/content/49-il-y-a-un-produit-prix-imbattable-pres-de-chez-vous"
                target="_blank">
                <picture>
                  <source srcset="/img/comparatif/desktop/produit-prix-imbattable-01.webp" type="image/webp" />
                  <img loading="lazy" src="/img/comparatif/desktop/produit-prix-imbattable-01.jpg"
                    alt="Il y a un produit Prix Imbattable près de chez vous" class="img-fluid img-centre imgBannerDesktop" width="529" height="430" />
                </picture>
              </a>
            </div>
            <div style="width: 35.2%; margin-right: 0.4rem;">
              <a href="https://priximbattable.net/comparatif?ctg=45" target="_blank">
                <picture>
                  <source srcset="/img/comparatif/desktop/comparatif-portails.webp" type="image/webp" />
                  <img loading="lazy" src="/img/comparatif/desktop/comparatif-portails.jpg"
                    alt="Comparatif Portails" class="img-fluid img-centre imgBannerDesktop" width="529" height="430" />
                </picture>
              </a>
            </div>
            <div class="imgPDF" style="width: 29.4%; cursor: pointer;">
              <picture>
                <source srcset="/img/comparatif/telecharger-catalogue.webp" type="image/webp" />
                <img loading="lazy" src="/img/comparatif/telecharger-catalogue.jpg"
                  alt="Télécharger notre catalogue" class="img-fluid img-centre imgBannerDesktop" width="441" height="430" />
              </picture>
            </div>
          </div>
          <div class="hidden-md-up ">
            <div class="row">
              <div class="col-sm-12" id="imgBanner">
                <div class="row" style="background: #f1f1f1;">
                  <div class="col-sm-12" style="margin-bottom: 0.4rem;">
                    <a href="https://priximbattable.net/content/49-il-y-a-un-produit-prix-imbattable-pres-de-chez-vous"
                      target="_blank">
                      <picture>
                        <source srcset="/img/comparatif/desktop/produit-prix-imbattable-01.webp" type="image/webp" />
                        <img loading="lazy" src="/img/comparatif/desktop/produit-prix-imbattable-01.jpg"
                          alt="Il y a un produit Prix Imbattable près de chez vous" class="img-fluid img-centre imgBannerMobile" width="529" height="430" />
                      </picture>
                    </a>
                  </div>
                  <div class="col-sm-12" style="margin-bottom: 0.4rem;">
                    <a href="https://priximbattable.net/comparatif?ctg=45" target="_blank">
                      <picture>
                        <source srcset="/img/comparatif/desktop/comparatif-portails.webp" type="image/webp" />
                        <img loading="lazy" src="/img/comparatif/desktop/comparatif-portails.jpg"
                          alt="Comparatif Portails" class="img-fluid img-centre imgBannerMobile" width="529" height="430" />
                      </picture>
                    </a>
                  </div>
                  <div class="col-sm-12 imgPDF" style="cursor: pointer;">
                    <picture>
                      <source srcset="/img/comparatif/telecharger-catalogue.webp" type="image/webp" />
                      <img loading="lazy" src="/img/comparatif/telecharger-catalogue.jpg"
                        alt="Télécharger notre catalogue" class="img-fluid img-centre imgBannerMobile" width="441" height="430" />
                    </picture>
                  </div>
                </div>
              </div>
            </div>
          </div>

        {elseif {$category.id} == "34"}
          <div class="hidden-md-down" style="flex-direction: row;display: inline-flex;">
            <div style="width: 35.2%; margin-right: 0.4rem;">
              <a href="https://priximbattable.net/content/49-il-y-a-un-produit-prix-imbattable-pres-de-chez-vous"
                target="_blank">
                <picture>
                  <source srcset="/img/comparatif/desktop/produit-prix-imbattable-01.webp" type="image/webp" />
                  <img loading="lazy" src="/img/comparatif/desktop/produit-prix-imbattable-01.jpg"
                    alt="Il y a un produit Prix Imbattable près de chez vous" class="img-fluid img-centre imgBannerDesktop" width="529" height="430" />
                </picture>
              </a>
            </div>
            <div style="width: 35.2%; margin-right: 0.4rem;">
              <a href="https://priximbattable.net/comparatif?ctg=34" target="_blank">
                <picture>
                  <source srcset="/img/comparatif/desktop/comparatif-pergolas-aluminium.webp" type="image/webp" />
                  <img loading="lazy" src="/img/comparatif/desktop/comparatif-pergolas-aluminium.jpg"
                    alt="Comparatif Pergolas Aluminium" class="img-fluid img-centre imgBannerDesktop" width="529" height="430" />
                </picture>
              </a>
            </div>
              <div class="imgPDF" style="width: 29.4%; cursor: pointer;">
                <picture>
                <source srcset="/img/comparatif/telecharger-catalogue.webp" type="image/webp" />
                <img loading="lazy" src="/img/comparatif/telecharger-catalogue.jpg"
                  alt="Télécharger notre catalogue" class="img-fluid img-centre imgBannerDesktop" width="441" height="430" />
              </picture>
            </div>
          </div>
          <div class="hidden-md-up ">
            <div class="row">
              <div class="col-sm-12" id="imgBanner">
                <div class="row" style="background: #f1f1f1;">
                  <div class="col-sm-12" style="margin-bottom: 0.4rem;">
                    <a href="https://priximbattable.net/content/49-il-y-a-un-produit-prix-imbattable-pres-de-chez-vous"
                      target="_blank">
                      <picture>
                        <source srcset="/img/comparatif/desktop/produit-prix-imbattable-01.webp" type="image/webp" />
                        <img loading="lazy" src="/img/comparatif/desktop/produit-prix-imbattable-01.jpg"
                          alt="Il y a un produit Prix Imbattable près de chez vous" class="img-fluid img-centre imgBannerMobile" width="529" height="430" />
                      </picture>
                    </a>
                  </div>
                  <div class="col-sm-12" style="margin-bottom: 0.4rem;">
                    <a href="https://priximbattable.net/comparatif?ctg=34" target="_blank">
                      <picture>
                        <source srcset="/img/comparatif/desktop/comparatif-pergolas-aluminium.webp" type="image/webp" />
                        <img loading="lazy" src="/img/comparatif/desktop/comparatif-pergolas-aluminium.jpg"
                          alt="Comparatif Pergolas Aluminium" class="img-fluid img-centre imgBannerMobile" width="529" height="430" />
                      </picture>
                    </a>
                  </div>
                  <div class="col-sm-12 imgPDF" style="cursor: pointer;">
                    <picture>
                      <source srcset="/img/comparatif/telecharger-catalogue.webp" type="image/webp" />
                      <img loading="lazy" src="/img/comparatif/telecharger-catalogue.jpg"
                        alt="Télécharger notre catalogue" class="img-fluid img-centre imgBannerMobile" width="441" height="430" />
                    </picture>
                  </div>
                </div>
              </div>
            </div>
          </div>

        {elseif {$category.id} == "35"}
          <div class="hidden-md-down" style="flex-direction: row;display: inline-flex;">
            <div style="width: 35.2%; margin-right: 0.4rem;">
              <a href="https://priximbattable.net/content/49-il-y-a-un-produit-prix-imbattable-pres-de-chez-vous"
                target="_blank">
                <picture>
                  <source srcset="/img/comparatif/desktop/produit-prix-imbattable-01.webp" type="image/webp" />
                  <img loading="lazy" src="/img/comparatif/desktop/produit-prix-imbattable-01.jpg"
                    alt="Il y a un produit Prix Imbattable près de chez vous" class="img-fluid img-centre imgBannerDesktop" width="529" height="430" />
                </picture>
              </a>
            </div>
            <div style="width: 35.2%; margin-right: 0.4rem;">
              <a href="https://priximbattable.net/comparatif?ctg=35" target="_blank">
                <picture>
                  <source srcset="/img/comparatif/desktop/comparatif-pergolas-bioclimatiques.webp" type="image/webp" />
                  <img loading="lazy" src="/img/comparatif/desktop/comparatif-pergolas-bioclimatiques.jpg"
                    alt="Comparatif Pergolas Bioclimatiques" class="img-fluid img-centre imgBannerDesktop" width="529" height="430" />
                </picture>
              </a>
            </div>
            <div class="imgPDF" style="width: 29.4%; cursor: pointer;">
              <picture>
                <source srcset="/img/comparatif/telecharger-catalogue.webp" type="image/webp" />
                <img loading="lazy" src="/img/comparatif/telecharger-catalogue.jpg"
                  alt="Télécharger notre catalogue" class="img-fluid img-centre imgBannerDesktop" width="441" height="430" />
              </picture>
            </div>
          </div>
          <div class="hidden-md-up ">
            <div class="row">
              <div class="col-sm-12" id="imgBanner">
                <div class="row" style="background: #f1f1f1;">
                  <div class="col-sm-12" style="margin-bottom: 0.4rem;">
                    <a href="https://priximbattable.net/content/49-il-y-a-un-produit-prix-imbattable-pres-de-chez-vous"
                      target="_blank">
                      <picture>
                        <source srcset="/img/comparatif/desktop/produit-prix-imbattable-01.webp" type="image/webp" />
                        <img loading="lazy" src="/img/comparatif/desktop/produit-prix-imbattable-01.jpg"
                          alt="Il y a un produit Prix Imbattable près de chez vous" class="img-fluid img-centre imgBannerMobile" width="529" height="430" />
                      </picture>
                    </a>
                  </div>
                  <div class="col-sm-12" style="margin-bottom: 0.4rem;">
                    <a href="https://priximbattable.net/comparatif?ctg=35" target="_blank">
                      <picture>
                        <source srcset="/img/comparatif/desktop/comparatif-pergolas-bioclimatiques.webp" type="image/webp" />
                        <img loading="lazy" src="/img/comparatif/desktop/comparatif-pergolas-bioclimatiques.jpg"
                          alt="Comparatif Pergolas Bioclimatiques" class="img-fluid img-centre imgBannerMobile" width="529" height="430" />
                      </picture>
                    </a>
                  </div>
                  <div class="col-sm-12 imgPDF" style="cursor: pointer;">
                    <picture>
                      <source srcset="/img/comparatif/telecharger-catalogue.webp" type="image/webp" />
                      <img loading="lazy" src="/img/comparatif/telecharger-catalogue.jpg"
                        alt="Télécharger notre catalogue" class="img-fluid img-centre imgBannerMobile" width="441" height="430" />
                    </picture>
                  </div>
                </div>
              </div>
            </div>
          </div>

        {elseif {$category.id} == "21" || {$category.id} == "108" || {$category.id} == "117" }
          <div class="hidden-md-down" style="flex-direction: row;display: inline-flex;">
            <div style="width: 35.2%; margin-right: 0.4rem;">
              <a href="https://priximbattable.net/content/49-il-y-a-un-produit-prix-imbattable-pres-de-chez-vous"
                target="_blank">
                <picture>
                  <source srcset="/img/comparatif/desktop/produit-prix-imbattable-01.webp" type="image/webp" />
                  <img loading="lazy" src="/img/comparatif/desktop/produit-prix-imbattable-01.jpg"
                    alt="Il y a un produit Prix Imbattable près de chez vous" class="img-fluid img-centre imgBannerDesktop" width="529" height="430" />
                </picture>
              </a>
            </div>
            <div style="width: 35.2%; margin-right: 0.4rem;">
              <a href="https://priximbattable.net/comparatif?ctg=21" target="_blank">
                <picture>
                  <source srcset="/img/comparatif/desktop/comparatif-grillages.webp" type="image/webp" />
                  <img loading="lazy" src="/img/comparatif/desktop/comparatif-grillages.jpg"
                    alt="Comparatif Grillages" class="img-fluid img-centre imgBannerDesktop" width="529" height="430" />
                </picture>
              </a>
            </div>
            <div class="imgPDF" style="width: 29.4%; cursor: pointer;">
              <picture>
                <source srcset="/img/comparatif/telecharger-catalogue.webp" type="image/webp" />
                <img loading="lazy" src="/img/comparatif/telecharger-catalogue.jpg"
                  alt="Télécharger notre catalogue" class="img-fluid img-centre imgBannerDesktop" width="441" height="430" />
              </picture>
            </div>
          </div>
          <div class="hidden-md-up ">
            <div class="row">
              <div class="col-sm-12" id="imgBanner">
                <div class="row" style="background: #f1f1f1;">
                  <div class="col-sm-12" style="margin-bottom: 0.4rem;">
                    <a href="https://priximbattable.net/content/49-il-y-a-un-produit-prix-imbattable-pres-de-chez-vous"
                      target="_blank">
                      <picture>
                        <source srcset="/img/comparatif/desktop/produit-prix-imbattable-01.webp" type="image/webp" />
                        <img loading="lazy" src="/img/comparatif/desktop/produit-prix-imbattable-01.jpg"
                          alt="Il y a un produit Prix Imbattable près de chez vous" class="img-fluid img-centre imgBannerMobile" width="529" height="430" />
                      </picture>
                    </a>
                  </div>
                  <div class="col-sm-12" style="margin-bottom: 0.4rem;">
                    <a href="https://priximbattable.net/comparatif?ctg=21" target="_blank">
                      <picture>
                        <source srcset="/img/comparatif/desktop/comparatif-grillages.webp" type="image/webp" />
                        <img loading="lazy" src="/img/comparatif/desktop/comparatif-grillages.jpg"
                          alt="Comparatif Grillages" class="img-fluid img-centre imgBannerMobile" width="529" height="430" />
                      </picture>
                    </a>
                  </div>
                  <div class="col-sm-12 imgPDF" style="cursor: pointer;">
                    <picture>
                      <source srcset="/img/comparatif/telecharger-catalogue.webp" type="image/webp" />
                      <img loading="lazy" src="/img/comparatif/telecharger-catalogue.jpg"
                        alt="Télécharger notre catalogue" class="img-fluid img-centre imgBannerMobile" width="441" height="430" />
                    </picture>
                  </div>
                </div>
              </div>
            </div>
          </div>

        {elseif {$category.id} == "23" }
          <div class="hidden-md-down" style="flex-direction: row;display: inline-flex;">
            <div style="width: 35.2%; margin-right: 0.4rem;">
              <a href="https://priximbattable.net/content/49-il-y-a-un-produit-prix-imbattable-pres-de-chez-vous"
                target="_blank">
                <picture>
                  <source srcset="/img/comparatif/desktop/produit-prix-imbattable-01.webp" type="image/webp" />
                  <img loading="lazy" src="/img/comparatif/desktop/produit-prix-imbattable-01.jpg"
                    alt="Il y a un produit Prix Imbattable près de chez vous" class="img-fluid img-centre imgBannerDesktop" width="529" height="430" />
                </picture>
              </a>
            </div>
            <div style="width: 35.2%; margin-right: 0.4rem;">
              <a href="https://priximbattable.net/comparatif?ctg=23" target="_blank">
                <picture>
                  <source srcset="/img/comparatif/desktop/comparatif-garde-corps.webp" type="image/webp" />
                  <img loading="lazy" src="/img/comparatif/desktop/comparatif-garde-corps.jpg"
                    alt="Comparatif Garde Corps" class="img-fluid img-centre imgBannerDesktop" width="529" height="430" />
                </picture>
              </a>
            </div>
            <div class="imgPDF" style="width: 29.4%; cursor: pointer;">
              <picture>
                <source srcset="/img/comparatif/telecharger-catalogue.webp" type="image/webp" />
                <img loading="lazy" src="/img/comparatif/telecharger-catalogue.jpg"
                  alt="Télécharger notre catalogue" class="img-fluid img-centre imgBannerDesktop" width="441" height="430" />
              </picture>
            </div>
          </div>
          <div class="hidden-md-up ">
            <div class="row">
              <div class="col-sm-12" id="imgBanner">
                <div class="row" style="background: #f1f1f1;">
                  <div class="col-sm-12" style="margin-bottom: 0.4rem;">
                    <a href="https://priximbattable.net/content/49-il-y-a-un-produit-prix-imbattable-pres-de-chez-vous"
                      target="_blank">
                      <picture>
                        <source srcset="/img/comparatif/desktop/produit-prix-imbattable-01.webp" type="image/webp" />
                        <img loading="lazy" src="/img/comparatif/desktop/produit-prix-imbattable-01.jpg"
                          alt="Il y a un produit Prix Imbattable près de chez vous" class="img-fluid img-centre imgBannerMobile" width="529" height="430" />
                      </picture>
                    </a>
                  </div>
                  <div class="col-sm-12" style="margin-bottom: 0.4rem;">
                    <a href="https://priximbattable.net/comparatif?ctg=23" target="_blank">
                      <picture>
                        <source srcset="/img/comparatif/desktop/comparatif-garde-corps.webp" type="image/webp" />
                        <img loading="lazy" src="/img/comparatif/desktop/comparatif-garde-corps.jpg"
                          alt="Comparatif Garde Corps" class="img-fluid img-centre imgBannerMobile" width="529" height="430" />
                      </picture>
                    </a>
                  </div>
                  <div class="col-sm-12 imgPDF" style="cursor: pointer;">
                    <picture>
                      <source srcset="/img/comparatif/telecharger-catalogue.webp" type="image/webp" />
                      <img loading="lazy" src="/img/comparatif/telecharger-catalogue.jpg"
                        alt="Télécharger notre catalogue" class="img-fluid img-centre imgBannerMobile" width="441" height="430" />
                    </picture>
                  </div>
                </div>
              </div>
            </div>
          </div>

        {elseif {$category.id} == "25" }
          <div class="hidden-md-down" style="flex-direction: row;display: inline-flex;">
            <div style="width: 35.2%; margin-right: 0.4rem;">
              <a href="https://priximbattable.net/content/49-il-y-a-un-produit-prix-imbattable-pres-de-chez-vous"
                target="_blank">
                <picture>
                  <source srcset="/img/comparatif/desktop/produit-prix-imbattable-01.webp" type="image/webp" />
                  <img loading="lazy" src="/img/comparatif/desktop/produit-prix-imbattable-01.jpg"
                    alt="Il y a un produit Prix Imbattable près de chez vous" class="img-fluid img-centre imgBannerDesktop" width="529" height="430" />
                </picture>
              </a>
            </div>
            <div style="width: 35.2%; margin-right: 0.4rem;">
              <a href="https://priximbattable.net/comparatif?ctg=25" target="_blank">
                <picture>
                  <source srcset="/img/comparatif/desktop/comparatif-portes-garage-battantes.webp" type="image/webp" />
                  <img loading="lazy" src="/img/comparatif/desktop/comparatif-portes-garage-battantes.jpg"
                    alt="Comparatif Portes Garage Battantes" class="img-fluid img-centre imgBannerDesktop" width="529" height="430" />
                </picture>
              </a>
            </div>
            <div class="imgPDF" style="width: 29.4%; cursor: pointer;">
              <picture>
                <source srcset="/img/comparatif/telecharger-catalogue.webp" type="image/webp" />
                <img loading="lazy" src="/img/comparatif/telecharger-catalogue.jpg"
                  alt="Télécharger notre catalogue" class="img-fluid img-centre imgBannerDesktop" width="441" height="430" />
              </picture>
            </div>
          </div>

          <div class="hidden-md-up ">
            <div class="row">
              <div class="col-sm-12" id="imgBanner">
                <div class="row" style="background: #f1f1f1;">
                  <div class="col-sm-12" style="margin-bottom: 0.4rem;">
                    <a href="https://priximbattable.net/content/49-il-y-a-un-produit-prix-imbattable-pres-de-chez-vous"
                      target="_blank">
                      <picture>
                        <source srcset="/img/comparatif/desktop/produit-prix-imbattable-01.webp" type="image/webp" />
                        <img loading="lazy" src="/img/comparatif/desktop/produit-prix-imbattable-01.jpg"
                          alt="Il y a un produit Prix Imbattable près de chez vous" class="img-fluid img-centre imgBannerMobile" width="529" height="430" />
                      </picture>
                    </a>
                  </div>
                  <div class="col-sm-12" style="margin-bottom: 0.4rem;">
                    <a href="https://priximbattable.net/comparatif?ctg=25" target="_blank">
                      <picture>
                        <source srcset="/img/comparatif/desktop/comparatif-portes-garage-battantes.webp" type="image/webp" />
                        <img loading="lazy" src="/img/comparatif/desktop/comparatif-portes-garage-battantes.jpg"
                          alt="Comparatif Portes Garage Battantes" class="img-fluid img-centre imgBannerMobile" width="529" height="430" />
                      </picture>
                    </a>
                  </div>
                  <div class="col-sm-12 imgPDF" style="cursor: pointer;">
                    <picture>
                      <source srcset="/img/comparatif/telecharger-catalogue.webp" type="image/webp" />
                      <img loading="lazy" src="/img/comparatif/telecharger-catalogue.jpg"
                        alt="Télécharger notre catalogue" class="img-fluid img-centre imgBannerMobile" width="441" height="430" />
                    </picture>
                  </div>
                </div>
              </div>
            </div>
          </div>

        {elseif {$category.id} == "26" }
          <div class="hidden-md-down" style="flex-direction: row;display: inline-flex;">
            <div style="width: 35.2%; margin-right: 0.4rem;">
              <a href="https://priximbattable.net/content/49-il-y-a-un-produit-prix-imbattable-pres-de-chez-vous"
                target="_blank">
                <picture>
                  <source srcset="/img/comparatif/desktop/produit-prix-imbattable-01.webp" type="image/webp" />
                  <img loading="lazy" src="/img/comparatif/desktop/produit-prix-imbattable-01.jpg"
                    alt="Il y a un produit Prix Imbattable près de chez vous" class="img-fluid img-centre imgBannerDesktop" width="529" height="430" />
                </picture>
              </a>
            </div>
            <div style="width: 35.2%; margin-right: 0.4rem;">
              <a href="https://priximbattable.net/comparatif?ctg=26" target="_blank">
                <picture>
                  <source srcset="/img/comparatif/desktop/comparatif-portes-garage-enroulables.webp" type="image/webp" />
                  <img loading="lazy" src="/img/comparatif/desktop/comparatif-portes-garage-enroulables.jpg"
                    alt="Comparatif Portes Garage Enroulables" class="img-fluid img-centre imgBannerDesktop" width="529" height="430" />
                </picture>
              </a>
            </div>
            <div class="imgPDF" style="width: 29.4%; cursor: pointer;">
              <picture>
                <source srcset="/img/comparatif/telecharger-catalogue.webp" type="image/webp" />
                <img loading="lazy" src="/img/comparatif/telecharger-catalogue.jpg"
                  alt="Télécharger notre catalogue" class="img-fluid img-centre imgBannerDesktop" width="441" height="430" />
              </picture>
            </div>
          </div>

          <div class="hidden-md-up ">
            <div class="row">
              <div class="col-sm-12" id="imgBanner">
                <div class="row" style="background: #f1f1f1;">
                  <div class="col-sm-12" style="margin-bottom: 0.4rem;">
                    <a href="https://priximbattable.net/content/49-il-y-a-un-produit-prix-imbattable-pres-de-chez-vous"
                      target="_blank">
                      <picture>
                        <source srcset="/img/comparatif/desktop/produit-prix-imbattable-01.webp" type="image/webp" />
                        <img loading="lazy" src="/img/comparatif/desktop/produit-prix-imbattable-01.jpg"
                          alt="Il y a un produit Prix Imbattable près de chez vous" class="img-fluid img-centre imgBannerMobile" width="529" height="430" />
                      </picture>
                    </a>
                  </div>
                  <div class="col-sm-12" style="margin-bottom: 0.4rem;">
                    <a href="https://priximbattable.net/comparatif?ctg=24" target="_blank">
                      <picture>
                        <source srcset="/img/comparatif/desktop/comparatif-portes-garage-enroulables.webp" type="image/webp" />
                        <img loading="lazy" src="/img/comparatif/desktop/comparatif-portes-garage-enroulables.jpg"
                          alt="Comparatif Portes Garage Enroulables" class="img-fluid img-centre imgBannerMobile" width="529" height="430" />
                      </picture>
                    </a>
                  </div>
                  <div class="col-sm-12 imgPDF" style="cursor: pointer;">
                    <picture>
                      <source srcset="/img/comparatif/telecharger-catalogue.webp" type="image/webp" />
                      <img loading="lazy" src="/img/comparatif/telecharger-catalogue.jpg"
                        alt="Télécharger notre catalogue" class="img-fluid img-centre imgBannerMobile" width="441" height="430" />
                    </picture>
                  </div>
                </div>
              </div>
            </div>
          </div>

        {elseif {$category.id} == "24" }
          <div class="hidden-md-down" style="flex-direction: row;display: inline-flex;">
            <div style="width: 35.2%; margin-right: 0.4rem;">
              <a href="https://priximbattable.net/content/49-il-y-a-un-produit-prix-imbattable-pres-de-chez-vous"
                target="_blank">
                <picture>
                  <source srcset="/img/comparatif/desktop/produit-prix-imbattable-01.webp" type="image/webp" />
                  <img loading="lazy" src="/img/comparatif/desktop/produit-prix-imbattable-01.jpg"
                    alt="Il y a un produit Prix Imbattable près de chez vous" class="img-fluid img-centre imgBannerDesktop" width="529" height="430" />
                </picture>
              </a>
            </div>
            <div style="width: 35.2%; margin-right: 0.4rem;">
              <a href="https://priximbattable.net/comparatif?ctg=24" target="_blank">
                <picture>
                  <source srcset="/img/comparatif/desktop/comparatif-portes-garage-sectionnelles.webp" type="image/webp" />
                  <img loading="lazy" src="/img/comparatif/desktop/comparatif-portes-garage-sectionnelles.jpg"
                    alt="Comparatif Portes Garage Sectionnelles" class="img-fluid img-centre imgBannerDesktop" width="529" height="430" />
                </picture>
              </a>
            </div>
            <div class="imgPDF" style="width: 29.4%; cursor: pointer;">
              <picture>
                <source srcset="/img/comparatif/telecharger-catalogue.webp" type="image/webp" />
                <img loading="lazy" src="/img/comparatif/telecharger-catalogue.jpg"
                  alt="Télécharger notre catalogue" class="img-fluid img-centre imgBannerDesktop" width="441" height="430" />
              </picture>
            </div>
          </div>

          <div class="hidden-md-up ">
            <div class="row">
              <div class="col-sm-12" id="imgBanner">
                <div class="row" style="background: #f1f1f1;">
                  <div class="col-sm-12" style="margin-bottom: 0.4rem;">
                    <a href="https://priximbattable.net/content/49-il-y-a-un-produit-prix-imbattable-pres-de-chez-vous"
                      target="_blank">
                      <picture>
                        <source srcset="/img/comparatif/desktop/produit-prix-imbattable-01.webp" type="image/webp" />
                        <img loading="lazy" src="/img/comparatif/desktop/produit-prix-imbattable-01.jpg"
                          alt="Il y a un produit Prix Imbattable près de chez vous" class="img-fluid img-centre imgBannerMobile" width="529" height="430" />
                      </picture>
                    </a>
                  </div>
                  <div class="col-sm-12" style="margin-bottom: 0.4rem;">
                    <a href="https://priximbattable.net/comparatif?ctg=24" target="_blank">
                      <picture>
                        <source srcset="/img/comparatif/desktop/comparatif-portes-garage-sectionnelles.webp" type="image/webp" />
                        <img loading="lazy" src="/img/comparatif/desktop/comparatif-portes-garage-sectionnelles.jpg"
                          alt="Comparatif Portes Garage Sectionnelles" class="img-fluid img-centre imgBannerMobile" width="529" height="430" />
                      </picture>
                    </a>
                  </div>
                  <div class="col-sm-12 imgPDF" style="cursor: pointer;">
                    <picture>
                      <source srcset="/img/comparatif/telecharger-catalogue.webp" type="image/webp" />
                      <img loading="lazy" src="/img/comparatif/telecharger-catalogue.jpg"
                        alt="Télécharger notre catalogue" class="img-fluid img-centre imgBannerMobile" width="441" height="430" />
                    </picture>
                  </div>
                </div>
              </div>
            </div>
          </div>

        {elseif {$category.id} == "33" }
          <div class="hidden-md-down" style="flex-direction: row;display: inline-flex;">
            <div style="width: 35.2%; margin-right: 0.4rem;">
              <a href="https://priximbattable.net/content/49-il-y-a-un-produit-prix-imbattable-pres-de-chez-vous"
                target="_blank">
                <picture>
                  <source srcset="/img/comparatif/desktop/produit-prix-imbattable-01.webp" type="image/webp" />
                  <img loading="lazy" src="/img/comparatif/desktop/produit-prix-imbattable-01.jpg"
                    alt="Il y a un produit Prix Imbattable près de chez vous" class="img-fluid img-centre imgBannerDesktop" width="529" height="430" />
                </picture>
              </a>
            </div>
            <div style="width: 35.2%; margin-right: 0.4rem;">
              <a href="https://priximbattable.net/comparatif?ctg=33" target="_blank">
                <picture>
                  <source srcset="/img/comparatif/desktop/comparatif-portes-service.webp" type="image/webp" />
                  <img loading="lazy" src="/img/comparatif/desktop/comparatif-portes-service.jpg"
                    alt="Comparatif Portes Service" class="img-fluid img-centre imgBannerDesktop" width="529" height="430" />
                </picture>
              </a>
            </div>
            <div class="imgPDF" style="width: 29.4%; cursor: pointer;">
              <picture>
                <source srcset="/img/comparatif/telecharger-catalogue.webp" type="image/webp" />
                <img loading="lazy" src="/img/comparatif/telecharger-catalogue.jpg"
                  alt="Télécharger notre catalogue" class="img-fluid img-centre imgBannerDesktop" width="441" height="430" />
              </picture>
            </div>
          </div>
          <div class="hidden-md-up ">
            <div class="row">
              <div class="col-sm-12" id="imgBanner">
                <div class="row" style="background: #f1f1f1;">
                  <div class="col-sm-12" style="margin-bottom: 0.4rem;">
                    <a href="https://priximbattable.net/content/49-il-y-a-un-produit-prix-imbattable-pres-de-chez-vous"
                      target="_blank">
                      <picture>
                        <source srcset="/img/comparatif/desktop/produit-prix-imbattable-01.webp" type="image/webp" />
                        <img loading="lazy" src="/img/comparatif/desktop/produit-prix-imbattable-01.jpg"
                          alt="Il y a un produit Prix Imbattable près de chez vous" class="img-fluid img-centre imgBannerMobile" width="529" height="430" />
                      </picture>
                    </a>
                  </div>
                  <div class="col-sm-12" style="margin-bottom: 0.4rem;">
                    <a href="https://priximbattable.net/comparatif?ctg=33" target="_blank">
                      <picture>
                        <source srcset="/img/comparatif/desktop/comparatif-portes-service.webp" type="image/webp" />
                        <img loading="lazy" src="/img/comparatif/desktop/comparatif-portes-service.jpg"
                          alt="Comparatif Portes Service" class="img-fluid img-centre imgBannerMobile" width="529" height="430" />
                      </picture>
                    </a>
                  </div>
                  <div class="col-sm-12 imgPDF" style="cursor: pointer;">
                    <picture>
                      <source srcset="/img/comparatif/telecharger-catalogue.webp" type="image/webp" />
                      <img loading="lazy" src="/img/comparatif/telecharger-catalogue.jpg"
                        alt="Télécharger notre catalogue" class="img-fluid img-centre imgBannerMobile" width="441" height="430" />
                    </picture>
                  </div>
                </div>
              </div>
            </div>
          </div>

          {* Banner without comparatif *}
        {elseif {$category.id} == "20" || {$category.id} == "22" || {$category.id} == "27" || {$category.id} == "28" ||
          {$category.id} == "29"
          || {$category.id} == "30" || {$category.id} == "32" || {$category.id} == "37" || {$category.id} == "39" ||
          {$category.id} == "44"
          || {$category.id} == "45" || {$category.id} == "53" || {$category.id} == "61" || {$category.id} == "65" ||
          {$category.id} == "83"
          || {$category.id} == "84" || {$category.id} == "85" || {$category.id} == "86" || {$category.id} == "87" ||
          {$category.id} == "88"
          || {$category.id} == "89" || {$category.id} == "90" || {$category.id} == "93" || {$category.id} == "94" ||
          {$category.id} == "97"
          || {$category.id} == "98" || {$category.id} == "99" || {$category.id} == "100" || {$category.id} == "101" ||
          {$category.id} == "103"
          || {$category.id} == "104" || {$category.id} == "105" || {$category.id} == "106" || {$category.id} == "107" ||
          {$category.id} == "111"
          || {$category.id} == "112" || {$category.id} == "118" || {$category.id} == "119" || {$category.id} == "120" ||
          {$category.id} == "121"
          || {$category.id} == "124" || {$category.id} == "125" || {$category.id} == "126" || {$category.id} == "127" ||
          {$category.id} == "174"
          || {$category.id} == "179" || {$category.id} == "180" || {$category.id} == "183" }
          <div class="hidden-md-down" style="flex-direction: row;display: inline-flex;">
            <div style="width: 88.5%; margin-right: 0.4rem;">
              <a href="https://priximbattable.net/content/49-il-y-a-un-produit-prix-imbattable-pres-de-chez-vous"
                target="_blank">
                <picture>
                  <source srcset="/img/comparatif/desktop/produit-prix-imbattable-02.webp" type="image/webp" />
                  <img loading="lazy" src="/img/comparatif/desktop/produit-prix-imbattable-02.jpg"
                    alt="Il y a un produit Prix Imbattable près de chez vous" class="img-fluid img-centre imgBannerDesktop" width="856" height="430" />
                </picture>
              </a>
            </div>
            <div class="imgPDF" style="width: 45.6%; cursor: pointer;">
              <picture>
                <source srcset="/img/comparatif/telecharger-catalogue.webp" type="image/webp" />
                <img loading="lazy" src="/img/comparatif/telecharger-catalogue.jpg"
                  alt="Télécharger notre catalogue" class="img-fluid img-centre imgBannerDesktop" width="441" height="430" />
              </picture>
            </div>
          </div>
          <div class="hidden-md-up ">
            <div class="row">
              <div class="col-sm-12" id="imgBanner">
                <div class="row" style="background: #f1f1f1;">
                  <div class="col-sm-12" style="margin-bottom: 0.4rem;">
                    <a href="https://priximbattable.net/content/49-il-y-a-un-produit-prix-imbattable-pres-de-chez-vous"
                      target="_blank">
                      <picture>
                        <source srcset="/img/comparatif/desktop/produit-prix-imbattable-01.webp" type="image/webp" />
                        <img loading="lazy" src="/img/comparatif/desktop/produit-prix-imbattable-01.jpg"
                          alt="Il y a un produit Prix Imbattable près de chez vous" class="img-fluid img-centre imgBannerMobile" width="529" height="430" />
                      </picture>
                    </a>
                  </div>
                  <div class="col-sm-12 imgPDF" style="cursor: pointer;">
                    <picture>
                      <source srcset="/img/comparatif/telecharger-catalogue.webp" type="image/webp" />
                      <img loading="lazy" src="/img/comparatif/telecharger-catalogue.jpg"
                        alt="Télécharger notre catalogue" class="img-fluid img-centre imgBannerMobile" width="441" height="430" />
                    </picture>
                  </div>
                </div>
              </div>
            </div>
          </div>

        {/if}
      </div>
    </section>

  </section>
{/block}
