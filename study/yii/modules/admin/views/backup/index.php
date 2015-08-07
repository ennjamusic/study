<?php
/* @var $this BackupController */

$this->breadcrumbs=array(
	'Backup',
);
?>
<div class="form">
    <?php echo CHtml::form('','post'); ?>
    <div>Включить в копию базу данных
    <?php echo CHtml::checkBox('BACKUP[db_backup]'); ?></div>
    <?php echo CHtml::hiddenField('BACKUP[doIt]','y'); ?>

    <?php echo CHtml::submitButton('Создать резервную копию'); ?>
    <?php echo CHtml::endform(); ?>
</div><!-- form -->
<br />
<br />
<br />
<p>
    Или восстановить:
</p>
<?php
    $dir = $_SERVER["DOCUMENT_ROOT"].'/backup';
    $dh = opendir($dir);
    echo CHtml::form('','post');
    while(($file = readdir($dh)) !== false) {
        if(pathinfo($file, PATHINFO_EXTENSION)=="zip"){
            ?>
            <div class="table"><?php echo CHtml::checkBox('EXTRACT['.$file.']'); ?><?=$file?> - <?=date('H:i:s d.m.Y ',preg_replace('/[A-Za-z-\.]/','',$file))?></div><hr />
        <?php
        }
    }
    echo CHtml::submitButton('Восстановить');
    echo CHtml::submitButton('Удалить');
    echo CHtml::endform();
?>
