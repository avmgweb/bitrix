<?
require $_SERVER["DOCUMENT_ROOT"].'/bitrix/header.php';
exit();
$basesIblockId     = 58;
$basesInfoIblockId = 114;
$BMstreamId        = 2036;

$queryList = CIBlockElement::GetList(["ID" => 'ASC'], ["IBLOCK_ID" => $basesIblockId, "PROPERTY_streams" => $BMstreamId], false, false, ["ID", "PROPERTY_streams"]);
while($queryElement = $queryList->GetNext())
	(new CIBlockElement)->Add
		([
		"IBLOCK_ID"       => $basesInfoIblockId,
		"ACTIVE"          => 'Y',
		"NAME"            => 'Элемент',
		"PROPERTY_VALUES" =>
			[
			"base"   => $queryElement["ID"],
			"stream" => $BMstreamId
			]
		]);