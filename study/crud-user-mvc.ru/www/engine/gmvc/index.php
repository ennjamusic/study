<?php
include($_SERVER["DOCUMENT_ROOT"]."/engine/protected/prolog.php");
$controller = new CGmvcController();
if(!isset($_GET["view"])) {
    $controller->indexAction();
} else {
    $view = filterGetValue($_GET["view"]);
    $action = CApp::createAction($view);
    $controller->$action();
}
