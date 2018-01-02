<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if(!\Bitrix\Main\Loader::includeModule("iblock"))               return;
/* -------------------------------------------------------------------- */
/* ----------------------- arParams correction ------------------------ */
/* -------------------------------------------------------------------- */
$arParams["IBLOCK_ID"] = is_array($arParams["IBLOCK_ID"]) ? $arParams["IBLOCK_ID"] : [$arParams["IBLOCK_ID"]];

$arParams["SEF_URL_TEMPLATES"] =
	[
	"LIST"    => $arParams["SEF_URL_TEMPLATES"]["list"],
	"ELEMENT" => $arParams["SEF_URL_TEMPLATES"]["element"] ? $arParams["SEF_URL_TEMPLATES"]["element"] : '#ELEMENT_ID#/'
	];
$arParams["VARIABLE_ALIASES"] =
	[
	"ELEMENT_ID" => $arParams["VARIABLE_ALIASES"]["ELEMENT_ID"] ? $arParams["VARIABLE_ALIASES"]["ELEMENT_ID"] : 'ELEMENT_ID'
	];
/* -------------------------------------------------------------------- */
/* ---------------------------- variables ----------------------------- */
/* -------------------------------------------------------------------- */
$componentPage = 'list';
$urlVariables  = [];
$urlTemplates  = [];
/* -------------------------------------------------------------------- */
/* -------------------------- pages adresses -------------------------- */
/* -------------------------------------------------------------------- */
if($arParams["SEF_MODE"] == 'Y')
	{
	CComponentEngine::ParseComponentPath($arParams["SEF_FOLDER"], $arParams["SEF_URL_TEMPLATES"], $urlVariables);
	foreach($arParams["SEF_URL_TEMPLATES"] as $index => $value)
		$urlTemplates[$index] = $arParams["SEF_FOLDER"].$value;
	}
else
	{
	CComponentEngine::InitComponentVariables(false, array_keys($arParams["VARIABLE_ALIASES"]), $arParams["VARIABLE_ALIASES"], $urlVariables);
	$urlTemplates["LIST"]    = $APPLICATION->GetCurPage(false);
	$urlTemplates["ELEMENT"] = $APPLICATION->GetCurPage(false).'?'.$arParams["VARIABLE_ALIASES"]["ELEMENT_ID"].'=#ELEMENT_ID#';
	}

if($urlVariables["ELEMENT_ID"] || $urlVariables["ELEMENT_CODE"])
	{
	$iblockFilter = ["IBLOCK_ID" => $arParams["IBLOCK_ID"]];
	if($urlVariables["ELEMENT_ID"]) $iblockFilter["ID"]   = $urlVariables["ELEMENT_ID"];
	else                            $iblockFilter["CODE"] = $urlVariables["ELEMENT_CODE"];
	$elementInfo = CIBlockElement::GetList([], $iblockFilter, false, false, ["ID", "CODE", "IBLOCK_ID"])->GetNext();

	$urlVariables["ELEMENT_ID"]   = $elementInfo["ID"];
	$urlVariables["ELEMENT_CODE"] = $elementInfo["CODE"];
	$urlVariables["IBLOCK_ID"]    = $elementInfo["IBLOCK_ID"];
	}

if($urlVariables["ELEMENT_ID"] || $urlVariables["ELEMENT_CODE"]) $componentPage = 'element';
/* -------------------------------------------------------------------- */
/* ------------------------------ output ------------------------------ */
/* -------------------------------------------------------------------- */
$arResult =
	[
	"URL_VARIABLES" => $urlVariables,
	"URL_TEMPLATES" => $urlTemplates
	];
$this->IncludeComponentTemplate($componentPage);