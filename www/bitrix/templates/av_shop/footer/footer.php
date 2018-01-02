<?
use \Bitrix\Main\Localization\Loc;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$filePathExplode = explode(SITE_TEMPLATE_PATH, __FILE__);
Loc::loadMessages($filePathExplode[0].SITE_TEMPLATE_PATH."/template.php");
/* -------------------------------------------------------------------- */
/* ------------------------------- menu ------------------------------- */
/* -------------------------------------------------------------------- */
?>
<div class="menu-cell">
	<?
	$APPLICATION->IncludeComponent
		(
		"bitrix:menu", "av-shop-bottom",
			[
			"ROOT_MENU_TYPE"     => "bottom",
			"MAX_LEVEL"          => 2,
			"CHILD_MENU_TYPE"    => "bottom",
			"USE_EXT"            => "Y",
			"DELAY"              => "N",
			"ALLOW_MULTI_SELECT" => "N",

			"MENU_CACHE_TYPE"       => "A",
			"MENU_CACHE_TIME"       => 360000,
			"MENU_CACHE_USE_GROUPS" => "Y",

			"COLUMS_COUNT" => 3
			],
		false, ["HIDE_ICONS" => "Y"]
		)
	?>
</div>
<?
/* -------------------------------------------------------------------- */
/* ------------------------- additional links ------------------------- */
/* -------------------------------------------------------------------- */
?>
<div class="additional-links-cell">
	<a href="<?=$templateVariables["COMPANY_BASES_LINK"]?>" title="<?=strtolower(Loc::getMessage("AV_SHOP_BASES"))?>" target="_blank" rel="nofollow">
		<?=Loc::getMessage("AV_SHOP_BASES")?>
	</a>
	<a href="<?=$templateVariables["COMPANY_CAREER_LINK"]?>" title="<?=strtolower(Loc::getMessage("AV_SHOP_CAREER"))?>" target="_blank" rel="nofollow">
		<?=Loc::getMessage("AV_SHOP_CAREER")?>
	</a>
	<a href="<?=$templateVariables["SUPPORT_LINK"]?>" title="<?=strtolower(Loc::getMessage("AV_SHOP_SUPPORT"))?>" rel="nofollow">
		<?=Loc::getMessage("AV_SHOP_SUPPORT")?>
	</a>
</div>
<?
/* -------------------------------------------------------------------- */
/* ---------------------------- info block ---------------------------- */
/* -------------------------------------------------------------------- */
?>
<div class="info-cell">
	<a class="co-link" href="<?=$templateVariables["COMPANY_CONTACTS_LINK"]?>" title="<?=strtolower(Loc::getMessage("AV_SHOP_CO"))?>" target="_blank" rel="nofollow">
		<?=Loc::getMessage("AV_SHOP_CO")?>
	</a>

	<div class="contacts">
		<?
		$APPLICATION->IncludeFile
			(
			"/include/contacts.php",
				[
				"COUNTRY" => $templateVariables["COMPANY_INFO"]["COUNTRY"],
				"CITY"    => $templateVariables["COMPANY_INFO"]["CITY"],
				"STREET"  => $templateVariables["COMPANY_INFO"]["STREET"],
				"EMAIL"   => $templateVariables["COMPANY_INFO"]["EMAIL"],
				"PHONES"  => $templateVariables["COMPANY_INFO"]["PHONES"]
				],
			["MODE" => "php"]
			);
		?>
	</div>

	<?
	$hotLineTitle = $templateVariables["COMPANY_INFO"]["HOT_LINE"];
	$hotLineTitle = str_replace("+38", "", $hotLineTitle);
	$hotLineTitle = str_replace(["(", ")", "-"], ["", "", " "], $hotLineTitle);
	$hotLineTitle = trim($hotLineTitle);
	$hotLineLink  = str_replace(["(", ")", "-", " "], "", $templateVariables["COMPANY_INFO"]["HOT_LINE"]);
	?>
	<a class="hot-line" href="tel:<?=$hotLineLink?>" rel="nofollow">
		<?=$hotLineTitle?>
	</a>

	<a class="company-link" href="<?=$templateVariables["COMPANY_INFO"]["SITE"]?>" title="<?=strtolower(Loc::getMessage("AV_SHOP_COMPANY_SITE"))?>" target="_blank" rel="nofollow">
		<?=Loc::getMessage("AV_SHOP_COMPANY_SITE")?>
	</a>
</div>
<?
/* -------------------------------------------------------------------- */
/* ---------------------------- info block ---------------------------- */
/* -------------------------------------------------------------------- */
?>
<div class="separator"></div>
<?
/* -------------------------------------------------------------------- */
/* ----------------------------- subscibe ----------------------------- */
/* -------------------------------------------------------------------- */
?>
<div class="subscibe-cell">
	<?
	$APPLICATION->IncludeComponent
		(
		"bitrix:sender.subscribe", "av-shop",
			[
			"USE_PERSONALIZATION" => "Y",
			"CONFIRMATION"        => "N",
			"SHOW_HIDDEN"         => "N",
			"SET_TITLE"           => "N",

			"AJAX_MODE"           => "Y",
			"AJAX_OPTION_JUMP"    => "Y",
			"AJAX_OPTION_STYLE"   => "N",
			"AJAX_OPTION_HISTORY" => "N",

			"CACHE_TYPE" => "A",
			"CACHE_TIME" => 360000
			],
		false, ["HIDE_ICONS" => "Y"]
		);
	?>
</div>
<?
/* -------------------------------------------------------------------- */
/* ----------------------------- socservs ----------------------------- */
/* -------------------------------------------------------------------- */
?>
<div class="socservs-cell">
	<?
	$APPLICATION->IncludeComponent
		(
		"bitrix:eshop.socnet.links", "av-shop",
			[
			"FACEBOOK" => "https://www.facebook.com/avmg.com.ua/",
			"GOOGLE"   => "https://plus.google.com/u/2/114220723367013333669",
			"TWITTER"  => "https://twitter.com/avmgua"
			],
		false, ["HIDE_ICONS" => "Y"]
		);
	?>
</div>
<?
/* -------------------------------------------------------------------- */
/* ----------------------------- copyright ---------------------------- */
/* -------------------------------------------------------------------- */
?>
<div class="copyright-cell">
	<?=Loc::getMessage("AV_SHOP_COPYRIGHT")?>
</div>
<?
/* -------------------------------------------------------------------- */
/* ------------------------ company link mobile ----------------------- */
/* -------------------------------------------------------------------- */
?>
<a class="company-link-mobile" href="<?=$templateVariables["COMPANY_INFO"]["SITE"]?>" title="<?=strtolower(Loc::getMessage("AV_SHOP_COMPANY_SITE"))?>" target="_blank" rel="nofollow">
	<?=Loc::getMessage("AV_SHOP_COMPANY_SITE")?>
</a>