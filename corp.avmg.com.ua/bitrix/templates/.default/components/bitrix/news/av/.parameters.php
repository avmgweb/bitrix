<?
use \Bitrix\Main\Localization\Loc;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/* -------------------------------------------------------------------- */
/* ----------------------------- variables ---------------------------- */
/* -------------------------------------------------------------------- */
$markupType =
	[
	"STANDART"    => Loc::getMessage("AV_NEWS_PARAMS_MARKUP_TYPE_STANDART"),
	"TWO_COLUMNS" => Loc::getMessage("AV_NEWS_PARAMS_MARKUP_TYPE_TWO_COLUMNS")
	];
$currentMarkupType = $markupType[$arCurrentValues["MARKUP_TYPE"]] ? $arCurrentValues["MARKUP_TYPE"] : "STANDART";
/* -------------------------------------------------------------------- */
/* ------------------------------ markup ------------------------------ */
/* -------------------------------------------------------------------- */
$arTemplateParameters["MARKUP_TYPE"] =
	[
	"NAME"    => Loc::getMessage("AV_NEWS_PARAMS_MARKUP_TYPE"),
	"TYPE"    => "LIST",
	"VALUES"  => $markupType,
	"REFRESH" => "Y"
	];
if($currentMarkupType == "TWO_COLUMNS")
	{
	$arTemplateParameters["MARKUP_TYPE_FIRST_COLUMN_TITLE"] =
		[
		"NAME" => Loc::getMessage("AV_NEWS_PARAMS_MARKUP_TYPE_FIRST_COLUMN_TITLE"),
		"TYPE" => "STRING"
		];
	$arTemplateParameters["MARKUP_TYPE_SECOND_COLUMN_TITLE"] =
		[
		"NAME" => Loc::getMessage("AV_NEWS_PARAMS_MARKUP_TYPE_SECOND_COLUMN_TITLE"),
		"TYPE" => "STRING"
		];
	}
$arTemplateParameters["SHOW_INCLUDE_AREA_PAGE"] =
	[
	"NAME" => Loc::getMessage("AV_NEWS_PARAMS_SHOW_INCLUDE_AREA_PAGE"),
	"TYPE" => "CHECKBOX"
	];
$arTemplateParameters["SHOW_INCLUDE_AREA_SECTION"] =
	[
	"NAME" => Loc::getMessage("AV_NEWS_PARAMS_SHOW_INCLUDE_AREA_SECTION"),
	"TYPE" => "CHECKBOX"
	];
if($currentMarkupType == "STANDART")
	$arTemplateParameters["SHOW_LEFT_MENU"] =
		[
		"NAME"    => Loc::getMessage("AV_NEWS_PARAMS_SHOW_LEFT_MENU"),
		"TYPE"    => "CHECKBOX",
		"REFRESH" => "Y"
		];
if($arCurrentValues["SHOW_LEFT_MENU"] == "Y")
	$arTemplateParameters["LEFT_MENU_TEMPLATE"] =
		[
		"NAME" => Loc::getMessage("AV_NEWS_PARAMS_LEFT_MENU_TEMPLATE"),
		"TYPE" => "STRING"
		];
$arTemplateParameters["SHOW_LIST_DESCRIPTION"] =
	[
	"NAME" => Loc::getMessage("AV_NEWS_PARAMS_SHOW_LIST_DESCRIPTION"),
	"TYPE" => "CHECKBOX"
	];
/* -------------------------------------------------------------------- */
/* ------------------------------ filter ------------------------------ */
/* -------------------------------------------------------------------- */
$arTemplateParameters["FILTER_TEMPLATE"] =
	[
	"NAME"    => Loc::getMessage("AV_NEWS_PARAMS_FILTER_TEMPLATE"),
	"TYPE"    => "STRING",
	"REFRESH" => "Y"
	];
if($arCurrentValues["FILTER_TEMPLATE"] == "av")
	{
	$arTemplateParameters["FILTER_FIELDS_SORT"] =
		[
		"NAME"     => Loc::getMessage("AV_NEWS_PARAMS_FILTER_FIELD_SORT"),
		"TYPE"     => "STRING",
		"MULTIPLE" => "Y"
		];
	$arTemplateParameters["FILTER_MARKUP_TYPE"] =
		[
		"NAME"   => Loc::getMessage("AV_NEWS_PARAMS_FILTER_MARKUP_TYPE"),
		"TYPE"   => "LIST",
		"VALUES" =>
			[
			"STANDART"    => Loc::getMessage("AV_NEWS_PARAMS_FILTER_MARKUP_TYPE_STANDART"),
			"TWO_COLUMNS" => Loc::getMessage("AV_NEWS_PARAMS_FILTER_MARKUP_TYPE_TWO_COLUMNS")
			]
		];
	}
