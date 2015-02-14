<div class="column1">
    <ul class="menu">
        <li><a href="<?=CMain::getLink(array("controller"=>"user","view"=>"create"))?>"><?=CMain::getTranslate("createUser")?></a></li>
        <li><a href="<?=CMain::getLink(array("controller"=>"user","view"=>"index"))?>"><?=CMain::getTranslate("allUsers")?></a></li>
        <li><a href="<?=CMain::getLink(array("controller"=>"translate","view"=>"index"))?>"><?=CMain::getTranslate("translate")?></a></li>
        <li><a href="<?=CMain::getLink(array("controller"=>"site","view"=>"settings"))?>"><?=CMain::getTranslate("settings")?></a></li>
    </ul>
</div>
<div class="column2">
<form method="post" action="">
    <table class="changeUser">
        <tr>
            <td><?=CMain::getTranslate("login")?></td>
            <td><input type="text" name="user[login]" value="<?=$arrResult["login"]?>"></td>
        </tr>
        <tr>
            <td><?=CMain::getTranslate("password")?></td>
            <td><input type="text" name="user[password]" value="<?=$arrResult["password"]?>"></td>
        </tr>
        <tr>
            <td><?=CMain::getTranslate("role")?></td>
            <td>
                <select name="user[role]">
                    <option value="1" <?=($arrResult["role"]==USER_ROLE_ADMIN)?"selected":""?>><?=CMain::getTranslate("admin")?></option>
                    <option value="0"  <?=($arrResult["role"]==USER_ROLE_GUEST)?"selected":""?>><?=CMain::getTranslate("user")?></option>
                </select>
            </td>
        </tr>
        <tr>
            <td><?=CMain::getTranslate("name")?></td>
            <td><input type="text" name="user[name]" value="<?=$arrResult["name"]?>"></td>
        </tr>
        <tr>
            <td><?=CMain::getTranslate("lastname")?></td>
            <td><input type="text" name="user[lastname]" value="<?=$arrResult["lastname"]?>"></td>
        </tr>
        <tr>
            <td><?=CMain::getTranslate("email")?></td>
            <td><input type="text" name="user[email]" value="<?=$arrResult["email"]?>"></td>
        </tr>
        <tr>
            <td><?=CMain::getTranslate("phone")?></td>
            <td><input type="text" name="user[phone]" value="<?=$arrResult["phone"]?>"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="save" value="<?=CMain::getTranslate("save")?>"></td>
        </tr>
    </table>
</form>
</div>