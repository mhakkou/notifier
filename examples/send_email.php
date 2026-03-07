<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Mhakkou\Notifier\Factory\NotificationFactory;

$emailNotification = NotificationFactory::create(NotificationFactory::EMAIL_NOTIFICATION);

$emailNotification->send('sender', 'recepient', 'subject', 'message');

