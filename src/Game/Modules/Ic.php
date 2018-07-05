<?php

namespace BinaryStudioAcademy\Game\Modules;

use BinaryStudioAcademy\Game\Modules\AbstractModule;
 
class Ic extends AbstractModule{
    
    
    const NEEDED_COMPONENTS = ['Metal','Silicon'];
  
    public $metal;
    public $silicon;
    public $inventory;
    public $builder;

    public function __construct($metal,$silicon,$inventory) {
        $this->metal = $metal;
        $this->silicon = $silicon;
        $this->inventory = $inventory;
        $this->builder = new ModuleBuilder($inventory);
    }
    
}

