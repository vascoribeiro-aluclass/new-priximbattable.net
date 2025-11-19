<?php

class AdminCustomizeDeliveryPriceController extends ModuleAdminController
{
  public $bootstrap = true;

  public function __construct()
  {
    $this->bootstrap = true; // use Bootstrap CSS
    $this->table = 'customize_delivery_price'; // SQL table name, will be prefixed with _DB_PREFIX_
    $this->className = 'CustomizeDeliveryPrice'; // PHP class name
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

    $this->_select = "CONCAT('#',a.`id_customize_delivery`,' - ', cdl.name ) as name , a.id, a.`id_customize_delivery` ";
    $this->_join = "INNER JOIN `" . _DB_PREFIX_ . "customize_delivery_lang` cdl on  a.`id_customize_delivery` = cdl.`id_customize_delivery` and cdl.id_lang = " . (int)$this->context->language->id;



    $this->fields_list = array(
      'id' => array(
        'title' => $this->l('ID'),
        'align' => 'center',
        'width' => 25
      ),
      'name' => array(
        'title' => $this->l('Name Delivery'),
      'havingFilter' => true,
      ),
      'price' => array(
        'title' => $this->l('Price'),
      ),
      'num' => array(
        'title' => $this->l('Number'),
      ),
      'show_price' => array(
        'title' => $this->l('Show price'),
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
    CustomizeDeliveryPrice::setDefaultConfig((int)Tools::getValue('id'));
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

    $delivery_array = Db::getInstance(_PS_USE_SQL_SLAVE_)->ExecuteS("
        SELECT cdl.id_customize_delivery, CONCAT('#',cdl.id_customize_delivery,' - ', cdl.name ) as name
        FROM `" . _DB_PREFIX_ . "customize_delivery_lang` cdl
        where cdl.`id_lang` = " . (int)$this->context->language->id . "
        ORDER BY cdl.name ASC");

    $empty_refp = array('id_customize_delivery' => 0, 'name' => '--');
    array_push($delivery_array, $empty_refp);

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
          'label' => $this->l('Delivery'),
          'name' => 'id_customize_delivery',
          'class' => 'chosen',
          'options' => array(
            'query' => $delivery_array,
            'id' => 'id_customize_delivery',
            'name' => 'name'
          ),
        ),

        array(
          'type' => 'text',
          'label' => $this->l('Price :'),
          'name' => 'price'
        ),
        array(
          'type' => 'text',
          'label' => $this->l('Number :'),
          'name' => 'num'
        ),
        array(
          'type' => 'switch',
          'label' => $this->l('Show price :'),
          'name' => 'show_price',
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
      $this->identifier = 'customize_delivery_price';

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


    return parent::processDelete();
  }
}
