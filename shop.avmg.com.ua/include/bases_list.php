<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$APPLICATION->IncludeComponent
	(
	"bitrix:catalog.section.list", "av-shop-minimized",
		array(
		"IBLOCK_TYPE" => "av_storages",
		"IBLOCK_ID"   => 58,

		"SECTION_URL" => "https://ru.avmg.com.ua/metallobaza/#CODE#/",

		"CACHE_TYPE"   => "A",
		"CACHE_TIME"   => 360000,
		"CACHE_GROUPS" => "Y",

		"ADD_SECTIONS_CHAIN" => "N"
		)
	);