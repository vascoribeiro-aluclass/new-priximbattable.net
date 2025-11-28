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

function upgrade_module_2_3_1($module)
{
    $configurations = [
        'GPTCHATBOX_SAVE_CONVERSATIONS' => false,
    ];

    foreach ($configurations as $key => $defaultValue) {
        if (!Configuration::hasKey($key)) {
            if (!Configuration::updateValue($key, $defaultValue)) {
                return false; // Return false if there was an error
            }
        }
    }

    $db = Db::getInstance();

    $sqlSessionTable = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'gptchatbox_session` (
                        `id_chat_session` INT(11) NOT NULL AUTO_INCREMENT,
                        `customer_id` INT(11) DEFAULT NULL,
                        `session_token` VARCHAR(32) NOT NULL,
                        `date_add` DATETIME NOT NULL,
                        PRIMARY KEY (`id_chat_session`)
                    ) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8;';

    if (!$db->execute($sqlSessionTable)) {
        return false;
    }

    $sqlMessageTable = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . "gptchatbox_message` (
                        `id_message` INT(11) NOT NULL AUTO_INCREMENT,
                        `id_chat_session` INT(11) NOT NULL,
                        `message` TEXT NOT NULL,
                        `is_ai` TINYINT(1) NOT NULL DEFAULT '0',
                        `date_add` DATETIME NOT NULL,
                        PRIMARY KEY (`id_message`),
                        FOREIGN KEY (`id_chat_session`) REFERENCES `" . _DB_PREFIX_ . 'gptchatbox_session`(`id_chat_session`) ON DELETE CASCADE
                    ) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8;';

    if (!$db->execute($sqlMessageTable)) {
        return false;
    }

    return true;
}
