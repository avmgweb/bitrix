<?
use \Bitrix\Main\Localization\Loc;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/* -------------------------------------------------------------------- */
/* ------------------------------- form ------------------------------- */
/* -------------------------------------------------------------------- */
?>
<?if($arResult["isFormNote"] != 'Y'):?>
<div class="av-form-ajax" data-avat-form-id="<?=$arResult["arForm"]["ID"]?>">
	<?if($arResult["isFormErrors"] == 'Y'):?>
	<div class="errors-block"><?=$arResult["FORM_ERRORS"]?></div>
	<?endif?>

	<?=$arResult["FORM_HEADER"]?>
		<input type="hidden" name="web_form_submit" value="Y">
		<?foreach($arResult["FIELDS"] as $fieldCode => $fieldInfo):?>
		<div class="field-row <?=$fieldCode?>">
			<?
			$fieldComponentParams =
				[
				"TYPE"     => 'input',
				"NAME"     => $fieldInfo["NAME"],
				"VALUE"    => $fieldInfo["VALUE"],
				"TITLE"    => $fieldInfo["TITLE"],
				"REQUIRED" => $fieldInfo["REQUIRED"]
				];

			switch($fieldInfo["TYPE"])
				{
				case "textarea": $fieldComponentParams["TYPE"] = 'textarea';                                                break;
				case "password": $fieldComponentParams["TYPE"] = 'password';                                                break;
				case "date"    : $fieldComponentParams["TYPE"] = 'date';                                                    break;
				case "radio"   : $fieldComponentParams["TYPE"] = 'radio';$fieldComponentParams["LIST"] = $fieldInfo["LIST"];break;
				case "dropdown": $fieldComponentParams["TYPE"] = 'list'; $fieldComponentParams["LIST"] = $fieldInfo["LIST"];break;
				case "file"    :
				case "image"   : $fieldComponentParams["TYPE"] = 'file';                                                    break;
				case "email"   : $fieldComponentParams["TYPE"] = 'input';                                                   break;
				}
			if($fieldCode == 'contact_phone') $fieldComponentParams["TYPE"] = 'phone';

			$APPLICATION->IncludeComponent
				(
				"av:form_elements", "av_site",
				$fieldComponentParams,
				false, ["HIDE_ICONS" => 'Y']
				);
			?>
		</div>
		<?endforeach?>

		<div class="buttons-row">
			<?
			$APPLICATION->IncludeComponent
				(
				"av:form.button", "av",
					[
					"BUTTON_TYPE" => 'label',
					"TITLE"       => Loc::getMessage("AV_FORM_AJAX_SUBMIT"),
					"ATTR"        =>'data-submit-button'
					]
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
	BX.message({"AV_FORM_AJAX_FORM_VALIDATION_ALERT": '<?=Loc::getMessage("AV_FORM_AJAX_FORM_VALIDATION_ALERT")?>'});
	BX.message({"AV_FORM_AJAX_RESULT_OK_MESSAGE"    : '<?=Loc::getMessage("AV_FORM_AJAX_RESULT_OK_MESSAGE")?>'});
</script>