<?
use \Bitrix\Main\Page\Asset;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$serverRootArray = explode('/', $_SERVER["DOCUMENT_ROOT"]);
unset($serverRootArray[count($serverRootArray) - 1]);

$templateFolderArray = explode('/', str_replace(implode('/', $serverRootArray), '', __DIR__));
unset($templateFolderArray[0]);
unset($templateFolderArray[1]);
$templateFolder = '/'.implode('/', $templateFolderArray);

CJSCore::Init(["av"]);
Asset::getInstance()->addString('<script>AvCatalogSectionChangeViewTypeFile = "'.CURRENT_PROTOCOL.'://'.SITE_SERVER_NAME.$templateFolder.'/ajax/change_view_type.php";</script>');

AvComponentsIncludings::getInstance()
	->setIncludings("bitrix", "catalog.item", "av-tablet")
	->setIncludings("bitrix", "catalog.item", "av-list");