<?php

namespace BinaryStudioAcademy\Game\Commands;

use BinaryStudioAcademy\Game\Commands\CommandInterface;
 
class MineCommand implements CommandInterface {

    private $resource;

    public function __construct($resource) {
        $this->resource = $resource;
    }
    public function execute() {
        $this->resource->procureResource(); 
            return $this->resource->getResourceName().' added to inventory.';
    }
}

