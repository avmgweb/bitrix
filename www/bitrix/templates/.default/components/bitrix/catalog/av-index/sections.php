<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/* -------------------------------------------------------------------- */
/* ------------------------------- page ------------------------------- */
/* -------------------------------------------------------------------- */
?>
<div class="av-catalog-index">
	<a class="title" href="<?=$arParams["SEF_FOLDER"]?>"><?=$arResult["IBLOCK_NAME"]?></a>
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
				"bitrix:catalog.section.list", "av-shop-vertical-minimized",
					[
					"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
					"IBLOCK_ID"   => $arParams["IBLOCK_ID"],

					"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],

					"CACHE_TYPE"   => $arParams["CACHE_TYPE"],
					"CACHE_TIME"   => $arParams["CACHE_TIME"],
					"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],

					"ADD_SECTIONS_CHAIN" => "N",
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

					"FILTER_NAME"               => $arParams["FILTER_NAME"],
					"INCLUDE_SUBSECTIONS"       => "Y",
					"SHOW_ALL_WO_SECTION"       => "Y",
					"HIDE_NOT_AVAILABLE"        => $arParams["HIDE_NOT_AVAILABLE"],
					"HIDE_NOT_AVAILABLE_OFFERS" => $arParams["HIDE_NOT_AVAILABLE_OFFERS"],

					"ELEMENT_SORT_FIELD"  => $arParams["ELEMENT_SORT_FIELD"],
					"ELEMENT_SORT_ORDER"  => $arParams["ELEMENT_SORT_ORDER"],
					"ELEMENT_SORT_FIELD2" => $arParams["ELEMENT_SORT_FIELD2"],
					"ELEMENT_SORT_ORDER2" => $arParams["ELEMENT_SORT_ORDER2"],

					"PAGE_ELEMENT_COUNT" => 99,

					"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
					"DETAIL_URL"  => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["element"],

					"SEF_MODE" => "N",

					"CACHE_TYPE"   => $arParams["CACHE_TYPE"],
					"CACHE_TIME"   => $arParams["CACHE_TIME"],
					"CACHE_FILTER" => $arParams["CACHE_FILTER"],
					"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],

					"PRICE_CODE"        => $arParams["PRICE_CODE"],
					"PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
					"CONVERT_CURRENCY"  => $arParams["CONVERT_CURRENCY"],
					"CURRENCY_ID"       => $arParams["CURRENCY_ID"]
					],
				false, ["HIDE_ICONS" => "Y"]
				);
			?>
		</div>
	</div>
</div>