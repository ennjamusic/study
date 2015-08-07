<?php

class SiteController extends CController {

    public function indexAction() {
<<<<<<< HEAD

        CApp::setTitle(CApp::getAppName()." | ".CApp::getTranslate('enter'));
=======
>>>>>>> ac79de2de9019914f8288aba14b731be14e8b101
        if(isset($_POST["loginForm"]) && !empty($_POST["loginForm"])) {
            $login = filterGetValue($_POST["loginForm"]["login"]);
            $password = filterGetValue($_POST["loginForm"]["password"]);
            $model = new UserModel();
            if(!$model->login($login,$password)) {
<<<<<<< HEAD
                $errMessages[] = CApp::getTranslate("accessDenied");
            } else {
                $link = CApp::getLink(array("controller"=>"user",
                                            "view"=>"index"));
                CApp::redirect($link);
=======
                global $errMessages;
                global $langArray;
                $errMessages[] = $langArray["accessDenied"];
            } else {
                $link = CMain::getLink(array("controller"=>"user",
                                            "view"=>"index"));
                CMain::redirect($link);
>>>>>>> ac79de2de9019914f8288aba14b731be14e8b101
            }
        }
        $this->render("login","user");
    }

    public function logoutAction() {
        UserModel::logout();
    }

<<<<<<< HEAD
    public function settingsAction() {
        if($_SESSION["userRole"]==USER_ROLE_ADMIN) {
            CApp::setTitle(CApp::getAppName()." | ".CApp::getTranslate('settings'));
            $arrResult = CApp::getSettingsArray();
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
        CApp::redirect("/");
        }
    }

    public function cacheClearAction() {
        $dirname = $_SERVER["DOCUMENT_ROOT"]."/cache/";
        $dir = opendir($dirname);
        while (($file = readdir($dir)) !== false){
            if(is_file($dirname."/".$file))
                unlink($dirname."/".$file);
        }
        $path = CApp::getLink(array("controller"=>"site",
                                    "view"=>"settings"));
        CApp::redirect($path);
    }

    public function aboutAction() {
        $this->render("about","site");
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
=======
    public function registerAction($userInfoArray) {
        $model = new CModelConnectDB(DSN,DB_USER_NAME,DB_USER_PASS);
>>>>>>> ac79de2de9019914f8288aba14b731be14e8b101
    }

} 