<?
use \Bitrix\Main\Application;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/* -------------------------------------------------------------------- */
/* --------------------------- section info --------------------------- */
/* -------------------------------------------------------------------- */
$arResult["SECTION_INFO"] = [];
if($arResult["IBLOCK_SECTION_ID"]) $arResult["SECTION_INFO"] = CIBlockSection::GetList([], ["ID" => $arResult["IBLOCK_SECTION_ID"]])->GetNext();
/* -------------------------------------------------------------------- */
/* ------------------------- root section info ------------------------ */
/* -------------------------------------------------------------------- */
$arResult["ROOT_SECTION_INFO"] = [];
if($arResult["SECTION_INFO"]["ID"]) $arResult["ROOT_SECTION_INFO"] = CIBlockSection::GetNavChain($arParams["IBLOCK_ID"], $arResult["SECTION_INFO"]["ID"], ["ID", "CODE", "NAME"])->GetNext();
/* -------------------------------------------------------------------- */
/* --------------------------- streams info --------------------------- */
/* -------------------------------------------------------------------- */
$arResult["BASE_STREAMS_INFO"] = [];
if($arParams["AV_BASES_STREAMS_INFO_IBLOCK"] && $arResult["PROPERTIES"]["streams"]["VALUE"][0])
	{
	$streamsIblockId  = CIBlockProperty::GetList([], ["IBLOCK_ID" => $arParams["IBLOCK_ID"], "ACTIVE" => 'Y', "CODE" => 'streams'])->GetNext()["LINK_IBLOCK_ID"];
	$streamsInfoArray = [];
	/* ------------------------------------------- */
	/* -------------- streams info --------------- */
	/* ------------------------------------------- */
	if($streamsIblockId)
		{
		$queryList = CIBlockElement::GetList
			(
			["SORT" => 'ASC'],
				[
				"IBLOCK_ID" => $streamsIblockId,
				"ID"        => $arResult["PROPERTIES"]["streams"]["VALUE"],
				"ACTIVE"    => 'Y'
				],
			false, false,
			["ID", "NAME", "PROPERTY_icon"]
		);
		while($queryElement = $queryList->GetNext())
			{
			$iconInfo = CFile::GetByID($queryElement["PROPERTY_ICON_VALUE"])->Fetch();
			$iconPath = explode('.', $iconInfo["ORIGINAL_NAME"])[1] == 'svg'
				? '/upload/'.$iconInfo["SUBDIR"].'/'.$iconInfo["ORIGINAL_NAME"]
				: $this->GetFolder().'/images/stream_default_icon.svg';

			$svgContent    = file_get_contents(Application::getDocumentRoot().$iconPath);
			$svgContentObj = simplexml_load_string($svgContent);
			$svgWidth      = 0;
			$svgHeight     = 50;

			if($svgContentObj)
				{
				$svgViewboxParams = explode(' ', $svgContentObj->attributes()["viewBox"]);
				$svgWidth         = $svgHeight*$svgViewboxParams[2]/$svgViewboxParams[3];
				}

			if($svgContent && $svgWidth && $svgHeight)
				$streamsInfoArray[$queryElement["ID"]] =
					[
					"NAME"        => $queryElement["NAME"],
					"SVG_CONTENT" => $svgContent,
					"SVG_WIDTH"   => $svgWidth,
					"SVG_HEIGHT"  => $svgHeight
					];
			}
		}
	/* ------------------------------------------- */
	/* ------------ base streams query ----------- */
	/* ------------------------------------------- */
	$queryList = CIBlockElement::GetList
		(
		[],
			[
			"IBLOCK_ID"       => $arParams["AV_BASES_STREAMS_INFO_IBLOCK"],
			"PROPERTY_base"   => $arResult["ID"],
			"PROPERTY_stream" => $arResult["PROPERTIES"]["streams"]["VALUE"],
			"ACTIVE"          => 'Y'
			],
		false, false,
		["ID", "PROPERTY_stream", "PROPERTY_manager", "PROPERTY_phone", "PROPERTY_price"]
		);
	while($queryElement = $queryList->GetNext())
		if(count($streamsInfoArray[$queryElement["PROPERTY_STREAM_VALUE"]]))
			{
			$phoneArray  = is_array($queryElement["PROPERTY_PHONE_VALUE"]) ? $queryElement["PROPERTY_PHONE_VALUE"] : [$queryElement["PROPERTY_PHONE_VALUE"]];
			$streamsInfo = $streamsInfoArray[$queryElement["PROPERTY_STREAM_VALUE"]];
			/* ---------------------------- */
			/* ------- phone array -------- */
			/* ---------------------------- */
			if($queryElement["PROPERTY_MANAGER_VALUE"][0])
				{
				$userQueryList = CUser::GetList
					(
					$by = 'ID', $order = 'ASC',
					["ID" => implode('|', $queryElement["PROPERTY_MANAGER_VALUE"])],
					["FIELDS" => ["ID", "WORK_PHONE"]]
					);
				while($userQueryElement = $userQueryList->GetNext()) $phoneArray[] = $userQueryElement["WORK_PHONE"];
				}

			foreach($phoneArray as $index => $value)
				{
				$value = preg_replace("/[^0-9]/", '', $value);
				if($value[0].$value[1] == 38) $value = substr($value, (strlen($value) - 2) * -1);
				$phoneArray[$index] = $value;
				}
			$phoneArray = array_values(array_unique(array_diff($phoneArray, [''])));
			/* ---------------------------- */
			/* -------- full array -------- */
			/* ---------------------------- */
			$arResult["BASE_STREAMS_INFO"][$queryElement["PROPERTY_STREAM_VALUE"]] =
				[
				"TITLE"  => $streamsInfo["NAME"],
				"ICON"   =>
					[
					"CONTENT" => $streamsInfo["SVG_CONTENT"],
					"WIDTH"   => $streamsInfo["SVG_WIDTH"],
					"HEIGHT"  => $streamsInfo["SVG_HEIGHT"]
					],
				"PRICE"  => file_get_contents(Application::getDocumentRoot().$queryElement["PROPERTY_PRICE_VALUE"]) ? $queryElement["PROPERTY_PRICE_VALUE"] : '',
				"PHONES" => $phoneArray
				];
			}
	}
/* -------------------------------------------------------------------- */
/* ------------------------ current action info ----------------------- */
/* -------------------------------------------------------------------- */
$arResult["CURRENT_ACTION"] = [];
if($arResult["PROPERTIES"]["current_action"]["VALUE"])
	{
	$queryList = CIBlockElement::GetList
		(
		[],
		["ID" => $arResult["PROPERTIES"]["current_action"]["VALUE"]],
		false, false,
		["ID", "NAME", "PREVIEW_TEXT", "PROPERTY_ACTION_IMAGE"]
		);
	while($queryElement = $queryList->GetNext())
		$arResult["CURRENT_ACTION"] =
			[
			"NAME"    => $queryElement["NAME"],
			"TEXT"    => $queryElement["PREVIEW_TEXT"],
			"PICTURE" => CFile::GetPath($queryElement["PROPERTY_ACTION_IMAGE_VALUE"])
			];
	}