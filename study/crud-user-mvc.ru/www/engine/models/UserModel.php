<?php

class UserModel extends CModel {
    protected $tableName="users";
    private $user = array();

    public function login($login,$password) {
        $user = $this->find(array("login"=>$login));
        if(count($user)==1) {
            $this->user = $user[0];
            if($this->user["password"]==md5($password) && $this->isAdmin()) {
                $_SESSION["userId"]=$this->user["id"];
                $_SESSION["userRole"]=$this->user["role"];
                return true;
            }
        }
        return false;
    }

    public static function logout() {
        session_destroy();
<<<<<<< HEAD
        CApp::redirect("/");
=======
        CMain::redirect("/");
>>>>>>> ac79de2de9019914f8288aba14b731be14e8b101
    }

    public function isAdmin() {
        return ($this->user['role']==USER_ROLE_ADMIN)?true:false;
    }

<<<<<<< HEAD
=======
    public function register() {
        /**
         * ToDo: Registration
         */
    }
>>>>>>> ac79de2de9019914f8288aba14b731be14e8b101
} 