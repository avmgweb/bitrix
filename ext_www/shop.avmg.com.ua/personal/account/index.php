<?
require $_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php";

$APPLICATION->SetTitle("Личный счёт");

$APPLICATION->IncludeComponent
	(
	"bitrix:sale.personal.account", "av",
		array(
		"SET_TITLE" => "N"
		)
	);

require $_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php";