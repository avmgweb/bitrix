<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if(!count($arResult))                                           return;
?>
<div class="av-menu-tablet">
	<?foreach($arResult as $index => $itemInfo):?>
		<?if($itemInfo["DEPTH_LEVEL"] == 1):?>
		<div class="item<?if($index == count($arResult) - 1):?> last<?endif?>">
			<a class="image-link" href="<?=$itemInfo["LINK"]?>" rel="nofollow">
				<img
					src="<?=($itemInfo["PARAMS"]["TITLE_BACKGROUND_ICON"] ? $itemInfo["PARAMS"]["TITLE_BACKGROUND_ICON"] : $this->GetFolder()."/images/default_image.jpg")?>"
					alt="<?=$itemInfo["TEXT"]?>"
					title="<?=$itemInfo["TEXT"]?>"
				>
			</a>
			<a href="<?=$itemInfo["LINK"]?>">
				<?=$itemInfo["TEXT"]?>
			</a>
		</div>
		<?endif?>
	<?endforeach?>

	<div class="border-hider-vertical"></div>
	<div class="border-hider-horizontal"></div>
</div>