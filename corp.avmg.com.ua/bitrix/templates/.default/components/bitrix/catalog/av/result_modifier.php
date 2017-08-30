<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$arResult["PAGE_TYPE"]    = $this->__page;
$arResult["CATALOG_MENU"] = '';
/* -------------------------------------------------------------------- */
/* ------------------------------- menu ------------------------------- */
/* -------------------------------------------------------------------- */
ob_start();
$GLOBALS["MENU_CATALOG_INFO"] =
	[
	"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
	"IBLOCK_ID"   => $arParams["IBLOCK_ID"],
	"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
	"DETAIL_URL"  => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["element"]
	];

if($arParams["CATALOG_MENU_TYPE"])
	$APPLICATION->IncludeComponent
		(
		"bitrix:menu", $arResult["PAGE_TYPE"] == 'element' ? "av_shop_minimized" : "av_shop_vertical",
			[
			"ROOT_MENU_TYPE"     => $arParams["CATALOG_MENU_TYPE"],
			"MAX_LEVEL"          => 2,
			"CHILD_MENU_TYPE"    => '',
			"USE_EXT"            => 'Y',
			"DELAY"              => 'N',
			"ALLOW_MULTI_SELECT" => 'N',

			"MENU_CACHE_TYPE"       => 'A',
			"MENU_CACHE_TIME"       => 360000,
			"MENU_CACHE_USE_GROUPS" => 'Y'
			]
		);

$arResult["CATALOG_MENU"] = ob_get_contents();
ob_clean();