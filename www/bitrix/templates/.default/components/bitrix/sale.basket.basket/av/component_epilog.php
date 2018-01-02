<?
use \Bitrix\Main\Page\Asset;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$templateFolder     = getFolder(__DIR__);
$templateFolderHttp = CURRENT_PROTOCOL."://".SITE_NAME.str_replace(DIRECTORY_SEPARATOR, "/", $templateFolder);

CJSCore::Init(["av", "font_awesome"]);
Asset::getInstance()->addString("<script>AvBasketChangeItemUrl = \"".$templateFolderHttp."ajax/change_item.php\";</script>");
Asset::getInstance()->addString("<script>AvBasketUpdateUrl     = \"".$templateFolderHttp."ajax/update_basket.php\";</script>");