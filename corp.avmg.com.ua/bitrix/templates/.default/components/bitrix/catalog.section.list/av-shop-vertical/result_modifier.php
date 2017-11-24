<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$arResult["IBLOCK_NAME"] = "";
if($arParams["IBLOCK_ID"])
	{
	$queryList = CIBlock::GetList([], ["ID" => $arParams["IBLOCK_ID"]]);
	while($queryElement = $queryList->GetNext()) $arResult["IBLOCK_NAME"] = $queryElement["NAME"];
	}

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