<?php


if (!defined('_PS_VERSION_')) {
  exit;
}
require_once _PS_MODULE_DIR_ . 'alucarrier/models/customizeDelivery.php';
require_once _PS_MODULE_DIR_ . 'alucarrier/models/customizeDeliveryPrice.php';
require_once _PS_MODULE_DIR_ . 'alucarrier/models/customizeDeliveryProduct.php';

require_once _PS_MODULE_DIR_ . 'alucarrier/models/customizeDeliveryRules.php';
require_once _PS_MODULE_DIR_ . 'alucarrier/models/customizeDeliverySpecific.php';

class AluCarrier extends Module
{
  public function __construct()
  {

    $this->name = 'alucarrier';
    $this->tab = 'Aluclass_deliviry';
    $this->version = '1.0.0';
    $this->author = 'Aluclass deliviry';
    $this->need_instance = 0;
    $this->ps_versions_compliancy = [
      'min' => '1.7.0.0',
      'max' => '8.99.99',
    ];
    $this->bootstrap = true;

    parent::__construct();

    $this->displayName = $this->l('Aluclass deliviry');
    $this->description = $this->l('gerir deliviry ');

    $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');

    if (!Configuration::get('CUSTOMIZEDELIVERY')) {
      $this->warning = $this->l('No name provided');
    }
  }

  public function install()
  {
    $id_tab = Tab::getIdFromClassName('AdminCustomizeDeliveryNo');
    if ($id_tab > 0) {
      $this->uninstallModuleTab('AdminCustomizeDelivery', $id_tab);
      $this->uninstallModuleTab('AdminCustomizeDeliveryPrice', $id_tab);
      $this->uninstallModuleTab('AdminCustomizeDeliveryProduct', $id_tab);
      $this->uninstallModuleTab('AdminCustomizeDeliveryRules', $id_tab);
      $this->uninstallModuleTab('AdminCustomizeDeliverySpecific', $id_tab);


      $this->uninstallModuleTab('AdminCustomizeDeliveryNo', 0);
    }
    $this->installModuleTab('AdminCustomizeDeliveryNo', array((int)$this->context->language->id => 'Manage Customize Delivery Fields'), 0);
    $id_tab = Tab::getIdFromClassName('AdminCustomizeDeliveryNo');

    return (parent::install()
      && $this->registerHook('Header')
      && $this->registerHook('displayBackOfficeHeader')
      && $this->installModuleTab('AdminCustomizeDelivery', array((int)$this->context->language->id => 'Delivery'), $id_tab)
      && $this->installModuleTab('AdminCustomizeDeliveryPrice', array((int)$this->context->language->id => 'Delivery Price'), $id_tab)
      && $this->installModuleTab('AdminCustomizeDeliveryProduct', array((int)$this->context->language->id => 'Delivery Product'), $id_tab)
      && $this->installModuleTab('AdminCustomizeDeliveryRules', array((int)$this->context->language->id => 'Delivery Rules'), $id_tab)
      && $this->installModuleTab('AdminCustomizeDeliverySpecific', array((int)$this->context->language->id => 'Delivery Specific'), $id_tab)
      && Configuration::updateValue('CUSTOMIZEDELIVERY', 'Aluclass - Deliviry')
    );
  }

  public function uninstall()
  {
    // Uninstall Tabs
    $id_tab = Tab::getIdFromClassName('AdminCustomizeDeliveryNo');

    return (parent::uninstall()
      && Configuration::deleteByName('CUSTOMIZEDELIVERY')
      && Configuration::deleteByName('CUSTOMIZEDELIVERYMAINPRICE')

      && $this->uninstallModuleTab('AdminCustomizeDelivery', $id_tab)
      && $this->uninstallModuleTab('AdminCustomizeDeliveryPrice', $id_tab)
      && $this->uninstallModuleTab('AdminCustomizeDeliveryProduct', $id_tab)
      && $this->uninstallModuleTab('AdminCustomizeDeliveryRules', $id_tab)
      && $this->uninstallModuleTab('AdminCustomizeDeliverySpecific', $id_tab)

      && $this->uninstallModuleTab('AdminCustomizeDeliveryNo', 0)
    );
  }

  public function getContent()
  {
    $output = '';

    $CUSTOMIZEDELIVERYMAINPRICE  = (string) Tools::getValue('CUSTOMIZEDELIVERYMAINPRICE');


    if (  empty($CUSTOMIZEDELIVERYMAINPRICE)  ) {
      return $this->displayForm();
    } else {

      Configuration::updateValue('CUSTOMIZEDELIVERYMAINPRICE', $CUSTOMIZEDELIVERYMAINPRICE);

      $output = $this->displayConfirmation($this->l('Save with success'));
      // display any message, then the form
      return $output . $this->displayForm();
    }
  }

  public function hookDisplayBackOfficeHeader()
  {
      $this->context->controller->addCSS($this->_path.'views/css/admin.css', 'all');
  }

  public function displayForm()
  {

    // Init Fields form array
    $form = array(

      'form' => array(
        'legend' => array(
          'title' => $this->l('Settings'),
        ),
        'input' => array(
          array(
            'type' => 'text',
            'label' => $this->l('Price main Deliver'),
            'name' => 'CUSTOMIZEDELIVERYMAINPRICE',
            'size' => 9,
            'required' => true,
          ),

         ),
        'submit' => array(
          'title' => $this->l('Save Configure'),
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
    $helper->fields_value['CUSTOMIZEDELIVERYMAINPRICE'] = Tools::getValue('CUSTOMIZEDELIVERYMAINPRICE', Configuration::get('CUSTOMIZEDELIVERYMAINPRICE'));


    return $output.$helper->generateForm([$form]);
  }

  private function installModuleTab($tabClass, $tabName, $idTabParent)
  {
    $tab = new Tab();

    $langues = Language::getLanguages(false);
    foreach ($langues as $langue)
      $tabName[$langue['id_lang']] = $tabName[(int)$this->context->language->id];


    $tab->name = $tabName;
    $tab->class_name = $tabClass;
    $tab->module = $this->name;
    $tab->id_parent = $idTabParent;
    $id_tab = $tab->save();
    if (!$id_tab)
      return false;

    return true;
  }

  private function uninstallModuleTab($tabClass, $idTabParent)
  {
    $idTab = Tab::getIdFromClassName($tabClass);
    if ($idTab != 0) {
      $tab = new Tab($idTab);
      $tab->delete();
      return true;
    }
    return false;
  }
}
