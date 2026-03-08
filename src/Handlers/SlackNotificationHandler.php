<?php

namespace Mhakkou\Notifier\Handlers;

use Mhakkou\Notifier\Factory\NotificationFactory;

class SlackNotificationHandler extends BaseNotificationHandler{

    private const PRIORITY = 'low';

    public function handle(string $priority, string $sender, string $recipient, string $subject, string $message): void
    {
        if($priority == self::PRIORITY){
            $notification = NotificationFactory::create(NotificationFactory::SLACK_NOTIFICATION);
            $notification->send($sender, $recipient, $subject, $message);
        }else{
            parent::handle($priority, $sender, $recipient, $subject, $message);

        }

    }
}