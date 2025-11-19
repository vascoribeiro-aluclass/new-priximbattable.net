<?php

use JetBrains\PhpStorm\Language;

if (!defined('_PS_VERSION_')) {
  exit;
}

require_once _PS_MODULE_DIR_ . 'alumenu/models/htmlmenu.php';

class AluMenu extends Module
{
  public function __construct()
  {
    $this->name = 'alumenu';
    $this->tab = 'front_office_features';
    $this->version = '1.0.0';
    $this->author = 'Aluclass Vasco';
    $this->need_instance = 0;
    $this->ps_versions_compliancy = [
      'min' => '1.7.0.0',
      'max' => '8.99.99',
    ];
    $this->bootstrap = true;

    parent::__construct();

    $this->displayName = $this->l('AluMenu');
    $this->description = $this->l('Gerar menu aluclass');

    $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');

    if (!Configuration::get('ALUMENU')) {
      $this->warning = $this->l('No name provided');
    }
  }

  public function install()
  {
    if (Shop::isFeatureActive()) {
      Shop::setContext(Shop::CONTEXT_ALL);
    }

    return (parent::install()
      && $this->registerHook('displayNavFullWidth')
      && $this->registerHook('Header')
      && Configuration::updateValue('ALUMENU', 'aluclass menu')
    );
  }

  public function uninstall()
  {
    return (parent::uninstall()
      && Configuration::deleteByName('ALUMENU')
    );
  }

  public function hookHeader($params)
  {
    $this->context->controller->addJS(($this->_path) . 'views/js/alumenu.js');
    $this->context->controller->addCSS(($this->_path) . 'views/css/alumenu.css', 'all');
  }

  public function hookDisplayNavFullWidth()
  {

    return $this->display(__FILE__, 'alumenu.tpl');
  }

