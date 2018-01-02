<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$APPLICATION->IncludeComponent
	(
	"bitrix:search.title", "av-shop",
		array(
		"INPUT_ID"             => "title-search-input",
		"CONTAINER_ID"         => "title-search",
		"PREVIEW_TRUNCATE_LEN" => 150,
		"PAGE"                 => "/search/",

		"NUM_CATEGORIES"     => 3,
		"TOP_COUNT"          => 5,
		"ORDER"              => "date",
		"USE_LANGUAGE_GUESS" => "Y",
		"CHECK_DATES"        => "Y",
		"SHOW_OTHERS"        => "N",

		"CATEGORY_0_TITLE" => "Основное",
		"CATEGORY_0"       => array("main"),

		"CATEGORY_1_TITLE"                   => "Продукция",
		"CATEGORY_1"                         => array("iblock_catalog_products"),
		"CATEGORY_1_iblock_catalog_products" => array("all")
		)
	);