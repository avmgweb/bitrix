<?require $_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php"?>

<?
$responcible1Const = (int) "{=Constant:responcible1}";
$responcible2Const = (int) "{=Constant:responcible2}";
$responcible1Id    = 0;
$responcible2Id    = 0;
$executorId        = 0;

$queryList = CUser::GetList($by = "ID", $order = "ASC", ["ID" => $responcible1Const, "ACTIVE" => "Y"], ["FIELDS" => ["ID"]]);
while($queryElement = $queryList->GetNext()) $responcible1Id = $queryElement["ID"];

$queryList = CUser::GetList($by = "ID", $order = "ASC", ["ID" => $responcible2Const, "ACTIVE" => "Y"], ["FIELDS" => ["ID"]]);
while($queryElement = $queryList->GetNext()) $responcible2Id = $queryElement["ID"];

$executorId = $responcible1Id;

if($executorId)
	{
	$queryList  = CIBlockElement::GetList
		(
		[],
			[
			"IBLOCK_CODE"      => "absence",
			"ACTIVE"           => "Y",
			"PROPERTY_USER"    => $executorId,
			">=DATE_ACTIVE_TO" => ConvertTimeStamp(MakeTimeStamp(date("d.m.Y"), "DD.MM.YYYY"))
			],
		false, false, ["ID"]
		);
	while($queryElement = $queryList->GetNext())
		$executorId = $responcible2Id;
	}

if($executorId) $this->GetRootActivity()->SetVariable("executor", $executorId);
else            $this->GetRootActivity()->SetVariable("processing_error", "Y");

$iblockId     = (int) "{=Document:IBLOCK_ID}";
$elementId    = (int) "{=Document:ID}";
$authorId     = (int) str_replace("user_", "", "{=Document:CREATED_BY}");
$executorId   = (int) str_replace("user_", "", "{=Variable:executor}");
$rightIdRead  = (int) "{=Constant:rightIdRead}";
$rightIdWrite = (int) "{=Constant:rightIdWrite}";

if($iblockId && $elementId && $executorId)
	{
	$rightsObject      = new CIBlockElementRights($iblockId, $elementId);
	$rightsArray       = $rightsObject->GetRights();
	$rightsArray["n0"] =
		[
		"GROUP_CODE" => "U".$authorId,
		"TASK_ID"    => $rightIdRead
		];
	$rightsArray["n1"] =
		[
		"GROUP_CODE" => "U".$executorId,
		"TASK_ID"    => $rightIdRead
		];
	$rightsObject->SetRights($rightsArray);
	}
?>

<?require $_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php"?>