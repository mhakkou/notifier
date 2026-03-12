<?php

namespace Tests\Commands;

use Mhakkou\Notifier\Commands\SendNotificationCommand;
use Mhakkou\Notifier\Contracts\NotificationInterface;
use PHPUnit\Framework\TestCase;


/**
 * Test suite for the Command pattern implementation.
 */
class NotificationCommandTest extends TestCase{

    /**
     * Ensure that the send method is fired when we execute the command
     * @return void
     * @test
     */
    public function testNotificationCommand(){
        $notificaton = $this->createMock(NotificationInterface::class);

        $command = new SendNotificationCommand($notificaton, 'mhakkou', 'chatId', 'subject', 'test message' );

        $notificaton->expects($this->once())
            ->method('send');

        $command->execute();
    }
}