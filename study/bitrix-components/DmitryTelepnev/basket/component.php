<?
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
// echo '<pre>'; print_r($arParams); echo '</pre>';
CModule::IncludeModule('iblock');
if ($this->StartResultCache(3600))
{
    $arResult = array();
    $arQuery = array();
    $tmp = array();
    if(!empty($_SESSION["ADDED_ITEMS"])) {
        for($i=0;$i<count($_SESSION["ADDED_ITEMS"]);$i++) {
            if(!in_array($_SESSION["ADDED_ITEMS"][$i]["ID"],$tmp)) {
                $tmp[] = $_SESSION["ADDED_ITEMS"][$i]["ID"];
                $newResult[] = $_SESSION["ADDED_ITEMS"][$i];
            } else {
                $index = array_search($_SESSION["ADDED_ITEMS"][$i]["ID"],$tmp);
                $newResult[$index]["COUNT"] ++ ;
            }
        }

        if($_SERVER["REQUEST_METHOD"]=="GET" && $_GET["action"]=='delete' && is_numeric($_GET["id"])) {
            foreach($newResult as $key=>$arItem) {
                if($arItem["ID"]==$_GET["id"]) {
                    unset($newResult[$key]);
                }
            }
        }

        if($_SERVER["REQUEST_METHOD"]=="POST" && !empty($newResult)) {
            $_SESSION["BUY_ITEMS"] = $newResult;

            LocalRedirect($arParams["ORDER_PATH"]);
        }

        if($_SERVER["REQUEST_METHOD"]=="POST" && $_POST["action"]=='refresh' && !empty($newResult)) {
            $_SESSION["BUY_ITEMS"] = $newResult;
        }

        $_SESSION["ADDED_ITEMS"] = $newResult;

        $arItemsId = array();
        foreach($newResult as $tmp) {
            $arItemsId[] = $tmp["ID"];
        }

        $db_list = CIBlockElement::GetList(array(), array("ID"=>$arItemsId,"IBLOCK_ID"=>$arItems["IBLOCK_ID"]));

        while($ar_result = $db_list->GetNext())
        {
            $arResult[] = array_merge($ar_result, array("COUNT"=>(empty($arItems["COUNT"])?"1":$arItems["COUNT"])));
        }

//        foreach($newResult as $arItems) {
//            $db_list = CIBlockElement::GetList(array(), array("ID"=>$arItems["ID"],"IBLOCK_ID"=>$arItems["IBLOCK_ID"]));
//
//            if($ar_result = $db_list->GetNext())
//            {
//                $arResult[] = array_merge($ar_result, array("COUNT"=>(empty($arItems["COUNT"])?"1":$arItems["COUNT"])));
//            }
//        }
    }
    $this->IncludeComponentTemplate();
}
?>
