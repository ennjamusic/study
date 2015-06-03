<?php

class CController {

    public function indexAction() {
        $this->render("index");
    }

    public function viewListAction() {
        $this->render("viewList");
    }

    public function viewAction($param=array()) {
        $this->render("view");
    }

    protected function render($view,$controller="site", $arrResult=[], $template=null) {
        if($template == null) {
            $template = CApp::settings('APPLICATION')->templates['default'];
        }
        $cache = new CCache(604800);
        $flagCache = false;
        if(!$cache->cacheExists(CApp::getHashCurPage()) && CApp::settings("APPLICATION")->settings['cache_on']) {
            $flagCache = true;
            $cache->startCache();
        }
        include $_SERVER["DOCUMENT_ROOT"]."/engine/templates/".$template."/header.php";
        include $_SERVER["DOCUMENT_ROOT"]."/engine/templates/".$template."/views/".strtolower($controller)."/".$view.".php";
        include $_SERVER["DOCUMENT_ROOT"]."/engine/templates/".$template."/footer.php";
        if($flagCache) {
            $cache->writeCache(filterGetValue(CApp::getHashCurPage()));
        }
    }

} 