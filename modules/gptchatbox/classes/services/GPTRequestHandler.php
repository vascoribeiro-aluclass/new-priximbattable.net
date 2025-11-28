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

class GPTRequestHandler
{
    private $apiEndpoint;
    private $gptModel;
    private $accessToken;
    private $temperature;
    private $maxOutputTokens;
    private $chatbotContext;

    public function __construct()
    {
        $this->apiEndpoint = 'https://api.openai.com/v1/responses';
        $this->gptModel = Configuration::get('GPTCHATBOX_MODEL');
        $this->accessToken = Configuration::get('GPTCHATBOX_API_KEY');
        $this->temperature = $this->validateTemperature(Configuration::get('GPTCHATBOX_TEMPERATURE'));
        $this->maxOutputTokens = (int) Configuration::get('GPTCHATBOX_MAX_OUTPUT_TOKENS');
        $this->chatbotContext = new ChatbotContext();
    }

    public function sendRequest($message, $history)
    {
        $updatedConversationHistory = $this->addMessageConversationHistory($message, $history);

        $data = [
            'model' => $this->gptModel,
            'input' => $message,
            'temperature' => $this->temperature,
            'instructions' => $this->chatbotContext->getContextMessage(),
            'max_output_tokens' => $this->maxOutputTokens,
        ];

        // Check if a vector store ID is available in configuration
        $vectorStoreId = Configuration::get('GPTCHATBOX_VECTOR_STORE_ID');
        if (!empty($vectorStoreId)) {
            $data['tools'] = [
                [
                    'type' => 'file_search',
                    'vector_store_ids' => [$vectorStoreId],
                    'max_num_results' => 20,
                ],
            ];
        }

        $context = Context::getContext();
        if (!empty($context->cookie->chat_previous_response_id)) {
            $data['previous_response_id'] = $context->cookie->chat_previous_response_id;
        }

        return [
            'data' => $data,
            'apiResponse' => $this->makeApiRequest($data, $updatedConversationHistory),
        ];
    }

    private function addMessageConversationHistory($message, $history)
    {
        $conversation = []; // Initialize an empty array

        // Decode existing history if available
        if (!empty($history)) {
            $decodedHistory = json_decode(html_entity_decode($history), true);

            if (json_last_error() === JSON_ERROR_NONE && is_array($decodedHistory)) {
                $conversation = $decodedHistory; // Assign decoded history to conversation
            } else {
                file_put_contents(__DIR__ . '/debug_history.log', 'JSON Decode Error: ' . json_last_error_msg() . "\n", FILE_APPEND);
            }
        }
        // Append new user message
        $conversation[] = ['role' => 'user', 'content' => $message];

        // Get max history limit from configuration
        $gptchatmaxhistory = (int) Configuration::get('GPTCHATBOX_MAX_HISTORY');

        // Ensure we respect the max history limit
        if ($gptchatmaxhistory > 0 && count($conversation) > $gptchatmaxhistory) {
            $conversation = array_slice($conversation, -$gptchatmaxhistory);
        }

        return $conversation;
    }

    private function makeApiRequest($data, $existingConversationHistory)
    {
        $ch = curl_init($this->apiEndpoint);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'Authorization: Bearer ' . $this->accessToken,
            ],
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => json_encode($data, JSON_UNESCAPED_UNICODE),
        ]);

        $response = curl_exec($ch);

        if ($response === false) {
            // Handle cURL error
            echo 'cURL error: ' . curl_error($ch);
            exit;
        }

        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($httpCode !== 200) {
            $decodedResponse = json_decode($response, true);

            // Define custom error messages based on the API error code
            $errorMessageForProductFeed = "context_length_exceeded. This error occurs due to an overload of information being sent to the AI. This typically happens when your shop has a large number of products and you're using the product feed feature.

            To resolve this, you can try the following:
            
            Deactivate certain options in the product feed or disable the product feed entirely.
            
            Alternatively, provide general information about your products in the context boxes instead of using the feed.";

            $errorMessages = [
                'string_above_max_length' => $errorMessageForProductFeed,
                'rate_limit_exceeded' => 'Too many requests have been sent in a short period. Please wait a moment and try again.',
                'context_length_exceeded' => $errorMessageForProductFeed,
                // Add more error codes here if needed
            ];

            // Check if the error code exists in the response and has a custom message
            $errorCode = $decodedResponse['error']['code'] ?? null;
            if (isset($errorMessages[$errorCode])) {
                echo $errorMessages[$errorCode];
            } else {
                echo 'API error: ' . $response;
            }
            exit;
        }

        curl_close($ch);

        $responseData = json_decode($response, true);

        $context = Context::getContext();

        if (!empty($responseData['id'])) {
            $context->cookie->chat_previous_response_id = $responseData['id'];
            $context->cookie->write();
        }

        // debug response
        // $this->logDebugData($responseData);

        $answer = null;
        // $answer = $responseData['output'][1]['content'][0]['text'];
        $answer = $this->extractAssistantMessage($responseData);

        // Append AI response to conversation history
        $existingConversationHistory[] = ['role' => 'assistant', 'content' => $answer];

        // Convert updated history to JSON
        $conversationHistoryJSON = json_encode($existingConversationHistory, JSON_UNESCAPED_UNICODE);

        return [
            'answer' => $answer,
            'conversationHistoryJSON' => $conversationHistoryJSON,
        ];
    }

    private function validateTemperature($inputText)
    {
        // Check if the model is o1 or o3-mini (Fixed hardcoded model names)
        $fixedModels = ['o1', 'o3-mini'];
        if (in_array(Configuration::get('GPTCHATBOX_MODEL'), $fixedModels, true)) {
            return 1.0; // Explicitly return float 1.0
        }

        // Remove non-numeric characters (except decimal point)
        $inputText = preg_replace('/[^0-9.]/', '', $inputText);
        $inputNumber = (float) $inputText; // Convert cleaned input to float

        // Return valid range (0.0 - 1.0), defaulting to 0.8 if out of bounds
        return ($inputNumber >= 0.0 && $inputNumber <= 1.0) ? $inputNumber : 0.8;
    }

    private function logDebugData($data)
    {
        $logFile = __DIR__ . '/debug.log'; // Change the path if needed
        $logData = '[' . date('Y-m-d H:i:s') . '] ' . print_r($data, true) . "\n";
        file_put_contents($logFile, $logData, FILE_APPEND);
    }

    private function extractAssistantMessage($responseData)
    {
        foreach ($responseData['output'] as $outputItem) {
            if (
                isset($outputItem['type'])
                && $outputItem['type'] === 'message'
            ) {
                return $outputItem['content'][0]['text'];
            }
        }

        return null; // no message found
    }
}
