<div class="column1">
    <ul class="menu">
        <li><a href="<?=CApp::getLink(array("controller"=>"user","view"=>"create"))?>"><?=CApp::getTranslate("createUser")?></a></li>
        <li><a href="<?=CApp::getLink(array("controller"=>"user","view"=>"index"))?>"><?=CApp::getTranslate("allUsers")?></a></li>
        <li><a href="<?=CApp::getLink(array("controller"=>"translate","view"=>"index"))?>"><?=CApp::getTranslate("translate")?></a></li>
        <li><a href="<?=CApp::getLink(array("controller"=>"site","view"=>"settings"))?>"><?=CApp::getTranslate("settings")?></a></li>
    </ul>
</div>
<div class="column2">

    <table class="userList" border>
        <tr class="table-head">
            <td><?=CApp::getTranslate("id")?></td>
            <td><?=CApp::getTranslate("login")?></td>
            <td><?=CApp::getTranslate("role")?></td>
            <td><?=CApp::getTranslate("name")?></td>
            <td><?=CApp::getTranslate("lastname")?></td>
            <td><?=CApp::getTranslate("date_register")?></td>
            <td><?=CApp::getTranslate("phone")?></td>
            <td><?=CApp::getTranslate("email")?></td>
            <td><?=CApp::getTranslate("delete")?></td>
        </tr>
        <?php
        foreach($arrResult as $arItem) {
            $linkView = CApp::getLink(array("controller"=>"user",
                "view"=>"view",
                "id"=>$arItem["id"]));
            $linkDelete = CApp::getLink(array("controller"=>"user",
                "view"=>"delete",
                "id"=>$arItem["id"]));
            ?>
            <tr>
                <td><?=$arItem["id"]?></td>
                <td><a href="<?=$linkView?>"><?=$arItem["login"]?></a></td>
                <td><a href="<?=$linkView?>"><?=($arItem["role"]==CApp::settings("USER_ROLES")->ADMIN)?"admin":"guest"?></a></td>
                <td><a href="<?=$linkView?>"><?=$arItem["name"]?></a></td>
                <td><a href="<?=$linkView?>"><?=$arItem["lastname"]?></a></td>
                <td><a href="<?=$linkView?>"><?=$arItem["date_register"]?></a></td>
                <td><a href="<?=$linkView?>"><?=$arItem["phone"]?></a></td>
                <td><a href="<?=$linkView?>"><?=$arItem["email"]?></a></td>
                <td><a href="<?=$linkDelete?>"><img src="<?=CApp::settings("APPLICATION")->template_path."img"?>/del.gif" /></a></td>
            </tr>
        <?php
        }
        ?>
    </table>
</div>