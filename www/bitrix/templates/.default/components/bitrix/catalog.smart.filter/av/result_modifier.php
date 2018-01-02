<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

unset($arResult["ITEMS"]["BASE"]);
/* -------------------------------------------------------------------- */
/* ------------------------- filter condition ------------------------- */
/* -------------------------------------------------------------------- */
$arResult["FILTER_CONDITION"] = in_array($_COOKIE["avCatalogSmartFilterCondition"], ["open", "closed"])
	? $_COOKIE["avCatalogSmartFilterCondition"]
	: "closed";
/* -------------------------------------------------------------------- */
/* ----------------------- fields preprocessing ----------------------- */
/* -------------------------------------------------------------------- */
foreach([$arParams["IBLOCK_ID"], CCatalogSKU::GetInfoByProductIBlock($arParams["IBLOCK_ID"])["IBLOCK_ID"]] as $iblockId)
	if((int) $iblockId)
		foreach(CIBlockSectionPropertyLink::GetArray($iblockId, $arParams["SECTION_ID"]) as $propId => $propInfo)
			$arResult["ITEMS"][$propId]["DISPLAY_EXPANDED"] = $propInfo["DISPLAY_EXPANDED"];
/* -------------------------------------------------------------------- */
/* ------------------------- fields processing ------------------------ */
/* -------------------------------------------------------------------- */
foreach($arResult["ITEMS"] as $itemIndex => $fieldInfo)
	{
	if(!count($fieldInfo["VALUES"]))
		{
		unset($arResult["ITEMS"][$itemIndex]);
		continue;
		}

	foreach($fieldInfo["VALUES"] as $listItemInfo)
		if($listItemInfo["CHECKED"])
			{
			$arResult["ITEMS"][$itemIndex]["APPLIED"] = true;
			break;
			}

	if($fieldInfo["DISPLAY_TYPE"] == 'K' || $fieldInfo["DISPLAY_TYPE"] == 'P')
		foreach($fieldInfo["VALUES"] as $listItemInfo)
			{
			$arResult["ITEMS"][$itemIndex]["INPUT_NAME"] = $listItemInfo["CONTROL_NAME_ALT"];
			if($listItemInfo["CHECKED"])
				{
				$arResult["ITEMS"][$itemIndex]["INPUT_VALUE"] = $listItemInfo["HTML_VALUE_ALT"];
				break;
				}
			}
	}