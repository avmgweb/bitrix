<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/* --------------------------------------------------------------------- */
/* ------------------------------- params ------------------------------ */
/* --------------------------------------------------------------------- */
$arResult["REQUIRED"] = $arParams["REQUIRED"] == "Y" ? true : false;
$arResult["DISABLED"] = $arParams["DISABLED"] == "Y" ? true : false;

$arResult["NAME"]          = $arParams["NAME"];
$arResult["NAME_DELETE"]   = $arParams["NAME_DELETE"];
$arResult["VALUE"]         = (int)$arParams["VALUE"];
$arResult["TITLE"]         = html_entity_decode($arParams["TITLE"]);
$arResult["UPLOADED_FILE"] = [];

if($arResult["VALUE"])
	{
	$fileInfo = CFile::GetByID($arResult["VALUE"])->GetNext();
	if($fileInfo["FILE_NAME"])
		$arResult["UPLOADED_FILE"] =
			[
			"LINK" => "/upload/".$fileInfo["SUBDIR"]."/".$fileInfo["FILE_NAME"],
			"NAME" => $fileInfo["ORIGINAL_NAME"]
			];
	}

$arResult["ATTR"] = $arParams["ATTR"];
if(is_array($arResult["ATTR"]))
	{
	$attrArray = [];
	foreach($arResult["ATTR"] as $index => $value)
		$attrArray[] = $index."=\"".str_replace("\"", "'", $value)."\"";
	$arResult["ATTR"] = implode(" ", $attrArray);
	}
/* --------------------------------------------------------------------- */
/* ------------------------------- output ------------------------------ */
/* --------------------------------------------------------------------- */
$this->IncludeComponentTemplate();