<?php


class DiscountCategory extends ObjectModel
{

  public $name;
  public $id_shop;
  public $id_currency;
  public $id_country;
  public $id_group;
  public $id_category;
  public $from_quantity;
  public $price;
  public $reduction;
  public $reduction_tax;
  public $reduction_type;
  public $from;
  public $to;

  public static $definition = array(
    'table' => 'specific_price_rule_customize',
    'primary' => 'id_specific_price_rule',
    'multilang' => false,
    'fields' => array(
      'name' =>   array('type' => self::TYPE_STRING,  'required' => true),
      'id_shop' =>   array('type' => self::TYPE_INT,  'required' => true),
      'id_currency' =>   array('type' => self::TYPE_INT,  'required' => true),
      'id_country' =>   array('type' => self::TYPE_INT,  'required' => true),
      'id_group' =>   array('type' => self::TYPE_INT,  'required' => true),
      'id_category' =>   array('type' => self::TYPE_INT,  'required' => true),
      'from_quantity' =>   array('type' => self::TYPE_INT,  'required' => true),
      'price' =>   array('type' => self::TYPE_INT,  'required' => true),
      'reduction' =>   array('type' => self::TYPE_INT,  'required' => true),
      'reduction_tax' =>   array('type' => self::TYPE_INT,  'required' => true),
      'reduction_type' =>   array('type' => self::TYPE_INT,  'required' => true),
      'from' =>   array('type' => self::TYPE_INT,  'required' => true),
      'to' =>   array('type' => self::TYPE_INT,  'required' => true),
    ),
  );


  public function __construct($id = null)
  {
    parent::__construct($id);
  }

  public function delete()
  {

    Db::getInstance()->delete(
      'specific_price_customize',
      'id_specific_price_rule = ' . (int) Tools::getValue('id_specific_price_rule')
    );

    return  Db::getInstance()->delete(
      'specific_price_rule_customize',
      'id_specific_price_rule = ' . (int) Tools::getValue('id_specific_price_rule')
    );
  }


  public static function setDefaultConfig($id_specific_price_rule)
  {
    $config = new DiscountCategory((int)$id_specific_price_rule);
  }
}
