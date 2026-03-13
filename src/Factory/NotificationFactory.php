<?php

namespace Mhakkou\Notifier\Factory;

use Exception;
use Mhakkou\Notifier\Contracts\NotificationInterface;
use Mhakkou\Notifier\Enums\NotificationChannel;

class NotificationFactory {
    private static array $registry = [];

    public static function register(NotificationChannel $notificationChannel, string $class):void
    {
        self::$registry[$notificationChannel->value ] = $class;
    }

    public static function create(string $sender, NotificationChannel $channel): NotificationInterface
    {
        if(!array_key_exists($channel->value, self::$registry)){
            throw new \InvalidArgumentException("Unsupported channel: {$channel->value}");
        }
        return new self::$registry[$channel->value]($sender);
    }
}

