<?
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
<div
	class="av-catalog-section-list-slider"
	data-slides-count="3"
	data-slides-count-tablet="2"
	data-slides-count-mobile="1"
>
	<i class="navigation prev fa fa-angle-left"></i>

	<div class="slider-block">
		<?foreach($arResult["SECTIONS"] as $sectionInfo):?>
		<div class="item" id="<?=$this->GetEditAreaId($sectionInfo["ID"])?>">
			<a class="image-link" href="<?=$sectionInfo["SECTION_PAGE_URL"]?>" rel="nofollow">
				<img
					src="<?=($sectionInfo["PICTURE"]["SRC"] ? $sectionInfo["PICTURE"]["SRC"] : $this->GetFolder().'/images/default_image.jpg')?>"
					title="<?=$sectionInfo["PICTURE"]["TITLE"]?>"
					alt="<?=$sectionInfo["PICTURE"]["ALT"]?>"
				>
			</a>
			<a class="title" href="<?=$sectionInfo["SECTION_PAGE_URL"]?>">
				<?=$sectionInfo["NAME"]?>
			</a>
		</div>
		<?endforeach?>
	</div>

	<i class="navigation next fa fa-angle-right"></i>
</div>