<?php

namespace BinaryStudioAcademy\Game\Commands;

use BinaryStudioAcademy\Game\Commands\CommandInterface;
 
class ProduceCommand implements CommandInterface {

    private $resource;

    public function __construct($resource) {
        $this->resource = $resource;
    }
    public function execute() {
        
        try {
            $this->resource->procureResource();  
            return $this->resource->getResourceName().' added to inventory.';
        } catch (\Exception $e) {
            return $e->getMessage();
        }
          
    }
}

