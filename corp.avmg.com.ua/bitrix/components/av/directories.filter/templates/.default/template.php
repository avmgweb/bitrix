<?
use \Bitrix\Main\Localization\Loc;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
?>
<form method="POST" class="av-directories-filter">
	<?
	/* ------------------------------------------- */
	/* ----------------- fields ------------------ */
	/* ------------------------------------------- */
	?>
	<?foreach($arResult["FIELDS_INFO"] as $fieldInfo):?>
	<div class="field-row <?=$fieldInfo["FIELD"]?>">
		<?
		if($fieldInfo["TYPE"] == "LIST" && $fieldInfo["FIELD"] == "IBLOCK_ID")
			$APPLICATION->IncludeComponent
				(
				"av:form.select", "av-alt",
					[
					"NAME"  => $fieldInfo["NAME"],
					"VALUE" => $fieldInfo["VALUE"],
					"LIST"  => $fieldInfo["LIST"],
					"TITLE" => Loc::getMessage("AV_DIRECTORIES_FILTER_IBLOCK_LIST_DEFAULT")
					],
				false, ["HIDE_ICONS" => 'Y']
				);
		elseif($fieldInfo["TYPE"] == "SEARCH" && $fieldInfo["FIELD"] == "NAME")
			$APPLICATION->IncludeComponent
				(
				"av:form.input", "av-search",
					[
					"NAME"        => $fieldInfo["NAME"],
					"VALUE"       => $fieldInfo["VALUE"],
					"PLACEHOLDER" => Loc::getMessage("AV_DIRECTORIES_FILTER_SEARCH_PLACEHOLDER")
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
	<button class="submit-button" name="<?=$arResult["SUBMIT_NAME"]?>">submit</button>
	<?if($arResult["FILTER_APPLIED"]):?>
	<div class="cancel-button">
		<?
		$APPLICATION->IncludeComponent
			(
			"av:form.button", "av-alt2",
				[
				"TYPE"  => 'button',
				"NAME"  => $arResult["CANCEL_NAME"],
				"TITLE" => Loc::getMessage("AV_DIRECTORIES_FILTER_CANCEL_BUTTON")
				],
			false, ["HIDE_ICONS" => 'Y']
			);
		?>
	</div>
	<?endif?>
</form>