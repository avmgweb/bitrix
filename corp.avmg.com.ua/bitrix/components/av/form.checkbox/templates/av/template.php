<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die()?>
<div
	data-av-form-item="checkbox"
	class="av-form-checkbox<?if($arResult["REQUIRED"]):?> required<?endif?>"
	<?=$arResult["ATTR"]?>
>
	<input
		type="checkbox"
		name="<?=$arResult["NAME"]?>"
		value="<?=$arResult["VALUE"]?>"
		title=""
		<?if($arResult["CHECKED"]):?>checked<?endif?>
	>
	<label></label>
	<?if($arResult["TITLE"]):?>
	<label><?=$arResult["TITLE"]?></label>
	<?endif?>
</div>