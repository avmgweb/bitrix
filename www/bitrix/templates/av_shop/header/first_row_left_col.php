<?
use \Bitrix\Main\Localization\Loc;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$filePathExplode = explode(SITE_TEMPLATE_PATH, __FILE__);
Loc::loadMessages($filePathExplode[0].SITE_TEMPLATE_PATH."/template.php");
/* -------------------------------------------------------------------- */
/* ---------------------------- links block --------------------------- */
/* -------------------------------------------------------------------- */
?>
<div class="links-block-cell">
	<div class="page-active-block av-shop-popup-call-block" data-type="links-block" data-call-type="onclick" tabindex="0">
		<div class="title"><?=Loc::getMessage("AV_SHOP_LINKS_BLOCK")?></div>
		<i class="call-button fa fa-angle-down"></i>
	</div>
	<div class="header-links-list-block av-shop-popup" data-type="links-block">
		<a class="page-active-block" href="<?=$templateVariables["COMPANY_INFO"]["SITE"]?>" title="<?=strtolower(Loc::getMessage("AV_SHOP_COMPANY_SITE"))?>" target="_blank" rel="nofollow">
			<img
				src="<?=SITE_TEMPLATE_PATH?>/images/company_site.svg"
				alt="<?=strtolower(Loc::getMessage("AV_SHOP_COMPANY_SITE"))?>"
				title="<?=strtolower(Loc::getMessage("AV_SHOP_COMPANY_SITE"))?>"
			>
			<?=Loc::getMessage("AV_SHOP_COMPANY_SITE")?>
		</a>
		<a class="page-active-block" href="<?=$templateVariables["FAQ_LINK"]?>" title="<?=strtolower(Loc::getMessage("AV_SHOP_FAQ"))?>" rel="nofollow">
			<img
				src="<?=SITE_TEMPLATE_PATH?>/images/faq.svg"
				alt="<?=strtolower(Loc::getMessage("AV_SHOP_FAQ"))?>"
				title="<?=strtolower(Loc::getMessage("AV_SHOP_FAQ"))?>"
			>
			<?=Loc::getMessage("AV_SHOP_FAQ")?>
		</a>
		<a class="page-active-block" href="<?=$templateVariables["SUPPORT_LINK"]?>" title="<?=strtolower(Loc::getMessage("AV_SHOP_SUPPORT"))?>" rel="nofollow">
			<img
				src="<?=SITE_TEMPLATE_PATH?>/images/support.svg"
				alt="<?=strtolower(Loc::getMessage("AV_SHOP_SUPPORT"))?>"
				title="<?=strtolower(Loc::getMessage("AV_SHOP_SUPPORT"))?>"
			>
			<?=Loc::getMessage("AV_SHOP_SUPPORT")?>
		</a>
	</div>
</div>
<?
/* -------------------------------------------------------------------- */
/* ----------------------------- site link ---------------------------- */
/* -------------------------------------------------------------------- */
?>
<div class="site-link-cell">
	<a href="<?=$templateVariables["COMPANY_INFO"]["SITE"]?>" title="<?=strtolower(Loc::getMessage("AV_SHOP_COMPANY_SITE"))?>" target="_blank">
		<?=Loc::getMessage("AV_SHOP_COMPANY_SITE")?>
	</a>
</div>
<?
/* -------------------------------------------------------------------- */
/* ------------------------ languages selector ------------------------ */
/* -------------------------------------------------------------------- */
?>
<div class="language-selector-cell">
	<?
	$APPLICATION->IncludeComponent
		(
		"bitrix:main.site.selector", "av",
			[
			"SITE_LIST"  => ["AV", "SH", "EN"],
			"CACHE_TIME" => 3600000,
			"CACHE_TYPE" => "A"
			],
		false, ["HIDE_ICONS" => true]
		);
	?>
