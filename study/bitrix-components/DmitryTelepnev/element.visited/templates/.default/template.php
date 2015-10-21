<?if(!empty($arResult))
{?>

    <div class="basket-element">
        <?foreach($arResult as $arItem) {?>
            <div class="basket-item">
                <?$file = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE'], array('width'=>150, 'height'=>150), BX_RESIZE_IMAGE_PROPORTIONAL, true);?>
                <div class="name-element"><a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a></div>
                <?if(!empty($arItem["PREVIEW_PICTURE"])) {?><div class="img"><img src="<?=$file["src"]?>"/></div><?}?>
                <?if(!empty($arItem["PREVIEW_TEXT"])) {?><div class="text"><?=$arItem["PREVIEW_TEXT"]?></div><?}?>
                <span class="cost-element"></span>
            </div>
        <?}?>
    </div>

<?
}
?>