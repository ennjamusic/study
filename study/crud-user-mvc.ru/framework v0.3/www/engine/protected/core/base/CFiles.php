<?php

class CFiles {
    public static function includeAllDir($dir) {
        if($dh = opendir($dir)) {
            while(($file = readdir($dh)) !== false) {
                $full = $dir."/".$file;
                if(is_file($full)) {
                    include_once $full;
                }
            }
            closedir($dh);
        }
    }

    public static function getPathFromAlias($alias,$from=null) {
        $pathRoot = $_SERVER["DOCUMENT_ROOT"].'/engine/protected/';
        $path = $pathRoot;
        if(!empty($from)) {
            $path .= $from.'/';
        }
        foreach(explode('.',$alias) as $dir) {
            $path .= $dir.'/';
        }
        return $path;
    }

    public static function autoInclude($className, $classInfo) {

        if(empty($classInfo)) {
            return;
        }
        $classType = self::getClassType($className);
        if($classType == "Module") {
            if(file_exists($classInfo['pathToFile'].strtolower(str_replace('Module','',$className))."/".ucfirst($className).'.php')) {
                include_once($classInfo['pathToFile'].strtolower(str_replace('Module','',$className))."/".ucfirst($className).'.php');
            } else {
                throw new CException($className,"Не подключился модуль ".$className);
            }
            return;
        }
        if ($classType == 'Widget') {
            if(file_exists($classInfo['pathToFile'].str_replace('Widget','',$className).'/'.$className.'.php')) {
                include_once($classInfo['pathToFile'].str_replace('Widget','',$className).'/'.$className.'.php');
            } else {
                throw new CException($className,"Не подключился класс ".$className);
            }
            return;
        }
        if(file_exists($classInfo['pathToFile'].$className.'.php')) {
            include_once($classInfo['pathToFile'].$className.'.php');
        } else {
            throw new CException($className,"Не подключился класс ".$className);
        }
        return;
    }

    public static function getClassType($className) {
        $types = include $_SERVER["DOCUMENT_ROOT"]."/engine/protected/core/system/system.php";
        $types = array_keys($types);
        foreach($types as $type) {
            if(strstr($className,$type)) {
                return $type;
            }
        }
    }

} 