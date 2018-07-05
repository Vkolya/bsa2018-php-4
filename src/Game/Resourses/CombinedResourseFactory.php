<?php

namespace BinaryStudioAcademy\Game\Resourses;
 
use BinaryStudioAcademy\Game\Resourses\Metal;
 
class CombinedResourseFactory {
    public function createMetal($iron,$fire,$inventory) : Metal {
       return new Metal($iron,$fire,$inventory);
    }
}

