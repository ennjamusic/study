<?php

class CGmvcModel {

    public function generateModel($mName, $mActionsArray) {


    }

    public function generateController($cName, $cActionsArray) {
        $source = __DIR__."/mvc-tpl-res/TplController.php";
        $sourceAct = __DIR__."/mvc-tpl-res/controllerActions/actionTpl.php";
        $destination = $_SERVER["DOCUMENT_ROOT"]."/engine/controllers/".ucfirst($cName)."Controller.php";

        $actionFile = "";
        $handle = fopen($sourceAct, "r");
        while (!feof($handle)) {
            $actionFile.= fgets($handle);
        }
        fclose($handle);

        $handle = fopen($source, "r");
        $result = "";
        while (!feof($handle)) {
            $buffer = fgets($handle);
            if(strstr($buffer,"Action")) {
                $flag = true;
//                echo "123";
            }
            $result.=$buffer;
            if (strstr($buffer,"}") && $flag) {
                $flag = false;
                foreach ($cActionsArray as $val) {
                    $result.="\n".str_replace("{act}",$val,$actionFile)."\n";
                }
            }

        }

        fclose($handle);

        $result = str_replace("tpl",$cName,$result);
        $result = str_replace("Tpl",ucfirst($cName),$result);
        file_put_contents($destination,$result);

        $this->generateViews($cActionsArray);

    }

    public function generateViews($viewsArray) {
        $source = __DIR__."/mvc-tpl-res/views/index.php";
        $destination = $_SERVER["DOCUMENT_ROOT"]."/engine/controllers/".ucfirst($cName)."Controller.php";

    }

    public function generateForm($fieldsArray) {


    }

    public function createTable($tableName,$tableInfoArray) {


    }

}