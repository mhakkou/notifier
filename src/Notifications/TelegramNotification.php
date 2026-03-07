<?php

namespace Mhakkou\Notifier\Notifications;


class TelegramNotification extends BaseNotification{

    public function send(string $sender, string $recipient, string $subject, string $message):void
    {
        echo "Message sent to $recipient via telegram channel ! \n";
        $this->log($recipient);
    }

}