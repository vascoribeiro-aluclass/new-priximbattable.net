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
<!-- <div id="_desktop_user_info" style="margin-top: 50px; margin-left: -90px; width: 150px;"> -->
{* <div id="_desktop_user_info" style="margin-top: 50px; width: 150px; margin-left: 598px !important;"> *}
<div id="_desktop_user_info" style="margin-top: 50px; margin-left: 390px !important;">
  <div class="user-info" style="">
    {if $logged}

      <!-- desktop -->
      <div class="hidden-md-down" style="text-align: center; margin-top: 36px;">

          <!-- <a class="account" href="{$my_account_url}" title="{l s='View my customer account' d='Shop.Theme.Customeraccount'}" rel="nofollow"> -->
        <div class="row">
          <div class="col-md-12">
            {* <i class="material-icons text-danger">&#xE7FF;</i> *}
            <a href="{$my_account_url}" title="{$customerName}" rel="nofollow">
            <picture>
              <source srcset="/img/user.webp" type="image/webp">
              <img loading="lazy" src="/img/user.png" alt="" class="logo img-responsive phoneIcon" style="height: 32px;">
            </picture>
            </a>
          </div>
        </div>
        {* <div class="row">
          <div class="col-md-12 alu_dropdown">
            <span class="hidden-sm-down alu_dropbtn" style="color: #7a7a7a; font-weight: bold; font-size: 16px;">
              {$customerName}
              <small>
                <i class="icone fa fa-chevron-right"></i>
                <i class="icone fa fa-chevron-down"></i>
              </small>
            </span>
            <div class="alu_dropdown_content">

              <a href="{$my_account_url}" title="{l s='View my customer account' d='Shop.Theme.Customeraccount'}" rel="nofollow" style="color: black !important;">{l s='View my customer account' d='Shop.Theme.Customeraccount'}</a>
              <a href="{$logout_url}" rel="nofollow" style="color: black !important;">{l s='Sign out' d='Shop.Theme.Actions'}</a>

            </div>
          </div>
        </div> *}



      </div>

      <!-- mobile -->
      <div class="hidden-md-up">
        <a href="{$my_account_url}" title="{l s='Log in to your customer account' d='Shop.Theme.Customeraccount'}" rel="nofollow">
          <i class="material-icons">&#xE7FF;</i>
          <span class="hidden-sm-down" style="color: #7a7a7a; text-transform: capitalize; font-weight: normal; font-size: 16px;">{l s='Sign in' d='Shop.Theme.Actions'}</span>
        </a>
      </div>

    {else}

      <!-- desktop -->
      <div class="hidden-md-down" style="text-align: center; margin-top: 36px; ">
        <div class="row">
          <div class="col-md-12">
            {* <i class="material-icons text-danger">&#xE7FF;</i> *}
            <a href="{$my_account_url}" title="{l s='Log in to your customer account' d='Shop.Theme.Customeraccount'}" rel="nofollow">
              <picture>
                <source srcset="/img/user.webp" type="image/webp">
                <img loading="lazy" src="/img/user.png" alt="" class="logo img-responsive phoneIcon" style="height: 32px;">
              </picture>
            </a>
          </div>
        </div>
        {* <div class="row">
          <div class="col-md-12">
            <a href="{$my_account_url}" title="{l s='Log in to your customer account' d='Shop.Theme.Customeraccount'}" rel="nofollow">
              <span class="hidden-sm-down" style="color: #7a7a7a; text-transform: capitalize; font-weight: normal; font-size: 16px;">{l s='Sign in' d='Shop.Theme.Actions'}</span>
            </a>
          </div>
        </div> *}
      </div>

      <!-- mobile -->
      <div class="hidden-md-up">
        <a href="{$my_account_url}" title="{l s='Log in to your customer account' d='Shop.Theme.Customeraccount'}" rel="nofollow">
          <i class="material-icons ">&#xE7FF;</i>
          <span class="hidden-sm-down" style="color: #7a7a7a; text-transform: capitalize; font-weight: normal; font-size: 16px;">{l s='Sign in' d='Shop.Theme.Actions'}</span>
        </a>
      </div>

    {/if}
  </div>
</div>
