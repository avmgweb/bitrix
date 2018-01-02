<?
use \Bitrix\Main\Localization\Loc;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$cordinateX  = $arResult["PROPERTIES"]["cordinate_x"]["VALUE"];
$cordinateY  = $arResult["PROPERTIES"]["cordinate_y"]["VALUE"];
$pricesArray = [];

foreach($arResult["BASE_STREAMS_INFO"] as $streamInfo)
	if($streamInfo["PRICE"])
		$pricesArray[] =
			[
			"TITLE" => $streamInfo["TITLE"],
			"LINK"  => $streamInfo["PRICE"]
			];
/* -------------------------------------------------------------------- */
/* -------------------------- same articles --------------------------- */
/* -------------------------------------------------------------------- */
$sameArticles = "";
if(count($arParams["CATEGORY_APPLIED_FILTER"]))
	{
	ob_start();
	foreach($arParams["CATEGORY_APPLIED_FILTER"] as $iblockId => $filterArrayIndex)
		$APPLICATION->IncludeComponent
			(
			"bitrix:news.list", "av_bases_same_bases",
				[
				"AJAX_MODE"           => "N",
				"AJAX_OPTION_JUMP"    => "",
				"AJAX_OPTION_STYLE"   => "",
				"AJAX_OPTION_HISTORY" => "",

				"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
				"IBLOCK_ID"   => $iblockId,
				"NEWS_COUNT"  => $arParams["CATEGORY_ITEMS_COUNT"],

				"SORT_BY1"    => "ID",
				"SORT_ORDER1" => "ASC",
				"SORT_BY2"    => "NAME",
				"SORT_ORDER2" => "ASC",

				"FILTER_NAME"   => $filterArrayIndex,
				"FIELD_CODE"    => array(),
				"PROPERTY_CODE" => array("address", "phone", "closed"),
				"CHECK_DATES"   => $arParams["CHECK_DATES"],

				"DETAIL_URL"  => $arParams["DETAIL_URL"],
				"SECTION_URL" => $arParams["SECTION_URL"],
				"IBLOCK_URL"  => $arParams["IBLOCK_URL"],

				"PREVIEW_TRUNCATE_LEN"      => $arParams["PREVIEW_TRUNCATE_LEN"],
				"ACTIVE_DATE_FORMAT"        => $arParams["ACTIVE_DATE_FORMAT"],
				"SET_TITLE"                 => "N",
				"SET_BROWSER_TITLE"         => "N",
				"SET_META_KEYWORDS"         => "N",
				"SET_META_DESCRIPTION"      => "N",
				"SET_LAST_MODIFIED"         => $arParams["SET_LAST_MODIFIED"],
				"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
				"ADD_SECTIONS_CHAIN"        => "N",
				"HIDE_LINK_WHEN_NO_DETAIL"  => $arParams["HIDE_LINK_WHEN_NO_DETAIL"],
				"PARENT_SECTION"            => "",
				"PARENT_SECTION_CODE"       => "",
				"INCLUDE_SUBSECTIONS"       => "Y",
				"DISPLAY_DATE"              => $arParams["DISPLAY_DATE"],
				"DISPLAY_NAME"              => $arParams["DISPLAY_NAME"],
				"DISPLAY_PICTURE"           => $arParams["DISPLAY_PICTURE"],
				"DISPLAY_PREVIEW_TEXT"      => $arParams["DISPLAY_PREVIEW_TEXT"],

				"SET_STATUS_404" => $arParams["SET_STATUS_404"],
				"SHOW_404"       => $arParams["SHOW_404"],
				"MESSAGE_404"    => $arParams["MESSAGE_404"],
				"FILE_404"       => $arParams["FILE_404"],

				"CACHE_TYPE"   => $arParams["CACHE_TYPE"],
				"CACHE_TIME"   => $arParams["CACHE_TIME"],
				"CACHE_FILTER" => $arParams["CACHE_FILTER"],
				"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],

				"USE_RATING" => $arParams["USE_RATING"],
				"MAX_VOTE"   => $arParams["MAX_VOTE"],
				"VOTE_NAMES" => $arParams["VOTE_NAMES"]
				],
			false, ["HIDE_ICONS" => "Y"]
			);
	$sameArticles = ob_get_contents();
	ob_end_clean();
	}
