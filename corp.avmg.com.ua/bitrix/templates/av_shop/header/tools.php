<?
use \Bitrix\Main\Localization\Loc;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$filePathExplode = explode(SITE_TEMPLATE_PATH, __FILE__);
Loc::loadMessages($filePathExplode[0].SITE_TEMPLATE_PATH."/header.php");
/* -------------------------------------------------------------------- */
/* -------------------------- call back form -------------------------- */
/* -------------------------------------------------------------------- */
?>
<div class="call-back-form">
	<div class="close"></div>
	<div class="title">
		<?=Loc::getMessage("AV_SHOP_CALL_BACK_FORM_TITLE")?>
	</div>
	<div class="separator"></div>
	<div class="body">
		<?
		$APPLICATION->IncludeComponent
			(
			"bitrix:main.include", "",
			array("AREA_FILE_SHOW" => "file", "PATH" => "/include/call_back_form.php")
			);
		?>
	</div>
</div>