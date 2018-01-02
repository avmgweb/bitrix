<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die()?>
<div
	data-av-form-item="input"
	data-av-form-library="av-styled"
	class="
		av-form-styled-input
		<?if($arResult["REQUIRED"]):?>required<?endif?>
		<?if($arResult["TITLE"] && !$arResult["VALUE"]):?>placeholder-on<?endif?>
		<?if($arResult["TITLE"] &&  $arResult["VALUE"]):?>placeholder-off<?endif?>
		"
	<?=$arResult["ATTR"]?>
>
	<?if($arResult["TITLE"]):?>
	<label title="<?=$arResult["TITLE"]?>">
		<?=$arResult["TITLE"]?>
	</label>
	<?endif?>

	<input
		type="text"
		name="<?=$arResult["NAME"]?>"
		value="<?=$arResult["VALUE"]?>"
		title="<?=$arResult["TITLE"]?>"
	>
</div>