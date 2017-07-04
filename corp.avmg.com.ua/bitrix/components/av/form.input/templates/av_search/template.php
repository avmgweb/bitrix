<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die()?>
<div
	data-av-form-item="input"
	class="
		av-form-input-search
		<?if($arResult["REQUIRED"]):?>required<?endif?>
		"
	title="<?=$arResult["TITLE"]?>"
>
	<?if($arResult["PLACEHOLDER"]):?>
	<label <?if($arResult["VALUE"]):?>style="display: none"<?endif?>>
		<?=$arResult["PLACEHOLDER"]?>
	</label>
	<?endif?>

	<input
		type="text"
		name="<?=$arResult["NAME"]?>"
		value="<?=$arResult["VALUE"]?>"
		title="<?=$arResult["TITLE"]?>"
		autocomplete="off"

		<?if($arResult["PLACEHOLDER"] && !$arResult["VALUE"]):?>style="display: none"<?endif?>
		<?=$arResult["ATTR"]?>
	>

	<div class="icon"></div>
</div>