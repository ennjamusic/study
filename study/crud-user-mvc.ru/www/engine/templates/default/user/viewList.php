<div class="column1">
    <ul class="menu">
        <li><a href="<?=CMain::getLink(array("controller"=>"user","view"=>"create"))?>"><?=$langArray["createUser"]?></a></li>
        <li><a href="<?=CMain::getLink(array("controller"=>"user","view"=>"index"))?>"><?=$langArray["allUsers"]?></a></li>
    </ul>
</div>
<div class="column2">

<table class="userList" border>
    <tr class="table-head">
        <td><?=$langArray["id"]?></td>
        <td><?=$langArray["login"]?></td>
        <td><?=$langArray["role"]?></td>
        <td><?=$langArray["name"]?></td>
        <td><?=$langArray["lastname"]?></td>
        <td><?=$langArray["date_register"]?></td>
        <td><?=$langArray["phone"]?></td>
        <td><?=$langArray["email"]?></td>
        <td><?=$langArray["delete"]?></td>
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