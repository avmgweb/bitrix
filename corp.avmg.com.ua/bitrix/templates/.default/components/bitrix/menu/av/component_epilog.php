<?
use \Bitrix\Main\Page\Asset;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$serverRootArray = explode('/', $_SERVER["DOCUMENT_ROOT"]);
unset($serverRootArray[count($serverRootArray) - 1]);

$templateFolderArray = explode('/', str_replace(implode('/', $serverRootArray), '', __DIR__));
unset($templateFolderArray[0]);
unset($templateFolderArray[1]);
$templateFolder = '/'.implode('/', $templateFolderArray);

    if($arParams["MAX_LEVEL"] == 1) Asset::getInstance()->addCss($templateFolder."/one_level.css");
elseif($arParams["MAX_LEVEL"] == 2) Asset::getInstance()->addCss($templateFolder."/two_level.css");

CJSCore::Init(["av"]);