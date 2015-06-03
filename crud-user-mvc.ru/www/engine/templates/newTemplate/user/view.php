<div class="column1">
    <ul class="menu">
        <li><a href="<?=CMain::getLink(array("controller"=>"user","view"=>"create"))?>"><?=$langArray["createUser"]?></a></li>
        <li><a href="<?=CMain::getLink(array("controller"=>"user","view"=>"index"))?>"><?=$langArray["allUsers"]?></a></li>
    </ul>
</div>
<div class="column2">

<form method="post" action="">
    <table class="changeUser">
        <tr>
            <td><?=$langArray["login"]?></td>
            <td><input type="text" name="user[login]" value="<?=$arrResult["login"]?>"></td>
        </tr>
        <tr>
            <td><?=$langArray["role"]?></td>
            <td>
                <select name="user[role]">
                    <option value="1" <?=($arrResult["role"]==USER_ROLE_ADMIN)?"selected":""?>><?=$langArray["admin"]?></option>
                    <option value="0"  <?=($arrResult["role"]==USER_ROLE_GUEST)?"selected":""?>><?=$langArray["user"]?></option>
                </select>
            </td>
        </tr>
        <tr>
            <td><?=$langArray["name"]?></td>
            <td><input type="text" name="user[name]" value="<?=$arrResult["name"]?>"></td>
        </tr>
        <tr>
            <td><?=$langArray["lastname"]?></td>
            <td><input type="text" name="user[lastname]" value="<?=$arrResult["lastname"]?>"></td>
        </tr>
        <tr>
            <td><?=$langArray["email"]?></td>
            <td><input type="text" name="user[email]" value="<?=$arrResult["email"]?>"></td>
        </tr>
        <tr>
            <td><?=$langArray["phone"]?></td>
            <td><input type="text" name="user[phone]" value="<?=$arrResult["phone"]?>"></td>
        </tr>
        <tr>
            <td><?=$langArray["date_register"]?></td>
            <td><?=$arrResult["date_register"]?></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="save" value="<?=$langArray["save"]?>"></td>
        </tr>
    </table>
</form>
    </div>