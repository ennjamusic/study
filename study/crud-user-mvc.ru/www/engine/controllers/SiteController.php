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
        if($_SESSION["userRole"]==USER_ROLE_ADMIN) {
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
            } else {
        CMain::redirect("/");
        }
    }

    public function cacheClearAction() {
        $dirname = $_SERVER["DOCUMENT_ROOT"]."/cache/";
        $dir = opendir($dirname);
        while (($file = readdir($dir)) !== false){
            if(is_file($dirname."/".$file))
                unlink($dirname."/".$file);
        }
        $path = CMain::getLink(array("controller"=>"site",
                                    "view"=>"settings"));
        CMain::redirect($path);
    }

    public function registerAction() {
        /**
         * ToDo: Registration success messages
         */
        if(isset($_POST["registerForm"]) && !empty($_POST["registerForm"])) {
            $filteredUserInfo = array();
            foreach($_POST["registerForm"] as $key=>$value) {
                $filteredUserInfo[$key] = filterGetValue($value);
            }
            $model = new UserModel();
            $model->create($filteredUserInfo);

        }
        $this->render("register","user");
    }

} 