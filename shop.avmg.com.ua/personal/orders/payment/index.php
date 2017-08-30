<?
require $_SERVER["DOCUMENT_ROOT"].'/bitrix/header.php';

$APPLICATION->SetTitle("Платежные системы");

$APPLICATION->IncludeComponent
	(
	"bitrix:sale.order.payment", "",
		array(

		)
	);

require $_SERVER["DOCUMENT_ROOT"].'/bitrix/footer.php';