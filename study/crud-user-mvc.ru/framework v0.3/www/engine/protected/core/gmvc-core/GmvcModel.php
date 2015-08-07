<?php

class GmvcModel {

    public function generateModel($mName) {
        $source = __DIR__."/mvc-tpl-res/TplModel.php";
        $destination = $_SERVER["DOCUMENT_ROOT"]."/engine/models/".ucfirst($mName)."Model.php";
        $data = file_get_contents($source);
        $data = str_replace("tpl",$mName,$data);
        $data = str_replace("Tpl",ucfirst($mName),$data);
        file_put_contents($destination,$data);
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

    public function generateFormHtml($path,$formAttrs,$fieldsArray) {

        $this->createDir($path);
        $path = $_SERVER["DOCUMENT_ROOT"]."/engine/".$path;

        $data = '<?php
        include_once $_SERVER["DOCUMENT_ROOT"]."/engine/protected/prolog.php";
        include_once $_SERVER["DOCUMENT_ROOT"]."/engine/templates/".CApp::getTemplate()."/header.php";
        ?>

        <form ';

        foreach($formAttrs as $k=>$v) {
            $data.=$k.'="'.$v.'" ';
        }

        $data.='>';

        foreach($fieldsArray as $labelField=>$fieldArr) {
            $data.=$labelField.'<input ';
            foreach($fieldArr as $k=>$v) {
                $data.=$k.'="'.$v.'" ';
            }
            $data.='/><br />';
        }

        $data.='
        </form>

        <?php
        include_once $_SERVER["DOCUMENT_ROOT"]."/engine/templates/".CApp::getTemplate()."/footer.php";
        ';

        $this->createForm($path,$data);

    }

    public function generateFormWidget($path,$formAttrs,$fieldsArray) {

        $this->createDir($path);
        $path = $_SERVER["DOCUMENT_ROOT"]."/engine/".$path;

        $data = '<?php
        include_once $_SERVER["DOCUMENT_ROOT"]."/engine/protected/prolog.php";
        include_once $_SERVER["DOCUMENT_ROOT"]."/engine/templates/".CApp::getTemplate()."/header.php";


        $form = new CFormWidget();
        $form->startForm(array(
        ';

        foreach($formAttrs as $k=>$v) {
            $data.='"'.$k.'"=>"'.$v.'",';
        }
        $data.='));
        $fields = array(
        ';

        foreach($fieldsArray as $key=>$fieldArr) {
            $data.='"'.$key.'"=>array(';
            foreach($fieldArr as $k=>$v) {
                $data.='"'.$k.'"=>"'.$v.'",';
            }
            $data.='),
            ';
        }

        $data.=');

        $form->getFields($fields);
        $form->getSubmit(array("value"=>"Сохранить"));
        $form->endForm();



        include_once $_SERVER["DOCUMENT_ROOT"]."/engine/templates/".CApp::getTemplate()."/footer.php";
        ';


        $this->createForm($path,$data);
    }

    public function createTable($tableName,$tableInfoArray) {
        $db = CModelConnectDB::getInstance();
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
        $db->exec($strQuery);

    }


    public function createForm($path, $data) {
        file_put_contents($path."/form.php",$data);
    }

    public function createDir($path) {
        $pathArray = explode("/",$path);
        $newDir = $_SERVER["DOCUMENT_ROOT"]."/engine/";
        foreach($pathArray as $dir) {
            $newDir .= $dir."/";
            if(!is_dir($newDir)) {
                mkdir($newDir);
            }
        }
    }

}