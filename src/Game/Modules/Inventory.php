<?php

namespace BinaryStudioAcademy\Game\Modules;

 
class Inventory {
    
    private $resources = [];
    private $modules = [];

    public function addResource($resource) {
        $this->resources[$resource->getResourceName()] = isset($this->resources[$resource->getResourceName()]) ? $this->resources[$resource->getResourceName()] += 1 : 1;
    }
    public function takeResource($resource) {
        $this->resources[$resource->getName()]  -= 1;
        if($this->resources[$resource] == 0) {
            unset($this->resources[$resource]);
        }
    }
    public function takeResources($resources) {
        foreach ($resources as $resource) {
            $this->resources[$resource] -= 1;
            if($this->resources[$resource] == 0) {
                unset($this->resources[$resource]);
            }
        }
    }
    public function getResources() {
        return $this->resources;
    }
    public function getLackOfNeededResources($needed_resources){
        $lack_of_needed_resources = [];
        foreach ($needed_resources as $resource) {
            if(!isset($this->resources[$resource]) || $this->resources[$resource] == 0) {
                $lack_of_needed_resources[] = lcfirst($resource);
            }
        }
        return $lack_of_needed_resources;
    }
    
    public function addModule($module) {
        $this->modules[] = $module->getModuleName();
    }
    public function isModuleBuilded($module) {
        if(in_array($module->getModuleName(), $this->modules)) {
            return true;
        }
    }
    public function getModules() {
        return $this->modules;
    }
    public function getLackOfNeededModules($needed_modules){
        $lack_of_needed_modules = [];
        foreach ($needed_modules as $module) {
            if(!in_array($module, $this->modules)) {
                $lack_of_needed_modules[] = lcfirst($module);
            }
        }
        return $lack_of_needed_modules;
    }
    
     
}

