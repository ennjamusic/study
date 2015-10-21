<?php

require_once "/config/config.php";
require_once "/classes/DbClass.php";
require_once "/classes/UrlShortenerClass.php";

if(!empty($_GET["link"])) {
    $short_code = stripslashes(trim($_GET["link"]));

    $db = new DbClass();
    $url = $db->findByShortCode($short_code);
    header("Location: " . $url["long_url"]);
}