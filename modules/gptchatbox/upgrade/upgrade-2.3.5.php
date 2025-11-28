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

function tabExists($className)
{
    // Check if a tab with a given class name exists
    $idTab = (int) Tab::getIdFromClassName($className);

    return $idTab > 0;
}

// ... previous code ...

function installTab($class, $name, $moduleName, $parent = null)
{
    $tab = new Tab();
    $tab->active = 1;
    $tab->class_name = $class;
    $tab->name = [];
    foreach (Language::getLanguages(true) as $lang) {
        $tab->name[$lang['id_lang']] = $name;
    }
    $tab->id_parent = ($parent ? Tab::getIdFromClassName($parent) : 0);
    $tab->module = $moduleName;

    return $tab->add();
}

function upgrade_module_2_3_5($module)
{
    // ... existing code ...

    if (!tabExists('AdminGptchatboxChats')) {
        if (!installTab('AdminGptchatboxChats', 'GPTChatbox Chats', $module->name, 'AdminParentCustomerThreads')) {
            return false; // Return false if there was an error adding the tab
        }
    }

    // ... existing code ...

    return true;
}

// ... following code ...
