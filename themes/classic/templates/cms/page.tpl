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
{extends file='page.tpl'}

{block name='page_title'}
  {if $cms.id == 71}
    <div class="hidden-sm-down ">
      <div style="display: flex;  align-items: center; justify-content: center;">
        <div>
          <a href="https://priximbattable.net/">
            <picture>
              <source srcset="/img/priximbattable-logo.webp" type="image/webp">
              <img fetchpriority="high" src="/img/priximbattable-logo.png" alt="Priximbattable" class="logo img-responsive"
                width="453" height="66">
            </picture>
          </a>
        </div>
        <div style="font-size: xx-large; font-weight: initial;"> Garantie tous ses produits 20 ans</div>
        <div style="margin-left: auto;">
          <picture>
            <source srcset="/img/cms/paginas_cms/priximbattable/phone.webp" type="image/webp">
            <img loading="lazy" src="/img/cms/paginas_cms/priximbattable/phone.png" alt=""
              class="logo img-responsive phoneIcon " style="height: 50px;">
          </picture> TEL : 0472809354
        </div>
      </div>
    </div>
    <div class="hidden-sm-up ">
      {$cms.meta_title}
    </div>
  {else}
    {$cms.meta_title}
  {/if}
{/block}

{block name='page_content_container'}
  <section id="content" class="page-content page-cms page-cms-{$cms.id}  {}">

    {block name='cms_content'}
      {$cms.content nofilter}
    {/block}

    {block name='hook_cms_dispute_information'}
      {hook h='displayCMSDisputeInformation'}
    {/block}

    {block name='hook_cms_print_button'}
      {hook h='displayCMSPrintButton'}
    {/block}

  </section>
{/block}