  public function getContent()
  {



    $output = '';
    $html = '';
    $parenthtml = '';
    $categoryhtml = '';
    $menuCategoryhtml = '';
    $menuCategoryMobliehtml = '';
    $objectMenu = new HtmlMenu();
    // this part is executed only when the form is submitted
    if (Tools::isSubmit('submit' . $this->name)) {

      if (!is_dir(_PS_IMG_DIR_ . 'alumenu/'))
        mkdir(_PS_IMG_DIR_ . 'alumenu/', 0777);

      // retrieve the value set by the user
      $stringCategory = (string) Tools::getValue('MENUALUCASS_CONFIG');
      $langid = (int) Tools::getValue('MENUALUCASS_LANG');
      $withImg = (int) Tools::getValue('MENUALUCASS_WIDTH');
      $heightImg = (int) Tools::getValue('MENUALUCASS_HEIGHT');
      $colSeize = (int) Tools::getValue('MENUALUCASS_COL');
      $quemSomos = (string) Tools::getValue('MENUALUCASS_QUEMSOMOS');
      $textQuemSomos = (string) Tools::getValue('MENUALUCASS_TEXTQUEMSOMOS');

      $stringCategory = str_replace(' ', '', $stringCategory);
      $stringCategoryArray = explode(',', $stringCategory);

      // check that the value is valid
      if (empty($stringCategory) || !Validate::isGenericName($stringCategory) || empty($langid) || !Validate::isInt($langid)) {
        // invalid value, show an error
        $output = $this->displayError($this->l('Invalid Configuration value ' . $langid));
        return $output . $this->displayForm();
      } else {

        foreach ($stringCategoryArray as $stringCategoryValue) {
          $parenthtml = '';
          $arrayCategory = Db::getInstance(_PS_USE_SQL_SLAVE_)->ExecuteS('SELECT `name`, CONCAT (  c.`id_category`, \'-\' ,  cl.`link_rewrite`) as link, cl.`link_rewrite`
          FROM `' . _DB_PREFIX_ . 'category_lang` cl
          INNER JOIN `' . _DB_PREFIX_ . 'category` c on c.`id_category` = cl.`id_category`
          WHERE cl.`id_lang` = ' . (int)$langid . ' and c.active = 1 and c.id_category = ' . (int)$stringCategoryValue . ' and c.id_shop_default = 1
          ORDER BY c.position');




          if (!empty($arrayCategory)) {
            $arrayCategoryParent = Db::getInstance(_PS_USE_SQL_SLAVE_)->ExecuteS('SELECT  c.`id_category`,`name`, CONCAT (  c.`id_category`, \'-\' ,  cl.`link_rewrite`) as link, cl.`link_rewrite`
            FROM `' . _DB_PREFIX_ . 'category_lang` cl
            INNER JOIN `' . _DB_PREFIX_ . 'category` c on c.`id_category` = cl.`id_category`
            WHERE cl.`id_lang` = ' . (int)$langid . ' and c.active = 1 and c.id_parent = ' . (int)$stringCategoryValue . ' and c.id_shop_default = 1
            ORDER BY c.position');

            if (!empty($arrayCategoryParent)) {
              foreach ($arrayCategoryParent as $valueParents) {
                $parenthtml .= $objectMenu->GetParent($colSeize, $langid, $valueParents['id_category'], "/" . $valueParents['link'], $valueParents['link_rewrite'], $valueParents['name'], $arrayCategory[0]['link_rewrite'], $withImg, $heightImg);
              }

              $menuCategoryhtml .= $objectMenu->GetMenuCategory($arrayCategory[0]['link'], $arrayCategory[0]['link_rewrite'], $arrayCategory[0]['name']);


              $categoryhtml .= $objectMenu->GetCategory($arrayCategory[0]['link_rewrite'], $parenthtml);
              $menuCategoryMobliehtml .= $objectMenu->GetCategoryMoblie($arrayCategory[0]['link_rewrite'], $arrayCategory[0]['name'], $parenthtml);

              if (!is_dir(_PS_IMG_DIR_ . 'alumenu/' . $langid . '/'))
                mkdir(_PS_IMG_DIR_ . 'alumenu/' . $langid . '/', 0777);
              if (!is_dir(_PS_IMG_DIR_ . 'alumenu/' . $langid . '/' . $arrayCategory[0]['link_rewrite'] . '/'))
                mkdir(_PS_IMG_DIR_ . 'alumenu/' . $langid . '/' . $arrayCategory[0]['link_rewrite'] . '/', 0777);
            } else {
              if ($stringCategoryValue <> 101) {
                $arrayCategoryParent = Db::getInstance(_PS_USE_SQL_SLAVE_)->ExecuteS('SELECT  p.`id_product`,`name`, CONCAT (  p.`id_product`, \'-\' ,  pl.`link_rewrite`) as link, pl.`link_rewrite`
                  FROM `' . _DB_PREFIX_ . 'product_lang` pl
                  INNER JOIN `' . _DB_PREFIX_ . 'product` p on p.`id_product` = pl.`id_product`
                INNER JOIN `' . _DB_PREFIX_ . 'category_product` c on c.`id_product` =p.`id_product` and  c.`id_category` = ' . (int)$stringCategoryValue . '
                  WHERE pl.`id_lang` = ' . (int)$langid . ' and p.active = 1 and p.id_category_default = ' . (int)$stringCategoryValue . ' and p.id_shop_default = 1
                  ORDER BY c.position, p.id_product');








                foreach ($arrayCategoryParent as $valueParents) {
                  $parenthtml .= $objectMenu->GetParent($colSeize, $langid, (int)$stringCategoryValue, "/" . $arrayCategory[0]['link_rewrite'] . "/" . $valueParents['link'] . ".html", $valueParents['link_rewrite'], $valueParents['name'], $arrayCategory[0]['link_rewrite'], $withImg, $heightImg);
                }
                $categoryhtml .= $objectMenu->GetCategory($arrayCategory[0]['link_rewrite'], $parenthtml);
                $menuCategoryhtml .= $objectMenu->GetMenuCategory($arrayCategory[0]['link'], $arrayCategory[0]['link_rewrite'], $arrayCategory[0]['name']);
                $menuCategoryMobliehtml .= $objectMenu->GetCategoryMoblie($arrayCategory[0]['link_rewrite'], $arrayCategory[0]['name'], $parenthtml);

              }else{
                $menuCategoryhtml .= $objectMenu->GetMenuCategoryDESTOCKAGE();
                $menuCategoryMobliehtml .= $objectMenu->GetCategoryMoblieDESTOCKAGE();
              }


              // $menuCategoryMobliehtml .= $objectMenu->GetCategoryMoblie($arrayCategory[0]['link_rewrite'], $arrayCategory[0]['name'], $parenthtml);

              if (!is_dir(_PS_IMG_DIR_ . 'alumenu/' . $langid . '/'))
                mkdir(_PS_IMG_DIR_ . 'alumenu/' . $langid . '/', 0777);
              if (!is_dir(_PS_IMG_DIR_ . 'alumenu/' . $langid . '/' . $arrayCategory[0]['link_rewrite'] . '/'))
                mkdir(_PS_IMG_DIR_ . 'alumenu/' . $langid . '/' . $arrayCategory[0]['link_rewrite'] . '/', 0777);
            }
          }
        }

        // $menuCategoryhtml .= $objectMenu->GetMenuCategory("#","qui-sommes-nous",$textQuemSomos);
        // $categoryhtml .= $objectMenu->GetCategory("qui-sommes-nous",$quemSomos);
        // $menuCategoryMobliehtml .= $objectMenu->GetCategoryMoblie("qui-sommes-nous",$textQuemSomos,$quemSomos);

        $html = $objectMenu->GetMenu($categoryhtml, $menuCategoryhtml, $objectMenu->GetMenuMoblie($menuCategoryMobliehtml));
        $menuTlp = fopen($this->local_path . "views/templates/hook/alumenu.tpl", "w");

        fwrite($menuTlp, $html);
        fclose($menuTlp);
        // value is ok, update it and display a confirmation message
        Configuration::updateValue('MENUALUCASS_CONFIG', $stringCategory);
        Configuration::updateValue('MENUALUCASS_LANG', $langid);
        Configuration::updateValue('MENUALUCASS_WIDTH', $withImg);
        Configuration::updateValue('MENUALUCASS_HEIGHT', $heightImg);
        Configuration::updateValue('MENUALUCASS_COL', $colSeize);
        Configuration::updateValue('MENUALUCASS_TEXTQUEMSOMOS', $textQuemSomos);
        Configuration::updateValue('MENUALUCASS_QUEMSOMOS', $quemSomos, true);

        $output = $this->displayConfirmation($this->l('Menu Generate'));
      }
    }

    // display any message, then the form
    return $output . $this->displayForm();
  }

  public function displayForm()
  {
    $arrayLang = array();
    $arrayLangSys = $this->context->controller->getLanguages();
    foreach ($arrayLangSys as $valueLang) {
      $arrayLang[$valueLang['id_lang']]['id'] = $valueLang['id_lang'];
      $arrayLang[$valueLang['id_lang']]['name'] = $valueLang['name'];
    }

    // Init Fields form array
    $form = array(
      'form' => array(
        'legend' => array(
          'title' => $this->l('Settings'),
        ),
        'input' => array(
          array(
            'type' => 'text',
            'label' => $this->l('Category Ids Ex: 50,32,1,23..'),
            'name' => 'MENUALUCASS_CONFIG',
            'size' => 20,
            'required' => true,
          ),
          array(
            'type' => 'select',
            'class' => '',
            'label' => $this->l('Lang'),
            'name' => 'MENUALUCASS_LANG',
            'desc' => $this->l('Define the language to generate the menu'),
            'required' => true,
            'options' => array(
              'query' => $arrayLang,
              'id' => 'id',
              'name' => 'name'
            ),

          ),
          array(
            'type' => 'text',
            'label' => $this->l('width the image in px'),
            'name' => 'MENUALUCASS_WIDTH',
            'required' => true,
          ),
          array(
            'type' => 'text',
            'label' => $this->l('height the image in px'),
            'name' => 'MENUALUCASS_HEIGHT',
            'required' => true,
          ),
          array(
            'type' => 'text',
            'label' => $this->l('Number column'),
            'name' => 'MENUALUCASS_COL',
            'required' => true,
          ),
          array(
            'type' => 'text',
            'label' => $this->l('Translate Page Who are we'),
            'name' => 'MENUALUCASS_TEXTQUEMSOMOS',
            'required' => true,
          ),
          array(
            'type' => 'textarea',
            'label' => $this->l('Page Who are we'),
            'name' => 'MENUALUCASS_QUEMSOMOS',
            'required' => true,
            'rows' => 100,
          ),
        ),
        'submit' => array(
          'title' => $this->l('Generate'),
          'class' => 'btn btn-default pull-right',
        ),
      ),
    );

    $helper = new HelperForm();

    // Module, token and currentIndex
    $helper->table = $this->table;
    $helper->name_controller = $this->name;
    $helper->token = Tools::getAdminTokenLite('AdminModules');
    $helper->currentIndex = AdminController::$currentIndex . '&' . http_build_query(['configure' => $this->name]);
    $helper->submit_action = 'submit' . $this->name;

    // Default language
    $helper->default_form_language = (int) Configuration::get('PS_LANG_DEFAULT');

    // Load current value into the form
    $helper->fields_value['MENUALUCASS_CONFIG'] = Tools::getValue('MENUALUCASS_CONFIG', Configuration::get('MENUALUCASS_CONFIG'));
    $helper->fields_value['MENUALUCASS_LANG'] = Tools::getValue('MENUALUCASS_LANG', Configuration::get('MENUALUCASS_LANG'));
    $helper->fields_value['MENUALUCASS_WIDTH'] = Tools::getValue('MENUALUCASS_WIDTH', Configuration::get('MENUALUCASS_WIDTH'));
    $helper->fields_value['MENUALUCASS_HEIGHT'] = Tools::getValue('MENUALUCASS_HEIGHT', Configuration::get('MENUALUCASS_HEIGHT'));
    $helper->fields_value['MENUALUCASS_COL'] = Tools::getValue('MENUALUCASS_COL', Configuration::get('MENUALUCASS_COL'));
    $helper->fields_value['MENUALUCASS_QUEMSOMOS'] = Tools::getValue('MENUALUCASS_QUEMSOMOS', Configuration::get('MENUALUCASS_QUEMSOMOS'));
    $helper->fields_value['MENUALUCASS_TEXTQUEMSOMOS'] = Tools::getValue('MENUALUCASS_TEXTQUEMSOMOS', Configuration::get('MENUALUCASS_TEXTQUEMSOMOS'));

    return $helper->generateForm([$form]);
  }
}
