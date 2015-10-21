<?if(!empty($arResult))
{?>

    <div class="basket-link">
        <div class="cnt"><?=$arResult["COUNT_ELEM"]?></div>
        <div class="price"><?=$arResult["PRICE"]?></div>
        <?
//        debug($arResult);
        if(isset($arResult["PATH_TO_BASKET_PAGE"]) && $arResult["PATH_TO_BASKET_PAGE"]!="") {?>
            <a href="<?=$arResult["PATH_TO_BASKET_PAGE"]?>">Перейти в корзину</a>
        <?}?>
        <?//debug(isset($arResult["PATH_TO_ORDER_PAGE"]));?>
        <?if(isset($arResult["PATH_TO_ORDER_PAGE"]) && $arResult["PATH_TO_ORDER_PAGE"]!="") {?>
            <a href="<?=$arResult["PATH_TO_ORDER_PAGE"]?>">Перейти к оформлению</a>
        <?}?>
    </div>

<?
}
?>