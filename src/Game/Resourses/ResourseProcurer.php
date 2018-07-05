<?php

namespace BinaryStudioAcademy\Game\Resourses;

use BinaryStudioAcademy\Game\Resourses\AbstractResourse;

class ResourseProcurer
{
    private $inventory;

    public function __construct($inventory) {
        $this->inventory = $inventory;
    }
    
    public function procure(AbstractResourse $resource) {
         $this->inventory->addResource($resource);
    }
     
}

