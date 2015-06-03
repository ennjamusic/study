<?php

/**
 * Class CModelConnectDB use the Singleton pattern
 */

class CModelConnectDB {
    private $link;
    private $dsn, $username, $password;

    private static $instance = null;

    public static function getInstance() {
        if(self::$instance==null) {
            $dsn = CApp::settings('APPLICATION')->db['dsn'];
            $user = CApp::settings('APPLICATION')->db['db_user'];
            $pass = CApp::settings('APPLICATION')->db['db_pass'];
            self::$instance = new CModelConnectDB($dsn,$user,$pass);
            return self::$instance->getDBConnection();
        } else {
            /**
             * Using the one connection to Database for all
             *
             * if it need, it may return false to deny for all other except one
             */
            return false;
        }
    }

    /**
     * Private __construct & __clone
     */

    private function __construct($dsn, $username, $password)
    {
        $this->dsn = $dsn;
        $this->username = $username;
        $this->password = $password;
        $this->connect();
    }

    private function __clone() {

    }

    private function connect()
    {
        try {
            $this->link = new PDO($this->dsn, $this->username, $this->password);
        } catch (PDOException $e) {
            throw new CException(__CLASS__,"Проблема с подключением к БД ".$e->getMessage());
            die();
        }
    }

    private function getDBConnection() {
        return $this->link;
    }

    public function __sleep()
    {
        return array('dsn', 'username', 'password');
    }

    public function __wakeup()
    {
        $this->connect();
    }

}