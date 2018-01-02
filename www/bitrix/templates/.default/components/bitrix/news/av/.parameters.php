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
/* ------------------------ old params refactor ----------------------- */
/* -------------------------------------------------------------------- */
$arTemplateParameters["USE_SEARCH"]                      = ["HIDDEN" => "Y"];
$arTemplateParameters["USE_RSS"]                         = ["HIDDEN" => "Y"];
$arTemplateParameters["USE_REVIEW"]                      = ["HIDDEN" => "Y"];
$arTemplateParameters["AJAX_MODE"]                       = ["HIDDEN" => "Y"];
$arTemplateParameters["SET_LAST_MODIFIED"]               = ["HIDDEN" => "Y"];
$arTemplateParameters["USE_PERMISSIONS"]                 = ["HIDDEN" => "Y"];
$arTemplateParameters["DISPLAY_AS_RATING"]               = ["HIDDEN" => "Y"];
$arTemplateParameters["PREVIEW_TRUNCATE_LEN"]            = ["HIDDEN" => "Y"];
$arTemplateParameters["LIST_ACTIVE_DATE_FORMAT"]         = ["HIDDEN" => "Y"];
$arTemplateParameters["HIDE_LINK_WHEN_NO_DETAIL"]        = ["HIDDEN" => "Y"];
$arTemplateParameters["DISPLAY_NAME"]                    = ["HIDDEN" => "Y"];
$arTemplateParameters["META_KEYWORDS"]                   = ["HIDDEN" => "Y"];
$arTemplateParameters["META_DESCRIPTION"]                = ["HIDDEN" => "Y"];
$arTemplateParameters["BROWSER_TITLE"]                   = ["HIDDEN" => "Y"];
$arTemplateParameters["DETAIL_ACTIVE_DATE_FORMAT"]       = ["HIDDEN" => "Y"];
$arTemplateParameters["DETAIL_DISPLAY_TOP_PAGER"]        = ["HIDDEN" => "Y"];
$arTemplateParameters["DETAIL_DISPLAY_BOTTOM_PAGER"]     = ["HIDDEN" => "Y"];
$arTemplateParameters["DETAIL_PAGER_TITLE"]              = ["HIDDEN" => "Y"];
$arTemplateParameters["DETAIL_PAGER_TEMPLATE"]           = ["HIDDEN" => "Y"];
$arTemplateParameters["DETAIL_PAGER_SHOW_ALL"]           = ["HIDDEN" => "Y"];
$arTemplateParameters["PAGER_TITLE"]                     = ["HIDDEN" => "Y"];
$arTemplateParameters["PAGER_SHOW_ALWAYS"]               = ["HIDDEN" => "Y"];
$arTemplateParameters["PAGER_DESC_NUMBERING"]            = ["HIDDEN" => "Y"];
$arTemplateParameters["PAGER_DESC_NUMBERING_CACHE_TIME"] = ["HIDDEN" => "Y"];
$arTemplateParameters["PAGER_SHOW_ALL"]                  = ["HIDDEN" => "Y"];
$arTemplateParameters["PAGER_BASE_LINK_ENABLE"]          = ["HIDDEN" => "Y"];
/* -------------------------------------------------------------------- */
/* ------------------------ same articles params ---------------------- */
/* -------------------------------------------------------------------- */
if($arCurrentValues["USE_CATEGORIES"] == "Y")
	$arTemplateParameters["SAME_ARTICLES_SEARCH_IN_SECTION"] =
		[
		"NAME"   => Loc::getMessage("AV_NEWS_PARAMS_SAME_ARTICLES_SEARCH_IN_SECTION"),
		"TYPE"   => "CHECKBOX",
		"PARENT" => "CATEGORY_SETTINGS"
		];
