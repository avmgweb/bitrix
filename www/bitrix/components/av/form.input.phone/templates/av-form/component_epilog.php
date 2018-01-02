<?
use \Bitrix\Main\Page\Asset;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$templateFolder = getFolder(__DIR__);

CJSCore::Init(["av_form_elements"]);
Asset::getInstance()->addJs($templateFolder."input_phone_mask.js");