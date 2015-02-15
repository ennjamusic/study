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
            self::$instance = new CModelConnectDB(DSN,DB_USER_NAME,DB_USER_PASS);
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
            echo $e->getMessage();
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