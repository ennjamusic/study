<?
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
// echo '<pre>'; print_r($arParams); echo '</pre>';
CModule::IncludeModule("iblock");

if ($this->StartResultCache(3600))
{
        //echo $_POST["guard"];
    if($_SERVER["REQUEST_METHOD"]=="POST"
        && $_POST["guard"]=="yes"
        && !empty($_POST["name"])
        && !empty($_POST["message"])
    ) {
        //debug($_POST);
        $el = new CIBlockElement;
        $arProps = Array(
            "MODIFIED_BY"    => $USER->GetID(), // элемент изменен текущим пользователем
            "IBLOCK_SECTION_ID" => false,          // элемент лежит в корне раздела
            "IBLOCK_ID"      => $arParams["IBLOCK_ID"],
            "NAME"           => $_POST["name"],
            "PREVIEW_TEXT"   => $_POST["message"],
        );
//                debug($arProps);
        if($PRODUCT_ID = $el->Add($arProps)) {
            echo "Отзыв отправлен";
        }
    }
    $this->IncludeComponentTemplate();
}
?>
