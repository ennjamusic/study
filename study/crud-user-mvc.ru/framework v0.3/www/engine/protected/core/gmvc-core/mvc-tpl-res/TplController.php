<?php

class TplController extends CController {

    public function indexAction() {
        $this->render("index","tpl");
    }

} 