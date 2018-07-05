<?php

namespace BinaryStudioAcademy\Game\Modules;

abstract class AbstractModule
{
     
    public function getModuleName() {
        return  str_replace(__NAMESPACE__ . "\\", "", get_called_class());
    }
    public function moduleScheme() {
        return $this->getModuleName().' => '. implode('|', array_map("lcfirst", static::NEEDED_COMPONENTS));
    }
    public function buildModule() {
        $this->builder->build($this);
    }
     
}

