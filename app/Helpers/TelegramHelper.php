<?php

namespace App\Helpers;

use CodeIgniter\HTTP\Exceptions\HTTPException;

class TelegramHelper
{
    public static function sendMessage($token, $chatId, $message)
    {
        $url = "https://api.telegram.org/bot{$token}/sendMessage";
        $params = [
            'chat_id' => $chatId,
            'text' => $message,
        ];

        $client = \Config\Services::curlrequest();
        $response = $client->post($url, ['form_params' => $params]);

        // Check for HTTP errors
        if ($response->getStatusCode() !== 200) {
            // Log the error or handle it accordingly
            log_message('error', 'Telegram API error: ' . $response->getStatusCode() . ' ' . $response->getBody());
        }
    }
}
