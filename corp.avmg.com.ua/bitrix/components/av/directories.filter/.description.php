<?
use \Bitrix\Main\Localization\Loc;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription =
	[
	"NAME"        => Loc::getMessage("AV_DIRECTORIES_FILTER_DESC_NAME"),
	"DESCRIPTION" => Loc::getMessage("AV_DIRECTORIES_FILTER_DESC_DESCRIPTION"),
	"PATH"        =>
		[
		"ID"    => 'av',
		"CHILD" => ["ID" => 'directories']
		]
	];