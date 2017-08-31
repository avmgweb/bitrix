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
				<?if($itemInfo["SELECTED"]):?>selected active<?endif?>
				<?if($itemInfo["PARENT"]):?>  parent         <?endif?>
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
				<?while($arResult[$nextIndex]["DEPTH_LEVEL"] == 2):?>
				<li>
					<a href="<?=$arResult[$nextIndex]["LINK"]?>"><?=$arResult[$nextIndex]["TEXT"]?></a>
					<?$nextIndex++?>
				</li>
				<?endwhile?>
			</ul>
			<?endif?>
		</li>
		<?endif?>
	<?endforeach?>
</ul>