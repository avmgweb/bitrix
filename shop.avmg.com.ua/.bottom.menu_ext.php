<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if(!CModule::IncludeModule("catalog"))                          die();
/* -------------------------------------------------------------------- */
/* ---------------------------- variables ----------------------------- */
/* -------------------------------------------------------------------- */
$iblockType          = "catalog_products";
$iblockNeedArray     = [];
$iblockSectionsArray = [];
/* -------------------------------------------------------------------- */
/* -------------------------- catalog query --------------------------- */
/* -------------------------------------------------------------------- */
$queryList = CCatalog::GetList
	(
	["SORT" => "ASC"],
		[
		"IBLOCK_TYPE_ID"    => $iblockType,
		"PRODUCT_IBLOCK_ID" => false,
		"ACTIVE"            => "Y",
		"SITE_ID"           => SITE_ID
		],
	false, false, ["ID"]
	);
while($queryElement = $queryList->GetNext()) $iblockNeedArray[] = $queryElement["ID"];
/* -------------------------------------------------------------------- */
/* --------------------------- menu adding ---------------------------- */
/* -------------------------------------------------------------------- */
if(count($iblockNeedArray))
	{
	$queryList = CIBlock::GetList(["SORT" => "ASC"], ["ID" => $iblockNeedArray]);
	while($queryElement = $queryList->GetNext())
		$aMenuLinks[] =
			[
			$queryElement["NAME"],
			str_replace
				(
				["#IBLOCK_ID#",       "#IBLOCK_CODE#",       "#SITE_DIR#"],
				[$queryElement["ID"], $queryElement["CODE"], ""],
				$queryElement["LIST_PAGE_URL"]
				),
			[],
			["DEPTH_LEVEL" => 2]
			];
	}