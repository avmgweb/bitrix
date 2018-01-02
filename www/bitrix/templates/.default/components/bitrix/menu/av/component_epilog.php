<?
use \Bitrix\Main\Page\Asset;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$templateFolder = getFolder(__DIR__);

CJSCore::Init(["av"]);
    if($arParams["MAX_LEVEL"] == 1) Asset::getInstance()->addCss($templateFolder."one_level.css");
elseif($arParams["MAX_LEVEL"] == 2) Asset::getInstance()->addCss($templateFolder."two_level.css");