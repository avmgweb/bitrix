<?
use
	\Bitrix\Iblock\Component\Tools,
	\Bitrix\Iblock\InheritedProperty\SectionValues;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$arParams["MARKUP_TYPE"] = in_array($arParams["MARKUP_TYPE"], ["STANDART", "TWO_COLUMNS"]) ? $arParams["MARKUP_TYPE"] : 'STANDART';

$arResult["FILTER_HTML"]             = "";
$arResult["MENU_HTML"]               = "";
$arResult["LIST_HTML"]               = "";
$arResult["SHARING_HTML"]            = "";
$arResult["CATEGORY_APPLIED_FILTER"] = [];
$arResult["LIST_DESCRIPTION"]        = "";
/* -------------------------------------------------------------------- */
/* ---------------------------- variables ----------------------------- */
/* -------------------------------------------------------------------- */
$pageType     = "list";
$urlVariables = $arResult["VARIABLES"];
$urlTemplates = $arResult["URL_TEMPLATES"];
$pageVarName  = "PAGEN_1";
$listPage     = 1;

    if($urlVariables["ELEMENT_ID"] || $urlVariables["ELEMENT_CODE"]) $pageType = "detail";
elseif($urlVariables["SECTION_ID"] || $urlVariables["SECTION_CODE"]) $pageType = "section";

    if($urlVariables["PARENT_SECTION_ID"] || $urlVariables["PARENT_SECTION_CODE"]) $pageVarName = "PAGEN_3";
elseif($urlVariables["SECTION_ID"]        || $urlVariables["SECTION_CODE"])        $pageVarName = "PAGEN_2";
$listPage = $_GET[$pageVarName] ? $_GET[$pageVarName] : 1;

$elementInfo = $urlVariables["ELEMENT_ID"] || $urlVariables["ELEMENT_CODE"]
	? CIBlockElement::GetList
		(
		[],
			[
			"IBLOCK_ID" => $arParams["IBLOCK_ID"],
			"ID"        => $urlVariables["ELEMENT_ID"],
			"CODE"      => $urlVariables["ELEMENT_CODE"]
			],
		false, false,
		["ID", "CODE", "NAME", "IBLOCK_SECTION_ID"]
		)->GetNext()
	: [];
$sectionInfo = $urlVariables["SECTION_ID"] || $urlVariables["SECTION_CODE"]
	? CIBlockSection::GetList
		(
		[],
			[
			"IBLOCK_ID" => $arParams["IBLOCK_ID"],
			"ID"        => $urlVariables["SECTION_ID"],
			"CODE"      => $urlVariables["SECTION_CODE"]
			],
		false, false,
		["ID", "CODE", "NAME", "DESCRIPTION", "DEPTH_LEVEL"]
		)->GetNext()
	: [];
$parentSectionInfo = $urlVariables["PARENT_SECTION_ID"] || $urlVariables["PARENT_SECTION_CODE"]
	? CIBlockSection::GetList
		(
		[],
			[
			"IBLOCK_ID" => $arParams["IBLOCK_ID"],
			"ID"        => $urlVariables["PARENT_SECTION_ID"],
			"CODE"      => $urlVariables["PARENT_SECTION_CODE"]
			],
		false, false,
		["ID", "CODE", "NAME", "DESCRIPTION", "DEPTH_LEVEL"]
		)->GetNext()
	: [];
/* -------------------------------------------------------------------- */
/* ---------------------------- 404 error ----------------------------- */
/* -------------------------------------------------------------------- */
if
	(
	$urlTemplates["subsection"]
	&&
		(
		$elementInfo === false || $sectionInfo === false || $parentSectionInfo === false
		||
		(!count($parentSectionInfo) && $sectionInfo["DEPTH_LEVEL"] > 1)
		||
		$parentSectionInfo["DEPTH_LEVEL"] > 1
		)
	)
	Tools::process404
		(
		"",
		$arParams["SET_STATUS_404"] == "Y",
		$arParams["SET_STATUS_404"] == "Y",
		$arParams["SHOW_404"] == "Y",
		$arParams["FILE_404"]
		);
