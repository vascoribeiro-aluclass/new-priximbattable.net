<?php
/**
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 * We offer the best and most useful modules PrestaShop and modifications for your online store.
 *
 * @author    Carlos Ucha
 * @copyright 2010-2100 Carlos Ucha
 * @license   see file: LICENSE.txt
 * This program is not free software and you can't resell and redistribute it
 *
 * CONTACT WITH DEVELOPER
 * carlosucha92@gmail.com
 */
if (!defined('_PS_VERSION_')) {
    exit;
}

require_once dirname(__FILE__) . '/classes/models/ChatSession.php';
require_once dirname(__FILE__) . '/classes/models/ChatMessage.php';
require_once dirname(__FILE__) . '/classes/services/GPTRequestHandler.php';
require_once dirname(__FILE__) . '/classes/services/ChatbotContext.php';

class Gptchatbox extends Module
{
    protected $config_form = false;
    protected $_html = '';
    protected $_postErrors = [];
    protected $models = [
        ['id' => 'gpt-4o-mini', 'name' => 'GPT-4o-mini (recommended): fastest speed and lowest cost - ideal for quick responses and budget-friendly applications.'],
        ['id' => 'gpt-4o', 'name' => 'GPT-4o: high intelligence, for complex tasks - suitable for detailed inquiries and advanced problem-solving.'],
        // Add other models as necessary
    ];
    private $lock_settings;
    protected $hooks = [
        ['id' => 'displayFooter', 'name' => 'displayFooter'],
        ['id' => 'displayFooterAfter', 'name' => 'displayFooterAfter'],
        ['id' => 'displayFooterBefore', 'name' => 'displayFooterBefore'],
        ['id' => 'displayHome', 'name' => 'displayHome'],
        ['id' => 'displayWrapperBottom', 'name' => 'displayWrapperBottom'],
        // Add other models as necessary
    ];

    public function __construct()
    {
        $this->name = 'gptchatbox';
        $this->tab = 'front_office_features';
        $this->version = '3.0.2';
        $this->author = 'Carlos Ucha';
        $this->need_instance = 0;
        $this->module_key = 'c184a81fe300ec462cd9d007f3b5bcde';

        $this->bootstrap = true;

        parent::__construct();

        $this->lock_settings = (int) Configuration::get('GPTCHATBOX_LOCK_SETTINGS', 0);

        $this->displayName = $this->l('GPT-ChatBox PRO');
        $this->description = $this->l('GPT-ChatBot Pro is an intelligent chatbot module for PrestaShop websites that enhances customer engagement, provides personalized assistance, and boosts sales and conversions with its advanced language processing and natural language understanding capabilities.');

        $this->ps_versions_compliancy = ['min' => '1.7.0.0', 'max' => '9.0.0'];

        if (!Configuration::get('API_KEY')) {
            $this->warning = $this->l('No API key provided.');
        }

        $this->context->smarty->assign('module_dir', $this->_path);
    }

    public function install()
    {
        return parent::install()
            && $this->registerHook('displayHeader')
            && $this->registerHook('displayBackOfficeHeader')
            && $this->registerHook('displayFooter')
            && $this->registerHook('displayFooterAfter')
            && $this->registerHook('displayFooterBefore')
            && $this->registerHook('displayWrapperBottom')
            && $this->registerHook('displayHome')
            && Configuration::updateValue('GPTCHATBOX_POSITION', 'bottom_right')
            && Configuration::updateValue('GPTCHATBOX_SAVE_CONVERSATIONS', false)
            && Configuration::updateValue('GPTCHATBOX_ICON', 'chat-openai')
            && Configuration::updateValue('GPTCHATBOX_API_KEY', '')
            && Configuration::updateValue('GPTCHATBOX_MAX_OUTPUT_TOKENS', 2048)
            && Configuration::updateValue('GPTCHATBOX_INPUT_MAX_LENGTH', 512)
            && Configuration::updateValue('GPTCHATBOX_NAME_ML', 'IA')
            && Configuration::updateValue('GPTCHATBOX_MODEL', $this->models[0]['name'])
            && Configuration::updateValue('GPTCHATBOX_TEXT_ML', 'Chatbox Assistance')
            && Configuration::updateValue('GPTCHATBOX_CONTEXT', '')
            && Configuration::updateValue('GPTCHATBOX_SPECULATION', true)
            && Configuration::updateValue('GPTCHATBOX_ERROR_HANDLING', true)
            && Configuration::updateValue('GPTCHATBOX_CUSTOMER_SUPPORT_ML', '')
            && Configuration::updateValue('GPTCHATBOX_PRODUCTS_FEED', false)
            && Configuration::updateValue('GPTCHATBOX_VECTOR_STORE_ID', '')
            && Configuration::updateValue('GPTCHATBOX_ORDERS_FEED', false)
            && Configuration::updateValue('GPTCHATBOX_CONTEXT_PRODUCTS', '')
            && Configuration::updateValue('GPTCHATBOX_CONTEXT_SHIPPING', '')
            && Configuration::updateValue('GPTCHATBOX_TEMPERATURE', '0.4')
            && Configuration::updateValue('GPTCHATBOX_SEND_COLOR', '#466fcb')
            && Configuration::updateValue('GPTCHATBOX_DATA_PROTECTION', true)
            && Configuration::updateValue('GPTCHATBOX_CONSENT_MESSAGE_ML', '')
            && Configuration::updateValue('GPTCHATBOX_ACCEPT_MESSAGE_ML', 'OK')
            && Configuration::updateValue('GPTCHATBOX_CONSENT_REQUEST', false)
            && Configuration::updateValue('GPTCHATBOX_HOOK', 'displayFooter')
            && Configuration::updateValue('GPTCHATBOX_ACTIVE', false)
            && Configuration::updateValue('GPTCHATBOX_TEST_MODE', false)
            && Configuration::updateValue('GPTCHATBOX_TEST_IP', '')
            && Configuration::updateValue('GPTCHATBOX_SELECTED_FIELDS', json_encode([]))
            && Configuration::updateValue('GPTCHATBOX_SELECTED_CATEGORIES', json_encode([]))
            && $this->createChatTables()
            && $this->installTab('AdminGptChatbot', 'ChatGPT Chatbot', 0)
            && $this->installTab('AdminGptChatbotConfiguration', 'Configuration', 'AdminGptChatbot')
            && $this->installTab('AdminGptchatboxProductsFeed', 'Products Feed', 'AdminGptChatbot')
            && $this->installTab('AdminGptChatbotLogs', 'Chat Logs', 'AdminGptChatbot');
    }

