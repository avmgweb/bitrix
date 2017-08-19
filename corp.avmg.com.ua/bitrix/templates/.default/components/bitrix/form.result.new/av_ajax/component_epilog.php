<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
use Bitrix\Main\Page\Asset;

$serverRootArray = explode('/', $_SERVER["DOCUMENT_ROOT"]);
unset($serverRootArray[count($serverRootArray) - 1]);
$templateFolderArray = explode('/', str_replace(implode('/', $serverRootArray), '', __DIR__));
unset($templateFolderArray[0]);
unset($templateFolderArray[1]);
$templateFolder = '/'.implode('/', $templateFolderArray);

CJSCore::Init(["av_form_elements"]);
Asset::getInstance()->addString('<script>AvFormAjaxHandler = "'.CURRENT_PROTOCOL.'://'.$_SERVER["SERVER_NAME"].$templateFolder.'/ajax/form_handler.php";</script>');

AvComponentsIncludings::getInstance()
	->setIncludings("av", "form_elements", "",        "textarea")
	->setIncludings("av", "form_elements", "",        "password")
	->setIncludings("av", "form_elements", "",        "date")
	->setIncludings("av", "form_elements", "",        "radio")
	->setIncludings("av", "form_elements", "",        "list")
	->setIncludings("av", "form_elements", "",        "file")
	->setIncludings("av", "form_elements", "",        "input")
	->setIncludings("av", "form_elements", "",        "phone")
	->setIncludings("av", "form_elements", "av_site", "button");