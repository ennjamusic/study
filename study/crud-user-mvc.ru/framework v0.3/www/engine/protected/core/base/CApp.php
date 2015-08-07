<?php

class CApp {

    private static $pageTitle = "";

    public static function settings($setting=null) {
        $settings = include $_SERVER['DOCUMENT_ROOT']."/engine/protected/config/config.php";
        if(!empty($settings['APPLICATION']['db']['dsn']) && $settings['APPLICATION']['db']['dsn']!="") {
            $settings['APPLICATION']['db']['dsn'] =
                str_replace('?host?',$settings['APPLICATION']['db']['db_host'],$settings['APPLICATION']['db']['dsn']);
            $settings['APPLICATION']['db']['dsn'] =
                str_replace('?dbname?',$settings['APPLICATION']['db']['db_name'],$settings['APPLICATION']['db']['dsn']);
        }
        if (!empty($setting)) {
            return (object)$settings[$setting];
        } else {
            return (object)$settings;
        }
    }

    public static function getLink($linkArray) {
        $link="";
        if(self::settings("APPLICATION")->settings['hfurl_on']==1) {
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

    public static function redirect($link) {
        header("Location: ".$link."\n");
    }

    public static function getTranslateAll($key=null) {
        $jsonStr = file_get_contents($_SERVER["DOCUMENT_ROOT"].CApp::settings('APPLICATION')->template_path."lang/".CApp::settings('APPLICATION')->lang."/lang.json");
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
        return self::settings('APPLICATION')->name;
    }

    public static function getTemplate() {
        $settings = self::getSettingsArray();
        return $settings["template"];
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

    public static function import($alias) {
        $path = CFiles::getPathFromAlias($include,'modules');
        CFiles::includeAllDir($path);
    }

}