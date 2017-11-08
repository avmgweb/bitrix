<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/* -------------------------------------------------------------------- */
/* ------------------------------- page ------------------------------- */
/* -------------------------------------------------------------------- */
?>
<div class="av-catalog-index">
	<div class="title"><?=$arResult["IBLOCK_NAME"]?></div>
	<div class="body">
		<?
		/* ------------------------------------------- */
		/* ------------------ menu ------------------- */
		/* ------------------------------------------- */
		?>
		<div class="menu">
			<?
			$APPLICATION->IncludeComponent
				(
				"bitrix:catalog.section.list", "av-vertical-minimized",
					[
					"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
					"IBLOCK_ID"   => $arParams["IBLOCK_ID"],

					"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],

					"CACHE_TYPE"   => $arParams["CACHE_TYPE"],
					"CACHE_TIME"   => $arParams["CACHE_TIME"],
					"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],

					"ADD_SECTIONS_CHAIN" => $arParams["ADD_SECTIONS_CHAIN"],
					"LINKS_MAX_COUNT"    => 12
					],
				false, ["HIDE_ICONS" => "Y"]
				);
			?>
		</div>
		<?
		/* ------------------------------------------- */
		/* ------------------ body ------------------- */
		/* ------------------------------------------- */
		?>
		<div class="items-block">
			<?
			$APPLICATION->IncludeComponent
				(
				"bitrix:catalog.section", "av-slider",
					[
					"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
					"IBLOCK_ID"   => $arParams["IBLOCK_ID"],

					"SECTION_USER_FIELDS"       => [],
					"FILTER_NAME"               => $arParams["FILTER_NAME"],
					"INCLUDE_SUBSECTIONS"       => "Y",
					"SHOW_ALL_WO_SECTION"       => "Y",
					"HIDE_NOT_AVAILABLE"        => $arParams["HIDE_NOT_AVAILABLE"],
					"HIDE_NOT_AVAILABLE_OFFERS" => $arParams["HIDE_NOT_AVAILABLE_OFFERS"],

					"ELEMENT_SORT_FIELD"  => $arParams["ELEMENT_SORT_FIELD"],
					"ELEMENT_SORT_ORDER"  => $arParams["ELEMENT_SORT_ORDER"],
					"ELEMENT_SORT_FIELD2" => $arParams["ELEMENT_SORT_FIELD2"],
					"ELEMENT_SORT_ORDER2" => $arParams["ELEMENT_SORT_ORDER2"],
					"OFFERS_SORT_FIELD"   => $arParams["OFFERS_SORT_FIELD"],
					"OFFERS_SORT_ORDER"   => $arParams["OFFERS_SORT_ORDER"],
					"OFFERS_SORT_FIELD2"  => $arParams["OFFERS_SORT_FIELD2"],
					"OFFERS_SORT_ORDER2"  => $arParams["OFFERS_SORT_ORDER2"],

					"PROPERTY_CODE"        => $arParams["LIST_PROPERTY_CODE"],
					"OFFERS_FIELD_CODE"    => $arParams["LIST_OFFERS_FIELD_CODE"],
					"OFFERS_PROPERTY_CODE" => $arParams["LIST_OFFERS_PROPERTY_CODE"],
					"PAGE_ELEMENT_COUNT"   => 99,

					"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
					"DETAIL_URL"  => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["element"],

					"SEF_MODE" => "N",

					"CACHE_TYPE"   => $arParams["CACHE_TYPE"],
					"CACHE_TIME"   => $arParams["CACHE_TIME"],
					"CACHE_FILTER" => $arParams["CACHE_FILTER"],
					"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],

					"SET_TITLE"                => "N",
					"SET_BROWSER_TITLE"        => "N",
					"BROWSER_TITLE"            => "",
					"SET_META_KEYWORDS"        => "N",
					"META_KEYWORDS"            => "",
					"SET_META_DESCRIPTION"     => "N",
					"META_DESCRIPTION"         => "",
					"USE_MAIN_ELEMENT_SECTION" => "N",
					"ADD_SECTIONS_CHAIN"       => "N",

					"PRICE_CODE"        => $arParams["PRICE_CODE"],
					"PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
					"CONVERT_CURRENCY"  => $arParams["CONVERT_CURRENCY"],
					"CURRENCY_ID"       => $arParams["CURRENCY_ID"],

					"SET_STATUS_404" => $arParams["SET_STATUS_404"],
					"SHOW_404"       => $arParams["SHOW_404"],
					"MESSAGE_404"    => $arParams["MESSAGE_404"],
					"FILE_404"       => $arParams["FILE_404"]
					],
				false, ["HIDE_ICONS" => "Y"]
				);
			?>
		</div>
	</div>
</div>