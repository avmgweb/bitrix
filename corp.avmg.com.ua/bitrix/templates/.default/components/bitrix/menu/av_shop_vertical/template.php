<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if(!count($arResult))                                           return;
?>
<ul class="av-shop-menu-vertical" data-av-at-avmg-main-menu="menu">
	<?foreach($arResult as $index => $itemInfo):?>
		<?
		$nextIndex  = $index+1;
		$hasSubMenu = $arResult[$nextIndex]["DEPTH_LEVEL"] == 2 ? true : false;
		?>

		<?if($itemInfo["DEPTH_LEVEL"] == 1):?>
		<li class="item<?if($itemInfo["SELECTED"]):?> selected active<?endif?><?if($hasSubMenu):?> parent<?endif?>">
			<div>
				<a href="<?=$itemInfo["LINK"]?>"><?=$itemInfo["TEXT"]?></a>
				<?if($hasSubMenu):?>
				<div class="arrow"></div>
				<?endif?>
			</div>

			<?if($hasSubMenu):?>
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