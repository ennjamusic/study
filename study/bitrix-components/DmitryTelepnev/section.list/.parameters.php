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
        ),
        'SECTION_ID' => array(
            'NAME' => 'Id раздела',
            'TYPE' => 'STRING',
            'MULTIPLE' => 'N',
            'PARENT' => 'BASE',
        ),
        'SECTION_CODE' => array(
            'NAME' => 'Код раздела',
            'TYPE' => 'STRING',
            'MULTIPLE' => 'N',
            'PARENT' => 'BASE',
        ),
        'SUBSECTIONS' => array(
            'NAME' => 'Показывать подразделы(подразделы третьей и более вложенности будут находится на одном уровне с разделами второй вложенности)',
            'TYPE' => 'CHECKBOX',
            'MULTIPLE' => 'N',
            'PARENT' => 'BASE',
        ),
        'SHOW_SECTION_ELEMENT' => array(
            'NAME' => 'Показывать элементы раздела',
            'TYPE' => 'CHECKBOX',
            'MULTIPLE' => 'N',
            'PARENT' => 'BASE',
        ),
        'COUNT_SECTION_ELEMENT' => array(
            'NAME' => 'Количество показываемых элементов раздела',
            'TYPE' => 'STRING',
            'MULTIPLE' => 'N',
            'PARENT' => 'BASE',
        ),
        'CACHE_TIME'  =>  array('DEFAULT'=>3600),
    ),
);
?>
