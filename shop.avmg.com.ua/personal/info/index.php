<?
define("NEED_AUTH", true);
require $_SERVER["DOCUMENT_ROOT"].'/bitrix/header.php';

$APPLICATION->SetTitle("Личные данные");

$APPLICATION->IncludeComponent
	(
	"bitrix:main.profile", "av-profile",
		array(
		"USER_PROPERTY_NAME" => '',

		"SET_TITLE"     => 'N',
		"USER_PROPERTY" => array(),
		"SEND_INFO"     => 'N',
		"CHECK_RIGHTS"  => 'Y',

		"AJAX_MODE"              => 'N',
		"AJAX_OPTION_JUMP"       => '',
		"AJAX_OPTION_STYLE"      => '',
		"AJAX_OPTION_HISTORY"    => '',
		"AJAX_OPTION_ADDITIONAL" => ''
		)
	);

require $_SERVER["DOCUMENT_ROOT"].'/bitrix/footer.php';