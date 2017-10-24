<?
use \Bitrix\Main\Localization\Loc;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
?>
<div
	class="av-shop-search-title"
	data-search-id="<?=$arParams["INPUT_ID"]?>"
	data-search-page="<?=$arResult["FORM_ACTION"]?>?q=#SEACRH#"
	data-empty-result-title="<?=Loc::getMessage("AV_SHOP_SEARCH_TITLE_EMPTY_RESULT")?>"
>
	<div class="placeholder"><?=Loc::getMessage("AV_SHOP_SEARCH_TITLE_PLACEHOLDER")?></div>
	<input type="text" name="q" title="<?=Loc::getMessage("AV_SHOP_SEARCH_TITLE_PLACEHOLDER")?>" autocomplete="off">
	<div class="icon" tabindex="0"></div>
</div>
<div
	class="av-shop-search-title-result"
	data-search-id="<?=$arParams["INPUT_ID"]?>"
	data-empty="Y"
>

</div>