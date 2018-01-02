<?
use \Bitrix\Main\Localization\Loc;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/* -------------------------------------------------------------------- */
/* ------------------------------ pager ------------------------------- */
/* -------------------------------------------------------------------- */
?>
<form method="post" name="form1" action="<?=$arResult["FORM_TARGET"]?>" enctype="multipart/form-data" class="av-user-profile">
	<?=$arResult["BX_SESSION_CHECK"]?>
	<input type="hidden" name="lang" value="<?=LANG?>">
	<input type="hidden" name="ID"   value="<?=$arResult["ID"]?>">

	<?if($arResult["strProfileError"]):?>
	<div class="error-block">
		<?ShowError($arResult["strProfileError"])?>
	</div>
	<?endif?>

	<?if($arResult["DATA_SAVED"] == "Y"):?>
	<div class="notes-block">
		<?ShowNote(Loc::getMessage("PROFILE_DATA_SAVED"))?>
	</div>
	<?endif?>
	<?
	/* ------------------------------------------- */
	/* ------------------- form ------------------ */
	/* ------------------------------------------- */
	?>
	<div class="form-block">
		<h3><?=Loc::getMessage("AV_MAIN_PROFILE_FORM_TITLE")?></h3>
		<div class="field-row">
			<?
			$APPLICATION->IncludeComponent
				(
				"av:form.input", "av-form",
					[
					"NAME"     => "LOGIN",
					"VALUE"    => $arResult["arUser"]["LOGIN"],
					"TITLE"    => Loc::getMessage("AV_MAIN_PROFILE_LOGIN"),
					"REQUIRED" => "Y"
					],
				false, ["HIDE_ICONS" => "Y"]
				);
			?>
		</div>
		<div class="field-row">
			<?
			$APPLICATION->IncludeComponent
				(
				"av:form.input", "av-form",
					[
					"NAME"     => "NAME",
					"VALUE"    => $arResult["arUser"]["NAME"],
					"TITLE"    => Loc::getMessage("AV_MAIN_PROFILE_NAME"),
					"REQUIRED" => "Y"
					],
				false, ["HIDE_ICONS" => "Y"]
				);
			?>
		</div>
		<div class="field-row">
			<?
			$APPLICATION->IncludeComponent
				(
				"av:form.input", "av-form",
					[
					"NAME"  => "LAST_NAME",
					"VALUE" => $arResult["arUser"]["LAST_NAME"],
					"TITLE" => Loc::getMessage("AV_MAIN_PROFILE_LAST_NAME")
					],
				false, ["HIDE_ICONS" => "Y"]
				);
			?>
		</div>
		<div class="field-row">
			<?
			$APPLICATION->IncludeComponent
				(
				"av:form.input", "av-form",
					[
					"NAME"  => "SECOND_NAME",
					"VALUE" => $arResult["arUser"]["SECOND_NAME"],
					"TITLE" => Loc::getMessage("AV_MAIN_PROFILE_SECOND_NAME"),
					],
				false, ["HIDE_ICONS" => "Y"]
				);
			?>
		</div>
		<div class="field-row">
			<?
			$APPLICATION->IncludeComponent
				(
				"av:form.input", "av-form",
					[
					"NAME"     => "EMAIL",
					"VALUE"    => $arResult["arUser"]["EMAIL"],
					"TITLE"    => Loc::getMessage("AV_MAIN_PROFILE_EMAIL"),
					"REQUIRED" => $arResult["EMAIL_REQUIRED"] ? "Y" : "N"
					],
				false, ["HIDE_ICONS" => "Y"]
				);
			?>
		</div>
		<div class="field-row">
			<?
			$APPLICATION->IncludeComponent
				(
				"av:form.input.phone", "av-form",
					[
					"NAME"  => "PERSONAL_MOBILE",
					"VALUE" => $arResult["arUser"]["PERSONAL_MOBILE"],
					"TITLE" => Loc::getMessage("AV_MAIN_PROFILE_USER_MOBILE")
					],
				false, ["HIDE_ICONS" => "Y"]
				);
			?>
		</div>
		<div class="field-row">
			<?
			$APPLICATION->IncludeComponent
				(
				"av:form.input.password", "av-form",
					[
					"NAME"  => "NEW_PASSWORD",
					"TITLE" => Loc::getMessage("AV_MAIN_PROFILE_NEW_PASSWORD")
					],
				false, ["HIDE_ICONS" => "Y"]
				);
			?>
		</div>
		<div class="field-row">
			<?
			$APPLICATION->IncludeComponent
				(
				"av:form.input.password", "av-form",
					[
					"NAME"  => "NEW_PASSWORD_CONFIRM",
					"TITLE" => Loc::getMessage("AV_MAIN_PROFILE_NEW_PASSWORD_CONFIRM")
					],
				false, ["HIDE_ICONS" => "Y"]
				);
			?>
		</div>
	</div>
	<?
	/* ------------------------------------------- */
	/* ------------------ image ------------------ */
	/* ------------------------------------------- */
	?>
	<div class="image-block">
		<input class="photo-upload-input" name="PERSONAL_PHOTO" type="file">
		<?
		$APPLICATION->IncludeComponent
			(
			"av:form.button", "av-alt",
				[
				"BUTTON_TYPE" => "label",
				"TITLE"       => Loc::getMessage("AV_MAIN_PROFILE_PHOTO_UPLOAD"),
				"ATTR"        => "data-upload-photo-button"
				],
			false, ["HIDE_ICONS" => "Y"]
			);
		?>
		<?if($arResult["USER_PHOTO_URL"]):?>
			<img
				class="user-photo"
				src="<?=$arResult["USER_PHOTO_URL"]?>"
				title="<?=Loc::getMessage("AV_MAIN_PROFILE_USER_TITLE")?>"
				alt="<?=Loc::getMessage("AV_MAIN_PROFILE_USER_TITLE")?>"
			>
		<?else:?>
			<i class="user-guest fa fa-user-circle"></i>
		<?endif?>
		<?if($arResult["arUser"]["PERSONAL_PHOTO"]):?>
		<span class="delete-link" tabindex="0">
			<?=Loc::getMessage("AV_MAIN_PROFILE_PHOTO_DELETE")?>
		</span>
		<input class="photo-delete-input" name="PERSONAL_PHOTO_del" type="checkbox" value="Y" title="">
		<?endif?>
	</div>
	<?
	/* ------------------------------------------- */
	/* ----------------- buttons ----------------- */
	/* ------------------------------------------- */
	?>
	<div class="buttons-block">
		<?
		$APPLICATION->IncludeComponent
			(
			"av:form.button", "av",
				[
				"BUTTON_TYPE" => "submit",
				"NAME"        => "save",
				"TITLE"       => Loc::getMessage("AV_MAIN_PROFILE_SAVE"),
				"ATTR"        => "submit-button"
				],
			false, ["HIDE_ICONS" => "Y"]
			);
		?>
	</div>
</form>
<?
/* -------------------------------------------------------------------- */
/* -------------------------------- JS -------------------------------- */
/* -------------------------------------------------------------------- */
?>
<script>
	BX.message({"AV_MAIN_PROFILE_FORM_VALIDATION_ALERT": "<?=Loc::getMessage("AV_MAIN_PROFILE_FORM_VALIDATION_ALERT")?>"});
</script>