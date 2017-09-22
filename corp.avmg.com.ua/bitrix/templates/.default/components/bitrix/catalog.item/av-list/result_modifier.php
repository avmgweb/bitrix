<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
$arResult = $arResult["ITEM"];
/* -------------------------------------------------------------------- */
/* --------------------------- prices matrix -------------------------- */
/* -------------------------------------------------------------------- */
$arResult["PRICES_VALUES_ARRAY"] = [];
$arResult["PRICES_TITLES_ARRAY"] = [];

foreach($arResult["PRICES"] as $priceInfo)
	{
	$arResult["PRICES_VALUES_ARRAY"][] = $arParams["PRICE_VAT_INCLUDE"] == 'Y' ? $priceInfo["DISCOUNT_VALUE_VAT"]       : $priceInfo["DISCOUNT_VALUE_NOVAT"];
	$arResult["PRICES_TITLES_ARRAY"][] = $arParams["PRICE_VAT_INCLUDE"] == 'Y' ? $priceInfo["PRINT_DISCOUNT_VALUE_VAT"] : $priceInfo["PRINT_DISCOUNT_VALUE_NOVAT"];
	}

foreach($arResult["OFFERS"] as $index => $offerInfo)
	foreach($offerInfo["PRICES"] as $priceInfo)
		{
		$arResult["PRICES_VALUES_ARRAY"][] = $arParams["PRICE_VAT_INCLUDE"] == 'Y' ? $priceInfo["DISCOUNT_VALUE_VAT"]       : $priceInfo["DISCOUNT_VALUE_NOVAT"];
		$arResult["PRICES_TITLES_ARRAY"][] = $arParams["PRICE_VAT_INCLUDE"] == 'Y' ? $priceInfo["PRINT_DISCOUNT_VALUE_VAT"] : $priceInfo["PRINT_DISCOUNT_VALUE_NOVAT"];
		}
/* -------------------------------------------------------------------- */
/* ------------------------ element props info ------------------------ */
/* -------------------------------------------------------------------- */
$arResult["OFFERS_VALUES"] = [];
$sectionProps              = CIBlockSectionPropertyLink::GetArray($arResult["IBLOCK_ID"], $arResult["IBLOCK_SECTION_ID"]);
/* ------------------------------------------- */
/* -------------- element props -------------- */
/* ------------------------------------------- */
foreach($arResult["DISPLAY_PROPERTIES"] as $propInfo)
	if(count($sectionProps[$propInfo["ID"]]))
		{
		$nativeValue = strip_tags($propInfo["DISPLAY_VALUE"]);
		$value       = $nativeValue;
		$valueType   = 'TEXT';
		$measure     = '';

		if(is_numeric($nativeValue[0]))
			{
			$valueType   = 'NUMBER';
			$nativeValue = str_replace(',', '.', $nativeValue);
			$value       = floatval($nativeValue);
			}

		$arResult["OFFERS_VALUES"][$propInfo["ID"]] =
			[
			"NAME"       => $propInfo["NAME"],
			"CODE"       => $propInfo["CODE"],
			"VALUE_TYPE" => $valueType,
			"MEASURE"    => $valueType == 'NUMBER' && stripos($nativeValue, ' ')
				? trim(str_replace($value, '', $nativeValue))
				: '',
			"VALUES"     => []
			];

		if($value) $arResult["OFFERS_VALUES"][$propInfo["ID"]]["VALUES"][] = $value;
		}
/* ------------------------------------------- */
/* ---------------- sku props ---------------- */
/* ------------------------------------------- */
foreach($arResult["OFFERS"] as $index => $offerInfo)
	foreach($offerInfo["DISPLAY_PROPERTIES"] as $propInfo)
		{
		$nativeValue = strip_tags($propInfo["DISPLAY_VALUE"]);
		$value       = $nativeValue;
		$valueType   = 'TEXT';
		$measure     = '';

		if(is_numeric($nativeValue[0]))
			{
			$valueType   = 'NUMBER';
			$nativeValue = str_replace(',', '.', $nativeValue);
			$value       = floatval($nativeValue);
			}

		if(!count($arResult["OFFERS_VALUES"][$propInfo["ID"]]))
			$arResult["OFFERS_VALUES"][$propInfo["ID"]] =
				[
				"NAME"       => $propInfo["NAME"],
				"CODE"       => $propInfo["CODE"],
				"VALUE_TYPE" => $valueType,
				"MEASURE"    => $valueType == 'NUMBER' && stripos($nativeValue, ' ')
					? trim(str_replace($value, '', $nativeValue))
					: '',
				"VALUES"     => []
				];

		if($value) $arResult["OFFERS_VALUES"][$propInfo["ID"]]["VALUES"][] = $value;
		}