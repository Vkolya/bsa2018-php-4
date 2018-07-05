<?php

namespace BinaryStudioAcademy\Game\Modules;

use BinaryStudioAcademy\Game\Modules\AbstractModule;

class ModuleBuilder
{
    private $inventory;

    public function __construct($inventory) {
        $this->inventory = $inventory;
    }
    
    public function build(AbstractModule $module) {
      
        $lack_of_materials = $this->inventory->getLackOfNeededResources($module::NEEDED_COMPONENTS);
        if(empty($lack_of_materials)) {
            $this->inventory->takeResources($module::NEEDED_COMPONENTS);
            $this->inventory->addModule($module);
        }else {
            throw new \Exception('Inventory should have: '. implode(',', $lack_of_materials).'.');
        }
    }
     
}

