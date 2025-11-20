<?php
if (!defined('_PS_VERSION_')) {
  exit;
}
require_once _PS_MODULE_DIR_ . 'aluvideo/models/modelVideoGallery.php';
class AluVideo extends Module
{
  public function __construct()
  {
    $this->name = 'aluvideo';
    $this->tab = 'others';
    $this->version = '1.0.0';
    $this->author = 'AluVideo';
    $this->need_instance = 0;
    $this->_min_ps_version = '1.5.0';

    parent::__construct();

    $this->displayName = $this->trans('AluVideo', [], 'Modules.Aluvideo.Admin');
    $this->description = $this->trans('Modulo para adicionar videos aos podutos', [], 'Modules.Aluvideo.Admin');

    $this->confirmUninstall = $this->trans('Are you sure you want to uninstall?', [], 'Modules.Aluvideo.Admin');
  }

  public function install()
  {
    $id_tab = Tab::getIdFromClassName('AdminVideoProductNo');
    if ($id_tab > 0) {
      $this->uninstallModuleTab('AdminAddVideoProduct', $id_tab);
      $this->uninstallModuleTab('AdminVideoProductNo', 0);
    }
    $this->installModuleTab('AdminVideoProductNo', array((int)$this->context->language->id => 'Manage Videos to Each Prod'), 0);
    $id_tab = Tab::getIdFromClassName('AdminVideoProductNo');
    if (Shop::isFeatureActive()) {
      Shop::setContext(Shop::CONTEXT_ALL);
    }

    $sql = array();

    $sql[] = "CREATE TABLE IF NOT EXISTS `" . _DB_PREFIX_ . "video_gallery_product` (
      `id_video` int(11) unsigned NOT NULL AUTO_INCREMENT,
      `id_product` int(11) NOT NULL,
      `video` VARCHAR(300) NOT NULL,
      PRIMARY KEY (`id_video`)
  )";
    foreach ($sql as $query) {
      if (Db::getInstance()->execute($query) == false) {
        return false;
      }
    }

    return parent::install()
      && $this->installModuleTab('AdminAddVideoProduct', array((int)$this->context->language->id => 'Video Customization'), $id_tab);
  }

  public function uninstall()
  {
    $sql = array();

    $sql[] = 'DROP TABLE `'. _DB_PREFIX_ .'video_gallery_product`';

    foreach ($sql as $query) {
        if (Db::getInstance()->execute($query) == false) {
            return false;
        }
    }
    $id_tab = Tab::getIdFromClassName('AdminVideoProductNo');

    return parent::uninstall()
    && $this->uninstallModuleTab('AdminAddVideoProduct', $id_tab);
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

  // public function getData()
  // {
  //   // Exemplo de query SELECT
  //   $sql = 'SELECT * FROM ' . _DB_PREFIX_ . 'sp_video_gallery_product';

  //   // Executa a query e armazena os resultados em um array
  //   $resultados = Db::getInstance()->executeS($sql);

  //   // Retorna o array de resultados
  //   return $resultados ?: [];
  // }

  // public function displayVideoData()
  // {
  //   global $smarty;
  //   // Chama a função para obter os dados
  //   $data = $this->getData();

  //   // Atribui o array ao Smarty
  //   $smarty->assign('videos', $data);

  //   // Renderiza o template
  //   return $this->display('./themes/classic/templates/catalog/_partials/product-cover-thumbnails.tpl');
  // }
}
