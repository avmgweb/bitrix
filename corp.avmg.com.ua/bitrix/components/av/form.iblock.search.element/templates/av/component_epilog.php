<?
use \Bitrix\Main\Page\Asset;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$serverRootArray = explode("/", $_SERVER["DOCUMENT_ROOT"]);
unset($serverRootArray[count($serverRootArray) - 1]);

$templateFolderArray = explode("/", str_replace(implode("/", $serverRootArray), "", __DIR__));
unset($templateFolderArray[0]);
unset($templateFolderArray[1]);
$templateFolder = "/".implode("/", $templateFolderArray);

CJSCore::Init(["av_form_elements", "font_awesome"]);
Asset::getInstance()->addString("<script>AvFormIblockSearchElement = \"".CURRENT_PROTOCOL."://".SITE_SERVER_NAME.$templateFolder."/ajax/iblock_search.php\";</script>");