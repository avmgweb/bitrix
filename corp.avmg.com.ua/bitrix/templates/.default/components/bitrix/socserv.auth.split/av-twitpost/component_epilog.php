<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Page\Asset;

$arExt = array();
if($arParams["POPUP"])
	$arExt[] = "window";
CUtil::InitJSCore($arExt);
Asset::getInstance()->addCss("/bitrix/js/socialservices/css/ss.css");
Asset::getInstance()->addJs ("/bitrix/js/socialservices/ss.js");