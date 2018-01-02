<?
use \Bitrix\Main\Page\Asset;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$templateFolder     = getFolder(__DIR__);
$templateFolderHttp = CURRENT_PROTOCOL."://".SITE_NAME.str_replace(DIRECTORY_SEPARATOR, "/", $templateFolder);

CJSCore::Init(["av_form_elements"]);
Asset::getInstance()->addString("<script>AvFormAjaxHandler = \"".$templateFolderHttp."ajax/form_handler.php\";</script>");

AvComponentsIncludings::getInstance()
	->setIncludings("av", "form.input",       "av-form")
	->setIncludings("av", "form.input.phone", "av-form")
	->setIncludings("av", "form.file",        "av-form")
	->setIncludings("av", "form.textarea",    "av-form");