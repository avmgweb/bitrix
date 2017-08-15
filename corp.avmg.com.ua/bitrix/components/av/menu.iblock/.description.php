<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription =
	[
	"NAME"        => GetMessage("AV_MENU_IBLOCK_DESC_NAME"),
	"DESCRIPTION" => GetMessage("AV_MENU_IBLOCK_DESC_DESCRIPTION"),
	"PATH"        =>
		[
		"ID"    => 'av',
		"CHILD" => ["ID" => 'visit-site']
		]
	];