<?
require $_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php";

$APPLICATION->SetTitle("Каталог товаров");
/* -------------------------------------------------------------------- */
/* ---------------------------- constants ----------------------------- */
/* -------------------------------------------------------------------- */
$iblockType = "catalog_products";
/* -------------------------------------------------------------------- */
/* --------------------------- iblock info ---------------------------- */
/* -------------------------------------------------------------------- */
$iblockCode = explode("/", str_replace("index.php", "", $_SERVER["SCRIPT_URL"]))[2];
$iblockInfo = $iblockCode
	? CIBlock::GetList
		(
		[],
			[
			"TYPE"              => $iblockType,
			"CODE"              => $iblockCode,
			"ACTIVE"            => "Y",
			"CHECK_PERMISSIONS" => "Y"
			]
		)->GetNext()
	: [];
/* -------------------------------------------------------------------- */
/* ----------------------- iblock url templates ----------------------- */
/* -------------------------------------------------------------------- */
if(count($iblockInfo))
	foreach(["LIST_PAGE_URL", "SECTION_PAGE_URL", "DETAIL_PAGE_URL"] as $index)
		$iblockInfo[$index] = str_replace
			(
			["#IBLOCK_ID#",     "#IBLOCK_CODE#",     "#SITE_DIR#"],
			[$iblockInfo["ID"], $iblockInfo["CODE"], ""],
			$iblockInfo[$index]
			);

$iblockListPage    = $iblockInfo["LIST_PAGE_URL"];
$iblockSectionPage = str_replace($iblockListPage, "", $iblockInfo["SECTION_PAGE_URL"]);
$iblockElementPage = str_replace($iblockListPage, "", $iblockInfo["DETAIL_PAGE_URL"]);
/* -------------------------------------------------------------------- */
/* ------------------------------- menu ------------------------------- */
/* -------------------------------------------------------------------- */
if(!count($iblockInfo))
	$APPLICATION->IncludeComponent
		(
		"bitrix:menu", "av-tablet",
			array(
			"ROOT_MENU_TYPE"     => "left",
			"MAX_LEVEL"          => 1,
			"CHILD_MENU_TYPE"    => "",
			"USE_EXT"            => "Y",
			"DELAY"              => "N",
			"ALLOW_MULTI_SELECT" => "Y",

			"MENU_CACHE_TYPE"       => "A",
			"MENU_CACHE_TIME"       => 360000,
			"MENU_CACHE_USE_GROUPS" => "Y"
			)
		);
/* -------------------------------------------------------------------- */
/* ----------------------------- catalog ------------------------------ */
/* -------------------------------------------------------------------- */
else
	{
	$APPLICATION->AddChainItem($iblockInfo["NAME"], $iblockInfo["LIST_PAGE_URL"]);
	$APPLICATION->IncludeComponent
		(
		"bitrix:catalog", "av",
			array(
			"IBLOCK_TYPE"               => $iblockType,
			"IBLOCK_ID"                 => $iblockInfo["ID"],
			"HIDE_NOT_AVAILABLE"        => "Y",
			"HIDE_NOT_AVAILABLE_OFFERS" => "Y",

			"SEF_MODE"          => "Y",
			"SEF_FOLDER"        => $iblockListPage,
			"SEF_URL_TEMPLATES" =>
				array(
				"sections"     => "",
				"section"      => $iblockSectionPage,
				"element"      => $iblockElementPage,
				"compare"      => "",
				"smart_filter" => $iblockSectionPage."filter/#SMART_FILTER_PATH#/apply/"
				),

			"CACHE_TYPE"   => "A",
			"CACHE_TIME"   => 36000000,
			"CACHE_FILTER" => "Y",
			"CACHE_GROUPS" => "Y",

			"USE_FILTER"  => "Y",
			"FILTER_NAME" => "",

			"PRICE_CODE"        => array("BASE"),
			"PRICE_VAT_INCLUDE" => "Y",
			"CONVERT_CURRENCY"  => "Y",
			"CURRENCY_ID"       => "UAH",

			"ELEMENT_SORT_FIELD"     => "sort",
			"ELEMENT_SORT_ORDER"     => "asc",
			"ELEMENT_SORT_FIELD2"    => "id",
			"ELEMENT_SORT_ORDER2"    => "desc",
			"INCLUDE_SUBSECTIONS"    => "Y",
			"LIST_OFFERS_FIELD_CODE" => array("NAME", "PREVIEW_PICTURE"),
			"PAGE_SIZE_VALUES"       => array(15, 30, 45),

			"DETAIL_SET_CANONICAL_URL"     => "N",
			"DETAIL_OFFERS_FIELD_CODE"     => array("ID", "NAME"),
			"DETAIL_PICTURES_ALT"          => "more_photo",
			"ASK_FORM_ID"                  => 52,
			"ASK_FORM_LINK_FIELD_ID"       => "form_text_334",
			"ASK_FORM_COUNT_FIELD_ID"      => "form_text_335",
			"ASK_FORM_NAME_FIELD_ID"       => "form_text_419",
			"ASK_FORM_USER_NAME_FIELD_ID"  => "form_text_329",
			"ASK_FORM_USER_PHONE_FIELD_ID" => "form_text_332",
			"ASK_FORM_USER_EMAIL_FIELD_ID" => "form_email_333",

			"OFFERS_SORT_FIELD"  => "sort",
			"OFFERS_SORT_ORDER"  => "asc",
			"OFFERS_SORT_FIELD2" => "name",
			"OFFERS_SORT_ORDER2" => "asc",

			"PAGER_TEMPLATE"       => "av",
			"DISPLAY_TOP_PAGER"    => "N",
			"DISPLAY_BOTTOM_PAGER" => "Y",

			"SET_STATUS_404" => "Y",
			"SHOW_404"       => "",
			"MESSAGE_404"    => "",
			"FILE_404"       => "",

			"USE_MAIN_ELEMENT_SECTION"    => "Y",
			"DETAIL_STRICT_SECTION_CHECK" => "Y",
			"SET_TITLE"                   => "Y",
			"ADD_SECTIONS_CHAIN"          => "Y",
			"ADD_ELEMENT_CHAIN"           => "Y",
			"USE_ELEMENT_COUNTER"         => "Y"
			)
		);
	}

require $_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php";