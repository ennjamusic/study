<?php

class CApp {

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

    public static function linkGoogleJQuery($version="2.1.3") {
        return '<script src="https://ajax.googleapis.com/ajax/libs/jquery/'.$version.'/jquery.min.js"></script>';
    }

    public static function linkScriptJS($path) {
        return '<script src="'.$path.'"></script>';
    }

    public static function redirect($link) {
        header("Location: ".$link."\n");
    }

    public static function getLink($linkArray) {
        $link="";
        if(HFURL_ON==true) {
            $link="/";
            foreach($linkArray as $key=>$value) {
                if($key!="id" && $key!="param") {
                    $link .= $value."/";
                } else {
                    $link .= $key.$value;
                }
            }
        } else {
            $link = "/?";
            foreach($linkArray as $key=>$value) {
                $link .= $key."=".$value."&";
            }
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
        return self::getTranslateAll($key);
    }

    public static function setTranslateArray($translateArray) {
        $path = $_SERVER["DOCUMENT_ROOT"].TEMPLATE_PATH."lang/".DEFAULT_LANG."/lang.json";
        self::setJsonArray($translateArray,$path);
    }

    public static function getSettingsArray() {
        $jsonStr = file_get_contents($_SERVER["DOCUMENT_ROOT"]."/engine/protected/config/settings.json");
        return json_decode($jsonStr,true);
    }

    public static function getAppName() {
        $settings = self::getSettingsArray();
        return $settings["nameApp"];
    }

    public static function setSettingsArray($settingsArray) {
        $path = $_SERVER["DOCUMENT_ROOT"]."/engine/protected/config/settings.json";
        self::setJsonArray($settingsArray,$path);
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

    public static function getCurPage() {
        return $_SERVER["REQUEST_URI"];
    }

    public static function getHashCurPage() {
        return md5(self::getCurPage());
    }

}