<?php

class AdminCustomizeDeliveryRulesController extends ModuleAdminController
{
  public $bootstrap = true;

  public function __construct()
  {
    $this->bootstrap = true; // use Bootstrap CSS
    $this->table = 'customize_delivery_rules'; // SQL table name, will be prefixed with _DB_PREFIX_
    $this->className = 'CustomizeDeliveryRules'; // PHP class name
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

    $this->fields_list = array(
      'id' => array(
        'title' => $this->l('ID'),
        'align' => 'center',
        'width' => 50
      ),
      'rules' => array(
        'title' => $this->l('Rules'),

      ),
      'value' => array(
        'title' => $this->l('Value'),

      ),
      'priority' => array(
        'title' => $this->l('Priority'),
        'width' => 50
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
    CustomizeDeliveryRules::setDefaultConfig((int)Tools::getValue('id'));
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
    $obj = $this->loadObject(true);

    $fields_form = array(
      'legend' => array(
        'title' => $this->l('Rules Customization'),
      ),
      'submit' => array(
        'title' => $this->l('Save'),
      ),
      'input' => array(
        array(
          'type' => 'text',
          'label' => $this->l('Rules :'),
          'name' => 'rules'
        ),
        array(
          'type' => 'text',
          'label' => $this->l('Value :'),
          'name' => 'value'
        ),
        array(
          'type' => 'text',
          'label' => $this->l('Priority :'),
          'name' => 'priority'
        ),
      ),


    );
    $this->fields_form = $fields_form;
  }


  public function processSave()
  {
    if ($this->display == 'add' || $this->display == 'edit')
      $this->identifier = 'customize_delivery_rules';

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
      WHERE `id_customize_delivery_rules` = ' . (int)$id);

    return parent::processDelete();
  }
}