    public function uninstall()
    {
        return parent::uninstall()
            && $this->unregisterHook('displayHeader')
            && $this->unregisterHook('displayBackOfficeHeader')
            && $this->unregisterHook('displayFooter')
            && $this->unregisterHook('displayFooterAfter')
            && $this->unregisterHook('displayFooterBefore')
            && $this->unregisterHook('displayWrapperBottom')
            && $this->unregisterHook('displayHome')
            && Configuration::deleteByName('GPTCHATBOX_POSITION')
            && Configuration::deleteByName('GPTCHATBOX_SAVE_CONVERSATIONS')
            && Configuration::deleteByName('GPTCHATBOX_ICON')
            && Configuration::deleteByName('GPTCHATBOX_API_KEY')
            && Configuration::deleteByName('GPTCHATBOX_MAX_OUTPUT_TOKENS')
            && Configuration::deleteByName('GPTCHATBOX_INPUT_MAX_LENGTH')
            && Configuration::deleteByName('GPTCHATBOX_MODEL')
            && Configuration::deleteByName('GPTCHATBOX_NAME_ML')
            && Configuration::deleteByName('GPTCHATBOX_TEXT_ML')
            && Configuration::deleteByName('GPTCHATBOX_CONTEXT')
            && Configuration::deleteByName('GPTCHATBOX_ORDERS_FEED')
            && Configuration::deleteByName('GPTCHATBOX_PRODUCTS_FEED')
            && Configuration::deleteByName('GPTCHATBOX_VECTOR_STORE_ID')
            && Configuration::deleteByName('GPTCHATBOX_CONTEXT_PRODUCTS')
            && Configuration::deleteByName('GPTCHATBOX_CONTEXT_SHIPPING')
            && Configuration::deleteByName('GPTCHATBOX_TEMPERATURE')
            && Configuration::deleteByName('GPTCHATBOX_SEND_COLOR')
            && Configuration::deleteByName('GPTCHATBOX_SPECULATION')
            && Configuration::deleteByName('GPTCHATBOX_ERROR_HANDLING')
            && Configuration::deleteByName('GPTCHATBOX_CUSTOMER_SUPPORT_ML')
            && Configuration::deleteByName('GPTCHATBOX_ACTIVE')
            && Configuration::deleteByName('GPTCHATBOX_CONSENT_MESSAGE_ML')
            && Configuration::deleteByName('GPTCHATBOX_ACCEPT_MESSAGE_ML')
            && Configuration::deleteByName('GPTCHATBOX_CONSENT_REQUEST')
            && Configuration::deleteByName('GPTCHATBOX_HOOK')
            && Configuration::deleteByName('GPTCHATBOX_DATA_PROTECTION')
            && Configuration::deleteByName('GPTCHATBOX_TEST_MODE')
            && Configuration::deleteByName('GPTCHATBOX_TEST_IP')
            && Configuration::deleteByName('GPTCHATBOX_SELECTED_FIELDS')
            && Configuration::deleteByName('GPTCHATBOX_SELECTED_CATEGORIES')
            && $this->deleteChatTables()
            && $this->uninstallTab('AdminGptChatbotLogs')
            && $this->uninstallTab('AdminGptChatbotConfiguration')
            && $this->uninstallTab('AdminGptchatboxProductsFeed')
            && $this->uninstallTab('AdminGptChatbot');
    }

    protected function deleteChatTables()
    {
        $db = Db::getInstance();

        // First, drop the table that contains the foreign key
        $sqlDropMessageTable = 'DROP TABLE IF EXISTS `' . _DB_PREFIX_ . 'gptchatbox_message`;';
        if (!$db->execute($sqlDropMessageTable)) {
            return false;
        }

        // Then, drop the referenced table
        $sqlDropSessionTable = 'DROP TABLE IF EXISTS `' . _DB_PREFIX_ . 'gptchatbox_session`;';
        if (!$db->execute($sqlDropSessionTable)) {
            return false;
        }

        return true;
    }

