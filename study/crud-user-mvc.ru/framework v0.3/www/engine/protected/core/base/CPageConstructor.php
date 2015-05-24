<?php

class CPageConstructor {

    public static function createPageByController($module="") {
        if(count($_GET)==0 || !isset($_GET["controller"])) {
            $controller = new SiteController();
            $controller->indexAction();
        } else {
            if(isset($_GET["controller"]) && !empty($_GET["controller"])) {
                $urlController = ucfirst(strtolower(filterGetValue($_GET["controller"])));
                $command = new CCommand();
                $controller = $command->createObj($module?$module.'\\'.$urlController:$urlController);
                if(isset($_GET["view"]) && !empty($_GET["view"])) {
                    $view = filterGetValue($_GET["view"]);
                } else {
                    $view = "index";
                }
                $action = $command->createAction($view);
                if((isset($_GET["param"]) && !empty($_GET["param"])) || (isset($_GET["id"]) && !empty($_GET["id"]))) {
                    $param = ($_GET["param"]?filterGetValue($_GET["param"]):filterGetValue($_GET["id"]));
                    $controller->$action($param);
                } else {
                    $controller->$action();
                }
            }

        }
        return;
    }

    public static function createPageByModule() {

        if (isset($_GET["module"])) {
            $urlModule = ucfirst(strtolower(filterGetValue($_GET["module"])));
            $command = new CCommand();
            $module = $command->createObj($urlModule,'Module');
            $module->includeModule();
            self::createPageByController($urlModule.'Module');

        }
        return;
    }

} 