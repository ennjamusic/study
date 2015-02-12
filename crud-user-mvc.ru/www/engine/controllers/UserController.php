<?php

class UserController extends CController {

    public function indexAction() {
        if($_SESSION["userRole"]==USER_ROLE_ADMIN) {
            $model = new UserModel();
            $arrResult = $model->findAll();
            $this->render("viewList","user",$arrResult);
        } else {
            global $errMessages;
            global $langArray;
            $errMessages[] = $langArray["accessDenied"];
            CMain::redirect("/");
        }
    }

    public function viewAction() {
        if($_SESSION["userRole"]==USER_ROLE_ADMIN) {
            $model = new UserModel();
            $id = filterGetValue($_GET["id"]);
            $arrResult = $model->findById($id);
            $this->render("view","user",$arrResult);
        } else {
            global $errMessages;
            global $langArray;
            $errMessages[] = $langArray["accessDenied"];
            CMain::redirect("/");
        }
    }

    public function createAction() {
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
            global $errMessages;
            global $langArray;
            $errMessages[] = $langArray["accessDenied"];
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
            global $errMessages;
            global $langArray;
            $errMessages[] = $langArray["accessDenied"];
            CMain::redirect("/");
        }
    }

}