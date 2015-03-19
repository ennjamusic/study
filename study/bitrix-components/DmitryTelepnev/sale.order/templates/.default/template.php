<?if(!empty($arResult))
{?>

    <div class="basket-element">
        <form method="post">
            <input type="hidden" name="action" value="buy"/>
        <?foreach($arResult as $arItem) {?>
            <div class="basket-item">
                <div class="name-element"><a href="<??>"><?=$arItem["NAME"]?></a></div>
                <?if(!empty($arItem["PREVIEW_PICTURE"])) {?><div class="img"></div><?}?>
                <?if(!empty($arItem["PREVIEW_TEXT"])) {?><div class="text"><?=$arItem["PREVIEW_TEXT"]?></div><?}?>
                <span class="cost-element"></span>
            </div>
        <?}?>
            <p>Ваше имя*: <input type="text" name="name"/></p>
            <p>Ваш телефон*: <input type="text" name="phone" /></p>
            <p>Ваш email*: <input type="text"  name="email"/></p>
            <p>Ваш Адрес*: <input type="text"  name="address"/></p>
            <input type="submit" value="Купить"/>
            </form>
    </div>

<?
}
?>