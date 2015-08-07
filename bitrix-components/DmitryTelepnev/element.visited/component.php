<?
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
// echo '<pre>'; print_r($arParams); echo '</pre>';
CModule::IncludeModule('iblock');
if ($this->StartResultCache(3600))
{
    $arResult = array();
    $tmp = array();
    if(!empty($_SESSION["VISITED"])) {
        for($i=0;$i<count($_SESSION["VISITED"]);$i++) {
            if(!in_array($_SESSION["VISITED"][$i]["ID"],$tmp)) {
                $tmp[] = $_SESSION["VISITED"][$i]["ID"];
                $newResult[] = $_SESSION["VISITED"][$i];
            }
        }

        $arItemsId = array();
        foreach($newResult as $arItems) {
            $arItemsId[] = $arItems["ID"];
        }

        $db_list = CIBlockElement::GetList(array(), array("ID"=>$arItemsId,"IBLOCK_ID"=>$arItems["IBLOCK_ID"]));
        while($ar_result = $db_list->GetNext())
        {
            $arResult[] = $ar_result;
        }

    }
    $this->IncludeComponentTemplate();
}
?>
