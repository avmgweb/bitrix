<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die()?>
<?
$APPLICATION->IncludeComponent
	(
	"bitrix:menu", "av",
		array(
		"ROOT_MENU_TYPE"     => "top",
		"MAX_LEVEL"          => 2,
		"CHILD_MENU_TYPE"    => "left",
		"USE_EXT"            => "Y",
		"DELAY"              => "N",
		"ALLOW_MULTI_SELECT" => "Y",

		"MENU_CACHE_TYPE"       => "A",
		"MENU_CACHE_TIME"       => 360000,
		"MENU_CACHE_USE_GROUPS" => "Y"
		)
	);
?>