<?php


require_once __DIR__ . '/../vendor/autoload.php';

use Mhakkou\Notifier\Handlers\EmailNotificationHandler;
use Mhakkou\Notifier\Handlers\SlackNotificationHandler;
use Mhakkou\Notifier\Handlers\TelegramNotificationHandler;

$slack = new SlackNotificationHandler();
$telegram = new TelegramNotificationHandler();
$email = new EmailNotificationHandler();
$slack->setNext($telegram)->setNext($email);

//change the priority : high / medium / low
$slack->handle('low', 'mhakk', 'user', 'test handler', 'this message to test handlers');
