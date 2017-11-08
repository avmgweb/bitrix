<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die()?>
<div
	data-av-form-item="input"
	data-av-form-library="av"
	class="
		av-form-input
		<?if($arResult["REQUIRED"]):?>required<?endif?>
		<?if($arResult["DISABLED"]):?>disabled<?endif?>
		<?if($arResult["PLACEHOLDER"] && !$arResult["VALUE"]):?>placeholder-on<?endif?>
		<?if($arResult["PLACEHOLDER"] &&  $arResult["VALUE"]):?>placeholder-off<?endif?>
		"
	title="<?=$arResult["TITLE"]?>"
>
	<?if($arResult["PLACEHOLDER"]):?>
	<label><?=$arResult["PLACEHOLDER"]?></label>
	<?endif?>

	<input
		type="text"
		name="<?=$arResult["NAME"]?>"
		value="<?=$arResult["VALUE"]?>"
		title="<?=$arResult["TITLE"]?>"
		<?if($arResult["DISABLED"]):?>disabled<?endif?>
		<?=$arResult["ATTR"]?>
	>

	<div class="height-controller">&nbsp;</div>
</div>