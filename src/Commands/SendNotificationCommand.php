<?php

namespace Mhakkou\Notifier\Commands;

use Mhakkou\Notifier\Contracts\CommandInterface;
use Mhakkou\Notifier\Contracts\NotificationInterface;

class SendNotificationCommand implements CommandInterface {

    public function __construct(
        private NotificationInterface $notification, 
        private string $sender,
        private string $recepient,
        private string $subject,
        private string $message
    )
    {}
    public function execute(){
        $this->notification->send($this->sender, $this->recepient, $this->subject, $this->message);
    }
}