<?php

namespace BinaryStudioAcademy\Game\Modules;

use BinaryStudioAcademy\Game\Modules\AbstractModule;
 
class Launcher extends AbstractModule{
    
    
    const NEEDED_COMPONENTS = ['Water','Fire','Fuel'];
  
    public $water;
    public $fire;
    public $fuel;
    public $inventory;
    public $builder;

    public function __construct($water,$fire,$fuel,$inventory) {
        $this->water = $water;
        $this->fire = $fire;
        $this->fuel = $fuel;
        $this->inventory = $inventory;
        $this->builder = new ModuleBuilder($inventory);
    }
    
}

