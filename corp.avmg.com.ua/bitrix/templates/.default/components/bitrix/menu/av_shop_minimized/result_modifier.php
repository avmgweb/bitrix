<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

foreach($arResult as $index => $itemInfo)
	{
	$nextIndex   = $index + 1;
	$sectionLink = $itemInfo["PARAMS"]["SECTION_LINK"] == 'Y'             ? true : false;
	$hasSubMenu  = $arResult[$nextIndex]["PARAMS"]["SECTION_LINK"] == 'Y' ? true : false;

	if($itemInfo["DEPTH_LEVEL"] == 1 && !$sectionLink && $hasSubMenu)
		while($arResult[$nextIndex]["PARAMS"]["SECTION_LINK"] == 'Y')
			{
			if($arResult[$nextIndex]["SELECTED"])
				{
				$arResult[$index]["SELECTED"] = true;
				break;
				}
			else
				$nextIndex++;
			}

	$arResult[$index]["PARENT"] = $hasSubMenu;
	if($sectionLink) $arResult[$index]["DEPTH_LEVEL"] = 2;
	}