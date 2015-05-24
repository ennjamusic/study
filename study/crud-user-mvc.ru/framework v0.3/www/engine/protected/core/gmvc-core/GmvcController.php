<?php

class GmvcController {

    public function indexAction() {
//        debug($_SESSION);
        if($_SESSION["GMVC_AUTH"]!="Y") {
            if($_POST["enter"]&&!empty($_POST["password"])) {
                $pass = filterGetValue($_POST["password"]);
//                debug($_SESSION);
                if($pass == CApp::settings("APPLICATION")->components['gmvc']['gmvc_pass']) {
                    $_SESSION["GMVC_AUTH"]="Y";
                    CApp::redirect("");
                }
            }
            $this->render("login");
        } else {
            $this->render("index");
        }
    }

    public function genModelAction() {
        if($_SESSION["GMVC_AUTH"]=="Y") {
            if($_POST["save"]=="Save") {
                $model = new GmvcModel();
                $modelName = filterGetValue($_POST["modelName"]);
                $model->generateModel($modelName);
            }
            $this->render("genModel");
        } else {
            CApp::redirect("index");
        }
    }

    public function genControllerAction() {
        if($_SESSION["GMVC_AUTH"]=="Y") {

            if(!empty($_POST["newController"])) {
                $viewsArray = array();
                if(!empty($_POST["views"])) {
                    $viewsArray = explode(",",$_POST["views"]);
                    foreach($viewsArray as $key=>$value) {
                        $viewsArray[$key] = filterGetValue($value);
                    }
                }
                $controllerName = filterGetValue($_POST["newController"]);
                $model = new GmvcModel();
                $model->generateController($controllerName,$viewsArray);
                $model->generateViews($controllerName,$viewsArray);
            }
            $this->render("genController");
        } else {
           CApp::redirect("index");
        }
    }

    public function genFormAction() {
        if($_SESSION["GMVC_AUTH"]=="Y") {

            if($_POST["submit"]=="Save") {
                $model = new GmvcModel();

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

        } else {
            CApp::redirect("index");
        }
    }

    public function createTableAction() {

        if($_SESSION["GMVC_AUTH"]=="Y") {

            if($_POST["save"]=="Save") {
                $model = new GmvcModel();

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
        } else {
           CApp::redirect("index");
        }
    }

    private function render($view) {
        include_once($_SERVER["DOCUMENT_ROOT"]."/engine/protected/core/gmvc-core/template/header.php");
        include_once($_SERVER["DOCUMENT_ROOT"]."/engine/protected/core/gmvc-core/template/views/".$view.".php");
        include_once($_SERVER["DOCUMENT_ROOT"]."/engine/protected/core/gmvc-core/template/footer.php");
    }

} 