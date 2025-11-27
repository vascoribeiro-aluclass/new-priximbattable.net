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

function upgrade_module_3_0_2($module)
{
    if (!installTab('AdminGptchatboxProductsFeed', 'Products Feed', 'AdminGptChatbot')) {
        return false;
    }

    uninstallTab('AdminGptProductsFeed');

    if ($module->isRegisteredInHook('header')) {
        $module->unregisterHook('header');
    }

    $configKeysToDelete = [
        'GPTCHATBOX_PRODUCTS_NAME',
        'GPTCHATBOX_PRODUCTS_REFERENCE',
        'GPTCHATBOX_PRODUCTS_PRICE',
        'GPTCHATBOX_PRODUCTS_DESCRIPTION',
        'GPTCHATBOX_PRODUCTS_SHORTDESCRIPTION',
        'GPTCHATBOX_MAX_HISTORY',
        'GPTCHATBOX_PRODUCTS_URL',
    ];

    foreach ($configKeysToDelete as $key) {
        Configuration::deleteByName($key);
    }

    // Create new configuration keys if not already present
    $success =
        Configuration::updateValue('GPTCHATBOX_SELECTED_FIELDS', json_encode([]))
        && Configuration::updateValue('GPTCHATBOX_SELECTED_CATEGORIES', json_encode([]))
        && Configuration::updateValue('GPTCHATBOX_VECTOR_STORE_ID', '');

    return $success;
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
