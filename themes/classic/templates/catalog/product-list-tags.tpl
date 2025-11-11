{if $product.cover}
  <a href="{$product.url}" class="thumbnail product-thumbnail">
    <div class="img-a-medida img-a-medida-hide" data-divname="{$product.name}" data-dividprod="{$product.id_product}">
      <picture>
        <source srcset="/img/cms/sur-mesure.webp" type="image/webp" />
        <img {if $countproduct > 4} loading="lazy" {else} fetchpriority="high" {/if} src="/img/cms/sur-mesure.png" alt="">
      </picture>
    </div>
    <div class="img-service-pose img-a-medida-hide" data-divname="{$product.name}" data-dividprod="{$product.id_product}"
      data-divcategory="{$product.id_category_default}">
      <picture>
        <source srcset="/img/cms/service-pose.webp" type="image/webp" />
        <img {if $countproduct > 4} loading="lazy" {else} fetchpriority="high" {/if} src="/img/cms/service-pose.png"
          alt="">
      </picture>
    </div>

    <div class="img-motorisation-solaire img-a-medida-hide" data-divname="{$product.name}">
      <picture>
        <source srcset="/img/cms/motorisation-solaire.webp" type="image/webp" />
        <img loading="lazy" src="/img/cms/motorisation-solaire.png" alt="">
      </picture>
    </div>

    <div class="img-promo img-a-medida-hide" data-divname="{$product.name}" data-dividprod="{$product.id_product}">
      <picture>
        <source srcset="img/cms/starter.webp" type="image/webp" />
        <img loading="lazy" src="img/cms/starter.png" alt="" />
      </picture>
    </div>
    <div class="img-a-top-prix img-a-medida-hide" data-divname="{$product.name}">
      <picture>
        <source srcset="/img/cms/top-prix.webp" type="image/webp" />
        <img loading="lazy" src="/img/cms/top-prix.png" alt="">
      </picture>
    </div>
    <div class="kit-grillage-vert-tag img-a-medida-hide" data-dividprod="{$product.id_product}">
      <img loading="lazy" src="/img/cms/kit-grillage-vert-tag.png" alt="">
    </div>
    {* <div class="img-solde img-a-medida-hide" data-divname="{$product.name}" data-dividprod="{$product.id_product}">
          <img loading="lazy" src="/img/cms/soldes-tag.png" alt="">
        </div> *}
    <div class="img-a-promotion img-a-medida-hide" data-divname="{$product.name}">
      <img loading="lazy" src="/img/cms/TagFR-PromoBio.png" alt="">
    </div>
    {* <div class="img-destockage img-a-medida-hide" data-divname="{$product.name}">
          <img loading="lazy" src="/img/cms/img-destockage.png" alt="">
        </div> *}
    <div class="img-fermeture img-a-medida-hide" data-divname="{$product.name}">
      <picture>
        <source srcset="/img/cms/img-fermeture.webp" type="image/webp" />
        <img loading="lazy" src="/img/cms/img-fermeture.png" alt="">
      </picture>
    </div>
    {* <div class="tag-promo-50-store img-a-medida-hide" data-dividprod="{$product.id_product}">
          <img loading="lazy" src="/img/cms/tag-promo-50-store-fr.png" alt="">
        </div> *}
    {* <div class="img-oferta-3-estores img-a-medida-hide" data-dividprod="{$product.id_product}">
          <img loading="lazy" src="/img/cms/capa-pergolaBioclimaticaAutoporte-promo-store-fr.png" alt="">
        </div> *}
    {* <div class="img-oferta-table img-a-medida-hide" data-dividprod="{$product.id_product}">
          <img loading="lazy" src="/img/cms/tag-promo-easy.png" alt="">
        </div> *}
    {* <div class="img-ocult-grillage img-a-medida-hide" data-dividprod="{$product.id_product}">
          <img loading="lazy" src="/img/cms/tag-promo-grades-fr.png" alt="">
        </div>
        <div class="img-post-rhino-pro img-a-medida-hide" data-dividprod="{$product.id_product}">
          <img loading="lazy" src="/img/cms/promo-post-rhino-pro-fr.png" alt="">
        </div>
        <div class="motor-promo-tucan img-a-medida-hide" data-dividprod="{$product.id_product}">
         <img loading="lazy" src="/img/cms/tag-promo-tucan-fr.png" alt="">
        </div>
        <div class="motor-promo-centaurus img-a-medida-hide" data-dividprod="{$product.id_product}">
          <img loading="lazy" src="/img/cms/tag-promo-motor-centaurus-fr.png" alt="">
        </div>
        <div class="motor-promo-athena img-a-medida-hide" data-dividprod="{$product.id_product}">
          <img loading="lazy" src="/img/cms/tag-promo-athena-fr.png" alt="">
        </div> *}
    <div class="img-cloture-100 img-a-medida-hide" data-dividprod="{$product.id_product}">
      <picture>
        <source srcset="/img/cms/top-prix.webp" type="image/webp" />
        <img loading="lazy" src="/img/cms/top-prix.png" alt="">
      </picture>
    </div>
    <div class="img-cloture-100 img-a-medida-hide" data-dividprod="{$product.id_product}">
      <picture>
        <source srcset="/img/cms/top-prix.webp" type="image/webp" />
        <img loading="lazy" src="/img/cms/top-prix.png" alt="">
      </picture>
    </div>
    <div class="img-cloture-200-4mm img-a-medida-hide" data-dividprod="{$product.id_product}">
      <picture>
        <source srcset="/img/cms/top-prix.webp" type="image/webp" />
        <img loading="lazy" src="/img/cms/top-prix.png" alt="">
      </picture>
    </div>
    <div class="img-cloture-200-5mm img-a-medida-hide" data-dividprod="{$product.id_product}">
      <picture>
        <source srcset="/img/cms/gamepro.webp" type="image/webp" />
        <img loading="lazy" src="/img/cms/gamepro.png" alt="">
      </picture>
    </div>
    {* <div class="img-black-friday img-a-medida-hide" data-dividprod="{$product.id_product}">
          <img loading="lazy" src="/img/cms/Tag_FR.png" alt="Black Friday">
        </div> *}
    <div class="img-40 img-a-medida-hide" data-dividprod="{$product.id_product}">
      <img loading="lazy" src="/img/cms/tag-40.png" alt="">
    </div>
    <div class="img-avatar-starter img-a-medida-hide" data-dividprod="{$product.id_product}">
      <img loading="lazy" src="/img/cms/FR_Avatar-Starter.png" alt="">
    </div>
    <div class="img-avatar-grandlux img-a-medida-hide" data-dividprod="{$product.id_product}">
      <img loading="lazy" src="/img/cms/FR_Avatar-Grandlux.png" alt="">
    </div>
    <div class="img-avatar-sur-mesure img-a-medida-hide" data-dividprod="{$product.id_product}">
      <img loading="lazy" src="/img/cms/FR_Avatar-SurMesure.png" alt="">
    </div>
    {* <div class="img-tag-soldes img-a-medida-hide" data-divname="{$product.name}">
          <img loading="lazy" src="/img/cms/tag-soldes.png" alt="">
        </div> *}
    <img {if $countproduct > 5} loading="lazy" {else} fetchpriority="high" {/if} width=366 height=366
      src="{$product.cover.bySize.home_default.url}"
      alt="{if !empty($product.cover.legend)}{$product.cover.legend}{else}{$product.name|truncate:30:'...'}{/if}"
      data-full-size-image-url="{$product.cover.large.url}">
  </a>
{else}
  <a href="{$product.url}" class="thumbnail product-thumbnail">
    <div class="img-a-medida img-a-medida-hide" data-divname="{$product.name}" data-dividprod="{$product.id_product}">
      <picture>
        <source srcset="/img/cms/sur-mesure.webp" type="image/webp" />
        <img {if $countproduct > 4} loading="lazy" {else} fetchpriority="high" {/if} src="/img/cms/sur-mesure.png" alt="">
      </picture>
    </div>
    <div class="img-service-pose img-a-medida-hide" data-divname="{$product.name}" data-dividprod="{$product.id_product}"
      data-divcategory="{$product.id_category_default}">
      <picture>
        <source srcset="/img/cms/service-pose.webp" type="image/webp" />
        <img {if $countproduct > 4} loading="lazy" {else} fetchpriority="high" {/if} src="/img/cms/service-pose.png"
          alt="">
      </picture>
    </div>
    <div class="img-a-promo img-a-medida-hide" data-divname="{$product.name}" data-dividprod="{$product.id_product}">
      <img loading="lazy" src="/img/cms/promo.png" alt="">
    </div>
    <div class="img-a-top-prix img-a-medida-hide" data-divname="{$product.name}">
      <picture>
        <source srcset="/img/cms/top-prix.webp" type="image/webp" />
        <img loading="lazy" src="/img/cms/top-prix.png" alt="">
      </picture>
    </div>
    {* <div class="img-black-friday img-a-medida-hide" data-dividprod="{$product.id_product}">
          <img loading="lazy" src="/img/cms/Tag_FR.png" alt="Black Friday">
        </div> *}
    <div class="img-40 img-a-medida-hide" data-dividprod="{$product.id_product}">
      <img loading="lazy" src="/img/cms/tag-40.png" alt="">
    </div>
    <div class="img-avatar-starter img-a-medida-hide" data-dividprod="{$product.id_product}">
      <img loading="lazy" src="/img/cms/FR_Avatar-Starter.png" alt="">
    </div>
    <div class="img-avatar-grandlux img-a-medida-hide" data-dividprod="{$product.id_product}">
      <img loading="lazy" src="/img/cms/FR_Avatar-Grandlux.png" alt="">
    </div>
    <div class="img-avatar-sur-mesure img-a-medida-hide" data-dividprod="{$product.id_product}">
      <img loading="lazy" src="/img/cms/FR_Avatar-SurMesure.png" alt="">
    </div>
    {* <div class="img-tag-soldes img-a-medida-hide" data-divname="{$product.name}">
          <img loading="lazy" src="/img/cms/tag-soldes.png" alt="">
        </div> *}
    <img loading="lazy" src="{$urls.no_picture_image.bySize.home_default.url}" alt="">
  </a>
{/if}
