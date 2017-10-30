<?
use \Bitrix\Main\Localization\Loc;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
?>
<a
	class="av-basket-line"
	href="<?=$arParams["PATH_TO_BASKET"]?>"
	title="<?=Loc::getMessage("AV_BASKET_LINE_TITLE")?>"
	rel="nofollow"
	data-params="<?=base64_encode(serialize($arParams))?>"
>
	<img class="icon" src="<?=$this->GetFolder()?>/images/basket.svg">
	<div class="counter<?if(!$arResult["NUM_PRODUCTS"]):?> empty<?endif?>">
		<?=$arResult["NUM_PRODUCTS"]?>
	</div>
	<div class="title">
		<?=Loc::getMessage("AV_BASKET_LINE_TITLE")?>
	</div>
</a>