<?
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
// echo '<pre>'; print_r($arParams); echo '</pre>';
CModule::IncludeModule('iblock');
if ($this->StartResultCache(3600) && $arParams["IBLOCK_ID"]!="" && ($arParams["IBLOCK_SECTION_CODE"]!="" || $arParams["IBLOCK_SECTION_ID"]!=""))
{
    $arResult = array();
    $section_id = "";
    $iblock_id = $arParams['IBLOCK_ID'];
    $arFilter = array('IBLOCK_ID'=>$iblock_id);
    if($arParams["IBLOCK_SECTION_ID"]!="") {
        $arFilter = array('IBLOCK_ID'=>$iblock_id, "SECTION_ID" => $arParams["IBLOCK_SECTION_ID"]);
        $section_id = $arParams["IBLOCK_SECTION_ID"];
    }
    if($arParams["IBLOCK_SECTION_CODE"]!="") {
        $res = CIBlockSection::GetList(array(), array('IBLOCK_ID' => $iblock_id, 'CODE' => $arParams["IBLOCK_SECTION_CODE"]));
        $section = $res->Fetch();
        if($res->SelectedRowsCount() == 1) {
            $arFilter = array_merge(array('SECTION_ID'=>$section["ID"]),$arFilter);
            $section_id = $section["ID"];
//            debug($section_id);
        }
    }
    //debug($section_id);
    if($arParams["IBLOCK_ELEMENT_ID"]) {
        $arFilter = array_merge(array('ID'=>$arParams["IBLOCK_ELEMENT_ID"]),$arFilter);
    }
    if($arParams["IBLOCK_ELEMENT_CODE"]) {
        $arFilter = array_merge(array('CODE'=>$arParams["IBLOCK_ELEMENT_CODE"]),$arFilter);
    }
    $db_list = CIBlockElement::GetList(array(), $arFilter);
    if($ar_result = $db_list->GetNext())
    {
        $arResult = $ar_result;
    }
    if(empty($arResult) && $arParams['SET_404']=="Y") {
        CHTTP::SetStatus("404 Not Found");
    }
    if($arParams["ADD_TO_BASKET"]=="Y") {
        $arResult["FORM_DATA"] = array();
        if($_SERVER["REQUEST_METHOD"]=="POST" && $_POST["guard"] == "yes") {
            //debug($_POST);
            $_SESSION["ADDED_ITEMS"][] = array("ID"=>$_POST["ITEM"],"IBLOCK_ID"=>$_POST["IBLOCK_ID"]);
        }
    }
    if($arParams["ADD_TO_VISITED"]=="Y") {
        $_SESSION["VISITED"][] = array("ID"=>$arResult["ID"], "IBLOCK_ID"=>$arResult["IBLOCK_ID"]);
        //debug($_SESSION["VISITED"]);
    }
    if(isset($arParams["PRICE_ELEM"]) && !empty($arParams["PRICE_ELEM"])) {
//        debug($arParams["PRICE_ELEM"]);
            $res = CIBlockElement::GetProperty($iblock_id, $arResult["ID"], "sort", "asc", array("ID" => $arParams["PRICE_ELEM"]));
            if ($ob = $res->GetNext())
            {
                $arResult["PRICE"] = $ob['VALUE'];
            }
    }
//    debug($_SESSION["ADDED_ITEMS"]);
    if($arParams["ADD_CHAIN_ITEM"]=="Y") {
        $arResult["PATH"] = array();
//        debug($iblock_id);
//        debug($section_id);
        $nav = CIBlockSection::GetNavChain($iblock_id, $section_id);
        while($res = $nav->GetNext()) {
            $arResult["PATH"][] = $res;
        }
//        debug($arResult["PATH"]);
        foreach($arResult["PATH"] as $arItem) {
            $APPLICATION->AddChainItem($arItem["NAME"],$arItem["SECTION_PAGE_URL"]);
        }
        $APPLICATION->AddChainItem($arResult["NAME"],$arResult["DETAIL_PAGE_URL"]);
    }
    $this->IncludeComponentTemplate();
} else {
    if($arParams['SET_404']=="Y") {
        CHTTP::SetStatus("404 Not Found");
    }
    echo "Неправильная настройка компонента!";
}
?>
