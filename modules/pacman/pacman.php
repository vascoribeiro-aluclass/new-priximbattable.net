<?php
if (!defined('_PS_VERSION_'))
    exit();

class pacman extends Module
{
    public function __construct()
    {
        $this->name = 'pacman';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Assist Software';
        $this->need_instance = 1;
        $this->ps_versions_compliancy = array('min' => '1.7.1.0', 'max' => _PS_VERSION_);
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Games', 'pacman');
        $this->description = $this->l('This module is developed to display Pacman.', 'pacman');

        $this->confirmUninstall = $this->l('Are you sure you want to uninstall?', 'pacman');
    }

    public function install()
    {
        if (Shop::isFeatureActive())
            Shop::setContext(Shop::CONTEXT_ALL);

        return parent::install() &&
            $this->registerHook('displayHome') && Configuration::updateValue('pacman_url', 'wlsdMpnDBn8');
    }

    public function uninstall()
    {
        if (!parent::uninstall() || !Configuration::deleteByName('pacman_url'))
            return false;
        return true;
    }

    public function hookDisplayHome($params)
    {

        $this->context->controller->registerStylesheet(
            'module-pacman',
            'modules/'.$this->name.'/pacman/assets/css/pacman.paulo.css',
            [
              'media' => 'all',
              'priority' => 200,
            ]
        );

        $this->context->controller->registerJavascript('pacman', 'modules/'.$this->name.'/pacman/assets/js/pacman.paulo.js', ['position' => 'bottom', 'priority' => 9400]);
        $this->context->controller->registerJavascript('modernizr', 'modules/'.$this->name.'/pacman/assets/js/modernizr.1.5.min.js', ['position' => 'bottom', 'priority' => 9400]);
        $this->context->controller->registerJavascript('modules-pacman', 'modules/'.$this->name.'/pacman.js', ['position' => 'bottom', 'priority' => 9500]);
        // < assign variables to template >
        $this->context->smarty->assign(
            array('youtube_url' => Configuration::get('pacman_url'))
        );
        return $this->display(__FILE__, 'pacman.tpl');
    }


    public function displayForm()
    {
        // < init fields for form array >
        $fields_form[0]['form'] = array(
            'legend' => array(
                'title' => $this->l('Pacman Module'),
            ),
            'input' => array(
                array(
                    'type' => 'text',
                    'label' => $this->l('URL of the Pacman video'),
                    'name' => 'pacman_url',
                    'size' => 20,
                    'required' => true
                ),
            ),
            
            'submit' => array(
                'title' => $this->l('Save'),
                'class' => 'btn btn-default pull-right'
            )
        );

        // < load helperForm >
        $helper = new HelperForm();

        // < module, token and currentIndex >
        $helper->module = $this;
        $helper->name_controller = $this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->currentIndex = AdminController::$currentIndex.'&configure='.$this->name;

        // < title and toolbar >
        $helper->title = $this->displayName;
        $helper->show_toolbar = true;        // false -> remove toolbar
        $helper->toolbar_scroll = true;      // yes - > Toolbar is always visible on the top of the screen.
        $helper->submit_action = 'submit'.$this->name;
        $helper->toolbar_btn = array(
            'save' =>
                array(
                    'desc' => $this->l('Save'),
                    'href' => AdminController::$currentIndex.'&configure='.$this->name.'&save'.$this->name.
                        '&token='.Tools::getAdminTokenLite('AdminModules'),
                ),
            'back' => array(
                'href' => AdminController::$currentIndex.'&token='.Tools::getAdminTokenLite('AdminModules'),
                'desc' => $this->l('Back to list')
            )
        );

        // < load current value >
        $helper->fields_value['pacman_url'] = Configuration::get('pacman_url');

        return $helper->generateForm($fields_form);
    }

    public function getContent()
    {
        $output = null;
        // < here we check if the form is submited for this module >
        if (Tools::isSubmit('submit'.$this->name)) {
            $youtube_url = strval(Tools::getValue('pacman_url'));

            // < make some validation, check if we have something in the input >
            if (!isset($youtube_url))
                $output .= $this->displayError($this->l('Please insert something in this field.'));
            else
            {
                // < this will update the value of the Configuration variable >
                Configuration::updateValue('pacman_url', $youtube_url);


                // < this will display the confirmation message >
                $output .= $this->displayConfirmation($this->l('Video URL updated!'));
            }
        }
        return $output.$this->displayForm();
    }
}