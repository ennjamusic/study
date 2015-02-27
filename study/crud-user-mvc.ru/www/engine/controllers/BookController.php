<?php

class BookController extends CController {

    public function indexAction() {
        $this->render("index","book");
    }

    public function createAction() {
        $this->render("create","book");
    }

    public function viewAction() {
        $this->render("view","book");
    }

} 