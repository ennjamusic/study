<?php
/**
 *  Include the config and class files. If the files is not found, then system will die.
 */

<<<<<<< HEAD
header("Content-type: text/html; charset=utf-8\r\n");

=======
>>>>>>> ac79de2de9019914f8288aba14b731be14e8b101
if(file_exists($_SERVER["DOCUMENT_ROOT"]."/engine/protected/config/config.php")) {
    include_once($_SERVER["DOCUMENT_ROOT"]."/engine/protected/config/config.php");
} else {
    echo "Error: Config file is not found.";
    die();
}
<<<<<<< HEAD

include_once($_SERVER["DOCUMENT_ROOT"]."/engine/protected/core/autoload.php");
=======
include_once($_SERVER["DOCUMENT_ROOT"].LANG_PATH);
include_once($_SERVER["DOCUMENT_ROOT"]."/engine/protected/CController.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/engine/protected/CModelConnectDB.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/engine/protected/CMain.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/engine/protected/CModel.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/engine/protected/autoload.php");
>>>>>>> ac79de2de9019914f8288aba14b731be14e8b101
