<?php
    class MyController extends Controller {

        public $defaultAction = 'func';

        public function actionFunc() {

//            $model = new Page;
            $models = Page::model()->findAll(array('order'=>'title desc'));

            $this->render('func', array('model'=>$models));
        }

    }
?>