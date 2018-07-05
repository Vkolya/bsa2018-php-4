<?php

namespace BinaryStudioAcademy\Game\Modules;

use BinaryStudioAcademy\Game\Modules\AbstractModule;
 
class Porthole extends AbstractModule{
    
    
    const NEEDED_COMPONENTS = ['Sand','Fire'];
   
    public $sand;
    public $fire;
    public $inventory;
    public $builder;

    public function __construct($sand,$fire,$inventory) {
        $this->sand = $sand;
        $this->fire = $fire;
        $this->inventory = $inventory;
        $this->builder = new ModuleBuilder($inventory);
    }
    
}

