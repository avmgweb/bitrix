<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die()?>
<div class="av-form-input-corp-learning-search">
	<input
		type="text"
		name="<?=$arResult["NAME"]?>"
		value="<?=$arResult["VALUE"]?>"
		title="<?=$arResult["TITLE"]?>"
		placeholder="<?=$arResult["PLACEHOLDER"]?>"

		<?=$arResult["ATTR"]?>
	>
	<span class="search-button" title="<?=$arParams["SEARCH_TITLE"]?>"></span>
</div>