<?php

class TranslateController extends CController {

    public function indexAction() {
        if($_SESSION["userRole"]==USER_ROLE_ADMIN) {
            CApp::setTitle(CApp::getAppName()." | ".CApp::getTranslate('translateApp'));
            $arrResult = CApp::getTranslateAll();
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
            CApp::redirect("/");
        }
    }

} 