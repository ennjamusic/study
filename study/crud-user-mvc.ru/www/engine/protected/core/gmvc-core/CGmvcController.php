<?php

class CGmvcController {

    public function indexAction() {

        $this->render("index");
    }

    public function genModelAction() {
        if($_POST["save"]=="Save") {
            $model = new CGmvcModel();
            $modelName = filterGetValue($_POST["modelName"]);
            $model->generateModel($modelName);
        }
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

        if($_POST["submit"]=="Save") {
            $model = new CGmvcModel();

            $fieldsArray = array();
            $formAttrs = array();
            $path = filterGetValue($_POST["pathForm"]);
            $formTmp = explode(",",$_POST["formAttrs"]);
            foreach($formTmp as $k=>&$v) {
                $v = filterGetValue($v);
                $arr = explode("=",$v);
                $formAttrs[$arr[0]] = str_replace("\"","",$arr[1]);
            }

            foreach($_POST["FIELDS"] as $field) {
                $fieldsArray[filterGetValue($field["nameField"])] = array(
                    "type" => filterGetValue($field["typeField"]),
                    "name" => filterGetValue($field["nameField"]),
                    "value" => filterGetValue($field["defaultVal"]),
                    "class" => filterGetValue($field["classField"]),
                    "id" => filterGetValue($field["idField"]),
                );
            }
            if(filterGetValue($_POST["genForm"])=="html") {
                $model->generateFormHtml($path,$formAttrs,$fieldsArray);
            } elseif(filterGetValue($_POST["genForm"])=="widget") {
                $model->generateFormWidget($path,$formAttrs,$fieldsArray);
            }

        }

        $this->render("genForm");
    }

    public function createTableAction() {

        if($_POST["save"]=="Save") {
            $model = new CGmvcModel();

            $tableName = filterGetValue($_POST["tableName"]);

            $tableArr = array();

            foreach($_POST["FIELDS"] as $fieldArr) {
                $newFieldArr = array();
                foreach($fieldArr as $key=>$val) {
                    if($key == "fieldName") continue;
                    if(!empty($val)) {

                        switch($key) {
                            case "fieldType"; $newFieldArr["type"] = filterGetValue($val); break;
                            case "lengthType"; $newFieldArr["length"] = filterGetValue($val); break;
                            case "keyType"; $newFieldArr["key"] = filterGetValue($val); break;
                            case "defaultVal"; $newFieldArr["default"] = filterGetValue($val); break;
                            case "indexVal"; $newFieldArr["index"] = filterGetValue($val); break;
                            case "ifNull"; $newFieldArr["not_null"] = ($val)?true:false; break;
                            case "ifAI"; $newFieldArr["auto_increment"] = ($val)?true:false; break;
                            default: break;
                        }

                    }
                }
                $tableArr[filterGetValue($fieldArr["fieldName"])] = $newFieldArr;
            }


            if(!empty($tableArr)) {
                $model->createTable($tableName,$tableArr);
            }
        }
        $this->render("createTable");
    }

    private function render($view) {
        include_once($_SERVER["DOCUMENT_ROOT"]."/engine/protected/core/gmvc-core/template/header.php");
        include_once($_SERVER["DOCUMENT_ROOT"]."/engine/protected/core/gmvc-core/template/views/".$view.".php");
        include_once($_SERVER["DOCUMENT_ROOT"]."/engine/protected/core/gmvc-core/template/footer.php");
    }

} 