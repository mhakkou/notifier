<?php 

namespace Tests\Factory;

use Mhakkou\Notifier\Enums\NotificationChannel;
use Mhakkou\Notifier\Factory\NotificationFactory;
use Mhakkou\Notifier\Notifications\EmailNotification;
use Mhakkou\Notifier\Notifications\SlackNotification;
use Mhakkou\Notifier\Notifications\TelegramNotification;
use PHPUnit\Framework\TestCase;

/**
 * Test suite for the Factory pattern implementation.
 * Tests Email, Telegram, Slack notifications are created.
 */
class NotificationFactoryTest extends TestCase{

/**
 * The testCreatesEmailNotification tests that Email notification is created and its instance of EmailNotification
 * @return void
 * @test
 */
public function testCreatesEmailNotification(){
    $notification = NotificationFactory::create(sender: 'mhakkou',  chanel: NotificationChannel::EMAIL);
    $this->assertInstanceOf(EmailNotification::class, $notification);

}

/**
 * The testCreatesTelegramNotification tests that telegram notification is created and its instance of TelegramNotification
 * @return void
 * @test
 */
public function testCreatesTelegramNotification(){
    $notiffication = NotificationFactory::create( sender: "mouataz", chanel: NotificationChannel::TELEGRAM);
    $this->assertInstanceOf(TelegramNotification::class, $notiffication);
}

/**
 * The testCreatesSlackNotification tests that slack notification is created and its instance of SlackNotification
 * @return void
 * @test
 */
public function testCreatesSlackNotification(){
    $notification = NotificationFactory::create(sender: 'mouataz', chanel: NotificationChannel::SLACK);
    $this->assertInstanceOf(SlackNotification::class, $notification);
    
}

}