<?
use \Bitrix\Main\Localization\Loc;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

foreach($arResult["ITEMS"] as $itemInfo)
	{
	$this->AddEditAction  ($itemInfo["ID"], $itemInfo["EDIT_LINK"],   CIBlock::GetArrayByID($itemInfo["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($itemInfo["ID"], $itemInfo["DELETE_LINK"], CIBlock::GetArrayByID($itemInfo["IBLOCK_ID"], "ELEMENT_DELETE"));
	}
/* -------------------------------------------------------------------- */
/* ------------------------------ pager ------------------------------- */
/* -------------------------------------------------------------------- */
?>
<?if($arParams["DISPLAY_TOP_PAGER"] && $arResult["NAV_STRING"]):?>
<div class="av-news-list-blog-pager top"><?=$arResult["NAV_STRING"]?></div>
<?endif?>
<?
/* -------------------------------------------------------------------- */
/* ---------------------------- empty list ---------------------------- */
/* -------------------------------------------------------------------- */
?>
<?if(!count($arResult["ITEMS"])):?>
<?=Loc::getMessage("AV_NEWS_LIST_BLOG_NO_ITEMS")?>
<?endif?>
<?
/* -------------------------------------------------------------------- */
/* ------------------------------- list ------------------------------- */
/* -------------------------------------------------------------------- */
?>
<div class="av-news-list-blog">
<?foreach($arResult["ITEMS"] as $itemInfo):?>
	<div class="item" id="<?=$this->GetEditAreaId($itemInfo["ID"])?>" itemscope itemtype="http://schema.org/BlogPosting">
		<?
		/* ------------------------------------------- */
		/* ------------------ image ------------------ */
		/* ------------------------------------------- */
		?>
		<a class="image-link" href="<?=$itemInfo["DETAIL_PAGE_URL"]?>" rel="nofollow">
			<img
				src="<?=($itemInfo["PREVIEW_PICTURE"]["SRC"]    ? $itemInfo["PREVIEW_PICTURE"]["SRC"]   : $this->GetFolder()."/images/default_image.jpg")?>"
				title="<?=$itemInfo["PREVIEW_PICTURE"]["TITLE"] ? $itemInfo["PREVIEW_PICTURE"]["TITLE"] : $itemInfo["NAME"]?>"
				alt="<?=$itemInfo["PREVIEW_PICTURE"]["ALT"]     ? $itemInfo["PREVIEW_PICTURE"]["ALT"]   : $itemInfo["NAME"]?>"
			>
		</a>
		<?
		/* ------------------------------------------- */
		/* ----------------- content ----------------- */
		/* ------------------------------------------- */
		?>
		<div class="content-block">
			<?if($itemInfo["ACTIVE_FROM"] || $arParams["USE_RATING"] == "Y"):?>
			<div class="rating-row">
				<?if($itemInfo["ACTIVE_FROM"]):?>
				<span class="date"><?=explode(" ", $itemInfo["ACTIVE_FROM"])[0]?></span>
				<?endif?>

				<?if($arParams["USE_RATING"] == "Y"):?>
				<div class="rating">
					<?
					$APPLICATION->IncludeComponent
						(
						"bitrix:iblock.vote", "av",
							[
							"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
							"IBLOCK_ID"   => $arParams["IBLOCK_ID"],
							"ELEMENT_ID"  => $itemInfo["ID"],

							"MAX_VOTE"       => $arParams["MAX_VOTE"],
							"VOTE_NAMES"     => $arParams["VOTE_NAMES"],
							"SET_STATUS_404" => "Y",

							"CACHE_TYPE"   => $arParams["CACHE_TYPE"],
							"CACHE_TIME"   => $arParams["CACHE_TIME"]
							],
						false, ["HIDE_ICONS" => "Y"]
						);
					?>
				</div>
				<?endif?>
			</div>
			<?endif?>

			<a class="element-title" href="<?=$itemInfo["DETAIL_PAGE_URL"]?>">
				<?=$itemInfo["NAME"]?>
			</a>

			<?if($itemInfo["FIELDS"]["PREVIEW_TEXT"]):?>
			<div class="element-text"><?=$itemInfo["FIELDS"]["PREVIEW_TEXT"]?></div>
			<?endif?>

			<a class="read-more-link" href="<?=$itemInfo["DETAIL_PAGE_URL"]?>" rel="nofollow">
				<?=Loc::getMessage("AV_NEWS_LIST_BLOG_READ_MORE")?>
			</a>
		</div>
		<?
		/* ------------------------------------------- */
		/* ------------ microdata values ------------- */
		/* ------------------------------------------- */
		?>
		<span itemprop="headline"         content="<?=$itemInfo["NAME"]?>"></span>
		<span itemprop="mainEntityOfPage" content="<?=CURRENT_PROTOCOL?>://<?=$_SERVER["SERVER_NAME"].$itemInfo["DETAIL_PAGE_URL"]?>"></span>

		<?if($itemInfo["DATE_CREATE"]):?>
		<span itemprop="datePublished"    content="<?=date("Y-m-d", strtotime($itemInfo["DATE_CREATE"]))?>"></span>
		<?endif?>

		<?if($itemInfo["TIMESTAMP_X"]):?>
		<span itemprop="dateModified"     content="<?=date("Y-m-d", strtotime($itemInfo["TIMESTAMP_X"]))?>"></span>
		<?endif?>

		<div itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
			<span itemprop="name" content="<?=$_SERVER["SERVER_NAME"]?>"></span>
			<span itemprop="logo" itemscope itemtype="http://schema.org/ImageObject">
				<span itemprop="url"    content="<?=CURRENT_PROTOCOL?>://<?=$_SERVER["SERVER_NAME"]?>/bitrix/images/av/logo_line_<?=LANGUAGE_ID?>.svg"></span>
				<span itemprop="width"  content="300"></span>
				<span itemprop="height" content="50"></span>
			</span>
		</div>

		<div itemprop="author" itemscope itemtype="https://schema.org/CreativeWork">
			<span itemprop="name" content="<?=$_SERVER["SERVER_NAME"]?>"></span>
		</div>

		<?if($itemInfo["PREVIEW_PICTURE"]["SRC"]):?>
		<div itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
			<span itemprop="url"    content="<?=CURRENT_PROTOCOL?>://<?=$_SERVER["SERVER_NAME"].$itemInfo["PREVIEW_PICTURE"]["SRC"]?>"></span>
			<span itemprop="width"  content="<?=$itemInfo["PREVIEW_PICTURE"]["WIDTH"]?>"></span>
			<span itemprop="height" content="<?=$itemInfo["PREVIEW_PICTURE"]["HEIGHT"]?>"></span>
		</div>
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
<div class="av-news-list-blog-pager bottom"><?=$arResult["NAV_STRING"]?></div>
<?endif?>