<?php

class BackupController extends CController {

    public function indexAction() {
        $this->render("index","backup");
//        debug($_POST);
        if($_POST['BACKUP'] && $_POST['BACKUP']['doIt']=='y'){
            $_POST["BACKUP"]['STEP']=1;
        } elseif($_POST['EXTRACT']) {
            $_POST["EXTRACT"] = array_keys($_POST["EXTRACT"]);
        }
        if($_POST['BACKUP']["STEP"]==1) {
            $_POST['BACKUP']["STEP"]=2;
        }
        if($_POST['BACKUP']["STEP"]==2) {
            global $zip;
            $zip = new ZipArchive;
//снова используем метод open(), но теперь используем ключ ZipArchive::CREATE
//который говорит, что архив нужно создать
//а первым параметром передаем название архива
            $res = $zip->open($_SERVER["DOCUMENT_ROOT"].'/backups/backup-'.time().'.zip', ZipArchive::CREATE);
            if ($res === TRUE) {
                $dir = $_SERVER["DOCUMENT_ROOT"];
                // echo date("d m Y H i s");
                function f($dir,$zip) {
                    $SubdirList = array();
                    if($dh = opendir($dir)) {
                        while(($file = readdir($dh)) !== false) {
                            $full = $dir."/".$file;
                            if(is_dir($full) && ("." != $file) && (".." != $file)) {
                                $SubdirList[] = $full;
                            } elseif(is_file($full)) {
                                //тут все просто: говорим, какой файл добавить в архив
                                $zip->addFile(str_replace($_SERVER["DOCUMENT_ROOT"],"",$full));
                            }
                        }
                        closedir($dh);
                    }
                    foreach($SubdirList as $k => $v) {
                        f($v,$zip);
                    }
                }
                f($dir,$zip);
                //закрываем работу с архивом
                $zip->close();
                ?>
                <script type="text/javascript">
                    location.href="/backup/index";
                </script>
            <?php
            } else {
                echo 'Ошибка №'.$res;
            }
        }

        if(!empty($_POST['EXTRACT']) && preg_match('/backup-[0-9]*\.zip/',$_POST['EXTRACT'][0])) {
            $zip = new ZipArchive;
            $res = $zip->open($_SERVER["DOCUMENT_ROOT"]."/backups/".$_POST['EXTRACT'][0]);
            //echo 1;
            if ($res === TRUE) {
                $zip->extractTo($_SERVER["DOCUMENT_ROOT"]);
                $zip->close();
                echo "<script>alert('Восстановление прошло успешно');</script>";
            }
//            echo file_exists($_SERVER["DOCUMENT_ROOT"].'/db-backup.sql');


        } elseif(!empty($_POST['EXTRACT']) && $_POST['yt2']) {
            foreach($_POST['EXTRACT'] as $path) {
                if(preg_match('/backup-[0-9]*\.zip/',$path)){
                    unlink($_SERVER["DOCUMENT_ROOT"]."/backups/".$path);
                }
            }
            ?>
            <script type="text/javascript">
                location.href="";
            </script>
<?php


        }
    }

} 