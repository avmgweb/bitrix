<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$defaultTitle = $arResult["EMPTY_TITLE"] ? $arResult["EMPTY_TITLE"] : $arResult["TITLE"];
?>
<div class="av-form-select-alt" title="<?=$arParams["TITLE"]?>" <?=$arParams["ATTR"]?>>
	<select name="<?=$arParams["NAME"]?>" title="">
		<option value>0</option>
		<?foreach($arParams["LIST"] as $value => $title):?>
		<option value="<?=$value?>" <?if($value == $arParams["VALUE"]):?>selected<?endif?>><?=$title?></option>
		<?endforeach?>
	</select>

	<?if($defaultTitle):?>
	<div <?if(!$arParams["VALUE"]):?>class="selected"<?endif?> data-label-value>
		<?=$defaultTitle?>
	</div>
	<?endif?>

	<?foreach($arParams["LIST"] as $value => $title):?>
	<div data-label-value="<?=$value?>" <?if($value == $arParams["VALUE"]):?>class="selected"<?endif?>>
		<?=$title?>
	</div>
	<?endforeach?>
</div>