<?php
/**
 * 2007-2023 PrestaShop
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
 *  @author    PrestaShop SA <contact@prestashop.com>
 *  @copyright 2007-2023 PrestaShop SA
 *  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 *  International Registered Trademark & Property of PrestaShop SA
 */
if (!defined('_PS_VERSION_')) {
    exit;
}

function upgrade_module_2_2_3($module)
{
    $module->registerHook('displayFooterAfter');
    $module->registerHook('displayFooterBefore');
    $module->registerHook('displayHome');
    $module->registerHook('displayWrapperBottom');

    $configurations = [
        'GPTCHATBOX_POSITION' => 'bottom_right',
        'GPTCHATBOX_ICON' => 'chat-openai',
        'GPTCHATBOX_API_KEY' => '',
        'GPTCHATBOX_NAME_ML' => 'IA',
        'GPTCHATBOX_MODEL' => 'gpt-3.5-turbo',
        'GPTCHATBOX_TEXT_ML' => 'Chatbox Assistance',
        'GPTCHATBOX_CONTEXT_ML' => '',
        'GPTCHATBOX_SPECULATION' => true,
        'GPTCHATBOX_ERROR_HANDLING' => true,
        'GPTCHATBOX_CUSTOMER_SUPPORT_ML' => '',
        'GPTCHATBOX_PRODUCTS_FEED' => false,
        'GPTCHATBOX_ORDERS_FEED' => false,
        'GPTCHATBOX_CONTEXT_PRODUCTS_ML' => '',
        'GPTCHATBOX_CONTEXT_SHIPPING_ML' => '',
        'GPTCHATBOX_TEMPERATURE' => '0.7',
        'GPTCHATBOX_SEND_COLOR' => '#fff',
        'GPTCHATBOX_DATA_PROTECTION' => true,
        'GPTCHATBOX_SEND_BACKGROUND' => '#466fcb',
        'GPTCHATBOX_CONSENT_MESSAGE_ML' => '',
        'GPTCHATBOX_CONSENT_REQUEST' => false,
        'GPTCHATBOX_HOOK' => 'displayFooter',
        'GPTCHATBOX_ACTIVE' => false,
    ];

    foreach ($configurations as $key => $defaultValue) {
        if (!Configuration::hasKey($key)) {
            if (!Configuration::updateValue($key, $defaultValue)) {
                return false; // Return false if there was an error
            }
        }
    }

    return true;
}
