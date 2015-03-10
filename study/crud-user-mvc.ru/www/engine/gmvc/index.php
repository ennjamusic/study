<?php
include($_SERVER["DOCUMENT_ROOT"]."/engine/protected/prolog.php");
$controller = new CGmvcController();
if(!isset($_GET["view"])) {
    $controller->indexAction();
} else {
    $view = filterGetValue($_GET["view"]);
    $command = new CCommand();
    $action = $command->createAction($view);
    $controller->$action();
}
