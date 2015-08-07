<?
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
CModule::IncludeModule("iblock");

$dbIBlockType = CIBlock::GetList(
    array("sort" => "asc"),
    array("ACTIVE" => "Y")
);
while ($arIBlockType = $dbIBlockType->Fetch())
{
    $arIblockType[$arIBlockType["ID"]] = "[".$arIBlockType["ID"]."] ".$arIBlockType["NAME"];
}

$arFilter = array(
    "LID"     => "ru"
);
$rsET = CEventType::GetList($arFilter);
while ($arET = $rsET->Fetch())
{
    $arEventType[$arET["ID"]] = "[".$arET["ID"]."] ".$arET["EVENT_NAME"];
}

$arComponentParameters = array(
    'PARAMETERS' => array(
        'IBLOCK_ID' => array(
            'NAME' => 'Id инфоблока для сохранения',
            'TYPE' => 'LIST',
            'VALUES' => $arIblockType,
            'MULTIPLE' => 'N',
            'PARENT' => 'BASE',
            'REFRESH' => 'Y',
        ),
        'EVENT_TYPE' => array(
            'NAME' => 'Тип почтового события',
            'TYPE' => 'LIST',
            'VALUES' => $arEventType,
            'MULTIPLE' => 'N',
            'PARENT' => 'BASE',
        ),
        'LINK_SUCCESS' => array(
            'NAME' => 'Путь в случае успешного добавления элемента',
            'TYPE' => 'STRING',
        ),
        'CACHE_TIME'  =>  array('DEFAULT'=>3600),
    ),
);
?>