/* -------------------------------------------------------------------- */
/* ------------------------------- page ------------------------------- */
/* -------------------------------------------------------------------- */
?>
<div class="av-bases-detail<?if($arResult["PROPERTIES"]["closed"]["VALUE_XML_ID"]):?> closed<?endif?><?if(!$cordinateX || !$cordinateY):?> no-map<?endif?>">
	<?
	$buttonsArray = CIBlock::GetPanelButtons
		(
		$arResult["IBLOCK_ID"],
		$arResult["ID"],
		0, ["SECTION_BUTTONS" => false, "SESSID" => false]
		);

	$this->AddEditAction  ($arResult["ID"], $buttonsArray["edit"]["edit_element"]["ACTION_URL"],   CIBlock::GetArrayByID($arResult["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arResult["ID"], $buttonsArray["edit"]["delete_element"]["ACTION_URL"], CIBlock::GetArrayByID($arResult["IBLOCK_ID"], "ELEMENT_DELETE"));
	/* ------------------------------------------- */
	/* ----------------- info col ---------------- */
	/* ------------------------------------------- */
	?>
	<div class="info-col">
		<h3><?=Loc::getMessage("AV_BASES_ELEMENT_INFO")?></h3>
		<div>
			<?if($arResult["PROPERTIES"]["address"]["VALUE"]["TEXT"]):?>
			<div><?=$arResult["PROPERTIES"]["address"]["VALUE"]["TEXT"]?></div>
			<?endif?>

			<?if($arResult["PROPERTIES"]["phone"]["VALUE"][0]):?>
			<div><?=implode(", ", $arResult["PROPERTIES"]["phone"]["VALUE"])?></div>
			<?endif?>

			<?if($arResult["PROPERTIES"]["open_houres"]["VALUE"][0]):?>
			<div>
				<b><?=$arResult["PROPERTIES"]["open_houres"]["NAME"]?></b><br>
				<?=implode("<br>", $arResult["PROPERTIES"]["open_houres"]["VALUE"])?>
			</div>
			<?endif?>

			<?if(count($pricesArray) == 1):?>
				<?
				$APPLICATION->IncludeComponent
					(
					"av:form.button", "av",
						[
						"BUTTON_TYPE" => "link",
						"LINK"        => $pricesArray[0]["LINK"],
						"TITLE"       => Loc::getMessage("AV_BASES_ELEMENT_PRICE_LINK"),
						"ATTR"        => ["data-price-link" => "Y", "target" => "_blank"]
						],
					false, ["HIDE_ICONS" => "Y"]
					);
				?>
			<?elseif(count($pricesArray) > 1):?>
				<div class="price-links-list">
					<?
					$APPLICATION->IncludeComponent
						(
						"av:form.button", "av",
							[
							"BUTTON_TYPE" => "label",
							"TITLE"       => Loc::getMessage("AV_BASES_ELEMENT_PRICE_LINK")."<i class=\"icon fa fa-angle-down\"></i>",
							"ATTR"        => "data-price-link-multiple"
							],
						false, ["HIDE_ICONS" => "Y"]
						);
					?>
					<div class="list">
						<?foreach($pricesArray as $linkInfo):?>
						<a href="<?=$linkInfo["LINK"]?>" target="_blank">
							<?=$linkInfo["TITLE"]?>
						</a>
						<?endforeach?>
					</div>
				</div>
			<?endif?>
		</div>
	</div>
	<?
	/* ------------------------------------------- */
	/* ----------------- map col ----------------- */
	/* ------------------------------------------- */
	?>
	<?if($cordinateX && $cordinateY):?>
	<div class="map-col">
		<h3><?=Loc::getMessage("AV_BASES_ELEMENT_MAP")?></h3>
		<div
			class="google-map"
			data-store-name="<?=$arResult["NAME"]?>"
			data-cordinate-x="<?=$cordinateX?>"
			data-cordinate-y="<?=$cordinateY?>"
		></div>
	</div>
	<?endif?>
	<?
	/* ------------------------------------------- */
	/* ------------- streams info col ------------ */
	/* ------------------------------------------- */
	?>
	<?if(count($arResult["BASE_STREAMS_INFO"])):?>
	<div class="streams-info-col">
		<h3 class="title">
			<span class="desktop"><?=Loc::getMessage("AV_BASES_ELEMENT_STREAMS_INFO")?></span>
			<span class="mobile"><?=Loc::getMessage("AV_BASES_ELEMENT_STREAMS_INFO_SHORT")?></span>
		</h3>
		<div class="item-list">
			<?foreach($arResult["BASE_STREAMS_INFO"] as $streamInfo):?>
			<div class="item<?if(!count($streamInfo["PHONES"]) && !$streamInfo["PRICE"]):?> no-info<?endif?>">
				<h3 class="title-block">
					<div class="title"><?=$streamInfo["TITLE"]?></div>
					<i class="icon fa fa-angle-down"></i>
				</h3>
				<div class="body">
					<div class="icon">
						<div style="width: <?=$streamInfo["ICON"]["WIDTH"]?>px;height: <?=$streamInfo["ICON"]["HEIGHT"]?>px">
							<?=$streamInfo["ICON"]["CONTENT"]?>
						</div>
					</div>
					<div class="phones">
						<?foreach($streamInfo["PHONES"] as $phone):?>
						<div>
							(<?=$phone[0].$phone[1].$phone[2]?>) <?=$phone[3].$phone[4].$phone[5]?> <?=$phone[6].$phone[7]?> <?=$phone[8].$phone[9]?>
						</div>
						<?endforeach?>
					</div>
				</div>
			</div>
			<?endforeach?>
		</div>
	</div>
	<?endif?>
	<?
	/* ------------------------------------------- */
	/* ---------------- detail col --------------- */
	/* ------------------------------------------- */
	?>
	<?if($arResult["DETAIL_TEXT"] || $arResult["DETAIL_PICTURE"]["SRC"]):?>
	<div class="detail-col">
		<h3><?=($arResult["PROPERTIES"]["additional_title"]["VALUE"] ? $arResult["PROPERTIES"]["additional_title"]["VALUE"] : Loc::getMessage("AV_BASES_ELEMENT_DETEIL"))?></h3>
		<div>
			<?if($arResult["DETAIL_PICTURE"]["SRC"]):?>
			<img
				src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"
				alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
				title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
				class="detail-image"
			>
			<?endif?>

			<?=$arResult["DETAIL_TEXT"]?>

			<?if($arParams["USE_SHARE"] == "Y"):?>
			<div class="share-block">
				<span><?=Loc::getMessage("AV_BASES_ELEMENT_SHARE_BLOCK_TITLE")?>:</span>
				<?
				$APPLICATION->IncludeComponent
					(
					"bitrix:main.share", $arParams["SHARE_TEMPLATE"],
						[
						"HANDLERS"   => $arParams["SHARE_HANDLERS"],
						"PAGE_TITLE" => $APPLICATION->GetTitle(),
						"PAGE_URL"   => CURRENT_PROTOCOL."://".SITE_SERVER_NAME.$APPLICATION->GetCurPage(false)
						],
					false, ["HIDE_ICONS" => "Y"]
					);
				?>
			</div>
			<?endif?>
		</div>
	</div>
	<?endif?>
	<?
	/* ------------------------------------------- */
	/* ---------------- action col --------------- */
	/* ------------------------------------------- */
	?>
	<?if($arResult["CURRENT_ACTION"]["TEXT"] || $arResult["CURRENT_ACTION"]["PICTURE"]):?>
	<div class="action-col">
		<h3><?=Loc::getMessage("AV_BASES_ELEMENT_CURRENT_ACTION")?></h3>
		<?if($arResult["CURRENT_ACTION"]["PICTURE"]):?>
		<img
			src="<?=$arResult["CURRENT_ACTION"]["PICTURE"]?>"
			alt="<?=$arResult["CURRENT_ACTION"]["NAME"]?>"
			title="<?=$arResult["CURRENT_ACTION"]["NAME"]?>"
			class="detail-image"
		>
		<?endif?>
		<?=$arResult["CURRENT_ACTION"]["TEXT"]?>
	</div>
	<?endif?>
	<?
	/* ------------------------------------------- */
	/* -------------- same bases col ------------- */
	/* ------------------------------------------- */
	?>
	<?if($sameArticles):?>
	<h3 class="av-spoiler-header" data-work-breakpoint="991"><?=Loc::getMessage("AV_BASES_ELEMENT_SAME_BASES", ["#NAME#" => $arResult["SECTION_INFO"]["NAME"]])?></h3>
	<div class="av-spoiler-body"><?=$sameArticles?></div>
	<?endif?>
	<?
	/* ------------------------------------------- */
	/* ---------------- back link ---------------- */
	/* ------------------------------------------- */
	?>
	<div class="buttons-col">
		<?
		if(count($arResult["ROOT_SECTION_INFO"]))
			$APPLICATION->IncludeComponent
				(
				"av:form.button", "av-alt",
					[
					"BUTTON_TYPE" => "link",
					"LINK"        => str_replace(["#SECTION_ID#", "#SECTION_CODE#"], [$arResult["ROOT_SECTION_INFO"]["ID"], $arResult["ROOT_SECTION_INFO"]["CODE"]], $arParams["SECTION_URL"]),
					"TITLE"       => Loc::getMessage("AV_BASES_ELEMENT_SECTION_LINK")
					],
				false, ["HIDE_ICONS" => "Y"]
				);
		$APPLICATION->IncludeComponent
			(
			"av:form.button", "av-alt",
				[
				"BUTTON_TYPE" => "link",
				"LINK"        => $arResult["LIST_PAGE_URL"],
				"TITLE"       => Loc::getMessage("AV_BASES_ELEMENT_LIST_LINK")
				],
			false, ["HIDE_ICONS" => "Y"]
			);
		?>
	</div>
</div>