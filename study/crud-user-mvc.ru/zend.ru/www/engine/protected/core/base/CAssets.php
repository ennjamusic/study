<?php

class CAssets {

    public static function linkCss($link) {
        if(strstr($link,'css/')==0) {
            $link = CApp::settings("APPLICATION")->template_path.$link;
        }
        return '<link href="'.$link.'" type="text/css" rel="stylesheet">';
    }

    public static function linkGoogleJQuery($version="2.1.3") {
        return '<script src="https://ajax.googleapis.com/ajax/libs/jquery/'.$version.'/jquery.min.js"></script>';
    }

    public static function linkScriptJS($path) {
        return '<script src="'.$path.'"></script>';
    }

    public static function getAssetsUrl($url) {

        // ToDo: get link assets

        return $url;
    }

} 