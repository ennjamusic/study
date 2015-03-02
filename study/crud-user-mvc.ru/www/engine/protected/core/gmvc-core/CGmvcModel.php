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

    }

    public function generateViews($cName,$viewsArray) {
        $source = __DIR__."/mvc-tpl-res/views/index.php";
        $destination = $_SERVER["DOCUMENT_ROOT"].TEMPLATE_PATH."views/".$cName."/";
        mkdir($destination);
        foreach($viewsArray as $value) {
            copy($source,$destination.$value.".php");
        }

    }

    public function generateForm($fieldsArray) {
        $form = new CFormWidget();
        $form->startForm(array("method"=>"post","action"=>"index"));
        $fields = array(
            "field1" => array(
                "type" => "text",
                "name" => "field1",
                "value" => "value1",
                "class" => "class1",
                "id" => "id",
            ),
            "field2" => array(
                "type" => "text",
                "name" => "field2",
                "value" => "value2",
            ),
        );
        $form->getFields($fields);
        $form->getSubmit(array("value"=>"Сохранить"));
        $form->endForm();
    }

    public function createTable($tableName,$tableInfoArray) {
        $db = CModelConnectDB::getInstance();
//        debug($db);
        $strQuery = "CREATE TABLE `".$tableName."` (";
        foreach($tableInfoArray as $nameRecord=>$fieldsArray) {
            $strQuery.=$nameRecord." ";
            foreach($fieldsArray as $key=>$value) {
                switch($key) {
                    case "type": $strQuery.=" ".$value; break;
                    case "default": $strQuery.=" DEFAULT ".$value; break;
                    case "constraint": $strQuery.=" CONSTRAINT ".$value; break;
                    case "index": $strQuery.=" INDEX ".$value; break;
                    case "length": $strQuery.="(".$value.")"; break;
                    case "auto_increment": $strQuery.=($value)?" auto_increment":""; break;
                    case "not_null": $strQuery.=($value)?" not null":""; break;
                    case "unique": $strQuery.=($value)?" unique":""; break;
                    case "key": $strQuery.=" ".$value." key"; break;
                    default: break;
                }
            }
            $strQuery.=", ";
        }
        $strQuery = substr($strQuery,0,-2);
        $strQuery.=")";
        echo $strQuery;
//        $db->exec($strQuery);

    }

}