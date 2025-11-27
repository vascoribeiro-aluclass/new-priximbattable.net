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

class ChatSession extends ObjectModel
{
    public $id_chat_session;  // Auto-incremented by the database
    public $customer_id;      // Customer ID (if the user is logged in)
    public $session_token;    // Unique token for client-side identification
    public $session_mail;    // Unique token for client-side identification
    public $session_name;    // Unique token for client-side identification
    public $session_tel;    // Unique token for client-side identification
    public $date_add;         // Timestamp for creation or last access

    public static $definition = [
        'table' => 'gptchatbox_session',
        'primary' => 'id_chat_session',
        'fields' => [
            'customer_id' => ['type' => self::TYPE_INT, 'validate' => 'isNullOrUnsignedId', 'allow_null' => true],
            'session_token' => ['type' => self::TYPE_STRING, 'validate' => 'isGenericName', 'size' => 32],
            'session_mail' => ['type' => self::TYPE_STRING, 'validate' => 'isGenericName', 'allow_null' => true , 'size' => 255],
            'session_name' => ['type' => self::TYPE_STRING, 'validate' => 'isGenericName', 'allow_null' => true , 'size' => 128],
            'session_tel' => ['type' => self::TYPE_STRING, 'validate' => 'isGenericName', 'allow_null' => true , 'size' => 24],
            'date_add' => ['type' => self::TYPE_DATE, 'validate' => 'isDateFormat'],
            // ... [other fields]
        ],
    ];

    /**
     * Start or retrieve a chat session.
     */
    public static function startOrRetrieveSession()
    {
        $context = Context::getContext();
        $db = Db::getInstance();

        $customer_id = $context->customer->isLogged() ? $context->customer->id : null;

        // Check if a session token exists in the cookie
        if (isset($context->cookie->chatSessionToken)) {
            $token = $context->cookie->chatSessionToken;
            $sessionId = $db->getValue('SELECT id_chat_session FROM ' . _DB_PREFIX_ . "gptchatbox_session WHERE session_token = '" . pSQL($token) . "'");

            if ($sessionId) {
                $chatSession = new ChatSession($sessionId);
                // Update the date_add to indicate the session is still active
                $chatSession->date_add = date('Y-m-d H:i:s');
                //$chatSession->session_mail = isset($_COOKIE['FORMCHATGPT']) ? $_COOKIE['FORMCHATGPT'] : null;
                $chatSession->update();

                return $chatSession;
            }
        }

        // Create a new session
        $token = md5(uniqid(rand(), true));
        $chatSession = new ChatSession();
        $chatSession->customer_id = $customer_id;
        $chatSession->session_token = $token;
        $chatSession->date_add = date('Y-m-d H:i:s');
        $chatSession->session_mail = isset($_COOKIE['FORMCHATGPT']) ? $_COOKIE['FORMCHATGPT'] : null;
        $chatSession->session_name = isset($_COOKIE['FORMCHATGPTNAME']) ? $_COOKIE['FORMCHATGPTNAME'] : null;
        $chatSession->session_tel = isset($_COOKIE['FORMCHATGPTTEL']) ? $_COOKIE['FORMCHATGPTTEL'] : null;
        $chatSession->add();



        if(isset($_COOKIE['IDSESSIONCHATGPTTEL'])){

          $sessionId = $db->getValue('SELECT id_chat_session FROM ' . _DB_PREFIX_ . "gptchatbox_session WHERE session_token = '" . pSQL($token) . "'");
          if ($sessionId) {
            $sql = "UPDATE sc_rappel SET id_chatgpt = ".$sessionId ." WHERE sc_rappel_id = ".$_COOKIE['IDSESSIONCHATGPTTEL'];
             $updatechatgpt = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
          }

        }


        // Save the token in the cookie
        $context->cookie->__set('chatSessionToken', $token);
        $context->cookie->setExpire(time() + 86400); // 1 day
        $context->cookie->write();

        return $chatSession;
    }
}
