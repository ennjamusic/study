<?php
include_once $_SERVER["DOCUMENT_ROOT"]."/engine/protected/core/base/CFiles.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/engine/protected/core/exceptions/CException.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/engine/protected/core/cache/CCache.php";

// it is required files
CFiles::includeAllDir($_SERVER["DOCUMENT_ROOT"]."/engine/protected/core/base");

// if db enabled in file /protected/config/config.php then it is include files from protected/core/db
if(CApp::settings("APPLICATION")->db['db_enabled']) {
    CFiles::includeAllDir($_SERVER["DOCUMENT_ROOT"]."/engine/protected/core/db");
}

spl_autoload_register(function ($className) {

    $classInfo = [];
    $autoloadClasses = [];
    $autoloadClasses = include $_SERVER["DOCUMENT_ROOT"]."/engine/protected/core/system/system.php";
    $classType = CFiles::getClassType($className);

    CFiles::autoInclude($className, $autoloadClasses[$classType]);
});

function debug($var) {
    echo "<pre>"; print_r($var); echo "</pre>";
}

function filterGetValue($var) {
    return trim(strip_tags(addslashes($var)));
}

$settings = CApp::getSettingsArray();

session_start();
