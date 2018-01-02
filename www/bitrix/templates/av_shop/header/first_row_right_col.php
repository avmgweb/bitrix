<?
use \Bitrix\Main\Localization\Loc;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$filePathExplode = explode(SITE_TEMPLATE_PATH, __FILE__);
Loc::loadMessages($filePathExplode[0].SITE_TEMPLATE_PATH."/template.php");
/* -------------------------------------------------------------------- */
/* ----------------------------- faq link ----------------------------- */
/* -------------------------------------------------------------------- */
?>
<div class="faq-cell">
	<a class="page-active-block" href="<?=$templateVariables["FAQ_LINK"]?>" title="<?=strtolower(Loc::getMessage("AV_SHOP_FAQ"))?>">
		<img
			src="<?=SITE_TEMPLATE_PATH?>/images/faq.svg"
			alt="<?=strtolower(Loc::getMessage("AV_SHOP_FAQ"))?>"
			title="<?=strtolower(Loc::getMessage("AV_SHOP_FAQ"))?>"
		>
		<?=Loc::getMessage("AV_SHOP_FAQ")?>
	</a>
</div>
<?
/* -------------------------------------------------------------------- */
/* --------------------------- support link --------------------------- */
/* -------------------------------------------------------------------- */
?>
<div class="support-cell">
	<a class="page-active-block" href="<?=$templateVariables["SUPPORT_LINK"]?>" title="<?=strtolower(Loc::getMessage("AV_SHOP_SUPPORT"))?>">
		<img
			src="<?=SITE_TEMPLATE_PATH?>/images/support.svg"
			alt="<?=strtolower(Loc::getMessage("AV_SHOP_SUPPORT"))?>"
			title="<?=strtolower(Loc::getMessage("AV_SHOP_SUPPORT"))?>"
		>
		<?=Loc::getMessage("AV_SHOP_SUPPORT")?>
	</a>
</div>
<?
/* -------------------------------------------------------------------- */
/* ----------------------------- geo block ---------------------------- */
/* -------------------------------------------------------------------- */
?>
<div class="geo-block-cell">
	<div class="page-active-block av-shop-popup-call-block" data-type="geo-block" data-call-type="onclick" tabindex="0">
		<img
			src="<?=SITE_TEMPLATE_PATH?>/images/map.svg"
			alt="<?=strtolower(Loc::getMessage("AV_SHOP_YOUR_CITY"))?>"
			title="<?=strtolower(Loc::getMessage("AV_SHOP_YOUR_CITY"))?>"
		>
		<div class="title">#YOUR CITY#</div>
		<i class="call-button fa fa-angle-down"></i>
	</div>
	<div class="av-shop-popup" data-type="geo-block">
		#GEO BLOCK#
	</div>
</div>
<?
/* -------------------------------------------------------------------- */
/* ---------------------------- user block ---------------------------- */
/* -------------------------------------------------------------------- */
?>
<div class="user-cell">
	<?
	$APPLICATION->IncludeComponent
		(
		"av:visit_site.user.panel", "",
			[
			"USER_MENU_TYPE" => "user",

			"FORGOT_PASSWORD_URL"              => "/personal/forgot_password/",
			"REGISTRATION_SHOW_FIELDS"         => ["EMAIL", "NAME", "LAST_NAME", "PERSONAL_MOBILE"],
			"REGISTRATION_SHOW_USER_PROPS"     => [],
			"REGISTRATION_REQUIRED_FIELDS"     => [],
			"REGISTRATION_REQUIRED_USER_PROPS" => []
			],
		false, ["HIDE_ICONS" => true]
		);
	?>
</div>
<?
/* -------------------------------------------------------------------- */
/* ------------------------------ basket ------------------------------ */
/* -------------------------------------------------------------------- */
?>
<div class="basket-cell">
	<?=$basketLineHtml?>
</div>