<?php

namespace Mhakkou\Notifier\Factory;

use Mhakkou\Notifier\Notifications\EmailNotification;
use Mhakkou\Notifier\Notifications\SlackNotification;
use Mhakkou\Notifier\Notifications\TelegramNotification;
use InvalidArgumentException;
use Mhakkou\Notifier\Contracts\NotificationInterface;

class NotificationFactory {
    public const EMAIL_NOTIFICATION = "email_type";
    public const TELEGRAM_NOTIFICATION = "telegram_type";
    public const SLACK_NOTIFICATION = "slack_type";

    public static function create(string $notificationType): NotificationInterface
    {
        return match($notificationType){
            self::EMAIL_NOTIFICATION => new EmailNotification(),
            self::TELEGRAM_NOTIFICATION => new TelegramNotification(),
            self::SLACK_NOTIFICATION => new SlackNotification(),
            default => throw new InvalidArgumentException("Invalid notification type : $notificationType")

        };
    }
}

