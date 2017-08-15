<div class="form-catalogFlex">
	<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
	$APPLICATION->AddHeadScript($templateFolder."/script.js");
	?>
	<?if($arResult["isFormNote"] == "Y"):?>
		<div id="form-anwer123" hidden>
			<span id="popUp-text-fromForm">
				<br><span>Спасибо за заявку!<br>Наш эксперт свяжется с вами в течении дня.</span><br>
			</span>
		</div>
		<script>
			ShowPopUp();changeUrl();
		</script>
	<?endif?> 
	
	<div class="text-uppercase text-center title-form-1"><span>укажите имя и телефон<br>наш менеджер свяжется с вами</span></div>
	<?=$arResult["FORM_HEADER"]?><div class="av-form-wrap-2">
		<?
		/* --------------------------------------------------------------------- */
		/* ------------------------------ ошибки ------------------------------- */
		/* --------------------------------------------------------------------- */
		?>
		<?if($arResult["isFormErrors"] == "Y"):?>
			<?=$arResult["FORM_ERRORS_TEXT"]?>
	<script> 
	$('.av-form-wrap-2  input,.av-form-wrap-2 textarea').each(function() {
		if($(this).val()) {$(this).prev(".av-form-wrap-2 span[title]").attr("up", true)}
	});
		/*,CreateAvAlertPopup2($("[call-back-form]").html(),"").positionCenter(99999).on("remove",function(){AvBlurScreen("off"),$("body").removeClass("stop-scrolling"))}*/
	</script>
		<?endif?>
		<span data-form-input-error-123 >Пожалуйста, введите корректные данные!</span>
		<?
		/* --------------------------------------------------------------------- */
		/* ------------------------------- поля -------------------------------- */
		/* --------------------------------------------------------------------- */
		?>
		<?foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion):?>
			<?
			$fieldTypes = [];
			foreach($arQuestion["STRUCTURE"] as $fieldInfo) $fieldTypes[] = $fieldInfo["FIELD_TYPE"];
			?>
			<div
				 class="fom-row <?if($arQuestion["REQUIRED"] == "Y"):?>required<?endif?>"
				<?if($arResult['FORM_ERRORS'][$FIELD_SID]):?>form-error<?endif?>
			>
				<span title><?=$arQuestion["CAPTION"]?></span>
				<?
				if($FIELD_SID == 'comments') $arQuestion["HTML_CODE"] = str_replace('value=""', 'value="'.$arParams["CALL_ITEM_TITLE"].'" style="display: none"', $arQuestion["HTML_CODE"]);
				?>
				<?=$arQuestion["HTML_CODE"]?>
			</div>
		<?endforeach?>
	
		<?
		/* --------------------------------------------------------------------- */
		/* ------------------------------ Submit ------------------------------- */
		/* --------------------------------------------------------------------- */
		?>
	<div class="text-center">
					<input <?=(intval($arResult["F_RIGHT"]) < 10 ? "disabled=\"disabled\"" : "");?> type="submit" name="web_form_submit" value="<?=htmlspecialcharsbx(strlen(trim($arResult["arForm"]["BUTTON"])) <= 0 ? GetMessage("FORM_ADD") : $arResult["arForm"]["BUTTON"]);?>" />
	</div></div><?=$arResult["FORM_FOOTER"]?><script>checkFormYYYY();</script>
<br></div>