<?php

class UserController extends CController {

    public function indexAction() {
<<<<<<< HEAD
        CApp::setTitle(CApp::getAppName()." | ".CApp::getTranslate('allUsers'));
=======
>>>>>>> ac79de2de9019914f8288aba14b731be14e8b101
        if($_SESSION["userRole"]==USER_ROLE_ADMIN) {
            $model = new UserModel();
            $arrResult = $model->findAll();
            $this->render("viewList","user",$arrResult);
        } else {
<<<<<<< HEAD
            CApp::redirect("/");
=======
            global $errMessages;
            global $langArray;
            $errMessages[] = $langArray["accessDenied"];
            CMain::redirect("/");
>>>>>>> ac79de2de9019914f8288aba14b731be14e8b101
        }
    }

    public function viewAction() {
<<<<<<< HEAD
        CApp::setTitle(CApp::getAppName()." | ".CApp::getTranslate('user'));
=======
>>>>>>> ac79de2de9019914f8288aba14b731be14e8b101
        if($_SESSION["userRole"]==USER_ROLE_ADMIN) {
            $model = new UserModel();
            $id = filterGetValue($_GET["id"]);
            $arrResult = $model->findById($id);
<<<<<<< HEAD
            if(!empty($_POST["user"])) {
                $userNewInfo = array();
                foreach($_POST["user"] as $key=>$value) {
                    $userNewInfo[filterGetValue($key)] = filterGetValue($value);
                }
                $model->updateById($id,array_diff($userNewInfo,$arrResult));
                $arrResult = array_merge(array_diff($userNewInfo,$arrResult),array_intersect($userNewInfo,$arrResult));
            }
            $this->render("view","user",$arrResult);
        } else {
            CApp::redirect("/");
=======
            $this->render("view","user",$arrResult);
        } else {
            global $errMessages;
            global $langArray;
            $errMessages[] = $langArray["accessDenied"];
            CMain::redirect("/");
>>>>>>> ac79de2de9019914f8288aba14b731be14e8b101
        }
    }

    public function createAction() {
<<<<<<< HEAD
        CApp::setTitle(CApp::getAppName()." | ".CApp::getTranslate('createUser'));
=======
>>>>>>> ac79de2de9019914f8288aba14b731be14e8b101
        if($_SESSION["userRole"]==USER_ROLE_ADMIN) {
            $model = new UserModel();
            if(!empty($_POST["user"])) {
                foreach($_POST["user"] as $key=>$value) {
                    $arrPost[$key] = filterGetValue($value);
                }
                $model->create($arrPost);
            }
            $this->render("create","user");
        } else {
<<<<<<< HEAD
            CApp::redirect("/");
=======
            global $errMessages;
            global $langArray;
            $errMessages[] = $langArray["accessDenied"];
            CMain::redirect("/");
>>>>>>> ac79de2de9019914f8288aba14b731be14e8b101
        }
    }

    public function deleteAction() {
        if($_SESSION["userRole"]==USER_ROLE_ADMIN && $_GET["view"]=="delete" && !empty($_GET["id"])) {
            $model = new UserModel();
            $id = filterGetValue($_GET["id"]);
            $model->deleteById($id);
<<<<<<< HEAD
            CApp::redirect(CApp::getLink(array("controller"=>"user", "view"=>"index")));
        } else {
            CApp::redirect("/");
=======
            CMain::redirect(CMain::getLink(array("controller"=>"user", "view"=>"index")));
        } else {
            global $errMessages;
            global $langArray;
            $errMessages[] = $langArray["accessDenied"];
            CMain::redirect("/");
>>>>>>> ac79de2de9019914f8288aba14b731be14e8b101
        }
    }

}