<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die()?>
<div
	class="av-catalog-section-slider"
	data-slides-count="3"
	data-slides-count-1199="2"
	data-slides-count-991="1"
	data-slides-count-767="0"
>
	<div class="navigation prev"></div>

	<div class="slider-block">
	<?foreach($arResult["ITEMS"] as $arItem):?>
		<?
		$this->AddEditAction  ($arItem["ID"], $arItem["EDIT_LINK"],   CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem["ID"], $arItem["DELETE_LINK"], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"));
		?>
		<div class="item">
			<?
			$APPLICATION->IncludeComponent
				(
				"bitrix:catalog.item", "av-tablet",
				["RESULT" => ["ITEM" => $arItem]],
				false, ["HIDE_ICONS" => "Y"]
				);
			?>
		</div>
	<?endforeach?>
	</div>

	<div class="navigation next"></div>
</div>