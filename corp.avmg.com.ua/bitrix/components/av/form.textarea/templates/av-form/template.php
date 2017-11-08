<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die()?>
<div
	data-av-form-item="textarea"
	data-av-form-library="av-styled"
	class="
		av-form-styled-textarea
		<?if($arResult["REQUIRED"]):?>required<?endif?>
		<?if($arResult["TITLE"] && !$arResult["VALUE"]):?>has-placeholder on<?endif?>
		<?if($arResult["TITLE"] &&  $arResult["VALUE"]):?>has-placeholder<?endif?>
		"
>
	<?if($arResult["TITLE"]):?>
	<label title="<?=$arResult["TITLE"]?>">
		<?=$arResult["TITLE"]?>
	</label>
	<?endif?>

	<textarea
		name="<?=$arResult["NAME"]?>"
		title="<?=$arResult["TITLE"]?>"
		<?=$arResult["ATTR"]?>
	><?=$arResult["VALUE"]?></textarea>
</div>