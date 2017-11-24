<?
use \Bitrix\Main\Page\Asset;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

CJSCore::Init(["av"]);
Asset::getInstance()->addString('<script>AvDLShowMoreFile = "'.CURRENT_PROTOCOL.'://'.SITE_SERVER_NAME.$this->GetPath().'/templates/.default/ajax/show_more.php";</script>');