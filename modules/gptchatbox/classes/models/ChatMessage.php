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

class ChatMessage extends ObjectModel
{
    public $id_message;
    public $id_chat_session;
    public $message;
    public $is_ai;
    public $date_add;

    /**
     * Define the corresponding table and primary key for the ObjectModel class.
     * Set `definition` static member with table association details.
     */
    public static $definition = [
        'table' => 'gptchatbox_message',
        'primary' => 'id_message',
        'fields' => [
            'id_chat_session' => ['type' => self::TYPE_INT, 'validate' => 'isUnsignedId', 'required' => true],
            'message' => ['type' => self::TYPE_HTML, 'validate' => 'isCleanHtml', 'required' => true],
            'is_ai' => ['type' => self::TYPE_BOOL, 'validate' => 'isBool'],
            'date_add' => ['type' => self::TYPE_DATE, 'validate' => 'isDateFormat', 'required' => true],
        ],
        'associations' => [
            'session' => ['type' => self::HAS_ONE, 'association' => 'ChatSession', 'field' => 'id_chat_session'],
        ],
    ];

    // You can add custom methods here if needed.
    // Method to get messages by session ID
    public static function getMessagesBySessionId($id_chat_session)
    {
        $id_chat_session = (int) $id_chat_session;
        $sql = new DbQuery();
        $sql->select('*');
        $sql->from('gptchatbox_message');
        $sql->where('id_chat_session = ' . (int) $id_chat_session);
        $sql->orderBy('date_add ASC'); // Assuming you want them in chronological order

        $results = Db::getInstance()->executeS($sql);

        return $results;
    }

    /**
     * Save a message to a chat session.
     */
    public static function saveMessage($sessionId, $message, $isAi = false)
    {
        $chatMessage = new ChatMessage();
        $chatMessage->id_chat_session = $sessionId;
        $chatMessage->message = pSQL($message);
        $chatMessage->is_ai = $isAi;
        $chatMessage->date_add = date('Y-m-d H:i:s');

        return $chatMessage->add();
    }
}
