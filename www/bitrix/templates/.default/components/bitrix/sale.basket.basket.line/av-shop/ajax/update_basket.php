<?
require $_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php';
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$arParams = unserialize(base64_decode($_POST["params"]));

$APPLICATION->IncludeComponent("bitrix:sale.basket.basket.line", "av-shop", $arParams);