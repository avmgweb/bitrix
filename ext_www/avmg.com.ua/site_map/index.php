<?
require $_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php";

$APPLICATION->SetTitle("Карта сайту");

$APPLICATION->IncludeComponent
	(
	"bitrix:main.map", "av",
		array(
		"LEVEL"               => 2,
		"IBLOCK_SECTION_MENU" =>
			array(
				array(
				"url"           => "/metallobaza/",
				"iblock_id"     => 134,
				"path_template" => "/metallobaza/#SECTION_CODE#/"
				)
			)
		)
	);

require $_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php";