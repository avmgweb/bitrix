<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die()?>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction  ($arItem["ID"], $arItem["EDIT_LINK"],   CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem["ID"], $arItem["DELETE_LINK"], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"));
	?>
	<div id="<?=$this->GetEditAreaId($arItem["ID"])?>" data-element-id="<?=$arItem["ID"]?>">
		<?
		$APPLICATION->IncludeComponent
			(
			"bitrix:catalog.item", $arParams["PAGE_TYPE"] == 'tablet' ? "av-tablet" : "av-list",
				[
				"RESULT" => ["ITEM" => $arItem]
				],
			false, ["HIDE_ICONS" => 'Y']
			);
		?>
	</div>
<?endforeach?>