/* -------------------------------------------------------------------- */
/* --------------------------- filter html ---------------------------- */
/* -------------------------------------------------------------------- */
if($pageType != "detail" && $arParams["USE_FILTER"] == "Y")
	{
	$emptyFilterUrl   = $urlTemplates["news"];
	$appliedFilterUrl = $urlTemplates["filter"];

	if(count($parentSectionInfo))
		{
		$emptyFilterUrl   = str_replace(["#PARENT_SECTION_ID#", "#PARENT_SECTION_CODE#", "#SECTION_ID#", "#SECTION_CODE#"], [$parentSectionInfo["ID"], $parentSectionInfo["CODE"], $sectionInfo["ID"], $sectionInfo["CODE"]], $urlTemplates["subsection"]);
		$appliedFilterUrl = str_replace(["#PARENT_SECTION_ID#", "#PARENT_SECTION_CODE#", "#SECTION_ID#", "#SECTION_CODE#"], [$parentSectionInfo["ID"], $parentSectionInfo["CODE"], $sectionInfo["ID"], $sectionInfo["CODE"]], $urlTemplates["subsection_filter"]);
		}
	elseif(count($sectionInfo))
		{
		$emptyFilterUrl   = str_replace(["#SECTION_ID#", "#SECTION_CODE#"], [$sectionInfo["ID"], $sectionInfo["CODE"]], $urlTemplates["section"]);
		$appliedFilterUrl = str_replace(["#SECTION_ID#", "#SECTION_CODE#"], [$sectionInfo["ID"], $sectionInfo["CODE"]], $urlTemplates["section_filter"]);
		}

	ob_start();
	$APPLICATION->IncludeComponent
		(
		"bitrix:catalog.filter", $arParams["FILTER_TEMPLATE"],
			[
			"IBLOCK_TYPE"   => $arParams["IBLOCK_TYPE"],
			"IBLOCK_ID"     => $arParams["IBLOCK_ID"],
			"FILTER_NAME"   => $arParams["FILTER_NAME"],
			"FIELD_CODE"    => $arParams["FILTER_FIELD_CODE"],
			"PROPERTY_CODE" => $arParams["FILTER_PROPERTY_CODE"],

			"CACHE_TYPE"   => $arParams["CACHE_TYPE"],
			"CACHE_TIME"   => $arParams["CACHE_TIME"],
			"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],

			"SAVE_IN_SESSION"   => "N",
			"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],

			"SECTION_ID"          => $sectionInfo["ID"],
			"SECTION_CODE"        => $sectionInfo["CODE"],
			"PARENT_SECTION_ID"   => $parentSectionInfo["ID"]   ? $parentSectionInfo["ID"]   : "",
			"PARENT_SECTION_CODE" => $parentSectionInfo["CODE"] ? $parentSectionInfo["CODE"] : "",

			"MARKUP_TYPE"        => $arParams["FILTER_MARKUP_TYPE"],
			"FIELDS_SORT"        => $arParams["FILTER_FIELDS_SORT"],
			"LIST_URL"           => $arResult["FOLDER"].$urlTemplates["news"],
			"EMPTY_FILTER_URL"   => $arResult["FOLDER"].$emptyFilterUrl,
			"APPLIED_FILTER_URL" => $appliedFilterUrl           ? $arResult["FOLDER"].$appliedFilterUrl           : "",
			"SECTION_URL"        => $urlTemplates["section"]    ? $arResult["FOLDER"].$urlTemplates["section"]    : "",
			"SUBSECTION_URL"     => $urlTemplates["subsection"] ? $arResult["FOLDER"].$urlTemplates["subsection"] : "",
			"FILTER_URL_PARAMS"  => $urlVariables["FILTER_PARAMS"],
			"SUBSECTION_TITLE"   => $arParams["FILTER_SUBSECTION_TITLE"],
			"FIELDS_CHANGE_TYPE" => $arParams["FILTER_FIELDS_CHANGE_TYPE"],
			"FIELDS_TEMPLATES"   => $arParams["FILTER_FIELDS_TEMPLATES"]
			],
		false, ["HIDE_ICONS" => 'Y']
		);
	$arResult["FILTER_HTML"] = ob_get_contents();
	ob_end_clean();
	}
