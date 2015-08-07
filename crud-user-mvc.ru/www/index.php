<?php
include($_SERVER["DOCUMENT_ROOT"]."/engine/protected/prolog.php");
//echo count($_GET);
if(count($_GET)==0 || !isset($_GET["controller"])) {
    $controller = new SiteController();
    $controller->indexAction();
} else {
    if(isset($_GET["controller"]) && !empty($_GET["controller"])) {
        $urlController = ucfirst(strtolower(filterGetValue($_GET["controller"])));
<<<<<<< HEAD
        $command = new CCommand();
        $controller = $command->createObj($urlController);
=======
        $controller = CMain::createObj($urlController);
>>>>>>> ac79de2de9019914f8288aba14b731be14e8b101
        if(isset($_GET["view"]) && !empty($_GET["view"])) {
            $view = filterGetValue($_GET["view"]);
        } else {
            $view = "index";
        }
<<<<<<< HEAD
        $action = $command->createAction($view);
=======
        $action = CMain::createAction($view);
>>>>>>> ac79de2de9019914f8288aba14b731be14e8b101
        if(isset($_GET["param"]) && !empty($_GET["param"])) {
            $controller->$action(filterGetValue($_GET["param"]));
        } else {
            $controller->$action();
        }
    }
}
