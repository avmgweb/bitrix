<?
use \av\image_processing\watermarks\WatermarkAdding;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

foreach($arResult as $index => $itemInfo)
	if
		(
		array_key_exists("PARAMS", $itemInfo)
		&&
		is_array($itemInfo["PARAMS"])
		&&
		array_key_exists("TITLE_BACKGROUND_ICON", $itemInfo["PARAMS"])
		&&
		is_string($itemInfo["PARAMS"]["TITLE_BACKGROUND_ICON"])
		)
		{
		$imageProcessedUrl = "";

		try                         {$imageProcessedUrl = (new WatermarkAdding($itemInfo["PARAMS"]["TITLE_BACKGROUND_ICON"]))->getImageProcessedUrl();}
		catch(Exception $exception) {}

		if(strlen($imageProcessedUrl) > 0)
			$arResult[$index]["PARAMS"]["TITLE_BACKGROUND_ICON"] = $imageProcessedUrl;
		}