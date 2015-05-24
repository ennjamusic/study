<div class="column1">
    <ul class="menu">
        <li><a href="<?=CApp::getLink(array("controller"=>"site","view"=>"index"))?>"><?=CApp::getTranslate("createUser")?></a></li>
        <li><a href="<?=CApp::getLink(array("controller"=>"site","view"=>"about"))?>"><?=CApp::getTranslate("allUsers")?></a></li>
        <li><a href="<?=CApp::getLink(array("controller"=>"site","view"=>"register"))?>"><?=CApp::getTranslate("translate")?></a></li>
    </ul>
</div>
<div class="column2">
        <form method="post" name="BACKUP[form]">
            <input type="hidden" name="BACKUP[doIt]" value="y" /><br />
            <input type="submit" name="BACKUP[save]" value="Save" /><br />

        </form>

        <form method="post" name="EXTRACT[form]">
            <?php
            $dir = $_SERVER["DOCUMENT_ROOT"].'/backups';
            $dh = opendir($dir);
            while(($file = readdir($dh)) !== false) {
                if(pathinfo($file, PATHINFO_EXTENSION)=="zip"){
                    ?>
            <input type="checkbox" name='EXTRACT[<?=$file?>]' /><?=$file?> - <?=date('H:i:s d.m.Y ',preg_replace('/[A-Za-z-\.]/','',$file))?> <hr />
                <?php
                }
            }
            ?>
        <input type="submit" name="EXTRACT[extract]" value="Extract" /><br />
        </form>
</div>