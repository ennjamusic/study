<div class="column1">
    <ul class="menu">
        <li><a href="<?=CMain::getLink(array("controller"=>"user","view"=>"create"))?>"><?=CMain::getTranslate("createUser")?></a></li>
        <li><a href="<?=CMain::getLink(array("controller"=>"user","view"=>"index"))?>"><?=CMain::getTranslate("allUsers")?></a></li>
        <li><a href="<?=CMain::getLink(array("controller"=>"translate","view"=>"index"))?>"><?=CMain::getTranslate("translate")?></a></li>
        <li><a href="<?=CMain::getLink(array("controller"=>"site","view"=>"settings"))?>"><?=CMain::getTranslate("settings")?></a></li>
    </ul>
</div>
<div class="column2">
<table class="changeUser">
    <thead>
    <td><?=CMain::getTranslate("settingName")?></td>
    <td><?=CMain::getTranslate("settingValue")?></td>
    </thead>
    <form method="post">
        <?php
        foreach($arrResult as $key=>$value) {
            ?><tr>
            <td><?=$key?></td>
            <td><input size="50" type="text" name="SETTINGS[<?=$key?>]" value="<?=$value?>" /></td>
            </tr><?php
        }
        ?>
        <tr>
            <td></td>
            <td><input type="submit" name="save" value="<?=CMain::getTranslate("save")?>"></td>
        </tr>
    </form>
</table></div>