    protected function createChatTables()
    {
        $db = Db::getInstance();

        $sqlSessionTable = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'gptchatbox_session` (
            `id_chat_session` INT(11) NOT NULL AUTO_INCREMENT,
            `customer_id` INT(11) DEFAULT NULL,
            `session_token` VARCHAR(32) NOT NULL,
            `session_mail` VARCHAR(255) DEFAULT NULL,
            `session_name` VARCHAR(128) DEFAULT NULL,
            `session_tel` VARCHAR(24) DEFAULT NULL,
            `date_add` DATETIME NOT NULL,
            PRIMARY KEY (`id_chat_session`)
        ) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8;';

        if (!$db->execute($sqlSessionTable)) {
            return false;
        }

        $sqlMessageTable = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'gptchatbox_message` (
            `id_message` INT(11) NOT NULL AUTO_INCREMENT,
            `id_chat_session` INT(11) NOT NULL,
            `message` TEXT NOT NULL,
            `is_ai` TINYINT(1) NOT NULL DEFAULT 0,
            `date_add` DATETIME NOT NULL,
            PRIMARY KEY (`id_message`),
            FOREIGN KEY (`id_chat_session`) REFERENCES `' . _DB_PREFIX_ . 'gptchatbox_session`(`id_chat_session`) ON DELETE CASCADE
        ) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8;';

        if (!$db->execute($sqlMessageTable)) {
            return false;
        }

        return true;
    }

    private function installTab($class, $name, $parent = null)
    {
        if (Tab::getIdFromClassName($class)) {
            return true;
        }

        $tab = new Tab();
        $tab->active = 1;
        $tab->class_name = $class;
        $tab->name = [];
        foreach (Language::getLanguages(true) as $lang) {
            $tab->name[$lang['id_lang']] = $name;
        }
        $tab->id_parent = ($parent ? Tab::getIdFromClassName($parent) : 0);
        $tab->module = $this->name;

        return $tab->add();
    }

    private function uninstallTab($tabClassName)
    {
        // Retrieve Tab ID through the class name
        $idTab = (int) Tab::getIdFromClassName($tabClassName);
        if ($idTab) {
            $tab = new Tab($idTab);

            return $tab->delete();
        }

        return true;
    }

    protected function _postValidation()
    {
    }

    /**
     * Load the configuration form
     */
    public function getContent()
    {
        if (Tools::isSubmit('btnSubmit')) {
            $this->_postValidation();
            if (!count($this->_postErrors)) {
                $this->postProcess();
            } else {
                foreach ($this->_postErrors as $err) {
                    $this->_html .= $this->displayError($err);
                }
            }
        } else {
            $this->_html .= '<br />';
        }

        $this->context->smarty->assign('module_dir', $this->_path);

        $this->_html .= $this->context->smarty->fetch($this->local_path . 'views/templates/admin/configure.tpl');

        $this->_html .= $this->renderForms();
        $this->_html .= $this->context->smarty->fetch($this->local_path . 'views/templates/admin/disclaimer.tpl');

        return $this->_html;
    }

    /**
     * Add the CSS & JavaScript files you want to be added on the FO.
     */
    protected function renderForms()
    {
        $formConfigManager = $this->renderFormConfigManager();

        return $formConfigManager;
    }

    /**
     * Create the form that will be displayed in the configuration of your module.
     */
    protected function renderFormConfigManager()
    {
        $helper = new HelperForm();

        $helper->show_toolbar = false;
        $helper->table = $this->table;
        $helper->module = $this;
        $helper->default_form_language = $this->context->language->id;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG', 0);

        $helper->identifier = $this->identifier;
        $helper->submit_action = 'btnSubmit';
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false)
            . '&configure=' . $this->name . '&tab_module=' . $this->tab . '&module_name=' . $this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');

        $helper->tpl_vars = [
            'fields_value' => $this->getFormValues(),
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id,
        ];

        return $helper->generateForm([$this->getConfigForm(), $this->getContextForm(), $this->getDesignForm(), $this->getPrivacyForm()]);
    }

    /**
     * Create the structure of the Config form.
     */
    protected function getConfigForm()
    {
        return [
            'form' => [
                'legend' => [
                    'title' => $this->l('Chatbot Settings'),
                    'icon' => 'icon-cogs',
                ],
                'input' => [
                    [
                        'type' => 'switch',
                        'label' => $this->l('Active'),
                        'name' => 'GPTCHATBOX_ACTIVE',
                        'is_bool' => true,
                        'desc' => $this->l('Enable or disable module'),
                        'values' => [
                            [
                                'id' => 'active_on',
                                'value' => true,
                                'label' => $this->l('Enabled'),
                            ],
                            [
                                'id' => 'active_off',
                                'value' => false,
                                'label' => $this->l('Disabled'),
                            ],
                        ],
                    ],
                    [
                        'type' => 'switch',
                        'label' => $this->l('Test Mode'),
                        'name' => 'GPTCHATBOX_TEST_MODE',
                        'is_bool' => true,
                        'desc' => $this->l('Enable test mode to restrict access to specific IP address'),
                        'values' => [
                            [
                                'id' => 'test_on',
                                'value' => true,
                                'label' => $this->l('Enabled'),
                            ],
                            [
                                'id' => 'test_off',
                                'value' => false,
                                'label' => $this->l('Disabled'),
                            ],
                        ],
                    ],
                    [
                        'type' => 'text',
                        'label' => $this->l('Test Mode IP'),
                        'name' => 'GPTCHATBOX_TEST_IP',
                        'desc' => $this->l('Enter the IP address that will have access when test mode is enabled'),
                    ],
                    [
                        'type' => 'text',
                        'name' => 'GPTCHATBOX_TEXT_ML',
                        'label' => $this->l('Chatbox text'),
                        'desc' => $this->l('Text displayed next to the chatbox icon (if any)'),
                        'lang' => true,
                    ],
                    [
                        'type' => 'text',
                        'name' => 'GPTCHATBOX_NAME_ML',
                        'label' => $this->l('Chatbot name'),
                        'desc' => $this->l('Text displayed on the Chatbot messages'),
                        'lang' => true,
                    ],
                    [
                        'type' => 'text',
                        'name' => 'GPTCHATBOX_API_KEY',
                        'label' => $this->l('API Key'),
                        'desc' => $this->l('You can get your API Keys in your ') . '<a href="https://platform.openai.com/account/api-keys" target="_blank">OpenAI Account</a>',
                    ],
                    [
                        'type' => 'text',
                        'name' => 'GPTCHATBOX_TEMPERATURE',
                        'label' => $this->l('Temperature'),
                        'minlength' => '1',
                        'maxlength' => '3',
                        'desc' => $this->l('The "temperature" parameter controls the level of randomness in the AIs responses within a valid range of 0 to 1. A higher value (closer to 1) produces more diverse but potentially less coherent answers, while a lower value (closer to 0) results in more focused and consistent responses.'),
                        'col' => 6,
                    ],
                    [
                        'type' => 'select',
                        'label' => $this->l('ChatGPT Model:'),
                        'desc' => $this->l('For more info about the models check the OpenAI documentation at ') . '<a href="https://platform.openai.com/docs/models" target="_blank">OpenAI Models</a>' . $this->l(' and for pricing details visit ') . '<a href="https://platform.openai.com/pricing" target="_blank">OpenAI Pricing</a>',
                        'name' => 'GPTCHATBOX_MODEL',
                        'options' => [
                            'query' => $this->models,
                            'id' => 'id',
                            'name' => 'name',
                        ],
                    ],
                    [
                        'type' => 'text',
                        'name' => 'GPTCHATBOX_MAX_OUTPUT_TOKENS',
                        'label' => $this->l('Max Output Tokens'),
                        'desc' => $this->l('Maximum number of tokens in the AI\'s response. An estimate for 2000 tokens is approximately 1500 words, which is about 6-8 paragraphs of text. Higher values allow for longer responses but consume more resources.'),
                        'class' => 'fixed-width-sm',
                        'cast' => 'intval',
                    ],
                    [
                        'type' => 'text',
                        'name' => 'GPTCHATBOX_INPUT_MAX_LENGTH',
                        'label' => $this->l('Input Max Length'),
                        'desc' => $this->l('Maximum number of characters allowed in user input messages.'),
                        'class' => 'fixed-width-sm',
                        'cast' => 'intval',
                    ],
                    [
                        'type' => 'select',
                        'label' => $this->l('Chatbox hook:'),
                        'desc' => $this->l('Change if the chatbox is not displaying correctly'),
                        'name' => 'GPTCHATBOX_HOOK',
                        'options' => [
                            'query' => $this->hooks,
                            'id' => 'id',
                            'name' => 'name',
                        ],
                    ],
                ],
                'submit' => [
                    'title' => $this->l('Save'),
                ],
            ],
        ];
    }

    /**
     * Create the structure of the Context form.
     */
    protected function getContextForm()
    {
        return [
            'form' => [
                'legend' => [
                    'title' => $this->l('Context Settings'),
                    'icon' => 'icon-comments',
                ],
                'input' => [
                    [
                        'type' => 'textarea',
                        'name' => 'GPTCHATBOX_CONTEXT',
                        'label' => $this->l('Chatbot Context'),
                        'rows' => '4',
                        'desc' => $this->l('This is the main context for the AI assistant. It guides the AI in how to respond and enables you to control its behavior. For example, you can incorporate your company profile, relevant links, and other pertinent information.'),
                        'placeholder' => 'You are an AI assistant for an online shop, providing information and helping customers with their queries.',
                    ],
                    [
                        'type' => 'switch',
                        'label' => $this->l('Customer Order Data Feed Integration'),
                        'name' => 'GPTCHATBOX_ORDERS_FEED',
                        'is_bool' => true,
                        'desc' => $this->l('The AI will retrieve customers\' order information from the database of your shop.'),
                        'values' => [
                            [
                                'id' => 'active_on',
                                'value' => true,
                                'label' => $this->l('Enabled'),
                            ],
                            [
                                'id' => 'active_off',
                                'value' => false,
                                'label' => $this->l('Disabled'),
                            ],
                        ],
                    ],
                    [
                        'type' => 'textarea',
                        'name' => 'GPTCHATBOX_CONTEXT_PRODUCTS',
                        'label' => $this->l('Products information'),
                        'rows' => '4',
                        'desc' => $this->l('Provide detailed information about your products that the AI assistant can use when helping customers. This could include specifics about product categories, popular items, material or ingredient information, product use or care instructions, and so on.'),
                        'placeholder' => 'Our shop specializes in high-quality electronics. Our popular items include 4K TVs, smartphones, and laptops. All electronics come with a 1-year warranty and care instructions.',
                    ],
                    [
                        'type' => 'textarea',
                        'name' => 'GPTCHATBOX_CONTEXT_SHIPPING',
                        'label' => $this->l('Shipping information'),
                        'rows' => '4',
                        'desc' => $this->l('Provide detailed information about your shipping policies and options that the AI assistant can use when helping customers. This could include expected delivery times for different regions, shipping carriers you use, packaging details, handling times, and how customers can track their orders.'),
                        'placeholder' => 'We offer worldwide shipping with DHL and FedEx. Orders are typically processed within 24 hours and customers can expect delivery within 3-5 business days. Tracking numbers are provided via email upon shipment.',
                    ],
                    [
                        'type' => 'switch',
                        'label' => $this->l('Avoid Speculation'),
                        'name' => 'GPTCHATBOX_SPECULATION',
                        'is_bool' => true,
                        'desc' => $this->l('If the AI doesn\'t have the information or if it\'s beyond it\'s training data, do not speculate. Inform the user that you are not able to provide that information. Recommended'),
                        'values' => [
                            [
                                'id' => 'active_on',
                                'value' => true,
                                'label' => $this->l('Enabled'),
                            ],
                            [
                                'id' => 'active_off',
                                'value' => false,
                                'label' => $this->l('Disabled'),
                            ],
                        ],
                    ],
                    [
                        'type' => 'switch',
                        'label' => $this->l('Error handling'),
                        'name' => 'GPTCHATBOX_ERROR_HANDLING',
                        'is_bool' => true,
                        'desc' => $this->l('If the AI cannot provide accurate information or help, politely direct the user to other resources, like customer support. Recommended.'),
                        'values' => [
                            [
                                'id' => 'active_on',
                                'value' => true,
                                'label' => $this->l('Enabled'),
                            ],
                            [
                                'id' => 'active_off',
                                'value' => false,
                                'label' => $this->l('Disabled'),
                            ],
                        ],
                    ],
                    [
                        'type' => 'textarea',
                        'name' => 'GPTCHATBOX_CUSTOMER_SUPPORT_ML',
                        'label' => $this->l('Direct customer support'),
                        'rows' => '4',
                        'desc' => $this->l('Configure the contact info that the AI assistant\'s will provide when it cannot answer a query or when direct human assistance is requested.'),
                        'placeholder' => '',
                        'lang' => true,
                    ],
                ],
                'submit' => [
                    'title' => $this->l('Save'),
                ],
            ],
        ];
    }

    /**
     * Create the structure of the Design form.
     */
    protected function getDesignForm()
    {
        return [
            'form' => [
                'legend' => [
                    'title' => $this->l('Design Settings'),
                    'icon' => 'icon-tint',
                ],
                'input' => [
                    [
                        'type' => 'radio',
                        'label' => $this->l('Position'),
                        'name' => 'GPTCHATBOX_POSITION',
                        'required' => true,
                        'values' => [
                            [
                                'id' => 'bottom_right',
                                'value' => 'bottom_right',
                                'label' => $this->l('Bottom right'),
                            ],
                            [
                                'id' => 'bottom_left',
                                'value' => 'bottom_left',
                                'label' => $this->l('Botton left'),
                            ],
                            [
                                'id' => 'top_left',
                                'value' => 'top_left',
                                'label' => $this->l('Top left'),
                            ],
                            [
                                'id' => 'top_right',
                                'value' => 'top_right',
                                'label' => $this->l('Top right'),
                            ],
                        ],
                    ],
                    [
                        'type' => 'radio',
                        'label' => $this->l('Icon'),
                        'name' => 'GPTCHATBOX_ICON',
                        'required' => true,
                        'values' => [
                            [
                                'id' => 'chat-openai',
                                'value' => 'chat-openai',
                                'label' => '<img src=' . $this->_path . 'views/img/chat-openai.svg alt="Openai Icon" style="width:20px" />',
                            ],
                            [
                                'id' => 'chat-green',
                                'value' => 'chat-green',
                                'label' => '<img src=' . $this->_path . 'views/img/chat-green.svg alt="Green Icon" style="width:20px" />',
                            ],
                            [
                                'id' => 'chat-robot',
                                'value' => 'chat-robot',
                                'label' => '<img src=' . $this->_path . 'views/img/chat-robot.svg alt="Robot Icon" style="width:20px" />',
                            ],
                            [
                                'id' => 'chat-traditional',
                                'value' => 'chat-traditional',
                                'label' => '<img src=' . $this->_path . 'views/img/chat-traditional.svg alt="Speech Icon" style="width:20px" />',
                            ],
                            [
                                'id' => 'chat-traditional-2',
                                'value' => 'chat-traditional-2',
                                'label' => '<img src=' . $this->_path . 'views/img/chat-traditional-2.svg alt="Bubble Icon" style="width:20px" />',
                            ],
                        ],
                        'class' => 'horizontal-radio', // Add a custom CSS class for styling
                    ],
                    [
                        'label' => $this->l('Send Button Color'),
                        'type' => 'color',
                        'hint' => $this->l('Change color of the Send button.'),
                        'name' => 'GPTCHATBOX_SEND_COLOR',
                        'col' => 500,
                        'required' => true,
                    ],
                ],
                'submit' => [
                    'title' => $this->l('Save'),
                ],
            ],
        ];
    }

    /**
     * Create the structure of the Design form.
     */
    protected function getPrivacyForm()
    {
        return [
            'form' => [
                'legend' => [
                    'title' => $this->l('Privacy Settings'),
                    'icon' => 'icon-lock',
                ],
                'input' => [
                    [
                        'type' => 'switch',
                        'label' => $this->l('Personal Data Protection'),
                        'name' => 'GPTCHATBOX_DATA_PROTECTION',
                        'is_bool' => true,
                        'desc' => $this->l('The AI should not ask for or store any personal user data, including addresses, credit card numbers, etc., in line with privacy regulations.'),
                        'values' => [
                            [
                                'id' => 'active_on',
                                'value' => true,
                                'label' => $this->l('Enabled'),
                            ],
                            [
                                'id' => 'active_off',
                                'value' => false,
                                'label' => $this->l('Disabled'),
                            ],
                        ],
                    ],
                    [
                        'type' => 'textarea',
                        'name' => 'GPTCHATBOX_CONSENT_MESSAGE_ML',
                        'label' => $this->l('Privacy consent message'),
                        'rows' => '4',
                        'desc' => $this->l('This message will be displayed at the beginning of the conversation with data protection notices or privacy policies.'),
                        'placeholder' => '',
                        'lang' => true,
                    ],
                    [
                        'type' => 'switch',
                        'label' => $this->l('Consent request'),
                        'name' => 'GPTCHATBOX_CONSENT_REQUEST',
                        'is_bool' => true,
                        'desc' => $this->l('If checked the client must accept the privacy consent message to begin the conversation.'),
                        'values' => [
                            [
                                'id' => 'active_on',
                                'value' => true,
                                'label' => $this->l('Enabled'),
                            ],
                            [
                                'id' => 'active_off',
                                'value' => false,
                                'label' => $this->l('Disabled'),
                            ],
                        ],
                    ],
                    [
                        'type' => 'textarea',
                        'name' => 'GPTCHATBOX_ACCEPT_MESSAGE_ML',
                        'label' => $this->l('Accept button text'),
                        'rows' => '4',
                        'desc' => $this->l('Text of the GPDR accept button.'),
                        'placeholder' => '',
                        'lang' => true,
                    ],
                ],
                'submit' => [
                    'title' => $this->l('Save'),
                ],
            ],
        ];
    }

    /**
     * Set values for the inputs.
     */
    protected function getFormValues()
    {
        return array_merge(
            $this->getConfigFormValues(),
            $this->getContextFormValues(),
            $this->getDesignFormValues(),
            $this->getPrivacyFormValues()
        );
    }

    /**
     * Set values for the inputs.
     */
    protected function getConfigFormValues()
    {
        $languages = Language::getLanguages(false);
        $name_ml = [];
        $text_ml = [];

        foreach ($languages as $lang) {
            $name_ml[$lang['id_lang']] = Configuration::get('GPTCHATBOX_NAME_ML', $lang['id_lang']);
            $text_ml[$lang['id_lang']] = Configuration::get('GPTCHATBOX_TEXT_ML', $lang['id_lang']);
        }
        // Retrieve the actual API key
        $actualApiKey = Configuration::get('GPTCHATBOX_API_KEY', null);

        // Convert the actual API key to an equivalent number of asterisks for display
        $maskedApiKey = $actualApiKey ? str_repeat('*', strlen($actualApiKey)) : null;

        return [
            'GPTCHATBOX_ACTIVE' => Configuration::get('GPTCHATBOX_ACTIVE', true),
            'GPTCHATBOX_API_KEY' => $maskedApiKey,
            'GPTCHATBOX_NAME_ML' => $name_ml,
            'GPTCHATBOX_TEXT_ML' => $text_ml,
            'GPTCHATBOX_TEMPERATURE' => Configuration::get('GPTCHATBOX_TEMPERATURE', '0.4'),
            'GPTCHATBOX_MAX_OUTPUT_TOKENS' => Configuration::get('GPTCHATBOX_MAX_OUTPUT_TOKENS', 2000),
            'GPTCHATBOX_INPUT_MAX_LENGTH' => Configuration::get('GPTCHATBOX_INPUT_MAX_LENGTH', 512),
            'GPTCHATBOX_MODEL' => Configuration::get('GPTCHATBOX_MODEL', $this->models[0]['name']),
            'GPTCHATBOX_HOOK' => Configuration::get('GPTCHATBOX_HOOK', $this->hooks[0]['name']),
            'GPTCHATBOX_TEST_MODE' => Configuration::get('GPTCHATBOX_TEST_MODE', false),
            'GPTCHATBOX_TEST_IP' => Configuration::get('GPTCHATBOX_TEST_IP', ''),
        ];
    }

    /**
     * Set values for the inputs.
     */
    protected function getContextFormValues()
    {
        $languages = Language::getLanguages(false);

        $customer_support_ml = [];
        foreach ($languages as $lang) {
            $customer_support_ml[$lang['id_lang']] = Configuration::get('GPTCHATBOX_CUSTOMER_SUPPORT_ML', $lang['id_lang']);
        }

        return [
            'GPTCHATBOX_CONTEXT' => Configuration::get('GPTCHATBOX_CONTEXT', true),
            'GPTCHATBOX_CONTEXT_PRODUCTS' => Configuration::get('GPTCHATBOX_CONTEXT_PRODUCTS', true),
            'GPTCHATBOX_CONTEXT_SHIPPING' => Configuration::get('GPTCHATBOX_CONTEXT_SHIPPING', true),
            'GPTCHATBOX_ERROR_HANDLING' => Configuration::get('GPTCHATBOX_ERROR_HANDLING', true),
            'GPTCHATBOX_ORDERS_FEED' => Configuration::get('GPTCHATBOX_ORDERS_FEED', true),
            'GPTCHATBOX_SPECULATION' => Configuration::get('GPTCHATBOX_SPECULATION', true),
            'GPTCHATBOX_CUSTOMER_SUPPORT_ML' => $customer_support_ml,
        ];
    }

    /**
     * Set values for the inputs.
     */
    protected function getDesignFormValues()
    {
        return [
            'GPTCHATBOX_POSITION' => Configuration::get('GPTCHATBOX_POSITION', 'bottom_right'),
            'GPTCHATBOX_ICON' => Configuration::get('GPTCHATBOX_ICON', 'chat-openai'),
            'GPTCHATBOX_SEND_COLOR' => Configuration::get('GPTCHATBOX_SEND_COLOR', '#466fcb'),
        ];
    }

    /**
     * Set values for the inputs.
     */
    protected function getPrivacyFormValues()
    {
        $consent_message_ml = [];
        $accept_message_ml = [];

        $languages = Language::getLanguages(false);
        foreach ($languages as $lang) {
            $consent_message_ml[$lang['id_lang']] = Configuration::get('GPTCHATBOX_CONSENT_MESSAGE_ML', $lang['id_lang']);
            $accept_message_ml[$lang['id_lang']] = Configuration::get('GPTCHATBOX_ACCEPT_MESSAGE_ML', $lang['id_lang']);
        }

        return [
            'GPTCHATBOX_DATA_PROTECTION' => Configuration::get('GPTCHATBOX_DATA_PROTECTION', true),
            'GPTCHATBOX_CONSENT_REQUEST' => Configuration::get('GPTCHATBOX_CONSENT_REQUEST', false),
            'GPTCHATBOX_CONSENT_MESSAGE_ML' => $consent_message_ml,
            'GPTCHATBOX_ACCEPT_MESSAGE_ML' => $accept_message_ml,
        ];
    }

    /**
     * Save form data.
     */
    protected function postProcess()
    {
        $formValues = $this->getFormValues();

        foreach ($formValues as $key => $value) {
            // Check if the key is our API key and if the value consists only of asterisks
            // Skip if API key contains only asterisks
            if ($key == 'GPTCHATBOX_API_KEY' && preg_match('/^\*+$/', Tools::getValue($key))) {
                continue;
            }

            // Skip if settings are locked and key is in protected list
            if ($this->lock_settings == 1 && in_array($key, [
                'GPTCHATBOX_API_KEY',
                'GPTCHATBOX_ACTIVE',
                'GPTCHATBOX_TEST_MODE',
                'GPTCHATBOX_HOOK',
                'GPTCHATBOX_TEST_IP',
            ])) {
                continue;
            }
            if (is_array($value)) {
                // This is a multilingual field
                $multiLangValues = [];
                foreach ($value as $langId => $langValue) {
                    $multiLangValues[$langId] = Tools::getValue($key . '_' . $langId);
                }
                Configuration::updateValue($key, $multiLangValues);
            } else {
                // This is a single-language field
                Configuration::updateValue($key, Tools::getValue($key));
            }
        }
        $this->_html .= $this->displayConfirmation($this->l('Settings updated'));
    }

    /**
     * Add the CSS & JavaScript files you want to be added on the FO.
     */
    public function hookDisplayHeader($params)
    {
        if (Configuration::get('GPTCHATBOX_ACTIVE') == 1) {
            $this->context->controller->addJS($this->_path . '/views/js/front_v2535.js');
            $this->context->controller->addCSS($this->_path . '/views/css/front_v253.css');
        }
    }

    private function isOutsideBusinessHours()
    {
        $currentDay = date('N');
        $currentTime = date('H:i');

        $morningStart = "09:00";
        $morningEnd = "12:30";
        $afternoonStart = "13:30";
        $afternoonEnd = "18:00";

        if ((($currentTime < $morningStart || $currentTime > $morningEnd) &&
            ($currentTime < $afternoonStart || $currentTime > $afternoonEnd)) || ($currentDay >= 6)) {
            return true;
        }

        return false;
    }

    private function renderChatbox()
    {
        // Check if test mode is enabled and validate IP
        if (Configuration::get('GPTCHATBOX_TEST_MODE')) {
            $allowedIp = Configuration::get('GPTCHATBOX_TEST_IP');
            $currentIp = Tools::getRemoteAddr();

            // Split allowed IPs in case there are multiple IPs separated by commas
            $allowedIps = array_map('trim', explode(',', $allowedIp));

            // Check if current IP matches any of the allowed IPs
            if (!in_array($currentIp, $allowedIps)) {
                return ''; // Don't render chatbox for non-allowed IPs
            }
        }

        $lang = $this->context->language->id;

        $gptchatname = Configuration::get('GPTCHATBOX_NAME_ML', $lang);
        $gptchattext = Configuration::get('GPTCHATBOX_TEXT_ML', $lang);
        $gptconsentmessage = Configuration::get('GPTCHATBOX_CONSENT_MESSAGE_ML', $lang);
        $gptacceptmessage = Configuration::get('GPTCHATBOX_ACCEPT_MESSAGE_ML', $lang);
        $gptconsentrequired = Configuration::get('GPTCHATBOX_CONSENT_REQUEST');
        $gptchatposition = Configuration::get('GPTCHATBOX_POSITION');
        $gptchaticon = Configuration::get('GPTCHATBOX_ICON');
        $gptchatsendcolor = Configuration::get('GPTCHATBOX_SEND_COLOR');
        $gptchattemperature = Configuration::get('GPTCHATBOX_TEMPERATURE');
        $gptchatmaxoutputtokens = (int) Configuration::get('GPTCHATBOX_MAX_OUTPUT_TOKENS');
        $gptchatinputmaxlength = (int) Configuration::get('GPTCHATBOX_INPUT_MAX_LENGTH');

        $this->context->smarty->assign([
            'gptchatposition' => $gptchatposition,
            'gptconsentrequired' => $gptconsentrequired,
            'gptchaticon' => $gptchaticon,
            'gptchatname' => $gptchatname,
            'gptchattext' => $gptchattext,
            'gptconsentmessage' => $gptconsentmessage,
            'gptacceptmessage' => $gptacceptmessage,
            'gptchatsendcolor' => $gptchatsendcolor,
            'gptchattemperature' => $gptchattemperature,
            'gptchatmaxoutputtokens' => $gptchatmaxoutputtokens,
            'gptchatinputmaxlength' => $gptchatinputmaxlength,
        ]);

        if (Configuration::get('GPTCHATBOX_ACTIVE') == 1 && $this->isOutsideBusinessHours()) {
            // Check if the client is logged in
            $customerName = $this->context->customer->isLogged()
                ? $this->context->customer->firstname
                : $this->l('Guest');

            // Assign the customer name to the Smarty variable
            $this->context->smarty->assign([
              'customername' => $customerName,
              'FORMCHATGPT' => isset($_COOKIE['FORMCHATGPT']) ? true : false,
          ]);

            return $this->context->smarty->fetch($this->local_path . 'views/templates/front/chatgptchatbox.tpl');
        }

        return '';
    }

    public function hookDisplayFooter($params)
    {
        if (Configuration::get('GPTCHATBOX_HOOK') == 'displayFooter') {
            return $this->renderChatbox();
        }
    }

    public function hookDisplayHome()
    {
        if (Configuration::get('GPTCHATBOX_HOOK') == 'displayHome') {
            return $this->renderChatbox();
        }
    }

    public function hookDisplayFooterBefore()
    {
        if (Configuration::get('GPTCHATBOX_HOOK') == 'displayFooterBefore') {
            return $this->renderChatbox();
        }
    }

    public function hookDisplayFooterAfter()
    {
        if (Configuration::get('GPTCHATBOX_HOOK') == 'displayFooterAfter') {
            return $this->renderChatbox();
        }
    }

    public function hookDisplayWrapperBottom()
    {
        if (Configuration::get('GPTCHATBOX_HOOK') == 'displayWrapperBottom') {
            return $this->renderChatbox();
        }
    }

    /**
     * Add the CSS & JavaScript files you want to be loaded in the BO.
     */
    public function hookDisplayBackOfficeHeader()
    {
        if (Tools::getValue('configure') == $this->name) {
            $this->context->controller->addJS($this->_path . 'views/js/back_v253.js');
            $this->context->controller->addJS($this->_path . 'views/js/backToggle_v2531.js');
            $this->context->controller->addCSS($this->_path . 'views/css/back_v253.css');
        }
    }
}
