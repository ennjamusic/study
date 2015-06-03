<?php

class CException extends Exception {

    public function __construct($class,$msg=NULL) {

        if($msg!=NULL) {
            $this->message = $msg." в файле ".$this->file." в строке #".$this->line;
        };
        if(CApp::settings("APPLICATION")->settings['logs_on']) {
            $log = new CLog();
            $log->logging($class,$this->message);
        }
    }

    public function __toString() {
        return $this->message;
    }

} 