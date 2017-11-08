<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die()?>
<div
	data-av-form-item="search"
	data-av-form-library="av"
	class="
		av-form-input-search
		<?if($arResult["REQUIRED"]):?>required<?endif?>
		<?if($arResult["VALUE"]):?>active<?endif?>
		<?if($arResult["PLACEHOLDER"] && !$arResult["VALUE"]):?>has-placeholder on<?endif?>
		<?if($arResult["PLACEHOLDER"] &&  $arResult["VALUE"]):?>has-placeholder<?endif?>
		"
>
	<?if($arResult["PLACEHOLDER"]):?>
	<label title="<?=$arResult["TITLE"]?>">
		<?=$arResult["PLACEHOLDER"]?>
	</label>
	<?endif?>

	<input
		type="text"
		autocomplete="off"
		name="<?=$arResult["NAME"]?>"
		value="<?=$arResult["VALUE"]?>"
		title="<?=$arResult["TITLE"]?>"
		<?=$arResult["ATTR"]?>
	>

	<div class="icon"></div>
</div>