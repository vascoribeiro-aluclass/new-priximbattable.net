<?php


class CustomizeDeliveryRules extends ObjectModel
{

	public $rules;
  public $value;
  public $priority;

	public static $definition = array(
		'table' => 'customize_delivery_rules',
		'primary' => 'id',
		'multilang' => false,
		'fields' => array(
					'rules' => 	array('type' => self::TYPE_STRING,  'required' => true),
          'value' => 	array('type' => self::TYPE_INT,  'required' => true),
          'priority' => 	array('type' => self::TYPE_INT,  'required' => true),
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
	   $config = new CustomizeDeliveryRules((int)$id_customize_delivery);

	}


}
?>
