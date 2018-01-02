<?
require $_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php";

$APPLICATION->SetTitle("Наше виробництво");
$APPLICATION->SetPageProperty("title",       "Виробництво компанії АВ метал груп | 🏠 Україна, м Дніпро, вул. Шолом-Алейхема, 5, ☎ (056) 790-01-22 | ™ avmg.com.ua");
$APPLICATION->SetPageProperty("description", "АВ метал груп ™ ✓ Національний виробник ✓ Сучасне обладнання ✓ Низькі ціни ☎ (056) 790-01-22 Телефонуйте!");

$APPLICATION->IncludeComponent("av:visit_site.menu.tablet", "", array("MENU_TYPE" => "left"));

require $_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php";