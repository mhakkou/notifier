<?php

namespace Mhakkou\Notifier\Handlers;

use Mhakkou\Notifier\Enums\NotificationChannel;
use Mhakkou\Notifier\Factory\NotificationFactory;

class EmailNotificationHandler extends BaseNotificationHandler{

    private const PRIORITY = 'high';

    public function handle(string $priority, string $sender, string $recipient, string $subject, string $message): void
    {
        if($priority == self::PRIORITY){
            $notification  = NotificationFactory::create(sender: $sender, chanel: NotificationChannel::EMAIL);
            $notification->send($sender, $recipient, $subject, $message);
        }else{
            parent::handle($priority,$sender, $recipient, $subject, $message);
        }
    }
}