<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

foreach($arResult as $index => $itemInfo)
	$arResult[$index]["DEPTH_LEVEL"] = intval($itemInfo["PARAMS"]["DEPTH_LEVEL"] ? $itemInfo["PARAMS"]["DEPTH_LEVEL"] : $itemInfo["DEPTH_LEVEL"]);

foreach($arResult as $index => $itemInfo)
	{
	$nextIndex = $index + 1;

	if($itemInfo["DEPTH_LEVEL"] == 1)
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

	if($itemInfo["DEPTH_LEVEL"] == 2)
		while(count($arResult[$nextIndex]) && $arResult[$nextIndex]["DEPTH_LEVEL"] > 2)
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

$arResult = array_values($arResult);