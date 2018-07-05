<?php

namespace BinaryStudioAcademy\Game\Commands;

use BinaryStudioAcademy\Game\Commands\CommandInterface;
 
class BuildCommand implements CommandInterface {

    private $module;
    public $game_service;

    public function __construct($module,$game_service) {
        $this->module = $module;
        $this->game_service = $game_service;
    }
    public function execute() {
        try {
            if(!$this->module->inventory->isModuleBuilded($this->module)){
                $this->module->buildModule();
                if($this->game_service->isAllModulesBuilded()) {
                    $this->game_service->is_game_completed = true;
                    return sprintf($this->game_service->game->info['messages']['module_is_ready_and_game_finished'],$this->module->getModuleName());
                }
                return sprintf($this->game_service->game->info['messages']['module_is_ready'],$this->module->getModuleName());
            }
            return 'Attention! '.$this->module->getModuleName().' is ready.';
        } catch (\Exception $e) {
            return $e->getMessage();
        }
       
    }
}

