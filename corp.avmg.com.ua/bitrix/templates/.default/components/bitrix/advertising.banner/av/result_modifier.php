<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$arResult["BANNERS_INFO"] = [];
$bannersDomObject         = new DOMXPath(DOMDocument::loadHTML(mb_convert_encoding($arResult["BANNER"], 'HTML-ENTITIES', "UTF-8")));

if($bannersDomObject)
	foreach($bannersDomObject->query('//*[contains(@class,"bx-slider-preset-1")]') as $domElementObject)
		{
		$bannerInfo = [];
		$link       = false;
		$image      = $domElementObject->getElementsByTagName("img")->item(0);
		$title      = false;
		$preview    = false;
		$button     = false;

		foreach($domElementObject->getElementsByTagName("a") as $elementObject)
			{
			$classesArray = explode(' ', $elementObject->GetAttribute("class"));
			if(in_array("bx-advertisingbanner-btn", $classesArray)) $button = $elementObject;
			else                                                    $link   = $elementObject;
			}
		foreach($domElementObject->getElementsByTagName("div") as $elementObject)
			{
			$classesArray = explode(' ', $elementObject->GetAttribute("class"));
			    if(in_array("bx-advertisingbanner-text-title", $classesArray)) $title   = $elementObject;
			elseif(in_array("bx-advertisingbanner-text-block", $classesArray)) $preview = $elementObject;
			}

		if($link)
			$bannerInfo["LINK"] =
				[
				"TITLE"  => $link->GetAttribute("title"),
				"LINK"   => $link->GetAttribute("href"),
				"TARGET" => $link->GetAttribute("target")
				];
		if($image)
			$bannerInfo["IMAGE"] =
				[
				"LINK"  => $image->GetAttribute("src"),
				"ALT"   => $image->GetAttribute("alt"),
				"TITLE" => $image->GetAttribute("title")
				];
		if($title)
			$bannerInfo["TITLE"] =
				[
				"TEXT"  => trim($title->nodeValue),
				"STYLE"  => $title->GetAttribute("style")
				];
		if($preview)
			$bannerInfo["PREVIEW"] =
				[
				"TEXT"  => trim($preview->nodeValue),
				"STYLE"  => $preview->GetAttribute("style")
				];
		if($button)
			$bannerInfo["BUTTON"] =
				[
				"TEXT"   => trim($button->nodeValue),
				"TITLE"  => $button->GetAttribute("title"),
				"LINK"   => $button->GetAttribute("href"),
				"TARGET" => $button->GetAttribute("target"),
				"STYLE"  => $button->GetAttribute("style")
				];

		if(count($bannerInfo))
			$arResult["BANNERS_INFO"][] = $bannerInfo;
		}