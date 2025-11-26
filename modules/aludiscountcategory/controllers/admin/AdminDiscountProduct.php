<?php

class AdminDiscountProductController extends ModuleAdminController
{
  public $bootstrap = true;

  public function __construct()
  {
    $this->bootstrap = true; // use Bootstrap CSS
    $this->table = 'specific_price_rule_customize_product'; // SQL table name, will be prefixed with _DB_PREFIX_
    $this->className = 'DiscountProduct'; // PHP class name
    $this->lang = false;
    $this->explicitSelect = true;
    $this->allow_export = true;
    $this->_defaultOrderBy = 'id_specific_price_rule'; // the table alias is always `a`

    $this->identifier = 'id_specific_price_rule'; // SQL column to be used as primary key

    parent::__construct();
    $this->bulk_actions = array(
      'delete' => array(
        'text' => $this->l('Delete selected'),
        'icon' => 'icon-trash',
        'confirm' => $this->l('Delete selected items?')
      )
    );

    $this->_select = "CONCAT ( '#', c.`id_product`, ' - ',  cl.name) AS product_name , a.name ";
    $this->_join = "INNER JOIN `" . _DB_PREFIX_ . "product` c on  c.`id_product` = a.`id_product`  ";
    $this->_join .= " INNER JOIN `" . _DB_PREFIX_ . "product_lang` cl on  c.`id_product` = cl.`id_product` and cl.id_lang = " . (int)$this->context->language->id;


    $this->fields_list = array(
      'id_specific_price_rule' => array(
        'title' => $this->l('ID'),
        'align' => 'center',
        'width' => 25
      ),
      'name' => array(
        'title' => $this->l('name'),
      ),
      'product_name' => array(
        'title' => $this->l('product'),
        'havingFilter' => true,
      ),
      'reduction' => array(
        'title' => $this->l('reduction'),
      ),
      'from' => array(
        'title' => $this->l('from'),
      ),
      'to' => array(
        'title' => $this->l('to'),
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
    DiscountProduct::setDefaultConfig((int)Tools::getValue('id_specific_price_rule'));
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

      $product_array = Db::getInstance(_PS_USE_SQL_SLAVE_)->ExecuteS('
    SELECT pl.`id_product`, CONCAT ( \'#\', p.id_product, \' - \',  pl.name) AS name_product
    FROM `'._DB_PREFIX_.'product_lang` pl
    INNER JOIN `'._DB_PREFIX_.'product` p on pl.`id_product` = p.`id_product`
    where pl.`id_lang`= '.(int)$this->context->language->id.' and p.active = 1 and p.id_category_default != 102  and  p.id_category_default > 0
    ORDER BY pl.name ASC');

    $empty_refc = array('id_product' => 0, 'name_product' => '--');
    array_push($product_array, $empty_refc);

    $fields_form = array(
      'legend' => array(
        'title' => $this->l('Discount Product'),
      ),
      'submit' => array(
        'title' => $this->l('Save'),
      ),
      'input' => array(
        array(
          'type' => 'text',
          'label' => $this->l('Name :'),
          'name' => 'name'
        ),
        array(
          'type' => 'select',
          'label' => $this->l('Product '),
          'name' => 'id_product',
          'class' => 'chosen',
          'options' => array(
            'query' => $product_array,
            'id' => 'id_product',
            'name' => 'name_product'
            ),
        ),
        array(
          'type' => 'text',
          'label' => $this->l('Reduction :'),
          'name' => 'reduction'
        ),
        array(
          'type' => 'datetime',
          'label' => $this->l('From :'),
          'name' => 'from'
        ),
        array(
          'type' => 'datetime',
          'label' => $this->l('To :'),
          'name' => 'to'
        ),
      ),
    );
    $this->fields_form = $fields_form;
  }


public function processSave()
{
    $data = array(
        'name'            => pSQL(Tools::getValue('name')),
        'id_product'     => (int)Tools::getValue('id_product'),
        'reduction'       => (float)Tools::getValue('reduction'),
        'from'            => pSQL( Tools::getValue('from')),
        'to'              => pSQL( Tools::getValue('to')),
    );

    if (!$this->id_object) {
        // INSERT manual
        $success = Db::getInstance()->insert('specific_price_rule_customize_product', $data);
        if ($success) {
                $dataNotRule = array(
                    'id_specific_price_rule' => Db::getInstance()->Insert_ID(),
                    'id_product'            => (int)Tools::getValue('id_product'),
                    'reduction'              => (float)(Tools::getValue('reduction')/100),
                    'from'                   => pSQL( Tools::getValue('from')),
                    'to'                     => pSQL( Tools::getValue('to')),
                );
                $success = Db::getInstance()->insert('specific_price_customize_product', $dataNotRule);
        }
        return $success;
    } else {
        // UPDATE manual
        $dataNotRule = array(
            'id_product'            => (int)Tools::getValue('id_product'),
            'reduction'              => (float)(Tools::getValue('reduction')/100),
            'from'                   => pSQL( Tools::getValue('from')),
            'to'                     => pSQL( Tools::getValue('to')),
        );

        Db::getInstance()->update('specific_price_customize_product', $dataNotRule,'id_specific_price_rule = '.(int)$this->id_object);
        return Db::getInstance()->update(
            'specific_price_rule_customize_product',
            $data,
            'id_specific_price_rule = '.(int)$this->id_object
        );
    }
}

}
