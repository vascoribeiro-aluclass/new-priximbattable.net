<?php
/**
 *  Tous droits réservés NDKDESIGN
 *
 *  @author    Hendrik Masson <postmaster@ndk-design.fr>
 *  @copyright Copyright 2013 - 2017 Hendrik Masson
 *  @license   Tous droits réservés
*/

class NdkCfSpecificPrice extends ObjectModel 
{
	
	public $id_ndk_customization_field_specific_price;
	public $id_ndk_customization_field;
	public $id_ndk_customization_field_value;
	public $reduction;
	public $reduction_type;
	public $from_quantity;
	
	
		
	public static $definition = array(
		'table' => 'ndk_customization_field_specific_price',
		'primary' => 'id_ndk_customization_field_specific_price',
		'fields' => array(
			'id_ndk_customization_field' => array('type' => self::TYPE_INT, 'required' => false),
			'id_ndk_customization_field_value' =>	array('type' => self::TYPE_INT, 'required' => false),
			'reduction' => array('type' => self::TYPE_FLOAT, 'validate' => 'isPrice', 'required' => false),
			'reduction_type' => array('type' => self::TYPE_STRING, 'validate' => 'isGenericName'),
			'from_quantity' =>	array('type' => self::TYPE_INT, 'required' => false),
		)
	);


	public static function getSpecificPrices($id_field, $id_value = 0, $quantity = 0)
	{
			$where_qtty = ' ORDER BY sp.from_quantity ';
			if((int)$quantity > 0)
				$where_qtty = ' AND sp.`from_quantity` <= '.(int)$quantity.' ORDER BY sp.from_quantity desc';
			
			$sql = '
				SELECT *
				FROM `'._DB_PREFIX_.'ndk_customization_field_specific_price` sp
				WHERE sp.`id_ndk_customization_field` = '.(int)$id_field. ($id_value > 0 ? ' AND sp.`id_ndk_customization_field_value` = '.(int)$id_value : '').
				$where_qtty;
			$result = Db::getInstance()->executeS($sql);
			
			if(sizeof($result) > 0)
				return $result;
			else return false;
			
			
	}
}
?>