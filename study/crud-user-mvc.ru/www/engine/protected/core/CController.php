<?php

class CController {

    public function indexAction() {
        $this->render("index");
    }

    public function viewListAction() {
        $this->render("viewList");
    }

    public function viewAction($param=array()) {
        $this->render("view");
    }

    protected function render($view,$controller="site", $arrResult=array(), $template=TEMPLATE) {
        global $langArray;
        include_once($_SERVER["DOCUMENT_ROOT"]."/engine/templates/".$template."/header.php");
        include_once($_SERVER["DOCUMENT_ROOT"]."/engine/templates/".$template."/views/".strtolower($controller)."/".$view.".php");
        include_once($_SERVER["DOCUMENT_ROOT"]."/engine/templates/".$template."/footer.php");
    }

} 