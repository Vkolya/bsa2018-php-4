<?php

namespace BinaryStudioAcademy\Game\Modules;

use BinaryStudioAcademy\Game\Modules\AbstractModule;
use BinaryStudioAcademy\Game\Modules\CombinedModuleBuilder;
 
class ControlUnit extends AbstractModule{
    
    
    const NEEDED_COMPONENTS = ['Ic','Wires'];
   
    public $ic;
    public $wires;

    public function __construct($ic,$wires,$inventory) {
        $this->ic = $ic;
        $this->wires = $wires;
        $this->inventory = $inventory;
        $this->builder = new CombinedModuleBuilder($inventory);
    }
    public function getModuleName() {
        return 'Control_unit';
    }
    
}

