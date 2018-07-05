<?php

namespace BinaryStudioAcademy\Game\Resourses;

use BinaryStudioAcademy\Game\Resourses\AbstractResourse;
 
 
class Sand extends AbstractResourse {
    
    public $inventory;
    public $procurer;

    public function __construct($inventory) {
        $this->procurer = new ResourseProcurer($inventory);
        $this->inventory = $inventory;
    }
}

