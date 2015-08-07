<?
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
// echo '<pre>'; print_r($arParams); echo '</pre>';
CModule::IncludeModule('iblock');

function __checkEmail($email)
{
    if(!preg_match('|([a-z0-9_\.\-]{1,20})@([a-z0-9\.\-]{1,20})\.([a-z]{2,4})|is', $email)) {
        //echo "false";
        return FALSE;
    } else {
        return true;
    }
}


if ($this->StartResultCache(3600))
{
    $arResult = array();
    if(!empty($_SESSION["BUY_ITEMS"])) {

        $arItemsId = array();
        foreach($_SESSION["BUY_ITEMS"] as $tmp) {
            $arItemsId[] = $tmp["ID"];
        }


        $arFilter = Array("ID"=>$arItemsId, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
        $res = CIBlockElement::GetList(Array(), $arFilter, false);
        $arPict = array();

        while($ob = $res->GetNext())
        {
            $arResult[] = $ob;
        }

        if($_SERVER["REQUEST_METHOD"]=="POST" &&
            $_POST["action"]=='buy' &&
            !empty($_POST["email"]) &&
            !empty($_POST["phone"]) &&
            !empty($_POST["name"]) &&
            !empty($_POST["address"])
        )
        {
            if(__checkEmail($_POST["email"])) {
                //echo "12";
                $el = new CIBlockElement;
                $PROP = array();
                $arItemsId = array();

                foreach($_SESSION["BUY_ITEMS"] as $tmp) {
                    $arItemsId[] = $tmp["ID"];
                }
//                debug($arItemsId);
                $PROP = array(
                    $arParams["USER_NAME"]=>$_POST["name"],
                    $arParams["USER_PHONE"]=>$_POST["phone"],
                    $arParams["USER_EMAIL"]=>$_POST["email"],
                    $arParams["USER_ADDRESS"]=>$_POST["address"],
                    $arParams["TOTAL_PRICE"]=>"",
                    $arParams["PURCHASED_GOODS"]=>$arItemsId,);
                $arProps = Array(
                    "MODIFIED_BY"    => $USER->GetID(), // элемент изменен текущим пользователем
                    "IBLOCK_SECTION_ID" => false,          // элемент лежит в корне раздела
                    "IBLOCK_ID"      => $arParams["IBLOCK_ID"],
                    "PROPERTY_VALUES"=> $PROP,
                    "NAME"           => "Заказ от ".date("d.m.Y H:i")." покупателя ".$_POST["name"],
                );
//                debug($arProps);
                if($PRODUCT_ID = $el->Add($arProps)) {
                    unset($_SESSION["BUY_ITEMS"]);
                    unset($_SESSION["ADDED_ITEMS"]);
                    $arEventFields = array(
                        "USER_NAME"=>$_POST["name"],
                        "USER_PHONE"=>$_POST["phone"],
                        "USER_EMAIL"=>$_POST["email"],
                        "USER_ADDRESS"=>$_POST["address"],
                        "TOTAL_PRICE"=>"",
                        "PURCHASED_GOODS"=>$arItemsId,
                    );


                    CEvent::Send("PURCHASE", SITE_ID, $arEventFields);
                    LocalRedirect($arParams["LINK_SUCCESS"]);

                }
            }
        }
    }
    $this->IncludeComponentTemplate();
}
?>
