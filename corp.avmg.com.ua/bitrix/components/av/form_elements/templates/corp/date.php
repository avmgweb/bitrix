<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if(!$arParams["NAME"])                                          return;
?>
<div
	data-av-form-item="date"
	class="
		av-form-elements-corp-date
		<?if($arParams["REQUIRED"]):?>required<?endif?>
		<?if($arParams["DISABLED"]):?>disabled<?endif?>
		<?if($arParams["VALUE"]):?>checked<?endif?>
		"
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
		title="<?=$arParams["TITLE"]?>"
		<?if($arParams["DISABLED"]):?>disabled<?endif?>
		<?=$arParams["ATTR"]?>
	>
</div>