<?php

class CException extends Exception {

    public function __construct($class,$msg=NULL) {

        if($msg!=NULL) {
            $this->message = $msg." в файле ".$this->file;
        };
        if(LOGS_ON) {
            $log = new CLog();
            $log->logging($class,$this->message);
        }
    }

    public function __toString() {
        return $this->message;
    }

} 