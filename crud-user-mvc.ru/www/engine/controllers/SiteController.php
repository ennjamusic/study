<?php

class SiteController extends CController {

    public function indexAction() {
        if(isset($_POST["loginForm"]) && !empty($_POST["loginForm"])) {
            $login = filterGetValue($_POST["loginForm"]["login"]);
            $password = filterGetValue($_POST["loginForm"]["password"]);
            $model = new UserModel();
            if(!$model->login($login,$password)) {
                global $errMessages;
                global $langArray;
                $errMessages[] = $langArray["accessDenied"];
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

    public function registerAction($userInfoArray) {
        $model = new CModelConnectDB(DSN,DB_USER_NAME,DB_USER_PASS);
    }

} 