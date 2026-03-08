<?php 

namespace Mhakkou\Notifier\Handlers;

use Mhakkou\Notifier\Contracts\NotificationHandlerInterface;

abstract class BaseNotificationHandler implements NotificationHandlerInterface{

    private ?NotificationHandlerInterface $next = null;
    public function setNext(NotificationHandlerInterface $handler):NotificationHandlerInterface
    {
        $this->next = $handler;
        return $handler;
    }

    public function handle(string $priority, string $sender, string $recipient, string $subject, string $message): void
    {
        if($this->next){
            $this->next->handle($priority, $sender, $recipient, $subject, $message);
        }
    }
}