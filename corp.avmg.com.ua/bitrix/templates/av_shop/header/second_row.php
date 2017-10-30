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
	<?
	$APPLICATION->IncludeComponent
		(
		"bitrix:main.include", "",
		["AREA_FILE_SHOW" => "file", "PATH" => "/include/logo.php"],
		false, ["HIDE_ICONS" => true]
		);
	?>
</a>
<a class="logo-cell-mobile" href="/" rel="nofollow">
	<?
	$APPLICATION->IncludeComponent
		(
		"bitrix:main.include", "",
		["AREA_FILE_SHOW" => "file", "PATH" => "/include/logo_mobile.php"],
		false, ["HIDE_ICONS" => true]
		);
	?>
</a>
<?
/* -------------------------------------------------------------------- */
/* --------------------------- phones block --------------------------- */
/* -------------------------------------------------------------------- */
?>
<div class="hot-line av-shop-popup-call-block" data-type="phone-list" data-call-type="onclick" tabindex="0">
	<?=$hotLineHtml?>
	<div class="call-button"></div>
</div>
<div class="header-phone-list-block av-shop-popup" data-type="phone-list">
	<?=$phoneListHtml?>
	<div class="working-houres"><?=$workingHouresHtml?></div>
</div>
<?
/* -------------------------------------------------------------------- */
/* ----------------------- call back call button ---------------------- */
/* -------------------------------------------------------------------- */
?>
<div id="page-header-call-back-form-button" data-header-call-back-form-button tabindex="0">
	<?=Loc::getMessage("AV_SHOP_CALL_BACK")?>
</div>
<?
/* -------------------------------------------------------------------- */
/* --------------------------- search block --------------------------- */
/* -------------------------------------------------------------------- */
?>
<div class="search-cell">
	<?
	$APPLICATION->IncludeComponent
		(
		"bitrix:main.include", "",
		["AREA_FILE_SHOW" => "file", "PATH" => "/include/search.php"],
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