<?php

namespace Tests\Services;

use Mhakkou\Notifier\Services\NotificationLogger;
use PHPUnit\Framework\TestCase;

/**
 * Test suite for the Singleton pattern implementation.
 * 
 */
class NotificationLoggerTest extends TestCase{

    /**
     * Ensure that all instances of the log are the same (we get only one instance)
     * @return void
     * @test
     */
    public function testInstanceReturnSameInstance(){
       $loggerOne = NotificationLogger::getInstance();
       $loggerTwo = NotificationLogger::getInstance();

       $this->assertSame($loggerOne, $loggerTwo);

    }

    /**
     * Ensure that the string returned on the logger is the same we passed
     * @return void
     * @test
     */
    public function testLogReturnsFormattedMessage(){

        $logger = NotificationLogger::getInstance();

        $this->assertStringContainsString('test logger', $logger->log('test logger'));

    }
}