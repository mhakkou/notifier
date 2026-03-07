<?php


namespace Mhakkou\Notifier\Notifications;

use Mhakkou\Notifier\Contracts\NotificationInterface;


class SlackNotification extends BaseNotification{

    public function send(string $sender, string $recipient, string $subject, string $message):void
    {
        echo "Message sent to $recipient via Slack channel !";
        $this->log($recipient);
    }
}