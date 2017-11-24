<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die()?>
<div
	data-av-form-item="password"
	data-av-form-library="av-styled"
	class="
		av-form-styled-password
		<?if($arResult["REQUIRED"]):?>required<?endif?>
		<?if($arResult["TITLE"] && !$arResult["VALUE"]):?>placeholder-on<?endif?>
		<?if($arResult["TITLE"] &&  $arResult["VALUE"]):?>placeholder-off<?endif?>
		"
	title="<?=$arResult["TITLE"]?>"
	<?=$arResult["ATTR"]?>
>
	<?if($arResult["TITLE"]):?>
	<label><?=$arResult["TITLE"]?></label>
	<?endif?>

	<input
		type="password"
		autocomplete="off"
		name="<?=$arResult["NAME"]?>"
		value="<?=$arResult["VALUE"]?>"
		title=""
	>
</div>