<?php

namespace BinaryStudioAcademy\Game\Commands;

use BinaryStudioAcademy\Game\Commands\CommandInterface;
use BinaryStudioAcademy\Game\GameHelper;

class HelpCommand implements CommandInterface {
    
    private $game_info;
    public function __construct($game_info) {
        $this->game_info = $game_info;
    }
    public function execute() {
        $availible_commands = $this->game_info['availible_commands'];
        $output_str = '';
        foreach ($availible_commands as $name => $desc) {
            $output_str .= $name.' - '.$desc.PHP_EOL;
        }
        return $output_str;
    }
}

