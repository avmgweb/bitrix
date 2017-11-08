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
		<?if(count($arResult["UPLOADED_FILE"])):?>uploaded<?endif?>
		<?if($arResult["REQUIRED"]):?>            required<?endif?>
		<?if($arResult["DISABLED"]):?>            disabled<?endif?>
		"
>
	<input type="file" name="<?=$arResult["NAME"]?>" <?=$arResult["ATTR"]?>>

	<?if(count($arResult["UPLOADED_FILE"]) && $arResult["NAME_DELETE"]):?>
	<input type="checkbox" value="<?=$arResult["VALUE"]?>" name="<?=$arResult["NAME_DELETE"]?>">
	<?endif?>

	<label class="default">
		<?=$arResult["TITLE"] ? $arResult["TITLE"] : Loc::getMessage("AV_FORM_FILE_AV_DEFAULT_TITLE")?>
	</label>

	<label class="new-value">
		<div class="title"></div>
		<div class="delete" title="<?=Loc::getMessage("AV_FORM_FILE_AV_DELETE_TITLE")?>"></div>
	</label>

	<?if(count($arResult["UPLOADED_FILE"])):?>
	<label class="current-value">
		<a
			href="<?=$arResult["UPLOADED_FILE"]["LINK"]?>"
			target="_blank"
			rel="nofollow"
		>
			<?=$arResult["UPLOADED_FILE"]["NAME"]?>
		</a>
		<div class="delete" title="<?=Loc::getMessage("AV_FORM_FILE_AV_DELETE_TITLE")?>"></div>
	</label>
	<?endif?>
</div>