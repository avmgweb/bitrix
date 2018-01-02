<?
use \Bitrix\Main\Page\Asset;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

CUtil::InitJSCore(array('window', 'ajax'));
Asset::getInstance()->addJs("/bitrix/js/main/utils.js");
Asset::getInstance()->addJs("/bitrix/js/main/popup_menu.js");

Asset::getInstance()->addCss("/bitrix/themes/.default/pubstyles.css");
if($arResult["OPTIONS"]["theme"]) Asset::getInstance()->addCss($templateFolder.'/themes/'.$arResult["OPTIONS"]["theme"].'/style.css');