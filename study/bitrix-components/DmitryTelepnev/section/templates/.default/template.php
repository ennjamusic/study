<?
//debug($arResult);
?>
<?if(!empty($arResult["SECTIONS"])) {?>
<div class="sections">
    <?foreach($arResult["SECTIONS"] as $arSections) {?>
    <div class="elem-item">
        <span class="name"><a href="<?=$arSections["SECTION_PAGE_URL"]?>"><?=$arSections["NAME"]?></a></span>
        <?if(!empty($arSections["PREVIEW_PICTURE"])) {?><div><img src=""></div><?}?>
        <?if(!empty($arSections["PREVIEW_TEXT"])) {?><div><?=$arSections["PREVIEW_TEXT"]?></div><?}?>
    </div>
    <?}?>
</div>
<?}?>

<?if(!empty($arResult["ITEMS"])) {?><div class="section-elements">
<?//debug($_SESSION["ADDED_ITEMS"]);?>
    <?foreach($arResult["ITEMS"] as $arItem) {?>
    <div class="elem-item">
        <?$file = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE'], array('width'=>150, 'height'=>150), BX_RESIZE_IMAGE_PROPORTIONAL, true);?>
        <span class="name"><a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a></span>
        <?if(!empty($arItem["PREVIEW_PICTURE"])) {?><div><img src="<?=$file["src"]?>"/></div><?}?>
        <?if(!empty($arItem["PREVIEW_TEXT"])) {?><div class="prev-text">
            <?=$arItem["PREVIEW_TEXT"]?>
        </div><?}?>
        <?if($arParams["ADD_TO_BASKET"]=="Y") {
            ?>
            <form method="post">
                <input type="hidden" name="guard" value="yes"/>
                <input type="hidden" name="ITEM" value="<?=$arItem["ID"]?>"/>
                <input type="hidden" name="IBLOCK_ID" value="<?=$arItem["IBLOCK_ID"]?>"/>
                <input type="submit" value="Добавить в корзину"/>
            </form>
            <?
        }?>
    </div>
    <?}?>
</div>
<?}?>