<?php
/**
* Module Quotation
*
* @author    Empty
* @copyright 2007-2016 PrestaShop SA
* @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*/

if (!defined('_PS_VERSION_'))
	exit;

define('_PS_QUOTATION_DIR_', _PS_IMG_DIR_.'quotation/');
if(!is_dir(_PS_QUOTATION_DIR_)) {
	mkdir(_PS_QUOTATION_DIR_);
	copy(_PS_IMG_DIR_.'index.php', _PS_QUOTATION_DIR_.'index.php');
}

require_once _PS_CLASS_DIR_.'ShareCart.php';
require_once(dirname(__FILE__) . '/classes/QuotationObject.php');
require_once(dirname(__FILE__) . '/classes/pdf/HTMLTemplateQuotation.php');

class PDFQuotation extends Module
{
	protected $config_form = false;

	public function __construct()
	{
		$this->name = 'pdfquotation';
		$this->tab = 'others';
		$this->version = '1.7.0';
		$this->author = 'Empty';
		$this->need_instance = 0;
		$this->bootstrap = true;
		$this->displayName = $this->l('PDF Quotation Module');
		$this->description = $this->l('Permit to customer to print quotation');
		$this->confirmUninstall = $this->l('Are you sure you want to uninstall PDF Quotation module ?');
        $this->module_key = "a0a48c7b6e8387253bd86197d2acf4c0";
		$this->ps_versions_compliancy = array('min' => '1.7.0.0', 'max' => _PS_VERSION_);

		parent::__construct();
	}

	public function install()
	{
		include(dirname(__FILE__).'/sql/install.php');

		//Add a menu in "order menu"
		$tab = new Tab();
		$tab->active = 1;
		$tab->class_name = 'AdminPdfQuotation';
		$tab->name = array();
		$arrayLangConf = array();
		foreach (Language::getLanguages(true) as $lang) {
			$tab->name[$lang['id_lang']] = $this->l('Quotation');
			$arrayLangConf[$lang['id_lang']] = "";
		}

		$idOrderTab = Tab::getIdFromClassName('AdminParentOrders');
		$tab->id_parent = $idOrderTab;
		$tab->module = $this->name;
		$tab->add();

		/* Adds Module */
		if (!parent::install() OR
			!$this->registerHook('header') OR
			!$this->registerHook('displayShoppingCartFooter') OR
			!$this->registerHook('displayCustomerAccount') OR
			!Configuration::updateValue('PDFQUOTATION_SEND_MAIL', '0') OR
			!Configuration::updateValue('PDFQUOTATION_MAIL', Configuration::get('PS_SHOP_EMAIL')) OR
			!Configuration::updateValue('PDFQUOTATION_HEADER', $arrayLangConf) OR
			!Configuration::updateValue('PDFQUOTATION_MARGIN_HEADER', '55') OR
			!Configuration::updateValue('PDFQUOTATION_BEFORE', $arrayLangConf) OR
			!Configuration::updateValue('PDFQUOTATION_AFTER', $arrayLangConf) OR
			!Configuration::updateValue('PDFQUOTATION_PREFIX', 'Q') OR
			!Configuration::updateValue('PDFQUOTATION_FOOTER', $arrayLangConf) OR
			!Configuration::updateValue('PDFQUOTATION_MARGIN_FOOTER', '25'))
		{
			//Remove the menu
			$idTab = Tab::getIdFromClassName('AdminPdfQuotation');
			$tab = new Tab($idTab);
			$tab->delete();

			return false;
		}

		return true;
	}

	public function uninstall()
	{
		include(dirname(__FILE__).'/sql/uninstall.php');

		//Remove the menu
		$idTab = Tab::getIdFromClassName('AdminPdfQuotation');
		$tab = new Tab($idTab);
		$tab->delete();

		return parent::uninstall() &&
			Configuration::deleteByName('PDFQUOTATION_SEND_MAIL') &&
			Configuration::deleteByName('PDFQUOTATION_MAIL') &&
			Configuration::deleteByName('PDFQUOTATION_HEADER') &&
			Configuration::deleteByName('PDFQUOTATION_BEFORE') &&
			Configuration::deleteByName('PDFQUOTATION_AFTER') &&
			Configuration::deleteByName('PDFQUOTATION_PREFIX') &&
			Configuration::deleteByName('PDFQUOTATION_FOOTER') &&
			Configuration::deleteByName('PDFQUOTATION_MARGIN_FOOTER') &&
			Configuration::deleteByName('PDFQUOTATION_MARGIN_HEADER');
	}

	/**
	 * Load the configuration form
	 */
	public function getContent()
	{
		/**
		 * If values have been submitted in the form, process.
		 */
		if (((bool)Tools::isSubmit('submitPdfquotationModule')) == true)
		{
			$this->_postProcess();
		}

		$this->context->smarty->assign('module_dir', $this->_path);

		$output = $this->context->smarty->fetch($this->local_path.'views/templates/admin/configure.tpl');

		return $output.$this->renderForm();
	}

	/**
	 * Set values for the inputs.
	 */
	protected function getConfigFormValues()
	{
		$languages = Language::getLanguages(false);
		$fields = array (
			'PDFQUOTATION_SEND_MAIL' => Configuration::get('PDFQUOTATION_SEND_MAIL', 1),
			'PDFQUOTATION_MAIL' => Configuration::get('PDFQUOTATION_MAIL'),
			'PDFQUOTATION_HEADER' => Configuration::get('PDFQUOTATION_HEADER'),
			'PDFQUOTATION_BEFORE' => Configuration::get('PDFQUOTATION_BEFORE'),
			'PDFQUOTATION_AFTER' => Configuration::get('PDFQUOTATION_AFTER'),
			'PDFQUOTATION_PREFIX' => Configuration::get('PDFQUOTATION_PREFIX'),
			'PDFQUOTATION_FOOTER' => Configuration::get('PDFQUOTATION_FOOTER'),
			'PDFQUOTATION_MARGIN_FOOTER' => Configuration::get('PDFQUOTATION_MARGIN_FOOTER'),
			'PDFQUOTATION_MARGIN_HEADER' => Configuration::get('PDFQUOTATION_MARGIN_HEADER')
		);

		foreach (array_keys($fields) as $field)
		{
			$value = null;
			if(Configuration::isLangKey($field))
			{
				foreach ($languages as $language)
				{
					$value[$language['id_lang']] = Configuration::get($field, $language['id_lang']);
				}
			}
			else
			{
				$value = Configuration::get($field);
			}
			$fields[$field] = $value;
		}

		return $fields;
	}

	/**
	 * Save form data.
	 */
	protected function _postProcess()
	{
		$languages = Language::getLanguages(false);

		$form_values = $this->getConfigFormValues();

		foreach (array_keys($form_values) as $key)
		{
			$value = null;
			foreach ($languages as $language)
			{
				$value[$language['id_lang']] = Tools::getValue($key.'_'.$language['id_lang']);
                $get = Tools::getValue($key.'_'.$language['id_lang']);
				if($get === false) {
					$value = Tools::getValue($key);
				}
			}
			Configuration::updateValue($key, $value, true);
		}
	}