/* -------------------------------------------------------------------- */
/* ---------------------------- menu html ----------------------------- */
/* -------------------------------------------------------------------- */
if($pageType != "detail" && $arParams["SHOW_LEFT_MENU"] == "Y")
	{
	ob_start();
		$APPLICATION->IncludeComponent
			(
			"bitrix:menu", $arParams["LEFT_MENU_TEMPLATE"],
				array(
				"ROOT_MENU_TYPE"     => "left",
				"MAX_LEVEL"          => "",
				"CHILD_MENU_TYPE"    => "left",
				"USE_EXT"            => "Y",
				"DELAY"              => "N",
				"ALLOW_MULTI_SELECT" => "N",

				"MENU_CACHE_TYPE"       => "A",
				"MENU_CACHE_TIME"       => 360000,
				"MENU_CACHE_USE_GROUPS" => "Y"
				)
			);
	$arResult["MENU_HTML"] = ob_get_contents();
	ob_end_clean();
	}
/* -------------------------------------------------------------------- */
/* ---------------------------- list html ----------------------------- */
/* -------------------------------------------------------------------- */
if($pageType != 'detail')
	{
	ob_start();
	$APPLICATION->IncludeComponent
		(
		"bitrix:news.list", $arParams["LIST_TEMPLATE"],
			[
			"AJAX_MODE"           => $arParams["AJAX_MODE"],
			"AJAX_OPTION_JUMP"    => $arParams["AJAX_OPTION_JUMP"],
			"AJAX_OPTION_STYLE"   => $arParams["AJAX_OPTION_STYLE"],
			"AJAX_OPTION_HISTORY" => $arParams["AJAX_OPTION_HISTORY"],

			"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
			"IBLOCK_ID"   => $arParams["IBLOCK_ID"],
			"NEWS_COUNT"  => $arParams["NEWS_COUNT"],

			"SORT_BY1"    => $arParams["SORT_BY1"],
			"SORT_ORDER1" => $arParams["SORT_ORDER1"],
			"SORT_BY2"    => $arParams["SORT_BY2"],
			"SORT_ORDER2" => $arParams["SORT_ORDER2"],

			"FILTER_NAME"   => $arParams["FILTER_NAME"],
			"FIELD_CODE"    => $arParams["LIST_FIELD_CODE"],
			"PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
			"CHECK_DATES"   => $arParams["CHECK_DATES"],

			"DETAIL_URL"         => $arResult["FOLDER"].$urlTemplates["detail"],
			"IBLOCK_URL"         => $arResult["FOLDER"].$urlTemplates["news"],
			"SECTION_URL"        => $urlTemplates["section"]        ? $arResult["FOLDER"].$urlTemplates["section"]        : "",
			"FILTER_SECTION_URL" => $urlTemplates["section_filter"] ? $arResult["FOLDER"].$urlTemplates["section_filter"] : "",

			"PREVIEW_TRUNCATE_LEN"      => $arParams["PREVIEW_TRUNCATE_LEN"],
			"ACTIVE_DATE_FORMAT"        => $arParams["LIST_ACTIVE_DATE_FORMAT"],
			"SET_TITLE"                 => $arParams["SET_TITLE"],
			"SET_BROWSER_TITLE"         => 'Y',
			"SET_META_KEYWORDS"         => 'Y',
			"SET_META_DESCRIPTION"      => 'Y',
			"SET_LAST_MODIFIED"         => $arParams["SET_LAST_MODIFIED"],
			"INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
			"ADD_SECTIONS_CHAIN"        => $arParams["ADD_SECTIONS_CHAIN"],
			"HIDE_LINK_WHEN_NO_DETAIL"  => $arParams["HIDE_LINK_WHEN_NO_DETAIL"],
			"PARENT_SECTION"            => $sectionInfo["ID"]   ? $sectionInfo["ID"]   : $arParams["PARENT_SECTION"],
			"PARENT_SECTION_CODE"       => $sectionInfo["CODE"] ? $sectionInfo["CODE"] : $arParams["PARENT_SECTION_CODE"],
			"INCLUDE_SUBSECTIONS"       => 'Y',
			"DISPLAY_DATE"              => $arParams["DISPLAY_DATE"],
			"DISPLAY_NAME"              => $arParams["DISPLAY_NAME"],
			"DISPLAY_PICTURE"           => $arParams["DISPLAY_PICTURE"],
			"DISPLAY_PREVIEW_TEXT"      => $arParams["DISPLAY_PREVIEW_TEXT"],

			"PAGER_TEMPLATE"                  => $arParams["PAGER_TEMPLATE"],
			"DISPLAY_TOP_PAGER"               => $arParams["DISPLAY_TOP_PAGER"],
			"DISPLAY_BOTTOM_PAGER"            => $arParams["DISPLAY_BOTTOM_PAGER"],
			"PAGER_TITLE"                     => $arParams["PAGER_TITLE"],
			"PAGER_SHOW_ALWAYS"               => $arParams["PAGER_SHOW_ALWAYS"],
			"PAGER_DESC_NUMBERING"            => $arParams["PAGER_DESC_NUMBERING"],
			"PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
			"PAGER_SHOW_ALL"                  => $arParams["PAGER_SHOW_ALL"],
			"PAGER_BASE_LINK_ENABLE"          => $arParams["PAGER_BASE_LINK_ENABLE"],
			"PAGER_BASE_LINK"                 => $arParams["PAGER_BASE_LINK"],
			"PAGER_PARAMS_NAME"               => $arParams["PAGER_PARAMS_NAME"],

			"SET_STATUS_404" => $arParams["SET_STATUS_404"],
			"SHOW_404"       => $arParams["SHOW_404"],
			"MESSAGE_404"    => $arParams["MESSAGE_404"],
			"FILE_404"       => $arParams["FILE_404"],

			"CACHE_TYPE"   => $arParams["CACHE_TYPE"],
			"CACHE_TIME"   => $arParams["CACHE_TIME"],
			"CACHE_FILTER" => $arParams["CACHE_FILTER"],
			"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],

			"USE_RATING" => $arParams["USE_RATING"],
			"MAX_VOTE"   => $arParams["MAX_VOTE"],
			"VOTE_NAMES" => $arParams["VOTE_NAMES"],

			"MARKUP_TYPE"       => $arParams["LIST_MARKUP_TYPE"],
			"DATA_MARKUP_TYPE"  => $arParams["DATA_MARKUP_TYPE"],
			"FILTER_URL_PARAMS" => $urlVariables["FILTER_PARAMS"],
			"FULL_PARAMS"       => $arParams
			],
		false, ["HIDE_ICONS" => 'Y']
		);
	$arResult["LIST_HTML"] = ob_get_contents();
	ob_end_clean();
	}
