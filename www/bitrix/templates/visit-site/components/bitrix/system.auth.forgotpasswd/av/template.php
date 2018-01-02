<?
use \Bitrix\Main\Localization\Loc;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if($USER->IsAuthorized())                                       return;
?>
<form class="av-forgotpass-form" name="bform" method="post" action="<?=$arResult["AUTH_URL"]?>">
	<?if($arResult["BACKURL"]):?>
	<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>">
	<?endif?>
	<input type="hidden" name="AUTH_FORM" value="Y">
	<input type="hidden" name="TYPE" value="SEND_PWD">
	<input type="hidden" name="USER_EMAIL">

	<div class="title"><?=Loc::getMessage("AV_FORGOT_PASS_TITLE")?></div>
	<div class="text"><?=Loc::getMessage("AV_FORGOT_PASS_TEXT")?></div>

	<div class="input-row">
		<?
		$APPLICATION->IncludeComponent
			(
			"av:form.input", "av-form",
				[
				"NAME"  => 'USER_LOGIN',
				"TITLE" => Loc::getMessage("AV_FORGOT_PASS_INPUT_TITLE"),
				"VALUE" => $arResult["LAST_LOGIN"]
				],
			false, ["HIDE_ICONS" => 'Y']
			);
		?>
	</div>

	<?if($arResult["USE_CAPTCHA"]):?>
	<div class="captcha-row">
		<input type="hidden" name="captcha_sid" value="<?=$arResult["CAPTCHA_CODE"]?>">
		<img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHA_CODE"]?>" alt="CAPTCHA" title="CAPTCHA">
		<?
		$APPLICATION->IncludeComponent
			(
			"av:form.input", "av-form",
				[
				"NAME"  => 'captcha_word',
				"TITLE" => Loc::getMessage("AV_FORGOT_PASS_CAPCHA_TITLE"),
				"ATTR"  => ["autocomplete" => 'off']
				],
			false, ["HIDE_ICONS" => 'Y']
			);
		?>
	</div>
	<?endif?>

	<div class="button-row">
		<?
		$APPLICATION->IncludeComponent
			(
			"av:form.button", "av",
				[
				"BUTTON_TYPE" => 'submit',
				"NAME"        => 'send_account_info',
				"TITLE"       => Loc::getMessage("AV_FORGOT_PASS_SUBMIT_TITLE")
				],
			false, ["HIDE_ICONS" => 'Y']
			);
		?>
	</div>
</form>