<?php 

namespace Tests\Factory;

use Mhakkou\Notifier\Enums\NotificationChannel;
use Mhakkou\Notifier\Factory\NotificationFactory;
use Mhakkou\Notifier\Notifications\EmailNotification;
use Mhakkou\Notifier\Notifications\SlackNotification;
use Mhakkou\Notifier\Notifications\TelegramNotification;
use Mhakkou\Notifier\Services\Notification;
use PHPUnit\Framework\TestCase;

class NotificationFactoryTest extends TestCase{

public function testCreatesEmailNotification(){
    $notification = NotificationFactory::create(sender: 'mhakkou',  chanel: NotificationChannel::EMAIL);
    $this->assertInstanceOf(EmailNotification::class, $notification);

}

public function testCreatesTelegramNotification(){
    $notiffication = NotificationFactory::create( sender: "mouataz", chanel: NotificationChannel::TELEGRAM);
    $this->assertInstanceOf(TelegramNotification::class, $notiffication);
}

public function testCreatesSlackNotification(){
    $notification = NotificationFactory::create(sender: 'mouataz', chanel: NotificationChannel::SLACK);
    $this->assertInstanceOf(SlackNotification::class, $notification);
    
}

}