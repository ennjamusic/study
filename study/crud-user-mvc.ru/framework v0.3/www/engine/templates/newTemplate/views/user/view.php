<div class="column1">
    <ul class="menu">
        <li><a href="<?=CApp::getLink(array("controller"=>"user","view"=>"create"))?>"><?=CApp::getTranslate("createUser")?></a></li>
        <li><a href="<?=CApp::getLink(array("controller"=>"user","view"=>"index"))?>"><?=CApp::getTranslate("allUsers")?></a></li>
        <li><a href="<?=CApp::getLink(array("controller"=>"translate","view"=>"index"))?>"><?=CApp::getTranslate("translate")?></a></li>
        <li><a href="<?=CApp::getLink(array("controller"=>"site","view"=>"settings"))?>"><?=CApp::getTranslate("settings")?></a></li>
    </ul>
</div>
<div class="column2">

<form method="post" action="">
    <table class="changeUser">
        <tr>
            <td><?=CApp::getTranslate("login")?></td>
            <td><input type="text" name="user[login]" value="<?=$arrResult["login"]?>"></td>
        </tr>
        <tr>
            <td><?=CApp::getTranslate("role")?></td>
            <td>
                <select name="user[role]">
                    <option value="1" <?=($arrResult["role"]==CApp::settings("USER_ROLES")->ADMIN)?"selected":""?>><?=CApp::getTranslate("admin")?></option>
                    <option value="0"  <?=($arrResult["role"]==CApp::settings("USER_ROLES")->GUEST)?"selected":""?>><?=CApp::getTranslate("user")?></option>
                </select>
            </td>
        </tr>
        <tr>
            <td><?=CApp::getTranslate("name")?></td>
            <td><input type="text" name="user[name]" value="<?=$arrResult["name"]?>"></td>
        </tr>
        <tr>
            <td><?=CApp::getTranslate("lastname")?></td>
            <td><input type="text" name="user[lastname]" value="<?=$arrResult["lastname"]?>"></td>
        </tr>
        <tr>
            <td><?=CApp::getTranslate("email")?></td>
            <td><input type="text" name="user[email]" value="<?=$arrResult["email"]?>"></td>
        </tr>
        <tr>
            <td><?=CApp::getTranslate("phone")?></td>
            <td><input type="text" name="user[phone]" value="<?=$arrResult["phone"]?>"></td>
        </tr>
        <tr>
            <td><?=CApp::getTranslate("date_register")?></td>
            <td><?=$arrResult["date_register"]?></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="save" value="<?=CApp::getTranslate("save")?>"></td>
        </tr>
    </table>
</form>
    </div>