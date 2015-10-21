<?php

class DbClass {

    private $user_name;
    private $db_name;
    private $user_pass;
    private $link;

    public function __construct() {
        $this->user_name = DB_USER_NAME;
        $this->db_name = DB_NAME;
        $this->user_pass = DB_USER_PASS;
        try {
            $this->link = new PDO(DSN, $this->user_name, $this->user_pass);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function findByShortCode ($short_code) {
        $query = "SELECT * FROM ".SHORT_URL_TABLE." WHERE short_code = :short_code";
        $stmt = $this->link->prepare($query);
        $params = array("short_code"=>$short_code);
        $stmt->execute($params);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function findByLongUrl ($long_url) {
        $query = "SELECT * FROM ".SHORT_URL_TABLE." WHERE long_url = :long_url";
        $stmt = $this->link->prepare($query);
        $params = array("long_url"=>$long_url);
        $stmt->execute($params);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insertShortCodeById($id_url,$short_code) {
        if(empty($id_url) || empty($short_code)) {
            throw new Exception("The id or short code isn't valid");
        }
        $query = "UPDATE ".SHORT_URL_TABLE." SET short_code = :short_code WHERE id = :id_url";
        $stmt = $this->link->prepare($query);
        $params = array("short_code"=>$short_code,"id_url"=>$id_url);
        $stmt->execute($params);
    }

    public function createByLongUrl ($long_url) {
        $query = "INSERT INTO ".SHORT_URL_TABLE." (long_url) VALUES (:long_url)";
        $stmt = $this->link->prepare($query);
        $params = array("long_url"=>$long_url);
        $stmt->execute($params);
        return $this->link->lastInsertId();
    }

} 