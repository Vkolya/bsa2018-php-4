<?php

namespace BinaryStudioAcademy\Game;

 
use BinaryStudioAcademy\Game\Commands\CommandRunner;
use BinaryStudioAcademy\Game\Commands\HelpCommand;
use BinaryStudioAcademy\Game\Commands\ExitCommand;
use BinaryStudioAcademy\Game\Commands\StatusCommand;
use BinaryStudioAcademy\Game\Commands\BuildCommand;
use BinaryStudioAcademy\Game\Commands\SchemeCommand;
use BinaryStudioAcademy\Game\Commands\MineCommand;
use BinaryStudioAcademy\Game\Commands\ProduceCommand;
 
class GameService
{
    public $game;
    private $cmd_runner;
    private $message;
    
    public $is_game_completed;


    /**
     * Initialize new game.
     * @param Game $game
    */
    public function __construct($game) {
        $this->game = $game;
        $this->cmd_runner = new CommandRunner;
        $this->is_game_completed  = false;
    }
    /**
     * Receive user input
     * @param $input
    */
    public function executeCommand($input) {
       
        $args = explode(":", $input);
        $command = array_shift($args);
        
        try {
            $class = new \ReflectionClass(get_class($this));
            $class->getMethod($command)->invokeArgs($this, $args);
           
        } catch (\ReflectionException $e) {
            $this->message = "There is no command {$command}";
        }
    }
    /**
     * User command `help`.
     * Show info about availible commands
    */
    public function help() {
        $this->cmd_runner->setCommand(new HelpCommand($this->game->info))->execute();
        $this->message = $this->cmd_runner->getCommandResult();
    }
    /**
     * User command `status`.
     * Show info about modules and resources
    */
    public function status() {
        $this->cmd_runner->setCommand(new StatusCommand($this->game))->execute();
        $this->message = $this->cmd_runner->getCommandResult();
    }
    /**
     * User command `exit`.
     * Exit from game
    */
    public function exit() {
        $this->is_game_completed = true;
    }
    /**
     * User command `build:<module>`.
     * Try to build spaceship module
     * @param $module
    */
    public function build($module) {
       
        if (in_array($module, $this->game->info['availible_spaceship_modules'])) {
               $this->cmd_runner->setCommand(new BuildCommand($this->game->$module, $this))->execute();
               $this->message = $this->cmd_runner->getCommandResult();
              
        } else {
            $this->message = 'There is no such spaceship module.';
        }
    }
    /**
     * User command `scheme:<module>`.
     * Show information about resources need to build a module
     * @param $module
    */
    public function scheme($module) {
        if (in_array($module, $this->game->info['availible_spaceship_modules'])) {
               $this->cmd_runner->setCommand(new SchemeCommand($this->game->$module))->execute();
               $this->message = $this->cmd_runner->getCommandResult();
        } else {
            $this->message = 'There is no such spaceship module.';
        }
    }
    /**
     * User command `mine:<resource>`.
     * Try to main resource
     * @param $resourse
    */
    public function mine($resourse) {
        if(in_array($resourse, $this->game->info['availible_resourses'])) {
            $this->cmd_runner->setCommand(new MineCommand($this->game->$resourse))->execute();
            $this->message = $this->cmd_runner->getCommandResult();
        }else {
            $this->message = 'No such resource.';
        }
    }
    /**
     * User command `produce:<combined_resourse>`.
     * Try to produce combined resource(metal)
     * @param $combined_resourse
    */
    public function produce($combined_resourse) {
        if(in_array($combined_resourse, $this->game->info['availible_combined_resourses'])) {
            $this->cmd_runner->setCommand(new ProduceCommand($this->game->$combined_resourse))->execute();
            $this->message = $this->cmd_runner->getCommandResult();
        }else {
            $this->message = 'No such resource.';
        }
    }
    /**
     * Method returns true if all spaceship's modules are builded
     * @return bool or null
    */ 
    public function isAllModulesBuilded() {
        if(empty(array_diff($this->game->info['availible_spaceship_modules'], array_map("lcfirst",$this->game->inventory->getModules())))) {
            return true;
        }
    }
    /**
     * Method returns message from user's command
     * @return string
    */ 
    public function getMessage() {
        return $this->message;
    }
}
 