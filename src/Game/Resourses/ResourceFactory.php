<?php

namespace BinaryStudioAcademy\Game\Resourses;

use BinaryStudioAcademy\Game\Resourses\Fire;
use BinaryStudioAcademy\Game\Resourses\Iron;
use BinaryStudioAcademy\Game\Resourses\Sand;
use BinaryStudioAcademy\Game\Resourses\Copper;
use BinaryStudioAcademy\Game\Resourses\Silicon;
use BinaryStudioAcademy\Game\Resourses\Carbon;
use BinaryStudioAcademy\Game\Resourses\Water;
use BinaryStudioAcademy\Game\Resourses\Fuel;
 
class ResourceFactory   {
    public function createFire($inventory) : Fire {
        return new Fire($inventory);
    }
    public function createIron($inventory) : Iron {
        return new Iron($inventory);
    }
    public function createSand($inventory) : Sand {
        return new Sand($inventory);
    }
    public function createCopper($inventory) : Copper {
        return new Copper($inventory);
    }
    public function createSilicon($inventory) : Silicon {
        return new Silicon($inventory);
    }
    public function createCarbon($inventory) : Carbon {
        return new Carbon($inventory);
    }
    public function createWater($inventory) : Water {
        return new Water($inventory);
    }
    public function createFuel($inventory) : Fuel {
        return new Fuel($inventory);
    }
}

