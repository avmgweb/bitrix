<?
require $_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php";
$APPLICATION->SetTitle("АВ Грузоперевозки");

$APPLICATION->IncludeComponent
	(
	"av_cargo_traffic_light:lists.list", "",
		array(
		"IBLOCK_TYPE_ID"   => 'av_cargo_traffic_light',
		"IBLOCK_ID"        => 153,
		"LIST_URL"         => '/cargo_traffic/',
		"LIST_EDIT_URL"    => '/cargo_traffic/list_edit.php',
		"LIST_ELEMENT_URL" => '/cargo_traffic/element_edit.php?element_id=#element_id#',
		"EXPORT_EXCEL_URL" => '/cargo_traffic/excel.php',
		"CACHE_TYPE"       => 'A',
		"CACHE_TIME"       => 360000
		)
	);

require $_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php";