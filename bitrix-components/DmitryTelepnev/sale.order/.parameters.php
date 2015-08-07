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
            'NAME' => 'Id инфоблока',
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
            'NAME' => 'Путь в случае успешного оформления заказа',
            'TYPE' => 'STRING',
        ),
        'CACHE_TIME'  =>  array('DEFAULT'=>3600),
    ),
);
if (0 < intval($arCurrentValues['IBLOCK_ID']))
{
    $arPropList = array();
    $rsProps = CIBlockProperty::GetList(array(),array('IBLOCK_ID' => $arCurrentValues['IBLOCK_ID']));
    while ($arProp = $rsProps->Fetch())
    {
        $arPropList[$arProp['ID']] = $arProp['NAME'];
    }

    $arComponentParameters['PARAMETERS']['USER_PHONE'] = array(
        'NAME' => 'Свойство для хранения телефона пользователя',
        'TYPE' => 'LIST',
        'VALUES' => $arPropList,
        'PARENT' => 'BASE',
    );
    $arComponentParameters['PARAMETERS']['USER_NAME'] = array(
        'NAME' => 'Свойство для хранения имени пользователя',
        'TYPE' => 'LIST',
        'VALUES' => $arPropList,
        'PARENT' => 'BASE',
    );
    $arComponentParameters['PARAMETERS']['USER_EMAIL'] = array(
        'NAME' => 'Свойство для хранения пользовательского email',
        'TYPE' => 'LIST',
        'VALUES' => $arPropList,
        'PARENT' => 'BASE',
    );
    $arComponentParameters['PARAMETERS']['USER_ADDRESS'] = array(
        'NAME' => 'Свойство для хранения адреса доставки',
        'TYPE' => 'LIST',
        'VALUES' => $arPropList,
        'PARENT' => 'BASE',
    );
    $arComponentParameters['PARAMETERS']['TOTAL_PRICE'] = array(
        'NAME' => 'Свойство для хранения общей стоимости заказа',
        'TYPE' => 'LIST',
        'VALUES' => $arPropList,
        'PARENT' => 'BASE',
    );
    $arComponentParameters['PARAMETERS']['PURCHASED_GOODS'] = array(
        'NAME' => 'Свойство для хранения приобретенных товаров',
        'TYPE' => 'LIST',
        'VALUES' => $arPropList,
        'PARENT' => 'BASE',
    );
}

?>
