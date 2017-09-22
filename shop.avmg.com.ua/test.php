<?
require $_SERVER["DOCUMENT_ROOT"].'/bitrix/header.php';

$APPLICATION->IncludeComponent
	(
	"av:form.file", "av",
		[
		"NAME"        => 'test1',
		"NAME_DELETE" => 'test1_del',
		"TITLE"       => 'text1',
		"VALUE"       => 15326
		]
	);
$APPLICATION->IncludeComponent
	(
	"av:form.file", "av",
		[
		"NAME"  => 'test2',
		"TITLE" => 'text2'
		]
	);

require $_SERVER["DOCUMENT_ROOT"].'/bitrix/footer.php';