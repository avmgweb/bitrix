<?
require $_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php";

$APPLICATION->SetTitle("Подписки");

$APPLICATION->IncludeComponent
	(
	"bitrix:sale.personal.subscribe", "",
		array(
		"SEF_MODE"          => "Y",
		"SEF_FOLDER"        => "/personal/subscribe/",
		"SEF_URL_TEMPLATES" => array
			(
			"list"   => '',
			"cancel" => "cancel/#ID#/"
			),

		"PER_PAGE"  => 10,
		"SET_TITLE" => "N"
		)
	);

require $_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php";