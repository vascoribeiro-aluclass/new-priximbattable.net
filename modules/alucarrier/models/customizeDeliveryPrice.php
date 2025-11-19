<?php


class CustomizeDeliveryPrice extends ObjectModel
{

	public $price;
  public $num;
  public $show_price;
  public $id_customize_delivery;

	public static $definition = array(
		'table' => 'customize_delivery_price',
		'primary' => 'id',
		'multilang' => false,
		'fields' => array(
					'price' => 	array('type' => self::TYPE_FLOAT,  'required' => true),
          'num' => 	array('type' => self::TYPE_INT,  'required' => true),
          'show_price' => 	array('type' => self::TYPE_INT,  'required' => true),
          'id_customize_delivery' => 	array('type' => self::TYPE_INT,  'required' => true),
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
	   $config = new CustomizeDeliveryPrice((int)$id_customize_delivery);

	}


}
?>
