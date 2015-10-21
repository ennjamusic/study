<div class="column1">
    <ul class="menu">
        <li><a href="<?=CMain::getLink(array("controller"=>"user","view"=>"create"))?>"><?=$langArray["createUser"]?></a></li>
        <li><a href="<?=CMain::getLink(array("controller"=>"user","view"=>"index"))?>"><?=$langArray["allUsers"]?></a></li>
    </ul>
</div>
<div class="column2">

<table class="userList" border>
    <tr class="table-head">
        <td><a href="?sort=id&param=asc">ID asc</a>/<br /><a href="?sort=id&param=desc">ID desc</a></td>
        <td><a href="?sort=login&param=asc">LOGIN asc</a>/<br /><a href="?sort=login&param=desc">LOGIN desc</a></td>
        <td><a href="?sort=role&param=asc">ROLE asc</a>/<br /><a href="?sort=role&param=desc">ROLE desc</a></td>
        <td><a href="?sort=firstName&param=asc">NAME asc</a>/<br /><a href="?sort=firstName&param=desc">NAME desc</a></td>
        <td><a href="?sort=lastName&param=asc">SURNAME asc</a>/<br /><a href="?sort=lastName&param=desc">SURNAME desc</a></td>
        <td><a href="?sort=birthday&param=asc">DATE asc</a>/<br /><a href="?sort=birthday&param=desc">DATE desc</a></td>
        <td>PHONE</td>
        <td>EMAIL</td>
        <td>DELETE</td>
    </tr>
    <?php
    foreach($arrResult as $arItem) {
        $link = CMain::getLink(array("controller"=>"user",
                                    "view"=>"view",
                                    "id"=>$arItem["id"]));
        ?>
        <tr>
            <td><?=$arItem["id"]?></td>
            <td><a href="<?=$link?>"><?=$arItem["login"]?></a></td>
            <td><a href="<?=$link?>"><?=($arItem["role"]==USER_ROLE_ADMIN)?"admin":"guest"?></a></td>
            <td><a href="<?=$link?>"><?=$arItem["name"]?></a></td>
            <td><a href="<?=$link?>"><?=$arItem["lastname"]?></a></td>
            <td><a href="<?=$link?>"><?=$arItem["date_register"]?></a></td>
            <td><a href="<?=$link?>"><?=$arItem["phone"]?></a></td>
            <td><a href="<?=$link?>"><?=$arItem["email"]?></a></td>
            <td><a href="?id=<?=$arItem["id"]?>&action=delete"><img src="<?=TEMPLATE_PATH."img"?>/del.gif" /></a></td>
        </tr>
    <?
    }
    ?>
</table>
<ul class="pagin">
    <?for($i=1;$i<=$allPages;$i++) {?>
        <li><a href="?page=<?=$i?><?=(isset($_GET["sort"])&&isset($_GET["param"]))?"&sort=".$_GET["sort"]."&param=".$_GET["param"]:""?>">|<?=$i?>|</li>
    <?}?>
</ul>
    </div>