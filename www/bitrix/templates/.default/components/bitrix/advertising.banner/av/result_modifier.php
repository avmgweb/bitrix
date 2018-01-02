<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$arResult["BANNERS_INFO"] = [];
$bannersHtml              = mb_convert_encoding($arResult["BANNER"], "HTML-ENTITIES", "UTF-8");
$bannersDomObject         = $bannersHtml           ? DOMDocument::loadHTML($bannersHtml)                                           : false;
$bannersDomXPathObject    = $bannersDomObject      ? new DOMXPath($bannersDomObject)                                               : false;
$bannersQuery             = $bannersDomXPathObject ? $bannersDomXPathObject->query("//*[contains(@class,\"bx-slider-preset-1\")]") : false;

if($bannersQuery)
	foreach($bannersQuery as $domElementObject)
		{
		$bannerInfo = [];
		$link       = false;
		$image      = $domElementObject->getElementsByTagName("img")   ->item(0);
		$video      = $domElementObject->getElementsByTagName("iframe")->item(0);
		$title      = false;
		$preview    = false;
		$button     = false;

		foreach($domElementObject->getElementsByTagName("a") as $elementObject)
			{
			$classesArray = explode(" ", $elementObject->GetAttribute("class"));
			if(in_array("bx-advertisingbanner-btn", $classesArray)) $button = $elementObject;
			else                                                    $link   = $elementObject;
			}
		foreach($domElementObject->getElementsByTagName("div") as $elementObject)
			{
			$classesArray = explode(" ", $elementObject->GetAttribute("class"));
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
		if($video)
			{
			$link           = $video->GetAttribute("src");
			$youtubeVideoId = 0;

			if(stripos($link, "youtube"))
				{
				$link           = explode("?", $link)[0];
				$linkExplode    = explode("/", $link);
				$youtubeVideoId = $linkExplode[count($linkExplode) - 1];

				$params         =
					[
					"enablejsapi"    => 1,
					"autohide"       => 1,
					"controls"       => 0,
					"disablekb"      => 1,
					"fs"             => 0,
					"iv_load_policy" => 3,
					"version"        => 3,
					"modestbranding" => 1,
					"rel"            => 0,
					"showinfo"       => 0
					];

				$paramsString = [];
				foreach($params as $index => $value) $paramsString[] = $index."=".$value;
				$link = "https://www.youtube.com/embed/".$youtubeVideoId."?".implode("&", $paramsString);
				}

			$bannerInfo["VIDEO"] =
				[
				"LINK"             => $link,
				"YOUTUBE_VIDEO_ID" => $youtubeVideoId
				];
			}
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