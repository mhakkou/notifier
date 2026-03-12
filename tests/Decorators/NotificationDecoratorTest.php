<?php

namespace Tests\Decorators;

use Mhakkou\Notifier\Contracts\NotificationInterface;
use Mhakkou\Notifier\Decorators\SenderDecorator;
use Mhakkou\Notifier\Decorators\TimesTampDecorator;
use PHPUnit\Framework\TestCase;

class NotificationDecoratorTest extends TestCase{

    public function testSenderDecoratorAddSender(){

        $moc = $this->createMock(NotificationInterface::class);
        $moc->expects($this->once())
            ->method('send');
        $sender = new SenderDecorator($moc);
        $res = $sender->send('mhakkou', null, 'subject', 'message');

        $this->assertStringContainsString('mhakkou', $res);

    }

    public function testTimesTampDecoratorAddTimesTamp(){
        $moc = $this->createMock(NotificationInterface::class);
        $moc->expects($this->once())
            ->method('send');

        $timestamp = new TimesTampDecorator($moc);
        $res = $timestamp->send('mhakkou', null, 'subject', 'message');
        $this->assertStringContainsString(date('Y-m-d'), $res);
    }
}