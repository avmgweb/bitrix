<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$currentTitle = $arResult["VALUE_TITLE"] ? $arResult["VALUE_TITLE"] : $arResult["TITLE"];
?>
<div
	class="av-form-iblock-search-element"
	data-av-form-item="iblock_element_search"
	data-iblock-id="<?=$arResult["IBLOCK_ID"]?>"
	data-empty-value-text="<?=$arResult["EMPTY_RESULT_TEXT"]?>"
>
	<input class="input-native" value="<?=$arResult["VALUE"]?>" name="<?=$arResult["NAME"]?>" title="">

	<div class="input-label" title="<?=$arResult["TITLE"]?>">
		<input
			value="<?=$arResult["VALUE_TITLE"]?>"
			title="<?=$arResult["TITLE"]?>"
			autocomplete="off"
			<?if($currentTitle):?>style="display: none"<?endif?>
		>
		<div class="placeholder" <?if(!$currentTitle):?>style="display: none"<?endif?>>
			<?=$currentTitle?>
		</div>
		<div class="icon"></div>
	</div>

	<div class="list"></div>
</div>