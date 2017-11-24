<?
require $_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php";

$APPLICATION->SetTitle("Новости");
$APPLICATION->SetPageProperty("title",       "Новости и события компании АВ металл групп | ™ ru.avmg.com.ua");
$APPLICATION->SetPageProperty("description", "Новости АВ металл групп ™ ✓Выгодная партнерская программа ✓Широкая региональная сеть ✓Доставка по Украине");

$APPLICATION->IncludeComponent
	(
	"bitrix:news", "av",
		array(
		"IBLOCK_TYPE" => "news",
		"IBLOCK_ID"   => 50,
		"NEWS_COUNT"  => 5,

		"USE_RATING" => "Y",
		"MAX_VOTE"   => 5,
		"VOTE_NAMES" => array(1, 2, 3, 4, 5),

		"USE_CATEGORIES"                  => "Y",
		"CATEGORY_IBLOCK"                 => array(50),
		"CATEGORY_CODE"                   => "",
		"CATEGORY_ITEMS_COUNT"            => 3,
		"SAME_ARTICLES_SEARCH_IN_SECTION" => "Y",

		"USE_FILTER"              => "Y",
		"FILTER_NAME"             => "",
		"FILTER_FIELD_CODE"       => array("NAME", "SECTION_ID"),
		"FILTER_PROPERTY_CODE"    => array(),
		"FILTER_TEMPLATE"         => "av",
		"FILTER_FIELDS_SORT"      => array("SECTION_ID", "NAME"),
		"FILTER_FIELDS_TEMPLATES" => array("SECTION_ID" => "av-alt"),

		"SORT_BY1"    => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2"    => "",
		"SORT_ORDER2" => "",
		"CHECK_DATES" => "Y",

		"SEF_MODE"          => "Y",
		"SEF_FOLDER"        => "/about/blog/",
		"SEF_URL_TEMPLATES" =>
			array(
			"detail" => "#ELEMENT_CODE#/",
			"filter" => "filter/#FILTER_PARAMS#/apply/"
			),

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
		"DATA_MARKUP_TYPE"            => "BLOG",

		"LIST_FIELD_CODE"           => array("PREVIEW_TEXT", "DATE_CREATE"),
		"LIST_PROPERTY_CODE"        => array(),
		"LIST_TEMPLATE"             => "av-blog",
		"MARKUP_TYPE"               => "STANDART",
		"SHOW_INCLUDE_AREA_PAGE"    => "N",
		"SHOW_INCLUDE_AREA_SECTION" => "N",
		"SHOW_LEFT_MENU"            => "N",
		"SHOW_LIST_DESCRIPTION"     => "N",

		"DETAIL_SET_CANONICAL_URL"            => "N",
		"DETAIL_FIELD_CODE"                   => array("DETAIL_TEXT","DATE_ACTIVE_FROM"),
		"DETAIL_PROPERTY_CODE"                => array(),
		"DETAIL_TEMPLATE"                     => "av_blog",
		"DETAIL_PAGE_ADDITIONAL_LINKS"        => array(),
		"DETAIL_PAGE_ADDITIONAL_LINKS_TITLES" => array(),
		"DETAIL_PAGE_WEBFORM_ID"              => "",
		"DETAIL_PAGE_WEBFORM_TEMPLATE"        => "",

		"PAGER_TEMPLATE"       => "av",
		"DISPLAY_TOP_PAGER"    => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",

		"SET_STATUS_404" => "Y",
		"SHOW_404"       => "Y",
		"MESSAGE_404"    => "",
		"FILE_404"       => ""
		)
	);

require $_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php";