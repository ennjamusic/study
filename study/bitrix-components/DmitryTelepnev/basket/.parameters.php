<?
/**
 * Created by PhpStorm.
 * User: dmitry
 * Date: 16.03.14
 * Time: 20:53
 */
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();

$arComponentParameters = array(
    'PARAMETERS' => array(
        'BASKET_PATH' => array(
            'NAME' => 'Путь к странице корзины',
            'TYPE' => 'STRING',
            'MULTIPLE' => 'N',
            'PARENT' => 'BASE',
        ),
        'ORDER_PATH' => array(
            'NAME' => 'Путь к странице оформления заказа',
            'TYPE' => 'STRING',
            'MULTIPLE' => 'N',
            'PARENT' => 'BASE',
        ),
        'CACHE_TIME'  =>  array('DEFAULT'=>3600),
    ),
);
?>
