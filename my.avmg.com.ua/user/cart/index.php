<?
require $_SERVER["DOCUMENT_ROOT"].'/bitrix/header.php';

$APPLICATION->SetTitle("Корзина");

$APPLICATION->IncludeComponent
	(
	"bitrix:sale.basket.basket", "",
		array(

		)
	);

require $_SERVER["DOCUMENT_ROOT"].'/bitrix/footer.php';