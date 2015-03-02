<?php

class CGmvcController {

    public function indexAction() {

        $this->render("index");
    }

    public function genModelAction() {

        $this->render("genModel");
    }

    public function genControllerAction() {

        if(!empty($_POST["newController"])) {
            $viewsArray = array();
            if(!empty($_POST["views"])) {
                $viewsArray = explode(",",$_POST["views"]);
                foreach($viewsArray as $key=>$value) {
                    $viewsArray[$key] = filterGetValue($value);
                }
            }
            $controllerName = filterGetValue($_POST["newController"]);
            $model = new CGmvcModel();
            $model->generateController($controllerName,$viewsArray);
            $model->generateViews($controllerName,$viewsArray);
        }
        $this->render("genController");
    }

    public function genFormAction() {

        $this->render("genForm");
        $model = new CGmvcModel();
        $model->generateForm("1");
    }

    public function createTableAction() {

        $model = new CGmvcModel();
        $tableArr = array(
            "id" => array("type"=>"int",
                        "auto_increment"=>true,
                        "not_null"=>true,
                        "key"=>"primary",
                    ),
            "name" => array(
                        "type"=>"varchar",
                        "length"=>55,
            ),
        );

        $model->createTable("book",$tableArr);

        $this->render("createTable");
    }

    private function render($view) {
        include_once($_SERVER["DOCUMENT_ROOT"]."/engine/protected/core/gmvc-core/template/header.php");
        include_once($_SERVER["DOCUMENT_ROOT"]."/engine/protected/core/gmvc-core/template/views/".$view.".php");
        include_once($_SERVER["DOCUMENT_ROOT"]."/engine/protected/core/gmvc-core/template/footer.php");
    }

} 