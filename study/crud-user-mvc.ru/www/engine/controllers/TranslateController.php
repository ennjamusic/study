<?php

class TranslateController extends CController {

    public function indexAction() {
        if($_SESSION["userRole"]==USER_ROLE_ADMIN && $_GET["view"]=="delete" && !empty($_GET["id"])) {
            CMain::setTitle(CMain::getAppName()." | ".CMain::getTranslate('translateApp'));
            $arrResult = CMain::getTranslateAll();
            if(!empty($_POST["TRANSLATE"])) {
                $translateArray = array();
                foreach ($_POST["TRANSLATE"] as $key=>$value) {
                    if($key=="newVal" && empty($value[0]) && empty($value[1])) {
                        continue;
                    }
                    if(empty($value[0]) && empty($value[1])) {
                        continue;
                    }
                    $translateArray[filterGetValue($value[0])] = filterGetValue($value[1]);
                }
                $model = new TranslateModel();
                $arrResult = $model->update($translateArray,$arrResult);
            }
            $this->render("changeTranslate","translate",$arrResult);
        } else {
            CMain::redirect("/");
        }
    }

} 