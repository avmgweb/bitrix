<?
use \Bitrix\Main\Page\Asset;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var string $templateFolder
 * @global CMain $APPLICATION
 */

CUtil::InitJSCore(array('window', 'ajax'));
Asset::getInstance()->addJs('/bitrix/js/main/utils.js');
Asset::getInstance()->addJs('/bitrix/js/main/popup_menu.js');
Asset::getInstance()->addJs('/bitrix/js/main/dd.js');

Asset::getInstance()->addCss('/bitrix/themes/.default/pubstyles.css');

$theme = '';
if(isset($arResult["OPTIONS"]))
{
	$theme = $arResult["OPTIONS"]["theme"];
}
elseif(CPageOption::GetOptionString("main.interface", "use_themes", "Y") !== "N")
{
	$theme = CGridOptions::GetTheme($arParams["GRID_ID"]);
}

if($theme <> '') Asset::getInstance()->addCss($templateFolder.'/themes/'.$theme.'/style.css');

$currentBodyClass = $APPLICATION->GetPageProperty("BodyClass", false);
$APPLICATION->SetPageProperty("BodyClass", ($currentBodyClass ? $currentBodyClass." " : "")."flexible-layout");
