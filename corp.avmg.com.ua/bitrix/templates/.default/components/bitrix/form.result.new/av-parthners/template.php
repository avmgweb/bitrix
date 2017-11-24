<?
use \Bitrix\Main\Localization\Loc;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/* -------------------------------------------------------------------- */
/* --------------------------- form sended ---------------------------- */
/* -------------------------------------------------------------------- */
?>
<?if($arResult["isFormNote"] == "Y"):?>
	<h3><?=Loc::getMessage("AV_FORM_PARTHNERS_FORM_TITLE")?></h3>
	<div class="av-form-parthners-result-ok"><?=Loc::getMessage("AV_FORM_PARTHNERS_RESULT_OK")?></div>
<?endif?>
<?
/* -------------------------------------------------------------------- */
/* ------------------------------- page ------------------------------- */
/* -------------------------------------------------------------------- */
?>
<?if($arResult["isFormNote"] != "Y" && (COption::GetOptionString("main", "new_user_registration") == "Y" || $USER->IsAuthorized())):?>
	<?
	/* ------------------------------------------- */
	/* ------------------ title ------------------ */
	/* ------------------------------------------- */
	?>
	<div class="av-form-parthners-title">
		<?=Loc::getMessage("AV_FORM_PARTHNERS_MAIN_TITLE")?>
	</div>
	<?
	/* ------------------------------------------- */
	/* ------------------ text ------------------- */
	/* ------------------------------------------- */
	?>
	<div class="av-form-parthners-text">
		<div>
			<div class="av-form-parthners-work-button authorize<?if($USER->IsAuthorized()):?> passed unactive<?endif?>">
				<div>1</div>
				<div><?=Loc::getMessage("AV_FORM_PARTHNERS_BUTTON_REGISTER")?></div>
				<div></div>
			</div>
			<?$APPLICATION->IncludeComponent("bitrix:main.include", "", ["AREA_FILE_SHOW" => "file", "PATH" => "/include/partners/left_column.php"])?>
		</div>
		<div>
			<div class="av-form-parthners-work-button form-link<?if(!$USER->IsAuthorized()):?> unactive<?endif?>">
				<div>2</div>
				<div><?=Loc::getMessage("AV_FORM_PARTHNERS_BUTTON_FORM_LINK")?></div>
				<div></div>
			</div>
			<?$APPLICATION->IncludeComponent("bitrix:main.include", "", ["AREA_FILE_SHOW" => "file", "PATH" => "/include/partners/right_column.php"])?>
		</div>
	</div>
	<?
	/* ------------------------------------------- */
	/* ------------------ form ------------------- */
	/* ------------------------------------------- */
	?>
	<?if($USER->IsAuthorized()):?>
	<div class="av-form-parthners" data-avat-form-id="<?=$arResult["arForm"]["ID"]?>">
		<h3><?=Loc::getMessage("AV_FORM_PARTHNERS_FORM_TITLE")?></h3>

		<?if($arResult["isFormErrors"] == "Y"):?>
		<div class="errors-block"><?=$arResult["FORM_ERRORS"]?></div>
		<?endif?>

		<?=$arResult["FORM_HEADER"]?>
			<?
			/* ---------------------------- */
			/* ------- left column -------- */
			/* ---------------------------- */
			?>
			<div class="left-column">
				<div>
					<div class="title">
						<?=Loc::getMessage("AV_FORM_PARTHNERS_FORM_BLOCK_MAIN")?>
					</div>

					<?foreach(["Name_company", "adress", "city", "post_index"] as $fieldCode):?>
					<div class="field-row">
						<?
						$APPLICATION->IncludeComponent
							(
							"av:form.input", "av-form",
								[
								"NAME"     => $arResult["FIELDS"][$fieldCode]["NAME"],
								"VALUE"    => $arResult["FIELDS"][$fieldCode]["VALUE"],
								"TITLE"    => $arResult["FIELDS"][$fieldCode]["TITLE"],
								"REQUIRED" => $arResult["FIELDS"][$fieldCode]["REQUIRED"]
								],
							false, ["HIDE_ICONS" => "Y"]
							);
						?>
					</div>
					<?endforeach?>

					<div class="field-row">
						<?
						$APPLICATION->IncludeComponent
							(
							"av:form.select", "av-form-radio-flat",
								[
								"NAME"     => $arResult["FIELDS"]["law_status"]["NAME"],
								"VALUE"    => $arResult["FIELDS"]["law_status"]["VALUE"],
								"TITLE"    => $arResult["FIELDS"]["law_status"]["TITLE"],
								"LIST"     => $arResult["FIELDS"]["law_status"]["LIST"],
								"REQUIRED" => $arResult["FIELDS"]["law_status"]["REQUIRED"]
								],
							false, ["HIDE_ICONS" => "Y"]
							);
						?>
					</div>
				</div>
				<div>
					<div class="title">
						<?=Loc::getMessage("AV_FORM_PARTHNERS_FORM_BLOCK_DELIVERY")?>
					</div>

					<?foreach(["adress_delivery_documents", "city_for_delivery", "post_index_delivery"] as $fieldCode):?>
					<div class="field-row">
						<?
						$APPLICATION->IncludeComponent
							(
							"av:form.input", "av-form",
								[
								"NAME"     => $arResult["FIELDS"][$fieldCode]["NAME"],
								"VALUE"    => $arResult["FIELDS"][$fieldCode]["VALUE"],
								"TITLE"    => $arResult["FIELDS"][$fieldCode]["TITLE"],
								"REQUIRED" => $arResult["FIELDS"][$fieldCode]["REQUIRED"]
								],
							false, ["HIDE_ICONS" => "Y"]
							);
						?>
					</div>
					<?endforeach?>
				</div>
			</div>
			<?
			/* ---------------------------- */
			/* ------- right column ------- */
			/* ---------------------------- */
			?>
			<div class="right-column">
				<div class="title">
					<?=Loc::getMessage("AV_FORM_PARTHNERS_FORM_BLOCK_COMPANY_AGENT")?>
				</div>

				<?foreach(["last_name", "name_secondname", "position", "email"] as $fieldCode):?>
				<div class="field-row">
					<?
					$APPLICATION->IncludeComponent
						(
						"av:form.input", "av-form",
							[
							"NAME"     => $arResult["FIELDS"][$fieldCode]["NAME"],
							"VALUE"    => $arResult["FIELDS"][$fieldCode]["VALUE"],
							"TITLE"    => $arResult["FIELDS"][$fieldCode]["TITLE"],
							"REQUIRED" => $arResult["FIELDS"][$fieldCode]["REQUIRED"]
							],
						false, ["HIDE_ICONS" => "Y"]
						);
					?>
				</div>
				<?endforeach?>

				<?foreach(["phone", "phone_additional"] as $fieldCode):?>
				<div class="field-row">
					<?
					$APPLICATION->IncludeComponent
						(
						"av:form.input.phone", "av-form",
							[
							"NAME"     => $arResult["FIELDS"][$fieldCode]["NAME"],
							"VALUE"    => $arResult["FIELDS"][$fieldCode]["VALUE"],
							"TITLE"    => $arResult["FIELDS"][$fieldCode]["TITLE"],
							"REQUIRED" => $arResult["FIELDS"][$fieldCode]["REQUIRED"]
							],
						false, ["HIDE_ICONS" => "Y"]
						);
					?>
				</div>
				<?endforeach?>

				<div class="field-row">
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
			/* ---------------------------- */
			/* --------- buttons ---------- */
			/* ---------------------------- */
			?>
			<div class="buttons-row">
				<?
				$APPLICATION->IncludeComponent
					(
					"av:form.button", "av",
						[
						"BUTTON_TYPE" => "submit",
						"NAME"        => "web_form_submit",
						"TITLE"       => Loc::getMessage("AV_FORM_PARTHNERS_SUBMIT"),
						"ATTR"        => "submit-button"
						],
					false, ["HIDE_ICONS" => "Y"]
					);
				?>
			</div>
		<?=$arResult["FORM_FOOTER"]?>
	</div>
	<?endif?>
<?endif?>
<?
/* -------------------------------------------------------------------- */
/* -------------------------------- JS -------------------------------- */
/* -------------------------------------------------------------------- */
?>
<script>
	BX.message({"AV_FORM_PARTHNERS_FORM_VALIDATION_ALERT": "<?=Loc::getMessage("AV_FORM_PARTHNERS_FORM_VALIDATION_ALERT")?>"});
	BX.message({"AV_FORM_PARTHNERS_RESULT_OK_MESSAGE"    : "<?=Loc::getMessage("AV_FORM_PARTHNERS_RESULT_OK_MESSAGE")?>"});

	<?if($arResult["isFormNote"] == "Y"):?>
	AvBlurScreen("on", 1000);
	CreateAvAlertPopup(BX.message("AV_FORM_PARTHNERS_RESULT_OK_MESSAGE"), "ok")
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