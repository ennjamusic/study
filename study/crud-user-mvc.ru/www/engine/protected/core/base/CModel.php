<?php

class CModel {

    protected $tableName;

    protected static $dbLink = null;

    protected function setDbConn($link) {
        self::$dbLink = $link;
    }

    public function __construct() {
        if($db = CModelConnectDB::getInstance()) {
            $this->setDbConn($db);
        }
    }

    public function create($elemInfoArray) {
        $strQuery = "INSERT INTO ".$this->tableName." (";
        $strQuery.= implode(", ",array_keys($elemInfoArray)).")";
        $strQuery.=" VALUES (:".implode(", :",array_keys($elemInfoArray)).")";
        try {
            $stm = self::$dbLink->prepare($strQuery);
            $stm->execute($elemInfoArray);
        } catch(PDOException $e) {
            throw new CException(__CLASS__,"Не удается выполнить запрос на вставку ".$e->getMessage());
        }
    }

    public function update($elemInfo,$elemNewInfo) {
        $strQuery = "UPDATE ".$this->tableName." SET ";
        foreach($elemNewInfo as $key=>$value) {
            $strQuery .= "`".$key.'` = "'.$value.'", ';
        }
        $strQuery = substr($strQuery,0,-2);
        $strQuery .= " WHERE ";
        foreach($elemInfo as $key=>$value) {
            $strQuery .= "`".$key.'` = "'.$value.'", ';
        }
        $strQuery = substr($strQuery,0,-2);
        try {
            $stm = self::$dbLink->prepare($strQuery);
            $stm->execute($elemInfoArray);
        } catch(PDOException $e) {
            throw new CException(__CLASS__,"Не удается выполнить запрос на обновление ".$e->getMessage());
        }
    }

    public function updateById($id,$elemInfoArray) {
        return $this->update(array("id"=>$id),$elemInfoArray);
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
            throw new CException(__CLASS__,"Не удается выполнить запрос на удаление ".$e->getMessage());
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
            throw new CException(__CLASS__,"Не удается выполнить запрос на выборку ".$e->getMessage());
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
        return $this->find($elemInfoArray);
    }

} 