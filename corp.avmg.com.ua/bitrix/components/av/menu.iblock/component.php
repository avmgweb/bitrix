<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if(!\Bitrix\Main\Loader::includeModule("iblock"))               return;
/* -------------------------------------------------------------------- */
/* ----------------------- arParams correction ------------------------ */
/* -------------------------------------------------------------------- */
$arParams["IBLOCK_ID"]             = array_values(array_diff(is_array($arParams["IBLOCK_ID"]) ? $arParams["IBLOCK_ID"] : [$arParams["IBLOCK_ID"]], ['', 0]));
$arParams["IBLOCK_PICTURE_FIELD"]  = CUserTypeEntity::GetList(["ID" => 'ASC'], ["ENTITY_ID" => 'ASD_IBLOCK', "FIELD_NAME" => $arParams["IBLOCK_PICTURE_FIELD"]])->GetNext()["FIELD_NAME"];
$arParams["SECTION_DEPTH"]         = (int)$arParams["SECTION_DEPTH"];
$arParams["SECTION_PICTURE_FIELD"] = array_values(array_diff(is_array($arParams["SECTION_PICTURE_FIELD"]) ? $arParams["SECTION_PICTURE_FIELD"] : [$arParams["SECTION_PICTURE_FIELD"]], ['', 0]));
$arParams["CACHE_TIME"]            = (int)$arParams["CACHE_TIME"] ? (int)$arParams["CACHE_TIME"] : 36000000;
/* -------------------------------------------------------------------- */
/* --------------------------- cache start ---------------------------- */
/* -------------------------------------------------------------------- */
if($this->startResultCache(false, $USER->GetGroups()))
	{
	/* ------------------------------------------- */
	/* ---------------- variables ---------------- */
	/* ------------------------------------------- */
	$iblockSectionsArray = [];
	/* ------------------------------------------- */
	/* ------------------ query ------------------ */
	/* ------------------------------------------- */
	$GLOBALS["AV_MENU_IBLOCK_QUERY"]                = [];
	$GLOBALS["AV_MENU_IBLOCK_SECTIONS_ICON_FIELDS"] = $arParams["SECTION_PICTURE_FIELD"];

	function avMenuIblockGetIblockSections($iblockId, $parentSection)
		{
		$result = [];

		$queryList = CIBlockSection::GetList
			(
			["SORT"=>"ASC"],
				[
				"IBLOCK_ID"         => $iblockId,
				"ACTIVE"            => 'Y',
				"GLOBAL_ACTIVE"     => 'Y',
				"CHECK_PERMISSIONS" => 'Y',
				"IBLOCK_ACTIVE"     => 'Y',
				"SECTION_ID"        => $parentSection
				],
			false, array_merge(["ID", "CODE", "NAME", "PICTURE"], $GLOBALS["AV_MENU_IBLOCK_SECTIONS_ICON_FIELDS"])
			);
		while($queryInfo = $queryList->GetNext())
			{
			$GLOBALS["AV_MENU_IBLOCK_QUERY"][$queryInfo["ID"]] = $result[$queryInfo["ID"]] = $queryInfo;
			$GLOBALS["AV_MENU_IBLOCK_QUERY"][$queryInfo["ID"]]["CHILDREN"] = avMenuIblockGetIblockSections($iblockId, $queryInfo["ID"]);
			foreach(array_merge(["PICTURE"], $GLOBALS["AV_MENU_IBLOCK_SECTIONS_ICON_FIELDS"]) as $field)
				if($GLOBALS["AV_MENU_IBLOCK_QUERY"][$queryInfo["ID"]][$field])
					$GLOBALS["AV_MENU_IBLOCK_QUERY"][$queryInfo["ID"]][$field] = CFile::GetFileArray($GLOBALS["AV_MENU_IBLOCK_QUERY"][$queryInfo["ID"]][$field]);
			}

		return array_keys($result);
		}

	foreach($arParams["IBLOCK_ID"] as $iblockId)
		{
		$GLOBALS["AV_MENU_IBLOCK_QUERY"] = [];
		avMenuIblockGetIblockSections($iblockId);

		$iblockSectionsArray[$iblockId] =
			[
			"SECTIONS" => $GLOBALS["AV_MENU_IBLOCK_QUERY"],
			"PICTURE"  => $arParams["IBLOCK_PICTURE_FIELD"] ? CASDiblockTools::GetIBUF($iblockId)[$arParams["IBLOCK_PICTURE_FIELD"]] : CIBlock::GetArrayByID($iblockId, "PICTURE")
			];
		if($iblockSectionsArray[$iblockId]["PICTURE"])
			$iblockSectionsArray[$iblockId]["PICTURE"] = CFile::GetFileArray($iblockSectionsArray[$iblockId]["PICTURE"]);
		}
	/* ------------------------------------------- */
	/* ------------------ output ----------------- */
	/* ------------------------------------------- */
	$arResult =
		[
		"QUERY" => $iblockSectionsArray
		];

	$this->IncludeComponentTemplate();
	}