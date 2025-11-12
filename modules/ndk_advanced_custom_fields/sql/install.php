<?php
/**
* 2007-2015 PrestaShop
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
*  @copyright 2007-2015 PrestaShop SA
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

$sql = array();
$sqlIndexes = array();
$sqlUpdate = array();
$prefix = _DB_PREFIX_;
$engine = _MYSQL_ENGINE_;
$tables = 
array(
		array('name' => 'ndk_customization_field', 'primary' => 'id_ndk_customization_field',  'cols' =>
			array(
				array('name' =>'id_ndk_customization_field', 'opts' => 'int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT'),
				array('name' =>'products', 'opts' => 'text NOT NULL'),
				array('name' =>'categories', 'opts' => 'text NOT NULL'),
				array('name' =>'type', 'opts' => 'int(1) NOT NULL'),
				array('name' =>'nb_lines', 'opts' => 'int(1) NOT NULL'),
				array('name' =>'maxlength', 'opts' => 'int(10) NOT NULL'),
				array('name' =>'feature', 'opts' => 'int(10) NOT NULL DEFAULT 0'),
				array('name' =>'target', 'opts' => 'int(10) NOT NULL DEFAULT 0'),
				array('name' =>'target_child', 'opts' => 'int(10) NOT NULL DEFAULT 0'),
				array('name' =>'x_axis', 'opts' => 'int(4) unsigned NOT NULL'),
				array('name' =>'y_axis', 'opts' => 'int(4) unsigned NOT NULL'),
				array('name' =>'svg_path', 'opts' => 'varchar(255) NOT NULL'),
				array('name' =>'zone_width', 'opts' => 'int(3) unsigned NOT NULL'),
				array('name' =>'zone_height', 'opts' => 'int(3) unsigned NOT NULL'),
				array('name' =>'id_shop', 'opts' => 'int(10) NOT NULL DEFAULT 0'),
				array('name' =>'position', 'opts' => 'int(10) NOT NULL DEFAULT 0'),
				array('name' =>'ref_position', 'opts' => 'int(10) NOT NULL DEFAULT 0'),
				array('name' =>'required', 'opts' => 'tinyint(4) NOT NULL DEFAULT 0'),
				array('name' =>'recommend', 'opts' => 'tinyint(4) NOT NULL DEFAULT 0'),
				array('name' =>'is_visual', 'opts' => 'tinyint(4) NOT NULL DEFAULT 0'),
				array('name' =>'configurator', 'opts' => 'tinyint(4) NOT NULL DEFAULT 0'),
				array('name' =>'draggable', 'opts' => 'tinyint(4) NOT NULL DEFAULT 0'),
				array('name' =>'resizeable', 'opts' => 'tinyint(4) NOT NULL DEFAULT 0'),
				array('name' =>'rotateable', 'opts' => 'tinyint(4) NOT NULL DEFAULT 0'),
				array('name' =>'orienteable', 'opts' => 'tinyint(4) NOT NULL DEFAULT 0'),
				array('name' =>'price', 'opts' => 'float NOT NULL'),
				array('name' =>'unit', 'opts' => 'varchar(255) NOT NULL'),
				array('name' =>'preserve_ratio', 'opts' => 'tinyint(4) NOT NULL DEFAULT 0'),
				array('name' =>'price_type', 'opts' => 'varchar(255) NOT NULL DEFAULT "amount"'),
				array('name' =>'price_per_caracter', 'opts' => 'float NOT NULL'),
				array('name' =>'validity', 'opts' => 'float NOT NULL'),
				/**add 29/02/16*/
				array('name' =>'zindex', 'opts' => 'int(10) NOT NULL DEFAULT 0'),
				array('name' =>'fonts', 'opts' => 'varchar(2500) NOT NULL'),
				array('name' =>'colors', 'opts' => 'varchar(2500) NOT NULL'),
				array('name' =>'stroke_color', 'opts' => 'tinyint(4) NOT NULL DEFAULT 0'),
				array('name' =>'sizes', 'opts' => 'varchar(2500) NOT NULL'),
				array('name' =>'effects', 'opts' => 'varchar(255) NOT NULL'),
				array('name' =>'alignments', 'opts' => 'varchar(255) NOT NULL'),
				array('name' =>'color_effect', 'opts' => 'varchar(255) NOT NULL DEFAULT "normal"'),
				array('name' =>'influences', 'opts' => 'varchar(255) NOT NULL'),
				array('name' =>'quantity_min', 'opts' => 'int(10) NOT NULL DEFAULT 0'),
				array('name' =>'quantity_max', 'opts' => 'int(10) NOT NULL DEFAULT 0'),
				array('name' =>'weight_min', 'opts' => 'float NOT NULL DEFAULT 0'),
				array('name' =>'weight_max', 'opts' => 'float NOT NULL DEFAULT 0'),
				array('name' =>'open_status', 'opts' => 'tinyint(4) NOT NULL DEFAULT 0'),
				
			)
		),
		array('name' => 'ndk_customization_field_lang', 'index' => array('id_ndk_customization_field', 'id_lang'), 'primary' => '', 'cols' =>
			array(
				array('name' =>'id_ndk_customization_field', 'opts' => 'int(10) NOT NULL'),
				array('name' =>'id_lang', 'opts' => 'int(10) NOT NULL'),
				array('name' =>'name', 'opts' => 'varchar(255) NOT NULL '),
				array('name' =>'admin_name', 'opts' => 'varchar(255) NOT NULL'),
				array('name' =>'notice', 'opts' => 'text NOT NULL'),
				array('name' =>'tooltip', 'opts' => 'text NOT NULL'),
			)
		),
		array('name' => 'ndk_customization_field_value', 'primary' => 'id_ndk_customization_field_value', 'cols' =>
			array(
				array('name' =>'id_ndk_customization_field_value', 'opts' => 'int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT'),
				array('name' =>'id_ndk_customization_field', 'opts' => 'int(10) NOT NULL'),
				array('name' =>'price', 'opts' => 'float NOT NULL'),
				array('name' =>'set_quantity', 'opts' => 'tinyint(4) NOT NULL DEFAULT 0'),
				array('name' =>'quantity', 'opts' => 'int(10) NOT NULL DEFAULT 0'),
				array('name' =>'color', 'opts' => 'varchar(255) NOT NULL'),
				array('name' =>'excludes_products', 'opts' => 'text NOT NULL'),
				/**add 29/02/16*/
				array('name' =>'quantity_min', 'opts' => 'int(10) NOT NULL DEFAULT 0'),
				/**add 29/02/16*/
				array('name' =>'quantity_max', 'opts' => 'int(10) NOT NULL DEFAULT 0'),
				array('name' =>'influences_restrictions', 'opts' => 'varchar(2500) NOT NULL'),
				array('name' =>'influences_obligations', 'opts' => 'varchar(2500) NOT NULL'),
				array('name' =>'position', 'opts' => 'int(10) NOT NULL DEFAULT 0'),
				array('name' =>'default_value', 'opts' => 'tinyint(4) NOT NULL DEFAULT 0'),
				array('name' =>'id_product_value', 'opts' => 'int(10) NOT NULL DEFAULT 0'),
				array('name' =>'step_quantity', 'opts' => 'varchar(255) NOT NULL'),
				array('name' =>'input_type', 'opts' => 'varchar(255) NOT NULL DEFAULT "select"'),
				array('name' =>'reference', 'opts' => 'varchar(255) NOT NULL '),
			)
		),
		array('name' => 'ndk_customization_field_value_lang', 'index' => array('id_ndk_customization_field_value', 'id_lang'), 'primary' => '', 'cols' =>
			array(
				array('name' =>'id_ndk_customization_field_value', 'opts' => 'int(10) NOT NULL'),
				array('name' =>'id_lang', 'opts' => 'int(10) NOT NULL'),
				array('name' =>'value', 'opts' => 'varchar(255) NOT NULL '),
				array('name' =>'tags', 'opts' => 'varchar(255) NOT NULL'),
				array('name' =>'textmask', 'opts' => 'varchar(255) NOT NULL'),
				/**add 29/02/16*/
				array('name' =>'description', 'opts' => 'varchar(2500) NOT NULL')
				
			)
		),
		array('name' => 'ndk_customization_field_shop', 'index' =>array('id_ndk_customization_field', 'id_shop'), 'primary' => '', 'cols' =>
			array(
				array('name' =>'id_ndk_customization_field', 'opts' => 'int(10) NOT NULL'),
				array('name' =>'id_shop', 'opts' => 'int(10) NOT NULL')
			)
		),
		array('name' => 'ndk_customization_field_recipient', 'primary' => 'id_ndk_customization_field_recipient', 'cols' =>
			array(
				array('name' =>'id_ndk_customization_field_recipient', 'opts' => 'int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT'),
				array('name' =>'id_ndk_customization_field', 'opts' => 'int(10) NOT NULL'),
				array('name' =>'id_cart', 'opts' => 'int(10) NOT NULL'),
				array('name' =>'id_product', 'opts' => 'int(10) NOT NULL'),
				array('name' =>'id_combination', 'opts' => 'int(10) NOT NULL'),
				array('name' =>'id_customization', 'opts' => 'int(10) NOT NULL'),
				array('name' =>'id_order', 'opts' => 'int(10) NOT NULL DEFAULT 0'),
				array('name' =>'firstname', 'opts' => 'varchar(255) NOT NULL'),
				array('name' =>'lastname', 'opts' => 'varchar(255) NOT NULL'),
				array('name' =>'email', 'opts' => 'varchar(255) NOT NULL'),
				array('name' =>'message', 'opts' => 'varchar(2500) NOT NULL'),
				array('name' =>'details', 'opts' => 'varchar(2500) NOT NULL'),
				array('name' =>'code', 'opts' => 'varchar(255) NOT NULL'),
				array('name' =>'availability', 'opts' => 'varchar(255) NOT NULL'),
				array('name' =>'title', 'opts' => 'varchar(255) NOT NULL'),
				array('name' =>'date', 'opts' => 'datetime NOT NULL'),
				array('name' =>'send_mail', 'opts' => 'tinyint(4) NOT NULL DEFAULT 0'),
				
			)
		),
		array('name' => 'ndk_customization_field_configuration', 'primary' => 'id_ndk_customization_field_configuration', 'cols' =>
			array(
				array('name' =>'id_ndk_customization_field_configuration', 'opts' => 'int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT'),
				array('name' =>'id_user', 'opts' => 'int(10) NOT NULL DEFAULT 0'),
				array('name' =>'id_lang_default', 'opts' => 'int(10) NOT NULL DEFAULT 0'),
				array('name' =>'id_product', 'opts' => 'int(10) NOT NULL'),
				array('name' =>'id_customization', 'opts' => 'int(10) NOT NULL DEFAULT 0'),
				array('name' =>'is_admin', 'opts' => 'tinyint(4) NOT NULL DEFAULT 0'),
				array('name' =>'default_config', 'opts' => 'tinyint(4) NOT NULL DEFAULT 0'),
				array('name' =>'price', 'opts' => 'float NOT NULL'),
				array('name' =>'json_values', 'opts' => 'text NOT NULL'),
			)
		),
		
		array('name' => 'ndk_customization_field_csv', 'primary' => 'id_ndk_customization_field_csv', 'cols' =>
			array(
				array('name' =>'id_ndk_customization_field_csv', 'opts' => 'int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT'),
				array('name' =>'id_ndk_customization_field', 'opts' => 'int(10) NOT NULL DEFAULT 0'),
				array('name' =>'width', 'opts' => 'varchar(255) NOT NULL'),
				array('name' =>'height', 'opts' => 'varchar(255) NOT NULL DEFAULT 0'),
				array('name' =>'price', 'opts' => 'float NOT NULL DEFAULT 0'),
			)
		),
		
		array('name' => 'ndk_customization_field_configuration_lang', 'index' => array('id_ndk_customization_field_configuration', 'id_lang'), 'primary' => '', 'cols' =>
			array(
				array('name' =>'id_ndk_customization_field_configuration', 'opts' => 'int(10) NOT NULL '),
				array('name' =>'id_lang', 'opts' => 'int(10) NOT NULL'),
				array('name' =>'name', 'opts' => 'varchar(255) NOT NULL'),
				array('name' =>'tags', 'opts' => 'varchar(255) NOT NULL'),
			)
		),
		
		array('name' => 'ndk_customization_field_group', 'primary' => 'id_ndk_customization_field_group', 'cols' =>
			array(
				array('name' =>'id_ndk_customization_field_group', 'opts' => 'int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT'),
				array('name' =>'fields', 'opts' => 'varchar(2500) NOT NULL'),
				array('name' =>'products', 'opts' => 'text NOT NULL'),
				array('name' =>'categories', 'opts' => 'text NOT NULL'),
				array('name' =>'mode', 'opts' => 'int(10) NOT NULL'),
			)
		),
		
		array('name' => 'ndk_customization_field_group_lang', 'index'=>array('id_ndk_customization_field_group', 'id_lang'), 'primary' => '', 'cols' =>
			array(
				array('name' =>'id_ndk_customization_field_group', 'opts' => 'int(10) NOT NULL'),
				array('name' =>'id_lang', 'opts' => 'int(10) NOT NULL'),
				array('name' =>'name', 'opts' => 'varchar(255) NOT NULL'),
			)
		),
		
		array('name' => 'ndk_customization_field_group_shop', 'index' =>array('id_ndk_customization_field_group', 'id_shop'), 'primary' => '', 'cols' =>
			array(
				array('name' =>'id_ndk_customization_field_group', 'opts' => 'int(10) NOT NULL'),
				array('name' =>'id_shop', 'opts' => 'int(10) NOT NULL')
			)
		),
		
		array('name' => 'ndk_customization_field_specific_price', 'primary' => 'id_ndk_customization_field_specific_price', 'cols' =>
			array(
				array('name' =>'id_ndk_customization_field_specific_price', 'opts' => 'int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT'),
				array('name' =>'id_ndk_customization_field', 'opts' => 'int(10) NOT NULL'),
				array('name' =>'id_ndk_customization_field_value', 'opts' => 'int(10) NOT NULL'),
				array('name' =>'reduction', 'opts' => 'float NOT NULL'),
				array('name' =>'reduction_type', 'opts' => 'varchar(255) NOT NULL'),
				array('name' =>'from_quantity', 'opts' => 'int(10) NOT NULL'),
			)
		),
		
		array('name' => 'ndk_customization_field_cache', 'primary' => 'id_cache', 'cols' =>
			array(
				array('name' =>'id_cache', 'opts' => 'int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT'),
				array('name' =>'key_cache', 'opts' => 'varchar(255) NOT NULL'),
				array('name' =>'content', 'opts' => 'LONGTEXT NOT NULL'),
				array('name' =>'expire', 'opts' => 'int(10) NOT NULL'),
			)
		),
		
);

