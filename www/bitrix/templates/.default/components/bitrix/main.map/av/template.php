<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if(!count($arResult["ITEMS"]))                                  return;
?>
<div class="av-sitemap">
	<?foreach($arResult["ITEMS"][1] as $itemInfo):?>
	<div class="first-level-block">
		<a href="<?=$itemInfo["FULL_PATH"]?>"><?=$itemInfo["NAME"]?></a>

		<?foreach($arResult["ITEMS"][2][$itemInfo["FULL_PATH"]] as $subitemInfo):?>
		<div class="second-level-block">
			<a href="<?=$subitemInfo["FULL_PATH"]?>"><?=$subitemInfo["NAME"]?></a>

			<?if(count($arResult["ITEMS"][3][$subitemInfo["FULL_PATH"]])):?>
			<div class="third-level-block">
				<?foreach($arResult["ITEMS"][3][$subitemInfo["FULL_PATH"]] as $subsubitemInfo):?>
				<a href="<?=$subsubitemInfo["FULL_PATH"]?>"><?=$subsubitemInfo["NAME"]?></a>
				<?endforeach?>
			</div>
			<?endif?>
		</div>
		<?endforeach?>
	</div>
	<?endforeach?>
</div>