<?
use \Bitrix\Main\Localization\Loc;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription =
	[
	"NAME"        => Loc::getMessage("AV_AUTH_DESCR_TITLE"),
	"DESCRIPTION" => Loc::getMessage("AV_AUTH_DESCR_TEXT"),
	"PATH"        =>
		[
		"ID"   => 'av',
		"NAME" => Loc::getMessage("AV_COMPONENTS_TITLE")
		]
	];