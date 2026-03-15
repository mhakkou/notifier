<?php

namespace Tests\Observers;

use Mhakkou\Notifier\Contracts\ObserverInterface;
use Mhakkou\Notifier\Services\Notification;
use Mhakkou\Notifier\Services\NotificationDispatcher;
use PHPUnit\Framework\TestCase;

/**
 * Test suite for the Observer pattern implementation.
 * Tests attach, detach, and notify behaviors of the Notification service.
 */
class NotificationObserverTest extends TestCase{

    /**
     * The testAttache observer ensures that the fake observer ($mock) is being attached to the notification,
     * we call the notify to fire the action so we can test the ouput.
     * this expects that the observer is attached once
     * @return void
     * @test
     */
    public function testAttacheObserver(){
        $notification = new NotificationDispatcher('mhakkou', 'some id', 'test subject', 'test message');

        $mock = $this->createMock(ObserverInterface::class);
        $mock->expects($this->once())
            ->method('update');

        $notification->attach($mock);
        $notification->notify();
    }

    /**
     * The testDetachObserver ensures that the fack observer (mock) is being detached correctly,
     * we are passing the detach before notify to ensure that the notification never sent
     * this test expects that the method update never called.
     * @return void
     * @test
     */
    public function testDetacheObserver(){
        $notification = new NotificationDispatcher('mhakkou', 'some id', 'test subject', 'test message');

        $mock = $this->createMock(ObserverInterface::class);
        $mock->expects($this->never())
            ->method('update');

        $notification->attach($mock);
        $notification->detach($mock);
        $notification->notify();

        
        
    }

    /**
     * The testNotifyObserver ensures that all the observers are sending updates, so we created two observers : 
     * mock and fake, then we attach both of them to the notification .
     * last we send notification 
     * since we created two observers so we expect that each one is calling update once.
     * @return void
     * @test
     */
    public function testNotifyObserver(){
        $notification = new NotificationDispatcher('mhakkou', 'some id', 'test subject', 'test message');

        $mock = $this->createMock(ObserverInterface::class);
        $mock->expects($this->once())
            ->method('update');

        $fake = $this->createMock(ObserverInterface::class);
        $fake->expects($this->once())
            ->method('update');

        $notification->attach($mock);
        $notification->attach($fake);

        $notification->notify();

    }
}