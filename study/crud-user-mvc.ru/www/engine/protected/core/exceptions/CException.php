<?php

class CException extends Exception {

    public function __construct($msg=NULL) {
        if($msg!=NULL) {
            $this->message = $msg;
        };
    }

    public function __toString() {
        return __CLASS__.": ".$this->message;
    }

} 