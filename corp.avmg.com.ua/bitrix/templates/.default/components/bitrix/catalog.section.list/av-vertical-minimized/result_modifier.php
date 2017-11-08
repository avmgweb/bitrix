<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$arParams["LINKS_MAX_COUNT"] = (int) $arParams["LINKS_MAX_COUNT"];

if($arParams["SECTION_CODE"] && !$arParams["SECTION_ID"])
	$arParams["SECTION_ID"] = CIBlockSection::GetList
		(
		[],
			[
			"IBLOCK_ID" => $arParams["IBLOCK_ID"],
			"CODE"      => $arParams["SECTION_CODE"]
			],
		false, ["ID"]
		)->GetNext()["ID"];

foreach($arResult["SECTIONS"] as $index => $sectionInfo)
	if($arParams["SECTION_ID"] != $sectionInfo["IBLOCK_SECTION_ID"])
		unset($arResult["SECTIONS"][$index]);
$arResult["SECTIONS"] = array_values($arResult["SECTIONS"]);