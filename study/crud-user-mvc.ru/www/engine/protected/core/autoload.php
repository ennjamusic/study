<?php

function __autoload($className) {
    if(strstr($className,"Controller")) {
        if(!file_exists($_SERVER["DOCUMENT_ROOT"]."/engine/controllers/".$className.'.php')) {
            die();
        } else {
            include_once $_SERVER["DOCUMENT_ROOT"]."/engine/controllers/".$className.'.php';
        }
    } elseif(strstr($className,"Model")) {
        if(!file_exists($_SERVER["DOCUMENT_ROOT"]."/engine/models/".$className.'.php')) {
            die();
        } else {
            include_once $_SERVER["DOCUMENT_ROOT"]."/engine/models/".$className.'.php';
        }
    }
}

function debug($var) {
    echo "<pre>"; print_r($var); echo "</pre>";
}

function filterGetValue($var) {
    return trim(strip_tags(addslashes($var)));
}

$settings = CApp::getSettingsArray();

/*---- TEMPLATE ----*/
define("TEMPLATE",$settings["template"]);
//define("TEMPLATE","template1");
define("TEMPLATE_PATH","/engine/templates/".TEMPLATE."/");

/*---- LANG ----*/
define("DEFAULT_LANG",$settings["lang"]); // or "ru"
//define("LANG_PATH","/engine/".DEFAULT_LANG."/lang.php");
//define("LANG_PATH",TEMPLATE_PATH."lang/".DEFAULT_LANG."/lang.php");

session_start();