</div>
<?
/* -------------------------------------------------------------------- */
/* ------------------------------- bases ------------------------------ */
/* -------------------------------------------------------------------- */
?>
<div class="bases-selector-cell">
	<div class="page-active-block av-shop-popup-call-block" data-type="bases-list" data-call-type="onclick" tabindex="0">
		<img
			src="<?=SITE_TEMPLATE_PATH?>/images/bases.svg"
			alt="<?=strtolower(Loc::getMessage("AV_SHOP_BASES"))?>"
			title="<?=strtolower(Loc::getMessage("AV_SHOP_BASES"))?>"
		>
		<div class="title"><?=Loc::getMessage("AV_SHOP_BASES")?></div>
		<i class="call-button fa fa-angle-down"></i>
	</div>
	<div class="header-bases-list-block av-shop-popup" data-type="bases-list">
		<div class="bases-title">
			<?=Loc::getMessage("AV_SHOP_BASES_SELECT_REGION")?>
		</div>
		<div class="bases-list">
			<?
			$APPLICATION->IncludeComponent
				(
				"bitrix:catalog.section.list", "av-shop-minimized",
					[
					"IBLOCK_TYPE" => "av_storages",
					"IBLOCK_ID"   => $templateVariables["COMPANY_BASES_IBLOCK_ID"],

					"SECTION_URL" => $templateVariables["COMPANY_BASES_LINK"]."#CODE#/",

					"CACHE_TYPE"   => "A",
					"CACHE_TIME"   => 360000,
					"CACHE_GROUPS" => "Y",

					"ADD_SECTIONS_CHAIN" => "N",
					"OPEN_LINK_BLANK"    => "Y"
					],
				false, ["HIDE_ICONS" => true]
				);
			?>
		</div>
		<div class="bases-link">
			<?
			$APPLICATION->IncludeComponent
				(
				"av:form.button", "av-shop",
					[
					"BUTTON_TYPE" => "link",
					"LINK"        => $templateVariables["COMPANY_BASES_LINK"],
					"TITLE"       => Loc::getMessage("AV_SHOP_BASES_SHOW_ALL"),
					"ATTR"        => ["target" => "_blank"]
					],
				false, ["HIDE_ICONS" => true]
				);
			?>
		</div>
	</div>
</div>
<?
/* -------------------------------------------------------------------- */
/* ---------------------------- phone list ---------------------------- */
/* -------------------------------------------------------------------- */
?>
<div class="phone-list-cell">
	<div class="page-active-block av-shop-popup-call-block" data-type="phone-list-mobile" data-call-type="onclick" tabindex="0">
		<img
			src="<?=SITE_TEMPLATE_PATH?>/images/phone.svg"
			alt="<?=strtolower(Loc::getMessage("AV_SHOP_HOT_LINE"))?>"
			title="<?=strtolower(Loc::getMessage("AV_SHOP_HOT_LINE"))?>"
		>
		<div class="title">
			<?
			$hotLine = $templateVariables["COMPANY_INFO"]["HOT_LINE"];
			$hotLine = str_replace("+38", "", $hotLine);
			$hotLine = str_replace(["(", ")", "-"], ["", "", " "], $hotLine);
			$hotLine = trim($hotLine);
			?>
			<?=$hotLine?>
		</div>
		<i class="call-button fa fa-angle-down"></i>
	</div>
	<div class="header-phone-list-mobile-block av-shop-popup" data-type="phone-list-mobile">
		<div class="phone-list">
			<?foreach($templateVariables["COMPANY_INFO"]["PHONES"] as $phone):?>
			<a
				href="tel:<?=str_replace(["(", ")", "-", " "], "", $phone)?>"
				title="<?=strtolower(Loc::getMessage("AV_SHOP_CONTACT_PHONE"))?>"
				rel="nofollow"
			>
				<?=$phone?>
			</a>
			<?endforeach?>
		</div>
		<div class="working-houres">
			<?=$templateVariables["WORKING_HOURES"]?>
		</div>
		<?
		$APPLICATION->IncludeComponent
			(
			"av:form.button", "av-shop",
				[
				"BUTTON_TYPE" => "label",
				"TITLE"       => Loc::getMessage("AV_SHOP_CALL_BACK"),
				"ATTR"        => "data-header-call-back-form-button"
				],
			false, ["HIDE_ICONS" => true]
			);
		?>
	</div>
</div>