<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$APPLICATION->IncludeComponent
	(
	"bitrix:search.title", "av_mobile",
		array(
		"INPUT_ID"             => 'title-search-input-mobile',
		"CONTAINER_ID"         => 'title-search-mobile',
		"PREVIEW_TRUNCATE_LEN" => 150,
		"PAGE"                 => '#SITE_DIR#search/',

		"NUM_CATEGORIES"     => 3,
		"TOP_COUNT"          => 5,
		"ORDER"              => 'date',
		"USE_LANGUAGE_GUESS" => 'Y',
		"CHECK_DATES"        => 'Y',
		"SHOW_OTHERS"        => 'N',

		"CATEGORY_0_TITLE" => 'Основное',
		"CATEGORY_0"       => array("main"),

		"CATEGORY_1_TITLE"                   => 'Каталог',
		"CATEGORY_1"                         => array("catalog_products"),
		"CATEGORY_1_iblock_catalog_products" => array(139, 141, 143, 145, 147, 149)
		)
	);