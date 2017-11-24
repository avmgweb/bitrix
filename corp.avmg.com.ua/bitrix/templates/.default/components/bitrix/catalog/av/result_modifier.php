<?
use \Bitrix\Main\Localization\Loc;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$filePathExplode = explode($this->GetFolder(), __FILE__);
Loc::loadMessages($filePathExplode[0].$this->GetFolder()."/template.php");
/* -------------------------------------------------------------------- */
/* ---------------------------- page size ----------------------------- */
/* -------------------------------------------------------------------- */
$arParams["PAGE_SIZE_VALUES"] = array_values(array_diff(array_map("intval", $arParams["PAGE_SIZE_VALUES"]), ["", 0]));
if(!$arParams["PAGE_SIZE_VALUES"][0]) $arParams["PAGE_SIZE_VALUES"] = [10, 20, 30];

$arResult["SECTION_PAGE_SIZE"] = $_COOKIE["avCatalogPageSize"] && in_array($_COOKIE["avCatalogPageSize"], $arParams["PAGE_SIZE_VALUES"])
	? $_COOKIE["avCatalogPageSize"]
	: $arParams["PAGE_SIZE_VALUES"][0];
/* -------------------------------------------------------------------- */
/* ------------------------- section page type ------------------------ */
/* -------------------------------------------------------------------- */
$arResult["SECTION_PAGE_TYPE_VALUES"] = ["tablet" => Loc::getMessage("AV_CATALOG_SECTION_PAGE_TYPE_TABLET"), "list" => Loc::getMessage("AV_CATALOG_SECTION_PAGE_TYPE_LIST")];
$arResult["SECTION_PAGE_TYPE"]        = $_COOKIE["avCatalogPageType"] && $arResult["SECTION_PAGE_TYPE_VALUES"][$_COOKIE["avCatalogPageType"]]
	? $_COOKIE["avCatalogPageType"]
	: "tablet";
/* -------------------------------------------------------------------- */
/* ------------------------ iblock description ------------------------ */
/* -------------------------------------------------------------------- */
$arResult["IBLOCK_DESCRIPTION"] = CIBlock::GetList([], ["ID" => $arParams["IBLOCK_ID"]])->GetNext()["DESCRIPTION"];
/* -------------------------------------------------------------------- */
/* --------------------- catalog/sku iblock props --------------------- */
/* -------------------------------------------------------------------- */
$catalogInfo    = [];
$iblockProps    = [];
$skuIblockProps = [];

if($arParams["IBLOCK_ID"])
	{
	$queryList = CCatalog::GetList([], ["IBLOCK_TYPE_ID" => $arParams["IBLOCK_TYPE"], "IBLOCK_ID" => $arParams["IBLOCK_ID"], "ACTIVE" => "Y"]);
	while($queryElement = $queryList->GetNext())
		{
		$propsQueryList = CIBlockProperty::GetList(["SORT" => "ASC"], ["IBLOCK_ID" => $queryElement["ID"]]);
		while($propsQueryElement = $propsQueryList->GetNext()) $iblockProps[] = $propsQueryElement["CODE"] ? $propsQueryElement["CODE"] : $propsQueryElement["ID"];

		if($queryElement["OFFERS_IBLOCK_ID"] && $queryElement["OFFERS_PROPERTY_ID"])
			{
			$skuPropsQueryList = CIBlockProperty::GetList(["SORT" => "ASC"], ["IBLOCK_ID" => $queryElement["OFFERS_IBLOCK_ID"]]);
			while($skuPropsElement = $skuPropsQueryList->GetNext())
				if($skuPropsElement["ID"] != $skuPropsElement["OFFERS_PROPERTY_ID"])
					$skuIblockProps[] = $skuPropsElement["CODE"] ? $skuPropsElement["CODE"] : $skuPropsElement["ID"];
			}
		}
	}

$arParams["LIST_PROPERTY_CODE"]        = $arParams["DETAIL_PROPERTY_CODE"]        = $iblockProps;
$arParams["LIST_OFFERS_PROPERTY_CODE"] = $arParams["DETAIL_OFFERS_PROPERTY_CODE"] = $skuIblockProps;