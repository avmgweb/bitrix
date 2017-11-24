<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die()?>
<div
	data-av-form-item="iblock_element_search"
	data-av-form-library="av"
	data-iblock-id="<?=$arResult["IBLOCK_ID"]?>"
	data-empty-value-text="<?=$arResult["EMPTY_RESULT_TEXT"]?>"
	class="
		av-form-iblock-search-element
		<?if($arResult["VALUE_TITLE"]):?>value-seted<?endif?>
		"
>
	<input
		class="value-input"
		value="<?=$arResult["VALUE"]?>"
		name="<?=$arResult["NAME"]?>"
		title=""
	>

	<div class="title-block">
		<div class="title" title="<?=$arResult["TITLE"]?>">
			<?=$arResult["TITLE"]?>
		</div>
		<input
			class="search-input"
			autocomplete="off"
			value="<?=$arResult["VALUE_TITLE"]?>"
			title="<?=$arResult["TITLE"]?>"
		>
		<i class="icon fa fa-search"></i>
	</div>

	<div class="list"></div>
</div>