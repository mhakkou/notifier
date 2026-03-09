<?php

namespace Mhakkou\Notifier\Notifications;

use Mhakkou\Notifier\Contracts\NotificationInterface;
use Mhakkou\Notifier\Traits\Loggable;

abstract class BaseNotification implements NotificationInterface{
    use Loggable;
}