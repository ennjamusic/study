<?
//debug($arResult);
?>
<div class="section-elements">
    <div class="elem-item">
        <span class="name"><?=$arResult["NAME"]?></span>
        <?$file = CFile::ResizeImageGet($arResult['PREVIEW_PICTURE'], array('width'=>150, 'height'=>150), BX_RESIZE_IMAGE_PROPORTIONAL, true);?>
        <?if(!empty($arResult["PREVIEW_PICTURE"])) {?><div><img src="<?=$file["src"]?>"/></div><?}?>
        <?if(!empty($arResult["PREVIEW_PICTURE"])) {?><div class="prev-text">
            <?=$arResult["PREVIEW_TEXT"]?>
        </div><?}?>
        <?if($arParams["ADD_TO_BASKET"]=="Y") {
            ?>
            <form method="post">
                <input type="hidden" name="guard" value="yes"/>
                <input type="hidden" name="ITEM" value="<?=$arResult["ID"]?>"/>
                <input type="hidden" name="IBLOCK_ID" value="<?=$arResult["IBLOCK_ID"]?>"/>
                <input type="submit" value="Добавить в корзину"/>
            </form>
            <?
        }?>
    </div>
</div>