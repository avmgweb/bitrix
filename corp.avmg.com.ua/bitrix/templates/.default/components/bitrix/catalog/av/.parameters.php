<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$iblockPropsArray = [];
if($arCurrentValues["IBLOCK_ID"])
	{
	$queryList = CIBlockProperty::GetList(["SORT" => 'asc'], ["IBLOCK_ID" => $arCurrentValues["IBLOCK_ID"], "ACTIVE" => 'Y', "PROPERTY_TYPE" => 'F']);
	while($queryInfo = $queryList->GetNext()) $iblockPropsArray[$queryInfo["ID"]] = $queryInfo["NAME"];
	}

if(count($iblockPropsArray))
	$arTemplateParameters["DETAIL_PICTURES_ALT"] =
		[
		"NAME"     => GetMessage("AV_CATALOG_PARAMS_DETAIL_PICTURES_ALT"),
		"TYPE"     => "LIST",
		"VALUES"   => $iblockPropsArray,
		"SIZE"     => 5,
		"MULTIPLE" => 'Y'
		];

$arTemplateParameters["ASK_FORM_ID"] =
	[
	"NAME" => GetMessage("AV_CATALOG_PARAMS_ASK_FORM_ID"),
	"TYPE" => "STRING"
	];
$arTemplateParameters["ASK_FORM_LINK_FIELD_ID"] =
	[
	"NAME" => GetMessage("AV_CATALOG_PARAMS_ASK_FORM_LINK_FIELD_ID"),
	"TYPE" => "STRING"
	];
$arTemplateParameters["ASK_FORM_COUNT_FIELD_ID"] =
	[
	"NAME" => GetMessage("AV_CATALOG_PARAMS_ASK_FORM_COUNT_FIELD_ID"),
	"TYPE" => "STRING"
	];