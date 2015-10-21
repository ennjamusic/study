<?
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
// echo '<pre>'; print_r($arParams); echo '</pre>';
CModule::IncludeModule('iblock');
if ($this->StartResultCache(3600))
{
    $arResult = array();
    $arQuery = array();
    if(!empty($_SESSION["ADDED_ITEMS"])) {

        $arItemsId = array();
        foreach($_SESSION["ADDED_ITEMS"] as $tmp) {
            $arItemsId[] = $tmp["ID"];
        }

        $db_list = CIBlockElement::GetList(array(), array("ID"=>$$arItemsId),false,false,array("PROPERTY_PRICE"));
        while($ar_result = $db_list->GetNext())
        {
            $arResult["PRICE"] += $ar_result["PROPERTY_PRICE_VALUE"];
        }
    }
    if($arParams["BASKET_PATH"]!="")
        $arResult["PATH_TO_BASKET_PAGE"] = $arParams["BASKET_PATH"];
    if($arParams["ORDER_PATH"]!="")
        $arResult["PATH_TO_ORDER_PAGE"] = $arParams["ORDER_PATH"];
    $arResult["COUNT_ELEM"] = count($_SESSION["ADDED_ITEMS"]);
    $this->IncludeComponentTemplate();
}
?>
