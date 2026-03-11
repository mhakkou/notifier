<?php

namespace Mhakkou\Notifier\Notifications;

use Dotenv\Exception\InvalidPathException;
use Mhakkou\Notifier\Enums\LogLevel;
use Mhakkou\Notifier\Services\HttpClient;

/**
 * @mixin \Mhakkou\Notifier\Traits\Loggable
 */
class TelegramNotification extends BaseNotification{

    public function __construct(private readonly string $sender, private readonly HttpClient $client)
    {}

    public function send(string $sender, ?string $recipient, string $subject, string $message):void
    {
        $token = $_ENV['TELEGRAM_BOT_TOKEN'] ?? throw new InvalidPathException('Telegram bot token missing !');
        $recipient = $recipient ?? $_ENV['TELEGRAM_CHAT_ID'] ?? throw new InvalidPathException('Telecram Chat_id missing !');
        $url = "https://api.telegram.org/bot".$token."/sendMessage";

        $params = [
            'chat_id' => $recipient,
            'text' => "Message from ".$this->sender."\n Subject : ". $subject ."\n" .$message
        ];

        try{
            $res =  $this->client->sendRequest($url, $params);
            self::$notificationCount ++;

            $this->log(logLevel: LogLevel::INFO, logMessage: $res);
        }catch(\Exception $e){
            $this->log(logLevel: LogLevel::ERROR, logMessage: $e->getMessage());
        }
        
    }

    public function sendToMany(string $subject, string $message, string ...$chatIds):void
    {
        try{
            foreach($chatIds as $chatid){
                $this->send( sender: $this->sender, recipient: $chatid, subject: $subject, message: $message);
            }
            $this->log(logLevel: LogLevel::INFO, logMessage: "Notification Sent !");

        }catch(\Exception $e){
            $this->log(logLevel: LogLevel::ERROR, logMessage: $e->getMessage());
        } 
    }

    public function sendWithMiddleware(string $message, string $subject,  callable ...$midleware){
        foreach($midleware as $m){
            $message = $m($message);
        }

        if($message != null && $message != ""){
            $this->send(sender: $this->sender, recipient: null, subject: $subject, message: $message );
            }else{
                $this->log(logLevel: LogLevel::WARNING, logMessage: "Message corrupted or invalid !");
            }
    }

    public function __toString():string
    {
        return "[TELEGRAM NOTIFICATION] Sender: $this->sender | Chanel: Telegram ";
    }


    public function __destruct()
    {
        $this->log(logLevel: LogLevel::INFO,   logMessage: "[TelegramNotification] Instance destroyed.");
    }

}