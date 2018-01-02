<?
use
	\Bitrix\Main\Page\Asset,
	\Bitrix\Main\Localization\Loc;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

CJSCore::Init(["av_form_elements"]);
Asset::getInstance()->addJs("https://www.google.com/recaptcha/api.js");
/* -------------------------------------------------------------------- */
/* ---------------------- auth/registration form ---------------------- */
/* -------------------------------------------------------------------- */
?>
<?if(count($arResult["AUTH"]) || count($arResult["REGISTER"])):?>
<?
$formTabActive = 'auth';
if (count($arResult["REGISTER"]["ERRORS"]) && !count($arResult["AUTH"]["ERRORS"])) $formTabActive = 'register';
/* ------------------------------------------- */
/* -------------- call form bar -------------- */
/* ------------------------------------------- */
?>
<div id="av-auth-guest-bar" class="av-auth-form-call-button">
	<img
		src="<?=$this->GetFolder()?>/images/user_default_icon.png"
		alt="<?=Loc::getMessage("AV_AUTH_LOGIN_TITLE")?>"
		title="<?=Loc::getMessage("AV_AUTH_LOGIN_TITLE")?>"
	>
	<?=Loc::getMessage("AV_AUTH_LOGIN_LINK")?>
</div>
<?
/* ------------------------------------------- */
/* ------------------ form ------------------- */
/* ------------------------------------------- */
?>
<div id="av-auth-guest-form">
	<?
	/* ---------------------------- */
	/* ----------- menu ----------- */
	/* ---------------------------- */
	?>
	<ul class="form-menu">
		<?if(count($arResult["AUTH"])):?>
		<li class="auth<?if($formTabActive == 'auth'):?> active<?endif?>">
			<?=Loc::getMessage("AV_AUTH_GUEST_FORM_MENU_LOGIN")?>
		</li>
		<?endif?>

		<?if(count($arResult["REGISTER"])):?>
		<li class="register<?if($formTabActive == 'register'):?> active<?endif?>">
			<?=Loc::getMessage("AV_AUTH_GUEST_FORM_MENU_REGISTRATION")?>
		</li>
		<?endif?>
	</ul>
	<div class="close-form-button"></div>
	<?
	/* ---------------------------- */
	/* --------- auth form -------- */
	/* ---------------------------- */
	?>
	<?if(count($arResult["AUTH"])):?>
	<form
		name="<?=$arResult["AUTH"]["FORM_NAME"]?>"
		method="post"
		class="auth<?if($formTabActive == 'auth'):?> active<?endif?>"
	>
		<input type="hidden" name="AUTH_FORM" value="Y">
		<input type="hidden" name="TYPE" value="AUTH">

		<?if(count($arResult["AUTH"]["ERRORS"])):?>
		<div class="errors-block">
			<?=implode('<br>', $arResult["AUTH"]["ERRORS"])?>
		</div>
		<?endif?>

		<?
		$APPLICATION->IncludeComponent
			(
			"av:form.input", "av-form",
				[
				"NAME"     => $arResult["AUTH"]["FORM_FIELDS"]["LOGIN"]["INPUT_NAME"],
				"VALUE"    => $arResult["AUTH"]["FORM_FIELDS"]["LOGIN"]["VALUE"],
				"TITLE"    => $arResult["AUTH"]["FORM_FIELDS"]["LOGIN"]["TITLE"],
				"REQUIRED" => 'Y'
				],
			false, ["HIDE_ICONS" => 'Y']
			);
		$APPLICATION->IncludeComponent
			(
			"av:form.input.password", "av-form",
				[
				"NAME"     => $arResult["AUTH"]["FORM_FIELDS"]["PASS"]["INPUT_NAME"],
				"TITLE"    => $arResult["AUTH"]["FORM_FIELDS"]["PASS"]["TITLE"],
				"REQUIRED" => 'Y'
				],
			false, ["HIDE_ICONS" => 'Y']
			);
		?>

		<?if($arResult["AUTH"]["STORE_PASSWORD"]):?>
		<div class="remember-me-cell">
			<?
			$APPLICATION->IncludeComponent
				(
				"av:form.checkbox", "av-form",
					[
					"NAME"  => $arResult["AUTH"]["FORM_FIELDS"]["REMEMBER_ME"]["INPUT_NAME"],
					"TITLE" => Loc::getMessage("AV_AUTH_GUEST_FORM_REMEMBER_ME")
					],
				false, ["HIDE_ICONS" => 'Y']
				);
			?>
		</div>
		<?endif?>

		<?if($arParams["FORGOT_PASSWORD_URL"]):?>
		<a href="<?=$arParams["FORGOT_PASSWORD_URL"]?>" rel="nofollow">
			<?=Loc::getMessage("AV_AUTH_GUEST_FORM_FORGOTE_PASS")?>
		</a>
		<?endif?>

		<?
		$APPLICATION->IncludeComponent
			(
			"av:form.button", "av",
				[
				"NAME"  => $arResult["AUTH"]["SUBMIT_BUTTON_NAME"],
				"TITLE" => Loc::getMessage("AV_AUTH_GUEST_FORM_SUBMIT")
				],
			false, ["HIDE_ICONS" => 'Y']
			);
		?>

		<?if(count($arResult["AUTH"]["SOC_SERVICES"])):?>
		<div class="soc-services-block">
			<div class="title"><?=Loc::getMessage("AV_AUTH_GUEST_FORM_SOC_SERVICES_TITLE")?></div>
			<?
			$APPLICATION->IncludeComponent
				(
				"bitrix:socserv.auth.form", "av",
				["AUTH_SERVICES"  => $arResult["AUTH"]["SOC_SERVICES"]],
				false, ["HIDE_ICONS" => 'Y']
				);
			?>
		</div>
		<?endif?>
	</form>
	<?endif?>
	<?
	/* ---------------------------- */
	/* ------- registration ------- */
	/* ---------------------------- */
	?>
	<?if(count($arResult["REGISTER"])):?>
	<form
		name="<?=$arResult["REGISTER"]["FORM_NAME"]?>"
		enctype="multipart/form-data"
		method="post"
		class="register<?if($formTabActive == 'register'):?> active<?endif?>"
	>
		<?if(count($arResult["REGISTER"]["ERRORS"])):?>
		<div class="errors-block">
			<?=implode('<br>', $arResult["REGISTER"]["ERRORS"])?>
		</div>
		<?endif?>

		<?foreach($arResult["REGISTER"]["FORM_FIELDS"] as $field => $fieldArray):?>
		<div>
			<?
			if($field == "PERSONAL_MOBILE")
				$APPLICATION->IncludeComponent
					(
					"av:form.input.phone", "av-form",
						[
						"NAME"     => $fieldArray["INPUT_NAME"],
						"VALUE"    => $fieldArray["VALUE"],
						"TITLE"    => $fieldArray["TITLE"],
						"REQUIRED" => $fieldArray["REQUIRED"]
						],
					false, ["HIDE_ICONS" => 'Y']
					);
			elseif($field == "PASSWORD" || $field == "CONFIRM_PASSWORD")
				$APPLICATION->IncludeComponent
					(
					"av:form.input.password", "av-form",
						[
						"NAME"     => $fieldArray["INPUT_NAME"],
						"VALUE"    => $fieldArray["VALUE"],
						"TITLE"    => $fieldArray["TITLE"],
						"REQUIRED" => $fieldArray["REQUIRED"]
						],
					false, ["HIDE_ICONS" => 'Y']
					);
			else
				$APPLICATION->IncludeComponent
					(
					"av:form.input", "av-form",
						[
						"NAME"     => $fieldArray["INPUT_NAME"],
						"VALUE"    => $fieldArray["VALUE"],
						"TITLE"    => $fieldArray["TITLE"],
						"REQUIRED" => $fieldArray["REQUIRED"]
						],
					false, ["HIDE_ICONS" => 'Y']
					);
			?>
		</div>
		<?endforeach?>

		<?if($arResult["REGISTER"]["RECAPTCHA_SITEKEY"]):?>
		<div data-sitekey="<?=$arResult["REGISTER"]["RECAPTCHA_SITEKEY"]?>" class="g-recaptcha captcha-block"></div>
		<?endif?>

		<?
		$APPLICATION->IncludeComponent
			(
			"av:form.button", "av",
				[
				"NAME"  => $arResult["REGISTER"]["SUBMIT_BUTTON_NAME"],
				"TITLE" => Loc::getMessage("AV_AUTH_GUEST_FORM_REGISTER")
				],
			false, ["HIDE_ICONS" => 'Y']
			);
		?>
	</form>
	<?endif?>
