<?php

require_once "/config/config.php";
require_once "/classes/DbClass.php";
require_once "/classes/UrlShortenerClass.php";

if(!empty($_POST["url"])) {
    $url = stripslashes(trim($_POST["url"]));

    $db = new DbClass();
    $shortener = new UrlShortenerClass();
    $shortener->checkUrl($url);

    $short_code="";

    if($finded_url = $db->findByLongUrl($url)) {
        $short_code = $finded_url["short_code"];
    } else {
        $id_url = $db->createByLongUrl($url);
        $short_code = $shortener->createShortCode($id_url);
        $db->insertShortCodeById($id_url,$short_code);
    }

    echo 'http://' . $_SERVER['HTTP_HOST'] . '/' .$short_code;

}
