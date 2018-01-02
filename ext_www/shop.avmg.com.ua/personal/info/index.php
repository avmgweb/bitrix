<?
define("NEED_AUTH", true);
require $_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php";

$APPLICATION->SetTitle("Личные данные");

$APPLICATION->IncludeComponent
	(
	"bitrix:main.profile", "av",
		array(
		"SET_TITLE"     => "Y",
		"USER_PROPERTY" => array(),
		"SEND_INFO"     => "N",
		"CHECK_RIGHTS"  => "N"
		)
	);

require $_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php";