</div>
<?endif?>
<?
/* -------------------------------------------------------------------- */
/* ---------------------------- logined bar --------------------------- */
/* -------------------------------------------------------------------- */
?>
<?if(count($arResult["LOGINED"])):?>
<div id="av-auth-user-panel">
	<img
		src="<?=$arResult["LOGINED"]["USER_PHOTO"] ? $arResult["LOGINED"]["USER_PHOTO"] : $this->GetFolder().'/images/user_default_icon.png'?>"
		alt="<?=$arResult["LOGINED"]["USER_NAME"]?>"
		title="<?=$arResult["LOGINED"]["USER_NAME"]?>"
	>
	<span><?=$arResult["LOGINED"]["USER_NAME"]?></span>
	<div></div>
</div>

<form id="av-auth-user-menu">
	<?
	if($arParams["USER_MENU_TYPE"])
		$APPLICATION->IncludeComponent
			(
			"bitrix:menu", "av_user",
				[
				"ROOT_MENU_TYPE"     => $arParams["USER_MENU_TYPE"],
				"MAX_LEVEL"          => 1,
				"CHILD_MENU_TYPE"    => '',
				"USE_EXT"            => 'Y',
				"DELAY"              => 'N',
				"ALLOW_MULTI_SELECT" => 'N',

				"MENU_CACHE_TYPE"       => 'N',
				"MENU_CACHE_TIME"       => '',
				"MENU_CACHE_USE_GROUPS" => ''
				],
			false, ["HIDE_ICONS" => 'Y']
			);
	?>

	<input type="hidden" name="logout" value="yes">
	<button name="logout_butt"><?=Loc::getMessage("AV_AUTH_LOGINED_LOGOUT_BUTTON")?></button>
</form>
<?endif?>
<?
/* -------------------------------------------------------------------- */
/* -------------------------------- JS -------------------------------- */
/* -------------------------------------------------------------------- */
?>
<script>
	BX.message({"AV_REGISTER_FORM_VALIDATION_ERROR": '<?=Loc::getMessage("AV_AUTH_REGISTER_FORM_SUBMIT_ERROR")?>'});

	<?if($arResult["REGISTER"]["CONFIRM_EMAIL_SENDED"]):?>
	AvBlurScreen("on", 1000);
	CreateAvAlertPopup('<?=Loc::getMessage("AV_AUTH_REGISTER_FORM_SUCCESS")?>', "ok")
		.positionCenter(1100, 'Y')
		.onClickout(function()
			{
			$(this).remove();
			})
		.on("remove", function()
			{
			AvBlurScreen("off");
			});
	<?endif?>

	<?if(count($arResult["AUTH"]["ERRORS"]) || count($arResult["REGISTER"]["ERRORS"])):?>
	GetAvAuthForm().activateAvAuthForm();
	<?endif?>
</script>