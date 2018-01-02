<?
require $_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php";

$APPLICATION->SetTitle("Кар’єра");
$APPLICATION->SetPageProperty("title",       "АВ метал груп Вакансії | Робота в АВ метал груп: Дніпро, Київ, Львів, Харьків, Одеса, Запоріжжя, Полтава, Суми | ☎ (056) 794-55-24 ™ avmg.com.ua");
$APPLICATION->SetPageProperty("description", "Хочете працювати в АВ Метал Груп? Відкрита вакансія: Менеджер з продажу. Підсобний робітник. Завідувач складом.");

$APPLICATION->IncludeComponent
	(
	"bitrix:news", "av",
		array(
		"IBLOCK_TYPE" => "services",
		"IBLOCK_ID"   => 92,
		"NEWS_COUNT"  => 10,

		"USE_RATING" => "N",
		"MAX_VOTE"   => "",
		"VOTE_NAMES" => array(),

		"USE_CATEGORIES"                  => "Y",
		"CATEGORY_IBLOCK"                 => array(92),
		"CATEGORY_CODE"                   => "city",
		"CATEGORY_ITEMS_COUNT"            => 25,
		"SAME_ARTICLES_SEARCH_IN_SECTION" => "Y",
		"CATEGORY_ADDITIONAL_FILTER"      => ["!PROPERTY_type_vacancy" => 389],

		"USE_FILTER"           => "Y",
		"FILTER_NAME"          => "",
		"FILTER_FIELD_CODE"    => array("SECTION_ID"),
		"FILTER_PROPERTY_CODE" => array("city"),
		"FILTER_TEMPLATE"      => "av",
		"FILTER_FIELDS_SORT"   => array("SECTION_ID", "city"),
		"FILTER_MARKUP_TYPE"   => "TWO_COLUMNS",

		"SORT_BY1"    => "PROPERTY_type_vacancy",
		"SORT_ORDER1" => "ASC",
		"SORT_BY2"    => "SORT",
		"SORT_ORDER2" => "ASC",
		"CHECK_DATES" => "Y",

		"SEF_MODE"          => "Y",
		"SEF_FOLDER"        => "/career/",
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

		"LIST_FIELD_CODE"                 => array("NAME", "DATE_ACTIVE_FROM"),
		"LIST_PROPERTY_CODE"              => array("city", "type_vacancy"),
		"LIST_TEMPLATE"                   => "av_career",
		"MARKUP_TYPE"                     => "TWO_COLUMNS",
		"MARKUP_TYPE_FIRST_COLUMN_TITLE"  => "Відкриті вакансії",
		"MARKUP_TYPE_SECOND_COLUMN_TITLE" => "Кар’єрні можливості",
		"SHOW_INCLUDE_AREA_PAGE"          => "N",
		"SHOW_INCLUDE_AREA_SECTION"       => "N",
		"SHOW_LEFT_MENU"                  => "N",
		"SHOW_LIST_DESCRIPTION"           => "Y",

		"DETAIL_SET_CANONICAL_URL"            => "N",
		"DETAIL_FIELD_CODE"                   => array("DETAIL_TEXT", "DATE_ACTIVE_FROM"),
		"DETAIL_PROPERTY_CODE"                => array("type_job", "city", "type_vacancy"),
		"DETAIL_TEMPLATE"                     => "av_career",
		"DETAIL_PAGE_ADDITIONAL_LINKS"        => array(),
		"DETAIL_PAGE_ADDITIONAL_LINKS_TITLES" => array(),
		"DETAIL_PAGE_WEBFORM_ID"              => 19,
		"DETAIL_PAGE_WEBFORM_TEMPLATE"        => "av-career",

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