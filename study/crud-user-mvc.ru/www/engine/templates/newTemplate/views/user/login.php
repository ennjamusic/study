<table class="loginForm">

    <form action="" method="POST">

        <tr>
            <td><?=CApp::getTranslate('login')?></td>
            <td><input name="loginForm[login]" type="text"/></td>
        </tr>
        <tr>
            <td><?=CApp::getTranslate('password')?></td>
            <td><input name="loginForm[password]" type="password"/></td>
        </tr>
        <tr><td></td>
        <td><input type="submit" value="<?=CApp::getTranslate('enter')?>" /></td>
    </tr>
    </form>
    <tr>
        <td colspan="2"><a href="<?=CApp::getLink(array("controller"=>"site","view"=>"register"))?>"><?=CApp::getTranslate("userRegister")?></a></td>
    </tr>
</table>