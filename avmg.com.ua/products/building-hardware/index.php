<?
require $_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php";

$APPLICATION->SetTitle("Будівельні кріплення");
$APPLICATION->SetPageProperty("title",       "Кріплення ► купити будівельне кріплення в Україні: Дніпро, Київ, Харків, Львів, Одеса, опт, роздріб | Напрямок АВ метал груп ™ avmg.com.ua");
$APPLICATION->SetPageProperty("description", "Будівельні кріплення асортимент і ціни ▻ АВ метал груп ™ ✓Шірокій вибір ✓Металлобази і доставка по всій Україні ☎ (056) 790-01-22");

$APPLICATION->IncludeComponent
	(
	"bitrix:news", "av",
		array(
		"IBLOCK_TYPE" => "catalog_ua",
		"IBLOCK_ID"   => 132,
		"NEWS_COUNT"  => 50,

		"USE_RATING" => "N",
		"MAX_VOTE"   => "",
		"VOTE_NAMES" => array(),

		"USE_CATEGORIES"                  => "N",
		"CATEGORY_IBLOCK"                 => array(),
		"CATEGORY_CODE"                   => "",
		"CATEGORY_ITEMS_COUNT"            => "",
		"SAME_ARTICLES_SEARCH_IN_SECTION" => "",

		"USE_FILTER"           => "N",
		"FILTER_NAME"          => "",
		"FILTER_FIELD_CODE"    => array(),
		"FILTER_PROPERTY_CODE" => array(),
		"FILTER_TEMPLATE"      => "",

		"SORT_BY1"    => "SORT",
		"SORT_ORDER1" => "ASC",
		"SORT_BY2"    => "ID",
		"SORT_ORDER2" => "ASC",
		"CHECK_DATES" => "Y",

		"SEF_MODE"          => "Y",
		"SEF_FOLDER"        => "/products/building-hardware/",
		"SEF_URL_TEMPLATES" => array("detail" => "#ELEMENT_CODE#/"),

		"CACHE_TYPE"   => "A",
		"CACHE_TIME"   => 360000,
		"CACHE_FILTER" => "Y",
		"CACHE_GROUPS" => "Y",

		"SET_TITLE"                   => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN"   => "N",
		"ADD_SECTIONS_CHAIN"          => "N",
		"ADD_ELEMENT_CHAIN"           => "Y",
		"DETAIL_STRICT_SECTION_CHECK" => "N",
		"ADD_SUBSECTIONS_CHAIN"       => "N",

		"PARENT_SECTION"            => 2329,
		"LIST_FIELD_CODE"           => array("NAME","PREVIEW_TEXT","PREVIEW_PICTURE"),
		"LIST_PROPERTY_CODE"        => array(),
		"LIST_TEMPLATE"             => "av",
		"LIST_MARKUP_TYPE"          => "SMALLER",
		"MARKUP_TYPE"               => "STANDART",
		"SHOW_INCLUDE_AREA_PAGE"    => "Y",
		"SHOW_INCLUDE_AREA_SECTION" => "Y",
		"SHOW_LEFT_MENU"            => "Y",
		"LEFT_MENU_TEMPLATE"        => "av-vertical",
		"SHOW_LIST_DESCRIPTION"     => "N",

		"DETAIL_SET_CANONICAL_URL"            => "N",
		"DETAIL_FIELD_CODE"                   => array("NAME","DETAIL_TEXT","DETAIL_PICTURE"),
		"DETAIL_PROPERTY_CODE"                => array("LINKSHOP"),
		"DETAIL_TEMPLATE"                     => "av_products",
		"DETAIL_PAGE_ADDITIONAL_LINKS"        => array("/metallobaza/"),
		"DETAIL_PAGE_ADDITIONAL_LINKS_TITLES" => array("Металобази у вашому місті"),
		"DETAIL_PAGE_WEBFORM_ID"              => 43,
		"DETAIL_PAGE_WEBFORM_TEMPLATE"        => "av",

		"PAGER_TEMPLATE"       => "",
		"DISPLAY_TOP_PAGER"    => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",

		"SET_STATUS_404" => "Y",
		"SHOW_404"       => "Y",
		"MESSAGE_404"    => "",
		"FILE_404"       => ""
		)
	);

require $_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php";