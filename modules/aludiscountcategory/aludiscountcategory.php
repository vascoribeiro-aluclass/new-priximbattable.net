<?php


if (!defined('_PS_VERSION_')) {
  exit;
}
require_once _PS_MODULE_DIR_ . 'aludiscountcategory/models/discountCategory.php';
require_once _PS_MODULE_DIR_ . 'aludiscountcategory/models/discountProduct.php';
class AluDiscountCategory extends Module
{
  public function __construct()
  {

    $this->name = 'aludiscountcategory';
    $this->tab = 'Aluclass_deliviry';
    $this->version = '1.0.0';
    $this->author = 'Aluclass Discount Category';
    $this->need_instance = 0;
    $this->ps_versions_compliancy = [
      'min' => '1.7.0.0',
      'max' => '8.99.99',
    ];
    $this->bootstrap = true;

    parent::__construct();

    $this->displayName = $this->l('Aluclass Discount Category');
    $this->description = $this->l('gerir Discount Category');

    $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');

    if (!Configuration::get('DISCOUNTCATEGORY')) {
      $this->warning = $this->l('No name provided');
    }
  }

  public function install()
  {
    $id_tab = Tab::getIdFromClassName('AdminDiscountCategoryNo');
    if ($id_tab > 0) {
      $this->uninstallModuleTab('AdminDiscountCategory', $id_tab);
      $this->uninstallModuleTab('AdminDiscountCategoryNo', 0);
    }
    $this->installModuleTab('AdminDiscountCategoryNo', array((int)$this->context->language->id => 'Manage Discount Category Fields'), 0);
    $id_tab = Tab::getIdFromClassName('AdminDiscountCategoryNo');

    return (parent::install()
      && $this->registerHook('Header')
      && $this->registerHook('displayBackOfficeHeader')
      && $this->installModuleTab('AdminDiscountCategory', array((int)$this->context->language->id => 'Discount Category'), $id_tab)
      && $this->installModuleTab('AdminDiscountProduct', array((int)$this->context->language->id => 'Discount product'), $id_tab)
      && Configuration::updateValue('DISCOUNTCATEGORY', 'Aluclass - Deliviry')
    );
  }

  public function uninstall()
  {
    // Uninstall Tabs
    $id_tab = Tab::getIdFromClassName('AdminDiscountCategoryNo');

    return (parent::uninstall()
      && $this->uninstallModuleTab('AdminDiscountCategory', $id_tab)
      && $this->uninstallModuleTab('AdminDiscountProduct', $id_tab)
      && $this->uninstallModuleTab('AdminDiscountCategoryNo', 0)
    );
  }


  public function hookDisplayBackOfficeHeader()
  {
      $this->context->controller->addCSS($this->_path.'views/css/admin.css', 'all');
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
