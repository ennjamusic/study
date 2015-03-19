<?php

class BackupController extends Controller
{
	public function actionIndex()
	{
        ini_set('max_execution_time','300');
		$this->render('index');
        //var_dump($_POST);
        if($_POST['BACKUP'] && $_POST['BACKUP']['doIt']=='y'){
            $_POST["BACKUP"]['STEP']=1;
        } elseif($_POST['EXTRACT']) {
            $_POST["EXTRACT"] = array_keys($_POST["EXTRACT"]);
        }
        if($_POST['BACKUP']["STEP"]==1) {
            if($_POST['BACKUP']['db_backup']) {
                $tables = array();
                $link = mysql_connect('localhost','steptoweb','general');
                mysql_select_db('steptoweb',$link);
                $result = mysql_query('SHOW TABLES');
                while($row = mysql_fetch_row($result))
                {
                    $tables[] = $row[0];
                }
                foreach($tables as $table)
                {
                    $result = mysql_query("SELECT * FROM ".$table);
                    $num_fields = mysql_num_fields($result);
                    $return.= 'DROP TABLE '.$table.';';
                    $row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
                    $return.= "\n\n".$row2[1].";\n\n";

                    for ($i = 0; $i < $num_fields; $i++)
                    {
                        while($row = mysql_fetch_row($result))
                        {
                            $return.= 'INSERT INTO '.$table.' VALUES(';
                            for($j=0; $j<$num_fields; $j++)
                            {
                                $row[$j] = addslashes($row[$j]);
                                $row[$j] = str_replace("\n","\\n",$row[$j]);
                                if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
                                if ($j<($num_fields-1)) { $return.= ','; }
                            }
                            $return.= ");\n";
                        }
                    }
                    $return.="\n\n\n";
                }

                // пишем результат в файл
                $file=$_SERVER["DOCUMENT_ROOT"].'/db-backup.sql';
                /**
                 * ToDo: Здесь нужно сделать перекодировку sql-файлика в утф-8!!!!!!!! а ниже нужно этот файлик вновь загонять в базу.
                 */
                $return = iconv ("CP1251", "UTF-8", $return);

                file_put_contents($file,$return);
            }
            $_POST['BACKUP']["STEP"]=2;
        }
        if($_POST['BACKUP']["STEP"]==2) {
            global $zip;
            $zip = new ZipArchive;
//снова используем метод open(), но теперь используем ключ ZipArchive::CREATE
//который говорит, что архив нужно создать
//а первым параметром передаем название архива]
            $res = $zip->open($_SERVER["DOCUMENT_ROOT"].'/backup/backup-'.time().'.zip', ZipArchive::CREATE);
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
                            } elseif(is_file($full) && !strstr($dir,$_SERVER["DOCUMENT_ROOT"]."/framework")) {
                                //тут все просто: говорим, какой файл добавить в архив
                                $zip->addFile(str_replace("P:/home/yii.ru/www/","",$full));
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
                    location.href="";
                </script>
            <?php
            } else {
                echo 'Ошибка №'.$res;
            }
        }

        if(!empty($_POST['EXTRACT']) && preg_match('/backup-[0-9]*\.zip/',$_POST['EXTRACT'][0]) && $_POST['yt1']) {
            $zip = new ZipArchive;
            $res = $zip->open($_SERVER["DOCUMENT_ROOT"]."/".$_POST['EXTRACT'][1]);
            //echo 1;
            if ($res === TRUE) {
                $zip->extractTo($_SERVER["DOCUMENT_ROOT"]);
                $zip->close();
            }
//            echo file_exists($_SERVER["DOCUMENT_ROOT"].'/db-backup.sql');
            if(file_exists($_SERVER["DOCUMENT_ROOT"].'/db-backup.sql')) {
                $sql = file_get_contents($_SERVER["DOCUMENT_ROOT"].'/db-backup.sql');
                $link = mysql_connect('localhost','steptoweb','general');
                mysql_select_db('steptoweb',$link);
                $result = mysql_query($sql);
                mysql_error();
                die($result==false);
//                echo ;
            }
            echo "<script>alert('Восстановление прошло успешно');</script>";
        } elseif(!empty($_POST['EXTRACT']) && $_POST['yt2']) {
            foreach($_POST['EXTRACT'] as $path) {
                if(preg_match('/backup-[0-9]*\.zip/',$path)){
                    unlink($_SERVER["DOCUMENT_ROOT"]."/backup/".$path);
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