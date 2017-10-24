<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$APPLICATION->IncludeComponent
	(
	"av:form.button", "av-shop",
		array(
		"BUTTON_TYPE" => "link",
		"LINK"        => "https://ru.avmg.com.ua/metallobaza/",
		"TITLE"       => "Показать металлобазы",
		"ATTR"        => ["rel" => "nofollow"]
		)
	);