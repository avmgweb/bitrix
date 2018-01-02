<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$this->getComponent()->addIncludeAreaIcons(CIBlock::GetComponentMenu
	(
	$APPLICATION->GetPublicShowMode(),
	CIBlock::GetPanelButtons($arParams["IBLOCK_ID"], '', $arResult["VARIABLES"]["SECTION_ID"])
	));

include Bitrix\Main\Application::getDocumentRoot().$this->GetFolder().'/news.php';