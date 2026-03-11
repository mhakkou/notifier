<?php

namespace Mhakkou\Notifier\Factory;

use Mhakkou\Notifier\Notifications\EmailNotification;
use Mhakkou\Notifier\Notifications\SlackNotification;
use Mhakkou\Notifier\Notifications\TelegramNotification;
use InvalidArgumentException;
use Mhakkou\Notifier\Contracts\NotificationInterface;
use Mhakkou\Notifier\Enums\NotificationChannel;
use Mhakkou\Notifier\Services\HttpClient;

class NotificationFactory {

    public static function create(string $sender, NotificationChannel $chanel): NotificationInterface
    {
        return match($chanel){
            NotificationChannel::EMAIL => new EmailNotification(),
            NotificationChannel::TELEGRAM => new TelegramNotification($sender, new HttpClient()),
            NotificationChannel::SLACK => new SlackNotification(),
        };
    }
}

