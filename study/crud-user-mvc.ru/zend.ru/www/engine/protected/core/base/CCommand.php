<?php

class CCommand {

    public function createObj($class,$typeClass="Controller") {
        $classNew = $class.$typeClass;
        return new $classNew;
    }

    public function createAction($methodName) {
        return $methodName."Action";
    }

} 