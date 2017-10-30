<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

foreach($arResult as $index => $itemInfo)
	if($itemInfo["PARAMS"]["DEPTH_LEVEL"])
		$arResult[$index]["DEPTH_LEVEL"] = $itemInfo["PARAMS"]["DEPTH_LEVEL"];