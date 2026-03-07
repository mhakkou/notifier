<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Mhakkou\Notifier\Factory\NotificationFactory;

$slackNotification = NotificationFactory::create(NotificationFactory::SLACK_NOTIFICATION);

$slackNotification->send('sender', 'recepient', 'subject', 'message');

