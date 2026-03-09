<?php

namespace Mhakkou\Notifier\Notifications;

use Dotenv\Exception\InvalidPathException;
use Mhakkou\Notifier\Services\HttpClient;

class TelegramNotification extends BaseNotification{

    public function __construct(private HttpClient $client)
    {}

    public function send(string $sender, ?string $recipient, string $subject, string $message):void
    {
        $token = $_ENV['TELEGRAM_BOT_TOKEN'] ?? throw new InvalidPathException('Telegram bot token missing !');
        $recipient = $recipient ?? $_ENV['TELEGRAM_CHAT_ID'] ?? throw new InvalidPathException('Telecram Chat_id missing !');
        $url = "https://api.telegram.org/bot".$token."/sendMessage";

        $params = [
            'chat_id' => $recipient,
            'text' => "Message from ".$sender."\n Subject : ". $subject ."\n" .$message
        ];

        try{
            $res =  $this->client->sendRequest($url, $params);
            $this->log($res);
        }catch(\Exception $e){
            $this->log($e->getMessage());
        }
        
    }

    public function sendToMany():void
    {
        
    }

}