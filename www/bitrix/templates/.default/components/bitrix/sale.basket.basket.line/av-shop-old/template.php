<?
use \Bitrix\Main\Localization\Loc;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/* -------------------------------------------------------------------- */
/* ------------------------------ basket ------------------------------ */
/* -------------------------------------------------------------------- */
?>
<div
	class="av-basket-line"
	data-params="<?=base64_encode(serialize($arParams))?>"
	data-site="<?=SITE_ID?>"
>
	<?
	/* ------------------------------------------- */
	/* ---------------- main link ---------------- */
	/* ------------------------------------------- */
	?>
	<a class="main-link" href="<?=$arParams["PATH_TO_BASKET"]?>" rel="nofollow">
		<img class="icon" src="<?=$this->GetFolder()?>/images/basket.svg">

		<div class="counter<?if(!$arResult["NUM_PRODUCTS"]):?> empty<?endif?>">
			<?=$arResult["NUM_PRODUCTS"]?>
		</div>

		<div class="title">
			<?=Loc::getMessage("AV_BASKET_LINE_TITLE")?>
		</div>
	</a>
	<?
	/* ------------------------------------------- */
	/* ---------------- items list --------------- */
	/* ------------------------------------------- */
	?>
	<?if(count($arResult["ITEMS"])):?>
	<div class="items-list">
		<div class="triangle light"></div>
		<div class="triangle dark"></div>
		<div class="body">
			<div class="title">
				<?=Loc::getMessage("AV_BASKET_LINE_LIST_TITLE", ["#COUNT#" => '<span class="count">'.$arResult["NUM_PRODUCTS"].'</span>'])?>
			</div>

			<?foreach($arResult["ITEMS"] as $itemInfo):?>
			<div
				class="item-row"
				data-element-id="<?=$itemInfo["ID"]?>"
				data-product-id="<?=$itemInfo["PRODUCT_ID"]?>"
			>
				<div class="delete" title="<?=Loc::getMessage("AV_BASKET_LINE_DELETE_TITLE")?>"></div>
				<div class="name"><?=$itemInfo["NAME"]?></div>
				<div class="quantity-cell">
					<span class="quantity"><?=$itemInfo["QUANTITY"]?></span>
					<span class="measure"><?=$itemInfo["MEASURE"]?></span>
				</div>
			</div>
			<?endforeach?>

			<?if($arResult["ITEMS_VIEW_MORE"]):?>
			<a class="read-more" href="<?=$arParams["PATH_TO_BASKET"]?>">
				<?=Loc::getMessage("AV_BASKET_LINE_VIEW_MORE")?>
			</a>
			<?endif?>

			<div class="price-info">
				<span class="info"><?=Loc::getMessage("AV_BASKET_LINE_TOTAL_PRICE")?></span>
				<span class="price"><?=$arResult["TOTAL_PRICE"]?></span>
			</div>

			<div class="buttons-row">
				<?
				$APPLICATION->IncludeComponent
					(
					"av:form.button", "av-alt2",
						[
						"BUTTON_TYPE" => 'link',
						"LINK"        => $arParams["PATH_TO_BASKET"],
						"TITLE"       => Loc::getMessage("AV_BASKET_LINE_EDIT"),
						"ATTR"        => ["rel" => 'nofollow']
						],
					false, ["HIDE_ICONS" => 'Y']
					);
				$APPLICATION->IncludeComponent
					(
					"av:form.button", "av",
						[
						"BUTTON_TYPE" => 'link',
						"LINK"        => $arParams["PATH_TO_ORDER"],
						"TITLE"       => Loc::getMessage("AV_BASKET_LINE_BUY"),
						"ATTR"        => ["rel" => 'nofollow']
						],
					false, ["HIDE_ICONS" => 'Y']
					);
				?>
			</div>
		</div>
	</div>
	<?endif?>
</div>