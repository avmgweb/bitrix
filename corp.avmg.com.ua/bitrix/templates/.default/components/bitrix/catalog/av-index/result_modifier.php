<?
use \Bitrix\Main\Localization\Loc;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/* -------------------------------------------------------------------- */
/* --------------------------- iblock name ---------------------------- */
/* -------------------------------------------------------------------- */

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
		$arResult["IBLOCK_NAME"] = $queryElement["NAME"];

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

$arParams["FILTER_PROPERTY_CODE"]        = $arParams["LIST_PROPERTY_CODE"]        = $arParams["DETAIL_PROPERTY_CODE"]        = $iblockProps;
$arParams["FILTER_OFFERS_PROPERTY_CODE"] = $arParams["LIST_OFFERS_PROPERTY_CODE"] = $arParams["DETAIL_OFFERS_PROPERTY_CODE"] = $skuIblockProps;