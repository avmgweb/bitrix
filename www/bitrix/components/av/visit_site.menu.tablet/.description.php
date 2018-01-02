<?
use \Bitrix\Main\Localization\Loc;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$arComponentDescription =
	[
	"NAME"        => Loc::getMessage("AV_VS_MENU_INDEX_TITLE"),
	"DESCRIPTION" => Loc::getMessage("AV_VS_MENU_INDEX_DECSR"),
	"PATH"        =>
		[
		"ID"    => 'av',
		"CHILD" => ["ID" => 'visit-site']
		]
	];