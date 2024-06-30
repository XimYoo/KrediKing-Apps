<?php
function sendTelegramMessage($chatId, $message) {
    $botToken = "7249048357:AAHRXt3P4uTadnQZr088Q2jBpIKXvF7E7To";
    $url = "https://api.telegram.org/bot$botToken/sendMessage";
    $data = [
        'chat_id' => $chatId,
        'text' => $message
    ];

    $options = [
        'http' => [
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data),
        ],
    ];

    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    return $result;
}
?>