/* -------------------------------------------------------------------- */
/* ------------------------------ list -------------------------------- */
/* -------------------------------------------------------------------- */
$arTemplateParameters["LIST_TEMPLATE"] =
	[
	"NAME"    => Loc::getMessage("AV_NEWS_PARAMS_LIST_TEMPLATE"),
	"TYPE"    => "STRING",
	"REFRESH" => "Y"
	];
if($arCurrentValues["LIST_TEMPLATE"] == "av")
	$arTemplateParameters["LIST_MARKUP_TYPE"] =
		[
		"NAME"   => Loc::getMessage("AV_NEWS_PARAMS_LIST_MARKUP_TYPE"),
		"TYPE"   => "LIST",
		"VALUES" =>
			[
			"STANDART" => Loc::getMessage("AV_NEWS_PARAMS_LIST_MARKUP_TYPE_STANDART"),
			"SMALLER"  => Loc::getMessage("AV_NEWS_PARAMS_LIST_MARKUP_TYPE_SMALLER")
			]
		];
$arTemplateParameters["DATA_MARKUP_TYPE"] =
	[
	"NAME"   => Loc::getMessage("AV_NEWS_PARAMS_DATA_MARKUP_TYPE"),
	"TYPE"   => "LIST",
	"VALUES" =>
		[
		"NONE" => Loc::getMessage("AV_NEWS_PARAMS_DATA_MARKUP_TYPE_NONE"),
		"BLOG" => Loc::getMessage("AV_NEWS_PARAMS_DATA_MARKUP_TYPE_BLOG")
		]
	];
/* -------------------------------------------------------------------- */
/* ------------------------------ detail ------------------------------ */
/* -------------------------------------------------------------------- */
$arTemplateParameters["DETAIL_TEMPLATE"] =
	[
	"NAME"    => Loc::getMessage("AV_NEWS_PARAMS_DETAIL_TEMPLATE"),
	"TYPE"    => "STRING",
	"REFRESH" => "Y"
	];
$arTemplateParameters["SAME_ARTICLES_SEARCH_IN_SECTION"] =
	[
	"NAME" => Loc::getMessage("AV_NEWS_PARAMS_SAME_ARTICLES_SEARCH_IN_SECTION"),
	"TYPE" => "CHECKBOX"
	];
$arTemplateParameters["ADD_SUBSECTIONS_CHAIN"] =
	[
	"NAME" => Loc::getMessage("AV_NEWS_PARAMS_ADD_SUBSECTIONS_CHAIN"),
	"TYPE" => "CHECKBOX"
	];
$arTemplateParameters["FILTER_SUBSECTION_TITLE"] =
	[
	"NAME" => Loc::getMessage("AV_NEWS_PARAMS_FILTER_SUBSECTION_TITLE"),
	"TYPE" => "STRING"
	];
if(in_array($arCurrentValues["DETAIL_TEMPLATE"], ["av", "av_career"]))
	{
	$arTemplateParameters["DETAIL_PAGE_ADDITIONAL_LINKS"] =
		[
		"NAME"     => Loc::getMessage("AV_NEWS_PARAMS_DETAIL_PAGE_ADDITIONAL_LINKS"),
		"TYPE"     => "STRING",
		"MULTIPLE" => "Y"
		];
	$arTemplateParameters["DETAIL_PAGE_ADDITIONAL_LINKS_TITLES"] =
		[
		"NAME"     => Loc::getMessage("AV_NEWS_PARAMS_DETAIL_PAGE_ADDITIONAL_LINKS_TITLES"),
		"TYPE"     => "STRING",
		"MULTIPLE" => "Y"
		];
	$arTemplateParameters["DETAIL_PAGE_WEBFORM_ID"] =
		[
		"NAME" => Loc::getMessage("AV_NEWS_PARAMS_DETAIL_PAGE_WEBFORM_ID"),
		"TYPE" => "STRING"
		];
	$arTemplateParameters["DETAIL_PAGE_WEBFORM_TEMPLATE"] =
		[
		"NAME" => Loc::getMessage("AV_NEWS_PARAMS_DETAIL_PAGE_WEBFORM_TEMPLATE"),
		"TYPE" => "STRING"
		];
	}
/* -------------------------------------------------------------------- */
/* ------------------------------ bases ------------------------------- */
/* -------------------------------------------------------------------- */
if($arCurrentValues["LIST_TEMPLATE"] == "av_bases" || $arCurrentValues["DETAIL_TEMPLATE"] == "av_bases")
	{
	$iblockList = [];
	$queryList = CIBlock::GetList(["ID" => "ASC"], ["ACTIVE" => "Y"]);
	while($queryElement = $queryList->GetNext()) $iblockList[$queryElement["ID"]] = $queryElement["NAME"];

	$arTemplateParameters["AV_BASES_STREAMS_INFO_IBLOCK"] =
		[
		"NAME"   => Loc::getMessage("AV_NEWS_PARAMS_AV_BASES_STREAMS_INFO_IBLOCK"),
		"TYPE"   => "LIST",
		"VALUES" => $iblockList
		];
	}