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

class gptchatboxajaxModuleFrontController extends ModuleFrontController
{
    private $apiEndpoint;
    private $gptModel;
    private $accessToken;
    private $systemMessage;
    private $systemProducts;
    private $systemShipping;
    private $speculation;
    private $errorHandling;
    private $contactInfo;
    private $temperature;
    private $dataProtection;

    private $gptHandler;

    public function __construct()
    {
        parent::__construct();
        $this->gptHandler = new GPTRequestHandler(); // Using new GPT handler
    }

    public function initContent()
    {
        $this->ajax = true;

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return $this->sendErrorResponse(405, 'Invalid request method.');
        }

        $message = Tools::getValue('message');
        $history = Tools::getValue('history');

        if (!$message) {
            return $this->sendErrorResponse(400, "'message' parameter is missing.");
        }

        if (strlen($message) > 1000) {
            return $this->sendErrorResponse(400, 'Message is too long.');
        }

        // Sanitize input
        $message = Tools::safeOutput($message);
        $history = Tools::safeOutput($history);

        // Manage chat session
        $chatSession = ChatSession::startOrRetrieveSession();

        // Check if the user is logged in and update the chat session customer_id
        if ($chatSession && !$chatSession->customer_id && isset($this->context->customer->id) && $this->context->customer->id) {
            $chatSession->customer_id = $this->context->customer->id;
            $chatSession->save();
        }

        // Save user message if enabled
        if (Configuration::get('GPTCHATBOX_SAVE_CONVERSATIONS')) {
            ChatMessage::saveMessage($chatSession->id, $message, false);
        }

        // Call GPT API using the handler
        try {
            $response = $this->gptHandler->sendRequest($message, $history);
        } catch (Exception $e) {
            return $this->sendErrorResponse(500, 'Chatbot failed: ' . $e->getMessage());
        }

        if (isset($response['error'])) {
            return $this->sendErrorResponse(500, 'Chatbot response error.');
        }

        // Save AI response if enabled
        if (Configuration::get('GPTCHATBOX_SAVE_CONVERSATIONS')) {
            ChatMessage::saveMessage($chatSession->id, $response['apiResponse']['answer'], true);
        }

        // debug input message
        // $this->logDebugData($response['data']);

        $this->sendJsonResponse($response['apiResponse']);
        parent::initContent();
    }

    private function sendErrorResponse($statusCode, $message)
    {
        http_response_code($statusCode);
        echo json_encode(['error' => $message]);
        exit;
    }

    private function sendJsonResponse($data)
    {
        header('Content-Type: application/json');
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        exit;
    }

    private function logDebugData($data)
    {
        $logFile = __DIR__ . '/debug.log'; // Change the path if needed
        $logData = '[' . date('Y-m-d H:i:s') . '] ' . print_r($data, true) . "\n";
        file_put_contents($logFile, $logData, FILE_APPEND);
    }
}