/* -------------------------------------------------------------------- */
/* --------------------------- sharing html --------------------------- */
/* -------------------------------------------------------------------- */
if($pageType != "detail" && $arParams["USE_SHARE"] == "Y")
	{
	ob_start();
	$APPLICATION->IncludeComponent
		(
		"bitrix:main.share", $arParams["SHARE_TEMPLATE"],
			[
			"HANDLERS"   => $arParams["SHARE_HANDLERS"],
			"PAGE_TITLE" => $APPLICATION->GetTitle(),
			"PAGE_URL"   => CURRENT_PROTOCOL.'://'.SITE_SERVER_NAME.str_replace('index.php', "", $_SERVER["SCRIPT_URL"])
			],
		false, ["HIDE_ICONS" => 'Y']
		);
	$arResult["SHARING_HTML"] = ob_get_contents();
	ob_end_clean();
	}
/* -------------------------------------------------------------------- */
/* ----------------------- same articles filter ----------------------- */
/* -------------------------------------------------------------------- */
if($pageType == 'detail' && $arParams["USE_CATEGORIES"] == 'Y')
	foreach($arParams["CATEGORY_IBLOCK"] as $iblockId)
		{
		$filterArray = [];

		if($arParams["CATEGORY_CODE"])
			{
			$queryList = CIBlockElement::GetProperty($iblockId, $elementInfo["ID"], ["SORT" => 'asc'], ["ACTIVE" => 'Y', "CODE" => $arParams["CATEGORY_CODE"]]);
			while($queryInfo = $queryList->Fetch()) $filterArray['PROPERTY_'.$arParams["CATEGORY_CODE"]] = $queryInfo["VALUE"];
			}
		if($arParams["SAME_ARTICLES_SEARCH_IN_SECTION"] == 'Y') $filterArray["SECTION_ID"] = $elementInfo["IBLOCK_SECTION_ID"];
		if(count($arParams["CATEGORY_ADDITIONAL_FILTER"]))      $filterArray = array_merge($filterArray, $arParams["CATEGORY_ADDITIONAL_FILTER"]);

		if(!count($filterArray)) return;
		$GLOBALS['AV_NEWS_SAME_ARTICLES_FILTER_'.$iblockId] = array_merge($filterArray, ["!ID" => $elementInfo["ID"], "ACTIVE" => 'Y', "ACTIVE_DATE" => 'Y']);
		$arResult["CATEGORY_APPLIED_FILTER"][$iblockId] = 'AV_NEWS_SAME_ARTICLES_FILTER_'.$iblockId;
		}
