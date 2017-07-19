<?
require $_SERVER["DOCUMENT_ROOT"].'/bitrix/header.php';
$APPLICATION->SetTitle("АВ Грузоперевозки");

$APPLICATION->IncludeComponent
	(
	"av_cargo_traffic_light:lists.element.edit", "",
		array(
		"IBLOCK_TYPE_ID"   => 'av_cargo_traffic_light',
		"IBLOCK_ID"        => 153,
		"ELEMENT_ID"       => $_REQUEST["element_id"],
		"LIST_URL"         => '/cargo_traffic/',
		"LIST_ELEMENT_URL" => '/cargo_traffic/element_edit.php?element_id=#element_id#',
		"CACHE_TYPE"       => 'A',
		"CACHE_TIME"       => 360000
		)
	);

require $_SERVER["DOCUMENT_ROOT"].'/bitrix/footer.php';