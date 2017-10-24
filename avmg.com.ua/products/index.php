<?
require $_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php";

$APPLICATION->SetTitle("Основні напрямки");
$APPLICATION->SetPageProperty("title",       "Основні напрямки діяльності компанії АВ метал груп | 🏠 Україна: Дніпро, Київ, Харків, Львів, Одеса, ☎ (056) 790-01-22 | ™ avmg.com.ua");
$APPLICATION->SetPageProperty("description", "Продукція АВ метал груп ™ ✓ Широкий вибір ✓Оптімальние ціни ✓Регіональная мережу ✓Доставка по Україні ☎ (056) 790-01-22 Телефонуйте!");

$APPLICATION->IncludeComponent("av:visit_site.menu.tablet", "", array("MENU_TYPE" => "left"));

require $_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php";