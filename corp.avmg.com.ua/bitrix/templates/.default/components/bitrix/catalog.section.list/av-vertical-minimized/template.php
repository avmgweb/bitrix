<?
use \Bitrix\Main\Localization\Loc;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if(!count($arResult["SECTIONS"]))                               return;
?>
<div class="av-catalog-section-list-vertical-minimized">
	<?foreach($arResult["SECTIONS"] as $index => $sectionInfo):?>
		<?if($index + 1 <= $arParams["LINKS_MAX_COUNT"] || !$arParams["LINKS_MAX_COUNT"]):?>
			<?
			$this->AddEditAction  ($sectionInfo["ID"], $sectionInfo["EDIT_LINK"],   CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT"));
			$this->AddDeleteAction($sectionInfo["ID"], $sectionInfo["DELETE_LINK"], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE"));
			?>
			<a class="item" href="<?=$sectionInfo["SECTION_PAGE_URL"]?>">
				<?=$sectionInfo["NAME"]?>
			</a>
		<?endif?>
	<?endforeach?>

	<?if($arParams["LINKS_MAX_COUNT"] && count($arResult["SECTIONS"]) > $arParams["LINKS_MAX_COUNT"]):?>
	<a class="list-link" href="<?=$arResult["SECTIONS"][0]["LIST_PAGE_URL"]?>">
		<?=Loc::getMessage("AV_CATALOG_SECTION_LIST_VERTICAL_MINIMIZED_LIST_PAGE")?>
	</a>
	<?endif?>
</div>