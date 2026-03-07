<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Mhakkou\Notifier\Factory\NotificationFactory;

$telegramNotification = NotificationFactory::create(NotificationFactory::TELEGRAM_NOTIFICATION);

$telegramNotification->send('sender', 'recepient', 'subject', 'message');

