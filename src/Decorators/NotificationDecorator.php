<?php

namespace Mhakkou\Notifier\Decorators;

use Mhakkou\Notifier\Contracts\NotificationInterface;

abstract class NotificationDecorator implements NotificationInterface{
    public function __construct(protected NotificationInterface $notification)
    {}
}