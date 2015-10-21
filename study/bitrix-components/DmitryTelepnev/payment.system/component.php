<?
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
// echo '<pre>'; print_r($arParams); echo '</pre>';
CModule::IncludeModule('iblock');
if ($this->StartResultCache(3600))
{
    $arResult = array();
    $arQuery = array();
    if(!empty($_SESSION["ADDED_ITEMS"])) {
        foreach($_SESSION["ADDED_ITEMS"] as $arItems) {
            $db_list = CIBlockElement::GetList(array(), array("ID"=>$arItems["ID"]));
    //    debug($db_list);
            while($ar_result = $db_list->GetNext())
            {
                $arResult[] = $ar_result;
//            debug($ar_result);
            }
        }
        if($_SERVER["REQUEST_METHOD"]=="POST" && $_POST["action"]=='delete' && is_numeric($_POST["id"])) {
            foreach($_SESSION["ADDED_ITEMS"] as $key=>$arItem) {
                if($arItem["ID"]==$_POST["id"]) {
                    unset($_SESSION["ADDED_ITEMS"][$key]);
                }
            }
        }
    }
    $this->IncludeComponentTemplate();
}
?>
