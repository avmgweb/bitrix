<?
require $_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php";
$APPLICATION->SetTitle("АВ Грузоперевозки");

$APPLICATION->IncludeComponent
	(
	"av_cargo_traffic_light:lists.fields", "",
		array(
		"IBLOCK_TYPE_ID"      => 'av_cargo_traffic_light',
		"IBLOCK_ID"           => 153,
		"LIST_URL"            => '/cargo_traffic/',
		"LIST_EDIT_URL"       => '/cargo_traffic/list_edit.php',
		"LIST_FIELDS_URL"     => '/cargo_traffic/list_fields.php',
		"LIST_FIELD_EDIT_URL" => '/cargo_traffic/list_field_edit.php?field_id=#field_id#',
		"CACHE_TYPE"          => 'A',
		"CACHE_TIME"          => 360000
		)
	);

require $_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php";