foreach($tables as $table)
{
	
	$sql[$table['name']] = 'CREATE TABLE IF NOT EXISTS '.$prefix.$table['name'].' ( remove_me_after float NOT NULL';
	$sql[$table['name']] .= ' )  ENGINE='.$engine;
	
	foreach($table['cols'] as $col)
	{
	 if($table['name'] == 'ndk_customization_field_configuration_lang')
	 	$sqlIndexes[] ='ALTER TABLE '.$prefix.$table['name'].' CHANGE `id_ndk_customization_field_configuration` `id_ndk_customization_field_configuration` INT(10) NOT NULL';
	 
	 if($table['name'] == 'ndk_customization_field_group_lang')
	 	$sqlIndexes[] ='ALTER TABLE '.$prefix.$table['name'].' CHANGE `id_ndk_customization_field_group` `id_ndk_customization_field_group` INT(10) NOT NULL';
	 	
	 	
	 //check if col exists
	 $sqlCheck = 'SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS 
	 WHERE table_name = "'.$prefix.$table['name'].'" 
	 AND table_schema = "'._DB_NAME_.'" 
	 AND column_name = "'.$col['name'].'" ';
	 
	 $check = Db::getInstance()->executeS($sqlCheck);
	 
	 if(sizeof($check) == 0)
	 	$sql[]= "ALTER TABLE `".$prefix.$table['name']."` ADD  `".$col["name"]."` ".$col["opts"];
	 }
	 
	 //on enlève la premiere colonne
	 //check if col exists
	 $sqlCheckRemove = 'SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS 
	 WHERE table_name = "'.$prefix.$table['name'].'" 
	 AND table_schema = "'._DB_NAME_.'" 
	 AND column_name = "remove_me_after" ';
	 
	 $checkRemove = Db::getInstance()->executeS($sqlCheckRemove);
	 
	 if(sizeof($checkRemove) > 0)
	 $sql[]= "ALTER TABLE ".$prefix.$table['name']." DROP COLUMN remove_me_after";
	 	 
}


