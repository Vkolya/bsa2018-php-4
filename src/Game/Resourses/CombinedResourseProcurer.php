<?php

namespace BinaryStudioAcademy\Game\Resourses;

use BinaryStudioAcademy\Game\Resourses\AbstractResourse;

class CombinedResourseProcurer
{
    private $inventory;

    public function __construct($inventory) {
        $this->inventory = $inventory;
    }
    
    public function procure(AbstractResourse $resource) {
        
        $lack_of_resources = $this->inventory->getLackOfNeededResources($resource::NEEDED_RESOURCES);
        if(empty($lack_of_resources)) {
            $this->inventory->takeResources($resource::NEEDED_RESOURCES);
            $this->inventory->addResource($resource);
        }else {
            throw new \Exception('You need to mine: '. implode(',', $lack_of_resources).'.');
        }
   
    }
     
}