/* -------------------------------------------------------------------- */
/* -------------------------- filter params --------------------------- */
/* -------------------------------------------------------------------- */
if($arCurrentValues["USE_FILTER"] == "Y")
	{
	$arTemplateParameters["FILTER_TEMPLATE"] =
		[
		"NAME"    => Loc::getMessage("AV_NEWS_PARAMS_FILTER_TEMPLATE"),
		"TYPE"    => "STRING",
		"REFRESH" => "Y",
		"PARENT"  => "FILTER_SETTINGS"
		];
	if($arCurrentValues["FILTER_TEMPLATE"] == "av")
		{
		$arTemplateParameters["FILTER_FIELDS_SORT"] =
			[
			"NAME"     => Loc::getMessage("AV_NEWS_PARAMS_FILTER_FIELD_SORT"),
			"TYPE"     => "STRING",
			"MULTIPLE" => "Y",
			"PARENT"   => "FILTER_SETTINGS"
			];
		$arTemplateParameters["FILTER_MARKUP_TYPE"] =
			[
			"NAME"   => Loc::getMessage("AV_NEWS_PARAMS_FILTER_MARKUP_TYPE"),
			"TYPE"   => "LIST",
			"VALUES" =>
				[
				"STANDART"    => Loc::getMessage("AV_NEWS_PARAMS_FILTER_MARKUP_TYPE_STANDART"),
				"TWO_COLUMNS" => Loc::getMessage("AV_NEWS_PARAMS_FILTER_MARKUP_TYPE_TWO_COLUMNS")
				],
			"PARENT" => "FILTER_SETTINGS"
			];
		if(in_array("SUBSECTION", $arCurrentValues["FILTER_FIELD_CODE"]))
			$arTemplateParameters["FILTER_SUBSECTION_TITLE"] =
				[
				"NAME"   => Loc::getMessage("AV_NEWS_PARAMS_FILTER_SUBSECTION_TITLE"),
				"TYPE"   => "STRING",
				"PARENT" => "FILTER_SETTINGS"
				];
		}
	}
/* -------------------------------------------------------------------- */
/* ---------------------------- list params --------------------------- */
/* -------------------------------------------------------------------- */
$arTemplateParameters["LIST_TEMPLATE"] =
	[
	"NAME"    => Loc::getMessage("AV_NEWS_PARAMS_LIST_TEMPLATE"),
	"TYPE"    => "STRING",
	"REFRESH" => "Y",
	"PARENT"  => "LIST_SETTINGS"
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
			],
		"PARENT" => "LIST_SETTINGS"
		];
$arTemplateParameters["MARKUP_TYPE"] =
	[
	"NAME"    => Loc::getMessage("AV_NEWS_PARAMS_MARKUP_TYPE"),
	"TYPE"    => "LIST",
	"VALUES"  => $markupType,
	"REFRESH" => "Y",
	"PARENT"  => "LIST_SETTINGS"
	];
if($currentMarkupType == "TWO_COLUMNS")
	{
	$arTemplateParameters["MARKUP_TYPE_FIRST_COLUMN_TITLE"] =
		[
		"NAME"   => Loc::getMessage("AV_NEWS_PARAMS_MARKUP_TYPE_FIRST_COLUMN_TITLE"),
		"TYPE"   => "STRING",
		"PARENT" => "LIST_SETTINGS"
		];
	$arTemplateParameters["MARKUP_TYPE_SECOND_COLUMN_TITLE"] =
		[
		"NAME"   => Loc::getMessage("AV_NEWS_PARAMS_MARKUP_TYPE_SECOND_COLUMN_TITLE"),
		"TYPE"   => "STRING",
		"PARENT" => "LIST_SETTINGS"
		];
	}
$arTemplateParameters["SHOW_INCLUDE_AREA_PAGE"] =
	[
	"NAME"   => Loc::getMessage("AV_NEWS_PARAMS_SHOW_INCLUDE_AREA_PAGE"),
	"TYPE"   => "CHECKBOX",
	"PARENT" => "LIST_SETTINGS"
	];
