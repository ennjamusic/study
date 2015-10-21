<?if(!empty($arResult))
{?>

    <div class="basket-element">
        <?foreach($arResult as $arItem) {?>
            <div class="basket-item">
                <div class="name-element"><a href="<??>"><?=$arItem["NAME"]?></a></div>
                <?if(!empty($arItem["PREVIEW_PICTURE"])) {?><div class="img"></div><?}?>
                <?if(!empty($arItem["PREVIEW_TEXT"])) {?><div class="text"><?=$arItem["PREVIEW_TEXT"]?></div><?}?>
                <span class="cost-element"></span>
                <span class="delete-element">
                    <form method="post">
                        <input type="hidden" name="action" value="delete"/>
                        <input type="hidden" name="id" value="<?=$arItem["ID"]?>"/>
                        <input type="submit" value="Удалить"/>
                    </form>
                </span>
            </div>
        <?}?>
    </div>

<?
}
?>