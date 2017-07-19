<?
require $_SERVER["DOCUMENT_ROOT"].'/bitrix/header.php';

$basesIblockId       = 58;
$basesUAIblockId     = 134;
$basesInfoIblockId   = 114;
$basesInfoUAIblockId = 136;
$streams             =
	[
	"bm"         => 2036,
	"setka"      => 86766,
	"elektrod"   => 86765,
	"profnastil" => 2040
	];
$streamsMatchArray   =
	[
	2036  => 88074,
	2037  => 88075,
	2038  => 88076,
	2039  => 88077,
	2040  => 88078,
	2041  => 88079,
	86765 => 88080,
	86766 => 88081
	];
/*
$queryList = CIBlockElement::GetList(["ID" => 'ASC'], ["IBLOCK_ID" => $basesIblockId, "PROPERTY_streams" => $streams["bm"]], false, false, ["ID", "PROPERTY_streams"]);
while($queryElement = $queryList->GetNext())
	CIBlockElement::SetPropertyValuesEx
		(
		$queryElement["ID"],
		$basesIblockId,
			[
			"streams" => array_unique(array_merge($queryElement["PROPERTY_STREAMS_VALUE"], array_values($streams)))
			]
		);
*/
/*
$bmBases = [];
$queryList = CIBlockElement::GetList(["ID" => 'ASC'], ["IBLOCK_ID" => $basesIblockId, "PROPERTY_streams" => $streams["bm"]], false, false, ["ID"]);
while($queryElement = $queryList->GetNext()) $bmBases[] = $queryElement["ID"];

if(count($bmBases))
	{
	$queryList = CIBlockElement::GetList(["ID" => 'ASC'], ["IBLOCK_ID" => $basesInfoIblockId, "PROPERTY_base" => $bmBases], false, false, ["ID", "PROPERTY_base", "PROPERTY_manager", "PROPERTY_phone"]);
	while($queryElement = $queryList->GetNext())
		foreach([$streams["setka"], $streams["elektrod"], $streams["profnastil"]] as $streamId)
			(new CIBlockElement)->Add
				([
				"IBLOCK_ID"       => $basesInfoIblockId,
				"NAME"            => 'Элемент',
				"ACTIVE"          => 'Y',
				"PROPERTY_VALUES" =>
					[
					"base"    => $queryElement["PROPERTY_BASE_VALUE"],
					"stream"  => $streamId,
					"manager" => $queryElement["PROPERTY_MANAGER_VALUE"],
					"phone"   => $queryElement["PROPERTY_PHONE_VALUE"],
					]
				]);
	}
*/
/*
$queryList = CIBlockElement::GetList(["ID" => 'ASC'], ["IBLOCK_ID" => $basesUAIblockId], false, false, ["ID", "PROPERTY_streams"]);
while($queryElement = $queryList->GetNext())
	{
	$newStreamsValue = [];
	if(is_array($queryElement["PROPERTY_STREAMS_VALUE"]))
		foreach($queryElement["PROPERTY_STREAMS_VALUE"] as $streamRuId)
			$newStreamsValue[] = $streamsMatchArray[$streamRuId];
	$newStreamsValue = array_unique(array_diff($newStreamsValue, ['']));

	if(count($newStreamsValue))
		CIBlockElement::SetPropertyValuesEx($queryElement["ID"], $basesUAIblockId, ["streams" => $newStreamsValue]);
	}
*/
/*
$queryList = CIBlockElement::GetList(["ID" => 'ASC'], ["IBLOCK_ID" => $basesInfoUAIblockId], false, false, ["ID", "PROPERTY_base", "PROPERTY_stream"]);
while($queryElement = $queryList->GetNext())
	{
	$baseRuInfo = CIBlockElement::GetList([], ["ID" => $queryElement["PROPERTY_BASE_VALUE"]],                                                                                                                              false, false, ["ID", "PROPERTY_cordinate_x", "PROPERTY_cordinate_y"])->GetNext();
	$baseUaId   = CIBlockElement::GetList([], ["IBLOCK_ID" => $basesUAIblockId, "PROPERTY_cordinate_x" => $baseRuInfo["PROPERTY_CORDINATE_X_VALUE"], "PROPERTY_cordinate_y" => $baseRuInfo["PROPERTY_CORDINATE_Y_VALUE"]], false, false, ["ID"])                                                ->GetNext()["ID"];

	CIBlockElement::SetPropertyValuesEx
		(
		$queryElement["ID"],
		$basesInfoUAIblockId,
			[
			"base"   => $baseUaId,
			"stream" => $streamsMatchArray[$queryElement["PROPERTY_STREAM_VALUE"]]
			]
		);
	echo $queryElement["ID"].'<br>';
	}
*/
/*
$queryList = CIBlockElement::GetList(["ID" => 'ASC'], ["IBLOCK_ID" => $basesInfoUAIblockId, "!PROPERTY_price" => false], false, false, ["ID", "PROPERTY_price"]);
while($queryElement = $queryList->GetNext())
	CIBlockElement::SetPropertyValuesEx
		(
		$queryElement["ID"],
		$basesInfoUAIblockId,
			[
			"price" => '/upload'.$queryElement["PROPERTY_PRICE_VALUE"]
			]
		);
*/