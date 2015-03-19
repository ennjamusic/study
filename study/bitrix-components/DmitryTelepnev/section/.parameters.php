<?
/**
 * Created by PhpStorm.
 * User: dmitry
 * Date: 16.03.14
 * Time: 20:53
 */
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
        'IBLOCK_SECTION_ID' => array(
            'NAME' => 'Id раздела',
            'TYPE' => 'STRING',
            'MULTIPLE' => 'N',
            'PARENT' => 'BASE',
        ),
        'IBLOCK_SECTION_CODE' => array(
            'NAME' => 'Код раздела',
            'TYPE' => 'STRING',
            'MULTIPLE' => 'N',
            'PARENT' => 'BASE',
        ),
        'SHOW_SECTIONS' => array(
            'NAME' => 'Показывать разделы',
            'TYPE' => 'CHECKBOX',
            'MULTIPLE' => 'N',
            'PARENT' => 'BASE',
        ),
        'ADD_TO_BASKET' => array(
            'NAME' => 'Использовать добавление в корзину',
            'TYPE' => 'CHECKBOX',
            'MULTIPLE' => 'N',
            'PARENT' => 'BASE',
        ),
        'ADD_CHAIN_ITEM' => array(
            'NAME' => 'Включать раздел в цепочку навигации',
            'TYPE' => 'CHECKBOX',
            'MULTIPLE' => 'N',
            'PARENT' => 'BASE',
        ),
        'SET_TITLE' => array(
            'NAME' => 'Устанавливать заголовок страницы',
            'TYPE' => 'CHECKBOX',
            'MULTIPLE' => 'N',
            'PARENT' => 'BASE',
        ),
        /**
         *      ToDo: add element properties to basket!!!
         **/
        'SET_404' => array(
            'NAME' => 'Устанавливать 404 ошибку,если раздел или элемент не найдены',
            'TYPE' => 'CHECKBOX',
            'MULTIPLE' => 'N',
            'PARENT' => 'BASE',
        ),
        'CACHE_TIME'  =>  array('DEFAULT'=>3600),
    ),
);
//debug($arCurrentValues);
if (0 < intval($arCurrentValues['IBLOCK_ID']))
{
    $arPropList = array();
    $rsProps = CIBlockProperty::GetList(array(),array('IBLOCK_ID' => $arCurrentValues['IBLOCK_ID']));
    while ($arProp = $rsProps->Fetch())
    {
        $arPropList[$arProp['ID']] = $arProp['NAME'];
    }

    $arComponentParameters['PARAMETERS']['PRICE_ELEM'] = array(
        'NAME' => 'Свойство для вывода цены',
        'TYPE' => 'LIST',
        'VALUES' => $arPropList,
        'PARENT' => 'BASE',
    );
}
?>
