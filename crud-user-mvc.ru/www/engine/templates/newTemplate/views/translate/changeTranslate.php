<div class="column1">
    <ul class="menu">
        <li><a href="<?=CApp::getLink(array("controller"=>"user","view"=>"create"))?>"><?=CApp::getTranslate("createUser")?></a></li>
        <li><a href="<?=CApp::getLink(array("controller"=>"user","view"=>"index"))?>"><?=CApp::getTranslate("allUsers")?></a></li>
        <li><a href="<?=CApp::getLink(array("controller"=>"translate","view"=>"index"))?>"><?=CApp::getTranslate("translate")?></a></li>
        <li><a href="<?=CApp::getLink(array("controller"=>"site","view"=>"settings"))?>"><?=CApp::getTranslate("settings")?></a></li>
    </ul>
</div>
<div class="column2">
<table class="changeUser">
    <thead>
    <td><?=CApp::getTranslate("id")?></td>
    <td><?=CApp::getTranslate("value")?></td>
    </thead>
<form method="post">
    <?php
        foreach($arrResult as $key=>$value) {
            ?><tr>
                <td><input size="20" type="text" name="TRANSLATE[<?=$key?>][]" value="<?=$key?>" /></td>
                <td><input size="50" type="text" name="TRANSLATE[<?=$key?>][]" value="<?=$value?>" /></td>
            </tr><?php
        }
    ?>
    <tr>
        <td><input size="20" type="text" name="TRANSLATE[newVal][]" value="" /></td>
        <td><input size="50" type="text" name="TRANSLATE[newVal][]" value="" /></td>
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" name="save" value="<?=CApp::getTranslate("save")?>"></td>
    </tr>
</form>
</table>
    </div>