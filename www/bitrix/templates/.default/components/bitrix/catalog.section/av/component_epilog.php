<?
use \Bitrix\Main\Page\Asset;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$templateFolder     = getFolder(__DIR__);
$templateFolderHttp = CURRENT_PROTOCOL."://".SITE_NAME.str_replace(DIRECTORY_SEPARATOR, "/", $templateFolder);

CJSCore::Init(["av"]);
Asset::getInstance()->addString("<script>AvCatalogSectionChangeViewTypeFile = \"".$templateFolderHttp."ajax/change_view_type.php\";</script>");

AvComponentsIncludings::getInstance()
	->setIncludings("bitrix", "catalog.item", "av-tablet")
	->setIncludings("bitrix", "catalog.item", "av-list");