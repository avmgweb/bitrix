<?
use \Bitrix\Main\Localization\Loc;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/* -------------------------------------------------------------------- */
/* ------------------------------ pager ------------------------------- */
/* -------------------------------------------------------------------- */
?>
<?if($arParams["DISPLAY_TOP_PAGER"] && $arResult["NAV_STRING"]):?>
<div class="av-bases-list-pager top"><?=$arResult["NAV_STRING"]?></div>
<?endif?>
<?
/* -------------------------------------------------------------------- */
/* ---------------------------- empty list ---------------------------- */
/* -------------------------------------------------------------------- */
?>
<?if(!count($arResult["ITEMS"])):?>
<?=Loc::getMessage("AV_BASES_LIST_NO_ITEMS")?>
<?endif?>
<?
/* -------------------------------------------------------------------- */
/* ------------------------------- list ------------------------------- */
/* -------------------------------------------------------------------- */
?>
<div class="av-bases-list">
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction  ($arItem["ID"], $arItem["EDIT_LINK"],   CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem["ID"], $arItem["DELETE_LINK"], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"));

	$cordinateX = $arItem["PROPERTIES"]["cordinate_x"]["VALUE"];
	$cordinateY = $arItem["PROPERTIES"]["cordinate_y"]["VALUE"];
	$closed     = $arItem["PROPERTIES"]["closed"]     ["VALUE_XML_ID"];
	?>
	<div
		id="<?=$this->GetEditAreaId($arItem["ID"])?>"
		class="
			av-bases-list-element
			<?if(!$cordinateX || !$cordinateY):?>no-map<?endif?>
			<?if($closed):?>closed<?endif?>
			<?if($arParams["DETAIL_URL"]):?>checkable<?endif?>
			"
	>
		<div>
			<h3>
				<a <?if($arParams["DETAIL_URL"]):?>href="<?=$arItem["DETAIL_PAGE_URL"]?>"<?endif?>>
					<?if($closed):?><?=Loc::getMessage("AV_BASES_LIST_CLOSED_PREFIX")?> <?endif?><?=$arItem["NAME"]?>
				</a>
			</h3>
			<div class="value-block">
				<?if($arItem["PROPERTIES"]["address"]["VALUE"]["TEXT"]):?>
				<div><?=$arItem["PROPERTIES"]["address"]["VALUE"]["TEXT"]?></div>
				<?endif?>

				<?if($arItem["PROPERTIES"]["phone"]["VALUE"][0]):?>
				<div><?=implode(', ', $arItem["PROPERTIES"]["phone"]["VALUE"])?></div>
				<?endif?>

				<?if($arItem["PROPERTIES"]["streams"]["VALUE"][0]):?>
				<div class="streams-block">
					<?foreach($arResult["STREAMS_INFO"] as $stream => $streamInfo):?>
						<?if(in_array($stream, $arItem["PROPERTIES"]["streams"]["VALUE"])):?>
						<div
							title="<?=$streamInfo["NAME"]?>"
							style="width: <?=$streamInfo["SVG_WIDTH"]?>px;height: <?=$streamInfo["SVG_HEIGHT"]?>px"
						>
							<?=$arResult["STREAMS_INFO"][$stream]["SVG_CONTENT"]?>
						</div>
						<?endif?>
					<?endforeach?>
				</div>
				<?endif?>
			</div>
		</div>
		<?if($cordinateX && $cordinateY):?>
		<div
			class="google-map"
			data-store-name="<?=$arItem["NAME"]?>"
			data-cordinate-x="<?=$cordinateX?>"
			data-cordinate-y="<?=$cordinateY?>"
		></div>
		<?endif?>
	</div>
<?endforeach?>
</div>
<?
/* -------------------------------------------------------------------- */
/* ------------------------------ pager ------------------------------- */
/* -------------------------------------------------------------------- */
?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"] && $arResult["NAV_STRING"]):?>
<div class="av-bases-list-pager bottom"><?=$arResult["NAV_STRING"]?></div>
<?endif?>