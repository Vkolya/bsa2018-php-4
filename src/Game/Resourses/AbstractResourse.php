<?php

namespace BinaryStudioAcademy\Game\Resourses;

abstract class AbstractResourse
{
    public function takeResource() {
        $this->inventory->takeResource($this);
    }
    public function getResourceName() {
        return  str_replace(__NAMESPACE__ . "\\", "", get_called_class());
    }
    public function procureResource() {
        $this->procurer->procure($this);
    }
     
}

