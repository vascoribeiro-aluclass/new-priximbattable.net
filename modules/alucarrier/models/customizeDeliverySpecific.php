<?php


class CustomizeDeliverySpecific extends ObjectModel
{

	public $id_product;
  public $id_customize_delivery;
  public $id_customize_delivery_rules;
  public $field;

	public static $definition = array(
		'table' => 'customize_delivery_specific',
		'primary' => 'id',
		'multilang' => false,
		'fields' => array(
      'id_product' => 	array('type' => self::TYPE_INT,  'required' => true),
      'id_customize_delivery' => 	array('type' => self::TYPE_INT,  'required' => true),
      'id_customize_delivery_rules' => 	array('type' => self::TYPE_INT,  'required' => true),
      'field' => 	array('type' => self::TYPE_STRING,  'required' => true),

		),
	);


	public function __construct($id = null)
	{
	    parent::__construct($id);
	}

	public function delete()
	{

		return parent::delete();
	}


	public static function setDefaultConfig($id_customize_delivery)
	{
	   $config = new CustomizeDeliverySpecific((int)$id_customize_delivery);

	}


}
?>
