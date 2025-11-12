<?php
/**
 *  Tous droits réservés NDKDESIGN
 *
 *  @author    Hendrik Masson <postmaster@ndk-design.fr>
 *  @copyright Copyright 2013 - 2014 Hendrik Masson
 *  @license   Tous droits réservés
*/

include(dirname(__FILE__).'/../../config/config.inc.php');
include(dirname(__FILE__).'/../../init.php');
require_once _PS_MODULE_DIR_.'ndk_advanced_custom_fields/models/ndkCfConfig.php';

if((int)Configuration::get('NDK_ORDERED_DELAY') == 0)
	Configuration::updateValue('NDK_ORDERED_DELAY', '60');

if((int)Configuration::get('NDK_UNORDERED_DELAY') == 0)
	Configuration::updateValue('NDK_UNORDERED_DELAY', '4');

	// $sql_unordered = "SELECT p.id_product FROM "._DB_PREFIX_."product p
	// WHERE p.reference LIKE '%custom-%'
	// AND p.supplier_reference = 'myndkcustomprod'
	// AND p.id_product NOT IN( SELECT product_id FROM "._DB_PREFIX_."order_detail)
	// AND p.date_add < DATE_SUB(DATE(NOW()), INTERVAL ".(int)Configuration::get('NDK_UNORDERED_DELAY')." DAY)";

  $sql_unordered = "SELECT p.id_product FROM "._DB_PREFIX_."product p
	WHERE p.id_category_default = ".(int)Configuration::get('NDK_ACF_CAT')."
	AND p.id_product NOT IN( SELECT product_id FROM "._DB_PREFIX_."order_detail)
	AND p.date_add < DATE_SUB(DATE(NOW()), INTERVAL ".(int)Configuration::get('NDK_UNORDERED_DELAY')." DAY)";

	// $sql_ordered = "SELECT p.id_product FROM "._DB_PREFIX_."product p
	// WHERE p.reference LIKE '%custom-%'
	// AND p.supplier_reference = 'myndkcustomprod'
	// AND p.date_add < DATE_SUB(DATE(NOW()), INTERVAL ".(int)Configuration::get('NDK_ORDERED_DELAY')." DAY) ORDER BY p.id_product DESC";

  $sql_ordered = "SELECT p.id_product FROM "._DB_PREFIX_."product p
	WHERE p.id_category_default = ".(int)Configuration::get('NDK_ACF_CAT')."
	AND p.date_add < DATE_SUB(DATE(NOW()), INTERVAL ".(int)Configuration::get('NDK_ORDERED_DELAY')." DAY) ORDER BY p.id_product DESC";

	$products_unordered = Db::getInstance()->executeS($sql_unordered);
	$products_ordered = Db::getInstance()->executeS($sql_ordered);
	$full_products = array_merge($products_unordered, $products_ordered);

	// echo "<pre>";
  // var_dump((int)Configuration::get('NDK_ACF_CAT'));
  // var_dump((int)Configuration::get('NDK_ORDERED_DELAY'));
	// var_dump($sql_unordered);
	// var_dump($sql_ordered);
	// var_dump($full_products);
  // echo count($products_unordered)."<br />";
  // echo count($products_ordered)."<br />";
  // echo count($full_products);
  // echo "</pre>";

	foreach($full_products as $product)
	{
		$tempProd = new Product($product['id_product']);
    // echo "<pre>";
    // var_dump($tempProd);
    // var_dump($tempProd->id);
    // var_dump($tempProd->supplier_reference);
    // echo $tempProd."<br />";
    // echo $tempProd->supplier_reference."<br />";
    // echo "</pre>";
		// if($tempProd->supplier_reference == 'myndkcustomprod') {
		if($tempProd->supplier_reference == 'myndkcustomprod' || $tempProd->supplier_reference == '') {
			$pack_infos = Db::getInstance()->executeS("SELECT * FROM "._DB_PREFIX_."pack WHERE id_product_pack=".(int)$product['id_product']);
      // echo "<pre>";
      // echo "SELECT * FROM "._DB_PREFIX_."pack WHERE id_product_pack=".(int)$product['id_product']."<br />";
      // echo $tempProd->delete()."<br />";
      // var_dump($pack_infos);
      // echo "</pre>";
			$tempProd->delete();
			foreach($pack_infos as $pack_info)
			{
        // echo "<pre>";
        // var_dump($pack_info);
        // echo "</pre>";
				Db::getInstance()->execute(
				"INSERT INTO "._DB_PREFIX_."pack
				(id_product_pack, id_product_item, id_product_attribute_item, quantity)
				VALUES (".(int)$pack_info['id_product_pack'].",". (int)$pack_info['id_product_item'].",".(int)$pack_info['id_product_attribute_item'].",".(int)$pack_info['quantity'].")");
			}
			$sqlc = "SELECT c.id_customization FROM "._DB_PREFIX_."customization c
			WHERE c.id_product = ".(int)$product['id_product'];
      // echo "<pre>";
      // echo $sqlc."<br />";
      // echo Db::getInstance()->executeS($sqlc)."<br />";
      // echo "</pre>";

			$customisation = new Customization((int)Db::getInstance()->getRow($sqlc));
      // echo "<pre>";
      // echo $customisation."<br />";
      // echo Db::getInstance()->executeS($sqlc)."<br />";
      // echo "</pre>";
			$search = Db::getInstance()->executeS(
				'SELECT fc.id_ndk_customization_field_configuration as id FROM '._DB_PREFIX_.'ndk_customization_field_configuration fc WHERE fc.id_customization = '.(int)Db::getInstance()->getRow($sqlc)
			);
      // echo "<pre>";
      // echo 'SELECT fc.id_ndk_customization_field_configuration as id FROM '._DB_PREFIX_.'ndk_customization_field_configuration fc WHERE fc.id_customization = '.(int)Db::getInstance()->getRow($sqlc)."<br />";
      // // echo $search."<br />";
      // echo "</pre>";
			if (sizeof($search) > 0)
			{
				//print(Tools::jsonEncode($search[0]['name']));
				$config = new ndkCfConfig((int)$search[0]['id']);
				if (Validate::isLoadedObject($config))
				$config->delete();
			}
			$customisation->delete();
		}
	}
 ?>
