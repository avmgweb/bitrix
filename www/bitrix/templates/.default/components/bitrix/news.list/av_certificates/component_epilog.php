<?
use \Bitrix\Main\Page\Asset;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$templateFolder     = getFolder(__DIR__);
$templateFolderHttp = CURRENT_PROTOCOL."://".SITE_NAME.str_replace(DIRECTORY_SEPARATOR, "/", $templateFolder);

CJSCore::Init(["wait_for_images"]);
Asset::getInstance()->addString("<script>AvVsCertifitacesListElementFile = \"".$templateFolderHttp."ajax/element.php\";</script>");
AvComponentsIncludings::getInstance()->setIncludings("bitrix", "news.detail", "av_certificates");