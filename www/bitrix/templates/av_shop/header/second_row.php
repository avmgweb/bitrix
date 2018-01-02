<?
use \Bitrix\Main\Localization\Loc;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$filePathExplode = explode(SITE_TEMPLATE_PATH, __FILE__);
Loc::loadMessages($filePathExplode[0].SITE_TEMPLATE_PATH."/template.php");
/* -------------------------------------------------------------------- */
/* ------------------------ sidebar call button ----------------------- */
/* -------------------------------------------------------------------- */
?>
<div id="page-header-sidebar-button" tabindex="0">
	<div></div>
	<div></div>
	<div></div>
</div>
<?
/* -------------------------------------------------------------------- */
/* ------------------------------- logo ------------------------------- */
/* -------------------------------------------------------------------- */
?>
<a class="logo-cell" href="/" <?if($currentDirectory == SITE_DIR):?>rel="nofollow"<?endif?>>
	<img
		src="<?=$templateVariables["COMPANY_INFO"]["LOGO"]?>"
		alt="<?=$templateVariables["COMPANY_INFO"]["NAME"]?>"
		title="<?=$templateVariables["COMPANY_INFO"]["NAME"]?>"
	>
</a>
<a class="logo-cell-mobile" href="/" rel="nofollow">
	<img
		src="<?=$templateVariables["COMPANY_INFO"]["LOGO_MIN"]?>"
		alt="<?=$templateVariables["COMPANY_INFO"]["NAME"]?>"
		title="<?=$templateVariables["COMPANY_INFO"]["NAME"]?>"
	>
</a>
<?
/* -------------------------------------------------------------------- */
/* --------------------------- phones block --------------------------- */
/* -------------------------------------------------------------------- */
?>
<div class="hot-line page-active-block av-shop-popup-call-block" data-type="phone-list" data-call-type="onclick" tabindex="0">
	<?
	$hotLine = $templateVariables["COMPANY_INFO"]["HOT_LINE"];
	$hotLine = str_replace("+38", "", $hotLine);
	$hotLine = str_replace(["(", ")", "-"], ["", "", " "], $hotLine);
	$hotLine = trim($hotLine);
	?>
	<div class="title"><?=$hotLine?></div>
	<i class="call-button fa fa-angle-down"></i>
</div>
<div class="header-phone-list-block av-shop-popup" data-type="phone-list">
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
	<div class="working-houres"><?=$templateVariables["WORKING_HOURES"]?></div>
</div>
<?
/* -------------------------------------------------------------------- */
/* ----------------------- call back call button ---------------------- */
/* -------------------------------------------------------------------- */
?>
<div class="call-back-form-button" data-header-call-back-form-button tabindex="0">
	<?=Loc::getMessage("AV_SHOP_CALL_BACK")?>
</div>
<?
/* -------------------------------------------------------------------- */
/* --------------------------- search block --------------------------- */
/* -------------------------------------------------------------------- */
?>
<div class="search-cell">
	<?$APPLICATION->IncludeFile("/include/search.php", [], ["MODE" => "php"])?>
</div>
<?
/* -------------------------------------------------------------------- */
/* ------------------------------ basket ------------------------------ */
/* -------------------------------------------------------------------- */
?>
<div class="basket-cell">
	<?=$basketLineHtml?>
</div>