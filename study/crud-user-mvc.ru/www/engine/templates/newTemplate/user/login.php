<table class="loginForm">
    <?php
    global $errMessages;
        if(count($errMessages)!=0) {
            ?>
            <tr class="errMessages"><td colspan="2">
            <?php
            foreach($errMessages as $value) {
                echo $value."<br />";
            }
            ?>
            </td></tr>
            <?php
        }
    ?>
    <form action="" method="POST">

        <tr>
            <td><?=$langArray['login']?></td>
            <td><input name="loginForm[login]" type="text"/></td>
        </tr>
        <tr>
            <td><?=$langArray['password']?></td>
            <td><input name="loginForm[password]" type="password"/></td>
        </tr>
        <td></td>
        <td><input type="submit" value="<?=$langArray['enter']?>" /></td>

    </form>
</table>