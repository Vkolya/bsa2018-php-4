<?php

namespace BinaryStudioAcademy\Game\Commands;

use BinaryStudioAcademy\Game\Commands\CommandInterface;
 
class CommandRunner {
    
    private $command;
    private $cmd_msg;

    public function setCommand(CommandInterface $command) {
        $this->command = $command;
            return $this;
    }

    public function execute() {
        $this->cmd_msg = $this->command->execute();
    }
    public function getCommandResult() {
        return $this->cmd_msg;
    }
}

