<table class="loginForm">

    <form action="" method="POST">

        <tr>
            <td><?=CMain::getTranslate('login')?></td>
            <td><input name="registerForm[login]" type="text"/></td>
        </tr>
        <tr>
            <td><?=CMain::getTranslate('password')?></td>
            <td><input name="registerForm[password]" type="password"/></td>
        </tr>
        <tr>
            <td><?=CMain::getTranslate('name')?></td>
            <td><input name="registerForm[name]" type="text"/></td>
        </tr>
        <tr>
            <td><?=CMain::getTranslate('lastname')?></td>
            <td><input name="registerForm[lastname]" type="text"/></td>
        </tr>
        <tr>
            <td><?=CMain::getTranslate('phone')?></td>
            <td><input name="registerForm[phone]" type="text"/></td>
        </tr>
        <tr>
            <td><?=CMain::getTranslate('email')?></td>
            <td><input name="registerForm[email]" type="text"/></td>
        </tr>
        <tr><td></td>
        <td><input type="submit" value="<?=CMain::getTranslate('register')?>" /></td>
    </tr>
    </form>
    <tr>
        <td colspan="2"><a href="<?=CMain::getLink(array("controller"=>"site","view"=>"index"))?>"><?=CMain::getTranslate("enter")?></a></td>
    </tr>
</table>