<?
use \Bitrix\Main\Localization\Loc;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/* -------------------------------------------------------------------- */
/* ---------------------- auth/registration form ---------------------- */
/* -------------------------------------------------------------------- */
?>
<?if(count($arResult["AUTH"]) || count($arResult["REGISTER"])):?>
<div id="av-auth-mobile-guest-bar" class="av-auth-form-call-button">
	<img
		src="<?=$this->GetFolder()?>/images/user_default_icon.png"
		alt="<?=Loc::getMessage("AV_AUTH_MOBILE_LOGIN_TITLE")?>"
		title="<?=Loc::getMessage("AV_AUTH_MOBILE_LOGIN_TITLE")?>"
	>
	<span><?=Loc::getMessage("AV_AUTH_MOBILE_LOGIN_TEXT")?></span>
</div>
<?endif?>
<?
/* -------------------------------------------------------------------- */
/* ---------------------------- logined bar --------------------------- */
/* -------------------------------------------------------------------- */
?>
<?if(count($arResult["LOGINED"])):?>
<div id="av-auth-mobile-user-panel">
	<img
		src="<?=$arResult["LOGINED"]["USER_PHOTO"] ? $arResult["LOGINED"]["USER_PHOTO"] : $this->GetFolder().'/images/user_default_icon.png'?>"
		alt="<?=$arResult["LOGINED"]["USER_NAME"]?>"
		title="<?=$arResult["LOGINED"]["USER_NAME"]?>"
	>
	<span><?=$arResult["LOGINED"]["USER_NAME"]?></span>
	<div></div>
</div>

<form id="av-auth-mobile-user-menu">
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
	<button class="menu-item logout" name="logout_butt"><?=Loc::getMessage("AV_AUTH_MOBILE_LOGOUT_BUTTON")?></button>
</form>
<?endif?>