<?
use \Bitrix\Main\Page\Asset;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$serverRootArray = explode("/", $_SERVER["DOCUMENT_ROOT"]);
unset($serverRootArray[count($serverRootArray) - 1]);
$templateFolderArray = explode("/", str_replace(implode("/", $serverRootArray), "", __DIR__));
unset($templateFolderArray[0]);
unset($templateFolderArray[1]);
$templateFolder = "/".implode("/", $templateFolderArray);

CJSCore::Init(["av_form_elements"]);
Asset::getInstance()->addString("<script>AvFormAjaxHandler = \"".CURRENT_PROTOCOL."://".$_SERVER["SERVER_NAME"].$templateFolder."/ajax/form_handler.php\";</script>");

AvComponentsIncludings::getInstance()
	->setIncludings("av", "form.input",       "av-form")
	->setIncludings("av", "form.input.phone", "av-form")
	->setIncludings("av", "form.file",        "av-form")
	->setIncludings("av", "form.textarea",    "av-form");