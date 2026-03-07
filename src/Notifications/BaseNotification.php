<?php

namespace Mhakkou\Notifier\Notifications;

use Mhakkou\Notifier\Contracts\NotificationInterface;

abstract class BaseNotification implements NotificationInterface{

protected function log($recipient): void
{
    echo "[LOG] Notification sent to $recipient";
}

}