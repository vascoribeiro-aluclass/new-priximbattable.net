{*
* 2007-2016 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
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
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2016 PrestaShop SA
*  @version  Release: $Revision$
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*
*  MODIFIED BY MYPRESTA.EU FOR PRESTASHOP 1.7 PURPOSES !
*
*}
<div class="comments_note">
    <a href="/avis-client" target="_blank" style="color: #7a7a7a; text-decoration: none;">
        <div class="star_content clearfix comments_avis">
            {* {section name="i" start=0 loop=5 step=1}
                {if $averageTotal le $smarty.section.i.index}
                    <div class="star"></div>
                {else}
                    <div class="star star_on"></div>
                {/if}
            {/section} *}
            <div><i class="fa fa-star" style="color: #F1C40F;" aria-hidden="true"></i></div>
            <div><i class="fa fa-star" style="color: #F1C40F;" aria-hidden="true"></i></div>
            <div><i class="fa fa-star" style="color: #F1C40F;" aria-hidden="true"></i></div>
            <div><i class="fa fa-star" style="color: #F1C40F;" aria-hidden="true"></i></div>
            <div><i class="fa fa-star" style="color: #73CF11;" aria-hidden="true"></i></div>
        </div>
        {* <span>{l s='%s Avis'|sprintf:$nbComments mod='productcomments'}&nbsp</span> *}
    </a>
</div>
