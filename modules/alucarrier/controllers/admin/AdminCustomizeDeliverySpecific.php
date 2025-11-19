<?php

class AdminCustomizeDeliverySpecificController extends ModuleAdminController
{
  public $bootstrap = true;

  public function __construct()
  {
    $this->bootstrap = true; // use Bootstrap CSS
    $this->table = 'customize_delivery_specific'; // SQL table name, will be prefixed with _DB_PREFIX_
    $this->className = 'CustomizeDeliverySpecific'; // PHP class name
    $this->lang = false;
    $this->explicitSelect = true;
    $this->allow_export = true;
    $this->_defaultOrderBy = 'id'; // the table alias is always `a`

    $this->identifier = 'id'; // SQL column to be used as primary key

    parent::__construct();
    $this->bulk_actions = array(
      'delete' => array(
        'text' => $this->l('Delete selected'),
        'icon' => 'icon-trash',
        'confirm' => $this->l('Delete selected items?')
      )
    );

    $this->_select = "CONCAT('#',a.`id_customize_delivery`,' - ', cdl.name )   as delivery_name, a.id_product, a.`id_customize_delivery`, CONCAT('#',a.`id_product`,' - ', pl.name ) as product_name, CONCAT ( '#ID', cdr.id, ' - RULES : ',  cdr.rules, ' ( VALUE : ', cdr.value,' - PRIORITY : ', cdr.priority, ' )') as rules_name, a.id ";
    $this->_join = "INNER JOIN `" . _DB_PREFIX_ . "customize_delivery_lang` cdl on  a.`id_customize_delivery` = cdl.`id_customize_delivery` and cdl.id_lang = " . (int)$this->context->language->id;
    $this->_join .= " INNER JOIN `" . _DB_PREFIX_ . "product_lang` pl on  a.`id_product` = pl.`id_product` and pl.id_lang = " . (int)$this->context->language->id;
    $this->_join .= " INNER JOIN `" . _DB_PREFIX_ . "customize_delivery_rules` cdr on  a.`id_customize_delivery_rules` = cdr.`id` ";

    $this->fields_list = array(
      'delivery_name' => array(
        'title' => $this->l('Name Delivery'),
          'havingFilter' => true,
      ),
      'product_name' => array(
        'title' => $this->l('Name Product'),
          'havingFilter' => true,
      ),
      'rules_name' => array(
        'title' => $this->l('Rules'),
      ),
      'field' => array(
        'title' => $this->l('Field'),
      ),
    );

    parent::__construct();
  }

  public function renderList()
  {

    if (Tools::getIsset($this->_filter) && trim($this->_filter) == '')
      $this->_filter = $this->original_filter;

    $this->addRowAction('edit');
    $this->addRowAction('delete');

    return parent::renderList();
  }

  public function init()
  {
    CustomizeDeliverySpecific::setDefaultConfig((int)Tools::getValue('id'));
    parent::init();
  }

  public function renderForm()
  {
    $obj = $this->loadObject(true);
    $id_shop = Context::getContext()->shop->id;
    $this->initFieldsForm();
    if (!($obj = $this->loadObject(true)))
      return;

    return parent::renderForm();
  }

  public function initFieldsForm()
  {
    $rules_array = Db::getInstance(_PS_USE_SQL_SLAVE_)->ExecuteS('
    SELECT cdr.id,  CONCAT ( \'#ID\', cdr.id, \' - RULES : \',  cdr.rules, \' ( VALUE : \', cdr.value,\' - PRIORITY : \', cdr.priority, \' )\') as rules_name
    FROM `' . _DB_PREFIX_ . 'customize_delivery_rules` cdr
    ORDER BY cdr.id ASC');

    $empty_refp = array('id' => 0, 'rules_name' => '--');
    array_push($rules_array, $empty_refp);

    $delivery_array = Db::getInstance(_PS_USE_SQL_SLAVE_)->ExecuteS('
        SELECT cdl.id_customize_delivery, CONCAT(\'#\',cdl.id_customize_delivery,\' - \', cdl.name ) as delivery_name
        FROM `' . _DB_PREFIX_ . 'customize_delivery_lang` cdl
        where cdl.`id_lang` = ' . (int)$this->context->language->id . '
        ORDER BY cdl.name ASC');

    $empty_refp = array('id_customize_delivery' => 0, 'delivery_name' => '--');
    array_push($delivery_array, $empty_refp);

    $products_array = Db::getInstance(_PS_USE_SQL_SLAVE_)->ExecuteS('
        SELECT p.id_product, CONCAT ( \'#\', p.id_product, \' - \',  pl.name, \' (ref:\', p.reference, \')\') AS product_name
        FROM `' . _DB_PREFIX_ . 'product` p
        INNER JOIN `' . _DB_PREFIX_ . 'product_lang` pl ON (p.`id_product` = pl.`id_product` AND pl.`id_lang` = ' . (int)$this->context->language->id . ')
        where p.`id_category_default` != 102
        ORDER BY pl.name ASC');

    $empty_refp = array('id_product' => 0, 'product_name' => '--');
    array_push($products_array, $empty_refp);

    $obj = $this->loadObject(true);

    $fields_form = array(
      'legend' => array(
        'title' => $this->l('Specific Deliviry'),
      ),
      'submit' => array(
        'title' => $this->l('Save'),
      ),
      'input' => array(
        array(
          'type' => 'select',
          'label' => $this->l('Product'),
          'name' => 'id_product',
          'class' => 'chosen',
          'options' => array(
            'query' => $products_array,
            'id' => 'id_product',
            'name' => 'product_name'
          ),
        ),

        array(
          'type' => 'select',
          'label' => $this->l('Delivery'),
          'name' => 'id_customize_delivery',
          'class' => 'chosen',
          'options' => array(
            'query' => $delivery_array,
            'id' => 'id_customize_delivery',
            'name' => 'delivery_name'
          ),
        ),
        array(
          'type' => 'select',
          'label' => $this->l('Rules'),
          'name' => 'id_customize_delivery_rules',
          'class' => 'chosen',
          'options' => array(
            'query' => $rules_array,
            'id' => 'id',
            'name' => 'rules_name'
          ),
        ),
        array(
          'type' => 'text',
          'label' => $this->l('Field :'),
          'name' => 'field'
        ),

      ),
    );
    $this->fields_form = $fields_form;
  }


  public function processSave()
  {
    if ($this->display == 'add' || $this->display == 'edit')
      $this->identifier = 'customize_delivery_specific';

    if (!$this->id_object)
      return $this->processAdd();
    else
      return $this->processUpdate();
  }
}
