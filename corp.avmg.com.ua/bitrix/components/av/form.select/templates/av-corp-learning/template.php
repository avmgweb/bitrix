<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$inputTitle = $arResult["EMPTY_TITLE"] ? $arResult["EMPTY_TITLE"] : $arResult["TITLE"];
?>
<div
	data-av-form-item="select"
	data-av-form-library="av-corp-learning"
	class="
		av-form-select-corp-learning
		<?if($arResult["DISABLED"]):?>disabled<?endif?>
		<?if($arResult["REQUIRED"]):?>required<?endif?>
		"
>
	<select
		name="<?=$arResult["NAME"]?>"
		title=""
		<?if($arResult["DISABLED"]):?>disabled<?endif?>

		data-avat="form-select-<?=$arResult["NAME"]?>"
		<?=$arResult["ATTR"]?>
	>
		<option value><?=$inputTitle?></option>
		<?foreach($arResult["LIST"] as $value => $title):?>
		<option value="<?=$value?>" <?if($value == $arResult["VALUE"]):?>selected<?endif?>><?=$title?></option>
		<?endforeach?>
	</select>

	<div class="title-label" title="<?=$arResult["TITLE"]?>">
		<div><?=$arResult["VALUE"] ? $arResult["LIST"][$arResult["VALUE"]] : $inputTitle?></div>
		<div></div>
	</div>

	<div class="list">
		<div data-list-value <?if(!$arResult["VALUE"]):?>style="display: none"<?endif?>><?=$inputTitle?></div>
		<?foreach($arResult["LIST"] as $value => $title):?>
		<div data-list-value="<?=$value?>" <?if($value == $arResult["VALUE"]):?>class="selected"<?endif?>><?=$title?></div>
		<?endforeach?>
	</div>
</div>