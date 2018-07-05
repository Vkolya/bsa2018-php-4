<?php

namespace BinaryStudioAcademy\Game\Modules;

use BinaryStudioAcademy\Game\Modules\AbstractModule;
use BinaryStudioAcademy\Game\Modules\ModuleBuilder;
 
class Shell extends AbstractModule {
     
    const NEEDED_COMPONENTS = ['Metal','Fire'];
    
    public $metal;
    public $fire;
    public $inventory;
    public $builder;

    public function __construct($metal,$fire,$inventory) {
        $this->metal = $metal;
        $this->fire = $fire;
        $this->inventory = $inventory;
        $this->builder = new ModuleBuilder($inventory);
    }
    
}

