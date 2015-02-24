<?php

class UserController extends CController {

    public function indexAction() {
        CApp::setTitle(CApp::getAppName()." | ".CApp::getTranslate('allUsers'));
        if($_SESSION["userRole"]==USER_ROLE_ADMIN) {
            $model = new UserModel();
            $arrResult = $model->findAll();
            $this->render("viewList","user",$arrResult);
        } else {
            CApp::redirect("/");
        }
    }

    public function viewAction() {
        CApp::setTitle(CApp::getAppName()." | ".CApp::getTranslate('user'));
        if($_SESSION["userRole"]==USER_ROLE_ADMIN) {
            $model = new UserModel();
            debug($_GET);
            $id = filterGetValue($_GET["id"]);
            $arrResult = $model->findById($id);
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
        }
    }

    public function createAction() {
        CApp::setTitle(CApp::getAppName()." | ".CApp::getTranslate('createUser'));
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
            CApp::redirect("/");
        }
    }

    public function deleteAction() {
        if($_SESSION["userRole"]==USER_ROLE_ADMIN && $_GET["view"]=="delete" && !empty($_GET["id"])) {
            $model = new UserModel();
            $id = filterGetValue($_GET["id"]);
            $model->deleteById($id);
            CApp::redirect(CApp::getLink(array("controller"=>"user", "view"=>"index")));
        } else {
            CApp::redirect("/");
        }
    }

}