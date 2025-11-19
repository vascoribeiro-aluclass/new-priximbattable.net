<?php

class AdminCustomizeDeliveryProductController extends ModuleAdminController
{
  public $bootstrap = true;

  public function __construct()
  {
    $this->bootstrap = true; // use Bootstrap CSS
    $this->table = 'customize_delivery_product'; // SQL table name, will be prefixed with _DB_PREFIX_
    $this->className = 'CustomizeDeliveryProduct'; // PHP class name
    $this->lang = false;
    $this->explicitSelect = true;
    $this->allow_export = true;
    $this->_defaultOrderBy = 'id_product'; // the table alias is always `a`

    $this->identifier = 'id'; // SQL column to be used as primary key

    parent::__construct();
    $this->bulk_actions = array(
      'delete' => array(
        'text' => $this->l('Delete selected'),
        'icon' => 'icon-trash',
        'confirm' => $this->l('Delete selected items?')
      )
    );

    $this->_select = "a.id, CONCAT('#',a.`id_customize_delivery`,' - ', cdl.name ) as delivery_name, a.id_product, a.`id_customize_delivery`, CONCAT('#',a.`id_product`,' - ', pl.name ) as product_name ";
    $this->_join = "INNER JOIN `" . _DB_PREFIX_ . "customize_delivery_lang` cdl on  a.`id_customize_delivery` = cdl.`id_customize_delivery` and cdl.id_lang = " . (int)$this->context->language->id;
    $this->_join .= " INNER JOIN `" . _DB_PREFIX_ . "product_lang` pl on  a.`id_product` = pl.`id_product` and pl.id_lang = " . (int)$this->context->language->id;

    $this->fields_list = array(
            'id' => array(
        'title' => $this->l('ID'),
        'align' => 'center',
        'width' => 25
      ),
      'delivery_name' => array(
        'title' => $this->l('Name Delivery'),
        'havingFilter' => true,
      ),
      'product_name' => array(
        'title' => $this->l('Name Product'),
        'havingFilter' => true,
      ),
      'free_shipping' => array(
        'title' => $this->l('Free Shipping'),
        'type' => 'bool', // Exibe como checkbox na tabela
        'align' => 'center',
        'active' => 'status'
      ),
      'half_free_shipping' => array(
        'title' => $this->l('Half Free Shipping'),
        'type' => 'bool', // Exibe como checkbox na tabela
        'align' => 'center',
        'active' => 'status'
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
    CustomizeDeliveryProduct::setDefaultConfig((int)Tools::getValue('id_product'));
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

    $delivery_array = Db::getInstance(_PS_USE_SQL_SLAVE_)->ExecuteS('
        SELECT cdl.id_customize_delivery, CONCAT(\'#\',cdl.id_customize_delivery,\' - \', cdl.name )  as delivery_name
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
        'title' => $this->l('Price Deliviry'),
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
          'type' => 'switch',
          'label' => $this->l('Free Shipping :'),
          'name' => 'free_shipping',
          'is_bool' => false,
          'values' => array(
            array(
              'id' => 'enable_on',
              'value' => 1,
              'label' => $this->l('Yes')
            ),
            array(
              'id' => 'enable_off',
              'value' => 0,
              'label' => $this->l('No')
            )
          ),
        ),
        array(
          'type' => 'switch',
          'label' => $this->l('Half Free Shipping :'),
          'name' => 'half_free_shipping',
          'is_bool' => false,
          'values' => array(
            array(
              'id' => 'enable_on',
              'value' => 1,
              'label' => $this->l('Yes')
            ),
            array(
              'id' => 'enable_off',
              'value' => 0,
              'label' => $this->l('No')
            )
          ),
        ),
      ),
    );
    $this->fields_form = $fields_form;
  }


  public function processSave()
  {
    if ($this->display == 'add' || $this->display == 'edit')
      $this->identifier = 'customize_delivery_product';

    if (!$this->id_object)
      return $this->processAdd();
    else
      return $this->processUpdate();
  }

  public function processDelete()
  {
    $id = (int)Tools::getValue($this->identifier);

    if (!$id) {
      $this->errors[] = $this->l('Missing ID.');
      return false;
    }

    Db::getInstance()->execute('
      DELETE FROM `' . _DB_PREFIX_ . 'customize_delivery_specific`
      WHERE `id_product` = ' . (int)$id);

    return parent::processDelete();
  }
}
