<?
use \Bitrix\Main\Localization\Loc;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/* -------------------------------------------------------------------- */
/* ------------------------------- form ------------------------------- */
/* -------------------------------------------------------------------- */
?>
<?if($arResult["isFormNote"] != "Y"):?>
<div class="av-form-ajax" data-avat-form-id="<?=$arResult["arForm"]["ID"]?>">
	<?if($arResult["isFormErrors"] == "Y"):?>
	<div class="errors-block"><?=$arResult["FORM_ERRORS"]?></div>
	<?endif?>

	<?=$arResult["FORM_HEADER"]?>
		<?foreach($arResult["FIELDS"] as $fieldInfo):?>
		<div>
			<?
			/* ------------------------------------------- */
			/* -------------- checkbox list -------------- */
			/* ------------------------------------------- */
			?>
			<?if($fieldInfo["TYPE"] == "checkbox"):?>
				<?
				$APPLICATION->IncludeComponent
					(
					"av:form.select", "av-form-checkbox",
						[
						"NAME"     => $fieldInfo["NAME"],
						"VALUE"    => $fieldInfo["VALUE"],
						"LIST"     => $fieldInfo["LIST"],
						"TITLE"    => $fieldInfo["TITLE"],
						"REQUIRED" => $fieldInfo["REQUIRED"]
						],
					false, ["HIDE_ICONS" => "Y"]
					);
				?>
			<?
			/* ------------------------------------------- */
			/* --------------- radio list ---------------- */
			/* ------------------------------------------- */
			?>
			<?elseif($fieldInfo["TYPE"] == "radio"):?>
				<?
				$APPLICATION->IncludeComponent
					(
					"av:form.select", "av-form-radio",
						[
						"NAME"     => $fieldInfo["NAME"],
						"VALUE"    => $fieldInfo["VALUE"],
						"LIST"     => $fieldInfo["LIST"],
						"TITLE"    => $fieldInfo["TITLE"],
						"REQUIRED" => $fieldInfo["REQUIRED"]
						],
					false, ["HIDE_ICONS" => "Y"]
					);
				?>
			<?
			/* ------------------------------------------- */
			/* ------------------ list ------------------- */
			/* ------------------------------------------- */
			?>
			<?elseif($fieldInfo["TYPE"] == "dropdown"):?>
				<?
				$APPLICATION->IncludeComponent
					(
					"av:form.select", "av-form",
						[
						"NAME"        => $fieldInfo["NAME"],
						"VALUE"       => $fieldInfo["VALUE"],
						"LIST"        => $fieldInfo["LIST"],
						"TITLE"       => $fieldInfo["TITLE"],
						"EMPTY_TITLE" => Loc::getMessage("AV_FORM_AJAX_LIST_EMPTY_TITLE"),
						"REQUIRED"    => $fieldInfo["REQUIRED"]
						],
					false, ["HIDE_ICONS" => "Y"]
					);
				?>
			<?
			/* ------------------------------------------- */
			/* ---------------- textarea ----------------- */
			/* ------------------------------------------- */
			?>
			<?elseif($fieldInfo["TYPE"] == "textarea"):?>
				<?
				$APPLICATION->IncludeComponent
					(
					"av:form.textarea", "av-form",
						[
						"NAME"     => $fieldInfo["NAME"],
						"VALUE"    => $fieldInfo["VALUE"],
						"TITLE"    => $fieldInfo["TITLE"],
						"REQUIRED" => $fieldInfo["REQUIRED"]
						],
					false, ["HIDE_ICONS" => "Y"]
					);
				?>
			<?
			/* ------------------------------------------- */
			/* ------------------ phone ------------------ */
			/* ------------------------------------------- */
			?>
			<?elseif($fieldInfo["TYPE"] == "phone"):?>
				<?
				$APPLICATION->IncludeComponent
					(
					"av:form.input.phone", "av-form",
						[
						"NAME"     => $fieldInfo["NAME"],
						"VALUE"    => $fieldInfo["VALUE"],
						"TITLE"    => $fieldInfo["TITLE"],
						"REQUIRED" => $fieldInfo["REQUIRED"]
						],
					false, ["HIDE_ICONS" => "Y"]
					);
				?>
			<?
			/* ------------------------------------------- */
			/* ---------------- file/image --------------- */
			/* ------------------------------------------- */
			?>
			<?elseif($fieldInfo["TYPE"] == "file" || $fieldInfo["TYPE"] == "image"):?>
				<?
				$APPLICATION->IncludeComponent
					(
					"av:form.file", "av-form",
						[
						"NAME"     => $fieldInfo["NAME"],
						"VALUE"    => $fieldInfo["VALUE"],
						"TITLE"    => $fieldInfo["TITLE"],
						"REQUIRED" => $fieldInfo["REQUIRED"]
						],
					false, ["HIDE_ICONS" => "Y"]
				);
				?>
			<?
			/* ------------------------------------------- */
			/* ------------------ input ------------------ */
			/* ------------------------------------------- */
			?>
			<?else:?>
				<?
				$APPLICATION->IncludeComponent
					(
					"av:form.input", "av-form",
						[
						"NAME"     => $fieldInfo["NAME"],
						"VALUE"    => $fieldInfo["VALUE"],
						"TITLE"    => $fieldInfo["TITLE"],
						"REQUIRED" => $fieldInfo["REQUIRED"]
						],
					false, ["HIDE_ICONS" => "Y"]
					);
				?>
			<?endif?>
		</div>
		<?endforeach?>

		<div class="buttons-row">
			<?
			$APPLICATION->IncludeComponent
				(
				"av:form.button", "av",
					[
					"BUTTON_TYPE" => "label",
					"TITLE"       => Loc::getMessage("AV_FORM_AJAX_SUBMIT"),
					"ATTR"        => "data-submit-button"
					],
				false, ["HIDE_ICONS" => "Y"]
				);
			?>
		</div>
	<?=$arResult["FORM_FOOTER"]?>
</div>
<?endif?>
<?
/* -------------------------------------------------------------------- */
/* -------------------------------- JS -------------------------------- */
/* -------------------------------------------------------------------- */
?>
<script>
	BX.message({"AV_FORM_AJAX_FORM_VALIDATION_ALERT": "<?=Loc::getMessage("AV_FORM_AJAX_FORM_VALIDATION_ALERT")?>"});
	BX.message({"AV_FORM_AJAX_RESULT_OK_MESSAGE"    : "<?=Loc::getMessage("AV_FORM_AJAX_RESULT_OK_MESSAGE")?>"});
</script>