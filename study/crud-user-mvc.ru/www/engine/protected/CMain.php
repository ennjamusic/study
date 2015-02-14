<?php

class CMain {
    public static function createObj($class,$typeClass="Controller") {
        $classNew = $class.$typeClass;
        return new $classNew;
    }
    public static function createAction($methodName) {
        return $methodName."Action";
    }
    public static function linkCss($link) {
        return '<link href="'.$link.'" type="text/css" rel="stylesheet">';
    }

    public static function redirect($link) {
        header("Location: ".$link."\n");
    }

    public static function getLink($linkArray) {
        $link = "/?";
        foreach($linkArray as $key=>$value) {
            $link .= $key."=".$value."&";
        }
        return $link;
    }

    public static function getTranslate($key) {

        return;
    }

    public static function getTemplate($key) {

        return;
    }

}