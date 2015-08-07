<?php

class CLog {

    protected $logDir;

    public function __construct() {
        $this->setLogDir("logs");
    }

    public function logging($class,$mess) {
        file_put_contents($this->logDir.$class."Log.txt",$mess."\n\n",FILE_APPEND);
    }

    protected function setLogDir($dirPath) {
        $this->logDir = $_SERVER["DOCUMENT_ROOT"]."/".$dirPath."/";
        if(!is_dir($this->logDir)) {
            mkdir($this->logDir);
        }
    }

} 