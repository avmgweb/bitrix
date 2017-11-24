<?
require $_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php";

$APPLICATION->SetTitle("Карта сайта");

$APPLICATION->IncludeComponent
	(
	"bitrix:main.map", "av",
		array(
		"LEVEL" => 3
		)
	);

require $_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php";