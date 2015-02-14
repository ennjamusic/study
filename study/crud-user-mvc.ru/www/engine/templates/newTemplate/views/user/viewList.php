<div class="column1">
    <ul class="menu">
        <li><a href="<?=CMain::getLink(array("controller"=>"user","view"=>"create"))?>"><?=CMain::getTranslate("createUser")?></a></li>
        <li><a href="<?=CMain::getLink(array("controller"=>"user","view"=>"index"))?>"><?=CMain::getTranslate("allUsers")?></a></li>
        <li><a href="<?=CMain::getLink(array("controller"=>"translate","view"=>"index"))?>"><?=CMain::getTranslate("translate")?></a></li>
        <li><a href="<?=CMain::getLink(array("controller"=>"site","view"=>"settings"))?>"><?=CMain::getTranslate("settings")?></a></li>
    </ul>
</div>
<div class="column2">

<table class="userList" border>
    <tr class="table-head">
        <td><?=CMain::getTranslate("id")?></td>
        <td><?=CMain::getTranslate("login")?></td>
        <td><?=CMain::getTranslate("role")?></td>
        <td><?=CMain::getTranslate("name")?></td>
        <td><?=CMain::getTranslate("lastname")?></td>
        <td><?=CMain::getTranslate("date_register")?></td>
        <td><?=CMain::getTranslate("phone")?></td>
        <td><?=CMain::getTranslate("email")?></td>
        <td><?=CMain::getTranslate("delete")?></td>
    </tr>
    <?php
    foreach($arrResult as $arItem) {
        $linkView = CMain::getLink(array("controller"=>"user",
                                    "view"=>"view",
                                    "id"=>$arItem["id"]));
        $linkDelete = CMain::getLink(array("controller"=>"user",
            "view"=>"delete",
            "id"=>$arItem["id"]));
        ?>
        <tr>
            <td><?=$arItem["id"]?></td>
            <td><a href="<?=$linkView?>"><?=$arItem["login"]?></a></td>
            <td><a href="<?=$linkView?>"><?=($arItem["role"]==USER_ROLE_ADMIN)?"admin":"guest"?></a></td>
            <td><a href="<?=$linkView?>"><?=$arItem["name"]?></a></td>
            <td><a href="<?=$linkView?>"><?=$arItem["lastname"]?></a></td>
            <td><a href="<?=$linkView?>"><?=$arItem["date_register"]?></a></td>
            <td><a href="<?=$linkView?>"><?=$arItem["phone"]?></a></td>
            <td><a href="<?=$linkView?>"><?=$arItem["email"]?></a></td>
            <td><a href="<?=$linkDelete?>"><img src="<?=TEMPLATE_PATH."img"?>/del.gif" /></a></td>
        </tr>
    <?
    }
    ?>
</table>
    </div>