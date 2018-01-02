<?
require $_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php";
$APPLICATION->SetTitle("АВ Грузоперевозки");

$APPLICATION->IncludeComponent
	(
	"av_cargo_traffic_light:lists.export.excel", "",
		array(
		"IBLOCK_TYPE_ID" => 'av_cargo_traffic_light',
		"IBLOCK_ID"      => 153,
		"LIST_URL"       => '/cargo_traffic/'
		)
	);

require $_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php";