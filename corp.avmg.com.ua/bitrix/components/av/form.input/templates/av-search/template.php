<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$fieldTitle = $arResult["PLACEHOLDER"] ? $arResult["PLACEHOLDER"] : $arResult["TITLE"];
?>
<div
	data-av-form-item="search"
	data-av-form-library="av"
	class="
		av-form-input-search
		<?if($arResult["REQUIRED"]):?>required<?endif?>
		<?if($arResult["VALUE"]):?>active<?endif?>
		<?if($fieldTitle && !$arResult["VALUE"]):?>placeholder-on<?endif?>
		<?if($fieldTitle &&  $arResult["VALUE"]):?>placeholder-off<?endif?>
		"
	<?=$arResult["ATTR"]?>
>
	<?if($fieldTitle):?>
	<label title="<?=$arResult["TITLE"]?>">
		<?=$fieldTitle?>
	</label>
	<?endif?>

	<input
		type="text"
		autocomplete="off"
		name="<?=$arResult["NAME"]?>"
		value="<?=$arResult["VALUE"]?>"
		title="<?=$arResult["TITLE"]?>"
	>

	<i class="icon fa fa-search"></i>
</div>