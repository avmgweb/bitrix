<?
use \Bitrix\Main\Page\Asset;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$templateFolder     = getFolder(__DIR__);
$templateFolderHttp = CURRENT_PROTOCOL."://".SITE_NAME.str_replace(DIRECTORY_SEPARATOR, "/", $templateFolder);

CJSCore::Init(["av_form_elements", "font_awesome"]);
Asset::getInstance()->addString("<script>AvFormIblockSearchElement = \"".$templateFolderHttp."ajax/iblock_search.php\";</script>");