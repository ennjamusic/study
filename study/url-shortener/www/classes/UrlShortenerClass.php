<?php

class UrlShortenerClass {

    protected static $chars = "123456789bcdfghjkmnpqrstvwxyzBCDFGHJKLMNPQRSTVWXYZ";

    public function checkUrl($url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch,  CURLOPT_RETURNTRANSFER, TRUE);
        $response = curl_exec($ch);
        $response_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if($response_status != '200')
        {
            die("Address don't exist");
        }
    }

    public function createShortCode($id_url) {
        $id = intval($id_url);
        if($id<1) {
            throw new Exception("The id isn't valid");
        }

        $length = strlen(self::$chars);
        $code = "";
        while ($id > $length - 1) {
            $code = self::$chars[fmod($id, $length)] . $code;
            $id = floor($id / $length);
        }

        $code = self::$chars[$id] . $code;
//        echo $code;
        return $code;

    }

} 