<?
use \Bitrix\Main\Page\Asset;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$templateFolder     = getFolder(__DIR__);
$templateFolderHttp = CURRENT_PROTOCOL."://".SITE_NAME.str_replace(DIRECTORY_SEPARATOR, "/", $templateFolder);

CJSCore::Init(["av"]);
Asset::getInstance()->addString("<script>AvBasketLineUpdate = \"".$templateFolderHttp."ajax/update_basket.php\";</script>");
Asset::getInstance()->addString("<script>AvBasketLineDelete = \"".$templateFolderHttp."ajax/delete_item.php\";</script>");

AvComponentsIncludings::getInstance()
	->setIncludings("av", "form.button", "av-alt2")
	->setIncludings("av", "form.button", "av");