<?php

class CModel {

    protected $tableName;

    protected static $dbLink = null;

    protected function setDbConn($link) {
        self::$dbLink = $link;
    }

    public function __construct() {
        $db = new CModelConnectDB(DSN,DB_USER_NAME,DB_USER_PASS);
        $this->setDbConn($db->getDBConnection());
    }

    public function create($elemInfoArray) {
        $strQuery = "INSERT INTO ".$this->tableName." (";
        $strQuery.= implode(", ",array_keys($elemInfoArray)).")";
        $strQuery.=" VALUES (:".implode(", :",array_keys($elemInfoArray)).")";
        try {
            $stm = self::$dbLink->prepare($strQuery);
            $stm->execute($elemInfoArray);
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function update($elemInfoArray) {

    }

    public function updateById($elemInfoArray) {

    }

    public function updateByAttr($elemInfoArray) {

    }

    public function delete($elemInfo) {
        $strQuery = "DELETE FROM ".$this->tableName." WHERE ";
        foreach($elemInfo as $key=>$value) {
            $strQuery .= "`".$key.'` = "'.$value.'", ';
        }
        $strQuery = substr($strQuery,0,-2);
        try {
            $stm = self::$dbLink->prepare($strQuery);
            $stm->execute($elemInfoArray);
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function deleteById($elemId) {
        return $this->delete(array("id"=>$elemId));
    }

    public function deleteByAttr($elemAttr) {
        return $this->delete($elemAttr);
    }

    public function find($elemInfoArray=array()) {
        $strQuery="";
        $findResult = null;
        if(count($elemInfoArray)==0) {
            $strQuery = "SELECT * FROM ".$this->tableName." ";
        } else {
            $strQuery = "SELECT * FROM ".$this->tableName." WHERE ";
            foreach($elemInfoArray as $key=>$value) {
                $strQuery .= "`".$key.'` = "'.$value.'", ';
            }
            $strQuery = substr($strQuery,0,-2);
        }
        try {
            $resultQuery = self::$dbLink->query($strQuery);
            while ($row = $resultQuery->fetch(PDO::FETCH_ASSOC))
            {
                $findResult[] = $row;
            }
        } catch(PDOException $e) {
            $e->getMessage();
        }
        return $findResult;
    }

    public function findById($elemId) {
        $elem = $this->find(array("id"=>$elemId));
        return $elem[0];
    }

    public function findAll($elemsInfoArray = array()) {
        return $this->find($elemsInfoArray);
    }

    public function findByAttr($elemInfoArray) {

    }

} 