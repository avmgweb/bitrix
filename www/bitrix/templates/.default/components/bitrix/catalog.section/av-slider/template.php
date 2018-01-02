<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

foreach($arResult["ITEMS"] as $itemInfo)
	{
	$this->AddEditAction  ($itemInfo["ID"], $itemInfo["EDIT_LINK"],   CIBlock::GetArrayByID($itemInfo["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($itemInfo["ID"], $itemInfo["DELETE_LINK"], CIBlock::GetArrayByID($itemInfo["IBLOCK_ID"], "ELEMENT_DELETE"));
	}
/* -------------------------------------------------------------------- */
/* ---------------------------- items list ---------------------------- */
/* -------------------------------------------------------------------- */
?>
<div
	class="av-catalog-section-slider"
	data-slides-count="3"
	data-slides-count-1199="2"
	data-slides-count-991="1"
	data-slides-count-767="0"
>
	<i class="navigation prev fa fa-angle-left"></i>

	<div class="slider-block">
		<?foreach($arResult["ITEMS"] as $itemInfo):?>
		<div class="item" id="<?=$this->GetEditAreaId($itemInfo["ID"])?>">
			<?
			$APPLICATION->IncludeComponent
				(
				"bitrix:catalog.item", "av-tablet",
					[
					"RESULT" => ["ITEM" => $itemInfo]
					],
				false, ["HIDE_ICONS" => "Y"]
				);
			?>
		</div>
		<?endforeach?>
	</div>

	<i class="navigation next fa fa-angle-right"></i>
</div>