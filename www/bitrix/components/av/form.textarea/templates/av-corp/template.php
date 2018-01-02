<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die()?>
<textarea
	data-av-form-item="textarea"
	data-av-form-library="av-corp"
	class="
		av-form-textarea-corp
		<?if($arResult["REQUIRED"]):?>required<?endif?>
		<?if($arResult["DISABLED"]):?>disabled<?endif?>
		"
	name="<?=$arResult["NAME"]?>"
	title="<?=$arResult["TITLE"]?>"
	<?if($arResult["DISABLED"]):?>disabled<?endif?>

	data-avat="form-textarea-<?=$arResult["NAME"]?>"
	<?=$arResult["ATTR"]?>
><?=$arResult["VALUE"]?></textarea>