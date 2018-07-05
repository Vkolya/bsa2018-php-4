<?php

namespace BinaryStudioAcademy\Game\Commands;

use BinaryStudioAcademy\Game\Commands\CommandInterface;
 
class SchemeCommand implements CommandInterface {

    private $module;

    public function __construct($module) {
        $this->module = $module;
    }
    public function execute() {
        return $this->module->moduleScheme(); 
    }
}

