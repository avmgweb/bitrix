<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$APPLICATION->IncludeComponent
	(
	"bitrix:search.title", "av_mobile",
		array(
		"INPUT_ID"             => "title-search-input-mobile",
		"CONTAINER_ID"         => "title-search-mobile",
		"PREVIEW_TRUNCATE_LEN" => 150,
		"PAGE"                 => "#SITE_DIR#search/",

		"NUM_CATEGORIES"     => 3,
		"TOP_COUNT"          => 5,
		"ORDER"              => "date",
		"USE_LANGUAGE_GUESS" => "Y",
		"CHECK_DATES"        => "Y",
		"SHOW_OTHERS"        => "N",

		"CATEGORY_0_TITLE"           => "Основне",
		"CATEGORY_0"                 => array("main", "iblock_news", "iblock_services"),
		"CATEGORY_0_iblock_news"     => array(50),
		"CATEGORY_0_iblock_services" => array(59),

		"CATEGORY_1_TITLE"             => "Продукція",
		"CATEGORY_1"                   => array("iblock_catalog", "iblock_references"),
		"CATEGORY_1_iblock_catalog"    => array("all"),
		"CATEGORY_1_iblock_references" => array("all"),

		"CATEGORY_2_TITLE"              => "Металобази",
		"CATEGORY_2"                    => array("iblock_av_storages"),
		"CATEGORY_2_iblock_av_storages" => array("all")
		)
	);