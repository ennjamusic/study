<?php

class MenuWidget {

    public static $lang;

    public function __construct($lang_path) {
        $this->setLang($lang_path);
    }

    public function setLang($path) {
        self::$lang = $_SERVER["DOCUMENT_ROOT"].$path;
    }

    public static function getTranslate($wordId) {
        $jsonStr = file_get_contents(self::$lang);
        $translate = json_decode($jsonStr, true);
        return $translate[$wordId];
    }

    public function getMenu($className) {
        $classMethods = get_class_methods($className);
        foreach($classMethods as $key=>$value) {
            if(strstr($value,"Action")) {
                $classMethods[$key] = str_replace("Action","",$value);
            } else {
                unset($classMethods[$key]);
            }
        }
        include_once("template/list.php");
    }
} 