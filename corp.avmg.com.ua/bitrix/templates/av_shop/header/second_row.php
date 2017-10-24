<?
use \Bitrix\Main\Localization\Loc;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$filePathExplode = explode(SITE_TEMPLATE_PATH, __FILE__);
Loc::loadMessages($filePathExplode[0].SITE_TEMPLATE_PATH."/header.php");
/* -------------------------------------------------------------------- */
/* ------------------------ sidebar call button ----------------------- */
/* -------------------------------------------------------------------- */
?>
<div class="sidebar-call-button">
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
		array("AREA_FILE_SHOW" => "file", "PATH" => "/include/logo.php")
		);
	?>
</a>
<a class="logo-cell-mobile" href="/" rel="nofollow">
	<?
	$APPLICATION->IncludeComponent
		(
		"bitrix:main.include", "",
		array("AREA_FILE_SHOW" => "file", "PATH" => "/include/logo_mobile.php")
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
<div class="phone-list av-shop-popup" data-type="phone-list">
	<div class="list"><?=$phoneListHtml?></div>
	<div class="working-houres"><?=$workingHouresHtml?></div>
</div>
<?
/* -------------------------------------------------------------------- */
/* ----------------------- call back call button ---------------------- */
/* -------------------------------------------------------------------- */
?>
<div class="call-back-form-button" data-call-back-form-button tabindex="0">
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
		array("AREA_FILE_SHOW" => "file", "PATH" => "/include/search.php")
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