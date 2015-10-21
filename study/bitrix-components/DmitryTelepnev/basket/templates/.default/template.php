<?if(!empty($arResult))
{?>

    <div class="basket-element">
    <form method="post">
        <?foreach($arResult as $arItem) {?>
            <div class="basket-item">
                <div class="name-element"><a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a></div>
                <?$file = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE'], array('width'=>150, 'height'=>150), BX_RESIZE_IMAGE_PROPORTIONAL, true);?>
                <?if(!empty($arItem["PREVIEW_PICTURE"])) {?><div class="img"><img src="<?=$file["src"]?>"/></div><?}?>
                <?if(!empty($arItem["PREVIEW_TEXT"])) {?><div class="text"><?=$arItem["PREVIEW_TEXT"]?></div><?}?>
                <span class="cost-element"></span>
                <span class="delete-element">
                        <a href="?id=<?=$arItem["ID"]?>&action=delete">Удалить</a>
                </span>
            </div>
        <?}?>
        <a href="?action=refresh">Пересчитать</a>
        <input type="submit" value="Заказать"/>
    </form>
    </div>

<?
}
?>