<?
use \Bitrix\Main\Localization\Loc;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$filePathExplode = explode(SITE_TEMPLATE_PATH, __FILE__);
Loc::loadMessages($filePathExplode[0].SITE_TEMPLATE_PATH."/header.php");
/* -------------------------------------------------------------------- */
/* ----------------------------- faq link ----------------------------- */
/* -------------------------------------------------------------------- */
?>
<div class="faq-cell">
	<?=$faqLinkHtml?>
</div>
<?
/* -------------------------------------------------------------------- */
/* --------------------------- support link --------------------------- */
/* -------------------------------------------------------------------- */
?>
<div class="support-cell">
	<?=$supportLinkHtml?>
</div>
<?
/* -------------------------------------------------------------------- */
/* ----------------------------- geo block ---------------------------- */
/* -------------------------------------------------------------------- */
?>
<div class="geo-block-cell">
	<div class="link-block av-shop-popup-call-block" data-type="geo-block" data-call-type="onclick" tabindex="0">
		<img
			src="<?=SITE_TEMPLATE_PATH?>/images/map.svg"
			alt="<?=Loc::getMessage("AV_SHOP_YOUR_CITY")?>"
			title="<?=Loc::getMessage("AV_SHOP_YOUR_CITY")?>"
		>
		<div class="title">#YOUR CITY#</div>
		<div class="call-button"></div>
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
			array(
			"USER_MENU_TYPE" => "user",

			"REGISTRATION_SHOW_FIELDS"         => array("EMAIL", "NAME", "LAST_NAME", "PERSONAL_MOBILE"),
			"REGISTRATION_SHOW_USER_PROPS"     => array(),
			"REGISTRATION_REQUIRED_FIELDS"     => array(),
			"REGISTRATION_REQUIRED_USER_PROPS" => array()
			)
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