<?php

namespace Mhakkou\Notifier\Services;

use Mhakkou\Notifier\Contracts\ObservableInterface;
use Mhakkou\Notifier\Contracts\ObserverInterface;

Class NotificationDispatcher implements ObservableInterface {
    public function __construct(
                private string $sender,
                private string $recipient,
                private string $subject,
                private string $message,
    )
    {}

    private array $observers = [];

    public function attach(ObserverInterface $observer)
    {
        $this->observers[] = $observer;
    }

    public function detach(ObserverInterface $observer)
    {
        $this->observers = array_filter($this->observers, fn($ob) => $ob != $observer);
    }

    public function notify()
    {
        foreach($this->observers as $observer){
            $observer->update("New notification: " . $this->message);
        }
    }
}
