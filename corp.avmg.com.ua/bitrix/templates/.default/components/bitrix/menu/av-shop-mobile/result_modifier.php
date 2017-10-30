<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$arParams["MAX_LEVEL"] = intval($arParams["MAX_LEVEL"] ? $arParams["MAX_LEVEL"] : 1);
/* -------------------------------------------------------------------- */
/* --------------------------- depth level ---------------------------- */
/* -------------------------------------------------------------------- */
foreach($arResult as $index => $itemInfo)
	$arResult[$index]["DEPTH_LEVEL"] = intval($itemInfo["PARAMS"]["DEPTH_LEVEL"] ? $itemInfo["PARAMS"]["DEPTH_LEVEL"] : $itemInfo["DEPTH_LEVEL"]);
/* -------------------------------------------------------------------- */
/* ----------------------- level blocks forming ----------------------- */
/* -------------------------------------------------------------------- */
$arResult["ITEMS"] = [];
$parentInfo        = [];

foreach($arResult as $index => $itemInfo)
	{
	$nextIndex               = $index + 1;
	$depthLevel              = $itemInfo["DEPTH_LEVEL"];
	$parentInfo[$depthLevel] = $itemInfo;
	if($depthLevel > 1 && ($itemInfo["PERMISSION"] == "D" || !$itemInfo["LINK"])) continue;

	while(count($arResult[$nextIndex]) && $arResult[$nextIndex]["DEPTH_LEVEL"] > $depthLevel)
		{
		$itemInfo["PARENT"] = true;
		if($arResult[$nextIndex]["SELECTED"])
			{
			$itemInfo["ACTIVE"] = true;
			break;
			}
		else
			$nextIndex++;
		}

	if($depthLevel == 1)                        $arResult["ITEMS"][1][] = $itemInfo;
	elseif(count($parentInfo[$depthLevel - 1])) $arResult["ITEMS"][$depthLevel][$parentInfo[$depthLevel - 1]["LINK"]][] = $itemInfo;
	}