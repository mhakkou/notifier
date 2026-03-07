<?php 

namespace Mhakkou\Notifier\Services;

use Mhakkou\Notifier\Contracts\CommandInterface;

class NotificationInvoker{

    private array $commands;

    public function addCommand(CommandInterface $command){
        $this->commands[] = $command;
    }

    public function run(){
        foreach($this->commands as $command){
            $command->execute();
        }
    }

}