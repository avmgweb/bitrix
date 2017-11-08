<?
use \Bitrix\Main\Localization\Loc;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

CJSCore::Init(["av_form_elements"]);
/* -------------------------------------------------------------------- */
/* --------------------------- form sended ---------------------------- */
/* -------------------------------------------------------------------- */
?>
<?if($arResult["isFormNote"] == "Y"):?>
<div class="av-form-career-result-ok"><?=Loc::getMessage("AV_FORM_CAREER_RESULT_OK")?></div>
<?endif?>
<?
/* -------------------------------------------------------------------- */
/* ------------------------------- form ------------------------------- */
/* -------------------------------------------------------------------- */
?>
<?if($arResult["isFormNote"] != "Y"):?>
<div class="av-form-career" data-avat-form-id="<?=$arResult["arForm"]["ID"]?>">
	<?if($arResult["isFormErrors"] == "Y"):?>
	<div class="errors-block"><?=$arResult["FORM_ERRORS"]?></div>
	<?endif?>

	<?=$arResult["FORM_HEADER"]?>
		<?foreach($arResult["FIELDS"] as $fieldCode => $fieldInfo):?>
			<?if($fieldCode != "comments" && $fieldCode != "upload_file"):?>
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
							"EMPTY_TITLE" => Loc::getMessage("AV_FORM_CAREER_LIST_EMPTY_TITLE"),
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
			<?endif?>
		<?endforeach?>
		<?
		/* ------------------------------------------- */
		/* ------------ upload file block ------------ */
		/* ------------------------------------------- */
		?>
		<div class="upload-file-cell">
			<?
			$APPLICATION->IncludeComponent
				(
				"av:form.file", "av-form",
					[
					"NAME"     => $arResult["FIELDS"]["upload_file"]["NAME"],
					"VALUE"    => $arResult["FIELDS"]["upload_file"]["VALUE"],
					"TITLE"    => $arResult["FIELDS"]["upload_file"]["TITLE"],
					"REQUIRED" => $arResult["FIELDS"]["upload_file"]["REQUIRED"]
					],
				false, ["HIDE_ICONS" => "Y"]
				);
			?>
			<?if(count($arResult["FIELDS"]["upload_file"]["VALIDATORS"])):?>
			<ul class="validation-info">
				<?foreach($arResult["FIELDS"]["upload_file"]["VALIDATORS"] as $arrayInfo):?>
				<li>
					<?if($arrayInfo["NAME"]     == "file_size"):?><?=Loc::getMessage("AV_FORM_CAREER_FORM_VALIDATION_FILE_SIZE", ["#SIZE#" => ceil($arrayInfo["PARAMS"]["SIZE_TO"]/1048576)])?>
					<?elseif($arrayInfo["NAME"] == "file_type"):?><?=Loc::getMessage("AV_FORM_CAREER_FORM_VALIDATION_FILE_TYPE", ["#TYPE#" => implode(", ", explode(",", $arrayInfo["PARAMS"]["EXT"]))])?>
					<?endif?>
				</li>
				<?endforeach?>
			</ul>
			<?endif?>
		</div>
		<?
		/* ------------------------------------------- */
		/* ------------- comments block -------------- */
		/* ------------------------------------------- */
		?>
		<div class="comments-cell">
			<?
			$APPLICATION->IncludeComponent
				(
				"av:form.checkbox", "av-form",
					[
					"NAME"    => "comments-trigger",
					"CHECKED" => $arResult["FIELDS"]["comments"]["VALUE"] ? "Y" : "N",
					"TITLE"   => Loc::getMessage("AV_FORM_CAREER_COMMENTS_TRIGGER")
					],
				false, ["HIDE_ICONS" => "Y"]
				);
			?>
			<div class="text-block<?if(!$fieldInfo["VALUE"]):?> hidden-field<?endif?>">
				<?
				$APPLICATION->IncludeComponent
					(
					"av:form.textarea", "av-form",
						[
						"NAME"     => $arResult["FIELDS"]["comments"]["NAME"],
						"VALUE"    => $arResult["FIELDS"]["comments"]["VALUE"],
						"TITLE"    => $arResult["FIELDS"]["comments"]["TITLE"],
						"REQUIRED" => $arResult["FIELDS"]["comments"]["REQUIRED"]
						],
					false, ["HIDE_ICONS" => "Y"]
					);
				?>
			</div>
		</div>
		<?
		/* ------------------------------------------- */
		/* ----------------- buttons ----------------- */
		/* ------------------------------------------- */
		?>
		<div class="buttons-row">
			<?
			$APPLICATION->IncludeComponent
				(
				"av:form.button", "av",
					[
					"BUTTON_TYPE" => "submit",
					"NAME"        => "web_form_submit",
					"TITLE"       => Loc::getMessage("AV_FORM_CAREER_SUBMIT")
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
	BX.message({"AV_FORM_CAREER_FORM_VALIDATION_ALERT": "<?=Loc::getMessage("AV_FORM_CAREER_FORM_VALIDATION_ALERT")?>"});
	BX.message({"AV_FORM_CAREER_RESULT_OK_MESSAGE"    : "<?=Loc::getMessage("AV_FORM_CAREER_RESULT_OK_MESSAGE")?>"});

	<?if($arResult["isFormNote"] == "Y"):?>
	AvBlurScreen("on", 1000);
	CreateAvAlertPopup(BX.message("AV_FORM_CAREER_RESULT_OK_MESSAGE"), "ok")
		.positionCenter(1100, "Y")
		.onClickout(function()
			{
			$(this).remove();
			})
		.on("remove", function()
			{
			AvBlurScreen("off");
			});
	<?endif?>
</script>