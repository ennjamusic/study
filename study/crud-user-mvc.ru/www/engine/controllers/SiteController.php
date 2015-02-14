<?php

class SiteController extends CController {

    public function indexAction() {
        CMain::setTitle(CMain::getAppName()." | ".CMain::getTranslate('enter'));
        if(isset($_POST["loginForm"]) && !empty($_POST["loginForm"])) {
            $login = filterGetValue($_POST["loginForm"]["login"]);
            $password = filterGetValue($_POST["loginForm"]["password"]);
            $model = new UserModel();
            if(!$model->login($login,$password)) {
                $errMessages[] = CMain::getTranslate("accessDenied");
            } else {
                $link = CMain::getLink(array("controller"=>"user",
                                            "view"=>"index"));
                CMain::redirect($link);
            }
        }
        $this->render("login","user");
    }

    public function logoutAction() {
        UserModel::logout();
    }

    public function settingsAction() {
        CMain::setTitle(CMain::getAppName()." | ".CMain::getTranslate('settings'));
        $arrResult = CMain::getSettingsArray();
        if(!empty($_POST["SETTINGS"])) {
            $settingsArray = array();
            foreach ($_POST["SETTINGS"] as $key=>$value) {
                $settingsArray[$key] = filterGetValue($value);
            }
            $model = new SiteModel();
            $arrResult = $model->update($settingsArray);
        }
        $this->render("settings","site",$arrResult);
    }

    public function registerAction($userInfoArray) {
        /**
         * ToDo: registerAction
         */
    }

} 