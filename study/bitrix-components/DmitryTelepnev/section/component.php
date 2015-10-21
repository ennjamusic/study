<?
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
// echo '<pre>'; print_r($arParams); echo '</pre>';
CModule::IncludeModule('iblock');
if ($this->StartResultCache(3600) && $arParams["IBLOCK_ID"]!="")
{
//    debug($_REQUEST["ELEMENT_CODE"]);
    $arResult = array();
    $arResult["ITEMS"] = array();
    $section_id = "";
    $iblock_id = $arParams['IBLOCK_ID'];
    $arFilter = array('IBLOCK_ID'=>$iblock_id);
    if($arParams["IBLOCK_SECTION_ID"]) {
        $arFilter = array('IBLOCK_ID'=>$iblock_id, "SECTION_ID" => $arParams["IBLOCK_SECTION_ID"]);
        $section_id = $arParams["IBLOCK_SECTION_ID"];
    }
    if($arParams["IBLOCK_SECTION_CODE"]) {
        $res = CIBlockSection::GetList(array(), array('IBLOCK_ID' => $iblock_id, 'CODE' => $arParams["IBLOCK_SECTION_CODE"]));
        $section = $res->Fetch();

        if($res->SelectedRowsCount() == 1) {
            $arFilter = array_merge(array('SECTION_ID'=>$section["ID"]),$arFilter);
            $section_id = $section["ID"];
        }

    }
    $tmpItems = array();
    $db_list1 = CIBlockElement::GetList(array(), $arFilter);

    while($ar_result1 = $db_list1->GetNext())
    {
        $arResult["ITEMS"][] = $ar_result1;

    }

    if($arParams["SHOW_SECTIONS"]=="Y") {
        $db_list = CIBlockSection::GetList(array(), $arFilter);
        while($ar_result = $db_list->GetNext())
        {
            $arResult["SECTIONS"][] = $ar_result;
        }
    }

    if($arParams["ADD_TO_BASKET"]=="Y") {
        $arResult["FORM_DATA"] = array();
        if($_SERVER["REQUEST_METHOD"]=="POST" && $_POST["guard"] == "yes") {

            $_SESSION["ADDED_ITEMS"][] = array("ID"=>$_POST["ITEM"],"IBLOCK_ID"=>$_POST["IBLOCK_ID"]);
        }
    }

    if(isset($arParams["PRICE_ELEM"]) && !empty($arParams["PRICE_ELEM"])) {

        foreach($arResult["ITEMS"] as $key=>$arItem) {
            $res = CIBlockElement::GetProperty($iblock_id, $arItem["ID"], "sort", "asc", array("ID" => $arParams["PRICE_ELEM"]));
            if ($ob = $res->GetNext())
            {
                $arResult["ITEMS"][$key]["PRICE"] = $ob['VALUE'];
            }
        }
    }

    if($arParams["ADD_CHAIN_ITEM"]=="Y") {
        $arResult["PATH"] = array();

        $nav = CIBlockSection::GetNavChain($iblock_id, $section_id);
        while($res = $nav->GetNext()) {
            $arResult["PATH"][] = $res;
        }

        foreach($arResult["PATH"] as $arItem) {
            $APPLICATION->AddChainItem($arItem["NAME"],$arItem["SECTION_PAGE_URL"]);
        }
    }
    $this->IncludeComponentTemplate();
} else {
    if($arParams['SET_404']=="Y") {
        CHTTP::SetStatus("404 Not Found");
    }
    echo "Неправильная настройка компонента!";
}
?>
