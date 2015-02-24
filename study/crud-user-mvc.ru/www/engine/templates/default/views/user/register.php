<table class="loginForm">

    <form action="" method="POST">

        <tr>
            <td><?=CApp::getTranslate('login')?></td>
            <td><input name="registerForm[login]" type="text"/></td>
        </tr>
        <tr>
            <td><?=CApp::getTranslate('password')?></td>
            <td><input name="registerForm[password]" type="password"/></td>
        </tr>
        <tr>
            <td><?=CApp::getTranslate('name')?></td>
            <td><input name="registerForm[name]" type="text"/></td>
        </tr>
        <tr>
            <td><?=CApp::getTranslate('lastname')?></td>
            <td><input name="registerForm[lastname]" type="text"/></td>
        </tr>
        <tr>
            <td><?=CApp::getTranslate('phone')?></td>
            <td><input name="registerForm[phone]" type="text"/></td>
        </tr>
        <tr>
            <td><?=CApp::getTranslate('email')?></td>
            <td><input name="registerForm[email]" type="text"/></td>
        </tr>
        <tr><td></td>
        <td><input type="submit" value="<?=CApp::getTranslate('register')?>" /></td>
    </tr>
    </form>
    <tr>
        <td colspan="2"><a href="<?=CApp::getLink(array("controller"=>"site","view"=>"index"))?>"><?=CApp::getTranslate("enter")?></a></td>
    </tr>
</table>