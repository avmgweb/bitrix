<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die()?>
<div
	data-av-form-item="date"
	data-av-form-library="av-corp"
	class="
		av-form-input-date-corp
		<?if($arParams["REQUIRED"]):?>required<?endif?>
		<?if($arParams["DISABLED"]):?>disabled<?endif?>
		"
	title="<?=$arParams["TITLE"]?>"
>
	<?if($arParams["PLACEHOLDER"]):?>
	<label class="placeholder" <?if($arParams["VALUE"]):?>style="display: none"<?endif?>>
		<?=$arParams["PLACEHOLDER"]?>
	</label>
	<?endif?>

	<label class="value" <?if($arParams["PLACEHOLDER"] && !$arParams["VALUE"]):?>style="display: none"<?endif?>>
	<?=$arParams["VALUE"]?>
	</label>

	<div class="picker"      <?if($arParams["VALUE"]):?> style="display: none"<?endif?>></div>
	<div class="clear-value" <?if(!$arParams["VALUE"]):?>style="display: none"<?endif?>></div>

	<input
		type="text"
		name="<?=$arParams["NAME"]?>"
		value="<?=$arParams["VALUE"]?>"
		title=""
		<?if($arParams["DISABLED"]):?>disabled<?endif?>

		data-avat="form-input-date-<?=$arResult["NAME"]?>"
		<?=$arParams["ATTR"]?>
	>
</div>