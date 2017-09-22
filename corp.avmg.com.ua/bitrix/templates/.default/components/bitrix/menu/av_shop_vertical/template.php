<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if(!count($arResult))                                           return;
?>
<ul class="av-shop-menu-vertical" data-av-at-avmg-main-menu="menu">
	<?foreach($arResult as $index => $itemInfo):?>
		<?if($itemInfo["DEPTH_LEVEL"] == 1):?>
		<li
			class="
				item
				<?if($itemInfo["SELECTED"]):?>                       selected<?endif?>
				<?if($itemInfo["ACTIVE"] || $itemInfo["SELECTED"]):?>active  <?endif?>
				<?if($itemInfo["PARENT"]):?>                         parent  <?endif?>
				"
		>
			<div>
				<a href="<?=$itemInfo["LINK"]?>"><?=$itemInfo["TEXT"]?></a>
				<?if($itemInfo["PARENT"]):?>
				<div class="arrow"></div>
				<?endif?>
			</div>

			<?$nextIndex = $index + 1?>
			<?if($itemInfo["PARENT"]):?>
			<ul>
				<?while(count($arResult[$nextIndex]) && $arResult[$nextIndex]["DEPTH_LEVEL"] > 1):?>
					<?if($arResult[$nextIndex]["DEPTH_LEVEL"] == 2):?>
					<li class="subitem<?if($arResult[$nextIndex]["SELECTED"]):?> selected<?endif?>">
						<a href="<?=$arResult[$nextIndex]["LINK"]?>"><?=$arResult[$nextIndex]["TEXT"]?></a>
					</li>
					<?endif?>

				<?$nextIndex++?>
				<?endwhile?>
			</ul>
			<?endif?>
		</li>
		<?endif?>
	<?endforeach?>
</ul>