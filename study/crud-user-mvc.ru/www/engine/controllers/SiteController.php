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
//                $model->logout();
            } else {
                $link = CMain::getLink(array("controller"=>"user",
                                            "view"=>"index"));
//                debug($link);
                CMain::redirect($link);
            }
        }
        $this->render("login","user");
    }

    public function logoutAction() {
        UserModel::logout();
    }

    public function registerAction($userInfoArray) {

    }

} 