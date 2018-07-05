<?php

namespace BinaryStudioAcademy\Game\Commands;

use BinaryStudioAcademy\Game\Commands\CommandInterface;
 
class StatusCommand implements CommandInterface {
    private $game;
    public function __construct($game) {
        $this->game = $game;
    }
    public function execute() {
        $text = '';
        if(!empty($resources = $this->game->inventory->getResources())) {
            $text .= 'You have:'.PHP_EOL;
            foreach ($resources as $resource => $quantity) {
                $text .= '-'.$resource.' - '.$quantity.PHP_EOL;
            }
        }
        if(!empty($modules = $this->game->inventory->getModules())) {
            $text .= 'Parts ready:'.PHP_EOL;
            foreach ($modules as $module) {
                $text .= '-'.$module.PHP_EOL;
            }
        }
        $modules_to_build = array_diff($this->game->info['availible_spaceship_modules'],array_map("lcfirst",$modules));
        if(!empty($modules_to_build)) {
            $text .= 'Parts to build:'.PHP_EOL;
            foreach ($modules_to_build as $module) {
                $text .= '-'.$module.PHP_EOL;
            }
        }
       
        return $text;
    }
}

