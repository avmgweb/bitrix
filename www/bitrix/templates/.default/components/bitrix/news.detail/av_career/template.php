<?
use \Bitrix\Main\Localization\Loc;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$cityTitle = strip_tags($arResult["DISPLAY_PROPERTIES"]["city"]["DISPLAY_VALUE"]);
/* -------------------------------------------------------------------- */
/* -------------------------- same articles --------------------------- */
/* -------------------------------------------------------------------- */
$sameArticles = '';
if(count($arParams["CATEGORY_APPLIED_FILTER"]))
	{
	ob_start();
	foreach($arParams["CATEGORY_APPLIED_FILTER"] as $iblockId => $filterArrayIndex)
		$APPLICATION->IncludeComponent
			(
			"bitrix:news.list", "av_career_same_articles",
				[
				"AJAX_MODE"           => 'N',
				"AJAX_OPTION_JUMP"    => '',
				"AJAX_OPTION_STYLE"   => '',
				"AJAX_OPTION_HISTORY" => '',

				"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
				"IBLOCK_ID"   => $iblockId,
				"NEWS_COUNT"  => $arParams["CATEGORY_ITEMS_COUNT"],

				"SORT_BY1"    => 'ID',
				"SORT_ORDER1" => 'ASC',
				"SORT_BY2"    => 'NAME',
				"SORT_ORDER2" => 'ASC',

				"FILTER_NAME"   => $filterArrayIndex,
				"FIELD_CODE"    => array("NAME", "DATE_ACTIVE_FROM"),
				"PROPERTY_CODE" => array("city", "type_vacancy"),
				"CHECK_DATES"   => $arParams["CHECK_DATES"],

				"DETAIL_URL"  => $arParams["DETAIL_URL"],
				"SECTION_URL" => $arParams["SECTION_URL"],
				"IBLOCK_URL"  => $arParams["IBLOCK_URL"],

				"PREVIEW_TRUNCATE_LEN"      => $arParams["PREVIEW_TRUNCATE_LEN"],
				"ACTIVE_DATE_FORMAT"        => $arParams["ACTIVE_DATE_FORMAT"],
				"SET_TITLE"                 => 'N',
				"SET_BROWSER_TITLE"         => 'N',
				"SET_META_KEYWORDS"         => 'N',
				"SET_META_DESCRIPTION"      => 'N',
				"SET_LAST_MODIFIED"         => $arParams["SET_LAST_MODIFIED"],
				"INCLUDE_IBLOCK_INTO_CHAIN" => 'N',
				"ADD_SECTIONS_CHAIN"        => 'N',
				"HIDE_LINK_WHEN_NO_DETAIL"  => $arParams["HIDE_LINK_WHEN_NO_DETAIL"],
				"PARENT_SECTION"            => '',
				"PARENT_SECTION_CODE"       => '',
				"INCLUDE_SUBSECTIONS"       => 'Y',
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
			false, ["HIDE_ICONS" => 'Y']
			);
	$sameArticles = ob_get_contents();
	ob_end_clean();
	}
/* -------------------------------------------------------------------- */
/* ------------------------------- page ------------------------------- */
/* -------------------------------------------------------------------- */
?>
<div class="av-career-detail">
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
	/* ---------------- info cell ---------------- */
	/* ------------------------------------------- */
	?>
	<div class="info-cell">
		<?
		$infoArray =
			[
			Loc::getMessage("AV_CAREER_VIEW_ACTIVE_DATE")           => explode(' ', $arResult["FIELDS"]["DATE_ACTIVE_FROM"])[0],
			$arResult["DISPLAY_PROPERTIES"]["type_job"]    ["NAME"] => $arResult["DISPLAY_PROPERTIES"]["type_job"]    ["DISPLAY_VALUE"],
			$arResult["DISPLAY_PROPERTIES"]["city"]        ["NAME"] => $cityTitle,
			$arResult["DISPLAY_PROPERTIES"]["type_vacancy"]["NAME"] => $arResult["DISPLAY_PROPERTIES"]["type_vacancy"]["DISPLAY_VALUE"],
			];
		foreach($infoArray as $index => $value)
			if(!$index || !$value)
				unset($infoArray[$index]);
		?>
		<?if(count($infoArray)):?>
		<table>
			<?foreach($infoArray as $title => $value):?>
			<tr>
				<th><?=$title?>:</th>
				<td><?=$value?></td>
			</tr>
			<?endforeach?>
		</table>
		<?endif?>

		<?if($arParams["USE_SHARE"] == 'Y'):?>
		<div class="share-block-title"><?=Loc::getMessage("AV_CAREER_VIEW_SHARE_TITLE")?></div>
		<?
		$APPLICATION->IncludeComponent
			(
			"bitrix:main.share", $arParams["SHARE_TEMPLATE"],
				[
				"HANDLERS"   => $arParams["SHARE_HANDLERS"],
				"PAGE_TITLE" => $APPLICATION->GetTitle(),
				"PAGE_URL"   => CURRENT_PROTOCOL.'://'.SITE_SERVER_NAME.$APPLICATION->GetCurPage(false)
				],
			false, ["HIDE_ICONS" => 'Y']
			);
		?>
		<?endif?>
	</div>
	<?
	/* ------------------------------------------- */
	/* -------------- picture cell --------------- */
	/* ------------------------------------------- */
	?>
	<img
		src="<?=$arResult["DETAIL_PICTURE"]["SRC"] ? $arResult["DETAIL_PICTURE"]["SRC"] : $this->GetFolder().'/images/default_image.jpg'?>"
		alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
		title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
		class="detail-image"
	>
	<?
	/* ------------------------------------------- */
	/* ------------ description cell ------------- */
	/* ------------------------------------------- */
	?>
	<div class="descr-cell">
		<?=$arResult["FIELDS"]["DETAIL_TEXT"]?>
	</div>
	<?
	/* ------------------------------------------- */
	/* ---------------- form cell ---------------- */
	/* ------------------------------------------- */
	?>
	<div class="form-cell">
		<h3><?=Loc::getMessage("AV_CAREER_VIEW_FORM_CELL_TITLE")?></h3>
		<?
		if($arParams["WEBFORM_ID"])
			$APPLICATION->IncludeComponent
				(
				"bitrix:form.result.new", $arParams["WEBFORM_TEMPLATE"],
					[
					"AJAX_MODE"           => 'Y',
					"AJAX_OPTION_JUMP"    => 'N',
					"AJAX_OPTION_STYLE"   => 'N',
					"AJAX_OPTION_HISTORY" => 'N',

					"SEF_MODE"    => 'N',
					"WEB_FORM_ID" => $arParams["WEBFORM_ID"],

					"START_PAGE"     => 'new',
					"SHOW_LIST_PAGE" => 'N',
					"SHOW_EDIT_PAGE" => 'N',
					"SHOW_VIEW_PAGE" => 'N',
					"SUCCESS_URL"    => $APPLICATION->GetCurPage(false),

					"SHOW_ANSWER_VALUE"      => 'N',
					"SHOW_ADDITIONAL"        => 'N',
					"SHOW_STATUS"            => 'N',
					"EDIT_ADDITIONAL"        => 'N',
					"EDIT_STATUS"            => 'N',
					"IGNORE_CUSTOM_TEMPLATE" => 'N',
					"USE_EXTENDED_ERRORS"    => 'N',

					"CACHE_TYPE" => 'A',
					"CACHE_TIME" => 360000
					],
				false, ["HIDE_ICONS" => 'Y']
				);
		?>
		<div class="support-text">
			<?=Loc::getMessage("AV_CAREER_VIEW_FORM_SUPPORT_TEXT")?>
		</div>
	</div>
	<?
	/* ------------------------------------------- */
	/* ----------- same articles cell ------------ */
	/* ------------------------------------------- */
	?>
	<?if($sameArticles):?>
	<div class="same-articles-cell">
		<h3 class="av-spoiler-header" data-work-breakpoint="991">
			<?=Loc::getMessage("AV_CAREER_VIEW_SAME_BASES", ["#NAME#" => $cityTitle])?>
		</h3>
		<div class="av-spoiler-body"><?=$sameArticles?></div>
	</div>
	<?endif?>
	<?
	/* ------------------------------------------- */
	/* -------------- buttons cell --------------- */
	/* ------------------------------------------- */
	?>
	<div class="buttons-cell">
		<?
		$APPLICATION->IncludeComponent
			(
			"av:form.button", "av-alt",
				[
				"BUTTON_TYPE" => 'link',
				"LINK"        => $arResult["LIST_PAGE_URL"],
				"TITLE"       => Loc::getMessage("AV_CAREER_VIEW_BACK_LINK")
				],
			false, ["HIDE_ICONS" => 'Y']
			);
		?>
	</div>
</div>