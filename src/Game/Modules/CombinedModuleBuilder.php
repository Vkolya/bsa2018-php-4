<?php

namespace BinaryStudioAcademy\Game\Modules;

use BinaryStudioAcademy\Game\Modules\AbstractModule;

class CombinedModuleBuilder
{
    private $inventory;

    public function __construct($inventory) {
        $this->inventory = $inventory;
    }
    
    public function build(AbstractModule $module) {
      
        $lack_of_materials = $this->inventory->getLackOfNeededModules($module::NEEDED_COMPONENTS);
        if(empty($lack_of_materials)) {
            $this->inventory->addModule($module);
        }else {
            throw new \Exception('Inventory should have: '. implode(',', $lack_of_materials).'.');
        }
    }
     
}

