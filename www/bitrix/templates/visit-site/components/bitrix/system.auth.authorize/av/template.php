<?
use \Bitrix\Main\Localization\Loc;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

CJSCore::Init(["av"]);
AvComponentsIncludings::getInstance()->setIncludings("av", "visit_site.user.panel");
?>
<div class="av-auth-alt">
	<div class="title"><?=Loc::getMessage("AV_AUTH_ALT_TITLE")?></div>
	<div class="text"><?=Loc::getMessage("AV_AUTH_ALT_TEXT")?></div>
	<div class="buttons-cell">
		<?
		$APPLICATION->IncludeComponent
			(
			"av:form.button", "av-alt",
				[
				"BUTTON_TYPE" => 'label',
				"TITLE"       => Loc::getMessage("AV_AUTH_ALT_LINK"),
				"ATTR"        => 'data-login-form-link'
				],
			false, ["HIDE_ICONS" => 'Y']
			);
		?>
	</div>
</div>
