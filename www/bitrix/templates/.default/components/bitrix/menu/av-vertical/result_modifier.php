<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$arParams["MAX_LEVEL"] = intval($arParams["MAX_LEVEL"] ? $arParams["MAX_LEVEL"] : 1);
/* -------------------------------------------------------------------- */
/* --------------------------- depth level ---------------------------- */
/* -------------------------------------------------------------------- */
foreach($arResult as $index => $itemInfo)
	$arResult[$index]["DEPTH_LEVEL"] = intval($itemInfo["PARAMS"]["DEPTH_LEVEL"] ? $itemInfo["PARAMS"]["DEPTH_LEVEL"] : $itemInfo["DEPTH_LEVEL"]);
/* -------------------------------------------------------------------- */
/* --------------------------- active/select -------------------------- */
/* -------------------------------------------------------------------- */
foreach($arResult as $index => $itemInfo)
	{
	$nextIndex = $index + 1;

	if($arParams["MAX_LEVEL"] > 1 && $itemInfo["DEPTH_LEVEL"] == 1)
		while(count($arResult[$nextIndex]) && $arResult[$nextIndex]["DEPTH_LEVEL"] > 1)
			{
			$arResult[$index]["PARENT"] = true;
			if($arResult[$nextIndex]["SELECTED"])
				{
				$arResult[$index]["ACTIVE"] = true;
				break;
				}
			else
				$nextIndex++;
			}
	if($arParams["MAX_LEVEL"] > 1 && $itemInfo["DEPTH_LEVEL"] >= $arParams["MAX_LEVEL"])
		while(count($arResult[$nextIndex]) && $arResult[$nextIndex]["DEPTH_LEVEL"] > $arParams["MAX_LEVEL"])
			{
			if($arResult[$nextIndex]["SELECTED"])
				{
				$arResult[$index]["SELECTED"] = true;
				break;
				}
			else
				$nextIndex++;
			}
	}
/* -------------------------------------------------------------------- */
/* ----------------------------- max level ---------------------------- */
/* -------------------------------------------------------------------- */
if($arParams["MAX_LEVEL"] > 1)
	foreach($arResult as $index => $itemInfo)
		if($itemInfo["DEPTH_LEVEL"] > $arParams["MAX_LEVEL"])
			unset($arResult[$index]);
$arResult = array_values($arResult);