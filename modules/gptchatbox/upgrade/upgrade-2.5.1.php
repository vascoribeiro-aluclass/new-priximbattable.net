<?php
/**
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 * We offer the best and most useful modules PrestaShop and modifications for your online store.
 *
 * @author    Carlos Ucha
 * @copyright 2010-2100 Carlos Ucha
 * @license   see file: LICENSE.txt
 * This program is not free software and you can't resell and redistribute it
 *
 * CONTACT WITH DEVELOPER
 * carlosucha92@gmail.com
 */
if (!defined('_PS_VERSION_')) {
    exit;
}

function upgrade_module_2_5_1($module)
{
    // Register new hooks
    if (!$module->registerHook('displayHome')) {
        return false;
    }

    // Add new configuration variables for IP test
    if (!Configuration::updateValue('GPTCHATBOX_TEST_MODE', 0)
        || !Configuration::updateValue('GPTCHATBOX_ACCEPT_MESSAGE', 'OK')
        || !Configuration::updateValue('GPTCHATBOX_TEST_IP', '')
    ) {
        return false;
    }

    if (!Configuration::hasKey('GPTCHATBOX_MAX_OUTPUT_TOKENS')) {
        Configuration::updateValue('GPTCHATBOX_MAX_OUTPUT_TOKENS', 2000);
    }

    if (!Configuration::hasKey('GPTCHATBOX_INPUT_MAX_LENGTH')) {
        Configuration::updateValue('GPTCHATBOX_INPUT_MAX_LENGTH', 512);
    }

    if (!Configuration::hasKey('GPTCHATBOX_PRODUCTS_NAME')) {
        Configuration::updateValue('GPTCHATBOX_PRODUCTS_NAME', true);
    }

    if (!Configuration::hasKey('GPTCHATBOX_MAX_HISTORY')) {
        Configuration::updateValue('GPTCHATBOX_MAX_HISTORY', 10);
    }

    // Remove old tab under Customer Service
    uninstallTab('AdminGptchatboxChats');

    // Create main tab "ChatGPT Chatbot"
    $mainTab = installTab('AdminGptChatbot', 'ChatGPT Chatbot', 0);
    if (!$mainTab) {
        return false;
    }

    // Create subtab "Configuration"
    if (!installTab('AdminGptChatbotConfiguration', 'Configuration', 'AdminGptChatbot')) {
        return false;
    }

    // Create subtab "Chat Logs"
    if (!installTab('AdminGptChatbotLogs', 'Conversation Logs', 'AdminGptChatbot')) {
        return false;
    }

    return true;
}

function installTab($class, $name, $parent = null)
{
    if (Tab::getIdFromClassName($class)) {
        return true;
    }

    $tab = new Tab();
    $tab->active = 1;
    $tab->class_name = $class;
    $tab->name = [];
    foreach (Language::getLanguages(true) as $lang) {
        $tab->name[$lang['id_lang']] = $name;
    }
    $tab->id_parent = ($parent ? Tab::getIdFromClassName($parent) : 0);
    $tab->module = 'gptchatbox';

    return $tab->add();
}

function uninstallTab($tabClassName)
{
    $idTab = (int) Tab::getIdFromClassName($tabClassName);
    if ($idTab) {
        $tab = new Tab($idTab);

        return $tab->delete();
    }

    return true;
}
