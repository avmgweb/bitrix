<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die()?>
<div
	data-av-form-item="select"
	data-av-form-library="av-alt"
	class="
		av-form-select-alt
		<?if($arResult["REQUIRED"]):?>required<?endif?>
		"
	title="<?=$arParams["TITLE"]?>"
	<?=$arParams["ATTR"]?>
>
	<select name="<?=$arResult["NAME"]?>" title="">
		<option value></option>
		<?foreach($arResult["LIST"] as $value => $title):?>
		<option value="<?=$value?>" <?if($value == $arResult["VALUE"]):?>selected<?endif?>><?=$title?></option>
		<?endforeach?>
	</select>

	<div class="list-item default<?if(!$arParams["VALUE"]):?> selected<?endif?>">
		<div class="title"><?=($arResult["EMPTY_TITLE"] ? $arResult["EMPTY_TITLE"] : $arResult["TITLE"])?></div>
		<i class="arrow fa fa-angle-right"></i>
	</div>

	<?foreach($arResult["LIST"] as $value => $title):?>
	<div
		data-list-value="<?=$value?>"
		class="list-item<?if($value == $arResult["VALUE"]):?> selected<?endif?>"
	>
		<div class="title"><?=$title?></div>
		<i class="arrow fa fa-angle-right"></i>
	</div>
	<?endforeach?>
</div>