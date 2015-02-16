<?php
/**
 *  Include the config and class files. If the files is not found, then system will die.
 */

header("Content-type: text/html; charset=utf-8\r\n");

if(file_exists($_SERVER["DOCUMENT_ROOT"]."/engine/protected/config/config.php")) {
    include_once($_SERVER["DOCUMENT_ROOT"]."/engine/protected/config/config.php");
} else {
    echo "Error: Config file is not found.";
    die();
}
include_once($_SERVER["DOCUMENT_ROOT"]."/engine/protected/core/CController.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/engine/protected/core/CModelConnectDB.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/engine/protected/core/CMain.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/engine/protected/core/CModel.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/engine/protected/core/autoload.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/engine/protected/core/CCache.php");
//include_once($_SERVER["DOCUMENT_ROOT"]."/".LANG_PATH);


