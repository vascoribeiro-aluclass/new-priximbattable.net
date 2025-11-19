<?php


class CustomizeDeliveryProduct extends ObjectModel
{

	public $id_product;
  public $id_customize_delivery;
  public $half_free_shipping;
  public $free_shipping;

	public static $definition = array(
		'table' => 'customize_delivery_product',
		'primary' => 'id',
		'multilang' => false,
		'fields' => array(
					'id_product' => 	array('type' => self::TYPE_INT,  'required' => true),
          'id_customize_delivery' => 	array('type' => self::TYPE_INT,  'required' => true),
          'free_shipping' => 	array('type' => self::TYPE_INT,  'required' => true),
          'half_free_shipping' => 	array('type' => self::TYPE_INT,  'required' => true),

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


	public static function setDefaultConfig($id_customize_delivery_product)
	{
	   $config = new CustomizeDeliveryProduct((int)$id_customize_delivery_product);

	}


}
?>
