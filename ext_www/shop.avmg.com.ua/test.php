<?
use \Bitrix\Main\Loader;

require $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php";
if(!Loader::includeModule("sale"))    die();
if(!Loader::includeModule("catalog")) die();

if(!$USER->IsAdmin()) exit("exit");

$iblockType        = "catalog_products";
$iblockArray       = [];
$offersIblockArray = [];
$OUTPUT            = [];
$propertyTypeArray =
	[
	"S"             => "строка",
	"N"             => "число",
	"L"             => "список",
	"F"             => "файл",
	"G"             => "привязка к разделу",
	"E"             => "привязка к элементу",
	"UserID"        => "Привязка к пользователю",
	"DateTime"      => "Дата/Время",
	"EList"         => "Привязка к элементам в виде списка",
	"FileMan"       => "Привязка к файлу (на сервере)",
	"HTML"          => "HTML/текст",
	"ElementXmlID"  => "Привязка к элементам по XML_ID",
	"Sequence"      => "Счетчик",
	"EAutocomplete" => "Привязка к элементам с автозаполнением"
	];

$queryList = CCatalog::GetList
	(
	["ID" => "ASC"],
		[
		"IBLOCK_TYPE_ID"     => $iblockType,
		"!PRODUCT_IBLOCK_ID" => false
		],
	false, false, ["ID", "PRODUCT_IBLOCK_ID"]
	);
while($queryElement = $queryList->GetNext()) $offersIblockArray[$queryElement["PRODUCT_IBLOCK_ID"]] = $queryElement["ID"];

$queryList = CCatalog::GetList
	(
	["ID" => "ASC"],
		[
		"IBLOCK_TYPE_ID"    => $iblockType,
		"PRODUCT_IBLOCK_ID" => false
		],
	false, false, ["ID", "NAME"]
	);
while($queryElement = $queryList->GetNext())
	{
	$OUTPUT[$queryElement["ID"]]["NAME"] = $queryElement["NAME"];

	$offersIblockId = array_key_exists($queryElement["ID"], $offersIblockArray) ? $offersIblockArray[$queryElement["ID"]] : 0;

	if($offersIblockId > 0)
		{
		$subQueryList = CIBlockProperty::GetList(["ID" => "ASC"], ["IBLOCK_ID" => $offersIblockId]);
		while($subQueryElement = $subQueryList->GetNext())
			{
			$propertyType = "";
			     if(array_key_exists($subQueryElement["USER_TYPE"],     $propertyTypeArray)) $propertyType = $subQueryElement["USER_TYPE"];
			else if(array_key_exists($subQueryElement["PROPERTY_TYPE"], $propertyTypeArray)) $propertyType = $subQueryElement["PROPERTY_TYPE"];
			if(strlen($propertyType) <= 0) continue;

			$OUTPUT[$queryElement["ID"]]["PROPS"][] =
				[
				"TYPE"       => $propertyType,
				"TYPE_TITLE" => $propertyTypeArray[$propertyType],
				"CODE"       => $subQueryElement["CODE"],
				"NAME"       => $subQueryElement["NAME"]
				];
			}
		}
	}
?>
<?foreach($OUTPUT as $iblockInfo):?>
<table>
	<tr>
		<th colspan="2"><?=$iblockInfo["NAME"]?></th>
	</tr>
	<?foreach($iblockInfo["PROPS"] as $propInfo):?>
	<tr>
		<td><?=$propInfo["CODE"]?>:</td>
		<td><?=$propInfo["NAME"]?></td>
	</tr>
	<?endforeach?>
</table>
<?endforeach?>