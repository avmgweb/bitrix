<?
use \Bitrix\Main\Localization\Loc;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if(!count($arResult["SECTIONS"]))                               return;

foreach($arResult["SECTIONS"] as $sectionInfo)
	{
	$this->AddEditAction  ($sectionInfo["ID"], $sectionInfo["EDIT_LINK"],   CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT"));
	$this->AddDeleteAction($sectionInfo["ID"], $sectionInfo["DELETE_LINK"], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE"));
	}
/* -------------------------------------------------------------------- */
/* -------------------------- sections list --------------------------- */
/* -------------------------------------------------------------------- */
?>
<div class="av-catalog-section-list-shop-vertical">
	<a class="main-link" href="<?=$arResult["SECTIONS"][0]["LIST_PAGE_URL"]?>">
		<?=$arResult["IBLOCK_NAME"]?>
	</a>

	<?foreach($arResult["SECTIONS"] as $sectionInfo):?>
	<a
		class="sub-link"
		id="<?=$this->GetEditAreaId($sectionInfo["ID"])?>"
		href="<?=$sectionInfo["SECTION_PAGE_URL"]?>"
	>
		<div class="title"><?=$sectionInfo["NAME"]?></div>
		<i class="arrow fa fa-angle-right"></i>
	</a>
	<?endforeach?>
</div>