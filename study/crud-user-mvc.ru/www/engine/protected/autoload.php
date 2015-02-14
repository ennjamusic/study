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

//new CModelConnectDB(DSN,DB_USER_NAME,DB_USER_PASS);

session_start();

global $langArray;
global $errMessages;
//echo $_SERVER["DOCUMENT_ROOT"].LANG_PATH;
