<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die()?>
<div
	data-av-form-item="select"
	data-av-form-library="av"
	class="
		av-form-select
		<?if($arResult["REQUIRED"]):?>required<?endif?>
		<?if($arResult["VALUE"]):?>value-seted<?endif?>
		"
	<?=$arResult["ATTR"]?>
>
	<select name="<?=$arResult["NAME"]?>" title="">
		<option value></option>
		<?foreach($arResult["LIST"] as $value => $title):?>
		<option value="<?=$value?>" <?if($value == $arResult["VALUE"]):?>selected<?endif?>><?=$title?></option>
		<?endforeach?>
	</select>

	<div class="title-block" data-default-title="<?=$arResult["TITLE"]?>" title="<?=$arResult["TITLE"]?>">
		<div class="title"><?=$arResult["VALUE"] ? $arResult["LIST"][$arResult["VALUE"]] : $arResult["TITLE"]?></div>
		<i class="arrow fa fa-angle-down"></i>
	</div>

	<div class="list">
		<?if($arResult["EMPTY_TITLE"] || $arResult["TITLE"]):?>
		<div class="list-item default">
			<?=($arResult["EMPTY_TITLE"] ? $arResult["EMPTY_TITLE"] : $arResult["TITLE"])?>
		</div>
		<?endif?>

		<?foreach($arResult["LIST"] as $value => $title):?>
		<div
			data-list-value="<?=$value?>"
			class="list-item<?if($value == $arResult["VALUE"]):?> selected<?endif?>"
		>
			<?=$title?>
		</div>
		<?endforeach?>
	</div>
</div>