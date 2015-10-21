<?
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
CModule::IncludeModule('iblock');
if ($this->StartResultCache(3600) && $arParams['IBLOCK_ID']!="")
{
    $iblock_id = $arParams['IBLOCK_ID'];
    $section_id = "";
    $arFilter = array('IBLOCK_ID'=>$iblock_id);
    $arOrder = array();
    if($arParams["SUBSECTIONS"]=="Y") {
        $arOrder = array("left_margin"=>"asc");
    } else {
        $arFilter = array_merge(array('DEPTH_LEVEL'=>1),$arFilter);
    }
    if($arParams["SECTION_ID"]!="") {
        $arFilter = array_merge(array('SECTION_ID'=>$arParams["SECTION_ID"]),$arFilter);
        $section_id = $arParams["SECTION_ID"];
    }
    if($arParams["SECTION_CODE"]!="") {
        $res = CIBlockSection::GetList(array(), array('IBLOCK_ID' => $iblock_id, 'CODE' => $arParams["SECTION_CODE"]));
        $section = $res->Fetch();
        if($res->SelectedRowsCount() == 1) {
            $arFilter = array_merge(array('SECTION_ID'=>$section["ID"]),$arFilter);
            $section_id = $section["ID"];
        }
    }
    $arResult = array();
    $arRes = array();
    $db_list = CIBlockSection::GetList($arOrder, $arFilter, true);
    while($ar_result = $db_list->GetNext())
    {
        $arRes[] = $ar_result;
    }

    if($arParams["SHOW_SECTION_ELEMENT"]=="Y" && $arParams["COUNT_SECTION_ELEMENT"]>0) {
        $arSectId = array();
        $arItems = array();
        foreach($arRes as $tmp) {
            $arSectId[] = $tmp["ID"];
        }
        $arFilter = Array("IBLOCK_ID"=>$iblock_id, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
        $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>$arParams["COUNT_SECTION_ELEMENT"]));
        while($ob = $res->GetNext())
        {
            $arItems[] = $ob;
        }
        foreach($arRes as $k=>$tmp) {
            foreach($arItems as $item) {
                if($item["IBLOCK_SECTION_ID"]==$tmp["ID"]) {
                    $arRes[$k]["ITEMS"][] = $item;
                }
            }
        }
    }

    if($arParams["SUBSECTIONS"]=="Y") {
        for($i=0;$i<count($arRes);$i++) {
            if($arRes[$i]["DEPTH_LEVEL"]==1)
            {
                $arResult[$i] = $arRes[$i];
            } elseif($arRes[$i]["DEPTH_LEVEL"]>1) {
                $arResult[$i-1]["CHILD_LIST"][] = $arRes[$i];
            }
        }
    } else {
        $arResult = $arRes;
    }

    $this->IncludeComponentTemplate();
} else {
    echo "Неправильная настройка компонента!";
}
?>
