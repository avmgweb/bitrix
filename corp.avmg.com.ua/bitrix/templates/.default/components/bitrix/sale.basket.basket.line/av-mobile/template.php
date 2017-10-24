<?
use \Bitrix\Main\Localization\Loc;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/* -------------------------------------------------------------------- */
/* ------------------------------ basket ------------------------------ */
/* -------------------------------------------------------------------- */
?>
<div
	class="av-basket-line-mobile"
	data-params="<?=base64_encode(serialize($arParams))?>"
>
	<a class="main-link" href="<?=$arParams["PATH_TO_BASKET"]?>" rel="nofollow">
		<img src="<?=$this->GetFolder()?>/images/basket.svg">

		<div class="counter<?if(!$arResult["NUM_PRODUCTS"]):?> empty<?endif?>">
			<?=$arResult["NUM_PRODUCTS"]?>
		</div>
	</a>
</div>