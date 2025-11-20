<?php
			// $result = Db::getInstance(_PS_USE_SQL_SLAVE_)->ExecuteS("SELECT alcx.id_video, alcx.link, pl.name
      // FROM `"._DB_PREFIX_."afgx_img_customize_xml` alcx
      // INNER JOIN `"._DB_PREFIX_."product_lang` pl on  alcx.`id_product` = pl.`id_product` and pl.id_lang = 1");


  class AdminAddVideoProductController extends ModuleAdminController
  {


    public $bootstrap = true;

    public function __construct()
    {
        $this->bootstrap = true; // use Bootstrap CSS
        $this->table = 'video_gallery_product'; // SQL table name, will be prefixed with _DB_PREFIX_
        $this->className = 'ModelVideoGallery'; // PHP class name
        $this->lang = false;
        $this->explicitSelect = true;
        $this->allow_export = true;
        $this->_defaultOrderBy = 'id_video';// the table alias is always `a`

        $this->identifier = 'id_video'; // SQL column to be used as primary key

        parent::__construct();
        $this->bulk_actions = array(
          'delete' => array(
            'text' => $this->l('Delete selected'),
            'icon' => 'icon-trash',
            'confirm' => $this->l('Delete selected items?')
          )
        );

        // join orther tables
        $this->_select = "pl.name,a.video ";
        $this->_join = "INNER JOIN `"._DB_PREFIX_."product_lang` pl on  a.`id_product` = pl.`id_product` and pl.id_lang = ".(int)$this->context->language->id;
        $this->_orderBy = "id_video";
        $this->_orderWay = "ASC";


        $this->fields_list = array(
          'id_video' => array(
            'title' => $this->l('ID'),
            'align' => 'center',
            'width' => 25
          ),
          'video' => array(
            'title' => $this->l('Video Link'),
          ),
          'name' => array(
            'title' => $this->l('Product'),
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
        ModelVideoGallery::setDefaultConfig((int)Tools::getValue('id_video'));
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

        $products_array = Db::getInstance(_PS_USE_SQL_SLAVE_)->ExecuteS('
                          SELECT p.id_product, CONCAT ( \'#\', p.id_product, \' - \',  pl.name, \' (ref:\', p.reference, \')\') AS pname
                          FROM `'._DB_PREFIX_.'product` p
                          INNER JOIN `'._DB_PREFIX_.'product_lang` pl ON (p.`id_product` = pl.`id_product` AND pl.`id_lang` = '.(int)$this->context->language->id.')
                          where p.`id_category_default` != 102
                          ORDER BY pl.name ASC');

        $empty_refp = array('id_product' => 0, 'pname' => '--');
        array_push($products_array, $empty_refp);

        $fields_form = array(
          'legend' => array(
            'title' => $this->l('Video Customization'),
            ),
          'submit' => array(
            'title' => $this->l('Save'),
          ),
          'input' => array(
            array(
              'type' => 'text',
              'label' => $this->l('Link Video:'),
              'name' => 'video'
            ),
            array(
              'type' => 'select',
              'label' => $this->l('Product'),
              'name' => 'id_product',
              'class' => 'chosen',
              'options' => array(
                'query' => $products_array,
                'id' => 'id_product',
                'name' => 'pname'
                ),
            ),
          ),


        );
        $this->fields_form = $fields_form;
      }


      public function processSave()
      {
        if ($this->display == 'add' || $this->display == 'edit')
          $this->identifier = 'video_gallery_product';

        if (!$this->id_object)
          return $this->processAdd();
        else
          return $this->processUpdate();
      }
  }

?>
