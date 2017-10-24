<?
use \Bitrix\Main\Localization\Loc;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$filePathExplode = explode(SITE_TEMPLATE_PATH, __FILE__);
Loc::loadMessages($filePathExplode[0].SITE_TEMPLATE_PATH."/header.php");
/* -------------------------------------------------------------------- */
/* ---------------------------- links block --------------------------- */
/* -------------------------------------------------------------------- */
?>
<div class="links-block-cell">
	<div class="link-block av-shop-popup-call-block" data-type="links-block" data-call-type="onclick" tabindex="0">
		<div class="title"><?=Loc::getMessage("AV_SHOP_LINKS_BLOCK")?></div>
		<div class="call-button"></div>
	</div>
	<div class="av-shop-popup" data-type="links-block">
		<div><?=$companyLinkHtml?></div>
		<div><?=$faqLinkHtml?></div>
		<div><?=$supportLinkHtml?></div>
	</div>
</div>
<?
/* -------------------------------------------------------------------- */
/* ----------------------------- site link ---------------------------- */
/* -------------------------------------------------------------------- */
?>
<div class="site-link-cell">
	<?=$companyLinkHtml?>
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
			array(
			"SITE_LIST"  => array("AV", "SH", "EN"),
			"CACHE_TIME" => 3600000,
			"CACHE_TYPE" => "A"
			)
		);
	?>
</div>
<?
/* -------------------------------------------------------------------- */
/* ------------------------------- bases ------------------------------ */
/* -------------------------------------------------------------------- */
?>
<div class="bases-selector-cell">
	<div class="link-block av-shop-popup-call-block" data-type="bases-list" data-call-type="onclick" tabindex="0">
		<img
			src="<?=SITE_TEMPLATE_PATH?>/images/bases.svg"
			alt="<?=Loc::getMessage("AV_SHOP_BASES")?>"
			title="<?=Loc::getMessage("AV_SHOP_BASES")?>"
		>
		<div class="title"><?=Loc::getMessage("AV_SHOP_BASES")?></div>
		<div class="call-button"></div>
	</div>
	<div class="bases-list av-shop-popup" data-type="bases-list">
		<div class="title">
			<?=Loc::getMessage("AV_SHOP_BASES_SELECT_REGION")?>
		</div>
		<div class="list">
			<?
			$APPLICATION->IncludeComponent
				(
				"bitrix:main.include", "",
				array("AREA_FILE_SHOW" => "file", "PATH" => "/include/bases_list.php")
				);
			?>
		</div>
		<div class="link">
			<?
			$APPLICATION->IncludeComponent
				(
				"bitrix:main.include", "",
				array("AREA_FILE_SHOW" => "file", "PATH" => "/include/bases_link.php")
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
	<div class="link-block av-shop-popup-call-block" data-type="phone-list-mobile" data-call-type="onclick" tabindex="0">
		<img
			src="<?=SITE_TEMPLATE_PATH?>/images/phone.svg"
			alt="<?=Loc::getMessage("AV_SHOP_HOT_LINE")?>"
			title="<?=Loc::getMessage("AV_SHOP_HOT_LINE")?>"
		>
		<div class="title"><?=$hotLineHtml?></div>
		<div class="call-button"></div>
	</div>
	<div class="phone-list-mobile av-shop-popup" data-type="phone-list-mobile">
		<div class="list"><?=$phoneListHtml?></div>
		<div class="working-houres"><?=$workingHouresHtml?></div>
		<?
		$APPLICATION->IncludeComponent
			(
			"av:form.button", "av-shop",
				[
				"BUTTON_TYPE" => "label",
				"TITLE"       => Loc::getMessage("AV_SHOP_CALL_BACK"),
				"ATTR"        => "data-call-back-form-button"
				]
			);
		?>
	</div>
</div>