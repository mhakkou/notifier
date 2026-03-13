<?php

use Mhakkou\Notifier\Enums\NotificationChannel;
use Mhakkou\Notifier\Factory\NotificationFactory;
use Mhakkou\Notifier\Notifications\EmailNotification;
use Mhakkou\Notifier\Notifications\SlackNotification;
use Mhakkou\Notifier\Notifications\TelegramNotification;

NotificationFactory::register(NotificationChannel::EMAIL, EmailNotification::class);
NotificationFactory::register(NotificationChannel::TELEGRAM, TelegramNotification::class);
NotificationFactory::register(NotificationChannel::SLACK, SlackNotification::class);