$arTemplateParameters["SHOW_INCLUDE_AREA_SECTION"] =
	[
	"NAME"   => Loc::getMessage("AV_NEWS_PARAMS_SHOW_INCLUDE_AREA_SECTION"),
	"TYPE"   => "CHECKBOX",
	"PARENT" => "LIST_SETTINGS"
	];
if($currentMarkupType == "STANDART")
	$arTemplateParameters["SHOW_LEFT_MENU"] =
		[
		"NAME"    => Loc::getMessage("AV_NEWS_PARAMS_SHOW_LEFT_MENU"),
		"TYPE"    => "CHECKBOX",
		"REFRESH" => "Y",
		"PARENT"  => "LIST_SETTINGS"
		];
if($arCurrentValues["SHOW_LEFT_MENU"] == "Y")
	$arTemplateParameters["LEFT_MENU_TEMPLATE"] =
		[
		"NAME"   => Loc::getMessage("AV_NEWS_PARAMS_LEFT_MENU_TEMPLATE"),
		"TYPE"   => "STRING",
		"PARENT" => "LIST_SETTINGS"
		];
$arTemplateParameters["SHOW_LIST_DESCRIPTION"] =
	[
	"NAME"   => Loc::getMessage("AV_NEWS_PARAMS_SHOW_LIST_DESCRIPTION"),
	"TYPE"   => "CHECKBOX",
	"PARENT" => "LIST_SETTINGS"
	];
/* -------------------------------------------------------------------- */
/* --------------------------- detail params -------------------------- */
/* -------------------------------------------------------------------- */
$arTemplateParameters["DETAIL_TEMPLATE"] =
	[
	"NAME"    => Loc::getMessage("AV_NEWS_PARAMS_DETAIL_TEMPLATE"),
	"TYPE"    => "STRING",
	"REFRESH" => "Y",
	"PARENT"  => "DETAIL_SETTINGS"
	];
if(in_array($arCurrentValues["DETAIL_TEMPLATE"], ["av", "av_career"]))
	{
	$arTemplateParameters["DETAIL_PAGE_ADDITIONAL_LINKS"] =
		[
		"NAME"     => Loc::getMessage("AV_NEWS_PARAMS_DETAIL_PAGE_ADDITIONAL_LINKS"),
		"TYPE"     => "STRING",
		"MULTIPLE" => "Y",
		"PARENT"   => "DETAIL_SETTINGS"
		];
	$arTemplateParameters["DETAIL_PAGE_ADDITIONAL_LINKS_TITLES"] =
		[
		"NAME"     => Loc::getMessage("AV_NEWS_PARAMS_DETAIL_PAGE_ADDITIONAL_LINKS_TITLES"),
		"TYPE"     => "STRING",
		"MULTIPLE" => "Y",
		"PARENT"   => "DETAIL_SETTINGS"
		];
	$arTemplateParameters["DETAIL_PAGE_WEBFORM_ID"] =
		[
		"NAME"   => Loc::getMessage("AV_NEWS_PARAMS_DETAIL_PAGE_WEBFORM_ID"),
		"TYPE"   => "STRING",
		"PARENT" => "DETAIL_SETTINGS"
		];
	$arTemplateParameters["DETAIL_PAGE_WEBFORM_TEMPLATE"] =
		[
		"NAME"   => Loc::getMessage("AV_NEWS_PARAMS_DETAIL_PAGE_WEBFORM_TEMPLATE"),
		"TYPE"   => "STRING",
		"PARENT" => "DETAIL_SETTINGS"
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
/* -------------------------------------------------------------------- */
/* ------------------------------ other ------------------------------- */
/* -------------------------------------------------------------------- */
$arTemplateParameters["ADD_SUBSECTIONS_CHAIN"] =
	[
	"NAME" => Loc::getMessage("AV_NEWS_PARAMS_ADD_SUBSECTIONS_CHAIN"),
	"TYPE" => "CHECKBOX"
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