	/**
	 * Create the form that will be displayed in the configuration of your module.
	 */
	protected function renderForm()
	{
		$helper = new HelperForm();

		$helper->show_toolbar = false;
		$helper->table = $this->table;
		$helper->module = $this;
		$helper->default_form_language = $this->context->language->id;
		$helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG', 0);

		$helper->identifier = $this->identifier;
		$helper->submit_action = 'submitPdfquotationModule';
		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false)
			.'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');

		$helper->tpl_vars = array(
			'fields_value' => $this->getConfigFormValues(), /* Add values for your inputs */
			'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id,
		);

		return $helper->generateForm(array($this->getConfigForm()));
	}

	/**
	 * Create the structure of your form.
	 */
	protected function getConfigForm()
	{
		return array(
			'form' => array(
				'tinymce' => true,
				'legend' => array(
					'title' => $this->l('Settings'),
					'icon' => 'icon-cogs',
				),
				'input' => array(
					array(
						'type' => 'radio',
						'name' => 'PDFQUOTATION_SEND_MAIL',
						'label' => $this->l('Send Email to prevent new quotation'),
						'lang' => false,
						'required' => true,
						'is_bool'   => true,
						'values'    => array(                                 // $values contains the data itself.
							array(
								'id'    => 'active_on',                           // The content of the 'id' attribute of the <input> tag, and of the 'for' attribute for the <label> tag.
								'value' => 1,                                     // The content of the 'value' attribute of the <input> tag.
								'label' => $this->l('Enabled')                    // The <label> for this radio button.
							),
							array(
								'id'    => 'active_off',
								'value' => 0,
								'label' => $this->l('Disabled')
							)
						),
					),
					array(
						'type' => 'text',
						'name' => 'PDFQUOTATION_MAIL',
						'label' => $this->l('Email to send quotation'),
						'lang' => false
					),
					array(
						'type' => 'text',
						'name' => 'PDFQUOTATION_PREFIX',
						'label' => $this->l('Prefix number of quotation'),
						'lang' => false
					),
					array(
						'cols' => 10,
						'rows' => 10,
						'type' => 'textarea',
						'name' => 'PDFQUOTATION_HEADER',
						'label' => $this->l('Text Header'),
						'lang' => true,
						'autoload_rte' => true,
						'cast' => 'strval'
					),
					array(
						'type' => 'text',
						'name' => 'PDFQUOTATION_MARGIN_HEADER',
						'label' => $this->l('Height Header'),
						'desc' => $this->l('Specify height of header. it depends of the length of your header text. You must specify a value between 1 and 100. If you see that quotation text is under your header you must increase this value'),
						'lang' => false,
						'cast' => 'intval'
					),
					array(
						'cols' => 10,
						'rows' => 10,
						'type' => 'textarea',
						'name' => 'PDFQUOTATION_BEFORE',
						'label' => $this->l('Text Header quotation'),
						'lang' => true,
						'autoload_rte' => true,
						'cast' => 'strval'
					),
					array(
						'cols' => 10,
						'rows' => 10,
						'type' => 'textarea',
						'name' => 'PDFQUOTATION_AFTER',
						'label' => $this->l('Text Footer quotation'),
						'lang' => true,
						'autoload_rte' => true,
						'cast' => 'strval'
					),
					array(
						'cols' => 10,
						'rows' => 10,
						'type' => 'textarea',
						'name' => 'PDFQUOTATION_FOOTER',
						'label' => $this->l('Text Footer'),
						'lang' => true,
						'autoload_rte' => true,
						'cast' => 'strval'
					),
					array(
						'type' => 'text',
						'name' => 'PDFQUOTATION_MARGIN_FOOTER',
						'label' => $this->l('Height Footer'),
						'desc' => $this->l('Specify height of footer. it depends of the length of your footer text. You must specify a value between 1 and 50. If you see that footer isn\'t totally displayed, you must increase this value'),
						'lang' => false,
						'cast' => 'intval'
					),
				),
				'submit' => array(
					'title' => $this->l('Save'),
				),
			),
		);
	}

	public function hookHeader()
	{
		$this->context->controller->addJS($this->_path.'/views/js/vendor/jquery.hoverIntent.minified.js');
		$this->context->controller->addJS($this->_path.'/views/js/front.js');
		$this->context->controller->addCSS($this->_path.'/views/css/front.css');
	}

	public function hookDisplayShoppingCartFooter()
	{
		return $this->display(__FILE__, 'views/templates/hook/shoppingcart.tpl');
	}

	public static function imageCreate($stringImg)
	{
		$fileType = exif_imagetype($stringImg);

		switch($fileType) {
			case 3:
				return	imagecreatefrompng($stringImg);
			break;

			default:
				return	imagecreatefromjpeg($stringImg);
		}

	}

	public function hookAjaxCallProd($params){
			//Redirect Order process if one information required is missing
			if(Tools::getValue('first_name') == "" || Tools::getValue('last_name') == "" || Tools::getValue('email') == "" ||
			Tools::getValue('phone') == "" || Tools::getValue('contacted') == "" || Tools::getValue('spam') != "") {

				Tools::redirect('index.php?controller=order&error-pdf=1');
			}

			//Duplicate cart in order to isolate cart product at the moment where customer generate quotation else customer can
			//add new product to current cart after quotation was generated
			$oldCart = $params['context']->cart;
			$newCart = clone $oldCart;
			$newCart->id = null;
			$newCart->save();

			/*
			foreach($oldCart->getProducts() as $product) {
				$newCart->updateQty($product["cart_quantity"], $product["id_product"], $product["id_product_attribute"]);
			}
			*/

			//Save Quotation
      $emailcomercial = Tools::getValue('emailcomercial');
      $catalogue_portail_product = Tools::getValue('catalogue_portail_checked_product');
      $catalogue_cloture_grillage_rigide_product = Tools::getValue('catalogue_cloture_grillage_rigide_checked_product');
      $catalogue_cloture_aluminium_product = Tools::getValue('catalogue_cloture_aluminium_checked_product');
      $catalogue_porte_garage_battant_product = Tools::getValue('catalogue_porte_garage_battant_checked_product');
      $catalogue_porte_garage_enroulable_product = Tools::getValue('catalogue_porte_garage_enroulable_checked_product');
      $catalogue_porte_garage_sectionnelle_product = Tools::getValue('catalogue_porte_garage_sectionnelle_checked_product');
      $catalogue_volet_battant_isole_penture_product = Tools::getValue('catalogue_volet_battant_isole_penture_checked_product');
      $catalogue_volet_battant_isole_pre_cadre_product = Tools::getValue('catalogue_volet_battant_isole_pre_cadre_checked_product');
      $catalogue_volet_roulant_product = Tools::getValue('catalogue_volet_roulant_checked_product');
      $catalogue_bso_product = Tools::getValue('catalogue_bso_checked_product');
      $catalogue_baie_coulissante_product = Tools::getValue('catalogue_baie_coulissante_checked_product');
      $catalogue_fenetre_aluminium_frappe_product = Tools::getValue('catalogue_fenetre_aluminium_frappe_checked_product');
      $catalogue_fenetre_cintree_frappe_product = Tools::getValue('catalogue_fenetre_cintree_frappe_checked_product');
      $catalogue_chassis_fixe_product = Tools::getValue('catalogue_chassis_fixe_checked_product');
      $catalogue_fenetre_pvc_product = Tools::getValue('catalogue_fenetre_pvc_checked_product');
      $catalogue_porte_entree_product = Tools::getValue('catalogue_porte_entree_checked_product');
      $catalogue_verriere_acier_sectionnelle_product = Tools::getValue('catalogue_verriere_acier_sectionnelle_checked_product');
      $catalogue_verriere_miroir_product = Tools::getValue('catalogue_verriere_miroir_checked_product');
      $catalogue_porte_verriere_type_atelier_product = Tools::getValue('catalogue_porte_verriere_type_atelier_checked_product');
      $catalogue_paroi_douche_product = Tools::getValue('catalogue_paroi_douche_checked_product');
      $catalogue_verriere_orangerie_product = Tools::getValue('catalogue_verriere_orangerie_checked_product');
      $catalogue_verriere_district_product = Tools::getValue('catalogue_verriere_district_checked_product');
      $catalogue_verriere_bistrot_product = Tools::getValue('catalogue_verriere_bistrot_checked_product');
      $catalogue_verriere_destructure_product = Tools::getValue('catalogue_verriere_destructure_checked_product');
      $catalogue_verriere_acier_sur_mesure_product = Tools::getValue('catalogue_verriere_acier_sur_mesure_checked_product');
      $catalogue_pergola_aluminium_product = Tools::getValue('catalogue_pergola_aluminium_checked_product');
      $catalogue_pergola_bioclimatique_product = Tools::getValue('catalogue_pergola_bioclimatique_checked_product');
      $catalogue_pergolanda_product = Tools::getValue('catalogue_pergolanda_checked_product');
      $catalogue_carport_2_poteaux_product = Tools::getValue('catalogue_carport_2_poteaux_checked_product');
      $catalogue_carport_aluminium_cintre_product = Tools::getValue('catalogue_carport_aluminium_cintre_checked_product');
      $catalogue_carport_avec_debord_product = Tools::getValue('catalogue_carport_avec_debord_checked_product');
      $catalogue_carport_double_product = Tools::getValue('catalogue_carport_double_checked_product');
      $catalogue_carport_garage_product = Tools::getValue('catalogue_carport_garage_checked_product');
      $catalogue_carport_toit_plat_product = Tools::getValue('catalogue_carport_toit_plat_checked_product');

      $shop_base = new Shop(Context::getContext()->shop->id);
      $value_catalogue = array();
      $checked_product_ = '';
      array_push(
        $value_catalogue,
        $catalogue_portail_product,
        $catalogue_cloture_grillage_rigide_product,
        $catalogue_cloture_aluminium_product,
        $catalogue_porte_garage_battant_product,
        $catalogue_porte_garage_enroulable_product,
        $catalogue_porte_garage_sectionnelle_product,
        $catalogue_volet_battant_isole_penture_product,
        $catalogue_volet_battant_isole_pre_cadre_product,
        $catalogue_volet_roulant_product,
        $catalogue_bso_product,
        $catalogue_baie_coulissante_product,
        $catalogue_fenetre_aluminium_frappe_product,
        $catalogue_fenetre_cintree_frappe_product,
        $catalogue_chassis_fixe_product,
        $catalogue_fenetre_pvc_product,
        $catalogue_porte_entree_product,
        $catalogue_verriere_acier_sectionnelle_product,
        $catalogue_verriere_miroir_product,
        $catalogue_porte_verriere_type_atelier_product,
        $catalogue_paroi_douche_product,
        $catalogue_verriere_orangerie_product,
        $catalogue_verriere_district_product,
        $catalogue_verriere_bistrot_product,
        $catalogue_verriere_destructure_product,
        $catalogue_verriere_acier_sur_mesure_product,
        $catalogue_pergola_aluminium_product,
        $catalogue_pergola_bioclimatique_product,
        $catalogue_pergolanda_product,
        $catalogue_carport_2_poteaux_product,
        $catalogue_carport_aluminium_cintre_product,
        $catalogue_carport_avec_debord_product,
        $catalogue_carport_double_product,
        $catalogue_carport_garage_product,
        $catalogue_carport_toit_plat_product
      );
      foreach ($value_catalogue as $vcp) {
        if ($vcp == "catalogue_portail_product") {
          $checked_product_ .= '<span style="color:#333"><strong>Fiche technique : </strong><a href="'.$shop_base->getBaseURL().'catalogue_pdf/devis_send_catalogue/fiche-technique-portails.pdf" style="color:#337ff1">Portails</a></span><br>';

        } elseif ($vcp == "catalogue_cloture_grillage_rigide_product") {
          $checked_product_ .= '<span style="color:#333"><strong>Fiche technique : </strong><a href="'.$shop_base->getBaseURL().'catalogue_pdf/devis_send_catalogue/fiche-technique-cloture-grillage-rigide-acier.pdf" style="color:#337ff1">Clôture Grillage Rigide</a></span><br>';

        } elseif ($vcp == "catalogue_cloture_aluminium_product") {
          $checked_product_ .= '<span style="color:#333"><strong>Fiche technique : </strong><a href="'.$shop_base->getBaseURL().'catalogue_pdf/devis_send_catalogue/fiche-technique-cloture-aluminium.pdf" style="color:#337ff1">Clôture Aluminium</a></span><br>';

        } elseif ($vcp == "catalogue_porte_garage_battant_product") {
          $checked_product_ .= '<span style="color:#333"><strong>Fiche technique : </strong><a href="'.$shop_base->getBaseURL().'catalogue_pdf/devis_send_catalogue/fiche-technique-porte-garage-a-battant.pdf" style="color:#337ff1">Porte Garage à Battant</a></span><br>';

        } elseif ($vcp == "catalogue_porte_garage_enroulable_product") {
          $checked_product_ .= '<span style="color:#333"><strong>Fiche technique : </strong><a href="'.$shop_base->getBaseURL().'catalogue_pdf/devis_send_catalogue/fiche-technique-porte-garage-enroulable.pdf" style="color:#337ff1">Porte Garage Enroulable</a></span><br>';

        } elseif ($vcp == "catalogue_porte_garage_sectionnelle_product") {
          $checked_product_ .= '<span style="color:#333"><strong>Fiche technique : </strong><a href="'.$shop_base->getBaseURL().'catalogue_pdf/devis_send_catalogue/fiche-technique-porte-garage-sectionnelle.pdf" style="color:#337ff1">Porte de Garage Sectionnelle</a></span><br>';

        } elseif ($vcp == "catalogue_volet_battant_isole_penture_product") {
          $checked_product_ .= '<span style="color:#333"><strong>Fiche technique : </strong><a href="'.$shop_base->getBaseURL().'catalogue_pdf/devis_send_catalogue/fiche-technique-volet-battant-penture-contre-penture.pdf" style="color:#337ff1">Volet Battant Isolé Penture</a></span><br>';

        } elseif ($vcp == "catalogue_volet_battant_isole_pre_cadre_product") {
          $checked_product_ .= '<span style="color:#333"><strong>Fiche technique : </strong><a href="'.$shop_base->getBaseURL().'catalogue_pdf/devis_send_catalogue/fiche-technique-volet-battant-avec-pre-cadre.pdf" style="color:#337ff1">Volet Battant Isolé Pré Cadre</a></span><br>';

        } elseif ($vcp == "catalogue_volet_roulant_product") {
          $checked_product_ .= '<span style="color:#333"><strong>Fiche technique : </strong><a href="'.$shop_base->getBaseURL().'catalogue_pdf/devis_send_catalogue/fiche-technique-volet-roulant.pdf" style="color:#337ff1">Volet Roulant</a></span><br>';

        } elseif ($vcp == "catalogue_bso_product") {
          $checked_product_ .= '<span style="color:#333"><strong>Fiche technique : </strong><a href="'.$shop_base->getBaseURL().'catalogue_pdf/devis_send_catalogue/fiche-technique-volet-battant-bso.pdf" style="color:#337ff1">BSO</a></span><br>';

        } elseif ($vcp == "catalogue_baie_coulissante_product") {
          $checked_product_ .= '<span style="color:#333"><strong>Fiche technique : </strong><a href="'.$shop_base->getBaseURL().'catalogue_pdf/devis_send_catalogue/fiche-technique-baie-coulissante.pdf" style="color:#337ff1">Baie Coulissante</a></span><br>';

        } elseif ($vcp == "catalogue_fenetre_aluminium_frappe_product") {
          $checked_product_ .= '<span style="color:#333"><strong>Fiche technique : </strong><a href="'.$shop_base->getBaseURL().'catalogue_pdf/devis_send_catalogue/fiche-technique-fenetre-a-frappe.pdf" style="color:#337ff1">Fenêtre Aluminium à Frappe</a></span><br>';

        } elseif ($vcp == "catalogue_fenetre_cintree_frappe_product") {
          $checked_product_ .= '<span style="color:#333"><strong>Fiche technique : </strong><a href="'.$shop_base->getBaseURL().'catalogue_pdf/devis_send_catalogue/fiche-technique-fenetre-cintree.pdf" style="color:#337ff1">Fenêtre Cintrée à Frappe</a></span><br>';

        } elseif ($vcp == "catalogue_chassis_fixe_product") {
          $checked_product_ .= '<span style="color:#333"><strong>Fiche technique : </strong><a href="'.$shop_base->getBaseURL().'catalogue_pdf/devis_send_catalogue/fiche-technique-fenetre-fixe.pdf" style="color:#337ff1">Châssis Fixe</a></span><br>';

        } elseif ($vcp == "catalogue_fenetre_pvc_product") {
          $checked_product_ .= '<span style="color:#333"><strong>Fiche technique : </strong><a href="'.$shop_base->getBaseURL().'catalogue_pdf/devis_send_catalogue/fiche-technique-fenetre-pvc.pdf" style="color:#337ff1">Fenêtre PVC</a></span><br>';

        } elseif ($vcp == "catalogue_porte_entree_product") {
          $checked_product_ .= '<span style="color:#333"><strong>Fiche technique : </strong><a href="'.$shop_base->getBaseURL().'catalogue_pdf/devis_send_catalogue/fiche-technique-porte-entree.pdf" style="color:#337ff1">Porte d´Entrée</a></span><br>';

        } elseif ($vcp == "catalogue_verriere_acier_sectionnelle_product") {
          $checked_product_ .= '<span style="color:#333"><strong>Fiche technique : </strong><a href="'.$shop_base->getBaseURL().'catalogue_pdf/devis_send_catalogue/fiche-technique-verriere-acier.pdf" style="color:#337ff1">Verrière Acier</a></span><br>';

        } elseif ($vcp == "catalogue_verriere_miroir_product") {
          $checked_product_ .= '<span style="color:#333"><strong>Fiche technique : </strong><a href="'.$shop_base->getBaseURL().'catalogue_pdf/devis_send_catalogue/fiche-technique-verriere-miroir.pdf" style="color:#337ff1">Verrière Miroir</a></span><br>';

        } elseif ($vcp == "catalogue_porte_verriere_type_atelier_product") {
          $checked_product_ .= '<span style="color:#333"><strong>Fiche technique : </strong><a href="'.$shop_base->getBaseURL().'catalogue_pdf/devis_send_catalogue/fiche-technique-porte-verriere.pdf" style="color:#337ff1">Porte Verrière Type Atelier</a></span><br>';

        } elseif ($vcp == "catalogue_paroi_douche_product") {
          $checked_product_ .= '<span style="color:#333"><strong>Fiche technique : </strong><a href="'.$shop_base->getBaseURL().'catalogue_pdf/devis_send_catalogue/fiche-technique-paroi-de-douche.pdf" style="color:#337ff1">Paroi de Douche</a></span><br>';

        } elseif ($vcp == "catalogue_verriere_orangerie_product") {
          $checked_product_ .= '<span style="color:#333"><strong>Fiche technique : </strong><a href="'.$shop_base->getBaseURL().'catalogue_pdf/devis_send_catalogue/fiche-technique-verriere-orangerie.pdf" style="color:#337ff1">Verrière Orangerie</a></span><br>';

        } elseif ($vcp == "catalogue_verriere_district_product") {
          $checked_product_ .= '<span style="color:#333"><strong>Fiche technique : </strong><a href="'.$shop_base->getBaseURL().'catalogue_pdf/devis_send_catalogue/fiche-technique-verriere-district.pdf" style="color:#337ff1">Verrière Orangerie</a></span><br>';

        } elseif ($vcp == "catalogue_verriere_bistrot_product") {
          $checked_product_ .= '<span style="color:#333"><strong>Fiche technique : </strong><a href="'.$shop_base->getBaseURL().'catalogue_pdf/devis_send_catalogue/fiche-technique-verriere-bistrot.pdf" style="color:#337ff1">Verrière Bistrot</a></span><br>';

        } elseif ($vcp == "catalogue_verriere_destructure_product") {
          $checked_product_ .= '<span style="color:#333"><strong>Fiche technique : </strong><a href="'.$shop_base->getBaseURL().'catalogue_pdf/devis_send_catalogue/fiche-technique-verriere-destructure.pdf" style="color:#337ff1">Verrière Destructuré</a></span><br>';

        } elseif ($vcp == "catalogue_verriere_acier_sur_mesure_product") {
          $checked_product_ .= '<span style="color:#333"><strong>Fiche technique : </strong><a href="'.$shop_base->getBaseURL().'catalogue_pdf/devis_send_catalogue/fiche-technique-verriere-acier-sur-mesure.pdf" style="color:#337ff1">Verrière Acier Sur Mesure</a></span><br>';

        } elseif ($vcp == "catalogue_pergola_aluminium_product") {
          $checked_product_ .= '<span style="color:#333"><strong>Fiche technique : </strong><a href="'.$shop_base->getBaseURL().'catalogue_pdf/devis_send_catalogue/fiche-technique-pergola-aluminium.pdf" style="color:#337ff1">Pergola Aluminium</a></span><br>';

        } elseif ($vcp == "catalogue_pergola_bioclimatique_product") {
          $checked_product_ .= '<span style="color:#333"><strong>Fiche technique : </strong><a href="'.$shop_base->getBaseURL().'catalogue_pdf/devis_send_catalogue/fiche-technique-pergola-bioclimatique.pdf" style="color:#337ff1">Pergola Bioclimatique</a></span><br>';

        } elseif ($vcp == "catalogue_pergolanda_product") {
          $checked_product_ .= '<span style="color:#333"><strong>Fiche technique : </strong><a href="'.$shop_base->getBaseURL().'catalogue_pdf/devis_send_catalogue/fiche-technique-pergolanda.pdf" style="color:#337ff1">Pergolanda</a></span><br>';

        } elseif ($vcp == "catalogue_carport_2_poteaux_product") {
          $checked_product_ .= '<span style="color:#333"><strong>Fiche technique : </strong><a href="'.$shop_base->getBaseURL().'catalogue_pdf/devis_send_catalogue/fiche-technique-carport-2-poteaux.pdf" style="color:#337ff1">Carport 2 Poteaux</a></span><br>';

        } elseif ($vcp == "catalogue_carport_aluminium_cintre_product") {
          $checked_product_ .= '<span style="color:#333"><strong>Fiche technique : </strong><a href="'.$shop_base->getBaseURL().'catalogue_pdf/devis_send_catalogue/fiche-technique-carport-cintre.pdf" style="color:#337ff1">Carport Aluminium Cintré</a></span><br>';

        } elseif ($vcp == "catalogue_carport_avec_debord_product") {
          $checked_product_ .= '<span style="color:#333"><strong>Fiche technique : </strong><a href="'.$shop_base->getBaseURL().'catalogue_pdf/devis_send_catalogue/fiche-technique-carport-avec-debord.pdf" style="color:#337ff1">Carport Avec Débord</a></span><br>';

        } elseif ($vcp == "catalogue_carport_double_product") {
          $checked_product_ .= '<span style="color:#333"><strong>Fiche technique : </strong><a href="'.$shop_base->getBaseURL().'catalogue_pdf/devis_send_catalogue/fiche-technique-carport-double.pdf" style="color:#337ff1">Carport Double</a></span><br>';

        } elseif ($vcp == "catalogue_carport_garage_product") {
          $checked_product_ .= '<span style="color:#333"><strong>Fiche technique : </strong><a href="'.$shop_base->getBaseURL().'catalogue_pdf/devis_send_catalogue/fiche-technique-abri-garage.pdf" style="color:#337ff1">Carport Garage</a></span><br>';

        } elseif ($vcp == "catalogue_carport_toit_plat_product") {
          $checked_product_ .= '<span style="color:#333"><strong>Fiche technique : </strong><a href="'.$shop_base->getBaseURL().'catalogue_pdf/devis_send_catalogue/fiche-technique-carport-toit-plat.pdf" style="color:#337ff1">Carport Toit Plat</a></span><br>';
        }
      }
			$quotation = new QuotationObject();

      $sharecart  = Tools::getValue('sharecart');
      $idcustomer = ShareCart::getidcustomer($quotation->email);
      $link = ShareCart::getlinksahrecart($idcustomer,$oldCart->id);

      $_GET['str_devis'] = $link;
      ob_start();
      require_once(dirname(__FILE__) . '/../../_aluclass/qrcode/index.php');
      $json = ob_get_clean();
      $data_curl = json_decode($json, true);

      $qr_code = $data_curl['qrcode_url'];

			$quotation->id_cart = $newCart->id;
			$quotation->id_customer = $params['context']->customer->id;
			$quotation->first_name = Tools::getValue('first_name');
			$quotation->last_name = Tools::getValue('last_name');
			$quotation->email = Tools::getValue('email');
			$quotation->phone = Tools::getValue('phone');
			$quotation->contacted = Tools::getValue('contacted');
      $generateproductid = Tools::getValue('generateproductid');
			$quotation->date_add = date('Y-m-d H:i:s');
			$quotation->deleted = 1;
      $quotation->link_cart = $link;
      $quotation->link_qrcode = $qr_code;
			$quotation->add();



			$quotation->ref_quotation = Configuration::get('PDFQUOTATION_PREFIX').sprintf('%07d', $quotation->id);
			$quotation->update();
      $products_cart = Context::getContext()->cart->getProducts();
      foreach($products_cart as $product){
        $sql = "INSERT INTO `" . _DB_PREFIX_ . "devis_product_historic` (`ref_quotation`,`date_add`,`id_product`,`id_cart`,`rate`) VALUES ('".$quotation->ref_quotation."',now(),'".$product['id_product']."','".$quotation->id_cart."','".$product['rate']."')";
        $sc_rappel = Db::getInstance(_PS_USE_SQL_SLAVE_)->execute($sql);
      }

      $type_conversion  = null;
      $code_conversion = null;
      $date_conversion = null;
      $name_conversion = null;

      if (isset($_COOKIE["PBCLID"])) {
        $type_conversion  = $_COOKIE["PBCLKID_TYPE"];
        $code_conversion = $_COOKIE["PBCLID"];
        $date_conversion = $_COOKIE["PBCLKID_DATE"];
        $name_conversion = 'Lead';
      }

      $sql = "INSERT INTO `sc_rappel` (`sc_rappel_nom`,`sc_rappel_tel`,`sc_rappel_email`,`sc_rappel_type`,`sc_rappel_devis_id`,`type_conversion`,`code_conversion`,`date_conversion`,`name_conversion`,`sc_rappel_email_comercial`)
      VALUES ('".$quotation->last_name."','".$quotation->phone."','".$quotation->email."','devis','".$quotation->id."','".$type_conversion."','".$code_conversion."','".$date_conversion."','".$name_conversion."','".$emailcomercial."'); ";
			$sc_rappel = Db::getInstance(_PS_USE_SQL_SLAVE_)->execute($sql);

      if($emailcomercial == 'undefined'){
        $emailcomercial = null;
      }
      if($emailcomercial){

        $arrayPOSTSMS = array(
          "token" => "d7a03fee5546592a37e22ff8f45bbbe45da4632dfed9a774e085d0e8b5d3fa73",
          "o" => "sendcoupon",
          "codemensage" => "84",
          "nom" => $quotation->last_name,
          "conseillere" => '',
          "devis" => "https://priximbattable.net/img/quotation/D0".$quotation->id.'.pdf',
          "email" => $emailcomercial,
          "phone" => str_replace('+', '00', $quotation->phone),
        );
          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL, "https://gestao.eu/api/index.php");
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
          curl_setopt($ch, CURLOPT_POSTFIELDS, $arrayPOSTSMS);
          curl_setopt($ch, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
          curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
          $data = curl_exec($ch);
      }

			//Generate PDF
			$pdf = new PDF($quotation, 'Quotation', $params['context']->smarty);

			/*I Render Method of PDF Class (I can't override this method else it's for all pdf: invoice, OrderReturn... */
			$render = false;
			$pdf->pdf_renderer->setFontForLang(Context::getContext()->language->iso_code);
			foreach ($pdf->objects as $object)
			{
				$template = $pdf->getTemplateObject($object);
				if (!$template)
					continue;

				if (empty($pdf->filename))
				{
					$pdf->filename = $template->getFilename();
					if (count($pdf->objects) > 1)
						$pdf->filename = $template->getBulkFilename();
				}

				$template->assignHookData($object);

				$pdf->pdf_renderer->setListIndentWidth(4);

				$htmlstring = json_decode(Tools::getValue('htmlstring'));

        $arrayproductinfo = array();

        if($generateproductid > 0){

          $newporduct = new Product($generateproductid, false, 1);
          $arrayproduct = array();
          $arrayproduct[0]['description_short'] = $newporduct->description_short;
          $arrayproduct[0]['id_product'] = $generateproductid;
          $arrayproduct[0]['cart_quantity'] = 1;
          $portes =AluclassCarrier::getCarrierPrice($arrayproduct);

          $arrayproductinfo['description'] =  $newporduct->description;
          $arrayproductinfo['price'] = $newporduct->price;

          $arrayproductinfo['portes'] = $portes;


        }else{
          $arrayporte = AluclassCarrier::getCarrierBeginPrice($htmlstring->idprod);
          $arrayproductinfo['description'] = '';
          $arrayproductinfo['price'] = false;
          if($arrayporte['free_shipping']){
            $arrayproductinfo['portes'] = false;
          }else{
            $arrayproductinfo['portes'] = $arrayporte['porteprice'];
          }
        }


				$targetFolder = '/modules/pdfquotation/views/img/';
				$targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;

				  $filemainImg = $htmlstring->imgProd[0];
                if(count($htmlstring->imgProd) > 1){
					$mainImg = imagecreatetruecolor(400, 400);
					$white = imagecolorallocate($mainImg, 255, 255, 255);
					imagefill($mainImg, 0, 0, $white);
					for($i = 0;$i<count($htmlstring->imgProd);$i++ ){
						$secImg = PDFQuotation::imageCreate($htmlstring->imgProd[$i]);
						$secImgX = imagesx($secImg);
						$secImgY = imagesy($secImg);
						imagecopyresized($mainImg, $secImg, 0, 0, 0, 0, 400, 400, $secImgX, $secImgY);
					}
					$filemainImg =$targetPath .round(microtime(true)).'.png';
					imagepng($mainImg, $filemainImg);
					imagedestroy($mainImg);
					imagedestroy($secImg);
				}

				$pdf->pdf_renderer->createHeader($template->getHeader());
				$pdf->pdf_renderer->createFooter($template->getFooter());
				$pdf->pdf_renderer->createContent($template->getContentProd($htmlstring->productname,$arrayproductinfo['price'],$arrayproductinfo['description'], $filemainImg , $generateproductid > 0 ? $generateproductid : $htmlstring->idprod,$arrayproductinfo['portes']) );
				$pdf->pdf_renderer->SetAutoPageBreak(true, Configuration::get('PDFQUOTATION_MARGIN_FOOTER')+10);
				$pdf->pdf_renderer->SetFooterMargin(Configuration::get('PDFQUOTATION_MARGIN_FOOTER'));
				$pdf->pdf_renderer->setMargins(10, Configuration::get('PDFQUOTATION_MARGIN_HEADER'), 10);
				$pdf->pdf_renderer->AddPage();
				$pdf->pdf_renderer->writeHTML($pdf->pdf_renderer->content, true, false, false, false, '');

				$render = true;

				unset($template);
        unlink($filemainImg);

			}

			if ($render)
			{
				//Clean the output buffer
				if (ob_get_level() && ob_get_length() > 0)
					ob_clean();

				$shop = new Shop(Context::getContext()->shop->id);
				$contacted = Tools::getValue('contacted')=="1"?$this->l('Yes'):$this->l('No');
        $idcustomer = ShareCart::getidcustomer($quotation->email);
        $link       = ShareCart::getlinksahrecart($idcustomer,$oldCart->id);

				$vars = array(
					'{firstname}' => Tools::getValue('first_name'),
					'{lastname}' => Tools::getValue('last_name'),
					'{phone}' => Tools::getValue('phone'),
					'{email}' => Tools::getValue('email'),
					'{contacted}' => $contacted,
					'{url}' => $shop->getBaseURL()."img/quotation/".$pdf->filename,
          '{link}' => $link,
          '{value_catalogue}' => $checked_product_
				);

        if($emailcomercial == 'undefined'){
          $emailcomercial = null;
        }

        Mail::Send(
          Context::getContext()->language->id,
          'quotation_link_cat',
          $this->l('New Quotation'),
          $vars,
          $vars['{email}'],
          null,
          null,
          null,
          null,
          null,
          _PS_MODULE_DIR_."pdfquotation/mails/",
          _PS_MAIL_DIR_, //mode smtp 12
          false,//mode smtp 13
          ($emailcomercial ? $emailcomercial : null), //mode smtp 14
        );
	// 			Before Prestashop 1.6.1.5
	//			$content = '<div style="font-size:11px">';
	//				$content = "<strong>".$this->l('A new quotation is arrived. All information')." : <br /><br /></strong>";
	//				$content .= $this->l('First Name')." : ".Tools::getValue('first_name')."<br />";
	//				$content .= $this->l('Last Name')." : ".Tools::getValue('last_name')."<br />";
	//				$content .= $this->l('Phone')." : ".Tools::getValue('phone')."<br />";
	//				$content .= $this->l('Email')." : ".Tools::getValue('email')."<br />";
	//				$content .= $this->l('To be contacted again')." : ".$contacted."<br />";
	//				$content .= $this->l('URL')." : ".'<a href="'.$shop->getBaseURL()."img/quotation/".$pdf->filename.'">'.$this->l('See Quotation')."</a><br />";
	//			$content .= '</div>';

				if (Configuration::get('PDFQUOTATION_SEND_MAIL') == 1 && Validate::isEmail(Configuration::get('PDFQUOTATION_MAIL'))) {
					//Before Prestashop 1.6.1.5
					//Mail::Send($content, $this->l('New Quotation') . " - " . date("d-m-Y", time()), 'text/html', Configuration::get('PDFQUOTATION_MAIL'), Tools::getValue('email'));

					Mail::Send(
						Context::getContext()->language->id,
						'quotation',
						$this->l('New Quotation'),
						$vars,
						Configuration::get('PDFQUOTATION_MAIL'),
						null,
						null,
						null,
						null,
						null,
						_PS_MODULE_DIR_."pdfquotation/mails/",
						false,
						null
					);
				}

				$pdf2 = clone $pdf->pdf_renderer;
				$pdf->pdf_renderer->render(_PS_QUOTATION_DIR_.$pdf->filename, 'F');
				return $pdf2->render($pdf->filename, 'D');
			}

	}

    public function hookAjaxCall($params)
	{


		//Redirect Order process if one information required is missing
		if(Tools::getValue('first_name') == "" || Tools::getValue('last_name') == "" || Tools::getValue('email') == "" ||
			Tools::getValue('phone') == "" || Tools::getValue('contacted') == "" || Tools::getValue('spam') != "") {

			Tools::redirect('index.php?controller=order&error-pdf=1');
		}

		//Duplicate cart in order to isolate cart product at the moment where customer generate quotation else customer can
		//add new product to current cart after quotation was generated
		 $oldCart = $params['context']->cart;
		// $newCart = clone $oldCart;
		// $newCart->id = null;
		// $newCart->save();


		// foreach($oldCart->getProducts() as $product) {
		//  //  $newCart->updateQty($product["cart_quantity"], $product["id_product"], $product["id_product_attribute"]);
		// }


		//Save Quotation
    $emailcomercial = Tools::getValue('emailcomercial');
    $catalogue_portail = Tools::getValue('catalogue_portail_checked');
    $catalogue_cloture_grillage_rigide = Tools::getValue('catalogue_cloture_grillage_rigide_checked');
    $catalogue_cloture_aluminium = Tools::getValue('catalogue_cloture_aluminium_checked');
    $catalogue_porte_garage_battant = Tools::getValue('catalogue_porte_garage_battant_checked');
    $catalogue_porte_garage_enroulable = Tools::getValue('catalogue_porte_garage_enroulable_checked');
    $catalogue_porte_garage_sectionnelle = Tools::getValue('catalogue_porte_garage_sectionnelle_checked');
    $catalogue_volet_battant_isole_penture = Tools::getValue('catalogue_volet_battant_isole_penture_checked');
    $catalogue_volet_battant_isole_pre_cadre = Tools::getValue('catalogue_volet_battant_isole_pre_cadre_checked');
    $catalogue_volet_roulant = Tools::getValue('catalogue_volet_roulant_checked');
    $catalogue_bso = Tools::getValue('catalogue_bso_checked');
    $catalogue_baie_coulissante = Tools::getValue('catalogue_baie_coulissante_checked');
    $catalogue_fenetre_aluminium_frappe = Tools::getValue('catalogue_fenetre_aluminium_frappe_checked');
    $catalogue_fenetre_cintree_frappe = Tools::getValue('catalogue_fenetre_cintree_frappe_checked');
    $catalogue_chassis_fixe = Tools::getValue('catalogue_chassis_fixe_checked');
    $catalogue_fenetre_pvc = Tools::getValue('catalogue_fenetre_pvc_checked');
    $catalogue_porte_entree = Tools::getValue('catalogue_porte_entree_checked');
    $catalogue_verriere_acier_sectionnelle = Tools::getValue('catalogue_verriere_acier_sectionnelle_checked');
    $catalogue_verriere_miroir = Tools::getValue('catalogue_verriere_miroir_checked');
    $catalogue_porte_verriere_type_atelier = Tools::getValue('catalogue_porte_verriere_type_atelier_checked');
    $catalogue_paroi_douche = Tools::getValue('catalogue_paroi_douche_checked');
    $catalogue_verriere_orangerie = Tools::getValue('catalogue_verriere_orangerie_checked');
    $catalogue_verriere_district = Tools::getValue('catalogue_verriere_district_checked');
    $catalogue_verriere_bistrot = Tools::getValue('catalogue_verriere_bistrot_checked');
    $catalogue_verriere_destructure = Tools::getValue('catalogue_verriere_destructure_checked');
    $catalogue_verriere_acier_sur_mesure = Tools::getValue('catalogue_verriere_acier_sur_mesure_checked');
    $catalogue_pergola_aluminium = Tools::getValue('catalogue_pergola_aluminium_checked');
    $catalogue_pergola_bioclimatique = Tools::getValue('catalogue_pergola_bioclimatique_checked');
    $catalogue_pergolanda = Tools::getValue('catalogue_pergolanda_checked');
    $catalogue_carport_2_poteaux = Tools::getValue('catalogue_carport_2_poteaux_checked');
    $catalogue_carport_aluminium_cintre = Tools::getValue('catalogue_carport_aluminium_cintre_checked');
    $catalogue_carport_avec_debord = Tools::getValue('catalogue_carport_avec_debord_checked');
    $catalogue_carport_double = Tools::getValue('catalogue_carport_double_checked');
    $catalogue_carport_garage = Tools::getValue('catalogue_carport_garage_checked');
    $catalogue_carport_toit_plat = Tools::getValue('catalogue_carport_toit_plat_checked');
    $value_catalogue = array();
    $shop_base = new Shop(Context::getContext()->shop->id);
    $checked_ = '';
    array_push(
      $value_catalogue,
      $catalogue_portail,
      $catalogue_cloture_grillage_rigide,
      $catalogue_cloture_aluminium,
      $catalogue_porte_garage_battant,
      $catalogue_porte_garage_enroulable,
      $catalogue_porte_garage_sectionnelle,
      $catalogue_volet_battant_isole_penture,
      $catalogue_volet_battant_isole_pre_cadre,
      $catalogue_volet_roulant,
      $catalogue_bso,
      $catalogue_baie_coulissante,
      $catalogue_fenetre_aluminium_frappe,
      $catalogue_fenetre_cintree_frappe,
      $catalogue_chassis_fixe,
      $catalogue_fenetre_pvc,
      $catalogue_porte_entree,
      $catalogue_verriere_acier_sectionnelle,
      $catalogue_verriere_miroir,
      $catalogue_porte_verriere_type_atelier,
      $catalogue_paroi_douche,
      $catalogue_verriere_orangerie,
      $catalogue_verriere_district,
      $catalogue_verriere_bistrot,
      $catalogue_verriere_destructure,
      $catalogue_verriere_acier_sur_mesure,
      $catalogue_pergola_aluminium,
      $catalogue_pergola_bioclimatique,
      $catalogue_pergolanda,
      $catalogue_carport_2_poteaux,
      $catalogue_carport_aluminium_cintre,
      $catalogue_carport_avec_debord,
      $catalogue_carport_double,
      $catalogue_carport_garage,
      $catalogue_carport_toit_plat
    );

    foreach ($value_catalogue as $vc) {
      if ($vc == "catalogue_portail") {
        $checked_ .= '<span style="color:#333"><strong>Fiche technique : </strong><a href="'.$shop_base->getBaseURL().'catalogue_pdf/devis_send_catalogue/fiche-technique-portails.pdf" style="color:#337ff1">Portails</a></span><br>';

      } elseif ($vc == "catalogue_cloture_grillage_rigide") {
        $checked_ .= '<span style="color:#333"><strong>Fiche technique : </strong><a href="'.$shop_base->getBaseURL().'catalogue_pdf/devis_send_catalogue/fiche-technique-cloture-grillage-rigide-acier.pdf" style="color:#337ff1">Clôture Grillage Rigide</a></span><br>';

      } elseif ($vc == "catalogue_cloture_aluminium") {
        $checked_ .= '<span style="color:#333"><strong>Fiche technique : </strong><a href="'.$shop_base->getBaseURL().'catalogue_pdf/devis_send_catalogue/fiche-technique-cloture-aluminium.pdf" style="color:#337ff1">Clôture Aluminium</a></span><br>';

      } elseif ($vc == "catalogue_porte_garage_battant") {
        $checked_ .= '<span style="color:#333"><strong>Fiche technique : </strong><a href="'.$shop_base->getBaseURL().'catalogue_pdf/devis_send_catalogue/fiche-technique-porte-garage-a-battant.pdf" style="color:#337ff1">Porte Garage à Battant</a></span><br>';

      } elseif ($vc == "catalogue_porte_garage_enroulable") {
        $checked_ .= '<span style="color:#333"><strong>Fiche technique : </strong><a href="'.$shop_base->getBaseURL().'catalogue_pdf/devis_send_catalogue/fiche-technique-porte-garage-enroulable.pdf" style="color:#337ff1">Porte Garage Enroulable</a></span><br>';

      } elseif ($vc == "catalogue_porte_garage_sectionnelle") {
        $checked_ .= '<span style="color:#333"><strong>Fiche technique : </strong><a href="'.$shop_base->getBaseURL().'catalogue_pdf/devis_send_catalogue/fiche-technique-porte-garage-sectionnelle.pdf" style="color:#337ff1">Porte de Garage Sectionnelle</a></span><br>';

      } elseif ($vc == "catalogue_volet_battant_isole_penture") {
        $checked_ .= '<span style="color:#333"><strong>Fiche technique : </strong><a href="'.$shop_base->getBaseURL().'catalogue_pdf/devis_send_catalogue/fiche-technique-volet-battant-penture-contre-penture.pdf" style="color:#337ff1">Volet Battant Isolé Penture</a></span><br>';

      } elseif ($vc == "catalogue_volet_battant_isole_pre_cadre") {
        $checked_ .= '<span style="color:#333"><strong>Fiche technique : </strong><a href="'.$shop_base->getBaseURL().'catalogue_pdf/devis_send_catalogue/fiche-technique-volet-battant-avec-pre-cadre.pdf" style="color:#337ff1">Volet Battant Isolé Pré Cadre</a></span><br>';

      } elseif ($vc == "catalogue_volet_roulant") {
        $checked_ .= '<span style="color:#333"><strong>Fiche technique : </strong><a href="'.$shop_base->getBaseURL().'catalogue_pdf/devis_send_catalogue/fiche-technique-volet-roulant.pdf" style="color:#337ff1">Volet Roulant</a></span><br>';

      } elseif ($vc == "catalogue_bso") {
        $checked_ .= '<span style="color:#333"><strong>Fiche technique : </strong><a href="'.$shop_base->getBaseURL().'catalogue_pdf/devis_send_catalogue/fiche-technique-volet-battant-bso.pdf" style="color:#337ff1">BSO</a></span><br>';

      } elseif ($vc == "catalogue_baie_coulissante") {
        $checked_ .= '<span style="color:#333"><strong>Fiche technique : </strong><a href="'.$shop_base->getBaseURL().'catalogue_pdf/devis_send_catalogue/fiche-technique-baie-coulissante.pdf" style="color:#337ff1">Baie Coulissante</a></span><br>';

      } elseif ($vc == "catalogue_fenetre_aluminium_frappe") {
        $checked_ .= '<span style="color:#333"><strong>Fiche technique : </strong><a href="'.$shop_base->getBaseURL().'catalogue_pdf/devis_send_catalogue/fiche-technique-fenetre-a-frappe.pdf" style="color:#337ff1">Fenêtre Aluminium à Frappe</a></span><br>';

      } elseif ($vc == "catalogue_fenetre_cintree_frappe") {
        $checked_ .= '<span style="color:#333"><strong>Fiche technique : </strong><a href="'.$shop_base->getBaseURL().'catalogue_pdf/devis_send_catalogue/fiche-technique-fenetre-cintree.pdf" style="color:#337ff1">Fenêtre Cintrée à Frappe</a></span><br>';

      } elseif ($vc == "catalogue_chassis_fixe") {
        $checked_ .= '<span style="color:#333"><strong>Fiche technique : </strong><a href="'.$shop_base->getBaseURL().'catalogue_pdf/devis_send_catalogue/fiche-technique-fenetre-fixe.pdf" style="color:#337ff1">Châssis Fixe</a></span><br>';

      } elseif ($vc == "catalogue_fenetre_pvc") {
        $checked_ .= '<span style="color:#333"><strong>Fiche technique : </strong><a href="'.$shop_base->getBaseURL().'catalogue_pdf/devis_send_catalogue/fiche-technique-fenetre-pvc.pdf" style="color:#337ff1">Fenêtre PVC</a></span><br>';

      } elseif ($vc == "catalogue_porte_entree") {
        $checked_ .= '<span style="color:#333"><strong>Fiche technique : </strong><a href="'.$shop_base->getBaseURL().'catalogue_pdf/devis_send_catalogue/fiche-technique-porte-entree.pdf" style="color:#337ff1">Porte d´Entrée</a></span><br>';

      } elseif ($vc == "catalogue_verriere_acier_sectionnelle") {
        $checked_ .= '<span style="color:#333"><strong>Fiche technique : </strong><a href="'.$shop_base->getBaseURL().'catalogue_pdf/devis_send_catalogue/fiche-technique-verriere-acier.pdf" style="color:#337ff1">Verrière Acier</a></span><br>';

      } elseif ($vc == "catalogue_verriere_miroir") {
        $checked_ .= '<span style="color:#333"><strong>Fiche technique : </strong><a href="'.$shop_base->getBaseURL().'catalogue_pdf/devis_send_catalogue/fiche-technique-verriere-miroir.pdf" style="color:#337ff1">Verrière Miroir</a></span><br>';

      } elseif ($vc == "catalogue_porte_verriere_type_atelier") {
        $checked_ .= '<span style="color:#333"><strong>Fiche technique : </strong><a href="'.$shop_base->getBaseURL().'catalogue_pdf/devis_send_catalogue/fiche-technique-porte-verriere.pdf" style="color:#337ff1">Porte Verrière Type Atelier</a></span><br>';

      } elseif ($vc == "catalogue_paroi_douche") {
        $checked_ .= '<span style="color:#333"><strong>Fiche technique : </strong><a href="'.$shop_base->getBaseURL().'catalogue_pdf/devis_send_catalogue/fiche-technique-paroi-de-douche.pdf" style="color:#337ff1">Paroi de Douche</a></span><br>';

      } elseif ($vc == "catalogue_verriere_orangerie") {
        $checked_ .= '<span style="color:#333"><strong>Fiche technique : </strong><a href="'.$shop_base->getBaseURL().'catalogue_pdf/devis_send_catalogue/fiche-technique-verriere-orangerie.pdf" style="color:#337ff1">Verrière Orangerie</a></span><br>';

      } elseif ($vc == "catalogue_verriere_district") {
        $checked_ .= '<span style="color:#333"><strong>Fiche technique : </strong><a href="'.$shop_base->getBaseURL().'catalogue_pdf/devis_send_catalogue/fiche-technique-verriere-district.pdf" style="color:#337ff1">Verrière Orangerie</a></span><br>';

      } elseif ($vc == "catalogue_verriere_bistrot") {
        $checked_ .= '<span style="color:#333"><strong>Fiche technique : </strong><a href="'.$shop_base->getBaseURL().'catalogue_pdf/devis_send_catalogue/fiche-technique-verriere-bistrot.pdf" style="color:#337ff1">Verrière Bistrot</a></span><br>';

      } elseif ($vc == "catalogue_verriere_destructure") {
        $checked_ .= '<span style="color:#333"><strong>Fiche technique : </strong><a href="'.$shop_base->getBaseURL().'catalogue_pdf/devis_send_catalogue/fiche-technique-verriere-destructure.pdf" style="color:#337ff1">Verrière Destructuré</a></span><br>';

      } elseif ($vc == "catalogue_verriere_acier_sur_mesure") {
        $checked_ .= '<span style="color:#333"><strong>Fiche technique : </strong><a href="'.$shop_base->getBaseURL().'catalogue_pdf/devis_send_catalogue/fiche-technique-verriere-acier-sur-mesure.pdf" style="color:#337ff1">Verrière Acier Sur Mesure</a></span><br>';

      } elseif ($vc == "catalogue_pergola_aluminium") {
        $checked_ .= '<span style="color:#333"><strong>Fiche technique : </strong><a href="'.$shop_base->getBaseURL().'catalogue_pdf/devis_send_catalogue/fiche-technique-pergola-aluminium.pdf" style="color:#337ff1">Pergola Aluminium</a></span><br>';

      } elseif ($vc == "catalogue_pergola_bioclimatique") {
        $checked_ .= '<span style="color:#333"><strong>Fiche technique : </strong><a href="'.$shop_base->getBaseURL().'catalogue_pdf/devis_send_catalogue/fiche-technique-pergola-bioclimatique.pdf" style="color:#337ff1">Pergola Bioclimatique</a></span><br>';

      } elseif ($vc == "catalogue_pergolanda") {
        $checked_ .= '<span style="color:#333"><strong>Fiche technique : </strong><a href="'.$shop_base->getBaseURL().'catalogue_pdf/devis_send_catalogue/fiche-technique-pergolanda.pdf" style="color:#337ff1">Pergolanda</a></span><br>';

      } elseif ($vc == "catalogue_carport_2_poteaux") {
        $checked_ .= '<span style="color:#333"><strong>Fiche technique : </strong><a href="'.$shop_base->getBaseURL().'catalogue_pdf/devis_send_catalogue/fiche-technique-carport-2-poteaux.pdf" style="color:#337ff1">Carport 2 Poteaux</a></span><br>';

      } elseif ($vc == "catalogue_carport_aluminium_cintre") {
        $checked_ .= '<span style="color:#333"><strong>Fiche technique : </strong><a href="'.$shop_base->getBaseURL().'catalogue_pdf/devis_send_catalogue/fiche-technique-carport-cintre.pdf" style="color:#337ff1">Carport Aluminium Cintré</a></span><br>';

      } elseif ($vc == "catalogue_carport_avec_debord") {
        $checked_ .= '<span style="color:#333"><strong>Fiche technique : </strong><a href="'.$shop_base->getBaseURL().'catalogue_pdf/devis_send_catalogue/fiche-technique-carport-avec-debord.pdf" style="color:#337ff1">Carport Avec Débord</a></span><br>';

      } elseif ($vc == "catalogue_carport_double") {
        $checked_ .= '<span style="color:#333"><strong>Fiche technique : </strong><a href="'.$shop_base->getBaseURL().'catalogue_pdf/devis_send_catalogue/fiche-technique-carport-double.pdf" style="color:#337ff1">Carport Double</a></span><br>';

      } elseif ($vc == "catalogue_carport_garage") {
        $checked_ .= '<span style="color:#333"><strong>Fiche technique : </strong><a href="'.$shop_base->getBaseURL().'catalogue_pdf/devis_send_catalogue/fiche-technique-abri-garage.pdf" style="color:#337ff1">Carport Garage</a></span><br>';

      } elseif ($vc == "catalogue_carport_toit_plat") {
        $checked_ .= '<span style="color:#333"><strong>Fiche technique : </strong><a href="'.$shop_base->getBaseURL().'catalogue_pdf/devis_send_catalogue/fiche-technique-carport-toit-plat.pdf" style="color:#337ff1">Carport Toit Plat</a></span><br>';
      }
    }

		$quotation = new QuotationObject();
    $sharecart  = Tools::getValue('sharecart');
    $idcustomer = ShareCart::getidcustomer($quotation->email);
    $link = ShareCart::getlinksahrecart($idcustomer,$oldCart->id);

    $_GET['str_devis'] = $link;
    ob_start();
    require_once(dirname(__FILE__) . '/../../_aluclass/qrcode/index.php');
    $json = ob_get_clean();
    $data_curl = json_decode($json, true);

    $qr_code = $data_curl['qrcode_url'];

		$quotation->id_cart = $oldCart->id;
		$quotation->id_customer = $params['context']->customer->id;
		$quotation->first_name = Tools::getValue('first_name');
		$quotation->last_name = Tools::getValue('last_name');
		$quotation->email = Tools::getValue('email');
		$quotation->phone = Tools::getValue('phone');
		$quotation->contacted = Tools::getValue('contacted');
		$quotation->date_add = date('Y-m-d H:i:s');
		$quotation->deleted = 1;
    $quotation->link_cart = $link;
    $quotation->link_qrcode = $qr_code;
		$quotation->add();


    $idcustomer = ShareCart::getidcustomer($quotation->email);
    $link       = ShareCart::getlinksahrecart($idcustomer,$oldCart->id);


		$quotation->ref_quotation = Configuration::get('PDFQUOTATION_PREFIX').sprintf('%07d', $quotation->id);
		$quotation->update();
    $products_cart = Context::getContext()->cart->getProducts();
    foreach($products_cart as $product){
      $sql = "INSERT INTO `" . _DB_PREFIX_ . "devis_product_historic` (`ref_quotation`,`date_add`,`id_product`,`id_cart`,`rate`) VALUES ('".$quotation->ref_quotation."',now(),'".$product['id_product']."','".$quotation->id_cart."','".$product['rate']."')";
      $sc_rappel = Db::getInstance(_PS_USE_SQL_SLAVE_)->execute($sql);
    }

    $type_conversion  = null;
    $code_conversion = null;
    $date_conversion = null;
    $name_conversion = null;

    if (isset($_COOKIE["PBCLID"])) {
      $type_conversion  = $_COOKIE["PBCLKID_TYPE"];
      $code_conversion = $_COOKIE["PBCLID"];
      $date_conversion = $_COOKIE["PBCLKID_DATE"];
      $name_conversion = 'Lead';
    }

    $sql = "INSERT INTO `sc_rappel` (`sc_rappel_nom`,`sc_rappel_tel`,`sc_rappel_email`,`sc_rappel_type`,`sc_rappel_link_cart`,`sc_rappel_devis_id`,`type_conversion`,`code_conversion`,`date_conversion`,`name_conversion`,`sc_rappel_email_comercial`)
     VALUES ('".$quotation->last_name."','".$quotation->phone."','".$quotation->email."','devis','".$link."','".$quotation->id."','".$type_conversion."','".$code_conversion."','".$date_conversion."','".$name_conversion."','".$emailcomercial."'); ";
    $sc_rappel = Db::getInstance(_PS_USE_SQL_SLAVE_)->execute($sql);

    if($emailcomercial == 'undefined'){
      $emailcomercial = null;
    }
    if($emailcomercial){

      $arrayPOSTSMS = array(
        "token" => "d7a03fee5546592a37e22ff8f45bbbe45da4632dfed9a774e085d0e8b5d3fa73",
        "o" => "sendcoupon",
        "codemensage" => "84",
        "nom" => $quotation->last_name,
        "conseillere" => '',
        "devis" => "https://priximbattable.net/img/quotation/D0".$quotation->id.'.pdf',
        "email" => $emailcomercial,
        "phone" => str_replace('+', '00', $quotation->phone),
      );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://gestao.eu/api/index.php");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $arrayPOSTSMS);
        curl_setopt($ch, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        $data = curl_exec($ch);
    }

		//Generate PDF
    $pdf = new PDF($quotation, 'Quotation', $params['context']->smarty);

    /*I Render Method of PDF Class (I can't override this method else it's for all pdf: invoice, OrderReturn... */
    $render = false;
		$pdf->pdf_renderer->setFontForLang(Context::getContext()->language->iso_code);
		foreach ($pdf->objects as $object)
		{
			$template = $pdf->getTemplateObject($object);
			if (!$template)
				continue;

			if (empty($pdf->filename))
			{
				$pdf->filename = $template->getFilename();
				if (count($pdf->objects) > 1)
					$pdf->filename = $template->getBulkFilename();
			}

			$template->assignHookData($object);

      $pdf->pdf_renderer->setListIndentWidth(4);

			$pdf->pdf_renderer->createHeader($template->getHeader());
			$pdf->pdf_renderer->createFooter($template->getFooter());
			$pdf->pdf_renderer->createContent($template->getContent());
      $pdf->pdf_renderer->SetAutoPageBreak(true, Configuration::get('PDFQUOTATION_MARGIN_FOOTER')+10);
      $pdf->pdf_renderer->SetFooterMargin(Configuration::get('PDFQUOTATION_MARGIN_FOOTER'));
      $pdf->pdf_renderer->setMargins(10, Configuration::get('PDFQUOTATION_MARGIN_HEADER'), 10);
      $pdf->pdf_renderer->AddPage();
      $pdf->pdf_renderer->writeHTML($pdf->pdf_renderer->content, true, false, false, false, '');

			$render = true;

			unset($template);
		}

		if ($render)
		{
			//Clean the output buffer
			if (ob_get_level() && ob_get_length() > 0)
				ob_clean();

			$shop = new Shop(Context::getContext()->shop->id);
			$contacted = Tools::getValue('contacted')=="1"?$this->l('Yes'):$this->l('No');

			$vars = array(
				'{firstname}' => Tools::getValue('first_name'),
				'{lastname}' => Tools::getValue('last_name'),
				'{phone}' => Tools::getValue('phone'),
				'{email}' => Tools::getValue('email'),
				'{contacted}' => $contacted,
				'{url}' => $shop->getBaseURL()."img/quotation/".$pdf->filename,
        '{link}' => $link,
        '{value_catalogue}' => $checked_
			);


      if($emailcomercial == 'undefined'){
        $emailcomercial = null;
      }

      Mail::Send(
        Context::getContext()->language->id,
        'quotation_link_cat',
        $this->l('New Quotation'),
        $vars,
        $vars['{email}'],
        null,
        null,
        null,
        null,
        null,
        _PS_MODULE_DIR_."pdfquotation/mails/",
        _PS_MAIL_DIR_, //mode smtp 12
        false,//mode smtp 13
        ($emailcomercial ? $emailcomercial : null), //mode smtp 14
      );

// 			Before Prestashop 1.6.1.5
//			$content = '<div style="font-size:11px">';
//				$content = "<strong>".$this->l('A new quotation is arrived. All information')." : <br /><br /></strong>";
//				$content .= $this->l('First Name')." : ".Tools::getValue('first_name')."<br />";
//				$content .= $this->l('Last Name')." : ".Tools::getValue('last_name')."<br />";
//				$content .= $this->l('Phone')." : ".Tools::getValue('phone')."<br />";
//				$content .= $this->l('Email')." : ".Tools::getValue('email')."<br />";
//				$content .= $this->l('To be contacted again')." : ".$contacted."<br />";
//				$content .= $this->l('URL')." : ".'<a href="'.$shop->getBaseURL()."img/quotation/".$pdf->filename.'">'.$this->l('See Quotation')."</a><br />";
//			$content .= '</div>';

			// if (Configuration::get('PDFQUOTATION_SEND_MAIL') == 1 && Validate::isEmail(Configuration::get('PDFQUOTATION_MAIL'))) {
			// 	//Before Prestashop 1.6.1.5
			// 	//Mail::Send($content, $this->l('New Quotation') . " - " . date("d-m-Y", time()), 'text/html', Configuration::get('PDFQUOTATION_MAIL'), Tools::getValue('email'));

			// 	Mail::Send(
			// 		Context::getContext()->language->id,
			// 		'quotation',
			// 		$this->l('New Quotation'),
			// 		$vars,
			// 		Configuration::get('PDFQUOTATION_MAIL'),
			// 		null,
			// 		null,
			// 		null,
			// 		null,
			// 		null,
			// 		_PS_MODULE_DIR_."pdfquotation/mails/",
			// 		false,
			// 		null
			// 	);
			// }

			$pdf2 = clone $pdf->pdf_renderer;
			$pdf->pdf_renderer->render(_PS_QUOTATION_DIR_.$pdf->filename, 'F');
			return $pdf2->render($pdf->filename, 'D');
		}
	}

	public function hookDisplayCustomerAccount() {
		$this->context->smarty->assign('base_dir', _PS_BASE_URL_);
		return $this->display(__FILE__, 'views/templates/hook/customer_account.tpl');
	}
}
