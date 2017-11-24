<?
use \Bitrix\Main\Localization\Loc;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if(!count($arResult["SECTIONS"]))                               return;

$linksMaxCount = (int) $arParams["LINKS_MAX_COUNT"];
$needListLink  = $linksMaxCount && count($arResult["SECTIONS"]) > $linksMaxCount;

if($linksMaxCount)
	$arResult["SECTIONS"] = array_slice($arResult["SECTIONS"], 0, $linksMaxCount);

foreach($arResult["SECTIONS"] as $sectionInfo)
	{
	$this->AddEditAction  ($sectionInfo["ID"], $sectionInfo["EDIT_LINK"],   CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT"));
	$this->AddDeleteAction($sectionInfo["ID"], $sectionInfo["DELETE_LINK"], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE"));
	}
/* -------------------------------------------------------------------- */
/* -------------------------- sections list --------------------------- */
/* -------------------------------------------------------------------- */
?>
<div class="av-catalog-section-list-shop-vertical-minimized">
	<?foreach($arResult["SECTIONS"] as $sectionInfo):?>
	<a
		class="item"
		id="<?=$this->GetEditAreaId($sectionInfo["ID"])?>"
		href="<?=$sectionInfo["SECTION_PAGE_URL"]?>"
		title="<?=$sectionInfo["NAME"]?>"
	>
		<?=$sectionInfo["NAME"]?>
	</a>
	<?endforeach?>

	<?if($needListLink):?>
	<a
		class="list-link"
		href="<?=$arResult["SECTIONS"][0]["LIST_PAGE_URL"]?>"
		title="<?=Loc::getMessage("AV_CATALOG_SECTION_LIST_VERTICAL_MINIMIZED_LIST_PAGE")?>"
	>
		<?=Loc::getMessage("AV_CATALOG_SECTION_LIST_VERTICAL_MINIMIZED_LIST_PAGE")?>
	</a>
	<?endif?>
</div>