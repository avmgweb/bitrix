<?
use \Bitrix\Main\Localization\Loc;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$arComponentDescription =
	[
	"NAME"        => Loc::getMessage("AV_LEARNING_COURSE_SECTIONS_NAME"),
	"DESCRIPTION" => Loc::getMessage("AV_LEARNING_COURSE_SECTIONS_DESC"),
	"PATH" =>
		[
		"ID"    => "service",
		"CHILD" =>
			[
			"ID"   => 'learning',
			"NAME"  => Loc::getMessage("LEARNING_SERVICE"),
			"CHILD" =>
				[
				"ID"   => "course",
				"NAME" => Loc::getMessage("LEARNING_COURSE_SERVICE")
				]
			]
		]
	];