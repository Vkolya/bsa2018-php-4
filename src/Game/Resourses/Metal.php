<?php

namespace BinaryStudioAcademy\Game\Resourses;

 
use BinaryStudioAcademy\Game\Resourses\AbstractResourse;
use BinaryStudioAcademy\Game\Resourses\CombinedResourseProcurer;
 
class Metal extends AbstractResourse {
    
    const NEEDED_RESOURCES = ['Iron','Fire'];
    
    public $iron;
    public $fire;
    public $inventory;
    public $procurer;

    
    public function __construct($iron,$fire,$inventory) {
        $this->iron = $iron;
        $this->fire = $fire;
        $this->inventory = $inventory;
        $this->procurer = new CombinedResourseProcurer($inventory);
    }
    
}

