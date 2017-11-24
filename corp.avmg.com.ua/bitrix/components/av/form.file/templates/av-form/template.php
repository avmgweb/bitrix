<?
use \Bitrix\Main\Localization\Loc;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
?>
<div
	data-av-form-item="file"
	data-av-form-library="av-styled"
	data-default-value="<?=$arResult["TITLE"]?>"
	class="
		av-form-styled-file
		<?if(count($arResult["UPLOADED_FILE"])):?>uploaded-file<?endif?>
		<?if($arResult["REQUIRED"]):?>            required<?endif?>
		"
>
	<input type="file" name="<?=$arResult["NAME"]?>" <?=$arResult["ATTR"]?> title="">

	<?if(count($arResult["UPLOADED_FILE"]) && $arResult["NAME_DELETE"]):?>
	<input type="checkbox" value="<?=$arResult["VALUE"]?>" name="<?=$arResult["NAME_DELETE"]?>" title="">
	<?endif?>

	<div class="title">
		<?=$arResult["TITLE"] ? $arResult["TITLE"] : Loc::getMessage("AV_FORM_FILE_AV_DEFAULT_TITLE")?>
	</div>
	<div class="new-file-name"></div>
	<?if(count($arResult["UPLOADED_FILE"])):?>
	<a
		class="uploaded-file-link"
		href="<?=$arResult["UPLOADED_FILE"]["LINK"]?>"
		target="_blank"
		rel="nofollow"
	>
		<?=$arResult["UPLOADED_FILE"]["NAME"]?>
	</a>
	<?endif?>

	<div class="delete fa fa-times" title="<?=Loc::getMessage("AV_FORM_FILE_AV_DELETE_TITLE")?>"></div>
</div>