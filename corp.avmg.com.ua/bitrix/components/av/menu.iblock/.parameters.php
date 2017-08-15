<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if(!CModule::IncludeModule("iblock"))                           return;
/* -------------------------------------------------------------------- */
/* ---------------------------- variables ----------------------------- */
/* -------------------------------------------------------------------- */
$iblockArray                  = [];
$iblockUserFieldsArray        = [];
$iblockSectionUserFieldsArray = [];

if($arCurrentValues["IBLOCK_TYPE"])
	{
	$queryList = CIBlock::GetList(["sort" => 'ASC'], ["TYPE" => $arCurrentValues["IBLOCK_TYPE"], "ACTIVE" => 'Y']);
	while($queryInfo = $queryList->GetNext()) $iblockArray[$queryInfo["ID"]] = $queryInfo["NAME"];

	$queryList = CUserTypeEntity::GetList(["ID" => 'ASC'], ["ENTITY_ID" => 'ASD_IBLOCK']);
	while($queryInfo = $queryList->GetNext()) $iblockUserFieldsArray[$queryInfo["FIELD_NAME"]] = $queryInfo["FIELD_NAME"];
	}

$arCurrentValues["IBLOCK_ID"] = array_values(array_diff(is_array($arCurrentValues["IBLOCK_ID"]) ? $arCurrentValues["IBLOCK_ID"] : [$arCurrentValues["IBLOCK_ID"]], ['', 0]));
foreach($arCurrentValues["IBLOCK_ID"] as $iblockId)
	{
	$queryList = CUserTypeEntity::GetList(["ID" => 'ASC'], ["ENTITY_ID" => 'IBLOCK_'.$iblockId.'_SECTION']);
	while($queryInfo = $queryList->GetNext()) $iblockSectionUserFieldsArray[$queryInfo["FIELD_NAME"]] = $queryInfo["FIELD_NAME"];
	}
/* -------------------------------------------------------------------- */
/* ------------------------------ groups ------------------------------ */
/* -------------------------------------------------------------------- */
$arComponentParameters["GROUPS"] =
	[
	"MAIN"    => ["NAME" => GetMessage("AV_MENU_IBLOCK_PARAMS_GROUP_MAIN"),    "SORT" => 10],
	"SECTION" => ["NAME" => GetMessage("AV_MENU_IBLOCK_PARAMS_GROUP_SECTION"), "SORT" => 20]
	];
/* -------------------------------------------------------------------- */
/* --------------------------- main params ---------------------------- */
/* -------------------------------------------------------------------- */
$arComponentParameters["PARAMETERS"]["IBLOCK_TYPE"] =
	[
	"NAME"    => GetMessage("AV_MENU_IBLOCK_PARAMS_IBLOCK_TYPE"),
	"TYPE"    => 'LIST',
	"VALUES"  => CIBlockParameters::GetIBlockTypes(),
	"REFRESH" => 'Y',
	"PARENT"  => 'MAIN'
	];
if(count($iblockArray))
	$arComponentParameters["PARAMETERS"]["IBLOCK_ID"] =
		[
		"NAME"     => GetMessage("AV_MENU_IBLOCK_PARAMS_IBLOCK_ID"),
		"TYPE"     => 'LIST',
		"VALUES"   => $iblockArray,
		"SIZE"     => 5,
		"MULTIPLE" => 'Y',
		"REFRESH"  => 'Y',
		"PARENT"   => 'MAIN'
		];
if(count($iblockUserFieldsArray))
	$arComponentParameters["PARAMETERS"]["IBLOCK_PICTURE_FIELD"] =
		[
		"NAME"     => GetMessage("AV_MENU_IBLOCK_PARAMS_IBLOCK_PICTURE_FIELD"),
		"TYPE"     => 'LIST',
		"VALUES"   => $iblockUserFieldsArray,
		"PARENT"   => 'MAIN'
		];
/* -------------------------------------------------------------------- */
/* ------------------------- sections params -------------------------- */
/* -------------------------------------------------------------------- */
if(count($iblockArray))
	$arComponentParameters["PARAMETERS"]["SECTION_DEPTH"] =
		[
		"NAME"   => GetMessage("AV_MENU_IBLOCK_PARAMS_SECTION_DEPTH"),
		"TYPE"   => 'STRING',
		"PARENT" => 'SECTION'
		];
if(count($iblockSectionUserFieldsArray))
	$arComponentParameters["PARAMETERS"]["SECTION_PICTURE_FIELD"] =
		[
		"NAME"     => GetMessage("AV_MENU_IBLOCK_PARAMS_SECTION_PICTURE_FIELD"),
		"TYPE"     => 'LIST',
		"VALUES"   => $iblockSectionUserFieldsArray,
		"SIZE"     => 5,
		"MULTIPLE" => 'Y',
		"PARENT"   => 'SECTION'
		];
/* -------------------------------------------------------------------- */
/* ------------------------------- cache ------------------------------ */
/* -------------------------------------------------------------------- */
$arComponentParameters["PARAMETERS"]["CACHE_TIME"] =
	[
	"DEFAULT" => 36000000
	];