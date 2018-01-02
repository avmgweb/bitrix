<?
require $_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php";

$APPLICATION->SetTitle("Послуги компанії");
$APPLICATION->SetPageProperty("title",       "Продаж, різка та доставка металу АВ метал груп | 🏠 Україна, м Дніпро, вул. Шолом-Алейхема, 5, ☎ (056) 790-01-22 | ™ avmg.com.ua");
$APPLICATION->SetPageProperty("description", "Різка і доставка металу ► АВ метал груп ™ ✓Современное обладнання ✓Оптімальние ціни ✓Кваліфіцірованние фахівці ☎ (056) 790-01-22 Телефонуйте!");

$APPLICATION->IncludeComponent("av:visit_site.menu.tablet", "", array("MENU_TYPE" => "left"));

require $_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php";