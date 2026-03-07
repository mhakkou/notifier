<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Mhakkou\Notifier\Commands\SendNotificationCommand;
use Mhakkou\Notifier\Factory\NotificationFactory;
use Mhakkou\Notifier\Services\NotificationInvoker;

$slackNotification = NotificationFactory::create(NotificationFactory::SLACK_NOTIFICATION);
$telegramNotification = NotificationFactory::create(NotificationFactory::TELEGRAM_NOTIFICATION);
$emailNotification = NotificationFactory::create(NotificationFactory::EMAIL_NOTIFICATION);

$slackCommand = new SendNotificationCommand($slackNotification, 'mhakk','user','test', 'this is the tect message');
$telegramCommand = new SendNotificationCommand($telegramNotification, 'mhakk','user','test', 'this is the tect message');
$emailCommand = new SendNotificationCommand($emailNotification, 'mhakk','user','test', 'this is the tect message');


$notificationInvoker = new NotificationInvoker();


$notificationInvoker->addCommand($slackCommand);
$notificationInvoker->addCommand($telegramCommand);
$notificationInvoker->addCommand($emailCommand);

$notificationInvoker->run();