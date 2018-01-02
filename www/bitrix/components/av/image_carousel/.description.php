<?
use \Bitrix\Main\Localization\Loc;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$arComponentDescription =
	[
	"NAME"        => Loc::getMessage("AV_IMAGE_CAROUSEL_TITLE"),
	"DESCRIPTION" => Loc::getMessage("AV_IMAGE_CAROUSEL_DECSR"),
	"PATH"        =>
		[
		"ID"    => 'av',
		"CHILD" => ["ID" => 'other']
		]
	];