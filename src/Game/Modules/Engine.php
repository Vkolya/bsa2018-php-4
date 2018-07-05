<?php

namespace BinaryStudioAcademy\Game\Modules;

use BinaryStudioAcademy\Game\Modules\AbstractModule;
 
class Engine extends AbstractModule{
    
    
    const NEEDED_COMPONENTS = ['Metal','Carbon','Fire'];
  
    public $metal;
    public $carbon;
    public $fire;
    public $inventory;
    public $builder;

    public function __construct($metal,$carbon,$fire,$inventory) {
        $this->metal = $metal;
        $this->carbon = $carbon;
        $this->fire = $fire;
        $this->inventory = $inventory;
        $this->builder = new ModuleBuilder($inventory);
    }
    
}

