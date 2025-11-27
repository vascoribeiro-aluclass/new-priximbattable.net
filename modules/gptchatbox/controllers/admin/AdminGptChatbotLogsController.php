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

class AdminGptChatbotLogsController extends ModuleAdminController
{
    public function __construct()
    {
        $this->bootstrap = true;
        $this->table = 'gptchatbox_session'; // The table defined in your class
        $this->className = 'ChatSession'; // Your ObjectModel class name for sessions
        $this->identifier = 'id_chat_session'; // Primary key field name
        $this->fields_list = [
            'id_chat_session' => [
                'title' => 'Session ID',
                'align' => 'center',
                'class' => 'fixed-width-xs',
            ],
            'customer_id' => [
                'title' => 'Customer ID',
                'align' => 'center',
                'class' => 'fixed-width-xs',
            ],
            'date_add' => [
                'title' => 'Date Added',
                'type' => 'datetime',
                'align' => 'left',
            ],
        ];

        $this->actions = ['view', 'delete'];
        $this->bulk_actions = [
            'delete' => [
                'text' => 'Delete selected',
                'icon' => 'icon-trash',
            ],
        ];

        // Process the form submission
        $this->postProcess();

        parent::__construct();
    }

    public function renderList()
    {
        if (!Module::isInstalled('gptchatbox')) {
            $this->errors[] = $this->l('The chat module is not installed.');

            return;
        }

        $toggleForm = $this->renderToggleForm();
        // Calls parent renderList which processes bulk actions, among other things.
        $list = parent::renderList();

        // Combine form and list rendering
        return $toggleForm . $list;
    }

    public function renderView()
    {
        // Get the ID from the URL or posted data
        $id_chat_session = (int) Tools::getValue('id_chat_session');

        // Load the chat session and related messages
        $chatSession = new ChatSession($id_chat_session);
        $messages = ChatMessage::getMessagesBySessionId($id_chat_session);

        // Assign variables to the view
        $this->context->smarty->assign([
            'chatSession' => $chatSession,
            'messages' => $messages,
        ]);

        $this->template = 'view_chat.tpl';

        // Calls the parent method to render the view.
        return parent::renderView();
    }

    protected function renderToggleForm()
    {
        // Form fields
        $fields_form = [
            'form' => [
                'legend' => [
                    'title' => $this->l('Chat Saving Settings'),
                    'icon' => 'icon-cogs',
                ],
                'input' => [
                    [
                        'type' => 'switch',
                        'label' => $this->l('Enable chat saving'),
                        'name' => 'GPTCHATBOX_SAVE_CONVERSATIONS',
                        'is_bool' => true,
                        'desc' => $this->l('Before activating, please ensure adherence to local data protection laws and obtain clear consent from users to store and process their chat conversations.'),
                        'values' => [
                            [
                                'id' => 'active_on',
                                'value' => 1,
                                'label' => $this->l('Enabled'),
                            ],
                            [
                                'id' => 'active_off',
                                'value' => 0,
                                'label' => $this->l('Disabled'),
                            ],
                        ],
                    ],
                ],
                'submit' => [
                    'title' => $this->l('Save'),
                ],
            ],
        ];

        // HelperForm for rendering the form
        $helper = new HelperForm();
        $helper->submit_action = 'submitToggleForm';
        $helper->currentIndex = $this->context->link->getAdminLink('AdminGptChatbotLogs', false);
        $helper->token = Tools::getAdminTokenLite('AdminGptChatbotLogs');
        $helper->tpl_vars = [
            'fields_value' => [
                'GPTCHATBOX_SAVE_CONVERSATIONS' => Configuration::get('GPTCHATBOX_SAVE_CONVERSATIONS'),
            ],
        ];

        return $helper->generateForm([$fields_form]);
    }

    public function postProcess()
    {
        if (Tools::isSubmit('submitToggleForm')) {
            $chatSavingEnabled = (bool) Tools::getValue('GPTCHATBOX_SAVE_CONVERSATIONS');
            Configuration::updateValue('GPTCHATBOX_SAVE_CONVERSATIONS', $chatSavingEnabled);
        }

        // Call parent postProcess if needed
        parent::postProcess();
    }

    // Other methods...
}
