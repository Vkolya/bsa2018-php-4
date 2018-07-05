<?php

namespace BinaryStudioAcademy\Game\Modules;

use BinaryStudioAcademy\Game\Modules\AbstractModule;
 
class Wires extends AbstractModule{
    
    
    const NEEDED_COMPONENTS = ['Copper','Fire'];
  
    public $copper;
    public $fire;
    public $inventory;
    public $builder;

    public function __construct($copper,$fire,$inventory) {
        $this->copper = $copper;
        $this->fire = $fire;
        $this->inventory = $inventory;
        $this->builder = new ModuleBuilder($inventory);
    }
    
}

