<?php
include($_SERVER["DOCUMENT_ROOT"]."/engine/protected/prolog.php");
//echo count($_GET);
if(count($_GET)==0 || !isset($_GET["controller"])) {
    $controller = new SiteController();
    $controller->indexAction();
} else {
    if(isset($_GET["controller"]) && !empty($_GET["controller"])) {
        $urlController = ucfirst(strtolower(filterGetValue($_GET["controller"])));
        $controller = CApp::createObj($urlController);
        if(isset($_GET["view"]) && !empty($_GET["view"])) {
            $view = filterGetValue($_GET["view"]);
        } else {
            $view = "index";
        }
        $action = CApp::createAction($view);
        if(isset($_GET["param"]) && !empty($_GET["param"])) {
            $controller->$action(filterGetValue($_GET["param"]));
        } else {
            $controller->$action();
        }
    }
}
