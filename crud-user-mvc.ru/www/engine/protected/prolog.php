<?php
/**
 *  Include the config and class files. If the files is not found, then system will die.
 */

if(file_exists($_SERVER["DOCUMENT_ROOT"]."/engine/protected/config/config.php")) {
    include_once($_SERVER["DOCUMENT_ROOT"]."/engine/protected/config/config.php");
} else {
    echo "Error: Config file is not found.";
    die();
}
include_once($_SERVER["DOCUMENT_ROOT"].LANG_PATH);
include_once($_SERVER["DOCUMENT_ROOT"]."/engine/protected/CController.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/engine/protected/CModelConnectDB.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/engine/protected/CMain.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/engine/protected/CModel.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/engine/protected/autoload.php");
