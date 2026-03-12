<?php 

namespace Tests\Handlers;

use Mhakkou\Notifier\Contracts\NotificationHandlerInterface;
use Mhakkou\Notifier\Handlers\EmailNotificationHandler;
use Mhakkou\Notifier\Handlers\SlackNotificationHandler;
use Mhakkou\Notifier\Handlers\TelegramNotificationHandler;
use PHPUnit\Framework\TestCase;

/**
 * Test suite for the Chain Of Responsibility pattern implementation.
 */
class NotificationHandlerTest extends TestCase{

    /**
     * Ensures that the return value of the set next is a notificatonHandlerInterface
     * @return void
     * @test
     */
    public function testSetNext(){
        $slack = new SlackNotificationHandler();
       
        $notificaton = $this->createStub(NotificationHandlerInterface::class);

        $return = $slack->setNext($notificaton);

        $this->assertSame($notificaton, $return);

    }

    /**
     * Ensures that the setNext methode is called and passes the next item on the chain
     * @return void
     * @test
     */
    public function testHandle(){
        $slack = new SlackNotificationHandler();

       $notification =  $this->createMock(NotificationHandlerInterface::class);
        $notification->expects($this->once())
        ->method('handle');

        $slack->setNext($notification);
        $slack->handle('medium', 'mhakk', 'chatId', 'test subject', 'test message');

    }
}