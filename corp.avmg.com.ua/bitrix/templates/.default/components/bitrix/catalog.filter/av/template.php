<?
use \Bitrix\Main\Localization\Loc;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
?>
<form
	class="
		av-filter
		<?if($arParams["MARKUP_TYPE"] == 'TWO_COLUMNS'):?>two-columns<?endif?>
		"
	name="<?=$arResult["FILTER_NAME"]."_form"?>"
	action="<?=$arResult["FORM_ACTION"]?>"
	method="get"
>
	<?=implode('', $arResult["HIDDEN_FIELDS"])?>
	<?
	/* ------------------------------------------- */
	/* ------------------ fields ----------------- */
	/* ------------------------------------------- */
	?>
	<?foreach($arResult["FIELDS"] as $field => $fieldInfo):?>
	<div class="field-row">
		<?
		if($fieldInfo["TYPE"] == 'IBLOCK_ELEMENT')
			$APPLICATION->IncludeComponent
				(
				"av:form.iblock.search.element", 'av',
					[
					"NAME"              => $fieldInfo["INPUT_NAME"],
					"VALUE"             => $fieldInfo["INPUT_VALUE"],
					"TITLE"             => $fieldInfo["NAME"],
					"IBLOCK_ID"         => $fieldInfo["IBLOCK_ID"],
					"EMPTY_RESULT_TEXT" => Loc::getMessage("AV_FILTER_IBLOCK_EMPTY_RESULT")
					],
				false, ["HIDE_ICONS" => 'Y']
				);
		elseif($fieldInfo["TYPE"] == 'SELECT')
			$APPLICATION->IncludeComponent
				(
				"av:form.select", 'av',
					[
					"NAME"  => $fieldInfo["INPUT_NAME"],
					"VALUE" => $fieldInfo["INPUT_VALUE"],
					"TITLE" => $fieldInfo["NAME"],
					"LIST"  => $fieldInfo["VALUE_LIST"]
					],
				false, ["HIDE_ICONS" => 'Y']
				);
		elseif($fieldInfo["TYPE"] == 'SELECT_MULTIPLE')
			$APPLICATION->IncludeComponent
				(
				"av:form.select.multiple", 'av',
					[
					"NAME"  => $fieldInfo["INPUT_NAME"],
					"VALUE" => $fieldInfo["INPUT_VALUE"],
					"TITLE" => $fieldInfo["NAME"],
					"LIST"  => $fieldInfo["VALUE_LIST"]
					],
				false, ["HIDE_ICONS" => 'Y']
				);
		elseif($fieldInfo["TYPE"] == 'RADIO')
			$APPLICATION->IncludeComponent
				(
				"av:form.select", 'av_alt',
					[
					"NAME"  => $fieldInfo["INPUT_NAME"],
					"VALUE" => $fieldInfo["INPUT_VALUE"],
					"TITLE" => $fieldInfo["NAME"],
					"LIST"  => $fieldInfo["VALUE_LIST"]
					],
				false, ["HIDE_ICONS" => 'Y']
				);
		elseif($fieldInfo["TYPE"] == 'LINKS_LIST')
			$APPLICATION->IncludeComponent
				(
				"av:form.links_list", 'av',
					[
					"VALUE" => $fieldInfo["INPUT_VALUE"],
					"TITLE" => $fieldInfo["NAME"],
					"LIST"  => $fieldInfo["VALUE_LIST"]
					],
				false, ["HIDE_ICONS" => 'Y']
				);
		elseif($fieldInfo["TYPE"] == 'SEARCH')
			$APPLICATION->IncludeComponent
				(
				"av:form.input", 'av_search',
					[
					"NAME"        => $fieldInfo["INPUT_NAME"],
					"VALUE"       => $fieldInfo["INPUT_VALUE"],
					"TITLE"       => $fieldInfo["NAME"],
					"PLACEHOLDER" => Loc::getMessage("AV_FILTER_SEARCH_PLACEHOLDER")
					],
				false, ["HIDE_ICONS" => 'Y']
				);
		?>
	</div>
	<?endforeach?>
	<?
	/* ------------------------------------------- */
	/* ----------------- buttons ----------------- */
	/* ------------------------------------------- */
	?>
	<input class="submit-button" type="submit" name="set_filter">
	<?if($arResult["FILTER_APPLIED"]):?>
	<div class="cancel-button">
		<?
		if($arParams["LIST_URL"] && $arParams["SAVE_IN_SESSION"] != 'Y')
			$APPLICATION->IncludeComponent
				(
				"av:form.button", "av_alt2",
					[
					"BUTTON_TYPE" => 'link',
					"LINK"        => $arParams["LIST_URL"],
					"TITLE"       => Loc::getMessage("AV_FILTER_CANCEL_FILTER"),
					"ATTR"        => ["rel" => 'nofollow']
					],
				false, ["HIDE_ICONS" => 'Y']
				);
		else
			$APPLICATION->IncludeComponent
				(
				"av:form.button", "av_alt2",
					[
					"NAME"  => 'del_filter',
					"TITLE" => Loc::getMessage("AV_FILTER_CANCEL_FILTER"),
					"ATTR"  => 'cancel-button'
					],
				false, ["HIDE_ICONS" => 'Y']
				);
		?>
	</div>
	<?endif?>
</form>