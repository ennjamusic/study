<?php

include_once($_SERVER["DOCUMENT_ROOT"]."/engine/protected/core/base/CApp.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/engine/protected/core/base/CCommand.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/engine/protected/core/base/CLog.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/engine/protected/core/db/CModelConnectDB.php");


function __autoload($className) {

    if(strstr($className,"Gmvc")) {
        if(file_exists($_SERVER["DOCUMENT_ROOT"]."/engine/protected/core/gmvc-core/".$className.'.php')) {
            include_once($_SERVER["DOCUMENT_ROOT"]."/engine/protected/core/gmvc-core/".$className.'.php');
        } else {
            throw new CException(__CLASS__,"Не подключился класс ".$className);
        }
        return;
    }

    if(strstr($className,"Controller")) {
        if(file_exists($_SERVER["DOCUMENT_ROOT"]."/engine/controllers/".$className.'.php')) {
            include_once($_SERVER["DOCUMENT_ROOT"]."/engine/controllers/".$className.'.php');
        } else {

            if(file_exists($_SERVER["DOCUMENT_ROOT"]."/engine/protected/core/base/".$className.'.php')) {
                include_once($_SERVER["DOCUMENT_ROOT"]."/engine/protected/core/base/".$className.'.php');
            } else {
                throw new CException(__CLASS__,"Не подключился класс ".$className);
            }
        }
        return;
    }

    if(strstr($className,"Exception")) {
        if(file_exists($_SERVER["DOCUMENT_ROOT"]."/engine/protected/core/exceptions/".$className.'.php')) {
            include_once($_SERVER["DOCUMENT_ROOT"]."/engine/protected/core/exceptions/".$className.'.php');
        } else {
            throw new CException(__CLASS__,"Не подключился класс ".$className);
        }
        return;
    }

    if(strstr($className,"Cache")) {
        if(file_exists($_SERVER["DOCUMENT_ROOT"]."/engine/protected/core/cache/".$className.'.php')) {
            include_once($_SERVER["DOCUMENT_ROOT"]."/engine/protected/core/cache/".$className.'.php');
        } else {
            throw new CException(__CLASS__,"Не подключился класс ".$className);
        }
        return;
    }

    if(strstr($className,"Widget")) {
        $dir = str_replace("Widget","",$className);
        $dir = substr($dir,1);
        if(file_exists($_SERVER["DOCUMENT_ROOT"]."/engine/protected/core/widgets/".$dir."/".$className.'.php')) {
            include_once($_SERVER["DOCUMENT_ROOT"]."/engine/protected/core/widgets/".$dir."/".$className.'.php');
        } else {
            throw new CException(__CLASS__,"Не подключился класс ".$className);
        }
        return;
    }

    elseif(strstr($className,"Model")) {
        if(file_exists($_SERVER["DOCUMENT_ROOT"]."/engine/models/".$className.'.php')) {
            include_once($_SERVER["DOCUMENT_ROOT"]."/engine/models/".$className.'.php');
        } else {

            if(file_exists($_SERVER["DOCUMENT_ROOT"]."/engine/protected/core/base/".$className.'.php')) {
                include_once($_SERVER["DOCUMENT_ROOT"]."/engine/protected/core/base/".$className.'.php');
            } else {
                throw new CException(__CLASS__,"Не подключился класс ".$className);
            }
        }
        return;
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