/* -------------------------------------------------------------------- */
/* ------------------------- list/section info ------------------------ */
/* -------------------------------------------------------------------- */
if($arParams["SHOW_LIST_DESCRIPTION"] == "Y")
	{
	if($pageType == "list" && ($arParams["MARKUP_TYPE"] == "TWO_COLUMNS" || $listPage == 1))
		$arResult["LIST_DESCRIPTION"] = CIBlock::GetArrayByID($arParams["IBLOCK_ID"])["DESCRIPTION"];
	elseif(in_array($pageType, ["section", "subsection"]) && $listPage == 1)
		{
		$sectionSeoInfo = (new SectionValues($arParams["IBLOCK_ID"], $sectionInfo["ID"]))->getValues();
		$APPLICATION->SetTitle($sectionSeoInfo["SECTION_PAGE_TITLE"]);
		$arResult["LIST_DESCRIPTION"] = CIBlockSection::GetList([], ["ID" => $sectionInfo["ID"]], false, ["ID", "DESCRIPTION"])->GetNext()["DESCRIPTION"];
		}
	}
/* -------------------------------------------------------------------- */
/* ------------------------- navigation chain ------------------------- */
/* -------------------------------------------------------------------- */
if($arParams["ADD_SUBSECTIONS_CHAIN"] == "Y" && $arParams["ADD_SECTIONS_CHAIN"] != "Y")
	{
	if(count($sectionInfo) || count($parentSectionInfo))
		$APPLICATION->SetTitle($sectionInfo["NAME"]);

	if(count($parentSectionInfo))
		$APPLICATION->AddChainItem
			(
			$parentSectionInfo["NAME"],
			str_replace
				(
				["#SECTION_ID#", "#SECTION_CODE#"],
				[$parentSectionInfo["ID"], $parentSectionInfo["CODE"]],
				$arResult["FOLDER"].$urlTemplates["section"]
				)
			);
	if(count($sectionInfo))
		$APPLICATION->AddChainItem
			(
			$sectionInfo["NAME"],
			str_replace
				(
				["#PARENT_SECTION_ID#",    "#PARENT_SECTION_CODE#",    "#SECTION_ID#",     "#SECTION_CODE#"],
				[$parentSectionInfo["ID"], $parentSectionInfo["CODE"], $sectionInfo["ID"], $sectionInfo["CODE"]],
				$arResult["FOLDER"].$urlTemplates["subsection"]
				)
			);
	}