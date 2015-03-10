<?php

class CCache {

    private $lifeTime;
    private static $cacheDir;

    public function __construct($lifeTime) {
        self::$cacheDir = $_SERVER["DOCUMENT_ROOT"]."/cache/";
        if(!is_dir(self::$cacheDir)) {

            if(mkdir(self::$cacheDir))
                throw new CException(__CLASS__,"Не удается создать папку для Кэша ");
        }
        $this->lifeTime = $lifeTime;
    }

    public function cacheExists($path) {
        $fullpath = self::$cacheDir . $path.".html";
        if (file_exists($fullpath)) {
            if(time()-filemtime($fullpath)>$this->lifeTime) {
              unlink($fullpath);
                return false;
            }
            $cache = file($fullpath);
            return implode('', $cache);
        }
        return false;
    }

    public function startCache() {
        ob_start();
    }

    public function writeCache($filename) {
        $buffer = ob_get_contents();
        ob_end_flush();
        if(!file_put_contents(self::$cacheDir . $filename.".html",$buffer)) {
            throw new CException(__CLASS__,"Не удается записать файлы кэша ");
        }
    }

}