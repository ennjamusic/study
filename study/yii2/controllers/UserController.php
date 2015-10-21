<?php

namespace app\controllers;

class UserController extends \yii\web\Controller
{
    public function actionChangePassword()
    {
        return $this->render('change-password');
    }

    public function actionDelete()
    {
        return $this->render('delete');
    }

    public function actionEdit()
    {
        return $this->render('edit');
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        return $this->render('login');
    }

    public function actionRegistration()
    {
        return $this->render('registration');
    }

    public function actionSave()
    {
        return $this->render('save');
    }

}
