<?php
include($_SERVER["DOCUMENT_ROOT"]."/engine/protected/prolog.php");
if(GMVC_ON) {
    $controller = new CGmvcController();
    if(!isset($_GET["view"])) {
        $controller->indexAction();
    } else {
        $view = filterGetValue($_GET["view"]);
        $command = new CCommand();
        $action = $command->createAction($view);
        $controller->$action();
    }
} else {
    CApp::redirect("/errors/404.php");
}
