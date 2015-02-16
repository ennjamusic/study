<table class="loginForm">

    <form action="" method="POST">

        <tr>
            <td><?=CMain::getTranslate('login')?></td>
            <td><input name="loginForm[login]" type="text"/></td>
        </tr>
        <tr>
            <td><?=CMain::getTranslate('password')?></td>
            <td><input name="loginForm[password]" type="password"/></td>
        </tr>
        <tr><td></td>
        <td><input type="submit" value="<?=CMain::getTranslate('enter')?>" /></td>
    </tr>
    </form>
    <tr>
        <td colspan="2"><a href="<?=CMain::getLink(array("controller"=>"site","view"=>"register"))?>"><?=CMain::getTranslate("userRegister")?></a></td>
    </tr>
</table>