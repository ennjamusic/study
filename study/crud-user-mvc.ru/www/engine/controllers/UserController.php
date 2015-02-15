<?php

class UserController extends CController {

    public function indexAction() {
        CMain::setTitle(CMain::getAppName()." | ".CMain::getTranslate('allUsers'));
        if($_SESSION["userRole"]==USER_ROLE_ADMIN) {
            $model = new UserModel();
            $arrResult = $model->findAll();
            $this->render("viewList","user",$arrResult);
        } else {
            CMain::redirect("/");
        }
    }

    public function viewAction() {
        CMain::setTitle(CMain::getAppName()." | ".CMain::getTranslate('user'));
        if($_SESSION["userRole"]==USER_ROLE_ADMIN) {
            $model = new UserModel();
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
            CMain::redirect("/");
        }
    }

    public function createAction() {
        CMain::setTitle(CMain::getAppName()." | ".CMain::getTranslate('createUser'));
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
            CMain::redirect("/");
        }
    }

    public function deleteAction() {
        if($_SESSION["userRole"]==USER_ROLE_ADMIN && $_GET["view"]=="delete" && !empty($_GET["id"])) {
            $model = new UserModel();
            $id = filterGetValue($_GET["id"]);
            $model->deleteById($id);
            CMain::redirect(CMain::getLink(array("controller"=>"user", "view"=>"index")));
        } else {
            CMain::redirect("/");
        }
    }

}