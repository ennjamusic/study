<?php

class CGmvcController {

    public function indexAction() {

        $this->render("index");
    }

    public function genModelAction() {

        $this->render("genModel");
    }

    public function genControllerAction() {
        $model = new CGmvcModel();
        $model->generateController("newCon",array("create","list"));
        $this->render("genController");
    }

    public function genFormAction() {

        $this->render("genForm");
    }

    public function createTableAction() {

        $this->render("createTable");
    }

    private function render($view) {
        include_once($_SERVER["DOCUMENT_ROOT"]."/engine/protected/core/gmvc-core/template/header.php");
        include_once($_SERVER["DOCUMENT_ROOT"]."/engine/protected/core/gmvc-core/template/views/".$view.".php");
        include_once($_SERVER["DOCUMENT_ROOT"]."/engine/protected/core/gmvc-core/template/footer.php");
    }

} 