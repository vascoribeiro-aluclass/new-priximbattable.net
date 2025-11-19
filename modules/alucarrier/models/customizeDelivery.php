<?php


class CustomizeDelivery extends ObjectModel
{

	public $code;
  public $qty;
  public $accumulate;
  public $extra;

	public static $definition = array(
		'table' => 'customize_delivery',
		'primary' => 'id',
		'multilang' => false,
		'fields' => array(
					'code' => 	array('type' => self::TYPE_STRING,  'required' => true),
          'qty' => 	array('type' => self::TYPE_INT,  'required' => true),
          'accumulate' => 	array('type' => self::TYPE_INT,  'required' => true),
          'extra' => 	array('type' => self::TYPE_INT,  'required' => true),
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
	   $config = new CustomizeDelivery((int)$id_customize_delivery);

	}


}
?>
