<?php

class CMain {

    private static $pageTitle = "";

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

    public static function getTranslateAll($key=null) {
        $jsonStr = file_get_contents($_SERVER["DOCUMENT_ROOT"].TEMPLATE_PATH."lang/".DEFAULT_LANG."/lang.json");
        $arrLang = json_decode($jsonStr, true);
        $result = "";
        if(isset($arrLang[$key]) && !empty($arrLang[$key])) {
            $result = $arrLang[$key];
        } else {
            $result = $arrLang;
        }
        return $result;
    }

    public static function getTranslate($key) {
        return CMain::getTranslateAll($key);
    }

    public static function setTranslateArray($translateArray) {
        $path = $_SERVER["DOCUMENT_ROOT"].TEMPLATE_PATH."lang/".DEFAULT_LANG."/lang.json";
        CMain::setJsonArray($translateArray,$path);
    }

    public static function getSettingsArray() {
        $jsonStr = file_get_contents($_SERVER["DOCUMENT_ROOT"]."/engine/protected/config/settings.json");
        return json_decode($jsonStr,true);
    }

    public static function getAppName() {
        $settings = CMain::getSettingsArray();
        return $settings["nameApp"];
    }

    public static function setSettingsArray($settingsArray) {
        $path = $_SERVER["DOCUMENT_ROOT"]."/engine/protected/config/settings.json";
        CMain::setJsonArray($settingsArray,$path);
    }

    private static function setJsonArray($dataArray,$path) {
        $data = json_encode($dataArray);
        file_put_contents($path,$data);
    }

    public static function showTitle() {
        return self::$pageTitle;
    }

    public static function setTitle($title) {
        self::$pageTitle = $title;
    }

}