<?php

namespace Mhakkou\Notifier\Notifications;

use Mhakkou\Notifier\Contracts\NotificationInterface;
use Mhakkou\Notifier\Traits\Loggable;

abstract class BaseNotification implements NotificationInterface{

    use Loggable;
    public static int $notificationCount = 0;

    public static function getNotificationCount(){
        return self::$notificationCount;
    }

    public static function resetNotificationCount(){
        self::$notificationCount = 0;
    }
    
}