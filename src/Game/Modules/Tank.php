<?php

namespace BinaryStudioAcademy\Game\Modules;

use BinaryStudioAcademy\Game\Modules\AbstractModule;
 
class Tank extends AbstractModule{
    
    
    const NEEDED_COMPONENTS = ['Metal','Fuel'];
  
    public $metal;
    public $fuel;
    public $inventory;
    public $builder;

    public function __construct($metal,$fuel,$inventory) {
        $this->metal = $metal;
        $this->fuel = $fuel;
        $this->inventory = $inventory;
        $this->builder = new ModuleBuilder($inventory);
    }
    
}