foreach ($sql as $query)
	if (Db::getInstance()->execute($query) == false)
		return false;


foreach ($tables as $table)
{
	//INDEXES
	 if($table['name'] == 'ndk_customization_field_shop')
	 {
	 	//ndkSqlInstall::debugDuplicateNdk($table);
	 }
	 
	 	
	 if(isset($table['index']))
	 {
		 if(sizeof($table['index']) > 0)
		 {
		 	$chekIndex = Db::getInstance()->executeS('SHOW INDEX FROM '.$prefix.$table['name']);
		 	if(sizeof($chekIndex) > 0)
		 		$sqlIndexes[] = 'ALTER TABLE '.$prefix.$table['name'].' DROP PRIMARY KEY';
		 	
		 	$sqlIndexes[] = 'ALTER TABLE '.$prefix.$table['name'].' ADD PRIMARY KEY '.implode('_', $table['index']).' ('.implode(',', $table['index']).')';
		 	
		 }
	}
}


foreach ($sqlIndexes as $query)
	if (Db::getInstance()->execute($query) == false)
		return false;



Db::getInstance()->execute('ALTER TABLE `'.$prefix.'customized_data` CHANGE `value` `value` VARCHAR(2500)');

$shop_query = 'SELECT id_ndk_customization_field FROM '.$prefix.'ndk_customization_field_shop';
$result = Db::getInstance()->executeS($shop_query);
if(count($result) == 0)
	Db::getInstance()->execute('INSERT IGNORE INTO '.$prefix.'ndk_customization_field_shop (id_ndk_customization_field, id_shop) SELECT id_ndk_customization_field, '.(int)Configuration::get('PS_SHOP_DEFAULT').'  FROM '.$prefix.'ndk_customization_field' );

Configuration::updateValue('NDK_ADD_PRODUCT_PRICE', '1');







?>